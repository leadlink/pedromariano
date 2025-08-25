	<footer>
		<div class="container">
			<div class="newsfooter">
				<div class="row">
					<div class="col-xl-6 col-lg-5 col-12 my-auto">
						<h2>Receba nossas novidades</h2>
						<p>Assine e acompanhe o que há de novo</p>
					</div>
					<div class="col-xl-6 col-lg-7 col-12 my-auto py-2">
						<form action="" class="form-news">
							<label class="nome">
								<span>NOME</span>
								<input type="text" placeholder="Digite" name="nome">
							</label>
							<label class="email">
								<span>E-MAIL</span>
								<input type="text" placeholder="Digite" name="email">
							</label>
							<input type="submit" value="Enviar">
						</form>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="row">
					<div class="col-lg-3 col-12 logo">
						<a href="<?php echo base_url().Origem(); ?>" title="<?php echo $config->titulo; ?>">
							<img src="<?php echo base_url()."uploads/".$config->logo2; ?>" alt="<?php echo $config->titulo; ?>">
						</a>
					</div>
					<div class="col-lg-9 col-12 my-auto">
						<ul class="menu-desk">
							<li>
								<a href="#whatsapp" data-bs-toggle="modal" title="WhatsApp">
									<?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
									<?php echo $config->whatsapp; ?>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>trabalhe-conosco/" title="Trabalhe Conosco">
									<?php include caminho_fisico()."assets/site/img/trabalhe.svg"; ?>
									Trabalhe Conosco
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>empresa/" title="Empresa">
									<?php include caminho_fisico()."assets/site/img/empresa.svg"; ?>
									Empresa
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>avaliar-imovel-gratis/" title="Avalie imóvel Grátis">
									<?php include caminho_fisico()."assets/site/img/tag.svg"; ?> Avalie imóvel Grátis
								</a>
							</li>
						</ul>
					</div>
					<div class="col-12 my-3"><hr class="line"></div>

					<div class="col-lg-3 col-12 mt-4">
						<h2>Navegação</h2>

						<ul class="menu-footer">
							<?php echo view('site/inc/menu'); ?>
						</ul>
					</div>

					<div class="col-lg-9 col-12">
						<div class="row">
							<?php foreach( $enderecos as $endereco ){ ?>
							<div class="col-lg-4 col-sm-6 endes mt-3">
								<h2><?php echo $endereco->local; ?></h2>
								<address>
									<a href="<?php echo $endereco->maps; ?>" title="Traçar Rota" target="_blank">
										<?php echo $endereco->endereco; ?><br>
										<?php echo $endereco->bairro; ?><br>
										<?php echo $endereco->cidade; ?>, <?php echo $endereco->estado; ?> <br>
										CEP: <?php echo $endereco->cep; ?>
									</a>
								</address>
								<a href="mailto:sac@pedromariano.com.br" class="mail">sac@pedromariano.com.br</a>
								<a href="<?php echo $endereco->maps; ?>" title="Traçar Rota" target="_blank" class="rota">Traçar Rota</a>
							</div>
							<?php } ?>

							<div class="col-lg-4 col-sm-6 endes mt-3">
								<h2>Siga-nos</h2>

								<ul class="share">
									<?php if( !empty($config->instagram) ){ ?>
									<li>
										<a href="<?php echo $config->instagram; ?>" target="_blank" title="Instagram">
											<?php include caminho_fisico()."assets/site/img/i_instagram.svg"; ?> Instagram
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->youtube) ){ ?>
									<li>
										<a href="<?php echo $config->youtube; ?>" target="_blank" title="Youtube">
											<?php include caminho_fisico()."assets/site/img/i_youtube.svg"; ?> Youtube
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->pinterest) ){ ?>
									<li>
										<a href="<?php echo $config->pinterest; ?>" target="_blank" title="Pinterest">
											<?php include caminho_fisico()."assets/site/img/i_pinterest.svg"; ?> Pinterest
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->tiktok) ){ ?>
									<li>
										<a href="<?php echo $config->tiktok; ?>" target="_blank" title="TikTok">
											<?php include caminho_fisico()."assets/site/img/i_tiktok.svg"; ?> TikTok
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->twitter) ){ ?>
									<li>
										<a href="<?php echo $config->twitter; ?>" target="_blank" title="Twitter">
											<?php include caminho_fisico()."assets/site/img/i_twitter.svg"; ?> Twitter
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->facebook) ){ ?>
									<li>
										<a href="<?php echo $config->facebook; ?>" target="_blank" title="Facebook">
											<?php include caminho_fisico()."assets/site/img/i_facebook.svg"; ?> Facebook
										</a>
									</li>
									<?php } ?>
									<?php if( !empty($config->linkedin) ){ ?>
									<li>
										<a href="<?php echo $config->linkedin; ?>" target="_blank" title="LinkedIn">
											<?php include caminho_fisico()."assets/site/img/i_linkedin.svg"; ?> LinkedIn
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>

							<div class="col-12 horarios mt-4">
								<h2>Horários de atendimento</h2>
								<time><strong>Administrativo:</strong> Segunda-feira à Sexta-feira 8h30 às 18h. Sábado das 8h30 às 12h30.</time>
								<time><strong>Vendas e locação:</strong> Segunda-feira à Sexta-feira 8h30 às 18h. Sábado das 8h30 às 13h.</time>
							</div>
						</div>
					</div>

					<div class="col-12 my-3">
						<hr class="line">
					</div>

					<div class="col-12">
						<p class="texfooter">Atuamos com excelência no mercado imobiliário do ABC Paulista, especialmente em São Bernardo do Campo, Santo André e São Caetano do Sul. Oferecemos soluções completas em compra, venda, locação e administração de imóveis residenciais e comerciais. Com atendimento personalizado e transparente, buscamos sempre a melhor experiência para nossos clientes. Conte com nossa equipe para realizar seu sonho com segurança e confiança!</p>
					</div>
				</div>
			</div>

			<div class="sub-footer">
				<div><a href="<?php echo base_url(); ?>politica-de-privacidade/" title="Política de Privacidade">Política de Privacidade</a></div>
				<div>CRECI: <?php echo $config->creci; ?></div>
			</div>
		</div>
	</footer>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <a href="#whatsapp" data-bs-toggle="modal" id="whats-fab" title="WhatsApp">
    	<?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
    </a>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php echo view('site/inc/modais'); ?>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- Owl Carousel Assets -->
	<link href="<?php echo base_url(); ?>assets/site/css/carousel/owl.carousel.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <!-- BOOTSTRAP -->
	<script src="<?php echo base_url(); ?>assets/site/js/popper.min.js" defer></script>
	<script src="<?php echo base_url(); ?>assets/site/js/bootstrap.min.js" defer></script>
    <script src="<?php echo base_url(); ?>assets/site/js/carousel/owl.carousel.min.js" defer></script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php if( !PageSpeed() ){ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/fancybox.css" media="print" onload="this.media='all'" />
	<script src="<?php echo base_url(); ?>assets/site/js/fancybox.umd.js" defer></script>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- Cookies -->
	<style>
		.cookieConsentContainer{z-index:8;width:350px;min-height:20px;box-sizing:border-box;padding:20px;box-shadow:0 0 10px #0000004f;background-color:#fff;border-radius:11px;overflow:hidden;position:fixed;bottom:17px;right:17px;display:none}.cookieConsentContainer .cookieTitle a{color:#000;font-size:22px;line-height:20px;display:block}.cookieConsentContainer .cookieDesc p{margin:0;padding:0;color:#000;font-size:13px;line-height:20px;display:block;font-weight:400}.cookieConsentContainer .cookieDesc a{color:#000;font-weight:600;text-decoration:none}.cookieConsentContainer .cookieButton a{display:inline-block;color:#fff;font-size:14px;font-weight:700;margin-top:14px;background:#000;box-sizing:border-box;padding:11px 24px;text-align:center;transition:background .3s}.cookieConsentContainer .cookieButton a:hover{cursor:pointer;background:#000;color:#fff}@media (max-width:980px){.cookieConsentContainer{bottom:2%!important;left:3%!important;width:94%!important;border-radius:0}}
	</style>
	<script>
		var purecookieTitle="Cookies.",purecookieLink='',purecookieDesc='Utilizamos cookies essenciais e tecnologias semelhantes de acordo com a nossa <a href="' + CAMINHO + 'politica-de-privacidade/" title="Política de Privacidade">Política de Privacidade</a>, ao continuar navegando, você concorda com estas condições.',purecookieButton="ACEITAR";function pureFadeIn(e,o){var i=document.getElementById(e);i.style.opacity=1,i.style.display=o||"block",function e(){var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()}function pureFadeOut(e){var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var n="";if(i){var t=new Date;t.setTime(t.getTime()+24*i*60*60*1e3),n="; expires="+t.toUTCString()}document.cookie=e+"="+(o||"")+n+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),n=0;n<i.length;n++){for(var t=i[n];" "==t.charAt(0);)t=t.substring(1,t.length);if(0==t.indexOf(o))return t.substring(o.length,t.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){if(!getCookie("purecookieDismiss")){var e=document.createElement("div");e.classList.add("cookieConsentContainer"),e.id="cookieConsentContainer",e.innerHTML='<div class="cookieDesc"><p>'.concat(purecookieDesc," ").concat(purecookieLink,'</div><div class="cookieButton"><a onClick="purecookieDismiss();" rel="noreferrer" title="Aceitar">').concat(purecookieButton,"</a></div>"),document.body.appendChild(e),pureFadeIn("cookieConsentContainer")}}function purecookieDismiss(){setCookie("purecookieDismiss","1",15),pureFadeOut("cookieConsentContainer")}window.onscroll=function(){cookieConsent()};
    </script>
    <?php } ?>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
	<!-- LazyLoad -->
	<script>
		window.addEventListener("load", function () {let options = {rootMargin: "0px 0px 0px 0px", threshold: .3},observer = new IntersectionObserver((e, r) => {e.forEach(e => {if (!e.isIntersecting) return;let t = e.target;if (t.getAttribute('data-src')) {let s = t.getAttribute("data-src");t.addEventListener("load", () => {t.classList.add("loaded")});t.removeAttribute("data-src");t.src = s;r.unobserve(t);}else if (t.getAttribute('data-srcset')) {let s = t.getAttribute("data-srcset");t.addEventListener("load", () => {t.classList.add("loaded")});t.removeAttribute("data-srcset");t.srcset = s;r.unobserve(t);}})},options),images = document.querySelectorAll("[data-src],[data-srcset]");[...images].forEach(e => {observer.observe(e)})});
    </script>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php
    $status = service('session')->get('P3dr0m4RiaNo_status');

	if( !empty( $status ) ){
		switch($status){
			case 'ok':
				$msg = "Seu formulário foi enviado com Sucesso!!";
			break;
			case 'no':
				$msg = "Não foi possível realizar o envio do formulário!!";
			break;
			case 'erro':
				$msg = "Dados inválidos. Revise seu telefone e/ou e-mail preenchidos no formulário.";
			break;
		}
		?>
    <!-- ########################################################################### -->
    <!-- ########################################################################### -->
    <!-- RETORNO FORMS -->
    <script language="javascript" type="text/javascript">
		/* ################################# */
		/* ################################# */
		<?php if( $status == 'ok' ){ ?>
		/* ################################# */
		// Google Analytics - Conversão
		//gtag('event', 'conversion', { 'send_to': '' });
		/* ################################# */
		/* ################################# */
		// FB Pixel - Conversão
		//fbq('track', 'Lead');
		/* ################################# */
		<?php } ?>
		/* ################################# */
		/* ################################# */
		alert('<?php echo $msg; ?>');
		/* ################################# */
		/* ################################# */
	</script>
    <?php } ?>
   	<?php service('session')->remove('P3dr0m4RiaNo_status'); ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <input type="hidden" id="timeout" name="timeout" value="1">
    <input type="hidden" id="target" name="target" value="">
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php if( !PageSpeed() ){ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->

    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>
</body>
</html>