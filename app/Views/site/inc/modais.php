<!-- Agendar Visita -->
<div class="modal fade" id="visita" tabindex="-1" role="dialog">
    <div class="modal-dialog md-in" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <div class="col-12 title">
                <h2>Agendar Visita</h2>
            </div>
            <div class="content-modal">
            	<form action="<?php echo base_url(); ?>envio/visita/" id="form_visita" name="form_visita" method="post" enctype="multipart/form-data" class="row form validacao">
                	<input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
			        <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                    <input type="hidden" name="codigo" value="<?php echo $imo_codigo; ?>">
                    <input type="hidden" name="preco" value="<?php echo $imovel->valorvenda; ?>">
                   	<input type="hidden" name="modo" value="<?php echo $imovel->modo; ?>">
                    <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />
                    <input type="hidden" name="interesse" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>" />

                    <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                    <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                    <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />

                    <div class="col-12">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                    </div>
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Telefone/WhatsApp</label>
                        <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                    </div>

                    <div class="col-12 my-1">
                        <div class="title2">
                            <b>Datas</b> <br>
                            <small>Escolha uma das datas.</small>
                        </div>
                    </div>

                    <div class="col-12">
                        <ul class="check-radio2">
                            <?php
                            $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');

                            function NovosDias($days){
                                for($i=0;$i<$days;$i++){
                                    $day = date('N',strtotime("+".($i+1)."day"));
                                    if( $day > 5 ){
                                        $days++;
                                    }
                                }
                                return $i;
                            }

                            for($d = 2; $d <= 7; $d++){
                                $x = NovosDias($d);
                            ?>
                            <li>
                                <input type="radio" id="dia_<?php echo $d; ?>_a" name="visita" value="<?php echo date("d/m/Y",strtotime("+".$x." day")); ?>"<?php echo ($d == 3)?' checked="checked"':''; ?>>
                                <label for="dia_<?php echo $d; ?>_a">
                                    <b><?php echo $diasemana[date('w',strtotime("+".$x." day"))]; ?></b>
                                    <span><?php echo date("d/m",strtotime("+".$x." day")); ?></span>
                                </label>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="col-12 mt-2 mb-0 fleft">
                        <div class="title2">
                            <b>Turno</b>
                        </div>
                    </div>

                    <div class="col-12">
                        <ul class="check-radio2">
                            <li>
                                <input type="radio" id="manha" name="turno" value="Manhã">
                                <label for="manha">
                                    <b>Manhã</b>
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="tarde" name="turno" value="Tarde" checked="checked">
                                <label for="tarde">
                                    <b>Tarde</b>
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="noite" name="turno" value="Noite">
                                <label for="noite">
                                    <b>Noite</b>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 mt-3">
                        <label>Mensagem</label>
                        <textarea placeholder="Mensagem" name="mensagem" rows="4" required="required"></textarea>
                    </div>
                    <div class="leadlink">
                        <input type="text" name="leadlink" value="">
                        <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <input type="submit" class="bt-modal" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Agendar Visita -->

<!-- Mais Informações -->
<div class="modal fade" id="informacoes" tabindex="-1" role="dialog">
    <div class="modal-dialog md-in" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <div class="col-12 title">
                <h2>Mais Informações</h2>
            </div>
            <div class="content-modal">
            	<form action="<?php echo base_url(); ?>envio/interesse/" id="form_interesse" name="form_interesse" method="post" enctype="multipart/form-data" class="row form validacao">
                	<input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
			        <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                    <input type="hidden" name="codigo" value="<?php echo $imo_codigo; ?>">
                    <input type="hidden" name="preco" value="<?php echo $imovel->valorvenda; ?>">
                   	<input type="hidden" name="modo" value="<?php echo $imovel->modo; ?>">
                    <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />
                    <input type="hidden" name="interesse" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>" />

                    <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                    <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                    <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />

                    <div class="col-12">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                    </div>
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Telefone/WhatsApp</label>
                        <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Mensagem</label>
                        <textarea placeholder="Digite sua Mensagem" name="mensagem" rows="4" required="required">Gostaria de mais informações sobre o código <?php echo $imo_codigo; ?> - <?php echo $imo_titulo; ?>. Obrigado.</textarea>
                    </div>
                    <div class="leadlink">
                        <input type="text" name="leadlink" value="">
                        <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <input type="submit" class="bt-modal" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Mais Informações -->

<!-- Financiamento -->
<div class="modal fade" id="financiamento" tabindex="-1" role="dialog">
    <div class="modal-dialog md-in" role="document">
        <div class="modal-content">
        	<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <div class="col-12 title">
                <h2>Simular Financiamento</h2>
            </div>
            <div class="content-modal box-moda">
            	<form action="<?php echo base_url(); ?>envio/financiamento/" id="form_financiamento" name="form_financiamento" method="post" enctype="multipart/form-data" class="row form validacao">
                    <div class="col-12 mb-4 fleft100">
                    	<h3 class="text-center my-0">Valor do Imóvel</h3>
                        <h3 class="text-center my-0"><?php echo Dinheiro($imovel->valorvenda); ?></h3>
                    </div>
                	<input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
			        <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                    <input type="hidden" name="codigo" value="<?php echo $imo_codigo; ?>">
                    <input type="hidden" name="preco" value="<?php echo $imovel->valorvenda; ?>">
                   	<input type="hidden" name="modo" value="<?php echo $imovel->modo; ?>">
                    <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />
                    <input type="hidden" name="interesse" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>" />

                    <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                    <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                    <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />

                    <div class="col-12">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                    </div>
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Telefone/WhatsApp</label>
                        <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Mensagem</label>
                        <textarea placeholder="Digite sua Mensagem" name="mensagem" rows="4" required="required"></textarea>
                    </div>
                    <div class="leadlink">
                        <input type="text" name="leadlink" value="">
                        <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <input type="submit" class="bt-modal" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Financiamento -->

<!-- Endereço -->
<div class="modal fade" id="endereco" tabindex="-1" role="dialog">
    <div class="modal-dialog md-in" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <div class="col-12 title">
                <h2>Endereço Completo</h2>
            </div>
            <div class="content-modal">
            	<form action="<?php echo base_url(); ?>envio/endereco/" method="post" id="form_endereco" name="form_endereco" class="row form validacao">
                	<input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
			        <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>#mapa" />
                    <input type="hidden" name="codigo" value="<?php echo $imo_codigo; ?>">
                    <input type="hidden" name="preco" value="<?php echo $imovel->valorvenda; ?>">
                   	<input type="hidden" name="modo" value="<?php echo $imovel->modo; ?>">
                    <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />
                    <input type="hidden" name="interesse" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>" />

                    <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                    <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                    <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />

                    <div class="col-12">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                    </div>
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Telefone/WhatsApp</label>
                        <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                    </div>
                    <div class="leadlink">
                        <input type="text" name="leadlink" value="">
                        <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <input type="submit" class="bt-modal" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Endereço -->

<?php foreach( $enderecos as $endereco ){ ?>
<!-- WhatsApp -->
<div class="modal fade" id="whatsapp<?php echo ($endereco->id == '2')?'-alphaville':''; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog md-in" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <div class="col-12 title">
                <h2>WhatsApp<?php echo ($endereco->id == '2')?' '.$endereco->local:''; ?></h2>
            </div>
            <div class="content-modal">
            	<form action="<?php echo base_url(); ?>envio/whatsapp/" method="post" id="form_whatsapp<?php echo ($endereco->id == '2')?'_alphaville':''; ?>" name="form_whatsapp<?php echo ($endereco->id == '2')?'_alphaville':''; ?>" class="row form validacao">
                	<input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
			        <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                    <input type="hidden" name="codigo" value="<?php echo $imo_codigo; ?>">
                    <input type="hidden" name="modo" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>">
                    <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />
                    <input type="hidden" name="interesse" value="<?php echo (!empty($modo))?$modo:service('session')->get('FrP41me_modo'); ?>" />

                    <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                    <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                    <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />

                    <?php
					if( !empty($imo_codigo) ){
						$whats = "Desejo informações sobre o imóvel: ".$imo_codigo." - ".CurrentURL();
					}else{
						$whats = CurrentURL();
					}
					?>
                    <input type="hidden" name="whatstexto" value="<?php echo $whats; ?>">
                    <?php if( !empty($corretor->email) && !empty($corretor->nome) && !empty($corretor->telefone) ){ ?>
                    <input type="hidden" name="cor_email" value="<?php echo $corretor->email; ?>">
                    <input type="hidden" name="cor_nome" value="<?php echo $corretor->nome; ?>">
                    <input type="hidden" name="whatslink" id="whatslink<?php echo ($endereco->id == '2')?'_alphaville':''; ?>" value="https://api.whatsapp.com/send?phone=55<?php echo Telefone($corretor->telefone); ?>&text=" />
                    <?php }else{ ?>
                    <input type="hidden" name="whatslink" id="whatslink<?php echo ($endereco->id == '2')?'_alphaville':''; ?>" value="https://api.whatsapp.com/send?phone=55<?php echo Telefone($endereco->whatsapp); ?>&text=" />
                    <?php } ?>

                    <div class="col-12">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                    </div>
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                    </div>
                    <div class="col-12">
                        <label>Telefone/WhatsApp</label>
                        <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                    </div>
                    <div class="leadlink">
                        <input type="text" name="leadlink" value="">
                        <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <input type="submit" class="bt-modal" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /WhatsApp -->
 <?php } ?>