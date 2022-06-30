<?php

class Agency
{

    private $name;
    private $address;
    private $zipcode;
    private $city;
    private $restaurationType;

    public function __construct($name, $address, $zipcode, $city, $restaurationType)
    {
        $this->name = $name;
        $this->address = $address;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->restaurationType = $restaurationType;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the value of zipcode
     */ 
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the value of restaurationType
     */ 
    public function getRestaurationType()
    {
        return $this->restaurationType;
    }
}

