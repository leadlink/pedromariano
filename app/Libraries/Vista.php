<?php
#############################################
#############################################
namespace App\Libraries;
#############################################
#############################################
## Classe para consulta a API do Vista
#############################################
#############################################
## PHP 8.2
## CodeIgniter 4.6.2
#############################################
#############################################
## Version: 1.4.3
## License: Exclusive Use
#############################################
#############################################
## Author: Rodrigo Luis
## Instagram: https://www.instagram.com/rodrigoluis/
## LinkedIn: https://www.linkedin.com/in/rodrigoluis/
## Facebook: https://www.facebook.com/rodrigoluis.web/
## Skype: rodrigoluis.web
## WhatsApp: +5551981212205
#############################################
#############################################
#############################################
#############################################
#############################################
#############################################
class Vista{

	public $vista_usr = 'nnimov';
	public $vista_key = 'ef66397d2412618c4a7d5259f6f965de';

	public function __construct(array $params = []){
        if( !empty($params) ){
            foreach( $params as $key => $val ){
                if( property_exists($this, $key) ){
                    $this->$key = $val;
                }
            }
        }
    }

	function ReloadCache(){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/reloadcache?key='.$this->vista_key;

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		$resultado = arrayToObject($result);

		return true;
		#############################################
		#############################################
	}

	function Lead($post = NULL){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/lead?key='.$this->vista_key;
		$url.= '&cadastro={"lead":{';
		$url.= '"veiculocaptacao":"Site",';
		$url.= '"interesse":"'.$post['modo'].'",';
		if( !empty($post['imovel']) ){ $url.= '"anuncio":"'.$post['codigo'].'",'; }
		if( !empty($post['mensagem']) ){ $url.= '"mensagem":"'.urlencode($post['mensagem']).'",'; }
		if( !empty($post['telefone']) ){ $url.= '"fone":"'.urlencode($post['telefone']).'",'; }
		if( !empty($post['nome']) ){ $url.= '"nome":"'.urlencode($post['nome']).'",'; }
		$url.= '"email":"'.$post['email'].'"';
		$url.= '}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return true;
		#############################################
		#############################################
	}

	function Campos( $dado = 'full' ){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarcampos?key='.$this->vista_key;

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		if( $dado == 'imovel' ){
			$fields = array();

			foreach( $result['imoveis'] as $row ){
				array_push($fields,$row);
			}

			$resultado = implode('","',$fields);
		}else{
			$resultado = $result;
		}

		return $resultado;
		#############################################
		#############################################
	}

	function Estados(){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["UF"]}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		$resultado = arrayToObject($result);

