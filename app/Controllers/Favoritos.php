<?php
namespace App\Controllers;

class Favoritos extends BaseController{

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
		$dados['secao'] = $this->SiteModel->getRegistro('tb_secoes','id','9');
		$dados['titulo'] = $dados['secao']->titulo.' - '.$dados['config']->titulo;
		$dados['descricao'] = Redutor($dados['secao']->descricao,250);
		$dados['keywords'] = SetNulo($dados['secao']->keywords);
		$dados['robots'] = $dados['robots'];
		############################################
		############################################
        ## IMÓVEIS FAVORITOS
        $sessfavoritos = $this->session->get('P3dr0m4RiaNo_favoritos');
        ####################
        $locacao = array();
		$venda = array();
		####################
		foreach( $sessfavoritos as $fav ){
			##########
			$imo = explode('#',$fav);
			##########
			if( $imo[0] == 'A' ){
				array_push($locacao,$imo[1]);
			}else{
				array_push($venda,$imo[1]);
			}
			##########
		}
        ############################################
		############################################
        if( count($locacao) > 0 ){
			##########
            unset($ba);
            unset($cond);
            $ba = array();
            $cond = array();
            $ordem = array('atualizacao','DESC');
            ##########
            array_push($cond,'(status = "1")');
            array_push($cond,'(modo LIKE "%A%")');
            ##########
            foreach( $locacao as $row ){
				array_push($ba,'(codigo = "'.$row.'" OR referencia = "'.$row.'")');
			}
			array_push($cond,'('.implode(' OR ',$ba).')');
            ##########
            $cond = implode(' AND ',$cond);
            ##########
            $imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','1000');
            ##########
            $dados['locacao'] = $imoveis->getResult();
			$dados['totallocacao'] = $imoveis->getNumRows();
            ##########
		}else{
			$dados['totallocacao'] = 0;
		}
        ############################################
		############################################
        if( count($venda) > 0 ){
			##########
            unset($ba);
            unset($cond);
            $ba = array();
            $cond = array();
            $ordem = array('atualizacao','DESC');
            ##########
            array_push($cond,'(status = "1")');
            array_push($cond,'(modo LIKE "%V%")');
            ##########
            foreach( $venda as $row ){
				array_push($ba,'(codigo = "'.$row.'" OR referencia = "'.$row.'")');
			}
			array_push($cond,'('.implode(' OR ',$ba).')');
            ##########
            $cond = implode(' AND ',$cond);
            ##########
            $imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','1000');
            ##########
            $dados['venda'] = $imoveis->getResult();
			$dados['totalvenda'] = $imoveis->getNumRows();
            ##########
		}else{
			$dados['totalvenda'] = 0;
		}
        ############################################
		############################################
        return view('site/favoritos/index', $dados);
        ############################################
		############################################
    }

}