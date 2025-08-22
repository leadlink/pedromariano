<?php
namespace App\Controllers;

//use App\Libraries\Imoview;

class Home extends BaseController{

    public function index($origem = NULL){
        ############################################
		############################################
		//$Imoview = new Imoview();
		//Debugar($Imoview->Imovel('6672'),1);
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
		$dados['secao'] = $this->SiteModel->getRegistro('tb_secoes','id','1');
		$dados['titulo'] = $dados['config']->titulo.' - '.$dados['secao']->titulo;
		$dados['descricao'] = Redutor($dados['secao']->descricao,250);
		$dados['keywords'] = SetNulo($dados['secao']->keywords);
		$dados['robots'] = $dados['robots'];
		$dados['home'] = true;
		############################################
		############################################
		## CHAMADAS DA HOME
		$dados['chamadas'] = $this->SiteModel->getRegs('tb_chamadas',array(
			'order_by' => array(
				'key' => 'ordem',
				'dir' => 'asc'
			),
			'status' => '1'
		));
		############################################
		############################################
		## BANNERS DA HOME
		$dados['banners'] = $this->SiteModel->getRegs('tb_banners_slide',array(
			'order_by' => array(
				'key' => 'ordem',
				'dir' => 'asc'
			),
			'status' => '1'
		));
		############################################
		############################################
		## IMÓVEIS EM DESTAQUE - VENDA
		unset($cond);
		$cond = array();
		$ordem = array('codigo','random');

		array_push($cond,'(status = "1")');
		array_push($cond,'(modo LIKE "%V%")');
		array_push($cond,'(exclusivo = "S")');
		$cond = implode(' AND ',$cond);

		$dados['imoveis_venda'] = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','4');
		############################################
		############################################
		## IMÓVEIS EM DESTAQUE - LOCAÇÃO
		unset($cond);
		$cond = array();
		$ordem = array('codigo','random');

		array_push($cond,'(status = "1")');
		array_push($cond,'(modo LIKE "%A%")');
		array_push($cond,'(exclusivo = "S")');
		$cond = implode(' AND ',$cond);

		$dados['imoveis_locacao'] = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','4');
		############################################
		############################################
		## IMÓVEIS EM DESTAQUE - INVESTIR
		unset($cond);
		$cond = array();
		$ordem = array('codigo','random');

		array_push($cond,'(status = "1")');
		array_push($cond,'(modo LIKE "%V%")');
		array_push($cond,'(mobiliado = "S")');
		$cond = implode(' AND ',$cond);

		$dados['imoveis_investir'] = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','4');
		############################################
		############################################
		## DEPOIMENTOS DA HOME
		$dados['depoimentos'] = $this->SiteModel->getRegs('tb_depoimentos',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => 'random'
			),
			'limit' => '3',
			'offset' => '0',
			'status' => '1'
		));
		############################################
		############################################
		## LINKS IMÓVEIS MAIS BUSCADOS
		$dados['links_maisbuscados'] = $this->SiteModel->getRegs('tb_links',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => 'random'
			),
			'limit' => '24',
			'offset' => '0',
			'status' => '1'
		));
		############################################
		############################################
		## BAIRROS IMÓVEIS MAIS BUSCADOS
		$dados['bairros_maisbuscados'] = $this->SiteModel->getRegs('tb_links_bairros',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => 'random'
			),
			'limit' => '24',
			'offset' => '0',
			'status' => '1'
		));
		############################################
		############################################
		## CONDOMÍNIOS MAIS POPULARES
		$dados['condominios_populares'] = $this->SiteModel->getRegs('view_condominios',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => 'random'
			),
			'limit' => '24',
			'offset' => '0',
			'status' => '1',
			'imoveis >=' => '3'
		));
		############################################
		############################################
        return view('site/home/index', $dados);
        ############################################
		############################################
    }

}