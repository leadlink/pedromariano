<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 empresa internas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 title-sc-home mt-3">
                    <h1 class="h2-home"><?php echo $secao->titulo; ?></h1>
                </div>

                <div class="col-lg-9 col-12 mt-3 mb-5">
                    <p>A privacidade dos visitantes do site da <?php echo $config->titulo; ?> é muito importante para nós. Esta página descreve quais informações pessoais coletamos e como as utilizamos.</p>
                    <br />
                    <p><strong>Coleta de Informações</strong><br>Quando você visita nosso site, podemos coletar informações sobre seu navegador, endereço IP e páginas visitadas. Também podemos armazenar informações fornecidas voluntariamente, como nome, email, telefone e preferências de imóveis.</p>
                    <br />
                    <p><strong>Uso das Informações</strong><br>As informações coletadas são utilizadas para entender as necessidades dos nossos visitantes, fornecer um serviço melhor e personalizado, processar pedidos, e para enviar informações relevantes sobre imóveis e serviços oferecidos pela <?php echo $config->titulo; ?>.</p>
                    <br />
                    <p><strong>Compartilhamento de Informações</strong><br>Nós não compartilhamos, vendemos ou alugamos suas informações pessoais para terceiros sem o seu consentimento, exceto quando exigido por lei ou para proteger nossos direitos legais.</p>
                    <br />
                    <p><strong>Cookies</strong><br>Nosso site pode utilizar cookies para melhorar a experiência do usuário. Você pode desabilitar os cookies nas configurações do seu navegador, mas isso pode afetar a funcionalidade do site.</p>
                    <br />
                    <p><strong>Segurança</strong><br>Tomamos medidas de segurança para proteger suas informações contra acesso não autorizado ou uso indevido.</p>
                    <br />
                    <p><strong>Contato</strong><br>Se você tiver alguma dúvida sobre nossa política de privacidade, entre em contato conosco pela página de <a href="<?php echo base_url(); ?>contato/" title="Fale Conosco">Fale Conosco</a>.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>