		return $resultado->UF;
		#############################################
		#############################################
	}

	function Cidades($uf = 'RS'){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["Cidade"],"filter":{"UF":["'.$uf.'"]}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		$resultado = arrayToObject($result);

		return $resultado->Cidade;
		#############################################
		#############################################
	}

	function Bairros($cidade = 'Porto%20Alegre'){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["Bairro"],"filter":{"Cidade":["'.$cidade.'"]}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		if(empty($result['Bairro'][0])){
			unset($result['Bairro'][0]);
		}

		return $result['Bairro'];
		#############################################
		#############################################
	}

	function BairrosComercial($cidade = 'Porto%20Alegre'){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["BairroComercial"],"filter":{"Cidade":["'.$cidade.'"]}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		if(empty($result['BairroComercial'][0])){
			unset($result['BairroComercial'][0]);
		}

		return $result['BairroComercial'];
		#############################################
		#############################################
	}

	function Condominios(){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["Empreendimento","FotoDestaque"]}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		if(empty($result['Empreendimento'][0])){
			unset($result['Empreendimento'][0]);
		}

		return $result['Empreendimento'];
		#############################################
		#############################################
	}

	function Categorias(){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listarConteudo?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["Categoria"]}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		$resultado = arrayToObject($result);

		return $resultado->Categoria;
		#############################################
		#############################################
	}

	function ImovelFotos($codigo,$emp = false){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/detalhes?key='.$this->vista_key;
		$url.= '&imovel='.$codigo;
		$url.= '&pesquisa={"fields":[';
		$url.= '{"Foto":["Foto","FotoPequena","Destaque","Descricao","Tipo"]},';
		$url.= '{"FotoEmpreendimento":["Foto","FotoPequena","Destaque","Descricao","Tipo"]},';
		$url.= '{"Video":["Video","VideoCodigo","Descricao","Codigo","Destaque","Tipo","Data","ExibirNoSite","ExibirSite"]},';
		$url.= '{"Anexo":["CodigoAnexo","Descricao","Anexo","Arquivo","ExibirNoSite","ExibirSite"]}';
		$url.= '],"order":{"DataCadastro":"asc"}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return $result;
		#############################################
		#############################################
	}

	function ImovelCorretor($codigo){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/detalhes?key='.$this->vista_key;
		$url.= '&imovel='.$codigo;
		$url.= '&pesquisa={"fields":[';
		$url.= '{"Corretor":["Nomecompleto","Nome","Email","Corretor","Fone","Celular","Celular1","Celular2","Ramal","Foto","Chat","FonePessoal","CRECI","Observacoes"]}';
		$url.= ']}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return $result;
		#############################################
		#############################################
	}

	function Corretores(){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/clientes/listar?key='.$this->vista_key;
		$url.= '&pesquisa={"fields":["Nomecompleto","Nome","Fone","Celular","Foto","CRECI","Observacoes"]}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return $result;
		#############################################
		#############################################
	}

	function Corretor($codigo){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/clientes/detalhes?key='.$this->vista_key;
		$url.= '&cliente='.$codigo.'&pesquisa={"fields":["Nomecompleto","Nome","Corretor","Fone","Celular","Celular1","Celular2","Ramal","Foto","Chat","FonePessoal","CRECI","Observacoes"]}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return $result;
		#############################################
		#############################################
	}

	function Imovel($codigo){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listar?key='.$this->vista_key;
		$url.= '&pesquisa={"filter":{"Codigo":"'.$codigo.'"},"fields":[';

		$url.= '"123iPublicationType","Aberturas","AceitaDacao","AceitaFinanciamento","AceitaPermuta","AceitaPermutaCarro","AceitaPermutaOutro",';
		$url.= '"AceitaPermutaTipoVeiculo","AcessoDeficientes","AdministradoraCondominio","AlugarJaDestaque","AndarDoApto","Andares","AnoConstrucao",';
		$url.= '"AnoMinimoVeicPermuta","AptosAndar","AptosEdificio","AreaArmazem","AreaBoxPrivativa","AreaBoxTotal","AreaConstruida","AreaEscritorio",';
		$url.= '"AreaLaje","AreaLocavel","AreaMezanino","AreaPrivativa","AreaTerreno","AreaTotal","Bairro","BairroComercial","BanheiroSocialQtd",';
		$url.= '"Bloco","CampanhaImportacao","CasaMineiraModelo","Categoria","CEP","Chave","ChaveNaAgencia","ChavesNaMaoDestaque","Cidade",';
		$url.= '"ClasseDoImovel","Closet","Closets","CodigoDWV","CodigoMalote","Complemento","ComplementoMigrado","Conjutos","Construtora",';
		$url.= '"CorretorPrimeiroAge","DataAtualizacao","DataCadastro","DataDisponibilizacao","DataEntrega","DataFimAutorizacao","DataImportacao",';
		$url.= '"DataInicioAutorizacao","DataLancamento","DataVencimentoContrato","DescricaoEmpreendimento","DescricaoWeb","DestaquePetropolisImoveis",';
		$url.= '"DestaqueWeb","DimensoesTerreno","DivulgarEndereco123i","DivulgarEnderecoLoft","Dormitorios","EEmpreendimento","Elevadores",';
		$url.= '"EmitiuNotaFiscalComissao","EmpOrulo","Empreendimento","Endereco","EstacionamentoVagas","EstadoConservacaoEdificio",';
		$url.= '"EstadoConservacaoImovel","Exclusivo","ExclusivoCorretor","ExibirComentarios","ExibirNoSite","Face","Fachada","Finalidade","FolhaSPModelo",';
		$url.= '"FormatodoGalpao","Frente","Fundos","GaragemNumeroBox","GaragemTipo","GaragemTipo2","GaragemTipo3","GaragemTipo4","GrupoSPTipoOferta",';
		$url.= '"HidroSuite","HoraDomFim","HoraDomInicio","HoraFerFim","HoraFerInicio","HoraSabFim","HoraSabInicio","HoraSegSexFim","HoraSegSexInicio",';
		$url.= '"IdadeImovel","Iluminacao","Imediacoes","ImovelaVendaDestaqueImovelaVenda","ImovelDWV","ImovelwebModelo","ImovelwebTipoPublicacao",';
		$url.= '"ImportadoMalote","Incompleto","Incorporadora","InformacaoVenda","InicioObra","InscricaoGas","InscricaoIptu","InscricaoIptuGaragem",';
		$url.= '"InscricaoMunicipal","KeywordsWeb","Lancamento","Latitude","Limpeza","ListingId","LivingAmbientes","LocacaoAnual","LocacaoTemporada",';
		$url.= '"LocalCargaEDescarga","LocalizacaoPermuta","LoftPublicationType","LojasEdificio","Longitude","Lote","LugarCertoDestaqueLugarCerto",';
		$url.= '"Matricula","MercadoLivreTipoML","MesConstrucao","Midia","Modulos","NomeBloco","Numero","NumeroEnergiaEletrica","NumeroHidrometro",';
		$url.= '"Observacoes","ObsLocacao","ObsVenda","Ocupacao","OLXFinalidadesPublicadas","Orientacao","Orulo","PadraoConstrucao","Pais","Pavimentos",';
		$url.= '"PeDireitoAlto","PercentualComissao","Piso","PisoAreaIntima","PisoDormitorio","PisoSala","Plantao","PlantaoNoLocal","PorteEstrutural",';
		$url.= '"PortfolioUnico","Posicao","PosicaoAndar","PotenciaKVA","PrazoDesocupacao","Prestacao","ProjetoArquitetonico","Proposta",';
		$url.= '"PropostaLocacao","QntDormitoriosPermuta","QntGaragensPermuta","QntSuitesPermuta","QTDGalpoes","QtdVarandas","Quadra","Reajuste",';
		$url.= '"Referencia","Regiao","ResponsavelReserva","Salas","SalasEdificio","SaldoDivida","SemVaga","Setor","Situacao","Status","Suites",';
		$url.= '"SummerSale","SuperDestaqueWeb","TemPlaca","TemTourVirtual","TextoAnuncio","TipoEndereco","TipoImovel","TipoImovelPermuta",';
		$url.= '"TipoOferta321Achei","TipoTeto","TiqueImoveisEmDestaque","TituloSite","Topografia","TotalComissao","UF","UnitId","URLVideo","UrlVisita",';
		$url.= '"VagaDescoberta","Vagas","VagasCobertas","VagasDescobertas","VagasPrincipais","VagasSecundarias","ValorACombinar","ValorAluguelPorM2",';
		$url.= '"ValorComissao","ValorCondominio","ValorCondominioM2","ValorDiaria","ValorIptu","ValorIPTUM2","ValorLimpeza",';
		$url.= '"ValorLocacao","ValorLocacaoM2","ValorM2","ValorPermutaImovel","ValorTotalAluguel","ValorVenda","ValorVendaM2","Varanda","Venda",';
		$url.= '"Visita","VisitaAcompanhada","VivaRealDestaqueVivaReal","VivaRealDivulgarEnderecoVivaReal","VivaRealPublicationType",';
		$url.= '"WebEscritoriosDestaque","ZapTipoOferta","ZeladorNome","ZeladorTelefone","Zona","CategoriaImovel","CategoriaMestre","CategoriaGrupo",';
		$url.= '"ImoCodigo","Moeda","ConverterMoeda","MoedaIndice","CodigoEmpresa","CodigoEmp","CodigoEmpreendimento","CodigoCategoria",';
		$url.= '"CodigoMoeda","CodigoProprietario","DataHoraAtualizacao","VideoDestaque","VideoDestaqueTipo","FotoDestaque","FotoDestaquePequena",';
		$url.= '"FotoDestaqueEmpreendimento","FotoDestaqueEmpreendimentoPequena","Agenciador","CorretorNome","CodigoCorretor","CaptadorAccountId",';
		$url.= '"AssuntoProntuario","PendenteProntuario","EstadoProntuario","DataInicioProntuario","DataProntuario","CodigoAgencia",';
		$url.= '"TotalBanheiros","Caracteristicas","InfraEstrutura",';

		$url.= '{"Corretor":["Nascimento","Nacionalidade","CNH","Celular","Endereco","Bairro","Cidade","UF","CEP","Pais","Fone","Fax","Email","Nome","Observacoes",';
		$url.= '"Codigo","Celular1","Celular2","Corretor","Nomecompleto","Ramal","Sexo","Exibirnosite","Inativo","CRECI","Estadocivil","Foto","Tipo","CodigoAgencia","Agencia"]}';

		$url.= ']}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );
		$key = array_keys($result);

		return $result[$key[0]];
		#############################################
		#############################################
	}

	function Pesquisa($cond,$ordem,$offset,$limite){
		#############################################
		#############################################
		$url = 'https://'.$this->vista_usr.'-rest.vistahost.com.br/imoveis/listar?key='.$this->vista_key;
		$url.= '&showtotal=1&pesquisa={"fields":[';
		$url.= '"DataAtualizacao","DataCadastro","DataHoraAtualizacao","DataEntrega","ImoCodigo","Ocupacao","Categoria",';
		$url.= '"TipoEndereco","Endereco","Numero","Bairro","BairroComercial","Cidade","UF","CEP","Empreendimento","Dormitorios",';
		$url.= '"Suites","ValorVenda","ValorLocacao","ValorCondominio","ValorIptu","Bloco","BanheiroSocialQtd","TotalBanheiros",';
		$url.= '"Vagas","AreaTotal","AreaPrivativa","Status","DestaqueWeb","Lancamento","Exclusivo",';
		$url.= '"FotoDestaque","FotoDestaquePequena","DescricaoWeb","Situacao","CodigoCorretor","Corretor","Finalidade"';
		$url.= '],"filter":{'.implode(",",$cond).'},';
		$url.= '"order":{'.$ordem.'},"paginacao":{"pagina":'.$offset.',"quantidade":'.$limite.'}}';

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec( $ch );

		$result = json_decode( $result, true );

		return $result;
		#############################################
		#############################################
	}


}
?>