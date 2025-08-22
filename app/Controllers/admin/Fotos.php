<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Fotos extends BaseController{

    public function index(){
        ############################################
		############################################
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 30000);
		ini_set('max_input_time', 30000);
		set_time_limit(30000);
		header('Content-Type: text/html; charset=utf-8');
		ini_set('display_errors', 0);
		error_reporting(0);
		############################################
		############################################
		$tempo_inicio = microtime(true);
		############################################
		############################################
		$pasta = caminho_fisico().'uploads/temporario/';
		$tamanho = DirSize($pasta);
		$fotos = retornaDiretorio($pasta);

		foreach( $fotos as $foto ){
			if( is_file($foto) ){
				unlink($foto);
			}
		}
		############################################
		############################################
		$tempo_fim = microtime(true);
		############################################
		############################################
		// INSERE O LOG
        unset($importlog);
		$importlog['total'] = count($fotos);
		$importlog['tamanho'] = $tamanho;
		$importlog['data'] = date("Y-m-d H:i:s");
		$importlog['tempo'] = number_format($tempo_fim-$tempo_inicio, 0, '', '');

		$this->SiteModel->Add('tb_log',$importlog);
		############################################
		############################################
        echo "<hr>";
		echo "<h3>ARQUIVOS EXCLUIDOS COM SUCESSO!!</h3>";
		echo "<h4>".count($fotos)." Arquivos.</h4>";
		echo "<h4>".$tamanho." removidos do Disco.</h4>";
        echo "<hr>";
		die();
		############################################
		############################################
    }

}