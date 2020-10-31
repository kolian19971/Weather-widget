<?php

include $_SERVER['DOCUMENT_ROOT'].'/backend/src/api/weather/Model.php';

class Controller
{
    private $request;

    public function __construct( $request )
    {
        parse_str($request, $this->request);
    }

    public function getInfo(){

        $model = new Model($this->request['cityName'], $this->request['countryCode']);

        echo json_encode($model->getWether());
    }
}