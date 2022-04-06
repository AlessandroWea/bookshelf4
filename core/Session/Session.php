<?php

declare(strict_types=1);

namespace Malordo\Session;

use Malordo\Session\SessionInterface;
use Malordo\Session\SessionStorageInterface;

class Session implements SessionInterface
{
    private SessionStorageInterface $storage;

    public function __construct(SessionStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function set(string $key, $value) : void
    {
        if(!$this->isKeyValid($key))
            throw new \Exception('Session key is invalid');
        
        $this->storage->setSession($key, $value);
    }

    public function setArray(string $key, $value) : void
    {
        if(!$this->isKeyValid($key))
            throw new \Exception('Session key is invalid');
        
        $this->storage->setArraySession($key, $value);
    }

    public function get(string $key, $default = null)
    {
        if(!$this->isKeyValid($key))
            throw new \Exception('Session key is invalid');
        
        return $this->storage->getSession($key, $default);
    }

    public function has(string $key)
    {
        if(!$this->isKeyValid($key))
            throw new \Exception('Session key is invalid');
        
        return $this->storage->hasSession($key);
    }

    public function delete(string $key) : void
    {
        if(!$this->isKeyValid($key))
            throw new \Exception('Session key is invalid');
        
        $this->storage->deleteSession($key);
    }

    public function isKeyValid(string $key) : bool
    {
        return !empty($key);
    }

}