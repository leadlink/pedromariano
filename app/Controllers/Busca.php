<?php
namespace App\Controllers;

class Busca extends BaseController{

    public function index($origem = NULL){
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
		############################################
		############################################
        if( $_POST ){
			$busca = $_POST;

			$codigos = array();
			foreach( $busca['codigos'] as $row ){
				if( !empty($row) ){
					array_push($codigos,$row);
				}
			}
			unset($busca['codigos']);
			$busca['codigos'] = $codigos;

			$url = 'busca/'.$busca['modo'].'/'.urldecode(arrayToUrlSearch($busca)).'/1/';
			$url = base_url().str_replace('//','/',$url);

			Redireciona($url);
        }
        ############################################
		############################################
        $busca = UriToAssoc($this->uri->getSegments(),0);
		$buscaresultado = Busca($busca);

        $dados['busca'] = arrayToObject($buscaresultado);
		$dados['imoveis'] = $buscaresultado['imoveis'];
        ############################################
		############################################
		## Configurações da Página
		$dados['titulo'] = $dados['busca']->seotitle.' - '.$dados['config']->titulo;
		$dados['descricao'] = Redutor($dados['busca']->seodesc,250);
		$dados['keywords'] = SetNulo($dados['busca']->seodesc);
		$dados['robots'] = $dados['robots'];
		$dados['resultados'] = true;
		############################################
		############################################
		## TIPOS DE IMÓVEIS
		$dados['residenciais'] = $this->SiteModel->getRegs('tb_imoveis_tipos',array(
			'order_by' => array(
				'key' => 'categoria',
				'dir' => 'asc'
			),
			'tipo' => 'R'
		))->getResult();

		$dados['comerciais'] = $this->SiteModel->getRegs('tb_imoveis_tipos',array(
			'order_by' => array(
				'key' => 'categoria',
				'dir' => 'asc'
			),
			'tipo' => 'C'
		))->getResult();
		############################################
		############################################
		## CARACTERISTICAS
		$dados['caracteristicas'] = $this->SiteModel->getRegs('tb_imoveis_caracteristicas',array(
			'order_by' => array(
				'key' => 'nome',
				'dir' => 'asc'
			),
			'busca' => '1',
			'status' => '1'
		))->getResult();
		############################################
		############################################
        return view('site/busca/index', $dados);
        ############################################
		############################################
    }

	public function ajax(){
		############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
		############################################
		############################################
		$busca = UriToAssoc($this->uri->getSegments(),1);
		$buscaresultado = Busca($busca);

        $dados['busca'] = arrayToObject($buscaresultado);
		$dados['imoveis'] = $buscaresultado['imoveis'];
		$dados['ajax'] = '1';
		############################################
		############################################
        return view('site/busca/resultados', $dados);
        ############################################
		############################################
	}

}