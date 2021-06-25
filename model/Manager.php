<?php
namespace projet5\model;
use \projet5\config\Configuration as config;
use PDO;

abstract class Manager {

  private static $db;
  protected $_connexion;

  public function __construct($filePath) {
    $this->_connexion = self::getConnexion($filePath);
  }

  protected function execRequest ($sql, $parameters = null)
	{
		if ($parameters == null) {
			$req = $this->_connexion->query($sql);
		}
		else {
			$req = $this->_connexion->prepare($sql);
      foreach ($parameters as $key => $value) {
        if(is_int($value)){
          $req->bindValue($key, $value, PDO::PARAM_INT);
        } elseif(is_string($value)) {$req->bindValue($key, $value, PDO::PARAM_STR);}
      }
			$req->execute();
		}
		return $req;
	}

  protected function lastId($sql) {
    return  $this->_connexion->lastInsertId($sql);
  }

	private static function getConnexion ($filePath) {
		if (self::$db == null)
		{
			$dsn = config::get($filePath, 'dsn');
			$loginDb = config::get($filePath, 'loginDb');
			$pwDb = config::get($filePath, 'pwDb');
			self::$db = new \PDO($dsn, $loginDb, $pwDb, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return self::$db;
	}
}
