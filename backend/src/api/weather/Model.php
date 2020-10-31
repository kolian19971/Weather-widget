<?php

class Model
{
    private $city;
    private $countryCode;
    public static $apiKey = "3a74df1ca285609f805c6dfc4ae45245";
    public static $baseSlug = "http://api.openweathermap.org/data/2.5/weather";

    public function __construct( $city, $countryCode ){
        $this->city = $city;
        $this->countryCode = $countryCode;
    }

    public function genRequestUrl(){
//        http://api.openweathermap.org/data/2.5/weather?q=lviv&appid=3a74df1ca285609f805c6dfc4ae45245


        $countryCode = isset($this->countryCode) && !empty($this->countryCode) ? ','.$this->countryCode : '';

        return self::$baseSlug."?q=".$this->city.$countryCode."&units=metric&appid=".self::$apiKey;
    }



    public function getWether(){

//        print_r($this->genRequestUrl());exit();

        $wetherArray = [];

        $jsonResult = @file_get_contents($this->genRequestUrl());

        if(isset($jsonResult))
            $wetherArray = json_decode($jsonResult, true);

        return $wetherArray;
    }


}