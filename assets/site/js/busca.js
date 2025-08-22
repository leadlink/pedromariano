$(document).ready(function () {
    /* ####################### */
    /* ####################### */
    // BUSCA DO SITE
    $('.busca-ajax input[name="modo"], .busca-ajax input[name="categorias[]"], .busca-ajax input[name="quartos"], .busca-ajax input[name="vagas"], .busca-ajax input[name="suites"], .busca-ajax select[name="area"], .busca-ajax select[name="valor_de"], .busca-ajax select[name="valor_ate"], .busca-ajax input[name="codigo"], .busca-ajax input[name="caracteristicas[]"], .busca-ajax input[name="mobiliados"], .busca-ajax input[name="lancamentos"]').change(function () {
        /* ####################### */
        var altura = $('#resultados').outerHeight();
        $('#resultados > *').animate({ opacity: 0 }, 200, 'swing');
        $('#resultados').css('height', altura + 'px').html('');
        $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
        setTimeout(busca_ajax, 200);
        /* ####################### */
    });
    /* ####################### */
    /* ####################### */
    // ORDENACAO
    $('#order').change(
        function () {
            var ord = $(this).val();
            var myord = ord.split('/');
            $('#myorder').attr('name', myord[0]).attr('value', myord[1]);
            var altura = $('#resultados').outerHeight();
            $('#resultados > *').animate({ opacity: 0 }, 200, 'swing');
            $('#resultados').css('height', altura + 'px').html('');
            $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
            setTimeout(ordenacao(ord), 200);
        }
    );
    /* ####################### */
    /* ####################### */
    // COLLAPSE DA BUSCA
    $('.collapse-title').on('click', function () {
        const $title = $(this);
        const contentId = 'co-' + $title.attr('id');
        const $content = $('#' + contentId);
        if (!$content.length) return;

        const isOpen = $content.hasClass('show');

        if (isOpen) {
            $content.removeClass('show').css('max-height', '');
            $title.removeClass('active');
        } else {
            $content.addClass('show').css('max-height', $content.prop('scrollHeight') + 'px');
            $title.addClass('active');
        }
    });
    /* ####################### */
    /* ####################### */
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
    $("a.paginas").on('click',
        function (e) {
            /* ####################### */
            /* ####################### */
            e.preventDefault();
            /* ####################### */
            /* ####################### */
            var pagina = $(this).attr('data-page');
            /* ####################### */
            /* ####################### */
            if (pagina != 'atual' || !$(this).hasClass('ativo')) {
                page(pagina);
            }
            /* ####################### */
            /* ####################### */
            return false;
            /* ####################### */
            /* ####################### */
        }
    );
    /* ####################### */
    /* ####################### */
    $("#limpa-busca").on('click',
        function (e) {
            /* ####################### */
            /* ####################### */
            e.preventDefault();
            /* ####################### */
            /* ####################### */
            $('#busca input[name="categorias[]"]').prop('checked', false);
            /* ####################### */
            $('#busca input[name="bairros[]"]').prop('checked', false);
            BuscaSelects();
            /* ####################### */
            $('#busca select[name="valor_de"] option, #busca select[name="valor_ate"] option').removeAttr('selected').prop('selected', false);
            $('#busca select[name="valor_de"] option.vazio, #busca select[name="valor_ate"] option.vazio').prop('selected', true);
            /* ####################### */
            $('#busca select[name="area"] option').removeAttr('selected').prop('selected', false);
            $('#busca select[name="area"] option.vazio').prop('selected', true);
            /* ####################### */
            $('#busca input[name="quartos"]').prop('checked', false);
            $('#busca input[name="vagas"]').prop('checked', false);
            $('#busca input[name="banheiros"]').prop('checked', false);
            /* ####################### */
            $('#busca input[name="caracteristicas[]"]').prop('checked', false);
            /* ####################### */
            /*$('#busca input[name="lancamentos"]').prop('checked', false);*/
            $('#busca input[name="mobiliados"]').prop('checked', false);
            /* ####################### */
            $('#busca input[name="codigo"]').val('');
            /* ####################### */
            $('#busca input[name="condominio"]').val('');
            $('#busca input[name="destaques"]').val('');
            $('#busca input[name="exclusivos"]').val('');
            $('#busca input[name="codigos"]').val('');
            /* ####################### */
            buscar();
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
// ELEMENTO DO AJAX DA BUSCA
var PRELOAD = '<div id="carregando"><div class="loading">Carregando Imóveis</div><div class="loader"></div></div>';
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function buscar() {
    if ($('#busca').hasClass('busca-ajax')) {
        var altura = $('#resultados').outerHeight();
        $('#resultados > *').animate({ opacity: 0 }, 200, 'swing');
        $('#resultados').css('height', altura + 'px').html('');
        $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
        setTimeout(busca_ajax, 200);
    }
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function busca_ajax() {
    /* ####################### */
    var url = window.location.href;
    var urlparts = url.split('busca/');
    var campos = $('#busca').serializeJSON();
    var newurl = [];
    var modo;
    /* ####################### */
    for (var key in campos) {
        if (key == 'modo') {
            modo = campos[key];
        } else if (key == 'categorias') {
            newurl.push('categorias/' + campos[key].join('_'));
        } else if (key == 'bairros') {
            newurl.push('bairros/' + campos[key].join('_'));
        } else if (key == 'caracteristicas') {
            newurl.push('caracteristicas/' + campos[key].join('_'));
        } else {
            if (campos[key] != '' && campos[key] != '0') {
                newurl.push(key + '/' + campos[key]);
            }
        }
    }
    /* ####################### */
    $.ajax({
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        url: CAMINHO + 'busca/ajax/' + modo + '/' + newurl.join('/') + '/1/',
        type: "POST",
        async: true,
        beforeSend: function () {
            /* ####################### */
            $('#resultados').prepend(PRELOAD);
            /* ####################### */
        },
        success: function (retorno) {
            /* ####################### */
            history.pushState(null, null, CAMINHO + 'busca/' + modo + '/' + newurl.join('/') + '/1/');
            $('#resultados').attr('style', null);
            $('#resultados').html(retorno);
            $('#loading').remove();
            /* ####################### */
        }
    });
    /* ####################### */
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function page(page) {
    var altura = $('#resultados').outerHeight();
    $('#resultados > *').animate({ opacity: 0 }, 200, 'swing');
    $('#resultados').css('height', altura + 'px').html('');
    $('html, body').animate({ scrollTop: 0 }, 600, 'swing');
    setTimeout(paginate(page), 200);
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function paginate(page) {
    /* ####################### */
    var url = window.location.href;
    var urlparts = url.split('busca/');
    var campos = $('#busca').serializeJSON();
    var newurl = [];
    var modo;
    /* ####################### */
    for (var key in campos) {
        if (key == 'modo') {
            modo = campos[key];
        } else if (key == 'categorias') {
            newurl.push('categorias/' + campos[key].join('_'));
        } else if (key == 'bairros') {
            newurl.push('bairros/' + campos[key].join('_'));
        } else if (key == 'caracteristicas') {
            newurl.push('caracteristicas/' + campos[key].join('_'));
        } else {
            if (campos[key] != '' && campos[key] != '0') {
                newurl.push(key + '/' + campos[key]);
            }
        }
    }
    /* ####################### */
    $.ajax({
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        url: CAMINHO + 'busca/ajax/' + modo + '/' + newurl.join('/') + '/' + page + '/',
        type: "POST",
        async: true,
        beforeSend: function () {
            /* ####################### */
            $('#resultados').prepend(PRELOAD);
            /* ####################### */
        },
        success: function (retorno) {
            /* ####################### */
            history.pushState(null, null, CAMINHO + 'busca/' + modo + '/' + newurl.join('/') + '/' + page + '/');
            $('#resultados').attr('style', null);
            $('#resultados').html(retorno);
            $('#loading').remove();
            /* ####################### */
        }
    });
    /* ####################### */
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function ordenacao(ordem) {
    /* ####################### */
    var url = window.location.href;
    var urlparts = url.split('busca/');
    var campos = $('#busca').serializeJSON();
    var newurl = [];
    var modo;
    /* ####################### */
    for (var key in campos) {
        if (key == 'modo') {
            modo = campos[key];
        } else if (key == 'categorias') {
            newurl.push('categorias/' + campos[key].join('_'));
        } else if (key == 'bairros') {
            newurl.push('bairros/' + campos[key].join('_'));
        } else if (key == 'caracteristicas') {
            newurl.push('caracteristicas/' + campos[key].join('_'));
        } else {
            if (campos[key] != '' && campos[key] != '0') {
                newurl.push(key + '/' + campos[key]);
            }
        }
    }
    /* ####################### */
    $.ajax({
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        url: CAMINHO + 'busca/ajax/' + modo + '/' + newurl.join('/') + '/1/',
        type: "POST",
        async: true,
        beforeSend: function () {
            /* ####################### */
            $('#resultados').prepend(PRELOAD);
            /* ####################### */
        },
        success: function (retorno) {
            /* ####################### */
            history.pushState(null, null, CAMINHO + 'busca/' + modo + '/' + newurl.join('/') + '/1/');
            $('#resultados').attr('style', null);
            $('#resultados').html(retorno);
            $('#loading').remove();
            /* ####################### */
        }
    });
    /* ####################### */
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
function LimparBusca() {
    /* ####################### */
    $('#busca input[name="categorias[]"]').prop('checked', false);
    /* ####################### */
    $('#busca input[name="bairros[]"]').prop('checked', false);
    BuscaSelects();
    /* ####################### */
    $('#busca select[name="valor_de"] option, #busca select[name="valor_ate"] option').removeAttr('selected').prop('selected', false);
    $('#busca select[name="valor_de"] option.vazio, #busca select[name="valor_ate"] option.vazio').prop('selected', true);
    /* ####################### */
    $('#busca select[name="area"] option').removeAttr('selected').prop('selected', false);
    $('#busca select[name="area"] option.vazio').prop('selected', true);
    /* ####################### */
    $('#busca input[name="quartos"]').prop('checked', false);
    $('#busca input[name="vagas"]').prop('checked', false);
    $('#busca input[name="banheiros"]').prop('checked', false);
    /* ####################### */
    $('#busca input[name="caracteristicas[]"]').prop('checked', false);
    /* ####################### */
    $('#busca input[name="lancamentos"]').prop('checked', false);
    /* ####################### */
    $('#busca input[name="codigo"]').val('');
    /* ####################### */

    /* ####################### */
}
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */
/* ############################################################### */