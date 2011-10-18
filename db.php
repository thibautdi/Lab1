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
    self::connect();
    extract($user);
    mysql_query("SET NAMES UTF8"); 
    mysql_select_db(self::$db['db']);
    echo $bday;
    mysql_query("INSERT INTO users (fname,lname,email,login,pwd,sexe,bday,admin) VALUES ('$fname','$lname','$email','$login','$pwd','$sexe','$bday','$admin')");
    self::disconnect();
  }
  
  public function insert_club($club) {
    self::connect();
    extract($club);
    mysql_query("SET NAMES UTF8"); 
    mysql_select_db(self::$db['db']);
    mysql_query("INSERT INTO clubs (name,address,logo) VALUES ('$nom','$addresse','$logo')");
    self::disconnect();
  }
  
  public function get_club($by, $value) {
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
  
  public function select_user($by,$value) {
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
}
?>