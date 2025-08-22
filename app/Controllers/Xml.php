<?php
namespace App\Controllers;

class Xml extends BaseController{

    public function index(){
		#################################################
		#################################################
		Redireciona(base_url(),'301');
		die();
		#################################################
		#################################################
	}
    ######################################################################################################
    ######################################################################################################
    public function ads(){
		#################################################
		#################################################
		header('Content-Type: text/csv; charset=utf-8');
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 0);
		set_time_limit(0);
        #################################################
		#################################################
        $dados = $this->dados;
        $config = $dados['config'];
		#################################################
		#################################################
		## TRATAMENTO DE CATEGORIAS
		$Categs = array(
			"Apartamento" => "apartment",
			"Apartamento JK" => "apartment",
			"Area" => "land",
			"Box" => "other",
			"Casa" => "house",
			"Casa Comercial" => "house",
			"Casa em Condomínio" => "house",
			"Cobertura" => "apartment",
			"Cobertura Comercial" => "other",
			"Conjunto/Sala" => "other",
			"Depósito/Pavilhão" => "manufactured",
			"Duplex" => "house",
			"Empreendimento" => "condo",
			"Fazenda" => "land",
			"Flat" => "apartment",
			"Kitnet" => "apartment",
			"Hotel" => "other",
			"Lançamento" => "condo",
			"Loft" => "apartment",
			"Loja" => "other",
			"Outros" => "other",
			"Pavilhão" => "manufactured",
			"Pousada" => "manufactured",
			"Predio" => "manufactured",
			"Sala Comercial" => "other",
			"Sítio" => "land",
			"Sobrado" => "house",
			"Studio" => "house",
			"Terreno" => "land",
			"Terreno em Condominio" => "land"
		);
		#################################################
		#################################################
		## PARAMETROS
        unset($cond);
        $cond = array();
        $ordem = array('id','asc');
        array_push($cond,'(status = "1")');
        $cond = implode(' AND ',$cond);

        $imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','10000');
        #################################################
		#################################################
		$fp = fopen('php://output', 'w');

