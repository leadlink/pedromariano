$(document).ready(function () {
	/* ####################### */
	/* ####################### */
	$('a[href="#ms"]').on('click', function (e) {
		e.preventDefault();
	});
	/* ####################### */
	/* ####################### */
	setTimeout(Imagens, 2000);
	/* ####################### */
	/* ####################### */
	// Mascaras
	var FoneFunc = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
		FoneOpt = {
			onKeyPress: function (val, e, field, options) {
				field.mask(FoneFunc.apply({}, arguments), options);
			}
		};

	var CpfFunc = function (val) {
		return val.length > 14 ? '00.000.000/0099-99' : '000.000.000-0099999';
	},
		CpfOpt = {
			onKeyPress: function (val, e, field, options) {
				field.mask(CpfFunc.apply({}, arguments), options);
			}
		};

	$('.fone, input[name="telefone"]').mask(FoneFunc, FoneOpt);
	$('.data').mask('00/00/0000');
	$('.cpfcnpj').mask(CpfFunc, CpfOpt);
	$('.cpf').mask('000.000.000-00');
	$('.uf').mask('RR', {
		translation: {
			'R': {
				pattern: /[A-Z]/
			}
		}
	});

	if ($('.valor').length > 0) {
		$('.valor').maskMoney({
			affixesStay: true,
			prefix: 'R$ ',
			thousands: '.',
			decimal: '',
			precision: 0
		});
	}
	if ($('.area').length > 0) {
		$('.area').maskMoney({
			affixesStay: true,
			suffix: ' m²',
			thousands: '.',
			decimal: '',
			precision: 0
		});
	}
	if ($('.meses').length > 0) {
		$('.meses').maskMoney({
			affixesStay: true,
			suffix: ' meses',
			thousands: '',
			decimal: '',
			precision: 0
		});
	}
	/* ####################### */
	/* ####################### */
	// BAIRROS
	$(".cityselect").change(
		function () {
			var city = $('.cityselect option:selected').attr('lang');

			$('#bairro .checkbox input[type="checkbox"]').prop('checked', false);
			$('.citys').css('display', 'none');
			$('#' + city).css('display', 'flex');
			BuscaSelects();
		}
	);

	$(".todos").on('click',
		function () {
			var zona = $(this).attr('id');

			if (!$(this).is(':checked')) {
				$('input[type="checkbox"].' + zona).prop('checked', false);
			} else if ($(this).is(':checked')) {
				$('input[type="checkbox"].' + zona).prop('checked', true);
			}
		}
	);
	/* ####################### */
	/* ####################### */
	// Modal de Tipo e Bairro
	$('.checks-bairro input[type="checkbox"], .checks-tipo input[type="checkbox"]').change(function () {
		BuscaSelects();
	});
	/* ####################### */
	/* ####################### */
	// COPIAR CODIGO
	$('.copiar').on('click',
		function (e) {
			e.preventDefault();
			/* ####################### */
			/* ####################### */
			var codigo = $(this).attr('data-codigo');
			/* ####################### */
			/* ####################### */
			var tempTextarea = $('<textarea id="copycodigo">');
			$('body').append(tempTextarea);
			tempTextarea.val(codigo).select();
			document.execCommand('copy');
			tempTextarea.remove();
			/* ####################### */
			/* ####################### */
			$('a.copiar[data-codigo="' + codigo + '"]').css('background-color', '#d4edda');
			setTimeout(function () {
				$('a.copiar[data-codigo="' + codigo + '"]').css('background', 'none');
			}, 1500);
			/* ####################### */
			/* ####################### */
			return false;
			/* ####################### */
			/* ####################### */
		}
	);
	/* ####################### */
	/* ####################### */
	// VALIDAÇÃO PADRÃO PRO SITE
	if ($('.validacao').length > 0) {
		$('.validacao').each(function () {
			var form = $(this);
			form.validate({
				submitHandler: function () {
					Enviando(form.attr('id'));
					// Submit o Form
					form[0].submit();
				},
				rules:
				{
					nome: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					telefone: {
						required: true,
						telefone: true
					},
					documento: {
						required: true
					},
					data: {
						required: true
					},
					hora: {
						required: true
					},
					tipo: {
						required: true
					},
					modo: {
						required: true
					},
					finalidade: {
						required: true
					},
					assunto: {
						required: true
					},
					valor: {
						required: true
					},
					endereco: {
						required: true
					},
					bairro: {
						required: true
					},
					cidade: {
						required: true
					},
					mensagem: {
						required: true
					},
					'arquivos[]': {
						required: true,
						extension: 'jpg|jpeg|png|eps|svg|tiff|jpe|jfif|gif|webp|webm|mp4|avi|mov|mkv|wmv|flv|ogg|mpg|pdf',
						maxfiles: 20,
						maxsize: 2, // em MB
						maxsizetotal: 20 // em MB
					},
					'fotos[]': {
						required: true,
						extension: 'jpg|jpeg|png|tiff|jpe|jfif|gif|webp|pdf',
						maxfiles: 15,
						maxsize: 2, // em MB
						maxsizetotal: 20 // em MB
					},
					arquivo_cpf: {
						required: true,
						extension: 'jpg|jpeg|png|jpe|jfif|gif|webp|pdf|bmp',
						maxsize: 2 // em MB
					},
					arquivo_rg: {
						required: true,
						extension: 'jpg|jpeg|png|jpe|jfif|gif|webp|pdf|bmp',
						maxsize: 2 // em MB
					},
					arquivo_iptu: {
						required: true,
						extension: 'jpg|jpeg|png|jpe|jfif|gif|webp|pdf|bmp',
						maxsize: 2 // em MB
					},
					arquivo_matricula: {
						required: true,
						extension: 'jpg|jpeg|png|jpe|jfif|gif|webp|pdf|bmp',
						maxsize: 2 // em MB
					}
				},
				messages: {
					nome: {
						required: 'Preencha o Nome'
					},
					email: {
						required: 'Preencha o E-mail',
						email: 'E-mail inválido'
					},
					telefone: {
						required: 'Preencha o Telefone',
						telefone: 'Número de telefone não é válido'
					},
					documento: {
						required: 'Preencha o Documento'
					},
					data: {
						required: 'Preencha a Data'
					},
					hora: {
						required: 'Preencha a Hora'
					},
					tipo: {
						required: 'Selecione o Tipo'
					},
					modo: {
						required: 'Preencha a Finalidade'
					},
					finalidade: {
						required: 'Selecione a Finalidade'
					},
					assunto: {
						required: 'Preencha o Assunto'
					},
					valor: {
						required: 'Preencha o Valor'
					},
					endereco: {
						required: 'Preencha o Endereço'
					},
					bairro: {
						required: 'Preencha o Bairro'
					},
					cidade: {
						required: 'Preencha a Cidade'
					},
					mensagem: {
						required: 'Preencha a Mensagem'
					},
					'arquivos[]': {
						required: 'Por selecione o(s) arquivo(s) para Anexar',
						extension: 'Formato de arquivo não aceito'
					},
					'fotos[]': {
						required: 'Por selecione o(s) arquivo(s) para Anexar',
						extension: 'Apenas fotos são permitidas.',
						maxfiles: 'Máximo de 2 arquivos'
					},
					arquivo_cpf: {
						required: 'Por selecione o arquivo para Anexar',
						extension: 'Arquivo inválido. Apenas imagem ou PDF são permitidos.'
					},
					arquivo_rg: {
						required: 'Por selecione o arquivo para Anexar',
						extension: 'Arquivo inválido. Apenas imagem ou PDF são permitidos.'
					},
					arquivo_iptu: {
						required: 'Por selecione o arquivo para Anexar',
						extension: 'Arquivo inválido. Apenas imagem ou PDF são permitidos.'
					},
					arquivo_matricula: {
						required: 'Por selecione o arquivo para Anexar',
						extension: 'Arquivo inválido. Apenas imagem ou PDF são permitidos.'
					}
				}
			});
		});
	}
	/* ####################### */
	/* ####################### */
	$('.card-acordion h4').on('click', function () {
		const $this = $(this);
		const $texto = $this.next('.acordion-texto');

		if (!$this.hasClass('active')) {
			// Fecha todos
			$('.card-acordion h4').removeClass('active');
			$('.acordion-texto').removeClass('open');

			// Abre este
			$this.addClass('active');
			$texto.addClass('open');
		} else {
			// Fecha este
			$this.removeClass('active');
			$texto.removeClass('open');
		}
	});
	/* ####################### */
	/* ####################### */
	// Ler mais
	$('.ler-mais').on('click', function (e) {
		e.preventDefault();

		var $btn = $(this);
		var $spanMais = $btn.siblings('.mais-texto');
		var $etc = $btn.siblings('.etc');

		if ($spanMais.is(':visible')) {
			// Recolher
			$spanMais.css('display', 'none');
			if (!$etc.length) {
				$('<span class="etc">...</span>').insertBefore($btn);
			}
			$btn.text('Ler mais');
		} else {
			// Expandir
			$spanMais.css('display', 'inline');
			$etc.remove();
			$btn.text('Ler menos');
		}
	});
	/* ####################### */
	/* ####################### */
	// Quando o botão de abrir menu é clicado
	$('#abre-menu-mobile').on('click', function (e) {
		e.preventDefault(); // Previne o comportamento padrão do link
		$('#menu-mobile').animate({ right: '0' }, 300, function () {
			$('.filtro-back').addClass('active');
		});
		$('#menu-mobile').css('width', '100%');
		$('html').css('overflow', 'hidden');
	});
	/* ####################### */
	/* ####################### */
	// Quando o botão de fechar filtros é clicado
	$('.close, .filtro-back').on('click', function () {
		$('.filtro-back').removeClass('active');
		$('.menu-mobile').animate({ right: '-540px' }, 300);
		$('.menu-mobile').css('width', 'auto');
		$('html').css('overflow', 'auto');
	});
	/* ####################### */
	/* ####################### */
	// EXPANDIR BUSCA
	$('.filtros-mobile').on('click', function () {
		$('.form-busca').css({
			'height': 'auto',
			'margin-bottom': '0'
		});
		$(this).css({
			'display': 'none'
		});
	});
	/* ####################### */
	/* ####################### */
	// OWL Home
	if ($('.owl-home-single').length > 0) {
		$('.owl-home-single').owlCarousel({
			margin: 10,
			loop: true,
			dots: true,
			nav: false,
			items: 1,
			autoplay: true,
			autoplayTimeout: 8000,
			autoplayHoverPause: true,
			lazyLoad: true
		});
	}

	// OWL Busca
	if ($('.owl-busca-single').length > 0) {
		$('.owl-busca-single').owlCarousel({
			margin: 10,
			loop: true,
			autoplay: false,
			dots: false,
			nav: true,
			lazyLoad: true,
			items: 1,
			navText: ['<svg fill="#ffffff" width="18" height="18" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M23.505 0c0.271 0 0.549 0.107 0.757 0.316 0.417 0.417 0.417 1.098 0 1.515l-14.258 14.264 14.050 14.050c0.417 0.417 0.417 1.098 0 1.515s-1.098 0.417-1.515 0l-14.807-14.807c-0.417-0.417-0.417-1.098 0-1.515l15.015-15.022c0.208-0.208 0.486-0.316 0.757-0.316z"></path></svg>', '<svg fill="#ffffff" width="18" height="18" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z"></path></svg>']
		});
	}
	/* ####################### */
	/* ####################### */
	// TABS DA HOME
	$(".nav-cards a").on('click', function (e) {
		var tabId = $(this).attr('href');
		if (tabId.startsWith("#")) {
			e.preventDefault();
			$('.nav-cards a, .tab-navs').removeClass('ativo')
			$(this).addClass('ativo');
			$('.tab-navs' + tabId).addClass('ativo');
		}
	});
	/* ####################### */
	/* ####################### */
	// ANCORA DESLIZANTE
	$('.deslize').on('click', function () {
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top - 60
		}, 800, 'swing');
		return false;
	});
	$('#modo').multiselect({
		nonSelectedText: 'Alugar ou comprar?',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><svg width="4" height="15" viewBox="0 0 4 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="18" rx="2" fill="#1d4db0"/></svg><span class="s"><small class="multiselect-text se"></small></span></button>'
		}
	});
	$('#cidade').multiselect({
		nonSelectedText: 'Cidade',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><span class="s multiselect-text">Cidade</span></button>'
		}
	});
	$('#valor_de').multiselect({
		nonSelectedText: 'Valor de',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><svg viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.41667 0.894737C6.41667 0.400592 6.00627 0 5.5 0C4.99373 0 4.58333 0.400592 4.58333 0.894737V1.39507C3.51079 1.52053 2.52391 1.86561 1.73813 2.39539C0.729227 3.07561 0 4.10708 0 5.36842C0 6.50831 0.450697 7.56688 1.44632 8.31443C2.23151 8.90397 3.28867 9.25024 4.58333 9.35805V13.7985C3.86476 13.6862 3.24542 13.446 2.78008 13.1322C2.13013 12.694 1.83333 12.1597 1.83333 11.6316C1.83333 11.1374 1.42292 10.7368 0.916667 10.7368C0.41041 10.7368 0 11.1374 0 11.6316C0 12.8929 0.729227 13.9244 1.73813 14.6046C2.52391 15.1344 3.51079 15.4795 4.58333 15.6049V16.1053C4.58333 16.5994 4.99373 17 5.5 17C6.00627 17 6.41667 16.5994 6.41667 16.1053V15.6073C7.48202 15.488 8.4678 15.1591 9.25595 14.6366C10.2779 13.9591 11 12.9232 11 11.6316C11 10.4625 10.5549 9.39671 9.54782 8.65318C8.76058 8.07196 7.70357 7.74252 6.41667 7.64016V3.20148C7.13524 3.3138 7.75463 3.55402 8.21993 3.86776C8.86985 4.30597 9.16667 4.84028 9.16667 5.36842C9.16667 5.86257 9.57706 6.26316 10.0833 6.26316C10.5896 6.26316 11 5.86257 11 5.36842C11 4.10708 10.2708 3.07561 9.26191 2.3954C8.47614 1.8656 7.48926 1.52052 6.41667 1.39507V0.894737ZM4.58333 3.20149C3.86476 3.31381 3.24542 3.55403 2.78008 3.86777C2.13013 4.30597 1.83333 4.84028 1.83333 5.36842C1.83333 6.01801 2.07015 6.52519 2.56412 6.89609C2.97272 7.2029 3.61801 7.46067 4.58333 7.56071V3.20149ZM6.41667 9.43679V13.8025C7.14184 13.6952 7.76252 13.4635 8.22589 13.1562C8.86279 12.734 9.16667 12.204 9.16667 11.6316C9.16667 10.9365 8.9243 10.4366 8.44186 10.0804C8.03532 9.78028 7.3898 9.53226 6.41667 9.43679Z" fill="black"/></svg><span class="s"><small class="multiselect-text se"></small></span></button>'
		}
	});
	$('#valor_ate').multiselect({
		nonSelectedText: 'Valor até',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><svg viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.41667 0.894737C6.41667 0.400592 6.00627 0 5.5 0C4.99373 0 4.58333 0.400592 4.58333 0.894737V1.39507C3.51079 1.52053 2.52391 1.86561 1.73813 2.39539C0.729227 3.07561 0 4.10708 0 5.36842C0 6.50831 0.450697 7.56688 1.44632 8.31443C2.23151 8.90397 3.28867 9.25024 4.58333 9.35805V13.7985C3.86476 13.6862 3.24542 13.446 2.78008 13.1322C2.13013 12.694 1.83333 12.1597 1.83333 11.6316C1.83333 11.1374 1.42292 10.7368 0.916667 10.7368C0.41041 10.7368 0 11.1374 0 11.6316C0 12.8929 0.729227 13.9244 1.73813 14.6046C2.52391 15.1344 3.51079 15.4795 4.58333 15.6049V16.1053C4.58333 16.5994 4.99373 17 5.5 17C6.00627 17 6.41667 16.5994 6.41667 16.1053V15.6073C7.48202 15.488 8.4678 15.1591 9.25595 14.6366C10.2779 13.9591 11 12.9232 11 11.6316C11 10.4625 10.5549 9.39671 9.54782 8.65318C8.76058 8.07196 7.70357 7.74252 6.41667 7.64016V3.20148C7.13524 3.3138 7.75463 3.55402 8.21993 3.86776C8.86985 4.30597 9.16667 4.84028 9.16667 5.36842C9.16667 5.86257 9.57706 6.26316 10.0833 6.26316C10.5896 6.26316 11 5.86257 11 5.36842C11 4.10708 10.2708 3.07561 9.26191 2.3954C8.47614 1.8656 7.48926 1.52052 6.41667 1.39507V0.894737ZM4.58333 3.20149C3.86476 3.31381 3.24542 3.55403 2.78008 3.86777C2.13013 4.30597 1.83333 4.84028 1.83333 5.36842C1.83333 6.01801 2.07015 6.52519 2.56412 6.89609C2.97272 7.2029 3.61801 7.46067 4.58333 7.56071V3.20149ZM6.41667 9.43679V13.8025C7.14184 13.6952 7.76252 13.4635 8.22589 13.1562C8.86279 12.734 9.16667 12.204 9.16667 11.6316C9.16667 10.9365 8.9243 10.4366 8.44186 10.0804C8.03532 9.78028 7.3898 9.53226 6.41667 9.43679Z" fill="black"/></svg><span class="s"><small class="multiselect-text se"></small></span></button>'
		}
	});
	$('#infra').multiselect({
		nonSelectedText: 'Infraestrutura',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><svg width="4" height="15" viewBox="0 0 4 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="18" rx="2" fill="#1d4db0"/></svg><span class="s"><small class="multiselect-text se"></small></span></button>'
		}
	});
	$('#area').multiselect({
		nonSelectedText: 'Área mínima',
		templates: {
			button: '<button type="button" class="btn" data-bs-toggle="dropdown"><span class="multiselect"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.93 19.99"><g id="Camada_2" data-name="Camada 2"><g id="Layer_1" data-name="Layer 1"><path class="cls-1" d="M10,2.8c2.14,0,4.28,0,6.41,0,.64,0,.81.22.81.82q0,6.33,0,12.66c0,.68-.15,1-.91,1q-6.26-.06-12.51,0c-.73,0-1-.17-1-.95,0-4.2,0-8.39,0-12.59,0-.68.19-.9.88-.89C5.74,2.83,7.85,2.8,10,2.8ZM3.54,16.36H16.35V3.62H3.54Z"/><path class="cls-1" d="M19,3.56c-.16,0-.34.06-.46,0A3,3,0,0,1,18,3.12a1.93,1.93,0,0,1,.53-.31,2,2,0,0,1,.77,0,2.68,2.68,0,0,1,.6.32,6.14,6.14,0,0,1-.61.43c-.07,0-.2,0-.3,0Z"/><path class="cls-1" d="M18.94,17.19a1.33,1.33,0,0,1-.53,0,.71.71,0,0,1-.36-.4c0-.08.21-.3.34-.32a3.42,3.42,0,0,1,1,0c.19,0,.35.21.53.32a3,3,0,0,1-.52.43,1.22,1.22,0,0,1-.47,0Z"/><path class="cls-1" d="M16.3,19c.14-.32.3-.9.44-.9.61,0,.38.58.43,1a.65.65,0,0,1,0,.31c-.11.22-.25.44-.38.65-.12-.21-.25-.43-.36-.65s0-.21,0-.31Z"/><path class="cls-1" d="M1,3.56a1.17,1.17,0,0,1-.46,0A3,3,0,0,1,0,3.13a1.78,1.78,0,0,1,.52-.32,2,2,0,0,1,.77,0,2.55,2.55,0,0,1,.61.32c-.21.14-.4.3-.62.43s-.2,0-.3,0Z"/><path class="cls-1" d="M1,16.44a1.62,1.62,0,0,1,.54,0c.14.05.36.25.34.32a.59.59,0,0,1-.35.4,2.43,2.43,0,0,1-.93,0A2.09,2.09,0,0,1,0,16.84a5,5,0,0,1,.61-.41,1,1,0,0,1,.38,0Z"/><path class="cls-1" d="M3.64,19.06,3.16,20c-.14-.35-.28-.69-.4-1a.41.41,0,0,1,0-.31c.1-.21.24-.4.36-.6a5,5,0,0,1,.37.57,1,1,0,0,1,0,.39Z"/><path class="cls-1" d="M3.5,1a1.61,1.61,0,0,1,0,.54c-.06.16-.24.26-.36.39-.12-.11-.31-.21-.33-.34a3.06,3.06,0,0,1,0-1c0-.21.25-.38.38-.56A5,5,0,0,1,3.5.59a1,1,0,0,1,0,.38Z"/><path class="cls-1" d="M16.42,1a1.94,1.94,0,0,1,0-.54A1.74,1.74,0,0,1,16.77,0c.13.16.34.3.38.47a2.64,2.64,0,0,1,0,.93c0,.18-.23.33-.34.5a4,4,0,0,1-.38-.54,1,1,0,0,1,0-.38Z"/></g></g></svg><span class="s"><small class="multiselect-text se"></small></span></button>'
		}
	});
	/* ####################### */
	/* ####################### */
	// Busca no modal bairro
	$(function () {
		$("#search").keyup(function () {
			var texto = $(this).val();

			$(".checks-bairro .checkbox").css("display", "flex");
			$(".checks-bairro .checkbox").each(function () {
				var campo = $(this).children('input[type="checkbox"]').val();
				if ($(this).text().toUpperCase().indexOf(texto.toUpperCase()) < 0 && campo.toUpperCase().indexOf(texto.toUpperCase()) < 0) {
					$(this).css("display", "none");
				}
			});
		});
	});
	/* ####################### */
	/* ####################### */
	// FAVORITOS
	$(".fav").on('click',
		function (e) {
			/* ####################### */
			/* ####################### */
			e.preventDefault();
			var id = $(this).attr('id');
			var codigo = $(this).attr('data-codigo');
			/* ####################### */
			/* ####################### */
			$.ajax({
				headers: { 'X-Requested-With': 'XMLHttpRequest' },
				url: CAMINHO + "envio/favoritos/",
				type: "POST",
				async: false,
				data: 'codigo=' + id,
				success: function (resposta) {
					var retorno = resposta.split('-');
					if (retorno[0] == '1') {
						$('.imo_' + id).addClass('ok');
						$('.imo_' + id).attr('title', 'Remover Cod.: ' + codigo + ' dos Favoritos');
						/* ####################### */
						if (retorno[1] > 0) {
							$('.link-favoritos').removeClass('leadlink');
							$('.bt-fav.link-favoritos small').html(retorno[1]);
						} else {
							$('.link-favoritos').addClass('leadlink');
							$('.bt-fav.link-favoritos small').html(retorno[1]);
						}
						/* ####################### */
					} else if (retorno[0] == '2') {
						$('.imo_' + id).removeClass('ok');
						$('.imo_' + id).attr('title', 'Adicionar Cod.: ' + codigo + ' aos Favoritos');
						var rem = '#favorito_' + id;
						/* ####################### */
						// REMOVE DA PAGINA DOS FAVORITOS
						if ($(rem).length > 0) {
							$(rem).fadeOut(800, "swing");
						}
						/* ####################### */
						if (retorno[1] > 0) {
							$('.link-favoritos').removeClass('leadlink');
							$('.bt-fav.link-favoritos small').html(retorno[1]);
						} else {
							$('.link-favoritos').addClass('leadlink');
							$('.bt-fav.link-favoritos small').html(retorno[1]);
						}
						/* ####################### */
					} else {
						alert('Ocorreu um erro, tente novamente!');
					}
				}
			});
			/* ####################### */
			/* ####################### */
		}
	);
	/* ####################### */
	/* ####################### */
	// FAVORITOS DENTRO DO IMÓVEL
	$(".ifav").on('click',
		function (e) {
			/* ####################### */
			/* ####################### */
			e.preventDefault();
			var id = $(this).attr('id');
			var codigo = $(this).attr('data-codigo');
			/* ####################### */
			/* ####################### */
			$.ajax({
				headers: { 'X-Requested-With': 'XMLHttpRequest' },
				url: CAMINHO + "envio/favoritos/",
				type: "POST",
				async: false,
				data: 'codigo=' + id,
				success: function (resposta) {
					var retorno = resposta.split('-');
					if (retorno[0] == '1') {
						$('#' + id).addClass('ok');
						$('#' + id).attr('title', 'Remover Cod.: ' + codigo + ' dos Favoritos');
						$('#' + id + ' span').html('REMOVER');
						/* ####################### */
						if (retorno[1] > 0) {
							$('#topo-favoritos').removeClass('leadlink');
							$('#topo-favoritos small').html(retorno[1]);
						} else {
							$('#topo-favoritos').addClass('leadlink');
							$('#topo-favoritos small').html(retorno[1]);
						}
						/* ####################### */
					} else if (retorno[0] == '2') {
						$('#' + id).removeClass('ok');
						$('#' + id).attr('title', 'Adicionar Cod.: ' + codigo + ' aos Favoritos');
						$('#' + id + ' span').html('FAVORITAR');
						var rem = '#favorito_' + id;
						/* ####################### */
						// REMOVE DA PAGINA DOS FAVORITOS
						if ($(rem).length > 0) {
							$(rem).fadeOut(800, "swing");
						}
						/* ####################### */
						if (retorno[1] > 0) {
							$('#topo-favoritos').removeClass('leadlink');
							$('#topo-favoritos small').html(retorno[1]);
						} else {
							$('#topo-favoritos').addClass('leadlink');
							$('#topo-favoritos small').html(retorno[1]);
						}
						/* ####################### */
					} else {
						alert('Ocorreu um erro, tente novamente!');
					}
				}
			});
			/* ####################### */
			/* ####################### */
		}
	);
	/* ####################### */
	/* ####################### */
});
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function Enviando(form) {
	$('#target').val('#' + form);
	$('#' + form + ' input[type="submit"], #' + form + ' button[type="submit"]').attr('disabled', 'disabled').css('opacity', '0.90');
	setInterval(EnviandoMsg, 350);
}
function EnviandoMsg() {
	var seg = $('#timeout').val();
	var trg = $('#target').val();

	if (seg == '1') {
		msg = 'AGUARDE';
		$('#timeout').val('2');
	} else if (seg == '2') {
		msg = '.ENVIANDO.';
		$('#timeout').val('3');
	} else if (seg == '3') {
		msg = '..ENVIANDO..';
		$('#timeout').val('4');
	} else if (seg == '4') {
		msg = '...ENVIANDO...';
		$('#timeout').val('5');
	} else if (seg == '5') {
		msg = 'AGUARDE';
		$('#timeout').val('6');
	} else if (seg == '6') {
		msg = 'AGUARDE';
		$('#timeout').val('1');
	}

	$(trg + ' input[type="submit"], ' + trg + ' button[type="submit"]').val(msg);
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function BuscaSelects() {
	var countTipos = $('.checks-tipo input[type="checkbox"]').filter('input[name="categorias[]"]:checked').length;
	var countBairro = $('.checks-bairro input[type="checkbox"]').filter('input[name="bairros[]"]:checked').length;

	if ($('#busca').hasClass('busca-ajax')) {
		if (countTipos == 0) {
			$('#count-tipos').text('Tipos');
		} else if (countTipos == 1) {
			$('#count-tipos').text('Tipos (' + countTipos + ')');
		} else {
			$('#count-tipos').text('Tipos (' + countTipos + ')');
		}
		if (countBairro == 0) {
			$('#count-bairros').text('Selecione');
		} else if (countBairro == 1) {
			$('#count-bairros').text(+ countBairro + ' Bairro Selecionado');
		} else {
			$('#count-bairros').text(+ countBairro + ' Bairros Selecionados');
		}
	} else {
		if (countTipos == 0) {
			$('#count-tipos').text('Tipos');
		} else if (countTipos == 1) {
			$('#count-tipos').text('Tipos (' + countTipos + ')');
		} else {
			$('#count-tipos').text('Tipos (' + countTipos + ')');
		}
		if (countBairro == 0) {
			$('#count-bairros').text('Localização');
		} else if (countBairro == 1) {
			$('#count-bairros').text('Localização (' + countBairro + ')');
		} else {
			$('#count-bairros').text('Localização (' + countBairro + ')');
		}
	}
}
setTimeout(BuscaSelects, 1000);
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function Valores() {
	/* ################################### */
	/* ################################### */
	$('form[name="form_busca"] input[name="modo"]').change(function () {
		var modo = $('form[name="form_busca"] input[name="modo"]:checked').val();

		$('.valor-sel').each(function () {
			var select = $(this);

			if (!select.data('original-options')) {
				select.data('original-options', select.find('option').clone());
			}

			select.empty();

			var originalOptions = select.data('original-options');

			originalOptions.each(function () {
				var option = $(this);
				var isLocacao = option.hasClass('val_locacao');
				var isVenda = option.hasClass('val_venda');
				var isDefault = !isLocacao && !isVenda;

				if (
					isDefault ||
					(modo === 'alugar' && isLocacao) ||
					(modo === 'comprar' && isVenda)
				) {
					select.append(option.clone());
				}
			});
		});
	});

	var modo = $('form[name="form_busca"] input[name="modo"]:checked').val();

	$('.valor-sel').each(function () {
		var select = $(this);
		if (!select.data('original-options')) {
			select.data('original-options', select.find('option').clone());
		}
		select.empty();

		var originalOptions = select.data('original-options');

		originalOptions.each(function () {
			var option = $(this);
			var isLocacao = option.hasClass('val_locacao');
			var isVenda = option.hasClass('val_venda');
			var isDefault = !isLocacao && !isVenda;

			if (
				isDefault ||
				(modo === 'alugar' && isLocacao) ||
				(modo === 'comprar' && isVenda)
			) {
				select.append(option.clone());
			}
		});
	});
	/* ################################### */
	/* ################################### */
}
setTimeout(Valores, 2000);
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function LimpaTipos() {
	$('input[name="categorias[]"]').prop('checked', false);
	BuscaSelects();
	buscar();
	$('#tipos').modal('hide');
}
function LimpaBairros() {
	$('input[name="bairros[]"]').prop('checked', false);
	BuscaSelects();
	buscar();
	$('#bairros').modal('hide');
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function Imagens() {
	$('img').each(function () {
		if (this.src.length > 0 && !$(this).hasClass('lazy') && !$(this).hasClass('oks')) {
			var w = $(this).width();
			var h = $(this).height();
			$(this).attr('height', Math.ceil(h));
			$(this).attr('width', Math.ceil(w));
		}
	});
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function CopiarCode() {
	$('.imolink .info').each(function () {
		var altura = $(this).position().top;
		$('.imovel .copiar').css('top', (altura + 12) + 'px');
	});
}
setTimeout(CopiarCode, 600);
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */