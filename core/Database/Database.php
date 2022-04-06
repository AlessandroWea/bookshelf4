<?php

declare(strict_types=1);

namespace Malordo\Database;

use Malordo\Application\Config;

use PDO;
use PDOException;

class Database
{
    protected array $credentials;

    public function __construct() {
        $this->credentials = Config::getDbCredentials();
    }

	public function execute($sql, $params = [])
	{
        $params = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
		try {
			$dsn = $this->credentials['version'].':host='.$this->credentials['host'].';dbname='.$this->credentials['dbname'];
			$db = new PDO($dsn, $this->credentials['user'],$this->credentials['password'], $params);
    
			$query = $db->prepare($sql);
	
			foreach ($params as $key => $value) {
				if(is_numeric($value))
				{
					@$query->bindParam($key, intval($value), PDO::PARAM_INT);
				}
				else
				{
					$query->bindParam($key, $value, PDO::PARAM_STR);
				}
			}
	
			$query->execute();
	
			$errInfo = $query->errorInfo();
			if($errInfo[0] !== PDO::ERR_NONE)
			{
				throw new \Exception($errInfo[2]);
			}
	
			$db = null;
	
			return $query;

		} catch (PDOException $ex) {
			echo $ex->getMessage();
			die;
		}

	}
}