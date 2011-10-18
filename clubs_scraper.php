<?php
include ('simple_html_dom.php');
include 'db.php';
include 'config.php';
// Create DOM from URL or file
$html = file_get_html('http://www.montrealguestlist.com/clubs.php');
$links = null;
// Find all images 
foreach ($html->find(".clubs_search_col a") as $link) {
  $clubs['link'][] = $link->href;
}

foreach($html->find('.clubs_search_col a img') as $element)  {
  $src = str_replace("/thumbnails","",$element->src);
  $src = str_replace(" ","%20",$element->src);
  $name = str_replace(" [nightclub]","",$element->alt);
  $image = 'club_images/'.$name.".jpeg";
  $image = str_replace(" ", "_", $image);
  $clubs['image'][] = $image;
  $clubs['name'][] = $name;
  $logo = file_get_contents('http://montrealguestlist.com'.$src);
  file_put_contents($image, $logo);
}

$i = 0;
echo count($clubs['name']);

while ($i< count($clubs['name'])) {
  $website = '';
  $address = '';
  $age = '';
  
  $html_club = file_get_html('http://www.montrealguestlist.com'.$clubs['link'][$i]);
  foreach($html_club->find('#club_info_age') as $element)  {
  $age = trim($element->innertext);
  }
  foreach($html_club->find('#club_info_website a') as $element)  {
  $website = trim($element->innertext);
  echo $website."\n";
  }
  foreach($html_club->find('#club_info_address') as $element)  {
  $address = trim($element->innertext);
  }
  
  
  $clubs_new[$i] = array(
    'name' => $clubs["name"][$i],
    'logo' => $clubs["image"][$i],
    'link' => $clubs["link"][$i],
    'address' => $address,
    'age' => $age,
    'website' => $website
  );
  $i++;
}

$db = new Db($config);
foreach ($clubs_new as $club)
{
  $db->insert_club($club);
}