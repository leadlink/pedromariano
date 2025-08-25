<?php
use CodeIgniter\Config\Services;
use App\Models\SiteModel;
use App\Libraries\Paginacao;
################################################################
################################################################
if( !function_exists('Busca') ){

	function Busca($busca){
		#############################################
		#############################################
        $uri = Services::uri();
        $session = Services::session();
        $siteModel = new SiteModel();
		#############################################
		#############################################
		$config = $siteModel->getRegistro('tb_config', 'id', '1');
		#############################################
		#############################################
		// BUSCA
		$search = arrayToObject($busca);

		if( isset($search->busca) ){
			$modo = $search->busca;
		}elseif( isset($search->ajax) ){
			$modo = $search->ajax;
		}else{
			$modo = 'comprar';
		}
		unset($busca['busca']);
		unset($busca['ajax']);
		#############################################
		#############################################
		// ARRAY de TAGS
		$tags = array();
		#############################################
		#############################################
		$tt = $uri->getTotalSegments();
		$ord = $uri->getSegment($tt-2).'-'.$uri->getSegment($tt-1);

		(empty($ord))? $ord = 'vlr-asc':'';

		switch($ord){
			case 'data-desc':
				$ordem = array('atualizacao','desc');
				$ord_ativo = '3';
			break;
			case 'vlr-asc':
				if( $modo == 'alugar' ){
					$ordem = array('valorlocacao','asc');
				}else{
					$ordem = array('valorvenda','asc');
				}
				$ord_ativo = '1';
			break;
			case 'vlr-desc':
				if( $modo == 'alugar' ){
					$ordem = array('valorlocacao','desc');
				}else{
					$ordem = array('valorvenda','desc');
				}
				$ord_ativo = '2';
			break;
			default:
				$ordem = array('atualizacao','desc');
				$ord_ativo = '3';
			break;
		}
		#############################################
		#############################################
		$cond = array();
		$code = '';
		$tags = array();
		#############################################
		#############################################
		array_push($cond,'(status = "1")');
		#############################################
		#############################################
		if( !empty($search->codigo) ){
			array_push($cond,'(codigo like "%'.urldecode($search->codigo).'%" OR referencia like "%'.urldecode($search->codigo).'%")');
			$code = '1';
		}
		#############################################
		#############################################
		if( !empty($search->empreendimento) && empty($code) ){
			if( is_numeric($search->empreendimento) ){
				array_push($cond,'(codigoempreendimento = "'.urldecode($search->empreendimento).'")');
			}else{
				array_push($cond,'(empreendimento like "%'.urldecode($search->empreendimento).'%")');
			}
			$code = '1';
		}
		#############################################
		#############################################
		if( !empty($search->condominio) && empty($code) ){
			if( is_numeric($search->condominio) ){
				array_push($cond,'(codigoempreendimento = "'.urldecode($search->condominio).'")');
				$condominio = $siteModel->getRegistro('tb_condominios','codigo',$search->condominio);
			}else{
				array_push($cond,'(empreendimento like "%'.urldecode($search->condominio).'%")');
				$condominio = $siteModel->getRegistro('tb_condominios','empreendimento',$search->condominio);
			}
			$code = '1';
			unset($search->cidade);
			$search->cidade = URLizer($condominio->cidade);
		}
		#############################################
		#############################################
		if(!empty($search->codigos) && empty($code)){
			$bb = explode("_", $search->codigos );
			$ba = array();
			foreach( $bb as $row ){
				array_push($ba,'(codigo like "%'.urldecode($row).'%" OR referencia like "%'.urldecode($row).'%")');
			}
			array_push($cond,'('.implode(' OR ',$ba).')');
			$code = '1';
		}
		#############################################
		#############################################
		if( !empty($modo) ){
			if( $modo == 'alugar' ){
				array_push($tags,'Alugar');
				$session->set('P3dr0m4RiaNo_modo','Aluguel');
				$data['modo'] = 'Aluguel';
				$modobanner = 'A';
				if( empty($code) ){
					array_push($cond,'(modo like "%A%")');
				}
			}else{
				array_push($tags,'à Venda');
				$session->set('P3dr0m4RiaNo_modo','Venda');
				$data['modo'] = 'Venda';
				$modobanner = 'V';
				if( empty($code) ){
					array_push($cond,'(modo like "%V%")');
				}
			}
		}
		#############################################
		#############################################
		if( !empty($search->cidade) && empty($code) ){
			$cidade = $siteModel->getRegistro('tb_imoveis_cidades','cidade_slug',$search->cidade);
			array_push($tags,$cidade->cidade);
			array_push($cond,'(cidade_id = "'.$cidade->cidade_id.'")');
		}
		#############################################
		#############################################
		if( !empty($search->bairros) && empty($code) ){
			$bb = explode("_", $search->bairros );
			$bx = array();
			$tb = 1;

			foreach($bb as $neight){
				$bairro = $siteModel->getRegs('tb_imoveis_cidades',array(
					'limit' => '1',
					'offset' => '0',
					'order_by' => array(
						'key' => 'bairro',
						'dir' => 'asc'
					),
					'cidade_slug' => $search->cidade,
					'bairro_slug' => $neight
				))->getRow();
				if( $tb <= 10 ){
					array_push($tags,$bairro->bairro);
				}
				array_push($bx,$bairro->bairro_id);
				$tb++;
			}

			$ba = implode('" OR bairro_id = "',$bx);
			array_push($cond,'(bairro_id = "'.$ba.'")');
		}
		#############################################
		#############################################
		if( !empty($search->categorias) && empty($code) ){
			$bb = explode("_", urldecode(urldecode(urldecode($search->categorias))) );
			$bx = array();

			foreach( $bb as $row ){
				$categoria = $siteModel->getRegistro('tb_imoveis_tipos','categoria_slug',$row);
				array_push($bx,$categoria->categoria_id);
				array_push($tags,$categoria->categoria);
			}

			$ba = implode('" OR tipo = "',$bx);
			array_push($cond,'(tipo = "'.$ba.'")');
		}else{
			//array_push($cond,'(categoria != "Empreendimento")');
		}
		#############################################
		#############################################
		if( !empty($search->valor_de) || !empty($search->valor_ate) && empty($code) ){

			if( $modo == 'alugar' ){
				##############################
				$campovalor = "valorlocacao";
				##############################
			}elseif( $modo == 'comprar' ){
				##############################
				$campovalor = "valorvenda";
				##############################
			}
			##############################
			if( !empty($search->valor_de) && !empty($search->valor_ate) ){
				array_push($cond,'('.$campovalor.' >= "'.($search->valor_de*0.90).'" AND '.$campovalor.' <= "'.($search->valor_ate*1.10).'")');
				array_push($tags,'a partir de '.Dinheiro($search->valor_de));
				array_push($tags,'até '.Dinheiro($search->valor_ate));
			}elseif( !empty($search->valor_de) && empty($search->valor_ate) ){
				array_push($cond,'('.$campovalor.' >= "'.($search->valor_de*0.90).'")');
				array_push($tags,'a partir de '.Dinheiro($search->valor_de));
			}elseif( empty($search->valor_de) && !empty($search->valor_ate) ){
				array_push($cond,'('.$campovalor.' <= "'.($search->valor_ate*1.10).'")');
				array_push($tags,'até '.Dinheiro($search->valor_ate));
			}
			##############################
		}
		#############################################
		#############################################
		if( !empty($search->area) && empty($code) ){
			array_push($cond,'(areaprivativa >= "'.$search->area*0.90.'")');
			array_push($tags,'+ de '.$search->area.'m²');
		}
		#############################################
		#############################################
		if( !empty($search->quartos) && empty($code) ){
			array_push($cond,'(dormitorios >= "'.$search->quartos.'")');
			array_push($tags,$search->quartos.'+ '.Dormitorios($search->quartos));
		}
		#############################################
		#############################################
		if( !empty($search->vagas) && empty($code) ){
			array_push($cond,'(vagas >= "'.$search->vagas.'")');
			array_push($tags,$search->vagas.'+ '.Vagas($search->vagas));
		}
		#############################################
		#############################################
		if( !empty($search->suites) && empty($code) ){
			array_push($cond,'(suites >= "'.$search->suites.'")');
			array_push($tags,$search->suites.'+ '.Suites($search->suites));
		}
		#############################################
		#############################################
		if( !empty($search->banheiros) && empty($code) ){
			array_push($cond,'(banheiros >= "'.$search->banheiros.'")');
			array_push($tags,$search->banheiros.'+ '.Banheiros($search->banheiros));
		}
		#############################################
		#############################################
		// DESTAQUES
		if( !empty($search->destaques) && $search->destaques == 's' && empty($code) ){
			array_push($cond,'(destaque = "S" OR superdestaque = "S")');
		}
		#############################################
		#############################################
		// MOBILIADO
		if( !empty($search->mobiliados) && empty($code) ){
			array_push($cond,'(mobiliado = "S")');
		}
		#############################################
		#############################################
		// SEMIMOBILIADO
		if( !empty($search->semimobiliado) && empty($code) ){
			array_push($cond,'(mobiliado = "S")');
		}
		#############################################
		#############################################
		// LANÇAMENTOS
		if( !empty($search->lancamentos) && $search->lancamentos == 's' && empty($code) ){
			array_push($cond,'(lancamento = "S")');
			array_push($tags,'Lançamentos');
		}
		#############################################
		#############################################
		// EXCLUSIVOS
		if( !empty($search->exclusivos) && $search->exclusivos == 's' && empty($code) ){
			array_push($cond,'(exclusivo = "S")');
			array_push($tags,'Exclusivos');
		}
		#############################################
		#############################################
		if( !empty($search->caracteristicas) && empty($code) ){
			$bb = explode("_", $search->caracteristicas);
			$bx = array();

			foreach( $bb as $row ){
				$carac = $siteModel->getRegistro('tb_imoveis_caracteristicas','slug',$row);
				$caracts = explode(";",$carac->sistema);
				foreach( $caracts as $c ){
					array_push($bx,'(caracteristicas LIKE "%'.$c.'%" OR infraestrutura LIKE "%'.$c.'%")');
				}
				//array_push($tags,$carac->nome);
			}
			$ba = implode(' OR ',$bx);
			array_push($cond,$ba);
		}
		##########################################################################################
		##########################################################################################
        ##########################################################################################
		##########################################################################################
		if( !empty($cond) ){
			$cond = implode(' AND ',$cond);
		}

		$offset = $uri->getSegment($tt);

		if( empty($offset) || !is_numeric($offset) || $offset == '1' ){
			$offset = '1';
		}else{
			$offset = $offset;
		}

		$todos = $siteModel->BuscaImoveis($cond,$ordem);
		$total = $todos->getNumRows();
		$imoveis = $siteModel->BuscaImoveis($cond,$ordem,$offset,LIMITE);
		$data['imoveis'] = $imoveis->getResult();
		#############################################
		#############################################
		// PAGINAÇÃO
		$pgconfig['uri'] 			= $uri;
		$pgconfig['base_url'] 		= base_url().'busca/'.$modo.'/';
		$pgconfig['uri_segment'] 	= $uri->getTotalSegments();
		$pgconfig['total_rows'] 	= $total;
		$pgconfig['per_page'] 		= LIMITE;
		$pgconfig['num_links']		= 3;
		$pgconfig['use_page_numbers'] = TRUE;
		$pgconfig['prev_link']	 	= 'Página Anterior';
		$pgconfig['next_link']		= 'Próxima Página';
		$pgconfig['url_complement'] = arrayToUrlSearch2($busca);

		$paginacao = new Paginacao($pgconfig);
		$data['paginacao'] 	= $paginacao->create_links();
		#############################################
		#############################################
		$origem = $session->get('P3dr0m4RiaNo_origem');

		if( !empty($origem) ){
			$busca['origem'] = $origem;
		}
		#############################################
		#############################################
		// PARÂMETROS
		$data['url'] = $pgconfig['base_url'].arrayToUrlSearch3($busca);
		$data['ordem'] = $ord_ativo;
		$data['total'] = $total;
		$data['busca'] = $search;
		$data['totaltags'] = count($tags);
		$data['tags'] = $tags;
		##########################################################################################
		##########################################################################################
        ##########################################################################################
		##########################################################################################
		// TITULO E DESCRICAO
		$titulo = array();
		$descricao = array();
		$prebusca = array();
		$titulobusca = array();
        #############################################
		#############################################
		if( !empty($total) ){
			array_push($titulo,$total);
			array_push($descricao,$total);
			array_push($prebusca,'<strong>'.$total.'</strong>');
		}
        #############################################
		#############################################
		$bb = explode("_", urldecode($search->categorias));

		if( !empty($search->categorias) && count($bb) == 1 && empty($code) ){

			$categoria = $siteModel->getRegistro('tb_imoveis_tipos','categoria_slug',$bb[0]);
			if( $total <= 1){
				$categs = $categoria->singular;
			}else{
				$categs = $categoria->categoria;
			}

			array_push($titulo,$categs);
			array_push($descricao,$categs);
			array_push($prebusca,$categs);
		}else{
			if( empty($total) ){
				array_push($titulo,'Imóveis');
				array_push($descricao,'Imóveis');
				array_push($prebusca,'Imóveis');
			}elseif( $total <= 1){
				array_push($titulo,'Imóvel');
				array_push($descricao,'Imóvel');
				array_push($prebusca,'Imóvel');
			}else{
				array_push($titulo,'Imóveis');
				array_push($descricao,'Imóveis');
				array_push($prebusca,'Imóveis');
			}
		}
        #############################################
		#############################################
		if( !empty($search->lancamentos) ){
			if( $total <= 1){
				array_push($titulo,'lançamento');
				array_push($descricao,'lançamento');
				array_push($prebusca,'lançamento');
			}else{
				array_push($titulo,'lançamentos');
				array_push($descricao,'lançamentos');
				array_push($prebusca,'lançamentos');
			}
		}
		#############################################
		#############################################
		if( !empty($search->mobiliados) ){
			if( $total <= 1){
				array_push($titulo,'mobiliado');
				array_push($descricao,'mobiliado');
				array_push($prebusca,'mobiliado');
			}else{
				array_push($titulo,'mobiliados');
				array_push($descricao,'mobiliados');
				array_push($prebusca,'mobiliados');
			}
		}
        #############################################
		#############################################
		if( empty($search->condominio) ){
			if( $modo == 'alugar' ){
				array_push($titulo,'para alugar');
				array_push($descricao,'para alugar');
				array_push($prebusca,'para alugar');
			}else{
				array_push($titulo,'à venda');
				array_push($descricao,'à venda');
				array_push($prebusca,'à venda');
			}
		}
        #############################################
		#############################################
		array_push($titulobusca,implode(" ",$prebusca));
        #############################################
		#############################################
		if( !empty($search->destaques) ){
			array_push($titulo,'em destaque');
			array_push($descricao,'em destaque');
			array_push($titulobusca,'em destaque');
		}
        #############################################
		#############################################
		if( !empty($search->quartos) ){
			array_push($titulo,'com '.$search->quartos.' '.Dormitorios($search->quartos));
			array_push($descricao,'com '.$search->quartos.' '.Dormitorios($search->quartos));
			array_push($titulobusca,'com '.$search->quartos.' '.Dormitorios($search->quartos));
		}
        #############################################
		#############################################
		if( !empty($search->area) ){
			array_push($titulo,'com '.$search->area.'m²');
			array_push($descricao,'com '.$search->area.'m²');
			array_push($titulobusca,'com '.$search->area.'m²');
		}
        #############################################
		#############################################
		if( !empty($search->caracteristicas) && empty($code) ){
			$bb = explode("_", urldecode(urldecode(urldecode($search->caracteristicas))) );
			$bx = array();

			foreach($bb as $row){
				$carac = $siteModel->getRegistro('tb_imoveis_caracteristicas','slug',$row);
				array_push($tags,$carac->nome);
				array_push($bx,$carac->nome);
			}

			array_push($descricao,'com '.implode(', ',$bx));
			array_push($titulobusca,'com '.implode(', ',$bx));
		}
        #############################################
		#############################################
		if( !empty($search->empreendimento) ){
			array_push($titulo,'no '.urldecode($search->empreendimento));
			array_push($descricao,'no '.urldecode($search->empreendimento));
			array_push($titulobusca,'no '.urldecode($search->empreendimento));
		}
		if( !empty($search->condominio) && $condominio->empreendimento ){
			array_push($titulo,'no '.$condominio->empreendimento);
			array_push($descricao,'no '.$condominio->empreendimento);
			$titulocondominio = ' no '.$condominio->empreendimento;
		}
        #############################################
		#############################################
		if( !empty($search->bairros) && empty($code) ){
			$bb = explode("_", urldecode($search->bairros));
			$bx = array();

			if( count($bb) == 1 ){
				$bairro = $siteModel->getRegs('tb_imoveis_cidades',array(
						'limit' => '1',
						'offset' => '0',
						'order_by' => array(
							'key' => 'bairro',
							'dir' => 'asc'
						),
						'cidade_slug' => $search->cidade,
						'bairro_slug' => $bb[0]
					))->getRow();

				array_push($titulo,'no bairro '.$bairro->bairro);
				array_push($descricao,'no bairro '.$bairro->bairro);
				$titulobairro = ' no bairro <strong>'.$bairro->bairro.'</strong>';
			}elseif( count($bb) <= 5 ){
				$titulobairro = ' em <strong>alguns bairros</strong>';
			}else{
				$titulobairro = ' em <strong>vários bairros</strong>';
			}
		}else{
			$titulobairro = '';
		}
        #############################################
		#############################################
		if( !empty($search->cidade) ){
			$cidade = $siteModel->getRegistro('tb_imoveis_cidades','cidade_slug',$search->cidade);
			array_push($titulo,'em '.$cidade->cidade.' - '.$cidade->uf);
			array_push($descricao,'em '.$cidade->cidade.' - '.$cidade->uf);
			$titulocidade = ' em <strong>'.$cidade->cidade.' - '.$cidade->uf.'</strong>';
		}
		#############################################
		#############################################
		if( empty($offset) || !is_numeric($offset) ){
			array_push($titulo,'- Página 1');
		}else{
			array_push($titulo,'- Página '.$offset);
		}
		#############################################
		#############################################
		$data['seotitle'] = implode(" ",$titulo).' - '.$config->titulo;
		$data['seodesc'] = "Página ".$offset." do resultado de busca com ".implode(" ",$descricao);
		$data['titulobusca'] = trim(implode(", ",$titulobusca).$titulocondominio.$titulobairro.$titulocidade);
		##########################################################################################
		##########################################################################################
		// BANNER DA BUSCA
		if( ( !empty($search->valor_de) || !empty($search->valor_ate) ) && empty($code) ){

			if( !empty($search->valor_de) && !empty($search->valor_ate) ){
				#############################################
				$banner = $siteModel->getRegs('tb_banners_busca',array(
					'limit' => '1',
					'offset' => '0',
					'order_by' => array(
						'key' => 'id',
						'dir' => 'random'
					),
					'like' => array(
						'campo' => 'modo',
						'valor' => $modobanner
					),
					'status' => '1',
					'valor_de <=' => $search->valor_de,
					'valor_ate >=' => $search->valor_ate
				));
				#############################################
			}elseif( !empty($search->valor_de) && empty($search->valor_ate) ){
				#############################################
				$banner = $siteModel->getRegs('tb_banners_busca',array(
					'limit' => '1',
					'offset' => '0',
					'order_by' => array(
						'key' => 'id',
						'dir' => 'random'
					),
					'like' => array(
						'campo' => 'modo',
						'valor' => $modobanner
					),
					'status' => '1',
					'valor_de <=' => $search->valor_de
				));
				#############################################
			}elseif( empty($search->valor_de) && !empty($search->valor_ate) ){
				#############################################
				$banner = $siteModel->getRegs('tb_banners_busca',array(
					'limit' => '1',
					'offset' => '0',
					'order_by' => array(
						'key' => 'id',
						'dir' => 'random'
					),
					'like' => array(
						'campo' => 'modo',
						'valor' => $modobanner
					),
					'status' => '1',
					'valor_ate >=' => $search->valor_ate
				));
				#############################################
			}

			if( empty($banner->getNumRows()) ){
				#############################################
				$banner = $siteModel->getRegs('tb_banners_busca',array(
					'limit' => '1',
					'offset' => '0',
					'order_by' => array(
						'key' => 'id',
						'dir' => 'random'
					),
					'like' => array(
						'campo' => 'modo',
						'valor' => $modobanner
					),
					'status' => '1'
				));
				#############################################
			}

		}else{
			#############################################
			$banner = $siteModel->getRegs('tb_banners_busca',array(
				'limit' => '1',
				'offset' => '0',
				'order_by' => array(
					'key' => 'id',
					'dir' => 'random'
				),
				'like' => array(
					'campo' => 'modo',
					'valor' => $modobanner
				),
				'status' => '1'
			));
			#############################################
		}

		if( !empty($banner->getNumRows()) ){
			$data['banner'] = $banner->getRow();
			$data['existe_banner'] = 1;
		}else{
			$data['banner'] = NULL;
			$data['existe_banner'] = 0;
		}
		##########################################################################################
		##########################################################################################
		return $data;
		##########################################################################################
		##########################################################################################
	}
}
################################################################
################################################################
?>