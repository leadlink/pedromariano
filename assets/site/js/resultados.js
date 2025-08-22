/* ####################### */
/* ####################### */
// OWL Busca
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
$('img').each(function () {
    if (this.src.length > 0 && !$(this).hasClass('lazy') && !$(this).hasClass('oks')) {
        var w = $(this).width();
        var h = $(this).height();
        $(this).attr('height', Math.ceil(h));
        $(this).attr('width', Math.ceil(w));
    }
});
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