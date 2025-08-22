<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

##################################################################################
##################################################################################
## HOME
$routes->get('/', 'Home::index');
$routes->get('(facebook|google|instagram|insta|youtube|linkedin|meta|googleinst)', 'Home::index/$1');
##################################################################################
##################################################################################
## PAGINAS DO SITE
$routes->get('anuncie-seu-imovel', 'Anuncie::index');
$routes->get('avaliar-imovel-gratis', 'Avaliar::index');
$routes->get('condominios', 'Condominios::index');
$routes->get('fale-conosco', 'Contato::index');
$routes->get('depoimentos', 'Depoimentos::index');
$routes->get('empresa', 'Empresa::index');
$routes->get('favoritos', 'Favoritos::index');
$routes->get('lancamentos', 'Lancamentos::index');
$routes->get('perguntas-frequentes', 'Perguntas::index');
$routes->get('politica-de-privacidade', 'Privacidade::index');
$routes->get('trabalhe-conosco', 'Trabalhe::index');
## REDIRECTS
$routes->get('avalie-seu-corretor', 'Redirect::avalie');
$routes->get('cadastre-seu-imovel', 'Redirect::cadastre');
$routes->get('encomende-seu-imovel', 'Redirect::encomende');
$routes->get('financiamento-e-bancos', 'Redirect::financiamento');
$routes->get('minha-casa-minha-vida', 'Redirect::minhacasa');
$routes->get('quem-somos', 'Redirect::empresa');
$routes->get('imoveis/para-alugar/(:any)', 'Redirect::locacao');
$routes->get('imoveis/para-alugar', 'Redirect::locacao');
$routes->get('imoveis/a-venda/(:any)', 'Redirect::venda');
$routes->get('imoveis/a-venda', 'Redirect::venda');
##################################################################################
##################################################################################
## FOTOS
$routes->get('fotos/(:any)/(:any)', 'Fotos::index/$1/$2');
##################################################################################
##################################################################################
## AÇAO DE E-MAILS
$routes->post('envio/(:any)', 'Acao::$1');
##################################################################################
##################################################################################
## IMOVEIS
$routes->get('imovel/(:any)/(:any)/(:any)/(:any)', 'Imovel::index/$2/$3/$4');
$routes->get('imovel/(:any)/(:any)/(:any)', 'Imovel::index/$2/$3');
$routes->get('imovel/(:any)/(:any)', 'Imovel::index/$2');
##################################################################################
##################################################################################
## BUSCA DO SITE
$routes->match(['GET', 'POST'], 'busca/ajax/(.+)', 'Busca::ajax/$1');
$routes->match(['GET', 'POST'], 'busca/(.+)', 'Busca::index/$1');
$routes->match(['GET', 'POST'], 'busca', 'Busca::index');
##################################################################################
##################################################################################
## ADMIN
$routes->get('admin', 'admin\Home::index');
$routes->get('admin/importacao/(:any)', 'admin\Importacao::$1');
$routes->get('admin/importacao', 'admin\Importacao::index');
$routes->get('admin/fotos', 'admin\Fotos::index');

$routes->get('admin/site/excluir_(:any)', 'admin\Site::excluir_$1');
$routes->get('admin/site/detalhe/(:any)/(:num)', 'admin\Site::detalhe/$1/$2');
$routes->get('admin/site/(:any)/(:num)', 'admin\Site::index/$1/$2');
$routes->get('admin/site/(:any)', 'admin\Site::index/$1');
##################################################################################
##################################################################################
## SITEMAP
$routes->get('sitemaps/padrao/sitemap.xml', 'Sitemap::padrao');
$routes->get('sitemaps/(.+)/sitemap.xml', 'Sitemap::busca/$1');
$routes->get('sitemap.xml', 'Sitemap::index');
##################################################################################
##################################################################################
## ANUNCIOS XML FEED
$routes->get('ads.csv', 'Xml::ads');
$routes->get('google.xml', 'Xml::google');
$routes->get('facebook.xml', 'Xml::facebook');
##################################################################################
##################################################################################