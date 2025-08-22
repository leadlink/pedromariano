<?php include("topo.php"); ?>
        <tr>
            <td width="50"></td>
            <td width="550" height="40" align="left" valign="top" style="font-family:Arial;font-size:15px;color:#333333;line-height:23px;">
                <?php if( !empty($nome) ){ ?><b>Nome:</b> <?php echo $nome; ?><br /><?php } ?>
                <?php if( !empty($email) ){ ?><b>E-mail:</b> <?php echo $email; ?><br /><?php } ?>
                <?php if( !empty($telefone) ){ ?><b>Telefone:</b> <?php echo $telefone; ?><br /><?php } ?>
                <?php if( !empty($cpf) ){ ?><b>CPF:</b> <?php echo $cpf; ?><br /><?php } ?>
                <?php if( !empty($contatar) ){ ?><b>Contatar:</b> <?php echo $contatar; ?><br /><?php } ?>
                <?php if( !empty($assunto) ){ ?><b>Assunto:</b> <?php echo $assunto; ?><br /><?php } ?>
                <?php if( !empty($origem) ){ ?><b>Origem:</b> <?php echo ucfirst($origem); ?><br /><?php } ?>
                <?php if( !empty($horario) ){ ?><b>Horário para Contato:</b> <?php echo $horario; ?><br /><?php } ?>
                <?php if( !empty($destino) ){ ?><b>Assunto:</b> <?php echo $destino; ?><br /><?php } ?>

                <?php if( !empty($idioma) ){ ?><b>Fala algum idioma:</b> <?php echo $idioma; ?><br /><?php } ?>
                <?php if( !empty($conhece) ){ ?><b>Conhece alguém na Igor:</b> <?php echo $conhece; ?><br /><?php } ?>
                <?php if( !empty($esperiencia) ){ ?><b>Teve experiências anteriores:</b> <?php echo $esperiencia; ?><br /><?php } ?>

                <?php if( !empty($corretor) ){ ?><b>Já trabalhou como Corretor:</b> <?php echo $corretor; ?><br /><?php } ?>
                <?php if( !empty($possui) ){ ?><b>Possui CRECI:</b> <?php echo $possui; ?><br /><?php } ?>
                <?php if( !empty($creci) ){ ?><b>CRECI:</b> <?php echo $creci; ?><br /><?php } ?>
                <?php if( !empty($estado) ){ ?><b>Estado:</b> <?php echo $estado; ?><br /><?php } ?>

                <?php if( !empty($facebook) ){ ?><b>Facebook:</b> <?php echo $facebook; ?><br /><?php } ?>
                <?php if( !empty($instagram) ){ ?><b>Instagram:</b> <?php echo $instagram; ?><br /><?php } ?>
                <?php if( !empty($linkedin) ){ ?><b>LinkedIn:</b> <?php echo $linkedin; ?><br /><?php } ?>

                <?php if( !empty($entrada) ){ ?><b>Valor de Entrada:</b> <?php echo $entrada; ?><br /><?php } ?>
                <?php if( !empty($renda) ){ ?><b>Renda Bruta:</b> <?php echo $renda; ?><br /><?php } ?>

                <?php if( !empty($documento) ){ ?><b>CPF/CNPJ:</b> <?php echo $documento; ?><br /><?php } ?>
                <?php if( !empty($visita) ){ ?><b>Data da Visita:</b> <?php echo $visita; ?><br /><?php } ?>
                <?php if( !empty($turno) ){ ?><b>Turno da Visita:</b> <?php echo $turno; ?><br /><?php } ?>
                <?php if( !empty($nascimento) ){ ?><b>Data de Nascimento:</b> <?php echo $nascimento; ?><br /><?php } ?>
                <?php if( !empty($interesse) ){ ?><b>Interesse:</b> <?php echo $interesse; ?><br /><?php } ?>
                <?php if( !empty($profissao) ){ ?><b>Profissão:</b> <?php echo $profissao; ?><br /><?php } ?>
                <?php if( !empty($civil) ){ ?><b>Estado Civil:</b> <?php echo $civil; ?><br /><?php } ?>
                <?php if( !empty($administra) ){ ?><b>Quem administra:</b> <?php echo $administra; ?><br /><?php } ?>
                <?php if( !empty($administrador) ){ ?><b>Quem administra:</b> <?php echo $administrador; ?><br /><?php } ?>
                <?php if( !empty($valor) ){ ?><b>Valor:</b> <?php echo $valor; ?><br /><?php } ?>
                <?php if( !empty($iptu) ){ ?><b>IPTU:</b> <?php echo $iptu; ?><br /><?php } ?>
                <?php if( !empty($condominio) ){ ?><b>Condomínio:</b> <?php echo $condominio; ?><br /><?php } ?>
                <?php if( !empty($prazo) ){ ?><b>Prazo:</b> <?php echo $prazo; ?> anos<br /><?php } ?>
                <?php if( !empty($financiado) ){ ?><b>Valor a ser Financiado:</b> <?php echo $financiado; ?><br /><?php } ?>
                <?php if( !empty($proposta) ){ ?><b>Proposta:</b> <?php echo $proposta; ?><br /><?php } ?>
                <?php if( !empty($extras) ){ ?><b>Opções Extras:</b> <?php echo $extras; ?><br /><?php } ?>
                <?php if( !empty($finalidade) && empty($interesse) ){ ?><b>Finalidade:</b> <?php echo $finalidade; ?><br /><?php } ?>
                <?php if( !empty($modo) ){ ?><b>Finalidade:</b> <?php echo $modo; ?><br /><?php } ?>
                <?php if( !empty($tipo) ){ ?><b>Tipo:</b> <?php echo $tipo; ?><br /><?php } ?>
                <?php if( !empty($categoria) ){ ?><b>Tipo de Imóvel:</b> <?php echo $categoria; ?><br /><?php } ?>
                <?php if( !empty($area) ){ ?><b>Área:</b> <?php echo $area; ?><br /><?php } ?>
                <?php if( !empty($areatotal) ){ ?><b>Área Total:</b> <?php echo $areatotal; ?><br /><?php } ?>
                <?php if( !empty($dormitorios) ){ ?><b>Dormitórios:</b> <?php echo $dormitorios; ?><br /><?php } ?>
                <?php if( !empty($suites) ){ ?><b>Suítes:</b> <?php echo $suites; ?><br /><?php } ?>
                <?php if( !empty($banheiros) ){ ?><b>Banheiros:</b> <?php echo $banheiros; ?><br /><?php } ?>
                <?php if( !empty($salas) ){ ?><b>Salas:</b> <?php echo $salas; ?><br /><?php } ?>
                <?php if( !empty($vagas) ){ ?><b>Vagas:</b> <?php echo $vagas; ?><br /><?php } ?>
                <?php if( !empty($endereco) ){ ?><b>Endereço:</b> <?php echo $endereco; ?><br /><?php } ?>
                <?php if( !empty($bairro) ){ ?><b>Bairro:</b> <?php echo $bairro; ?><br /><?php } ?>
                <?php if( !empty($cidade) ){ ?><b>Cidade:</b> <?php echo $cidade; ?><br /><?php } ?>
                <?php if( !empty($avaliacao) ){ ?><b>Deseja Avaliação:</b> <?php echo $avaliacao; ?><br /><?php } ?>
                <?php if( !empty($codigo) ){ ?><b>Código:</b> <?php echo $codigo; ?><br /><?php } ?>
                <?php if( !empty($imovel) ){ ?><b>URL:</b> <a href="<?php echo $imovel; ?>"><?php echo $imovel; ?></a><br /><?php } ?>
                <?php if( !empty($curriculo) ){ ?><b>Currículo:</b> <a href="<?php echo $curriculo; ?>">Download Currículo</a><br /><?php } ?>
                <?php if( !empty($mensagem) ){ ?>
                <br />
				<b>Mensagem:</b><br />
                <?php echo $mensagem; ?>
                <br />
                <?php } ?>
                <?php if( !empty($descricao) ){ ?>
                <br />
				<b>Descrição do Imóvel:</b><br />
                <?php echo $descricao; ?>
                <br />
                <?php } ?>
                <?php if( !empty($anexos) && count($anexos) > 0 ){ ?>
                <br />
                <b>Arquivos Enviados:</b><br />
                <?php foreach( $anexos as $row ){ ?>
                - <a href="<?php echo $row; ?>" target="_blank"><?php echo $row; ?></a><br />
                <?php } ?>
                <?php } ?>
                <?php if( !empty($fotos) && $fotos->num_rows() > 0 ){ ?>
                <br />
                <b>Fotos Enviadas:</b><br />
                <?php foreach( $fotos->result() as $row ){ ?>
                - <a href="<?php echo $row->arquivo; ?>" target="_blank"><?php echo $row->original; ?></a><br />
                <?php } ?>
                <?php } ?>
                <?php if( !empty($documentos) && $documentos->num_rows() > 0 ){ ?>
                <br />
                <b>Documentos Enviados:</b><br />
                <?php foreach( $documentos->result() as $row ){ ?>
                - <a href="<?php echo $row->arquivo; ?>" target="_blank"><?php echo $row->original; ?></a><br />
                <?php } ?>
                <?php } ?>
            </td>
            <td width="50"></td>
        </tr>
<?php include("rodape.php"); ?>