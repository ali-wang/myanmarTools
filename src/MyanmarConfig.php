<?php
namespace aliwang\myanmarTools;

class MyanmarConfig{
    
    protected $user;

    protected $key;

    protected $domain;

    public function setUser($user){
        $this->user = $user;
    }

    public function setKey($key){
        $this->key = $key;
    }

    public function setDomain($domain){
        $this->domain = $domain;
    }


    public function getUser(){
       return $this->user;
    }

    public function getKey(){
        return $this->key;
    }
    
    public function getDomain(){
        return $this->domain;
    }
    
}