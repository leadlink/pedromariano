<?php
namespace App\Controllers;

class Depoimentos extends BaseController{

    public function index($origem = NULL){
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        $sessorigem = $this->session->get('FrP41me_origem');

		if( !empty($sessorigem) ){
			$dados['origem'] = $sessorigem;
		}
		if( !empty($origem) && in_array($origem,ORIGEM) ){
			$this->session->set('FrP41me_origem',$origem);
			$dados['origem'] = $origem;
		}
        ############################################
		############################################
		## CONFIGURAÇÕES DA PÁGINA
		$dados['secao'] = $this->SiteModel->getRegistro('tb_secoes','id','9');
		$dados['titulo'] = $dados['secao']->titulo.' - '.$dados['config']->titulo;
		$dados['descricao'] = Redutor($dados['secao']->descricao,250);
		$dados['keywords'] = SetNulo($dados['secao']->keywords);
		$dados['robots'] = $dados['robots'];
		############################################
		############################################
		## DEPOIMENTOS
		$dados['depoimentos'] = $this->SiteModel->getRegs('tb_depoimentos',array(
			'order_by' => array(
				'key' => 'nome',
				'dir' => 'asc'
			),
			'status' => '1'
		));
		############################################
		############################################
        return view('site/depoimentos/index', $dados);
        ############################################
		############################################
    }

}