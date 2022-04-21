<?php

declare(strict_types=1);

namespace Malordo\Request;

class Request
{
    public function __construct()
    {
        
    }

    public static function getURI() : string
    {
		$url = trim($_SERVER['REQUEST_URI'],'/');

		$pos = strpos($url, '?');
		if($pos !== false)
		{
			$url = substr($url, 0, $pos);
		}

		if($url !== ''  && $url[strlen($url)-1] === '/')
			$url = substr($url, 0, strlen($url)-1);

		return $url;
    }

    public function getData() : ?Object
    {
        $data = file_get_contents("php://input");
        $obj = json_decode($data);

        return $obj;
    }

    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function input(string $key)
    {
        return $_POST[$key] ?? null;
    }

    public function query(string $key)
    {
        return $_GET[$key] ?? null;
    }

    public function file(string $key)
    {
        return $_FILES[$key] ?? null;
    }

    public function has(string $key)
    {
        if(!array_key_exists($key, $_GET) && !array_key_exists($key, $_POST)){
            return false;
        }

        return true;
    }
}