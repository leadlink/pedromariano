<?php
service('session')->set('P3dr0m4RiaNo_formstart', microtime(true));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
	<meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5">
   	<meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src 'self' 'unsafe-inline' *; img-src * data: 'unsafe-inline'">
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <title><?php echo $titulo; ?></title>
    <meta name="description" xml:lang="pt-BR" lang="pt-BR" content="<?php echo $descricao; ?>" />
    <meta name="keywords" content="<?php echo (!empty($keywords))?$keywords:Keywords($descricao); ?>">
    <meta name="title" content="<?php echo $titulo; ?>" />
    <meta name="robots" content="<?php echo $robots; ?>" />
    <link rel="canonical" href="<?php echo CurrentURL(); ?>" />
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
	<!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>uploads/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>uploads/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>uploads/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>uploads/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>uploads/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>uploads/favicon/ms-icon-144x144.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>uploads/favicon/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>uploads/favicon/favicon.ico" />
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
	<!-- Google Plus -->
    <meta itemprop="name" content="<?php echo $titulo; ?>">
    <meta itemprop="description" content="<?php echo $descricao; ?>">
    <meta itemprop="url" content="<?php echo CurrentURL(); ?>">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo $config->titulo; ?>">
    <meta name="twitter:title" content="<?php echo $titulo; ?>">
    <meta name="twitter:description" content="<?php echo $descricao; ?>">
    <meta name="twitter:url" content="<?php echo CurrentURL(); ?>">
    <!-- Open Graph Article (Facebook & Pinterest) -->
    <meta property="og:url" content="<?php echo CurrentURL(); ?>">
    <meta property="og:title" content="<?php echo $titulo; ?>">
    <meta property="og:description" content="<?php echo $descricao; ?>">
    <meta property="og:site_name" content="<?php echo $titulo; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image:type" content="image/jpeg">
	<!-- Imagens -->
    <?php if( !empty($imo_foto) ){ ?>
    <meta itemprop="image" content="<?php echo $imo_foto; ?>">
    <meta name="twitter:image:src" content="<?php echo $imo_foto; ?>">
    <meta property="og:image" content="<?php echo $imo_foto; ?>">
    <?php }else{ ?>
	<meta itemprop="image" content="<?php echo base_url(); ?>uploads/social.png">
	<meta name="twitter:image:src" content="<?php echo base_url(); ?>uploads/social.png">
	<meta property="og:image" content="<?php echo base_url(); ?>uploads/social.png">
    <?php } ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- Dados da Empresa -->
	<script type="application/ld+json">
        {
        "@context":"https://schema.org",
        "@type":"RealEstateAgent",
        "@id":"<?php echo base_url(); ?>",
        "name":"<?php echo $config->titulo; ?>",
        "description":"<?php echo Redutor($config->descricao,250); ?>",
        "telephone":"+55<?php echo Telefone($config->telefone); ?>",
        "url":"<?php echo base_url(); ?>",
        "logo":"<?php echo base_url(); ?>uploads/<?php echo $config->logo; ?>",
        "address":{
            "@type":"PostalAddress",
            "type":"PostalAddress",
            "streetAddress":"<?php echo $config->endereco; ?> - <?php echo $config->bairro; ?>",
            "addressLocality":"<?php echo $config->cidade; ?>",
            "addressRegion":"<?php echo $config->estado; ?>",
            "postalCode":"<?php echo $config->cep; ?>",
            "addressCountry":"BR"
            }
        }
    </script>
    <script type="application/ld+json">
		<?php
		$schemasocial = array();

		if( !empty($config->facebook) ){
			array_push($schemasocial,'"'.$config->facebook.'"');
		}
		if( !empty($config->twitter) ){
			array_push($schemasocial,'"'.$config->twitter.'"');
		}
		if( !empty($config->instagram) ){
			array_push($schemasocial,'"'.$config->instagram.'"');
		}
		if( !empty($config->youtube) ){
			array_push($schemasocial,'"'.$config->youtube.'"');
		}
		if( !empty($config->linkedin) ){
			array_push($schemasocial,'"'.$config->linkedin.'"');
		}
		?>
		{
		"@context":"https://schema.org",
		"@type":"Organization",
		"name":"<?php echo $config->titulo; ?>",
		"url":"<?php echo base_url(); ?>"
		<?php if( count($schemasocial) > 0 ){ ?>
		,"sameAs":[
		<?php echo implode(','.PHP_EOL,$schemasocial).PHP_EOL; ?>
		]<?php } ?>
		}
    </script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php if( !empty($imo_codigo) ){ ?>
    <!-- Dados do Imóvel: Product -->
	<script type="application/ld+json">
        {
        "@context":"https://schema.org",
        "@type":"Product",
        "name":"<?php echo $imo_titulo; ?>",
        "description":"<?php echo $descricao; ?>",
        "sku":"<?php echo $imo_codigo; ?>",
        "image":"<?php echo $imo_foto; ?>",
        "brand":{
            "@type":"Brand",
            "name":"<?php echo $config->titulo; ?>"
            },
        "offers":
            [{
                <?php if( !empty($imovel->valorvenda) ){ ?>"price":"<?php echo $imovel->valorvenda; ?>",
				<?php }elseif( !empty($imovel->valorlocacao) ){ ?>"price":"<?php echo $imovel->valorlocacao; ?>",<?php } ?>
                "priceCurrency":"BRL",
                "priceValidUntil":"<?php echo date('Y-m-d'); ?>",
                "itemCondition":"https://schema.org/UsedCondition",
                "availability":"https://schema.org/LimitedAvailability",
                "url":"<?php echo CurrentURL(); ?>",
                "@type":"Offer"
            }]
        }
    </script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- Dados do Imóvel: Property -->
    <script type="application/ld+json" id="realestate-json">
        {
        "@context":"http://schema.org/",
        "@type":"House",
        "image":"<?php echo $imo_foto; ?>",
        "name":"<?php echo $imo_titulo; ?>",
        "description":"<?php echo $descricao; ?>",
        <?php if( !empty($imovel->dormitorios) ){ ?>"numberOfRooms":<?php echo $imovel->dormitorios; ?>,<?php } ?>
        <?php if( !empty($imovel->bairro) ){ ?>"address":"<?php echo $imovel->endereco; ?>, <?php echo $imovel->numero; ?>, <?php echo $imovel->bairro; ?>, <?php echo $imovel->cidade; ?> - <?php echo $imovel->uf; ?>",<?php } ?>
        "url":"<?php echo CurrentURL(); ?>"
        }
    </script>
    <?php } ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- Caminho -->
    <script language="javascript" type="text/javascript">
        var CAMINHO = '<?php echo base_url(); ?>';
    </script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- CSS Inline -->
    <style type="text/css">
        /* poppins-200 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 200;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-200.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-300 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 300;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-300.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-regular - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 400;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-regular.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-500 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 500;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-500.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-600 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-600.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-700 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-700.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-800 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 800;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-800.svg#Poppins') format('svg'); /* Legacy iOS */
        }
        /* poppins-900 - latin */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 900;
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.eot'); /* IE9 Compat Modes */
        src: url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.woff2') format('woff2'), /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.woff') format('woff'), /* Chrome 5+, Firefox 3.6+, IE 9+, Safari 5.1+, iOS 5+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.ttf') format('truetype'), /* Chrome 4+, Firefox 3.5+, IE 9+, Safari 3.1+, iOS 4.2+, Android Browser 2.2+ */
            url('<?php echo base_url(); ?>assets/site/css/fonts/poppins-v23-latin-900.svg#Poppins') format('svg'); /* Legacy iOS */
        }

		<?php include_once caminho_fisico()."assets/site/css/boots-modal.min.css"; ?>
		<?php include_once caminho_fisico()."assets/site/css/boots.min.css"; ?>
		<?php include_once caminho_fisico()."assets/site/css/critico.min.css"; ?>
		<?php include_once caminho_fisico()."assets/site/css/bootstrap-multiselect.min.css"; ?>
    </style>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- CSS -->
    <link rel="preload" href="<?php echo base_url(); ?>assets/site/css/estilo.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/estilo.min.css"></noscript>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- CSS Medias Screen Inline -->
    <style type="text/css">
		<?php include_once caminho_fisico()."assets/site/css/medias.min.css"; ?>
	</style>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <!-- JQUERY 3 -->
    <script src="<?php echo base_url(); ?>assets/site/js/jquery-3.4.1.min.js"></script>
    <!-- JS Inline -->
    <script language="javascript" type="text/javascript">
		<?php include_once caminho_fisico()."assets/site/js/bootstrap-multiselect.min.js"; ?>
		<?php include_once caminho_fisico()."assets/site/js/jquery.mask.min.js"; ?>
		<?php include_once caminho_fisico()."assets/site/js/validate.js"; ?>
		<?php include_once caminho_fisico()."assets/site/js/maskmoney.js"; ?>
		<?php include_once caminho_fisico()."assets/site/js/serializejson.js"; ?>
		<?php include_once caminho_fisico()."assets/site/js/script.min.js"; ?>
        <?php if( isset($resultados) && !empty($resultados) ){ ?>
		<?php include_once caminho_fisico()."assets/site/js/busca.min.js"; ?>
	    <?php } ?>
	</script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php if( !PageSpeed() ){ ?>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->

    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>
</head>
<body>
	<?php if( !PageSpeed() ){ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->

    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>
