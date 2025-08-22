<?php
namespace App\Controllers;
use App\Libraries\Imagem;

class Fotos extends BaseController{

    public function index($tamanho = 'g',$foto = NULL){
		#################################################
		#################################################
		$inicio = microtime(true);
		#################################################
		#################################################
		// Decodifica a URL e Extrai os Dados
		$arquivo = Decode($_GET['token']);
        #################################################
		#################################################
        if( SearchStr($arquivo,base_url()) ){
            $arquivo = str_replace(base_url(),caminho_fisico(),$arquivo);
        }
        #################################################
		#################################################
		$tam = explode("x",$tamanho);
		$url = explode("/",$arquivo);
		$original = end($url);
		#################################################
		#################################################
		if( count($url) > 1 ){
			$acento = explode('?',$original);
			if( count($acento) > 0 ){
				$original = $acento[0];
			}
		}
		$original_ext = @end(explode(".",$original));
		$original = str_replace('.'.$original_ext,'.'.strtolower($original_ext),$original);
		$arquivo_original = caminho_fisico().'uploads/temporario/'.$original;
		#################################################
		#################################################
		// Nome do Arquivo para Validação
		$ext = @end(explode(".",$foto));
		$ajustado = str_replace('.'.$ext,'',$foto);
		$pronto = caminho_fisico().'uploads/temporario/'.$ajustado.'_'.$tamanho.'.'.$ext;
		#################################################
		#################################################
		// Define o padrão da imagem
		if( $ext == 'webp' ){
			$formato = "image/webp";
		}else{
			$formato = "image/jpeg";
		}
		#################################################
		#################################################
		// Qualidade de Compactação
		$qualidade = 82;
		#################################################
		#################################################
		// Verifica se o ARQUIVO já existe no Servidor
		if( is_file($pronto) ){
			#################################################
			#################################################
			// PROCESSA A IMAGEM
			header('Content-Type: '.$formato);
			header('Content-Length: '.filesize($pronto));
			echo file_get_contents($pronto);
			#######################################
			#######################################
			die();
			#################################################
			#################################################
		}elseif( !is_file($pronto) ){
			#################################################
			#################################################
			if( !is_file($arquivo_original) ){
				#######################################
				#######################################
                if( ini_get('allow_url_fopen') ) {
					$lido = file_get_contents($arquivo);
				}elseif( function_exists('curl_init') ) {
					$ch = curl_init($arquivo);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
					curl_setopt($ch, CURLOPT_VERBOSE, true);
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
					curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0');
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
						'Accept-Language: pt-BR,en;q=0.5',
						'Accept-Encoding: gzip, deflate',
						'Connection: keep-alive',
						'Upgrade-Insecure-Requests: 1',
					));
                    ob_start();
					curl_exec($ch);
					curl_close($ch);
                    $lido = ob_get_contents();
	                ob_end_clean();
				}
				#######################################
				#######################################
				if( !empty($lido) ){
					file_put_contents($arquivo_original, $lido);
				}else{
					$arquivo_original = caminho_fisico().'uploads/padrao.jpg';
				}
				$arquivo = $arquivo_original;
				#######################################
				#######################################
			}else{
				#######################################
				#######################################
				$arquivo = $arquivo_original;
				#######################################
				#######################################
			}
			#################################################
			#################################################
			$parametros = getimagesize($arquivo);
			#################################################
			#################################################
			// PROCESSA A IMAGEM
			if( count($tam) > 1 && (!empty($tam[0]) && !empty($tam[1])) ){
				$Imagem = new Imagem();
				$Imagem->Arquivo($arquivo);
				$Imagem->Redimensionar($tam[0],$tam[1],3);
				$Imagem->Salvar($pronto,$qualidade,$formato);
				$Imagem->Exibir($qualidade,$formato);
				$Imagem->Destruir();
			}else{
				if( $tamanho == 'original' ){
					$Imagem = new Imagem();
					$Imagem->Arquivo($arquivo);
					$Imagem->Redimensionar($parametros[0],$parametros[1],2);
					$Imagem->Salvar($pronto,$qualidade,$formato);
					$Imagem->Exibir($qualidade,$formato);
					$Imagem->Destruir();
				}elseif( !empty($parametros[0]) && !empty($parametros[1]) ){
					if( $parametros[0] >= 1600 || $parametros[1] >= 1600 ){
						$parametros[0] = 1600;
						$parametros[1] = 1600;
					}
					$Imagem = new Imagem();
					$Imagem->Arquivo($arquivo);
					$Imagem->Redimensionar($parametros[0],$parametros[1],2);
					$Imagem->Salvar($pronto,$qualidade,$formato);
					$Imagem->Exibir($qualidade,$formato);
					$Imagem->Destruir();
				}else{
					$Imagem = new Imagem();
					$Imagem->Arquivo($arquivo);
					$Imagem->Redimensionar($parametros[0],$parametros[1],2);
					$Imagem->Salvar($pronto,$qualidade,$formato);
					$Imagem->Exibir($qualidade,$formato);
					$Imagem->Destruir();
				}
			}
			#######################################
			#######################################
			die();
			#################################################
			#################################################
		}
		#################################################
		#################################################
		die();
		#################################################
		#################################################
	}


	public function original($tamanho = 'g',$foto = NULL){
		#################################################
		#################################################
		$inicio = microtime(true);
		#################################################
		#################################################
		// Decodifica a URL e Extrai os Dados
		$arquivo = Decode($_GET['token']);
        #################################################
		#################################################
        if( SearchStr($arquivo,base_url()) ){
            $arquivo = str_replace(base_url(),caminho_fisico(),$arquivo);
        }
        #################################################
		#################################################
		$tam = explode("x",$tamanho);
		$url = explode("/",$arquivo);
		$original = end($url);
		#################################################
		#################################################
		if( count($url) > 1 ){
			$acento = explode('?',$original);
			if( count($acento) > 0 ){
				$original = $acento[0];
			}
		}
		$original_ext = @end(explode(".",$original));
		$original = str_replace('.'.$original_ext,'.'.strtolower($original_ext),$original);
		$arquivo_original = caminho_fisico().'uploads/temporario/'.$original;
		#################################################
		#################################################
		// Nome do Arquivo para Validação
		$ext = @end(explode(".",$foto));
		$ajustado = str_replace('.'.$ext,'',$foto);
		$pronto = caminho_fisico().'uploads/temporario/'.$ajustado.'_'.$tamanho.'.'.$ext;
		#################################################
		#################################################
		// Define o padrão da imagem
		if( $ext == 'webp' ){
			$formato = "image/webp";
			$formato_tipo = IMAGETYPE_WEBP;
		}else{
			$formato = "image/jpeg";
			$formato_tipo = IMAGETYPE_JPEG;
		}
		#################################################
		#################################################
		// Qualidade de Compactação
		$qualidade = 82;
		#################################################
		#################################################
		// Verifica se o ARQUIVO já existe no Servidor
		if( is_file($pronto) ){
			#################################################
			#################################################
			// PROCESSA A IMAGEM
			header('Content-Type: '.$formato);
			header('Content-Length: '.filesize($pronto));
			echo file_get_contents($pronto);
			#######################################
			#######################################
			die();
			#################################################
			#################################################
		}elseif( !is_file($pronto) ){
			#################################################
			#################################################
			if( !is_file($arquivo_original) ){
				#######################################
				#######################################
                if( ini_get('allow_url_fopen') ) {
					$lido = file_get_contents($arquivo);
				}elseif( function_exists('curl_init') ) {
					$ch = curl_init($arquivo);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
					curl_setopt($ch, CURLOPT_VERBOSE, true);
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
					curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:60.0) Gecko/20100101 Firefox/60.0');
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
						'Accept-Language: pt-BR,en;q=0.5',
						'Accept-Encoding: gzip, deflate',
						'Connection: keep-alive',
						'Upgrade-Insecure-Requests: 1',
					));
                    ob_start();
					curl_exec($ch);
					curl_close($ch);
                    $lido = ob_get_contents();
	                ob_end_clean();
				}
				#######################################
				#######################################
				if( !empty($lido) ){
					file_put_contents($arquivo_original, $lido);
				}else{
					$arquivo_original = caminho_fisico().'uploads/padrao.jpg';
				}
				$arquivo = $arquivo_original;
				#######################################
				#######################################
			}else{
				#######################################
				#######################################
				$arquivo = $arquivo_original;
				#######################################
				#######################################
			}
			#################################################
			#################################################
			$parametros = getimagesize($arquivo);
			#################################################
			#################################################
			$Imagem = service('image');
			#################################################
			#################################################
			// PROCESSA A IMAGEM
			if( count($tam) > 1 && (!empty($tam[0]) && !empty($tam[1])) ){
				#######################################
				#######################################
				$Imagem->withFile($arquivo)
					->convert($formato_tipo)
					->fit($tam[0],$tam[1], 'center')
					->save($pronto,$qualidade);
				#######################################
				#######################################
				// EXIBE A IMAGEM
				header('Content-Type: '.$formato);
				header('Content-Length: '.filesize($pronto));
				echo file_get_contents($pronto);
				#######################################
				#######################################
			}else{
				if( !empty($parametros[0]) && !empty($parametros[1]) ){
					if( $parametros[0] >= 1600 || $parametros[1] <= 1600 ){
						$parametros[0] = 1600;
						$parametros[1] = 1200;
						$orientacao = 'width';
					}elseif( $parametros[0] <= 1600 || $parametros[1] >= 1600 ){
						$parametros[0] = 1200;
						$parametros[1] = 1600;
						$orientacao = 'height';
					}
					#######################################
					#######################################
					$Imagem->withFile($arquivo)
						->convert($formato_tipo)
						->resize($parametros[0],$parametros[1], true, $orientacao)
						->save($pronto,$qualidade);

					$arquivo = $pronto;
					#######################################
					#######################################
				}
				#######################################
				#######################################
				$Imagem->withFile($arquivo)
					->convert($formato_tipo)
					->fit($parametros[0],$parametros[1], 'center')
					->save($pronto,$qualidade);
				#######################################
				#######################################
				// EXIBE A IMAGEM
				header('Content-Type: '.$formato);
				header('Content-Length: '.filesize($pronto));
				echo file_get_contents($pronto);
				#######################################
				#######################################
			}
			#######################################
			#######################################
			die();
			#################################################
			#################################################
		}
		#################################################
		#################################################
		die();
		#################################################
		#################################################
	}

}