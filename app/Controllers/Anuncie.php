<?php
namespace App\Controllers;

class Anuncie extends BaseController{

    public function index($origem = NULL){
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        $sessorigem = $this->session->get('P3dr0m4RiaNo_origem');

		if( !empty($sessorigem) ){
			$dados['origem'] = $sessorigem;
		}
		if( !empty($origem) && in_array($origem,ORIGEM) ){
			$this->session->set('P3dr0m4RiaNo_origem',$origem);
			$dados['origem'] = $origem;
		}
        ############################################
		############################################
		## CONFIGURAÇÕES DA PÁGINA
		$dados['secao'] = $this->SiteModel->getRegistro('tb_secoes','id','2');
		$dados['titulo'] = $dados['secao']->titulo.' - '.$dados['config']->titulo;
		$dados['descricao'] = Redutor($dados['secao']->descricao,250);
		$dados['keywords'] = SetNulo($dados['secao']->keywords);
		$dados['robots'] = $dados['robots'];
		############################################
		############################################
        return view('site/anuncie/index', $dados);
        ############################################
		############################################
    }

}