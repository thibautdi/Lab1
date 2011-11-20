<?php
include 'db.php';
include 'config.php';
include ('simple_html_dom.php');

header("Content-type: text/html; charset=iso-8859-1");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

function find_club($id, $clubs) {
  foreach ($clubs as $club) {
    if ($club['id'] == $id ) {
      return $club;
    }
  }
}

function find_closest_club($origin,$config) {
  $db = new Db($config);
  $clubs = $db->get_clubs(1);
  $addresses[0] = "";
  $i = 0;
  $j = 0;
  $max_address = 30;
  foreach ($clubs as $club) {
    if ($i < $max_address) {
      $index_clubs[$j][$i] = $club['id'];
      $addresses[$j] .=  "|".$club['address']." Montreal";
    }else {
      $i = 0;
      $j++; 
      $index_clubs[$j][$i] = $club['id'];
      $addresses[$j] .=  "|".$club['address']." Montreal";
    }
    $i++;
  }
  
  foreach ($addresses as $address) {      
$urls[]="http://maps.googleapis.com/maps/api/distancematrix/xml?origins=".$origin."&destinations=".$address."&mode=walking&language=fr-FR&sensor=false";
  }
  
  $k = 0;
  $closest = 0;
  $min_distance = 0;
  foreach ($urls as $url) {
    $xml = simplexml_load_file(urlencode($url));
    $j = 0;
    foreach ($xml->row->element as $element) {  
      
      $clubs[$j + $max_address * $k]['distance_data'] = $element->distance->text;
      $to_sort[$clubs[$j + $max_address * $k]['id']] = strval($element->distance->value);
      if ($j == 0 || strval($element->distance->value) < $min_distance) {
        $closest = $element;
        $min_distance = $element->distance->value;
        $min_index = $j;
        $min_url = $k;
        //$distances[$k][$j] = array ("distance" => $element->distance->value, "",$k);
      }
      $j++;
    }
    $k++;
  }
  asort($to_sort);
  foreach ($to_sort as $key => $value) {
    $to_return[] = find_club($key, $clubs); 
  }
  $result = $clubs[$min_index + $max_address * $min_url];
  return $to_return;
}


$to_return = find_closest_club($_REQUEST['location'],$config);
if (!$to_return) {
  echo json_encode("Trop de Query à Google");
  exit;
}
echo json_encode($to_return);
exit;
//echo $xml->destination_address[0];
//var_dump($addresses);
