<?php

declare(strict_types=1);

namespace Malordo\Database;

use Malordo\Application\Config;

use PDO;
use PDOException;

class Database
{
	public static function connect()
	{
        $credentials = Config::getDbCredentials();
		$params = [
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,	
		];
		$dsn = $credentials['version'].':host='.$credentials['host'].';dbname='.$credentials['dbname'];
		$db = new PDO($dsn, $credentials['user'],$credentials['password'], $params);

		return $db;
	}

	public static function execute($sql, $arr = [])
	{
		try {
			$db = self::connect();
    
			$query = $db->prepare($sql);
			$query->execute($arr);
			$errInfo = $query->errorInfo();
			if($errInfo[0] !== PDO::ERR_NONE)
			{
				echo $errInfo[2];
				exit();
			}
			$db = null;
			return $query;
		} catch (PDOException $ex) {
			echo $ex->getMessage();
			die;
		}

	}

	public static function insert($table, $arr)
	{
		$sql = "INSERT INTO $table SET ";
		foreach($arr as $key => $value){
			$sql .= "$key=:$key, ";
		}
		$sql = trim($sql, ', ');
		
		try {
			$db = self::connect();

			$query = $db->prepare($sql);
			$query->execute($arr);
			$errInfo = $query->errorInfo();
			if($errInfo[0] !== PDO::ERR_NONE)
			{
				echo $errInfo[2];
				exit();
			}
			
			return $db->lastInsertId();
		} catch(PDOException $ex){
			echo $ex->getMessage();
			die;
		}

	}
}