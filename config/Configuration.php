<?php
namespace projet5\config;

class Configuration {

  private static $datas;

  public static function get($filePath, $key) {
    SELF::getDatas($filePath);
    if(isset(SELF::getDatas($filePath)[$key])) {
      $value = SELF::$datas[$key];
      return $value;
    } else {
      throw new \Exception('Une erreur est survenue. Veuillez réessayer plus tard.', 410);
    }
  }

  private static function getDatas($filePath) {
    if(SELF::$datas == null) {
      if(file_exists($filePath)){
        SELF::$datas = parse_ini_file($filePath);
      } else {throw new \Exception('Une erreur est survenue. Veuillez réessayer plus tard.', 410);}
    }
    return SELF::$datas;
  }
}
