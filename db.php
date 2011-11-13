<?php

class Db {
  private static $db;
  private static $link;
  
    public function __construct($config){
      self::$db = array(
        'host' => $config['host'],
        'db' => $config['db'],
        'user' => $config['user'],
        'pwd' => $config['pwd']
        );        
    }
  
  public function connect() {
    self::$link = mysql_connect(self::$db['host'],self::$db['user'],self::$db['pwd']) or die('Could not connect: ' . mysql_error());
    mysql_query("SET NAMES UTF8"); 
  }
  
  private function disconnect() {
    mysql_close(self::$link);
  }
  
  public function insert_user($user) {
    $user = self::avoid_injection($user);
    self::connect();
    extract($user);
    mysql_query("SET NAMES UTF8"); 
    mysql_select_db(self::$db['db']);
    mysql_query("INSERT INTO users (fname,lname,email,login,pwd,sexe,bday,admin) VALUES ('$fname','$lname','$email','$login','$pwd','$sexe','$bday','$admin')");
  }
  
  public function insert_club($club) {
    $club = self::avoid_injection($club);
    self::connect();
    extract($club);
    mysql_query("SET NAMES UTF8"); 
    mysql_select_db(self::$db['db']);
    mysql_query("INSERT INTO clubs (name,address,logo,age,website,reviewed) VALUES ('$name','$address','$logo','$age','$website','$reviewed')");
  }
  
  public function remove_club($id) {
    $id = self::avoid_injection($id);
    self::connect();
    mysql_query("SET NAMES UTF8"); 
    mysql_select_db(self::$db['db']);
    $result = mysql_query("DELETE FROM clubs WHERE id = '$id'");
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
  }
  
  public function get_club($by, $value) {
    $by = self::avoid_injection($by);
    $value = self::avoid_injection($value);
    self::connect();
    mysql_select_db(self::$db['db']);
    $query = "SELECT * FROM clubs WHERE ${by}='$value'";
    $result = mysql_query($query);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    $club = mysql_fetch_array($result);    
    return $club;
  }
  
  public function get_all_clubs() {
    self::connect();
    mysql_select_db(self::$db['db']);
    $query = "SELECT * FROM clubs";
    $result = mysql_query($query);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    while ($club = mysql_fetch_array($result)) {
      $clubs[] = $club;
    }    
    return $clubs;
  }
  
  public function select_user($by,$value) {
    $by = self::avoid_injection($by);
    $value = self::avoid_injection($value);
    self::connect();
    mysql_select_db(self::$db['db']);
    $query = "SELECT * FROM users WHERE ${by}='$value'";
    $result = mysql_query($query);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    $user = mysql_fetch_array($result);    
    
    return $user;
  }
  
  public function avoid_injection($res) {
      if(is_array($res))
          foreach($res as $k => $v)
              $res[$k] = self::avoid_injection($v); //recursive
      elseif(is_string($res))
          $res = mysql_real_escape_string($res);
      return $res;
  }
  
  public function rate_club($club_id, $rating,$user_id,$sexe) {
    $club_id = self::avoid_injection($club_id);
    $rating = self::avoid_injection($rating);
    $user_id = self::avoid_injection($user_id);
    $sexe = self::avoid_injection($sexe);
    
    self::connect();
    mysql_select_db(self::$db['db']);
    $query ="INSERT INTO ratings(user_id,club_id,rating,sexe) VALUES ('$user_id','$club_id','$rating','$sexe')";
    $result = mysql_query($query);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    
    $query = "SELECT rating,nb_ratings FROM clubs WHERE id='$club_id'";
    $result = mysql_query($query);
    
    $stat = mysql_fetch_array($result);
    
    $rating = (($stat['rating'] * $stat['nb_ratings']) + $rating) / ($stat['nb_ratings'] + 1);
    echo $rating;
    $nb = $stat['nb_ratings'] + 1;
    $update = "UPDATE clubs SET rating='$rating', nb_ratings='$nb' WHERE id='$club_id'";
    $result = mysql_query($update);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
  }
  
  public function is_rated($club_id,$user_id) {
    $club_id = self::avoid_injection($club_id);
    $user_id = self::avoid_injection($user_id);
    
    self::connect();
    mysql_select_db(self::$db['db']);
    $select = "SELECT rating FROM ratings WHERE club_id='$club_id' AND user_id='$user_id'";
    $result = mysql_query($select);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    return mysql_fetch_array($result);
  }
  
  public function check_login($login) {
    $login = self::avoid_injection($login);
    $response = array();
    self::connect();
    mysql_select_db(self::$db['db']);
    $select = "SELECT login FROM users WHERE login='$login'";
    $result = mysql_query($select);
    if (!$result) {
       echo 'Impossible d\'exécuter la requête : ' . mysql_error();
       exit;
    }
    
    if (strlen($login) < 5) {
      $response = array(
        "msg" => "<img src='img/no.png'/>Votre login doit faire au moins 5 caractères",
        "ok" => "false" 
      );
    }
    elseif (ereg("[^A-Za-z0-9]", $login)) {
      $response = array(
        "msg" => "<img src='img/no.png'/>Votre login ne doit contenir que des lettres et chiffres",
        "ok" => "false"
      );
    }
    elseif(mysql_num_rows($result)>=1) {
      $response = array(
        "msg" => "<img src='img/no.png'/>Ce login n'est pas disponible",
        "ok" => "false" 
      );
    }
    else {
      $response = array(
        "msg" => "<img src='img/tick.png'/>Ce login est disponible",
        "ok" => "true" 
      );
    }
    return $response;
  } 
}
?>