		$cabecalho = array('Listing ID','Listing name','Final URL','Image URL','City name','Description','Price','Property type','Listing type','Contextual keywords','Address');
		fputcsv($fp, $cabecalho, ',');
        #################################################
		#################################################
		foreach( $imoveis->getResult() as $imovel ){
			#################################################
		    #################################################
			$reg = array();
			#################################################
		    #################################################
			if( array_key_exists($imovel->categoria, $Categs) ){
				$categoria = $Categs[$imovel->categoria];
			}else{
				$categoria = "other";
			}
			#################################################
		    #################################################
			array_push($reg,$imovel->codigo);
			array_push($reg,Titulo($imovel));
			array_push($reg,URL($imovel));
			array_push($reg,Foto($imovel->foto,'g','jpg'));
			array_push($reg,$imovel->cidade);
			array_push($reg,Redutor($imovel->descricao,500));
			array_push($reg,(($imovel->modo == 'A')?$imovel->valorlocacao:$imovel->valorvenda)." BRL");
			array_push($reg,$categoria);
			array_push($reg,(($imovel->modo == 'A')?'rent':'sale'));
			array_push($reg,Keywords(Redutor($imovel->descricao,500)));
			array_push($reg,$imovel->endereco.", ".$imovel->numero." - ".$imovel->bairro." - ".$imovel->Cidcidadeade." - ".$imovel->uf);
			fputcsv($fp, $reg, ',');
			unset($reg);
		}
        ####################################################
		####################################################
		die();
		####################################################
		####################################################
	}
    ######################################################################################################
    ######################################################################################################
    public function google(){
		####################################################
		####################################################
		header('Content-Type: application/xml; charset=utf-8');
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 0);
		set_time_limit(0);
		#################################################
		#################################################
        $dados = $this->dados;
        $config = $dados['config'];
		#################################################
		#################################################
		## PARAMETROS
		$cond = array();
		$ordem = array('id','asc');
		array_push($cond,'(foto != "")');
		array_push($cond,'(status = "1")');
        array_push($cond,'(modo like "%V%")');
		$cond = implode(' AND ',$cond);

		$imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','1000')->getResult();
		####################################################
		####################################################
		echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
		echo '<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">'.PHP_EOL;
		echo '<channel>'.PHP_EOL;
		echo '<title><![CDATA['.$config->titulo.']]></title>'.PHP_EOL;
		echo '<link>'.base_url().'</link>'.PHP_EOL;
		echo '<description><![CDATA['.Redutor($config->descricao,500).']]></description>'.PHP_EOL;
        ####################################################
		####################################################
		foreach( $imoveis as $imovel ){
			#################################################
		    #################################################
			echo "\t<item>".PHP_EOL;
			echo "\t\t<g:id>".$imovel->codigo."</g:id>".PHP_EOL;
			echo "\t\t<g:title><![CDATA[".Titulo($imovel)."]]></g:title>".PHP_EOL;
			echo "\t\t<g:description><![CDATA[".Redutor($imovel->descricao,5000)."]]></g:description>".PHP_EOL;
			echo "\t\t<g:link>".URL($imovel)."</g:link>".PHP_EOL;
			echo "\t\t<g:image_link>".Foto($imovel->foto,'g','jpg')."</g:image_link>".PHP_EOL;
			echo "\t\t<g:brand><![CDATA[".$config->titulo."]]></g:brand>".PHP_EOL;
			echo "\t\t<g:condition>new</g:condition>".PHP_EOL;
			echo "\t\t<g:availability>in stock</g:availability>".PHP_EOL;
			echo "\t\t<g:price>".$imovel->valorvenda." BRL</g:price>".PHP_EOL;
			echo "\t</item>".PHP_EOL;
            #################################################
		    #################################################
		}
        ####################################################
		####################################################
		echo '</channel>'.PHP_EOL;
		echo '</rss>';
        ####################################################
		####################################################
		die();
		####################################################
		####################################################
	}
    ######################################################################################################
    ######################################################################################################
    public function facebook(){
		####################################################
		####################################################
		header('Content-Type: application/xml; charset=utf-8');
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 0);
		set_time_limit(0);
        #################################################
		#################################################
        $dados = $this->dados;
        $config = $dados['config'];
		#################################################
		#################################################
		## TRATAMENTO DE CATEGORIAS
		$Categs = array(
			"Apartamento" => "apartment",
			"Apartamento JK" => "apartment",
			"Area" => "land",
			"Box" => "other",
			"Casa" => "house",
			"Casa Comercial" => "house",
			"Casa em Condomínio" => "house",
			"Cobertura" => "apartment",
			"Cobertura Comercial" => "other",
			"Conjunto/Sala" => "other",
			"Depósito/Pavilhão" => "manufactured",
			"Duplex" => "house",
			"Empreendimento" => "condo",
			"Fazenda" => "land",
			"Flat" => "apartment",
			"Kitnet" => "apartment",
			"Hotel" => "other",
			"Lançamento" => "condo",
			"Loft" => "apartment",
			"Loja" => "other",
			"Outros" => "other",
			"Pavilhão" => "manufactured",
			"Pousada" => "manufactured",
			"Predio" => "manufactured",
			"Sala Comercial" => "other",
			"Sítio" => "land",
			"Sobrado" => "house",
			"Studio" => "house",
			"Terreno" => "land",
			"Terreno em Condominio" => "land"
		);
		####################################################
		####################################################
		## PARAMETROS
		$cond = array();
		$ordem = array('id','asc');
		array_push($cond,'(foto != "")');
		array_push($cond,'(status = "1")');
		$cond = implode(' AND ',$cond);

		$imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','10000')->getResult();
		####################################################
		####################################################
		echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
		echo '<listings>'.PHP_EOL;
		echo '<title><![CDATA['.$config->titulo.']]></title>'.PHP_EOL;
		echo '<description><![CDATA['.Redutor($config->descricao,500).']]></description>'.PHP_EOL;
		echo '<link>'.base_url().'</link>'.PHP_EOL;
        ####################################################
		####################################################
		foreach( $imoveis as $imovel ){
			#################################################
		    #################################################
			$banheiro = (!empty($imovel->banheiros))?$imovel->banheiros:'0';
			$dormitorio = (!empty($imovel->dormitorios))?$imovel->dormitorios:'0';
			$vagas = (!empty($imovel->vagas))?$imovel->vagas:'0';
			$iptu = (!empty($imovel->iptu))?number_format($imovel->iptu,0,'',''):'0';
			$condominio = (!empty($imovel->condominio))?number_format($imovel->condominio,0,'',''):'0';
			#################################################
		    #################################################
			if( array_key_exists($imovel->categoria, $Categs) ){
				$categoria = $Categs[$imovel->categoria];
			}else{
				$categoria = "other";
			}
			#################################################
		    #################################################
			if( $imovel->modo == 'A' ){
				$valor = $imovel->valorlocacao;
				$finalidade = 'for_rent';
			}else{
				$valor = $imovel->valorvenda;
				$finalidade = 'for_sale';
			}
			#################################################
		    #################################################
			## XML DE CADA IMOVEL
			echo "\t<listing>".PHP_EOL;
			echo "\t\t<id>FB_".$imovel->codigo."</id>".PHP_EOL;
			echo "\t\t<home_listing_id>FB_".$imovel->codigo."</home_listing_id>".PHP_EOL;
			echo "\t\t<name><![CDATA[".Titulo($imovel)."]]></name>".PHP_EOL;
			echo "\t\t<availability>".$finalidade."</availability>".PHP_EOL;
			echo "\t\t<description><![CDATA[".Redutor($imovel->descricao,500)."]]></description>".PHP_EOL;
			echo "\t\t<address format=\"simple\">".PHP_EOL;
			echo "\t\t\t<component name=\"addr1\"><![CDATA[".trim($imovel->endereco.', '.$imovel->numero)."]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"addr2\"><![CDATA[".trim($imovel->bairro)."]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"neighborhood\"><![CDATA[".trim($imovel->bairro)."]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"city\"><![CDATA[".$imovel->cidade."]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"region\"><![CDATA[".trim($imovel->bairro)."]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"country\"><![CDATA[Brasil]]></component>".PHP_EOL;
			echo "\t\t\t<component name=\"postal_code\"><![CDATA[".$imovel->cep."]]></component>".PHP_EOL;
			echo "\t\t</address>".PHP_EOL;
			echo "\t\t<neighborhood><![CDATA[".$imovel->bairro."]]></neighborhood>".PHP_EOL;
			echo "\t\t<latitude>".$imovel->latitude."</latitude>".PHP_EOL;
			echo "\t\t<longitude>".$imovel->longitude."</longitude>".PHP_EOL;
			echo "\t\t<listing_type>".$finalidade."_by_agent</listing_type>".PHP_EOL;
			echo "\t\t<num_baths>".$banheiro."</num_baths>".PHP_EOL;
			echo "\t\t<num_beds>".$dormitorio."</num_beds>".PHP_EOL;
			echo "\t\t<parking_spaces>".$vagas."</parking_spaces>".PHP_EOL;
			echo "\t\t<num_units>1</num_units>".PHP_EOL;
			echo "\t\t<price>".number_format($valor,0,'','').' BRL'."</price>".PHP_EOL;
			echo "\t\t<property_tax>".$iptu.' BRL'."</property_tax>".PHP_EOL;
			echo "\t\t<condo_fee>".$condominio.' BRL'."</condo_fee>".PHP_EOL;
			echo "\t\t<property_type>".$categoria."</property_type>".PHP_EOL;
			echo "\t\t<url>".URL($imovel)."</url>".PHP_EOL;
			echo "\t\t<image>".PHP_EOL;
            echo "\t\t\t<url>".Foto($imovel->foto,'g','jpg')."</url>".PHP_EOL;
			echo "\t\t</image>".PHP_EOL;
			echo "\t</listing>".PHP_EOL;
            #################################################
		    #################################################
		}
        ####################################################
		####################################################
		echo '</listings>'.PHP_EOL;
        ####################################################
		####################################################
		die();
		####################################################
		####################################################
	}
    ######################################################################################################
    ######################################################################################################
}