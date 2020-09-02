<?php
echo "<form action = 'index.php' method = 'GET'>";
echo "<input type = 'text' name = 'cep'/>";
echo "<button type = 'submit'> enviar </button> <br>";
echo "</form>";

@$cep = $_GET['cep'];

/* url da api */
@$url_api = "https://viacep.com.br/ws/$cep/json/";

/* inicia a api */
$iniciar = curl_init($url_api);

/* converte a resposta em um array e não deixa em uma unica string*/
curl_setopt($iniciar,CURLOPT_RETURNTRANSFER,true);

/* verifica a ssl */
curl_setopt($iniciar,CURLOPT_SSL_VERIFYPEER,false);

/* Converte json para objeto php */
@$acessa = json_decode(curl_exec($iniciar));

/* lista os dados de acordo com id */

echo "CEP: " . @$acessa->cep;
echo "<br>";
echo "Logradouro: " . @$acessa->logradouro;
echo "<br>";
echo "Complemento: " . @$acessa->complemento;
echo "<br>";
echo "Bairro: " . @$acessa->bairro;
echo "<br>";
echo "localidade: " . @$acessa->localidade;
echo "<br>";
echo "UF: " . @$acessa->uf;
echo "<br>";
echo "IBGE " . @$acessa->ibge;
echo "<br>";
echo "GIA: " . @$acessa->gia;
echo "<br>";
echo "DDD: " . @$acessa->ddd;
echo "<br>";
echo "Siafi: " . @$acessa->siafi;

