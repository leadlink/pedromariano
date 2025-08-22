    	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-12">
					<div class="row">
						<div class="col-lg-4 col-6 menu my-3">
							<h2>INSTITUCIONAL</h2>
							<ul>
							    <li><a href="<?php echo base_url(); ?>empresa/" title="Sobre a FR Prime">Sobre a FR Prime</a></li>
                                <li><a href="<?php echo base_url(); ?>empresa/" title="Nosso Fundador">Nosso Fundador</a></li>
                                <li><a href="<?php echo base_url(); ?>fale-conosco/" title="Trabalhe Conosco">Trabalhe Conosco</a></li>
                                <li><a href="<?php echo base_url(); ?>" title="Na Mídia">Na Mídia</a></li>
                                <li><a href="<?php echo base_url(); ?>depoimentos/" title="Depoimentos">Depoimentos</a></li>
                                <li><a href="<?php echo base_url(); ?>fale-conosco/" title="Ouvidoria">Ouvidoria</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-6 menu my-3">
							<h2>SOLUÇÕES IMOBILIÁRIAS</h2>
							<ul>
                                <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/" title="Comprar Imóvel">Comprar Imóvel</a></li>
                                <li><a href="<?php echo base_url(); ?>busca/alugar/cidade/volta-redonda/1/" title="Alugar Imóvel">Alugar Imóvel</a></li>
                                <li><a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">Anuncie seu Imóvel</a></li>
                                <li><a href="<?php echo base_url(); ?>avaliar-imovel-gratis/" title="Calculadora de Valor de Imóvel">Calculadora de Valor de Imóvel</a></li>
                                <li><a href="<?php echo base_url(); ?>" title="Regularização de Imóveis">Regularização de Imóveis</a></li>
                                <li><a href="<?php echo base_url(); ?>" title="Construção Sob Medida">Construção Sob Medida</a></li>
                                <li><a href="<?php echo base_url(); ?>" title="Minha Casa Minha Vida (Primeiro Imóvel)">Minha Casa Minha Vida (Primeiro Imóvel)</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-6 menu my-3">
							<h2>IMÓVEIS À VENDA</h2>
							<ul>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/">Imóveis à Venda</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/valor_ate/300000/1/">Imóveis à Venda: até 300 mil</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/valor_de/300000/valor_ate/500000/1/">Imóveis à Venda: de 300 a 500 mil</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/valor_de/500000/valor_ate/1000000/1/">Imóveis à Venda: de 500 a 1.000.000</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/valor_de/1000000/1/">Imóveis à Venda: a partir de 1.000.000</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/categorias/apartamentos/1/">Apartamentos à Venda</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/categorias/casas/1/">Casas à Venda</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/categorias/terrenos/1/">Terrenos à Venda</a></li>
							  <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/">Ver Mais Imóveis à Venda</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-6 menu my-3">
							<h2>SOCIAL</h2>
							<ul>
                                <li><a href="<?php echo base_url(); ?>" title="Projeto 1C5C">Projeto 1C5C</a></li>
                                <li><a href="<?php echo base_url(); ?>" title="Programa de Indicações">Programa de Indicações</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-6 menu my-3">
							<h2>LOCAÇÃO POR TEMPORADA</h2>
							<ul>
                                <li><a href="<?php echo base_url(); ?>busca/alugar/cidade/volta-redonda/1/" title="Alugue">Alugue</a></li>
                                <li><a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie">Anuncie</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-6 menu my-3">
							<h2>SIGA-NOS</h2>
							<ul>
                                <?php if( !empty($config->instagram) ){ ?><li><a href="<?php echo $config->instagram; ?>" target="_blank" title="Instagram">Instagram</a></li><?php } ?>
                                <?php if( !empty($config->youtube) ){ ?><li><a href="<?php echo $config->youtube; ?>" target="_blank" title="Youtube">Youtube</a></li><?php } ?>
                                <?php if( !empty($config->facebook) ){ ?><li><a href="<?php echo $config->facebook; ?>" target="_blank" title="Facebook">Facebook</a></li><?php } ?>
                                <?php if( !empty($config->linkedin) ){ ?><li><a href="<?php echo $config->linkedin; ?>" target="_blank" title="LinkedIn">LinkedIn</a></li><?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-12 my-3">
					<h2>INVESTIDOR</h2>
					<ul>
                        <li><a href="<?php echo base_url(); ?>" title="Investir em São Paulo">Investir em São Paulo</a></li>
                        <li><a href="<?php echo base_url(); ?>" title="Investir e Airbnb">Investir e Airbnb</a></li>
                        <li><a href="<?php echo base_url(); ?>" title="Leilões de Imóveis">Leilões de Imóveis</a></li>
                        <li><a href="<?php echo base_url(); ?>" title="Consultoria Imobiliária para Investidores">Consultoria Imobiliária para Investidores</a></li>
					</ul>

					<h2>FINANCIAMENTO E CONSÓRCIO</h2>
					<ul>
                        <li><a href="<?php echo base_url(); ?>" title="Consórcio Imobiliário">Consórcio Imobiliário</a></li>
                        <li><a href="<?php echo base_url(); ?>" title="Financiamento Imobiliário">Financiamento Imobiliário</a></li>
                        <li><a href="<?php echo base_url(); ?>" title="Crédito com Garantia de Imóvel">Crédito com Garantia de Imóvel</a></li>
					</ul>

					<h2>
                        <a href="<?php echo base_url(); ?>" title="Loja da Prime">
                            LOJA DA PRIME
                        </a>
                    </h2>
					<h2 class="my-3 py-3">
                        <a href="https://blog.frprimeimoveis.com.br/" title="Blog da Prime">
                            BLOG DA PRIME
                        </a>
                    </h2>
					<h2>
                        <a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">
                            ANUNCIE SEU IMÓVEL
                        </a>
                    </h2>
				</div>

				<div class="col-12 mt-4">
					<div class="row fter">
						<div class="col-lg-6 col-sm-12 col-12">
							<div class="row">
								<div class="col-lg-3 col-sm-4 col-12 logo my-3 my-lg-auto">
									<a href="<?php echo base_url().Origem(); ?>" title="<?php echo $config->titulo; ?>">
										<img src="<?php echo base_url()."uploads/".$config->logo2; ?>" alt="<?php echo $config->titulo; ?>">
									</a>
								</div>
								<div class="col-lg-9 col-sm-8 col-12 sobre my-3 my-lg-auto">
									<p>Somos referência em consultoria imobiliária e investimentos imobiliários em Volta Redonda, São Paulo e Alphaville. <br>Na FR Prime, oferecemos soluções completas para compra, venda, locação e consórcio de imóveis, sempre com atendimento personalizado e visão estratégica. <br>Conectamos nossos clientes aos melhores imóveis residenciais, comerciais e para renda, com segurança, clareza e foco em valorização patrimonial. <br>Sua próxima negociação imobiliária começa com a FR Prime.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-12 enfone">
							<h2>FALE CONOSCO</h2>
							<div class="row">
								<?php foreach( $enderecos as $endereco ){ ?>
								<div class="col-lg-6 col-sm-6 col-12 enfone mb-3">
									<address>
										<strong><?php echo $endereco->local; ?> - <?php echo $endereco->estado; ?></strong><br>
										<a href="<?php echo $endereco->maps; ?>" title="Traçar Rota" target="_blank">
											<?php echo $endereco->endereco; ?><br>
											<?php echo $endereco->bairro; ?>
										</a>
									</address>
									<ul>
										<li>
											<a href="tel:+<?php echo Telefone($endereco->telefone); ?>" title="Telefone" target="_blank">
												<?php include caminho_fisico()."assets/site/img/fone.svg"; ?>
												<?php echo $endereco->telefone; ?>
											</a>
										</li>
										<li>
											<a href="#whatsapp<?php echo ($endereco->id == '2')?'-alphaville':''; ?>" data-bs-toggle="modal" title="WhatsApp" class="bt-fone">
												<?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
												<?php echo $endereco->whatsapp; ?>
											</a>
										</li>
									</ul>
									<span class="cep">CEP: <?php echo $endereco->cep; ?></span>
								</div>
								<?php } ?>
							</div>
						</div>

					</div>
				</div>

				<ul class="col-12 bottom-footer">
					<li>
                        <a href="<?php echo base_url(); ?>politica-de-privacidade/" title="Política de Privacidade">Política de Privacidade</a>
                    </li>
					<li>Creci <?php echo $config->creci; ?></li>
					<li>
						Site para imobiliárias
						<a href="https://www.leadlink.com.br/personalizado/<?php echo REFERENCIA; ?>/" title="Site para imobiliarias Lead Link" rel="noopener" target="_blank"><strong>Lead Link</strong></a>
                    </li>
				</ul>
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
    $status = service('session')->get('FrP41me_status');

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
   	<?php service('session')->remove('FrP41me_status'); ?>
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