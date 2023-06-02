<?php

  use PHPUnit\Framework\TestCase;
  use Geraldo\CepDigital\Search;

  class SearchTest extends TestCase
  {

    /**
     * @dataProvider dataTest
     */
    public function testGetAddress(string $zipCode, array $exp) :void
    {

      $res = new Search();
      $res = $res->getAddress($zipCode);

      $this->assertEquals($exp, $res);

    }

    public function dataTest(){
      return [
        "Endereço Timbaúba" => [
          "55870000",
          [
            "cep" => "55870-000",
            "logradouro" => "",
            "complemento" => "",
            "bairro" => "",
            "localidade" => "Timbaúba",
            "uf" => "PE",
            "ibge" => "2615300",
            "gia" => "",
            "ddd" => "81",
            "siafi" => "2605"
          ]
        ],
        "Endereço Recife" => [
          "51150004",
          [
            "cep" => "51150-004",
            "logradouro" => "Avenida Marechal Mascarenhas de Moraes",
            "complemento" => "de 4223 a 5077 - lado ímpar",
            "bairro" => "Imbiribeira",
            "localidade" => "Recife",
            "uf" => "PE",
            "ibge" => "2611606",
            "gia" => "",
            "ddd" => "81",
            "siafi" => "2531"
          ]
        ]
      ];
    }

    /**
     * @dataProvider dataSetZipCode
     */
    public function testSetZipCode(string $zipCodeURI, string $exp) : void
    {

      $res = new Search();
      $res = $res->setZipCode($zipCodeURI);

      $this->assertSame($exp, $res);

    }

    public function dataSetZipCode() : array
    {
      return [
        "URI Timbaúba" => [
          "55870-000",
          "https://viacep.com.br/ws/55870000/json"
        ],
        "URI Recife" => [
          "51150-004",
          "https://viacep.com.br/ws/51150004/json"
        ]
      ];
    }
  }