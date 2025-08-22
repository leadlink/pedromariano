<?php
namespace App\Controllers;

class Sitemap extends BaseController{

    public function index(){
		#################################################
		#################################################
		header('Content-type: application/xml; charset=utf-8');
		#################################################
		#################################################
		echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
		echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;
		#################################################
		#################################################
		echo '<sitemap>'.PHP_EOL;
		echo '	<loc>'.base_url().'sitemaps/padrao/sitemap.xml</loc>'.PHP_EOL;
		echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
		echo '</sitemap>'.PHP_EOL;
		#################################################
		#################################################
        $cidades = $this->SiteModel->getRegs('tb_imoveis_cidades',array(
            'order_by' => array(
                'key' => 'cidade',
                'dir' => 'asc'
            ),
            'groupby' => 'cidade',
        ))->getResult();
        #################################################
		#################################################
        ## FOREACH DAS CIDADES
        foreach( $cidades as $cidade ){
            #################################################
		    #################################################
            $bairros = $this->SiteModel->getRegs('tb_imoveis_cidades',array(
                    'order_by' => array(
                        'key' => 'bairro',
                        'dir' => 'asc'
                    ),
                    'cidade_id' => $cidade->cidade_id
                ))->getResult();
            #################################################
		    #################################################
            ## FOREACH DOS BAIRROS
            foreach( $bairros as $bairro ){
				##############################
				##############################
				unset($cond);
				$cond = array();
				$ordem = array('id','asc');
				array_push($cond,'(cidade_id = "'.$cidade->cidade_id.'")');
				array_push($cond,'(bairro_id = "'.$bairro->bairro_id.'")');
				array_push($cond,'(modo like "%V%")');
				array_push($cond,'(status = "1")');
				$cond = implode(' AND ',$cond);

				$total = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','1')->getNumRows();
				##############################
				##############################
				if( $total > 0 ){
					##############################
					echo '<sitemap>'.PHP_EOL;
					echo '	<loc>'.base_url().'sitemaps/busca/comprar/cidade/'.$bairro->cidade_slug.'/bairros/'.$bairro->bairro_slug.'/sitemap.xml</loc>'.PHP_EOL;
					echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
					echo '</sitemap>'.PHP_EOL;
					##############################
				}
				##############################
				##############################
				unset($cond);
				$cond = array();
				$ordem = array('id','asc');
				array_push($cond,'(cidade_id = "'.$cidade->cidade_id.'")');
				array_push($cond,'(bairro_id = "'.$bairro->bairro_id.'")');
				array_push($cond,'(modo like "%A%")');
				array_push($cond,'(status = "1")');
				$cond = implode(' AND ',$cond);

				$total = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','1')->getNumRows();
				##############################
				##############################
				if( $total > 0 ){
					##############################
					echo '<sitemap>'.PHP_EOL;
					echo '	<loc>'.base_url().'sitemaps/busca/alugar/cidade/'.$bairro->cidade_slug.'/bairros/'.$bairro->bairro_slug.'/sitemap.xml</loc>'.PHP_EOL;
					echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
					echo '</sitemap>'.PHP_EOL;
					##############################
				}
				##############################
				##############################
			}
            #################################################
		    #################################################
        }
        #################################################
		#################################################
        echo '</sitemapindex>';
		die();
		#################################################
		#################################################
	}
    ######################################################################################################
    ######################################################################################################
    public function busca(){
		#################################################
		#################################################
		header('Content-type: application/xml; charset=utf-8');
		#################################################
		#################################################
        $busca = UriToAssoc($this->uri->getSegments(),1);
		$search = arrayToObject($busca);
		#################################################
		#################################################
		$imos = array();
		$cond = array();
		#################################################
		#################################################
		array_push($cond,'(status = "1")');
		##############################
		##############################
		if( $search->busca == 'alugar' ){
			array_push($cond,'(modo like "%A%")');
		}elseif( $search->busca == 'comprar' ){
			array_push($cond,'(modo like "%V%")');
		}
		##############################
		##############################
		$cidade = $this->SiteModel->getRegs('tb_imoveis_cidades',array(
                'limit' => '1',
                'offset' => '0',
                'order_by' => array(
                    'key' => 'cidade',
                    'dir' => 'asc'
                ),
                'cidade_slug' => $search->cidade,
            ))->getRow();
		array_push($cond,'(cidade_id = "'.$cidade->cidade_id.'")');
		##############################
		##############################
		$bairro = $this->SiteModel->getRegs('tb_imoveis_cidades',array(
				'limit' => '1',
				'offset' => '0',
				'order_by' => array(
					'key' => 'bairro',
					'dir' => 'asc'
				),
                'cidade_slug' => $search->cidade,
				'bairro_slug' => $search->bairros
			))->getRow();

		array_push($cond,'(bairro_id = "'.$bairro->bairro_id.'")');
		#################################################
		#################################################
		## CONSULTA IMÓVEIS NO BD
		$cond = implode(' AND ',$cond);

		$imoveis = $this->SiteModel->BuscaImoveis($cond,$ordem,'1','20000');
        $total = $imoveis->getNumRows();
		#################################################
		#################################################
		if( $total > 0 ){
			#################################################
		    #################################################
			echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
			echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'.PHP_EOL;
			#################################################
		    #################################################
			$pg = ceil($total/LIMITE);
			#################################################
		    #################################################
			// PAGINAS DE BUSCA PAGINADAS
			for( $i = 1; $i <= $pg; $i++ ){
				echo '<url>'.PHP_EOL;
				echo '	<loc>'.base_url().'busca/'.$search->busca.'/cidade/'.$search->cidade.'/bairros/'.$search->bairros.'/'.$i.'/</loc>'.PHP_EOL;
				echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
				echo '	<changefreq>daily</changefreq>'.PHP_EOL;
				echo '	<priority>0.8</priority>'.PHP_EOL;
				echo '</url>'.PHP_EOL;
			}
			#################################################
		    #################################################
			foreach( $imoveis->getResult() as $imovel ){
				#############################################
				#############################################
				$galeria = $this->SiteModel->getRegs('tb_imoveis_fotos',array(
					'limit' => '4',
					'offset' => '0',
					'order_by' => array(
						'key' => 'ordem',
						'dir' => 'asc'
					),
					'imovel' => $imovel->id,
					'foto !=' => $imovel->foto
				));
				#############################################
				#############################################
				echo '<url>'.PHP_EOL;
				echo '	<loc>'.URL($imovel).'</loc>'.PHP_EOL;
				echo '	<priority>0.8</priority>'.PHP_EOL;
				echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
				echo '	<changefreq>weekly</changefreq>'.PHP_EOL;
				echo '	<image:image>'.PHP_EOL;
				echo '		<image:loc>'.Foto($imovel->foto,'g','jpg').'</image:loc>'.PHP_EOL;
				echo '		<image:license>https://creativecommons.org/licenses/by-nc-nd/4.0/</image:license>'.PHP_EOL;
				echo '	</image:image>'.PHP_EOL;
				##############################
				##############################
				// MAIS FOTOS
				if( $galeria->getNumRows() > 0 ){
					foreach( $galeria->getResult() as $row ){
						echo '	<image:image>'.PHP_EOL;
						echo '		<image:loc>'.Foto($row->foto,'g','jpg').'</image:loc>'.PHP_EOL;
						echo '		<image:license>https://creativecommons.org/licenses/by-nc-nd/4.0/</image:license>'.PHP_EOL;
						echo '	</image:image>'.PHP_EOL;
					}
				}
				##############################
				##############################
				echo '</url>'.PHP_EOL;
				#################################################
		        #################################################
			}
			#################################################
		    #################################################
			echo '</urlset>';
			#################################################
		    #################################################
		}
		##############################
		##############################
		die();
		####################################################
		####################################################
	}
    ######################################################################################################
    ######################################################################################################
    public function padrao(){
		#################################################
		#################################################
		header('Content-type: application/xml; charset=utf-8');
		#################################################
		#################################################
		echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;
		#################################################
		#################################################
		$secoes = $this->SiteModel->getRegs('tb_secoes',array(
				'order_by' => array(
					'key' => 'ordem',
					'dir' => 'asc'
				),
				'status' => '1'
			))->getResult();

		foreach( $secoes as $secao ){
			echo '<url>'.PHP_EOL;
			echo '	<loc>'.base_url().$secao->caminho.'</loc>'.PHP_EOL;
			echo '	<lastmod>'.date('Y-m-d').'</lastmod>'.PHP_EOL;
			echo '	<changefreq>'.$secao->frequencia.'</changefreq>'.PHP_EOL;
			echo '	<priority>'.$secao->prioridade.'</priority>'.PHP_EOL;
			echo '</url>'.PHP_EOL;
		}
		#################################################
		#################################################
		echo '</urlset>';
		die();
		####################################################
		####################################################
	}
    ######################################################################################################
    ######################################################################################################
}