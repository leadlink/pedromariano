<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Libraries\Imoview;

class Importacao extends BaseController{
    ######################################################################################################
    ######################################################################################################
    public function index(){
        ############################################
		############################################
        Redireciona(base_url());
		die();
        ############################################
		############################################
    }
    ######################################################################################################
    ######################################################################################################
    public function carga(){
        ############################################
		############################################
        // SETA OS LIMITES
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 30000);
		ini_set('max_input_time', 30000);
		set_time_limit(30000);
		header('Content-Type: text/html; charset=utf-8');
        ############################################
		############################################
        $inicio = microtime(true);
        $total = 0;
        $logimoveis = array();
        ############################################
		############################################
        define('PERPAGE','20');
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        $Imoview = new Imoview();

        $parametros = array(
            "finalidade" => "0",
            "ordenacao" => "dataatualizacaodesc",
            "numeroPagina" => "1",
            "numeroRegistros" => PERPAGE
        );

        $imoveis = $Imoview->Pesquisa($parametros);
        ############################################
		############################################
        $paginas = ceil($imoveis['quantidade']/PERPAGE);
        ############################################
		############################################
        if( $imoveis['quantidade'] > 0 && count($imoveis['lista']) > 0 ){
            ############################################
            ############################################
            // LIMPA AS TABELAS DE IMÓVEIS
            $this->SiteModel->Truncate('tb_imoveis_carga');
            ############################################
            ############################################
            foreach( $imoveis['lista'] as $imo ){
                ############################################
                ############################################
                // SALVA IMÓVEL
                $imovel = arrayToObject($imo);

                unset($reg);
				$reg['codigo'] = ((!empty($imovel->codigoauxiliar))?$imovel->codigoauxiliar:$imovel->codigo);
                $reg['referencia'] = $imovel->codigo;
                $reg['atualizacao'] = DataConv($imovel->datahoraultimaalteracao,'FullBRtoBD');
				$reg['cadastro'] = DataConv($imovel->datahoracadastro,'FullBRtoBD');
                $reg['data'] = date("Y-m-d H:i:s");
				$reg['processado'] = NULL;
				$reg['status'] = '0';
                $reg['log'] = serialize($imo);

                $this->SiteModel->Add('tb_imoveis_carga',$reg);
                $total++;
                array_push($logimoveis,$reg['codigo']);
                ############################################
                ############################################
			}
            ############################################
            ############################################
            for( $i = 2; $i <= $paginas; $i++ ){
                ############################################
                ############################################
                $parametros['numeroPagina'] = $i;
                $imoveis2 = $Imoview->Pesquisa($parametros);
                ############################################
                ############################################
                if( $imoveis2['quantidade'] > 0 && count($imoveis2['lista']) > 0 ){
                    ########################################
                    ########################################
                    foreach( $imoveis2['lista'] as $imo ){
                        ########################################
                        ########################################
                        // SALVA IMÓVEL
                        $imovel = arrayToObject($imo);

                        unset($reg);
                        $reg['codigo'] = ((!empty($imovel->codigoauxiliar))?$imovel->codigoauxiliar:$imovel->codigo);
                        $reg['referencia'] = $imovel->codigo;
                        $reg['atualizacao'] = DataConv($imovel->datahoraultimaalteracao,'FullBRtoBD');
                        $reg['cadastro'] = DataConv($imovel->datahoracadastro,'FullBRtoBD');
                        $reg['data'] = date("Y-m-d H:i:s");
                        $reg['processado'] = NULL;
                        $reg['status'] = '0';
                        $reg['log'] = serialize($imo);

                        $this->SiteModel->Add('tb_imoveis_carga',$reg);
                        $total++;
                        array_push($logimoveis,$reg['codigo']);
                        ########################################
                        ########################################
                    }
                    ########################################
                    ########################################
                }
                ############################################
                ############################################
            }
            ############################################
            ############################################
            // SALVA LOG
			unset($log);
			$fim = microtime(true);

			$log['tipo'] = 'Carga de Imóveis '.$total.'/'.$imoveis['quantidade'];
			$log['imoveis'] = $total;
			$log['log'] = implode(";",$logimoveis);
			$log['data'] = date("Y-m-d H:i:s");
			$log['tempo'] = number_format($fim-$inicio, 0, '', '');
			$log['status'] = 'S';

			$this->SiteModel->Add('tb_log_importacao',$log);
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Carga de Imóveis do Imoview (Universal)</h2>";
			echo "<h3>Imóveis na API: ".$imoveis['quantidade']."</h3>";
            echo "<h3>Imóveis Salvos na Carga: ".$total."</h3>";
            echo "<hr>";
			die();
            ############################################
            ############################################
        }else{
            ############################################
            ############################################
            // SALVA LOG
			unset($log);
			$fim = microtime(true);

			$log['tipo'] = 'Erro na Carga de Imóveis';
			$log['imoveis'] = 0;
			$log['log'] = NULL;
			$log['data'] = date("Y-m-d H:i:s");
			$log['tempo'] = number_format($fim-$inicio, 0, '', '');
			$log['status'] = 'E';

			$this->SiteModel->Add('tb_log_importacao',$log);
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Carga de Imóveis do Imoview (Universal)</h2>";
			echo "<h3>Ocorreu um erro na Carga</h3>";
            echo "<hr>";
			die();
            ############################################
            ############################################
        }
        ############################################
		############################################
    }
    ######################################################################################################
    ######################################################################################################
    public function imoveis( $ord = 'asc' ){
        ############################################
		############################################
        // SETA OS LIMITES
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 30000);
		ini_set('max_input_time', 30000);
		set_time_limit(30000);
		header('Content-Type: text/html; charset=utf-8');
        ############################################
		############################################
        $inicio = microtime(true);
        ############################################
		############################################
        $ins = 0;
        $upd = 0;
        $logimoveis = array();
        $ulogimoveis = array();
        ############################################
		############################################
        define('PERPAGE','200');
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        // VERIFICA SE A TABELA DE IMÓVEIS JÁ FOI TRUNCADA NO DIA DE HOJE
        $truncate = $this->SiteModel->getRegs('tb_log_importacao',array(
			'order_by' => array(
				'key' => 'data',
				'dir' => 'desc'
			),
            'like' => array(
				'campo' => 'data',
				'valor' => date("Y-m-d")
			),
			'tipo' => 'Truncate',
			'status' => 'S'
		));
        ############################################
		############################################
        if( empty($truncate->getNumRows()) && !empty($_GET['limpa']) ){
			#######################################
			#######################################
			// LIMPA AS TABELAS DE IMÓVEIS
            $this->SiteModel->Truncate('tb_imoveis_plantas');
			$this->SiteModel->Truncate('tb_imoveis_videos');
			$this->SiteModel->Truncate('tb_imoveis_fotos');
			$this->SiteModel->Truncate('tb_imoveis');
			#######################################
			#######################################
			// SALVA LOG
			unset($log);
			$fim = microtime(true);

			$log['tipo'] = 'Truncate';
			$log['imoveis'] = NULL;
			$log['log'] = 'Truncate da Tabela de Imóveis';
			$log['data'] = date("Y-m-d H:i:s");
			$log['tempo'] = number_format($fim-$inicio, 0, '', '');
			$log['status'] = 'S';

			$this->SiteModel->Add('tb_log_importacao',$log);
			#######################################
			#######################################
		}
        ############################################
		############################################
        $totalimoveis = $this->SiteModel->totalRows('tb_imoveis_carga');
        $paginas = ceil($totalimoveis/PERPAGE);
        $processados = $this->SiteModel->getRegs('tb_imoveis_carga',array(
			'processado !=' => '',
			'status' => '1'
		))->getNumRows();
        $lote = floor($processados/PERPAGE)+1;
        ############################################
		############################################
        // CARREGA LOTE DE IMÓVEIS PARA PROCESSAMENTO
        $imoveis = $this->SiteModel->getRegs('tb_imoveis_carga',array(
			'order_by' => array(
				'key' => 'id',
				'dir' => $ord
			),
            'offset' => '0',
            'limit' => PERPAGE,
			'processado' => 'NULO',
			'status' => '0'
		));
        ############################################
		############################################
        if( $imoveis->getNumRows() > 0 ){
            ############################################
            ############################################
            $Imoview = new Imoview();
            ############################################
            ############################################
            foreach( $imoveis->getResult() as $imo ){
                ############################################
                ############################################
                // CONSULTA IMÓVEL NA API
                $imovel = $Imoview->Imovel($imo->referencia);
                ########################################
                ########################################
                if( !empty($imovel) && isset($imovel['imovel']) ){
                    ########################################
                    ########################################
                    // PROCESSA IMÓVEL
                    $imovel['imovel']['idbd'] = $imo->id;
                    $retorno = ImoviewImovel($imovel['imovel']);
                    ########################################
                    ########################################
                    if( $retorno['acao'] == 'upd' ){
						#######################################
						array_push($ulogimoveis,$retorno['codigo']);
						$upd++;
						#######################################
					}elseif( $retorno['acao'] == 'ins' ){
						#######################################
						array_push($logimoveis,$retorno['codigo']);
						$ins++;
						#######################################
					}
                    ########################################
                    ########################################
                }
            }
            ############################################
            ############################################
            $total = $ins + $upd;
            ############################################
            ############################################
            AtualizaViews();
            ############################################
            ############################################
            // SALVA LOG DE INSERT
            if( $ins > 0 ){
                unset($log);
                $fim = microtime(true);

                $log['tipo'] = 'Importação de Imóveis # Lote '.$lote.' de '.$paginas.' - NOVOS '.$ins.'/'.$total;
                $log['imoveis'] = $ins;
                $log['log'] = implode(";",$logimoveis);
                $log['data'] = date("Y-m-d H:i:s");
                $log['tempo'] = number_format($fim-$inicio, 0, '', '');
                $log['status'] = 'S';

                $this->SiteModel->Add('tb_log_importacao',$log);
            }
            ############################################
            ############################################
            // SALVA LOG DE UPDATE
            if( $upd > 0 ){
                unset($log);
                $fim = microtime(true);

                $log['tipo'] = 'Importação de Imóveis # Lote '.$lote.' de '.$paginas.' - ATUALIZADOS '.$upd.'/'.$total;
                $log['imoveis'] = $upd;
                $log['log'] = implode(";",$ulogimoveis);
                $log['data'] = date("Y-m-d H:i:s");
                $log['tempo'] = number_format($fim-$inicio, 0, '', '');
                $log['status'] = 'S';

                $this->SiteModel->Add('tb_log_importacao',$log);
            }
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Importação de Imóveis do Imoview (Universal)</h2>";
            echo "<hr>";
            echo "<h3>Lote: ".$lote." de ".$paginas."</h3>";
			echo "<h3>Total de Imóveis do Lote: ".$total."</h3>";
            echo "<hr>";
            echo "<h3>Imóveis Novos: ".$ins."</h3>";
            echo "<h3>Imóveis Atualizados: ".$upd."</h3>";
            echo "<hr>";
            ############################################
            ############################################
            if( !empty($_GET['leadlink']) ){
				sleep(4);
				echo '<script type="text/javascript">'.PHP_EOL;
				echo 'window.open("'.base_url().'admin/importacao/imoveis/'.$ord.'/?leadlink=OK&'.md5(date('ymdHis')).'","_self");'.PHP_EOL;
				echo '</script>'.PHP_EOL;
				die();
			}
            ############################################
            ############################################
			die();
            ############################################
            ############################################
        }else{
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Importação de Imóveis do Imoview (Universal)</h2>";
            echo "<hr>";
            echo "<h3>Não existem mais imóveis para processar.</h3>";
            echo "<hr>";
			die();
            ############################################
            ############################################
        }
        ############################################
		############################################
    }
    ######################################################################################################
    ######################################################################################################
    public function imovel(){
		if( $_POST && !empty($_POST['codigo']) ){
            ############################################
            ############################################
            // SETA OS LIMITES
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 30000);
            ini_set('max_input_time', 30000);
            set_time_limit(30000);
            header('Content-Type: text/html; charset=utf-8');
            ############################################
            ############################################
            $inicio = microtime(true);
            $logimo = array();
			$codigo = $_POST['codigo'];
            ############################################
            ############################################
            $Imoview = new Imoview();
            // CONSULTA IMÓVEL NA API
            $imovel = $Imoview->Imovel($codigo);
            ############################################
            ############################################
            if( !empty($imovel) && isset($imovel['imovel']) ){
                ########################################
                ########################################
                // PROCESSA IMÓVEL
                $retorno = ImoviewImovel($imovel['imovel']);
                ########################################
                ########################################
                if( $retorno['acao'] == 'upd' ){
                    #######################################
                    #######################################
					// SALVA LOG
					unset($log);
					$fim = microtime(true);

					$log['tipo'] = 'Imóvel Único';
					$log['imoveis'] = 'Atualizado (UPDATE)';
					$log['log'] = $retorno['codigo'];
					$log['data'] = date("Y-m-d H:i:s");
					$log['tempo'] = number_format($fim-$inicio, 0, '', '');
					$log['status'] = 'S';

					$this->SiteModel->Add('tb_log_importacao',$log);
					#######################################
                    echo "<hr>";
					echo "<h3>Imóvel Atualizado com Sucesso</h3>";
					echo "<h3>Código: ".$retorno['codigo']."</h3>";
                    echo "<hr>";
					die();
					#######################################
                    #######################################
                }elseif( $retorno['acao'] == 'ins' ){
                    #######################################
                    #######################################
					// SALVA LOG
					unset($log);
					$fim = microtime(true);

					$log['tipo'] = 'Imóvel Único';
					$log['imoveis'] = 'Cadastrado (INSERT)';
					$log['log'] = $retorno['codigo'];
					$log['data'] = date("Y-m-d H:i:s");
					$log['tempo'] = number_format($fim-$inicio, 0, '', '');
					$log['status'] = 'S';

					$this->SiteModel->Add('tb_log_importacao',$log);
					#######################################
                    echo "<hr>";
					echo "<h3>Imóvel Cadastrado com Sucesso</h3>";
					echo "<h3>Código: ".$retorno['codigo']."</h3>";
                    echo "<hr>";
					die();
					#######################################
                    #######################################
                }
                ########################################
                ########################################
            }else{
                ########################################
                ########################################
                $existe = $this->SiteModel->getRegs('tb_imoveis', [
                        'limit' => '1',
                        'offset' => '0',
                        'referencia' => $codigo
                    ])->getRow();
                ########################################
                ########################################
                if( !empty($existe->id) ){
                    #######################################
                    #######################################
                    // DESATIVA O IMOVEL
					$imo['status'] 	= '0';
					$imo['excluido'] = date("Y-m-d H:i:s");
					$regWhere['id'] = $existe->id;
					$this->SiteModel->Upd('tb_imoveis',$imo,$regWhere);
                    #######################################
                    #######################################
                    AtualizaViews();
                    #######################################
                    #######################################
					// SALVA LOG
					unset($log);
					$fim = microtime(true);

					$log['tipo'] = 'Imóvel Único';
					$log['imoveis'] = 'Desativado (STATUS)';
					$log['log'] = $codigo;
					$log['data'] = date("Y-m-d H:i:s");
					$log['tempo'] = number_format($fim-$inicio, 0, '', '');
					$log['status'] = 'S';

					$this->SiteModel->Add('tb_log_importacao',$log);
					#######################################
                    echo "<hr>";
					echo "<h3>Imóvel Desativado com Sucesso</h3>";
					echo "<h3>Código: ".$codigo."</h3>";
                    echo "<hr>";
					die();
					#######################################
                    #######################################
                }else{
                    ########################################
                    #######################################
                    echo "<hr>";
                    echo "<h3>Código de Imóvel inexistente no Imoview (Universal)</h3>";
                    echo "<h3>Código: ".$codigo."</h3>";
                    echo "<hr>";
                    die();
                    #######################################
                    #######################################
                }
                ########################################
                ########################################
            }
            ############################################
            ############################################
        }else{
			############################################
            ############################################
            echo "<hr>";
			echo "<h3>Código de Imóvel inexistente no Imoview (Universal)</h3>";
            echo "<hr>";
			die();
			############################################
            ############################################
		}

    }
    ######################################################################################################
    ######################################################################################################
    public function condominios(){
        ############################################
		############################################
        // SETA OS LIMITES
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 30000);
		ini_set('max_input_time', 30000);
		set_time_limit(30000);
		header('Content-Type: text/html; charset=utf-8');
        ############################################
		############################################
        $inicio = microtime(true);
        ############################################
		############################################
        $ins = 0;
        $upd = 0;
        $logimoveis = array();
        $ulogimoveis = array();
        ############################################
		############################################
        define('PERPAGE','20');
        ############################################
		############################################
        $dados = $this->dados;
        ############################################
		############################################
        $Imoview = new Imoview();

        $parametros = array(
            "finalidade" => "0",
            "ordenacao" => "dataatualizacaodesc",
            "numeroPagina" => "1",
            "numeroRegistros" => PERPAGE
        );

        $condominios = $Imoview->Condominios($parametros);
        ############################################
		############################################
        $paginas = ceil($condominios['quantidade']/PERPAGE);
        ############################################
		############################################
        if( $condominios['quantidade'] > 0 && count($condominios['lista']) > 0 ){
            #######################################
			#######################################
			// LIMPA AS TABELAS DE CONDOMÍNIOS
			$this->SiteModel->Truncate('tb_condominios_videos');
			$this->SiteModel->Truncate('tb_condominios_fotos');
			$this->SiteModel->Truncate('tb_condominios');
			#######################################
			#######################################
            foreach( $condominios['lista'] as $imo ){
                ############################################
                ############################################
                // PROCESSA CONDOMÍNIO
                $retorno = ImoviewCondominio($imo);
                ############################################
                ############################################
                if( $retorno['acao'] == 'upd' ){
                    #######################################
                    array_push($ulogimoveis,$retorno['codigo']);
                    $upd++;
                    #######################################
                }elseif( $retorno['acao'] == 'ins' ){
                    #######################################
                    array_push($logimoveis,$retorno['codigo']);
                    $ins++;
                    #######################################
                }
                ############################################
                ############################################
			}
            ############################################
            ############################################
            for( $i = 2; $i <= $paginas; $i++ ){
                ############################################
                ############################################
                $parametros['numeroPagina'] = $i;
                $condominios2 = $Imoview->Condominios($parametros);
                ############################################
                ############################################
                if( $condominios2['quantidade'] > 0 && count($condominios2['lista']) > 0 ){
                    ########################################
                    ########################################
                    foreach( $condominios2['lista'] as $imo ){
                        ############################################
                        ############################################
                        // PROCESSA CONDOMÍNIO
                        $retorno = ImoviewCondominio($imo);
                        ############################################
                        ############################################
                        if( $retorno['acao'] == 'upd' ){
                            #######################################
                            array_push($ulogimoveis,$retorno['codigo']);
                            $upd++;
                            #######################################
                        }elseif( $retorno['acao'] == 'ins' ){
                            #######################################
                            array_push($logimoveis,$retorno['codigo']);
                            $ins++;
                            #######################################
                        }
                        ############################################
                        ############################################
                    }
                    ########################################
                    ########################################
                }
                ############################################
                ############################################
            }
            ############################################
            ############################################
            $total = $ins + $upd;
            ############################################
            ############################################
            // SALVA LOG DE INSERT
            if( $ins > 0 ){
                unset($log);
                $fim = microtime(true);

                $log['tipo'] = 'Importação de Condomínios # NOVOS '.$ins.'/'.$total;
                $log['imoveis'] = $ins;
                $log['log'] = implode(";",$logimoveis);
                $log['data'] = date("Y-m-d H:i:s");
                $log['tempo'] = number_format($fim-$inicio, 0, '', '');
                $log['status'] = 'S';

                $this->SiteModel->Add('tb_log_importacao',$log);
            }
            ############################################
            ############################################
            // SALVA LOG DE UPDATE
            if( $upd > 0 ){
                unset($log);
                $fim = microtime(true);

                $log['tipo'] = 'Importação de Condomínios # ATUALIZADOS '.$upd.'/'.$total;
                $log['imoveis'] = $upd;
                $log['log'] = implode(";",$ulogimoveis);
                $log['data'] = date("Y-m-d H:i:s");
                $log['tempo'] = number_format($fim-$inicio, 0, '', '');
                $log['status'] = 'S';

                $this->SiteModel->Add('tb_log_importacao',$log);
            }
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Importação de Condomínios do Imoview (Universal)</h2>";
            echo "<hr>";
			echo "<h3>Total de Condomínios: ".$total."</h3>";
            echo "<hr>";
            echo "<h3>Imóveis Novos: ".$ins."</h3>";
            echo "<h3>Imóveis Atualizados: ".$upd."</h3>";
            echo "<hr>";
            ############################################
            ############################################
			die();
            ############################################
            ############################################
        }else{
            ############################################
            ############################################
            // SALVA LOG
			unset($log);
			$fim = microtime(true);

			$log['tipo'] = 'Erro na Importação de Condomínios';
			$log['imoveis'] = 0;
			$log['log'] = NULL;
			$log['data'] = date("Y-m-d H:i:s");
			$log['tempo'] = number_format($fim-$inicio, 0, '', '');
			$log['status'] = 'E';

			$this->SiteModel->Add('tb_log_importacao',$log);
            ############################################
            ############################################
            echo "<hr>";
            echo "<h2>Importação de Condomínios do Imoview (Universal)</h2>";
			echo "<h3>Ocorreu um erro na Importação</h3>";
            echo "<hr>";
			die();
            ############################################
            ############################################
        }
        ############################################
		############################################
    }
    ######################################################################################################
    ######################################################################################################
}