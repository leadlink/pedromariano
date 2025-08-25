<?php
namespace App\Controllers;

class Imovel extends BaseController{

    public function index($codigo = NULL, $corretor = NULL, $origem = NULL){
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
        if( !empty($corretor) && in_array($corretor,ORIGEM) ){
			$this->session->set('P3dr0m4RiaNo_origem',$corretor);
			$dados['origem'] = $corretor;
		}
        ############################################
		############################################
        ## CONSULTA IMÓVEL
        $code = explode('_',$codigo);
        unset($codigo);
        ####################
        $codigo = $code[0];
        $referencia = $code[1];
        ####################
        $imo = $this->SiteModel->getRegs('tb_imoveis',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => 'asc'
			),
			'status' => '1',
			'codigo' => $codigo,
			'referencia' => $referencia
		))->getRow();
        ####################
        $dados['imovel'] = $imo;
        //Debugar($imo,1);
        ############################################
		############################################
        ## CASO NÃO EXISTA OU ESTEJA INATIVO, REDIRECIONA
        if( empty($imo->codigo) ){
			Redireciona(base_url().'busca/comprar/cidade/'.URLizer(CIDADE).'/1/',301);
			die();
		}
        ############################################
		############################################
        ## GALERIA DE FOTOS
        $dados['galeria1'] = $this->SiteModel->getRegs('tb_imoveis_fotos',array(
			'limit' => '4',
			'offset' => '0',
			'order_by' => array(
				'key' => 'ordem',
				'dir' => 'asc'
			),
			'imovel' => $imo->id
		));
        ####################
		$dados['galeria2'] = $this->SiteModel->getRegs('tb_imoveis_fotos',array(
			'limit' => '1000',
			'offset' => '4',
			'order_by' => array(
				'key' => 'ordem',
				'dir' => 'asc'
			),
			'imovel' => $imo->id
		));
        ####################
		$dados['galeria'] = $this->SiteModel->getRegs('tb_imoveis_fotos',array(
			'limit' => '1000',
			'offset' => '0',
			'order_by' => array(
				'key' => 'ordem',
				'dir' => 'asc'
			),
			'imovel' => $imo->id
		));
        ############################################
		############################################
        if( $imo->modo == 'V' ){
			$dados['modo'] = 'Venda';
			$dados['finalidade'] = 'Para Comprar';
            $dados['bc_modo'] = 'comprar';
		}elseif( $imo->modo == 'A' ){
			$dados['modo'] = 'Locação';
			$dados['finalidade'] = 'Para Alugar';
            $dados['bc_modo'] = 'alugar';
		}else{
			$dados['modo'] = 'Locação e Venda';
			$dados['finalidade'] = 'Para Alugar/Comprar';
            $dados['bc_modo'] = 'comprar';
		}
        ############################################
		############################################
        ## BANNER RODAPÉ
        $dados['banner'] = $this->SiteModel->getRegs('tb_banners_imovel',array(
            'limit' => '1',
            'offset' => '0',
            'order_by' => array(
                'key' => 'id',
                'dir' => 'random'
            ),
            'like' => array(
                'campo' => 'modo',
                'valor' => $imo->modo
            ),
            'status' => '1'
        ));
        ############################################
		############################################
        ## IMÓVEIS SEMELHANTES
        $cond = array();
		$ordem = array('id','random');

        array_push($cond,'(status = "1")');
		array_push($cond,'(codigo != "'.$imo->codigo.'")');
        array_push($cond,'(referencia != "'.$imo->referencia.'")');
		array_push($cond,'(cidade = "'.$imo->cidade.'")');
		array_push($cond,'(bairro = "'.$imo->bairro.'")');
        array_push($cond,'(tipo = "'.$imo->tipo.'")');

        if( $imo->modo == 'V' ){
            array_push($cond,'(valorvenda >= "'.($imo->valorvenda*0.80).'" AND valorvenda <= "'.($imo->valorvenda*1.20).'")');
        }elseif( $imo->modo == 'A' ){
            array_push($cond,'(valorlocacao >= "'.($imo->valorlocacao*0.80).'" AND valorlocacao <= "'.($imo->valorlocacao*1.20).'")');
        }else{
            array_push($cond,'(valorlocacao >= "'.($imo->valorlocacao*0.80).'" AND valorlocacao <= "'.($imo->valorlocacao*1.20).'")');
            array_push($cond,'(valorvenda >= "'.($imo->valorvenda*0.80).'" AND valorvenda <= "'.($imo->valorvenda*1.20).'")');
        }

		$cond = implode(' AND ',$cond);
		$dados['semelhantes'] = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','4');
        ############################################
		############################################
		## CONFIGURAÇÕES DA PÁGINA
		$dados['titulo'] = Titulo($imo,true,true).' - '.$dados['config']->titulo;
		$dados['descricao'] = Redutor('Código '.$imo->codigo.' - '.$imo->descricao,255);
		$dados['keywords'] = SetNulo(Keywords($imo->descricao));
		$dados['robots'] = $dados['robots'];
        ####################
        ## SEO TAGS
		$dados['imo_codigo'] = $imo->codigo;
		$dados['imo_titulo'] = Titulo($imo,true,false);
		$dados['imo_descricao'] = nl2br($imo->descricao);
		$dados['imo_foto'] = Foto($imo->foto,'400x400','jpg');
        ############################################
		############################################
        ## LOG DE RASTREAMENTO DE LEADS E ACESSOS DO USUÁRIO
        $lead_nome = $this->session->get('P3dr0m4RiaNo_nome');
        $lead_email = $this->session->get('P3dr0m4RiaNo_email');
        $lead_fone = $this->session->get('P3dr0m4RiaNo_fone');
        $lead_url = CurrentURL();

		if( !empty($lead_nome) && !empty($lead_email) ){
            $historico = $this->SiteModel->getRegs('tb_historico',array(
                'imovel' => $lead_url,
                'email' => $lead_email
            ))->getNumRows();

			if( empty($historico) ){
				$this->SiteModel->Add('tb_historico',array(
					'data' => date("Y-m-d H:i:s"),
					'nome' => $lead_nome,
					'email' => $lead_email,
					'telefone' => $lead_fone,
					'imovel' => $lead_url,
                    'interesse' => $dados['modo'],
                    'dados' => serialize(getUserIP()),
                    'origem' => SetNulo($dados['origem'])
				));
			}
		}
        ############################################
		############################################
        $dados['logado'] = $this->session->get('P3dr0m4RiaNo_email');
		//$dados['logado'] = 'OK';
		############################################
		############################################
        return view('site/imovel/index', $dados);
        ############################################
		############################################
    }

}