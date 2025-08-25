<?php
namespace App\Controllers;
use App\Libraries\PHPMailerLib;

class Acao extends BaseController{
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
	// FORMULÁRIO DE WHATSAPP
	public function whatsapp(){
        ############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
        $sessao = $this->session->get('session_id');
        $form_start = $this->session->get('P3dr0m4RiaNo_formstart');
		$form_submit = microtime(true);
		$_POST['usuario'] = getUserIP();
		$_POST['nome'] = ConvertCase($_POST['nome']);
        $_POST['email'] = trim(strtolower($_POST['email']));
        $info = NULL;
		############################################
		############################################
		if( !empty($_POST) && (isset($_POST['leadlink']) && strlen($_POST['leadlink']) == 0) && $_POST['linklead'] == $sessao && !empty(ValidaFone($_POST['telefone'])) && (floor($form_submit-$form_start) >= TIMEOUT) ){
			############################################
			############################################
			$info['data'] 			= date("Y-m-d H:i:s");
			$info['dados']			= serialize($_POST['usuario']);
			$info['form']			= serialize($_POST);
			$info['origem']	 	    = SetOrigem($_POST['origem']);
			$info['interesse']	 	= SetNulo($_POST['interesse']);
			$info['codigo']	 	    = SetNulo($_POST['codigo']);

			$info['nome'] 			= $_POST['nome'];
			$info['telefone']	 	= $_POST['telefone'];
			$info['email']	 		= $_POST['email'];
			$info['imovel']	 	    = $_POST['imovel'];
			############################################
			############################################
			// GRAVA NA SESSION OS DADOS DO USUÁRIO
			$this->session->set('P3dr0m4RiaNo_nome', $_POST['nome']);
			$this->session->set('P3dr0m4RiaNo_email', $_POST['email']);
			$this->session->set('P3dr0m4RiaNo_fone', $_POST['telefone']);
			############################################
			############################################
			// SALVA NO BD
			$idf = $this->SiteModel->Add('tb_whatsapp',$info);
			############################################
			############################################
			// CENTRAL DE LEADS
			$this->SiteModel->Add('tb_leads',array(
				'data' => date("Y-m-d H:i:s"),
				'referencia' => $idf,
				'formulario' => 'whatsapp',
				'nome' => $_POST['nome'],
				'email' => $info['email'],
				'telefone' => $_POST['telefone'],
				'imovel' => SetNulo($_POST['imovel']),
				'dados' => serialize($_POST['usuario']),
				'form' => serialize($_POST),
				'interesse' => $info['interesse'],
				'origem' => SetOrigem($_POST['origem']),
				'codigo' => $info['codigo']
			));
			############################################
			############################################
			$info['codigo'] = SetNulo($_POST['codigo']);
			$info['modo'] = (SearchStr($_POST['modo'],'V'))?'Venda':'Aluguel';
			############################################
			############################################
			if( !empty($_POST['codigo']) ){
				############################################
			    ############################################

				############################################
			    ############################################
			}
			############################################
			############################################
			$mensagem = view('site/email/padrao', $info);
            ############################################
			############################################
            $phpmailer = new PHPMailerLib();
            $mail = $phpmailer->load();
			$mail->IsHTML(true);
			$mail->IsSMTP();
			$mail->SMTPAuth   	= true;
			$mail->CharSet   	= 'UTF-8';
			$mail->Host       	= SMTP_URL;
			$mail->Port       	= SMTP_PORTA;
			$mail->Username   	= SMTP_EMAIL;
			$mail->Password   	= SMTP_SENHA;
			$mail->Subject    	= ConvertUTF("WhatsApp enviado pelo Site");
			$mail->Body			= $mensagem;
			$mail->AddReplyTo(SMTP_EMAIL, ConvertUTF($info['nome']));
			$mail->SetFrom(SMTP_EMAIL, ConvertUTF($info['nome']) );
			############################################
			############################################
			$mail->AddAddress("rdzdigital@gmail.com",ConvertUTF($this->sitenome) );
			//$mail->AddAddress("danton+pedromariano@leadlink.com.br",ConvertUTF($this->sitenome) );
			############################################
			############################################
			if( !empty($_POST['cor_nome']) && !empty($_POST['cor_email']) ){
				//$mail->AddAddress($_POST['cor_email'],ConvertUTF($_POST['cor_nome']) );
			}
			############################################
			############################################
			if( $mail->Send() ){
                //$this->session->set('P3dr0m4RiaNo_status','ok');
				Redireciona($_POST['whatslink'].$_POST['whatstexto']);
			}else{
				$this->session->set('P3dr0m4RiaNo_status','no');
				Redireciona($_POST['redirect']);
			}
            ############################################
		    ############################################
		}else{
			$this->session->set('P3dr0m4RiaNo_status','erro');
			Redireciona($_POST['redirect']);
		}
        ############################################
		############################################
	}
    ######################################################################################################
    ######################################################################################################
	// FORMULÁRIO DE MAIS INFORMAÇÕES
	public function informacoes(){
		############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
        $sessao = $this->session->get('session_id');
        $form_start = $this->session->get('P3dr0m4RiaNo_formstart');
		$form_submit = microtime(true);
		$_POST['usuario'] = getUserIP();
		$_POST['nome'] = ConvertCase($_POST['nome']);
        $_POST['email'] = trim(strtolower($_POST['email']));
        $info = NULL;
		############################################
		############################################
		if( $_POST && (isset($_POST['leadlink']) && strlen($_POST['leadlink']) == 0) && $_POST['linklead'] == $sessao && !empty(ValidaFone($_POST['telefone'])) && (floor($form_submit-$form_start) >= TIMEOUT) ){
			############################################
			############################################
			$info['data'] 			= date("Y-m-d H:i:s");
			$info['dados']			= serialize($_POST['usuario']);
			$info['form']			= serialize($_POST);
			$info['origem']	 	    = SetOrigem($_POST['origem']);
			$info['interesse']	 	= SetNulo($_POST['interesse']);
			$info['codigo']	 	    = SetNulo($_POST['codigo']);

			$info['nome'] 			= $_POST['nome'];
			$info['email'] 		    = $_POST['email'];
			$info['telefone']	 	= $_POST['telefone'];
			$info['mensagem']	 	= $_POST['mensagem'];
			$info['imovel']	 	    = $_POST['imovel'];
			############################################
			############################################
			// GRAVA NA SESSION COM NOME E E-MAIL
			$this->session->set('P3dr0m4RiaNo_nome', $_POST['nome']);
			$this->session->set('P3dr0m4RiaNo_email', $_POST['email']);
			$this->session->set('P3dr0m4RiaNo_fone', $_POST['telefone']);
			############################################
			############################################
			// SALVA NO BD
			$idf = $this->SiteModel->Add('tb_informacoes',$info);
			############################################
			############################################
			// CENTRAL DE LEADS
			$this->SiteModel->Add('tb_leads',array(
				'data' => date("Y-m-d H:i:s"),
				'referencia' => $idf,
				'formulario' => 'informacoes',
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'telefone' => $_POST['telefone'],
				'mensagem' => SetNulo($_POST['mensagem']),
				'imovel' => SetNulo($_POST['imovel']),
				'dados' => serialize($_POST['usuario']),
				'form' => serialize($_POST),
				'interesse' => $info['interesse'],
				'origem' => SetOrigem($_POST['origem']),
				'codigo' => $info['codigo']
			));
			############################################
			############################################
			$info['codigo'] = SetNulo($_POST['codigo']);
			$info['modo'] = (SearchStr($_POST['modo'],'V'))?'Venda':'Aluguel';
			############################################
			############################################
			if( !empty($_POST['codigo']) ){
				############################################
			    ############################################

				############################################
			    ############################################
			}
			############################################
			############################################
			$mensagem = view('site/email/padrao', $info);
            ############################################
			############################################
			$phpmailer = new PHPMailerLib();
            $mail = $phpmailer->load();
			$mail->IsHTML(true);
			$mail->IsSMTP();
			$mail->SMTPAuth   	= true;
			$mail->CharSet   	= 'UTF-8';
			$mail->Host       	= SMTP_URL;
			$mail->Port       	= SMTP_PORTA;
			$mail->Username   	= SMTP_EMAIL;
			$mail->Password   	= SMTP_SENHA;
			$mail->Subject    	= ConvertUTF("Mais Informações enviado pelo Site");
			$mail->Body			= $mensagem;
			$mail->AddReplyTo($info['email'], ConvertUTF($info['nome']) );
			$mail->SetFrom(SMTP_EMAIL, ConvertUTF($info['nome']) );
			############################################
			############################################
			//$mail->AddAddress("rodrigo@leadlink.com.br",ConvertUTF("Lead Link") );
			############################################
			############################################
			$mail->AddAddress("rdzdigital@gmail.com",ConvertUTF($this->sitenome) );
			//$mail->AddAddress("danton+pedromariano@leadlink.com.br",ConvertUTF($this->sitenome) );
			############################################
			############################################
			if( $mail->Send() ){
				$this->session->set('P3dr0m4RiaNo_status','ok');
				Redireciona($_POST['redirect']);
			}else{
				$this->session->set('P3dr0m4RiaNo_status','no');
				Redireciona($_POST['redirect']);
			}
            ############################################
		    ############################################
		}else{
			$this->session->set('P3dr0m4RiaNo_status','erro');
			Redireciona($_POST['redirect']);
		}
        ############################################
		############################################
	}
    ######################################################################################################
    ######################################################################################################
	// FORMULÁRIO DE AGENDAR VISITA
	public function visita(){
		############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
        $sessao = $this->session->get('session_id');
        $form_start = $this->session->get('P3dr0m4RiaNo_formstart');
		$form_submit = microtime(true);
		$_POST['usuario'] = getUserIP();
		$_POST['nome'] = ConvertCase($_POST['nome']);
        $_POST['email'] = trim(strtolower($_POST['email']));
        $info = NULL;
		############################################
		############################################
		if( $_POST && (isset($_POST['leadlink']) && strlen($_POST['leadlink']) == 0) && $_POST['linklead'] == $sessao && !empty(ValidaFone($_POST['telefone'])) && (floor($form_submit-$form_start) >= TIMEOUT) ){
			############################################
			############################################
			$info['data'] 			= date("Y-m-d H:i:s");
			$info['dados']			= serialize($_POST['usuario']);
			$info['form']			= serialize($_POST);
			$info['origem']	 	    = SetOrigem($_POST['origem']);
			$info['interesse']	 	= SetNulo($_POST['interesse']);
			$info['codigo']	 	    = SetNulo($_POST['codigo']);

			$info['nome'] 			= $_POST['nome'];
			$info['email'] 		    = $_POST['email'];
			$info['telefone']	 	= $_POST['telefone'];
			$info['mensagem']	 	= $_POST['mensagem'];
			$info['imovel']	 	    = $_POST['imovel'];
            $info['visita']	 	    = $_POST['visita'];
            $info['turno']	 	    = $_POST['turno'];
			############################################
			############################################
			// GRAVA NA SESSION COM NOME E E-MAIL
			$this->session->set('P3dr0m4RiaNo_nome', $_POST['nome']);
			$this->session->set('P3dr0m4RiaNo_email', $_POST['email']);
			$this->session->set('P3dr0m4RiaNo_fone', $_POST['telefone']);
			############################################
			############################################
			// SALVA NO BD
			$idf = $this->SiteModel->Add('tb_visita',$info);
			############################################
			############################################
			// CENTRAL DE LEADS
			$this->SiteModel->Add('tb_leads',array(
				'data' => date("Y-m-d H:i:s"),
				'referencia' => $idf,
				'formulario' => 'visita',
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'telefone' => $_POST['telefone'],
				'mensagem' => SetNulo($_POST['mensagem']),
				'imovel' => SetNulo($_POST['imovel']),
				'dados' => serialize($_POST['usuario']),
				'form' => serialize($_POST),
				'interesse' => $info['interesse'],
				'origem' => SetOrigem($_POST['origem']),
				'codigo' => $info['codigo']
			));
			############################################
			############################################
			$info['codigo'] = SetNulo($_POST['codigo']);
			$info['modo'] = (SearchStr($_POST['modo'],'V'))?'Venda':'Aluguel';
			############################################
			############################################
			if( !empty($_POST['codigo']) ){
				############################################
			    ############################################

				############################################
			    ############################################
			}
			############################################
			############################################
			$mensagem = view('site/email/padrao', $info);
            ############################################
			############################################
			$phpmailer = new PHPMailerLib();
            $mail = $phpmailer->load();
			$mail->IsHTML(true);
			$mail->IsSMTP();
			$mail->SMTPAuth   	= true;
			$mail->CharSet   	= 'UTF-8';
			$mail->Host       	= SMTP_URL;
			$mail->Port       	= SMTP_PORTA;
			$mail->Username   	= SMTP_EMAIL;
			$mail->Password   	= SMTP_SENHA;
			$mail->Subject    	= ConvertUTF("Agendar Visita enviado pelo Site");
			$mail->Body			= $mensagem;
			$mail->AddReplyTo($info['email'], ConvertUTF($info['nome']) );
			$mail->SetFrom(SMTP_EMAIL, ConvertUTF($info['nome']) );
			############################################
			############################################
			//$mail->AddAddress("rodrigo@leadlink.com.br",ConvertUTF("Lead Link") );
			############################################
			############################################
			$mail->AddAddress("rdzdigital@gmail.com",ConvertUTF($this->sitenome) );
			//$mail->AddAddress("danton+pedromariano@leadlink.com.br",ConvertUTF($this->sitenome) );
			############################################
			############################################
			if( $mail->Send() ){
				$this->session->set('P3dr0m4RiaNo_status','ok');
				Redireciona($_POST['redirect']);
			}else{
				$this->session->set('P3dr0m4RiaNo_status','no');
				Redireciona($_POST['redirect']);
			}
            ############################################
		    ############################################
		}else{
			$this->session->set('P3dr0m4RiaNo_status','erro');
			Redireciona($_POST['redirect']);
		}
        ############################################
		############################################
	}
    ######################################################################################################
    ######################################################################################################
    // FORMULÁRIO DE FALE CONOSCO
	public function contato(){
		############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
        $sessao = $this->session->get('session_id');
        $form_start = $this->session->get('P3dr0m4RiaNo_formstart');
		$form_submit = microtime(true);
		$_POST['usuario'] = getUserIP();
		$_POST['nome'] = ConvertCase($_POST['nome']);
        $_POST['email'] = trim(strtolower($_POST['email']));
        $info = NULL;
		############################################
		############################################
		if( $_POST && (isset($_POST['leadlink']) && strlen($_POST['leadlink']) == 0) && $_POST['linklead'] == $sessao && !empty(ValidaFone($_POST['telefone'])) && (floor($form_submit-$form_start) >= TIMEOUT) ){
			############################################
			############################################
			$info['data'] 			= date("Y-m-d H:i:s");
			$info['dados']			= serialize($_POST['usuario']);
			$info['form']			= serialize($_POST);
			$info['origem']	 	    = SetOrigem($_POST['origem']);

			$info['nome'] 			= $_POST['nome'];
			$info['email'] 		    = $_POST['email'];
			$info['telefone']	 	= $_POST['telefone'];
			$info['mensagem']	 	= $_POST['mensagem'];
			############################################
			############################################
			// GRAVA NA SESSION COM NOME E E-MAIL
			$this->session->set('P3dr0m4RiaNo_nome', $_POST['nome']);
			$this->session->set('P3dr0m4RiaNo_email', $_POST['email']);
			$this->session->set('P3dr0m4RiaNo_fone', $_POST['telefone']);
			############################################
			############################################
			// SALVA NO BD
			$idf = $this->SiteModel->Add('tb_contato',$info);
			############################################
			############################################
			// CENTRAL DE LEADS
			$this->SiteModel->Add('tb_leads',array(
				'data' => date("Y-m-d H:i:s"),
				'referencia' => $idf,
				'formulario' => 'contato',
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'telefone' => $_POST['telefone'],
				'mensagem' => SetNulo($_POST['mensagem']),
				'imovel' => SetNulo($_POST['imovel']),
				'dados' => serialize($_POST['usuario']),
				'form' => serialize($_POST),
				'origem' => SetOrigem($_POST['origem'])
			));
			############################################
			############################################
			$mensagem = view('site/email/padrao', $info);
            ############################################
			############################################
			$phpmailer = new PHPMailerLib();
            $mail = $phpmailer->load();
			$mail->IsHTML(true);
			$mail->IsSMTP();
			$mail->SMTPAuth   	= true;
			$mail->CharSet   	= 'UTF-8';
			$mail->Host       	= SMTP_URL;
			$mail->Port       	= SMTP_PORTA;
			$mail->Username   	= SMTP_EMAIL;
			$mail->Password   	= SMTP_SENHA;
			$mail->Subject    	= ConvertUTF("Fale Conosco enviado pelo Site");
			$mail->Body			= $mensagem;
			$mail->AddReplyTo($info['email'], ConvertUTF($info['nome']) );
			$mail->SetFrom(SMTP_EMAIL, ConvertUTF($info['nome']) );
			############################################
			############################################
			//$mail->AddAddress("rodrigo@leadlink.com.br",ConvertUTF("Lead Link") );
			############################################
			############################################
			$mail->AddAddress("rdzdigital@gmail.com",ConvertUTF($this->sitenome) );
			//$mail->AddAddress("danton+pedromariano@leadlink.com.br",ConvertUTF($this->sitenome) );
			############################################
			############################################
			if( $mail->Send() ){
				$this->session->set('P3dr0m4RiaNo_status','ok');
				Redireciona($_POST['redirect']);
			}else{
				$this->session->set('P3dr0m4RiaNo_status','no');
				Redireciona($_POST['redirect']);
			}
            ############################################
		    ############################################
		}else{
			$this->session->set('P3dr0m4RiaNo_status','erro');
			Redireciona($_POST['redirect']);
		}
        ############################################
		############################################
	}
    ######################################################################################################
    ######################################################################################################
    // FORMULÁRIO DE ANUNCIE SEU IMÓVEL
	public function anuncie(){
		############################################
		############################################
        header('Content-Type: text/html; charset=utf-8');
        $sessao = $this->session->get('session_id');
        $form_start = $this->session->get('P3dr0m4RiaNo_formstart');
		$form_submit = microtime(true);
		$_POST['usuario'] = getUserIP();
		$_POST['nome'] = ConvertCase($_POST['nome']);
        $_POST['email'] = trim(strtolower($_POST['email']));
        $info = NULL;
		############################################
		############################################
		if( $_POST && (isset($_POST['leadlink']) && strlen($_POST['leadlink']) == 0) && $_POST['linklead'] == $sessao && !empty(ValidaFone($_POST['telefone'])) && (floor($form_submit-$form_start) >= TIMEOUT) ){
			############################################
			############################################
			$info['data'] 			= date("Y-m-d H:i:s");
			$info['dados']			= serialize($_POST['usuario']);
			$info['form']			= serialize($_POST);
			$info['origem']	 	    = SetOrigem($_POST['origem']);
			$info['interesse']	 	= SetNulo($_POST['interesse']);

			$info['nome'] 			= $_POST['nome'];
			$info['email'] 		    = $_POST['email'];
			$info['telefone']	 	= $_POST['telefone'];
			$info['mensagem']	 	= $_POST['mensagem'];
			$info['endereco']	 	= $_POST['endereco'];
			$info['bairro']	 	    = $_POST['bairro'];
			$info['cidade']	 	    = $_POST['cidade'];
			$info['modo']	 	    = $_POST['modo'];
			$info['valor']	 	    = $_POST['valor'];
			$info['area']	 	    = $_POST['area'];
			############################################
			############################################
			// GRAVA NA SESSION COM NOME E E-MAIL
			$this->session->set('P3dr0m4RiaNo_nome', $_POST['nome']);
			$this->session->set('P3dr0m4RiaNo_email', $_POST['email']);
			$this->session->set('P3dr0m4RiaNo_fone', $_POST['telefone']);
			############################################
			############################################
			// SALVA NO BD
			$idf = $this->SiteModel->Add('tb_anuncie',$info);
			############################################
			############################################
			// CENTRAL DE LEADS
			$this->SiteModel->Add('tb_leads',array(
				'data' => date("Y-m-d H:i:s"),
				'referencia' => $idf,
				'formulario' => 'anuncie',
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'telefone' => $_POST['telefone'],
				'mensagem' => SetNulo($_POST['mensagem']),
				'imovel' => SetNulo($_POST['imovel']),
				'dados' => serialize($_POST['usuario']),
				'form' => serialize($_POST),
				'origem' => SetOrigem($_POST['origem'])
			));
			############################################
			############################################
			$mensagem = view('site/email/padrao', $info);
            ############################################
			############################################
			$phpmailer = new PHPMailerLib();
            $mail = $phpmailer->load();
			$mail->IsHTML(true);
			$mail->IsSMTP();
			$mail->SMTPAuth   	= true;
			$mail->CharSet   	= 'UTF-8';
			$mail->Host       	= SMTP_URL;
			$mail->Port       	= SMTP_PORTA;
			$mail->Username   	= SMTP_EMAIL;
			$mail->Password   	= SMTP_SENHA;
			$mail->Subject    	= ConvertUTF("Anuncie seu Imóvel enviado pelo Site");
			$mail->Body			= $mensagem;
			$mail->AddReplyTo($info['email'], ConvertUTF($info['nome']) );
			$mail->SetFrom(SMTP_EMAIL, ConvertUTF($info['nome']) );
			############################################
			############################################
			//$mail->AddAddress("rodrigo@leadlink.com.br",ConvertUTF("Lead Link") );
			############################################
			############################################
			$mail->AddAddress("rdzdigital@gmail.com",ConvertUTF($this->sitenome) );
			//$mail->AddAddress("danton+pedromariano@leadlink.com.br",ConvertUTF($this->sitenome) );
			############################################
			############################################
			if( $mail->Send() ){
				$this->session->set('P3dr0m4RiaNo_status','ok');
				Redireciona($_POST['redirect']);
			}else{
				$this->session->set('P3dr0m4RiaNo_status','no');
				Redireciona($_POST['redirect']);
			}
            ############################################
		    ############################################
		}else{
			$this->session->set('P3dr0m4RiaNo_status','erro');
			Redireciona($_POST['redirect']);
		}
        ############################################
		############################################
	}
	######################################################################################################
    ######################################################################################################
	// FAVORITOS DO SITE
	public function favoritos(){
		############################################
		############################################
		header('Content-Type: text/html; charset=utf-8');
		############################################
		############################################
		if( $_POST && isset($_POST['codigo']) && !empty($_POST['codigo']) ){
			############################################
		    ############################################
			$sessao = $this->session->get('P3dr0m4RiaNo_favoritos');
			if( empty($sessao) ){
				$sessao = array();
			}
			############################################
		    ############################################
			$imo = explode('_',$_POST['codigo']);
			$imovel = $imo[1].'#'.$imo[0];
			############################################
		    ############################################
			$existe = search_in_array($imovel, $sessao, 'v');
			############################################
		    ############################################
			if( empty($existe) ){
				#################################
				#################################
				$this->session->remove('P3dr0m4RiaNo_favoritos');
				array_push($sessao,$imovel);
				$this->session->set('P3dr0m4RiaNo_favoritos',$sessao);
				#################################
				#################################
				$total = count($sessao);
				die('1-'.$total);
				#################################
				#################################
			}elseif( !empty($existe) ){
				#################################
				#################################
				unset($sessao[str_replace('k','',$existe)]);
				#################################
				#################################
				$this->session->remove('P3dr0m4RiaNo_favoritos');
				$novasessao = array_values($sessao);
				$this->session->set('P3dr0m4RiaNo_favoritos',$novasessao);
				#################################
				#################################
				$total = count($novasessao);
				die('2-'.$total);
				#################################
				#################################
			}
		}else{
			#################################
			#################################
			die('3-0');
			#################################
			#################################
		}
	}
    ######################################################################################################
    ######################################################################################################
}
?>