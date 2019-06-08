<?php

  class BasedeDatos extends PDO
  {
    private static $instancia=NULL;
    public static function iniciarDB()
    {
      if(!isset(self::$instancia))
      {
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$instancia = new PDO('mysql:host=localhost;dbname=SISECARD','root','');
      }
      return self::$instancia;
    }
  }
?>
