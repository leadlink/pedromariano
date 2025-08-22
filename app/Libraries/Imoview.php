<?php
#############################################
#############################################
namespace App\Libraries;
#############################################
#############################################
## Classe para consulta a API do Imoview
#############################################
#############################################
## PHP 8.2
## CodeIgniter 4.6.2
#############################################
#############################################
## Version: 1.4.3
## License: Exclusive Use
#############################################
#############################################
## Author: Rodrigo Luis
## Instagram: https://www.instagram.com/rodrigoluis/
## LinkedIn: https://www.linkedin.com/in/rodrigoluis/
## Facebook: https://www.facebook.com/rodrigoluis.web/
## Skype: rodrigoluis.web
## WhatsApp: +5551981212205
#############################################
#############################################
#############################################
#############################################
#############################################
#############################################
class Imoview{

    public $api_url = 'https://api.imoview.com.br/';
	public $api_key = '1c1c9adbe51342d2da6d73b175a6bff9';

	public function __construct(array $params = []){
        if( !empty($params) ){
            foreach( $params as $key => $val ){
                if( property_exists($this, $key) ){
                    $this->$key = $val;
                }
            }
        }
    }

	function Categorias(){
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarTiposImoveisDisponiveis',
			CURLOPT_POST => false,
			CURLOPT_HTTPGET => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'chave: '.$this->api_key
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Estados(){
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarEstadosDisponiveis',
			CURLOPT_POST => false,
			CURLOPT_HTTPGET => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_ENCODING => '',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'chave: '.$this->api_key
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Cidades($estado = NULL){
		#############################################
		#############################################
		if( !empty($estado) ){
			$data = array(
				"estado" => $estado
			);

			$json = json_encode($data);
		}else{
			$json = NULL;
		}
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarCidadesDisponiveis',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'chave: '.$this->api_key,
				'Content-Length: ' . strlen($json)
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Bairros($cidade = NULL){
		#############################################
		#############################################
		if( !empty($cidade) ){
			$data = array(
				"codigoCidade" => $cidade
			);

			$json = json_encode($data);
		}else{
			$json = NULL;
		}
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarBairrosDisponiveis',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'chave: '.$this->api_key,
				'Content-Length: ' . strlen($json)
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Condominio($codigo = NULL){
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarDetalhesCondominioDisponivel?codigoCondominio='.$codigo,
			CURLOPT_POST => false,
			CURLOPT_HTTPGET => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_ENCODING => '',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'chave: '.$this->api_key
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Condominios($dados = NULL){
		#############################################
		#############################################
		if( empty($dados) ){
			$data = array(
				"finalidade" => "0",
				"numeroPagina" => "1",
				"numeroRegistros" => LIMITE
			);
		 	$json = json_encode($data);
		}else{
			$json = json_encode($dados);
		}
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarCondominiosDisponiveis',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'chave: '.$this->api_key,
				'Content-Length: ' . strlen($json)
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Imovel($codigo = NULL){
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarDetalhesImovelDisponivel?codigoImovel='.$codigo,
			CURLOPT_POST => false,
			CURLOPT_HTTPGET => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_ENCODING => '',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'chave: '.$this->api_key
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}

	function Pesquisa($dados = NULL){
		#############################################
		#############################################
		if( empty($dados) ){
			$data = array(
				"finalidade" => "2",
				"numeroPagina" => "1",
				"numeroRegistros" => 20,
				"ordenacao" => "dataatualizacaodesc"
			);
		 	$json = json_encode($data);
		}else{
			$json = json_encode($dados);
		}
		#############################################
		#############################################
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url.'Imovel/RetornarImoveisDisponiveis',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'chave: '.$this->api_key,
				'Content-Length: ' . strlen($json)
			)
		));
		$result = curl_exec($curl);
		$retorno = json_decode( $result, true );
		curl_close($curl);

		return $retorno;
		#############################################
		#############################################
	}


}
?>