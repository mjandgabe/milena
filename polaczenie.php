<?php 
/******************************************************
* polaczenie.php 
* polaczenie do bazy danych MySQL
******************************************************/
 try{
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.
                  ';port='.$port, $user, $pass,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
        $sukces = 1; // zmienna przechowujaca efekt polaczenia 
  } catch(PDOException $e){
    $e->getMessage();
        $sukces = 0;   
  }
  ?>