<?php
#############################################
#############################################
namespace App\Libraries;
#############################################
#############################################
## Classe para tratamento de Imagens/Fotos
#############################################
#############################################
## PHP 8.2
## CodeIgniter 4.6.2
#############################################
#############################################
## Version: 4.3.2
## License: Exclusive Use
#############################################
#############################################
## Author: Rodrigo Luis
## Instagram: https://www.instagram.com/rodrigoluis/
## LinkedIn: https://www.linkedin.com/in/rodrigoluis/
## Facebook: https://www.facebook.com/rodrigoluis.web/
## Skype: rodrigoluis.web
## WhatsApp: +5551981212205
#############################################
#############################################
#############################################
#############################################
#############################################
#############################################
class Imagem{
	################################################################
	################################################################
	public $Arquivo = NULL;
	public $DadosArquivo = NULL;
	public $ArquivoRecurso = NULL;
	public $Tipo = NULL;
	################################################################
	################################################################
	public function __construct(array $params = []){
        if( !empty($params) ){
            foreach( $params as $key => $val ){
                if( property_exists($this, $key) ){
                    $this->$key = $val;
                }
            }
        }
    }
	################################################################
	################################################################
	# CARREGA O ARQUIVO DE IMAGEM
	function Arquivo( $arquivo = NULL ){
		if( is_file($arquivo) ){
			$this->Arquivo = $arquivo;
			$this->DadosArquivo = getimagesize($this->Arquivo);
			// CARREGA A IMAGEM DE ACORDO COM O TIPO
			switch( $this->DadosArquivo[2] ){
				case IMAGETYPE_GIF:
					$this->ArquivoRecurso = imagecreatefromgif($this->Arquivo);
					$this->Tipo = "image/gif";
				break;
				case IMAGETYPE_JPEG:
					$this->ArquivoRecurso = imagecreatefromjpeg($this->Arquivo);
					$this->Tipo = "image/jpeg";
					imageinterlace($this->ArquivoRecurso, true);
				break;
				case IMAGETYPE_PNG:
					$this->ArquivoRecurso = imagecreatefrompng($this->Arquivo);
					$this->Tipo = "image/png";
					imagealphablending($this->ArquivoRecurso, false);
					imagesavealpha($this->ArquivoRecurso, true);
				break;
				case IMAGETYPE_WEBP:
					$this->ArquivoRecurso = imagecreatefromwebp($this->Arquivo);
					$this->Tipo = "image/webp";
				break;
				default:
					$this->DadosArquivo = NULL;
					$this->ArquivoRecurso = NULL;
					$this->Tipo = NULL;
					return NULL;
				break;
			}
		}else{
			$this->Arquivo = $arquivo;
			$this->DadosArquivo = getimagesize($this->Arquivo);

			if( ini_get('allow_url_fopen') ) {
				$lido = file_get_contents($this->Arquivo);
			}elseif( function_exists('curl_init') ) {
				$ch = curl_init($this->Arquivo);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				$lido = curl_exec($ch);
				curl_close($ch);
			}

            if( !empty($lido) ){
                // CARREGA A IMAGEM DE ACORDO COM O TIPO
                switch( $this->DadosArquivo[2] ){
                    case IMAGETYPE_GIF:
                        $this->ArquivoRecurso = imagecreatefromstring($lido);
                        $this->Tipo = "image/gif";
                    break;
                    case IMAGETYPE_JPEG:
                        $this->ArquivoRecurso = imagecreatefromstring($lido);
                        $this->Tipo = "image/jpeg";
                        imageinterlace($this->ArquivoRecurso, true);
                    break;
                    case IMAGETYPE_PNG:
                        $this->ArquivoRecurso = imagecreatefromstring($lido);
                        $this->Tipo = "image/png";
                        imagealphablending($this->ArquivoRecurso, false);
                        imagesavealpha($this->ArquivoRecurso, true);
                    break;
                    case IMAGETYPE_WEBP:
                        $this->ArquivoRecurso = imagecreatefromstring($lido);
                        $this->Tipo = "image/webp";
                    break;
                    default:
                        $this->DadosArquivo = NULL;
                        $this->ArquivoRecurso = NULL;
                        $this->Tipo = NULL;
                        return NULL;
                    break;
                }
            }
		}
	}
	################################################################
	################################################################
	# REDIMENSIONA A IMAGEM
	function Redimensionar( $largura = NULL, $altura = NULL, $modo = 2, $fundo = array(255, 255, 255, 255) ){

		if( $this->ArquivoRecurso == NULL && $largura > $this->DadosArquivo[0] && $altura > $this->DadosArquivo[1] ){
			return NULL;
		}else{
			if( empty($largura) && empty($altura) ){
				return NULL;
			}else{
				// CONFIGURA O MODO
				if( !in_array($modo, [1, 2, 3]) ) {
                    $modo = 2;
                }

				$medida = new \stdClass();
				$posicao = new \stdClass();
				$tamanho = new \stdClass();

				// CONFIGURA O FUNDO
				$fundo = array_pad($fundo, 4, 255);
                foreach ($fundo as &$f) {
                    $f = max(0, min(255, (int)$f));
                }
                $fundo[3] = (int)round(($fundo[3] * 127) / 255);

				// CALCULA O REDIMENSIONAMENTO DA IMAGEM DE ACORDO COM O MÉTODO
				if( empty($largura) || empty($altura) ){
					$modo = NULL;

					if( empty($largura) ){
						$medida->Largura = round(($this->DadosArquivo[0] * $altura) / $this->DadosArquivo[1], 0);
						$medida->Altura = $altura;
					}else{
						$medida->Largura = $largura;
						$medida->Altura = round(($this->DadosArquivo[1] * $largura) / $this->DadosArquivo[0], 0);
					}

					$posicao->Esquerda = 0;
					$posicao->Topo = 0;

					$tamanho = $medida;
				}else{
					$medida->Largura = round(($this->DadosArquivo[0] * $altura) / $this->DadosArquivo[1], 0);
					$medida->Altura = round(($this->DadosArquivo[1] * $largura) / $this->DadosArquivo[0], 0);
				}

				switch( $modo ){
					// CAIXA
					case 1:
						if( $medida->Altura < $altura ){
							$medida->Largura = $largura;

							$posicao->Esquerda = 0;
							$posicao->Topo = round(($altura - $medida->Altura) / 2, 0);
						}else{
							$medida->Altura = $altura;

							$posicao->Esquerda = round(($largura - $medida->Largura) / 2, 0);
							$posicao->Topo = 0;
						}

						$tamanho->Largura = $largura;
						$tamanho->Altura = $altura;

						break;
					// SIMPLES
					case 2:
						if( $medida->Altura < $altura ){
							$medida->Largura = $largura;
						}else{
							$medida->Altura = $altura;
						}

						$posicao->Esquerda = 0;
						$posicao->Topo = 0;

						$tamanho = $medida;

						break;
					// CORTE
					case 3:
						if( $medida->Altura < $altura ){
							$medida->Altura = $altura;

							$posicao->Esquerda = round(($largura - $medida->Largura) / 2, 0);
							$posicao->Topo = 0;
						}else{
							$medida->Largura = $largura;

							$posicao->Esquerda = 0;
							$posicao->Topo = round(($altura - $medida->Altura) / 2, 0);
						}

						$tamanho->Largura = $largura;
						$tamanho->Altura = $altura;

						break;
				}

				// INICILIZA E REDIMENSIONA A IMAGEM
				$recurso = imagecreatetruecolor($tamanho->Largura, $tamanho->Altura);
				imagefill($recurso, 0, 0, imagecolorallocatealpha($recurso, $fundo[0], $fundo[1], $fundo[2], $fundo[3]));

				if( $this->Tipo !== 'image/jpeg' ){
					imagealphablending($recurso, false);
					imagesavealpha($recurso, true);
				}
				imagecopyresampled($recurso, $this->ArquivoRecurso, $posicao->Esquerda, $posicao->Topo, 0, 0, $medida->Largura, $medida->Altura, $this->DadosArquivo[0], $this->DadosArquivo[1]);
				$this->Pronto = $recurso;
			}
		}
	}
	################################################################
	################################################################
	# SALVA A IMAGEM
	function Salvar( $arquivo = NULL,$qualidade = 95,$tp = NULL ){
		if( $this->Pronto == NULL ){
			return NULL;
		}else{
			if( empty($tp) ){
				// EXPORTA A IMAGEM
				switch ($this->Tipo){
					case "image/gif":
						imagegif($this->Pronto, $arquivo);
					break;
					case "image/jpeg":
						imagejpeg($this->Pronto, $arquivo, $qualidade);
					break;
					case "image/png":
						imagepng($this->Pronto, $arquivo);
					break;
					case "image/webp":
						imagewebp($this->Pronto, $arquivo, $qualidade);
					break;
				}
			}else{
				// EXPORTA A IMAGEM
				switch($tp){
					case "image/gif":
						imagegif($this->Pronto, $arquivo);
					break;
					case "image/jpeg":
						imagejpeg($this->Pronto, $arquivo, $qualidade);
					break;
					case "image/png":
						imagepng($this->Pronto, $arquivo);
					break;
					case "image/webp":
						imagewebp($this->Pronto, $arquivo, $qualidade);
					break;
				}
			}

		}
	}
	################################################################
	################################################################
	# EXIBE A IMAGEM NO NAVEGADOR
	function Exibir( $qualidade = 75, $formato = NULL ){
		if( $this->Pronto == NULL ){
			return NULL;
		}else{
			if( empty($formato) ){
				$formato = $this->Tipo;
			}
			header("Content-type: ".$formato);

			switch( $formato ){
				case "image/gif":
					imagegif($this->Pronto);
				break;
				case "image/jpeg":
					imagejpeg($this->Pronto, NULL, $qualidade);
				break;
				case "image/png":
					imagepng($this->Pronto);
				break;
				case "image/webp":
					imagewebp($this->Pronto, NULL, $qualidade);
				break;
			}
		}
	}
	################################################################
	################################################################
	# ELIMINA A IMAGEM
	function Destruir(){
		imagedestroy($this->Pronto);
		imagedestroy($this->ArquivoRecurso);
	}
	################################################################
	################################################################
}
?>