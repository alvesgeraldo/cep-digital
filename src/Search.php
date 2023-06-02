<?php

  namespace Geraldo\CepDigital;

  class Search
  {

    private $url = "https://viacep.com.br/ws/";

    public function getAddress(string $zipCode):array
    {
      
      $get = file_get_contents($this->setZipCode($zipCode));

      return (array) json_decode($get);
     
    }

    public function setZipCode(string $zipCode)
    {

      $zipCode = preg_replace('/[^0-9]/im', '', $zipCode);

      return $this->url . $zipCode . '/json';

    }
  }