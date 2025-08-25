<?php
use CodeIgniter\Config\Services;
use CodeIgniter\Database\BaseBuilder;
use App\Models\SiteModel;

################################################################
################################################################
if( !function_exists('PageSpeed') ){
    /**
     * Detects if the user agent is a known bot or page speed tool.
     */
    function PageSpeed(): bool
    {
        $is_bot = false;
        $user_agents = [
            'GTmetrix',
            'Googlebot',
            'Bingbot',
            'BingPreview',
            'msnbot',
            'slurp',
            'Ask Jeeves/Teoma',
            'Baidu',
            'DuckDuckBot',
            'AOLBuild',
            'Chrome-Lighthouse',
            'Lighthouse',
            'Google PageSpeed',
            'Google Page Speed Insights',
            'Speed Insights'
        ];

        $userAgent = Services::request()->getUserAgent()->getAgentString();

        foreach ($user_agents as $agent) {
            if (strpos($userAgent, $agent) !== false) {
                $is_bot = true;
                break;
            }
        }
        return $is_bot;
    }
}
################################################################
################################################################
if( !function_exists('arrayToUrlSearch') ){
    /**
     * Converts an array into a URL segment string for searching.
     *
     * @param array $array The input array.
     * @param bool $encode Whether to URL-encode values.
     * @return string The formatted URL segment.
     */
    function arrayToUrlSearch(array $array, bool $encode = false): string
    {
        $url = [];
        foreach ($array as $key => $value) {
            if (in_array($key, ['x', 'y', 'modo', 'frm_submit', 'frm_submit2', 'search']) ){
                continue;
            }

            if (!empty($value) ){
                if (is_array($value) ){
                    $value = implode('_', $value);
                    $url[] = $key . "/" . urlencode($value);
                } else {
                    $value = str_replace(['/', '?'], ['-', "'"], (string) $value);
                    $value = urlencode($value);
                    $value = str_replace('+', ' ', $value);
                    $url[] = $key . "/" . urlencode($value);
                }
            }
        }
        return implode('/', $url);
    }
}
################################################################
################################################################
if( !function_exists('arrayToUrlSearch2') ){
    /**
     * Converts an array into a URL segment string for searching (variation 2).
     *
     * @param array $array The input array.
     * @return string The formatted URL segment.
     */
    function arrayToUrlSearch2(array $array): string
    {
        $url = [];
        foreach ($array as $key => $value) {
            if (in_array($key, ['x', 'y', 'frm_submit', 'frm_submit2', 'search', 'modo']) ){
                continue;
            }

            if (!empty($value) ){
                if (is_array($value) ){
                    $value = implode('-', $value);
                    $url[] = $key . "/" . $value;
                } else {
                    $value = str_replace(['/', '?'], ['-', "'"], (string) $value);
                    $value = urlencode($value);
                    $value = str_replace('+', ' ', $value);
                    $url[] = $key . "/" . $value;
                }
            }
        }
        return implode('/', $url);
    }
}
################################################################
################################################################
if( !function_exists('arrayToUrlSearch3') ){
    /**
     * Converts an array into a URL segment string for searching (variation 3).
     *
     * @param array $array The input array.
     * @return string The formatted URL segment.
     */
    function arrayToUrlSearch3(array $array): string
    {
        $url = [];
        foreach ($array as $key => $value) {
            if (in_array($key, ['x', 'y', 'frm_submit', 'frm_submit2', 'search', 'vlr', 'ar', 'data', 'local']) ){
                continue;
            }

            if (!empty($value) ){
                if (is_array($value) ){
                    $value = implode('-', $value);
                    $url[] = $key . "/" . $value;
                } else {
                    $value = str_replace(['/', '?'], ['-', "'"], (string) $value);
                    $value = urlencode($value);
                    $value = str_replace('+', ' ', $value);
                    $url[] = $key . "/" . $value;
                }
            }
        }
        return implode('/', $url);
    }
}
################################################################
################################################################
if( !function_exists('format_url') ){
    /**
     * Formats a URL, ensuring it has an http:// prefix if missing.
     *
     * @param string $url The URL to format.
     * @return string The formatted URL or an empty string if invalid.
     */
    function format_url(string $url): string
    {
        $url = substr($url, 0, 4) == 'http' ? $url : 'http://' . $url;
        return $url != 'http://' ? $url : '';
    }
}
################################################################
################################################################
if( !function_exists('Debugar') ){
    /**
     * Prints a variable for debugging purposes and optionally stops script execution.
     *
     * @param mixed $objeto The variable to debug.
     * @param int $stop If 1, script execution will stop.
     */
    function Debugar(mixed $objeto, int $stop = 0): void
    {
        if (!empty($objeto) ){
            echo '<pre>';
            print_r($objeto);
            echo "</pre>";
        } else {
            echo 'Empty!';
        }

        if ($stop === 1) {
            die();
        }
    }
}
################################################################
################################################################
if( !function_exists('ObterExtensao') ){
    /**
     * Obtains the file extension from a filename.
     *
     * @param string $arquivo The filename.
     * @param string $case The desired case for the extension ('minuscula', 'maiuscula', 'primeira').
     * @return string The file extension.
     */
    function ObterExtensao(string $arquivo, string $case = "minuscula"): string
    {
        $pathInfo = pathinfo($arquivo);
        $ext = $pathInfo['extension'] ?? '';

        if ($case == "maiuscula") {
            $ext = strtoupper($ext);
        } elseif ($case == "minuscula") {
            $ext = strtolower($ext);
        } elseif ($case == "primeira") {
            $ext = ucfirst($ext);
        }
        return $ext;
    }
}
################################################################
################################################################
if( !function_exists('URLtoArray') ){
    /**
     * Converts a URL path into an associative array of parameters.
     * Assumes URL segments are in key/value pairs (e.g., /key1/value1/key2/value2).
     *
     * @param string $valor The URL path.
     * @return array An associative array of parameters.
     */
    function URLtoArray(string $valor): array
    {
        $parametros = parse_url($valor, PHP_URL_PATH);
        if ($parametros === false || $parametros === null) {
            return [];
        }
        $parametros = explode('/', trim($parametros, '/'));
        $parametros = array_chunk($parametros, 2);
        $final_params = [];
        foreach ($parametros as $param) {
            if (isset($param[0]) && isset($param[1]) ){
                $final_params[$param[0]] = $param[1];
            }
        }
        return $final_params;
    }
}
################################################################
################################################################
if( !function_exists('arrayToObject') ){
    /**
     * Converts an associative array to a StdClass object.
     *
     * @param array $array The input array.
     * @return \stdClass The converted object.
     */
    function arrayToObject(array $array): \stdClass
    {
        $return = new \stdClass();
        foreach ($array as $k => $v) {
            if (is_array($v) ){
                $return->$k = arrayToObject($v);
            } else {
                $return->$k = $v;
            }
        }
        return $return;
    }
}
################################################################
################################################################
if( !function_exists('objectToArray') ){
    /**
     * Converts an object (or array) to a multidimensional array.
     *
     * @param mixed $d The input object or array.
     * @return array The converted array.
     */
    function objectToArray(mixed $d): array
    {
        if (is_object($d) ){
            // Gets the properties of the given object
            $d = get_object_vars($d);
        }

        if (is_array($d) ){
            return array_map('App\Helpers\objectToArray', $d);
        } else {
            return $d;
        }
    }
}
################################################################
################################################################
if( !function_exists('dataConv') ){
	function dataConv($data,$tipo){

		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

		switch($tipo){
			case 'BRtoBD':
				$novadata = date('Y-m-d', strtotime(str_replace("/","-",$data)));
			break;
			case 'BDtoBR':
				$novadata = date('d/m/Y', strtotime($data));
			break;
			case 'Hour':
				$novadata = date('H:i', strtotime($data));
			break;
			case 'FullHour':
				$novadata = date('H:i:s', strtotime($data));
			break;
			case 'FullData':
				$novadata = date('d/m/Y H:i', strtotime($data));
			break;
			case 'FullBR':
				$novadata = date('d/m/Y', strtotime($data)).' às '.date('H:i:s', strtotime($data));
			break;
			case 'FullBD':
				$novadata = date('Y-m-d H:i:s', strtotime($data));
			break;
			case 'FullMes':
				$novadata = utf8_encode(strftime('%d de %B de %Y', strtotime($data)));
			break;
            case 'FullBRtoBD':
				$novadata = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$data)));
			break;
		}

		return $novadata;
	}
}
################################################################
################################################################
if( !function_exists('URLizer') ){
    /**
     * Converts a string to a URL-friendly slug.
     *
     * @param string $text The input text.
     * @return string The URL-friendly slug.
     */
    function URLizer(string $text): string
    {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_| -]+/", '-', $clean);
        return $clean;
    }
}
################################################################
################################################################
if( !function_exists('UTFizer') ){
    /**
     * Converts a string to a UTF-8 friendly format, replacing special characters with spaces.
     *
     * @param string $text The input text.
     * @return string The UTF-8 friendly string.
     */
    function UTFizer(string $text): string
    {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_| -]+/", ' ', $clean);
        return $clean;
    }
}
################################################################
################################################################
if( !function_exists('Redutor') ){
    /**
     * Truncates a text to a specified length, adding "..." if truncated.
     *
     * @param string $text The input text.
     * @param int $t The maximum length.
     * @return string The truncated or original text.
     */
    function Redutor(string $text = NULL, int $t = 100): string
    {
        $text = trim(strip_tags($text));
        $text = str_replace(["&nbsp;", "\n", "\p", "\r", "  "], " ", $text);
        $text = preg_replace('/\s+/', ' ', $text); // Normalize multiple spaces

        $tamanho = strlen($text);

        if ($tamanho >= $t) {
            $texto = substr($text, 0, $t);
            $p = strrpos($texto, ' ');
            if ($p !== false) {
                $texto = substr($texto, 0, $p);
            }
            $texto = $texto . "...";
        } else {
            $texto = $text;
        }
        return $texto;
    }
}
################################################################
################################################################
if( !function_exists('search_in_array') ){
    /**
     * Searches for a word in an array (either by value or key) using regex.
     *
     * @param string $palavra The word to search for.
     * @param array $array The array to search in.
     * @param string $metodo The search method ('v' for value, 'k' for key).
     * @return string|false The key (prefixed with 'k') or value if found, otherwise false.
     */
    function search_in_array(string $palavra, array $array, string $metodo = 'v'){
        if ($metodo == 'v') {
            foreach ($array as $k => $v) {
                // Use preg_match for PHP 8.2 compatibility, with 'u' for UTF-8
                if (is_string($v) && preg_match('/' . preg_quote($palavra, '/') . '/u', $v) ){
                    return 'k' . $k;
                }
            }
        } elseif ($metodo == 'k') {
            foreach ($array as $k => $v) {
                // Use preg_match for PHP 8.2 compatibility, with 'u' for UTF-8
                if (is_string($k) && preg_match('/' . preg_quote($palavra, '/') . '/u', $k) ){
                    return $v;
                }
            }
        }
        return false;
    }
}
################################################################
################################################################
if( !function_exists('Dinheiro') ){
    /**
     * Formats a number as Brazilian currency.
     *
     * @param float|int|string $valor The numeric value.
     * @param bool $simbolo Whether to include the 'R$' symbol.
     * @return string The formatted currency string.
     */
    function Dinheiro(string $valor = NULL, bool $simbolo = true){
        if (empty($valor) || (float) $valor <= 0.01) {
            return 'Consulte';
        } else {
            if ($simbolo === true) {
                return 'R$ ' . number_format((float) $valor, 0, '', '.');
            } else {
                return number_format((float) $valor, 0, '', '.');
            }
        }
    }
}
################################################################
################################################################
if( !function_exists('Money') ){
    /**
     * Removes currency formatting from a string to get a raw number.
     *
     * @param string $valor The formatted currency string.
     * @return string The raw numeric string.
     */
    function Money(string $valor): string
    {
        $a = ['R$', ' ', '.', ','];
        return str_replace($a, '', $valor);
    }
}
################################################################
################################################################
if( !function_exists('ObterSemExtensao') ){
    /**
     * Obtains the filename without its extension.
     *
     * @param string $arquivo The filename.
     * @param string $case The desired case for the filename ('minuscula', 'maiuscula', 'primeira').
     * @return string The filename without extension.
     */
    function ObterSemExtensao(string $arquivo, string $case = "maiuscula"): string
    {
        $pathInfo = pathinfo($arquivo);
        $sExt = $pathInfo['filename'] ?? '';

        if ($case == "maiuscula") {
            $sExt = strtoupper($sExt);
        } elseif ($case == "minuscula") {
            $sExt = strtolower($sExt);
        } elseif ($case == "primeira") {
            $sExt = ucfirst($sExt);
        }
        return $sExt;
    }
}
################################################################
################################################################
if( !function_exists('RemoveURL') ){
    /**
     * Removes the scheme and leading/trailing slashes from a URL.
     *
     * @param string $url The URL to process.
     * @return string The cleaned URL.
     */
    function RemoveURL(string $url): string
    {
        $nurl = preg_replace("#^[^:/.]*[:/]+#i", "", $url);
        $nurl = trim($nurl, '/');
        return $nurl;
    }
}
################################################################
################################################################
if( !function_exists('array_flatten') ){
    /**
     * Flattens a multi-dimensional array into a single-dimensional array.
     *
     * @param array $array The array to flatten.
     * @return array|false The flattened array or false if input is not an array.
     */
    function array_flatten(array $array){
        if (!is_array($array) ){
            return false;
        }
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value) ){
                $result = array_merge($result, array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
################################################################
################################################################
if( !function_exists('change_key') ){
    /**
     * Changes a key in an associative array.
     *
     * @param array $array The input array.
     * @param string $old_key The key to change.
     * @param string $new_key The new key.
     * @return array The array with the updated key.
     */
    function change_key(array $array, string $old_key, string $new_key): array
    {
        if (!array_key_exists($old_key, $array) ){
            return $array;
        }

        $keys = array_keys($array);
        $keys[array_search($old_key, $keys)] = $new_key;

        return array_combine($keys, $array);
    }
}
################################################################
################################################################
if( !function_exists('AjustaTexto') ){
    /**
     * Adjusts text by replacing accented characters and normalizing spaces.
     *
     * @param string $string The input string.
     * @return string The adjusted string.
     */
    function AjustaTexto(string $string): string
    {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ&';
        $b = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyybyRre';
        $string = strtr($string, $a, $b);
        return $string;
    }
}
################################################################
################################################################
if( !function_exists('Tratar') ){
    /**
     * Replaces specific characters in a string for encoding/decoding purposes.
     *
     * @param string $texto The input text.
     * @param string $via The direction ('c' for encode, 'd' for decode).
     * @return string The processed text.
     */
    function Tratar(string $texto, string $via = 'c'): string
    {
        $a = ['\\', '/', '-'];
        $b = ['_=_', '_*_', '_+_'];

        if ($via == 'c') {
            return str_replace($a, $b, $texto);
        } elseif ($via == 'd') {
            return str_replace($b, $a, $texto);
        }
        return $texto; // Return original if via is unknown
    }
}
################################################################
################################################################
if( !function_exists('Titulo') ){
    function Titulo(object $imovel, bool $seo = false, bool $code = false): string
    {
        if ($imovel->categoria == 'Empreendimento') {
            return Empreendimento($imovel);
        }

        $dormitorios = !empty($imovel->dormitorios) ? ', ' . $imovel->dormitorios . ' ' . Dormitorios($imovel->dormitorios) : '';
        $suites = !empty($imovel->suites) ? ', ' . $imovel->suites . ' ' . Suites($imovel->suites) : '';
        $vagas = !empty($imovel->vagas) ? ', ' . $imovel->vagas . ' ' . Vagas($imovel->vagas) : '';

        $area = '';
        if( !empty(Area($imovel->areaprivativa) )){
            $area = ' com ' . Area($imovel->areaprivativa) . 'm²';
        }elseif( !empty(Area($imovel->areatotal)) ){
            $area = ' com ' . Area($imovel->areatotal) . 'm²';
        }elseif( !empty(Area($imovel->areatereno)) ){
            $area = ' com ' . Area($imovel->areatereno) . 'm²';
        }

        $bairro = ' no bairro ' . $imovel->bairro;

        $codigo = $code === true ? ' - Código ' . trim($imovel->codigo) : '';

        $status = '';
        if ($imovel->modo == 'V') {
            $status = ' à venda';
        } elseif ($imovel->modo == 'A') {
            $status = ' para alugar';
        } elseif ($imovel->modo == 'VA') {
            $status = ' para comprar ou alugar';
        }

        if( $seo === true ){
            $titulo = $imovel->categoria . $status . $area . $bairro . ' em ' . $imovel->cidade . $codigo;
        }else{
            $titulo = $imovel->categoria . $status . $area . $dormitorios . $suites . $vagas . $bairro . ' em ' . $imovel->cidade . $codigo;
        }
        return $titulo;
    }
}
################################################################
################################################################
if( !function_exists('URL') ){
    function URL(object $imovel): string
    {
        $session = service('session');
        $sessorigem = $session->get('P3dr0m4RiaNo_origem');
        $origem = (!empty($sessorigem) && in_array($sessorigem, ORIGEM)) ? $sessorigem . '/' : '';

        $sesscorretor = $session->get('P3dr0m4RiaNo_corretor');
        $corretor = (!empty($sesscorretor) && !in_array($sesscorretor, ORIGEM)) ? $sesscorretor . '/' : '';

        // base_url() is a global function in CI4
        $url = base_url() . 'imovel/' . URLizer(str_replace('²', '', Titulo($imovel, true, false))) . '/' . trim($imovel->codigo) . '_' . trim($imovel->referencia) . '/' . $origem . $corretor;
        return $url;
    }
}
################################################################
################################################################
if( !function_exists('URLC') ){
    function URLC(object $imovel): string
    {
        $session = service('session');
        $sessorigem = $session->get('P3dr0m4RiaNo_origem');
        $origem = (!empty($sessorigem) && in_array($sessorigem, ORIGEM)) ? $sessorigem . '/' : '';

        $sesscorretor = $session->get('P3dr0m4RiaNo_corretor');
        $corretor = (!empty($sesscorretor) && !in_array($sesscorretor, ORIGEM)) ? $sesscorretor . '/' : '';

        // base_url() is a global function in CI4
        $url = base_url() . 'condominio/' . trim($imovel->codigo) . '/' . URLizer($imovel->empreendimento) . '/' . $corretor . $origem;
        return $url;
    }
}
################################################################
################################################################
if( !function_exists('Dormitorios') ){
    function Dormitorios(mixed $dormitorios): string
    {
        return $dormitorios > 1 ? 'quartos' : 'quarto';
    }
}
################################################################
################################################################
if( !function_exists('Suites') ){
    function Suites(mixed $suites): string
    {
        return $suites > 1 ? 'suítes' : 'suíte';
    }
}
################################################################
################################################################
if( !function_exists('Vagas') ){
    function Vagas(mixed $vagas): string
    {
        return $vagas > 1 ? 'vagas' : 'vaga';
    }
}
################################################################
################################################################
if( !function_exists('Banheiros') ){
    function Banheiros(mixed $banheiros): string
    {
        return $banheiros > 1 ? 'banheiros' : 'banheiro';
    }
}
################################################################
################################################################
if( !function_exists('Area') ){
    function Area(mixed $area){
        return number_format(floor((float) $area), 0, '', '.');
    }
}
################################################################
################################################################
if( !function_exists('Empreendimento') ){
    /**
     * Formats the name of an enterprise/condominium.
     *
     * @param object $imovel The property object.
     * @return string The formatted enterprise name.
     */
    function Empreendimento(object $imovel): string
    {
        $termos = ['Condomínio ', 'Condominio '];
        if (!empty($imovel->empreendimento) ){
            return $imovel->empreendimento . ' em ' . $imovel->cidade;
        } else {
            return str_replace($termos, '', $imovel->bairro);
        }
    }
}
################################################################
################################################################
if( !function_exists('SetNulo') ){

    function SetNulo(mixed $campo): mixed
    {
        if( !empty($campo) && $campo != '.' && $campo != '1969-12-31' && $campo != '0.00' && $campo != '0.01' && $campo != '0.10' && $campo != '0.00' && $campo != '0000-00-00' && $campo != '0000-00-00 00:00:00' && $campo != '0000-00-00 00:00:00' ){
            return $campo;
        }
        return null;
    }
}
################################################################
################################################################
if( !function_exists('SearchStr') ){
    /**
     * Checks if a substring exists within a string.
     *
     * @param string $str The haystack string.
     * @param string $findme The needle string.
     * @return string|null The original string if found, otherwise NULL.
     */
    function SearchStr(string $str, string $findme): ?string
    {
        $pos = strpos($str, $findme);
        return $pos !== false ? $str : null;
    }
}
################################################################
################################################################
if( !function_exists('LerMais')){
	function LerMais(string $mensagem, $limite = 220) {

		if( strlen($mensagem) > $limite ){
			$texto = substr($mensagem,0,$limite);
			$p = strrpos($texto, ' ');
			if( $p !== false ){
				$texto = substr($texto, 0, $p);
			}
			$tam = strlen($texto)+1;
			$restante = substr(' '.$mensagem, $tam);
			$ajustado = $texto.'<span class="etc">...</span><span class="mais-texto" style="display:none;">'.$restante.'</span>'.PHP_EOL;
			$ajustado.= ' <a href="#ms" class="ler-mais">Ler mais</a>';
		} else {
			$ajustado = $mensagem;
		}

		return $ajustado;
	}
}
################################################################
################################################################
if( !function_exists('addURL') ){
    /**
     * Adds "www." to a URL if it's missing and starts with "http://".
     *
     * @param string $url The input URL.
     * @return string The modified URL.
     */
    function addURL(string $url): string
    {
        if (preg_match('/www/', $url) ){
            $nova = $url;
        } else {
            $nova = str_replace("http://", "http://www.", $url);
        }
        return $nova;
    }
}
################################################################
################################################################
if( !function_exists('LimpaSessions') ){
    /**
     * Truncates the 'ci_sessions' table if the total number of rows exceeds a threshold.
     *
     * @param int $qtde The maximum number of sessions allowed before truncation.
     */
    function LimpaSessions(int $qtde = 20000){
        $siteModel = new SiteModel();
        $total = $siteModel->TotalRows('ci_sessions');

        if ($total >= $qtde) {
            $siteModel->Truncate('ci_sessions');
        }
    }
}
################################################################
################################################################
if( !function_exists('retornaDiretorio') ){
    /**
     * Scans a directory and its subdirectories for image files.
     *
     * @param string $dir The directory path.
     * @return array An array of image file paths.
     */
    function retornaDiretorio(string $dir): array
    {
        $imagens = [];
        $files = scandir($dir);
        if( $files === false ){
            return []; // Handle error
        }

        $ignorados = ['.','..','.htaccess','Thumbs.db','index.html','index.htm','index.php'];

        foreach( $files as $arquivo ){
            if( !in_array($arquivo,$ignorados) ){
                $fullPath = rtrim($dir, '/') . '/' . $arquivo;
                if( !is_dir($fullPath) ){
                    $imagens[] = $fullPath;
                }else{
                    $nfiles = preg_grep('~\.(jpeg|jpg|png|gif|bmp|webp|svg|avi|webm|webv)$~', scandir($fullPath));
                    if( $nfiles === false ){
                        continue; // Handle error
                    }
                    foreach( $nfiles as $narquivo ){
                        if( !in_array($narquivo,$ignorados) ){
                            $imagens[] = rtrim($dir, '/') . '/' . $arquivo . '/' . $narquivo;
                        }
                    }
                }
            }
        }
        return $imagens;
    }
}
################################################################
################################################################
if( !function_exists('DirSize') ){
    /**
     * Calculates the size of a directory recursively and formats it.
     *
     * @param string $directory The directory path.
     * @return string The formatted directory size.
     */
    function DirSize(string $directory): string
    {
        $size = 0;
        $files = glob($directory . '/*');
        if ($files === false) {
            return '0 B'; // Handle error
        }

        foreach ($files as $path) {
            if (is_file($path) ){
                $size += filesize($path);
            } elseif (is_dir($path) ){
                $size += (float) str_replace([' B', ' KB', ' MB', ' GB', ' TB', ' PB'], '', DirSize($path)); // Recursively sum
            }
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $mod = 1024;
        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }
        return number_format($size, 2, '.', '') . ' ' . $units[$i];
    }
}
################################################################
################################################################
if( !function_exists('Telefone') ){
    /**
     * Removes non-numeric characters from a phone number string.
     *
     * @param string $numero The phone number string.
     * @return string The numeric-only phone number.
     */
    function Telefone(string $numero): string
    {
        $foneA = ['(', ')', '-', '.', ',', ' '];
        return str_replace($foneA, '', $numero);
    }
}
################################################################
################################################################
if( !function_exists('videoType') ){
    /**
     * Determines the type of video (YouTube, Vimeo, or unknown) from a URL.
     *
     * @param string $url The video URL.
     * @return string The video type.
     */
    function videoType(string $url): string
    {
        if (strpos($url, 'youtube') !== false || strpos($url, 'youtu.be') !== false) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') !== false) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }
}
################################################################
################################################################
if( !function_exists('getUserIP') ){
    function getUserIP(): array
    {
        // Coleta o User-Agent
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

        // Detecta o sistema operacional
        $os = 'Desconhecido';
        $osList = [
            '/windows nt 10/i'     => 'Windows 10',
            '/windows nt 6.3/i'    => 'Windows 8.1',
            '/windows nt 6.2/i'    => 'Windows 8',
            '/windows nt 6.1/i'    => 'Windows 7',
            '/windows nt 6.0/i'    => 'Windows Vista',
            '/windows nt 5.1/i'    => 'Windows XP',
            '/macintosh|mac os x/i'=> 'Mac OS X',
            '/linux/i'             => 'Linux',
            '/iphone/i'            => 'iPhone',
            '/ipad/i'              => 'iPad',
            '/android/i'           => 'Android',
        ];
        foreach ($osList as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $os = $value;
                break;
            }
        }

        // Detecta o navegador
        $browser = 'Desconhecido';
        $browserList = [
            '/msie|trident/i'    => 'Internet Explorer',
            '/firefox/i'         => 'Firefox',
            '/chrome/i'          => 'Chrome',
            '/safari/i'          => 'Safari',
            '/edge/i'            => 'Edge',
            '/opera/i'           => 'Opera',
        ];
        foreach ($browserList as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $browser = $value;
                break;
            }
        }

        // Coleta o IP do usuário (considerando proxies)
        $ip = $_SERVER['HTTP_CLIENT_IP'] ??
            $_SERVER['HTTP_X_FORWARDED_FOR'] ??
            $_SERVER['REMOTE_ADDR'] ??
            'Desconhecido';

        // Se houver múltiplos IPs, pega o primeiro válido
        if (str_contains($ip, ',')) {
            $ip = trim(explode(',', $ip)[0]);
        }

        // Coleta o host reverso (se disponível)
        $host = gethostbyaddr($ip);

        return [
            'sistema_operacional' => $os,
            'navegador'           => $browser,
            'ip'                  => $ip,
            'host'                => $host ?: 'Desconhecido',
            'user_agent'          => $userAgent,
        ];
    }
}
################################################################
################################################################
if( !function_exists('xml2object') ){
    function xml2object(\SimpleXMLElement $xml): \stdClass
    {
        $arr = [];
        foreach ($xml->children() as $r) {
            if (count($r->children()) == 0) {
                $arr[$r->getName()] = strval($r);
            } else {
                $arr[$r->getName()][] = xml2object($r);
            }
        }
        return arrayToObject($arr);
    }
}
################################################################
################################################################
if( !function_exists('RemoveAcentos') ){
    function RemoveAcentos(string $text): string
    {
        if (!preg_match('/[\x80-\xff]/', $text) ){
            return $text;
        }

        $chars = [
            chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
            chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
            chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
            chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
            chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
            chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
            chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
            chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
            chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
            chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
            chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
            chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
            chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
            chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
            chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
            chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
            chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
            chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
            chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
            chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
            chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
            chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
            chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
            chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
            chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
            chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
            chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
            chr(195).chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
            chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
            chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
            chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
            chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
            chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
            chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
            chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
            chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
            chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
            chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
            chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
            chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
            chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
            chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
            chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
            chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
            chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
            chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
            chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
            chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
            chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
            chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
            chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
            chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
            chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
            chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
            chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
            chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
            chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
            chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
            chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
            chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
            chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
            chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
            chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
            chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
            chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
            chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
            chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
            chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
            chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
            chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
            chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
            chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
            chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
            chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
            chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
            chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
            chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
            chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
            chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
            chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
            chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
            chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
            chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
            chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
            chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
            chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
            chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
            chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
            chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
            chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
            chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
        ];

        return strtr($text, $chars);
    }
}
################################################################
################################################################
if( !function_exists('Encode') ){
    function Encode(?string $dado = null): string
    {
        if ($dado === null) {
            return '';
        }
        $privateKey = PRIVATE_KEY;
        $secretKey = SECRET_KEY;
        $encryptMethod = "AES-256-CBC";

        $key = hash('md5', $privateKey);
        $ivalue = substr(hash('md5', $secretKey), 0, 16);
        $result = openssl_encrypt($dado, $encryptMethod, $key, 0, $ivalue);
        return base64_encode($result);
    }
}
################################################################
################################################################
if( !function_exists('Decode') ){
    function Decode(?string $dado = null): string
    {
        if ($dado === null) {
            return '';
        }
        $privateKey = PRIVATE_KEY;
        $secretKey = SECRET_KEY;
        $encryptMethod = "AES-256-CBC";

        $key = hash('md5', $privateKey);
        $ivalue = substr(hash('md5', $secretKey), 0, 16);
        $result = openssl_decrypt(base64_decode($dado), $encryptMethod, $key, 0, $ivalue);
        return $result;
    }
}
################################################################
################################################################
if( !function_exists('array_search_multi') ){
    function array_search_multi(mixed $search_for, array $search_in){
        foreach ($search_in as $k => $element) {
            if (($element === $search_for) ){
                return 'k' . $k;
            } elseif (is_array($element) ){
                $result = array_search_multi($search_for, $element);
                if (!empty($result) ){
                    return 'k' . $k;
                }
            }
        }
        return false;
    }
}
################################################################
################################################################
if( !function_exists('ValidaFone') ){
    function ValidaFone($numero){
        return preg_match('/^(\([1-9][1-9]\) [7-9][0-9]{4}-[0-9]{4})|(\([1-9][1-9]\) [2-7][0-9]{3}-[0-9]{4})$/', $numero);
    }
}
################################################################
################################################################
if( !function_exists('CurrentURL') ){
    function CurrentURL($query = FALSE): string
    {
        $uri = Services::request()->getUri();
        $url = current_url();

        if (substr($url, -1) != '/') {
            $url = $url . '/';
        }
        if ($query === TRUE) {
            return !empty($uri->getQuery()) ? $url . '?' . $uri->getQuery() : $url;
        } else {
            return $url;
        }
    }
}
################################################################
################################################################
if( !function_exists('Formata') ){
    function Formata(string $termo): string
    {
        return str_replace(' ', '-', $termo);
    }
}
################################################################
################################################################
if( !function_exists('DetectOS') ){
    function DetectOS(): string
    {
        $userAgent = Services::request()->getUserAgent()->getAgentString();

        if (preg_match('/android|linux|windows|win32|win98|win95|win16|ubuntu/i', $userAgent) ){
            return 'webp';
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc|iphone|ipod|ipad|blackberry|webos/i', $userAgent) ){
            return 'jpg';
        } else {
            return 'jpg';
        }
    }
}
################################################################
################################################################
if( !function_exists('Keywords') ){
    function Keywords(string $texto): string
    {
        $texto = str_replace('.',' . ',$texto);
        $meta = [];
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
        $clean = preg_replace('/[^a-zA-Z\/_| -]/', '', $clean);
        $clean = strtolower(trim($clean));
        $words = explode(' ', $clean);

        $palavras = [
            'hr', 'hrs', 'rua', 'com', 'uma', 'um', 'uns', 'umas', 'seu', 'sua', 'seus', 'suas', 'no', 'na', 'nos', 'nas',
            'que', 'em', 'ha', 'do', 'da', 'de', 'dos', 'das', 'di', 'para', 'como', 'aqui', 'onde', 'assim', 'voce',
            'tanto', 'tambem', 'agora', 'busca', 'pagina', 'paginas', 'todo', 'toda', 'todos', 'todas','este','esta','esse','essa',
            'quem','ao','por','inclui','por','dois','bem','boa','os','as','ambos','es','disso','disto','ja','se','si',
            'sao','sempre','for','seja','mais','volta','temos','tenha','mesmo','alem','-'
        ];

        foreach ($words as $word) {
            if (strlen($word) >= 2 && !in_array($word, $palavras) ){
                $meta[] = $word;
            }
        }
        return implode(', ', array_unique($meta));
    }
}
################################################################
################################################################
if( !function_exists('CEP') ){
    function CEP(string $numero): ?string
    {
        $numero = Telefone($numero);
        if (!empty($numero) ){
            return substr($numero, 0, 5) . '-' . substr($numero, 5, 3);
        }
        return null;
    }
}
################################################################
################################################################
if( !function_exists('UriToAssoc') ){
    function UriToAssoc(mixed $segments, string $offset): mixed
    {
        $assoc_array = [];

        for ($i = $offset; $i < count($segments); $i += 2) {
            $key = $segments[$i];
            $value = isset($segments[$i + 1]) ? $segments[$i + 1] : false; // Handle missing values
            $assoc_array[$key] = $value;
        }
        return $assoc_array;
    }
}
################################################################
################################################################
if( !function_exists('FormataTelefone') ){
    function FormataTelefone(string $n): string
    {
        $tam = strlen(preg_replace("/[^0-9]/", "", $n));

        if ($tam == 13) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "(" . substr($n, $tam - 11, 2) . ") " . substr($n, $tam - 9, 5) . "-" . substr($n, -4);
        }
        if ($tam == 12) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "(" . substr($n, $tam - 10, 2) . ") " . substr($n, $tam - 8, 4) . "-" . substr($n, -4);
        }
        if ($tam == 11) {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return "(" . substr($n, 0, 2) . ") " . substr($n, 2, 5) . "-" . substr($n, 7, 11);
        }
        if ($tam == 10) {
            // COM CÓDIGO DE ÁREA NACIONAL
            return "(" . substr($n, 0, 2) . ") " . substr($n, 2, 4) . "-" . substr($n, 6, 10);
        }
        if ($tam <= 9) {
            // SEM CÓDIGO DE ÁREA
            return substr($n, 0, $tam - 4) . "-" . substr($n, -4);
        }
        return $n; // Return original if no format matches
    }
}
################################################################
################################################################
if( !function_exists('Foto') ){
    function Foto( string $imagem = NULL, string $tamanho = 'g', string $extensao = NULL): string
    {
        ################################
		################################
        if( empty($imagem) ){
            $imagem = base_url() . 'uploads/padrao.png';
        }
        ################################
		################################
        if( SearchStr($imagem, 'Front/img/house1.png') ){
            $imagem = base_url() . 'uploads/padrao.png';
        }
        ################################
		################################
        ## SE FOR LOCALHOST, NÂO PROCESSA AS FOTOS
        if( SearchStr(base_url(), 'localhost') ){
            //return $imagem;
            //exit;
        }
        ################################
		################################
        $urlParts = explode("/", $imagem);
        $original = end($urlParts);
        ################################
		################################
        if( count($urlParts) > 1 ){
            $acento = explode('?', $original);
            if( count($acento) > 0 ){
                $original = $acento[0];
            }
        }
        ################################
		################################
        $ext = pathinfo($original, PATHINFO_EXTENSION);
        ################################
		################################
        $arquivo = str_replace('.'.$ext, '', $original);
        ################################
		################################
        if( !empty($extensao) ){
            $ajustado = '.'.$extensao;
        }else{
            $ajustado = '.'.DetectOS();
        }
        ################################
		################################
        return base_url() . "fotos/" . $tamanho . "/" . URLizer($arquivo) . $ajustado . '?token=' . Encode($imagem);
        ################################
		################################
    }
}
################################################################
################################################################
if( !function_exists('Origem') ){
    function Origem(?string $tipo = null): ?string
    {
        $session = service('session');
        $sessorigem = $session->get('P3dr0m4RiaNo_origem');

        if (!empty($sessorigem) && in_array($sessorigem, ORIGEM) ){
            if (empty($tipo) ){
                return $sessorigem . '/';
            } elseif ($tipo == 'busca') {
                return 'origem/' . $sessorigem . '/';
            }
        }else{
            return null;
        }
    }
}
################################################################
################################################################
if( !function_exists('SetOrigem') ){
    function SetOrigem(?string $campo): string
    {
        return !empty($campo) ? $campo : 'organico';
    }
}
################################################################
################################################################
if( !function_exists('ConvertUTF') ){
    /**
     * Converts a string to UTF-8 Base64 encoded format for email headers.
     */
    function ConvertUTF(string $text): string
    {
        return '=?UTF-8?B?' . base64_encode($text) . '?=';
    }
}
################################################################
################################################################
if( !function_exists('Favorito') ){
    function Favorito(?string $codigo = null, string $modo = 'A', bool $classe = true): string
    {
        ################################
		################################
        $session = service('session');
        $sessao = $session->get('P3dr0m4RiaNo_favoritos');
        $imovel = $modo . '#' . $codigo;
        ################################
		################################
        $existe = false;
        if( is_array($sessao) ){
            $existe = search_in_array($imovel, $sessao, 'v');
        }
        ################################
		################################
		if( $classe == true ){
			if( !empty($existe) ){
				return ' ok';
			}else{
				return '';
			}
		}else{
			if( !empty($existe) ){
				return 'Remover Cod.: '.$codigo.' dos Favoritos';
			}else{
				return 'Adicionar Cod.: '.$codigo.' aos Favoritos';
			}
		}
		################################
		################################
    }
}
################################################################
################################################################
if( !function_exists('Campos') ){
    function Campos(string $texto): string
    {
        $termos = [
            '_' => ' ',
			'-' => ' ',
			'cnpj' => 'CNPJ',
			'cpf' => 'CPF',
			'rg' => 'RG',
			'cep' => 'CEP',
			'nascimento' => 'Data de Nascimento',
			'oRGao expedidor' => 'Órgão Expedidor',
			'data expedicao' => 'Data da Expedição',
			'oRGao' => 'Órgão',
			'caRGo' => 'Cargo',
			'empresa nome' => 'Nome Fantasia',
			'empresa cnpj' => 'CNPJ',
			'empresa razao social' => 'Razão Social',
			'agencia' => 'Agência',
			'bancaria' => 'Bancária',
			'referencia' => 'Referência',
			'profissao' => 'Profissão',
			'imovel' => 'Imóvel',
			'condominio' => 'Condomínio',
			'tensao eletrica' => 'Tensão Elétrica',
			'locacao' => 'Locação',
			'socio' => 'Sócio',
			'matricula' => 'Matrícula',
			'codigo' => 'Código',
			'relacao' => 'Relação',
			'iptu' => 'IPTU',
			'fgts' => 'FGTS',
			'caracteristicas' => 'Características',
			'infraestrutura' => 'Infraestrutura',
			'condicao' => 'Condição'
        ];

        return ucwords(str_replace(array_keys($termos), $termos, $texto));
    }
}
################################################################
################################################################
if( !function_exists('SetTermos') ){
    function SetTermos(mixed $campo): string
    {
        return !empty($campo) ? '1' : '0';
    }
}
################################################################
################################################################
if( !function_exists('compareASCII') ){
    function compareASCII(string $a, string $b): int
    {
        $at = iconv('UTF-8', 'ASCII//TRANSLIT', $a);
        $bt = iconv('UTF-8', 'ASCII//TRANSLIT', $b);
        return strcmp($at, $bt);
    }
}
################################################################
################################################################
if( !function_exists('ConvertCase') ){
    function ConvertCase(mixed $campo = NULL): string
    {
        $campo = preg_replace('/\s+/', ' ', $campo);
        $campo = mb_convert_case(trim($campo), MB_CASE_TITLE, "UTF-8");

        $subsA = [
            "/Rj"," Da ", " De ", " Di ", " Do ", " Du ", " Um ", " Uma ", " Das ", " Des ", " Dis ", " Dos ", " Dus ", " A ",
            " E ", " I ", " O ", " U ", " Uns ", "R ", "Pc ", "Tv Travessa ", "Est ", "Tv ", "Av ", "Av.", "Al ",
            "Teresopolis", "Petropolis", "Sao ", "Joao", "Jose", "Independencia", "Assuncao", "Gravatai", "Botanico",
            "Lindoia", "Chacara", "America", "Exposicao", "Gloria", "D'areia", "Da Areia", "D?Areia", "da Areia",
            "Sebastiao", "Tres", "Conceicao", "Antonio", "Sabara", " Ceu", "Beira-Mar", "Mario", "Protasio", "Sarandí",
            "Saude", "Familia", "Guaruja", "Humaita", "Higienopolis", "Goncalves", "Inacio", "Xii", "Xiii", "Getulio",
            "Icarai", "Aparicio", "Lg ", "Bc ", "Lrg ", "R. ", " Á ", " À ", " É ", " C/ ", " No ", " Na ",
            " Nos ", " Nas ", " Em ", " P/ ", " Para ", " P/", "Fte", "Fdos", "Wc", " C/", " C ", " Por ", "Servico", "24Hs", "24 Hs", "24 hs", "24hs",
            "Moveis", " Sem ", "Patio", "Pavilhao", "Pe Direito", "Suite", "Dormitorio", "Tabuao", "Ceramica", "Plantao",
            "Predio", "Ocupacao", " Ao ", " Aos ", "Vestiario", "Armario", "Galpao", "c/", "p/", "Terreo", "Máquina ",
            "Mm", "Cm", "Proprio ", "Propria ", "Consultorio", "Escritorio", " Ou ", "Convencoes", " Tv", "Sotao", " Com ", " Nao ",
            "Edificio", "Medio", "Deposito", "Dependencia", "Condominio", "Area ", "Dorm. ", "Apto. ", "Dorm ", "Posicao", "*",
            "Casa Comer.", "Casa Resid.", "Consultorio", "Jk", "Avenida Avenida", "Rua Rua", "Grp", "Grp-", "Grp - ", "Rodovia Rua", "Rua Sc", "Rua Sc-",
            "Xv ", " Ii", " IIi", " Xii", " Xiii", " Vii", " Viii", " Lii", " Liii", " Dii", " Diii", " Cii", " Ciii", " Mii", " Miii", "Passo d&Amp;#039;Areia",
            "Agua", "Pq.", "Pq", "Pauliista", "Resrva", "Res.", "Resid ", "Conj.", "Jd.", "Jd", "V.tupi", "Cristovao",
            "Capao","Crist.colombo","Tuyuty Trav","Vig José Inácio","Sen Salgado Filho","Crist. Colombo","Pça","Xv","Gen ","Cel. ","Germano P Júnior",
			"Viamao","Pres.franklin Roosevelt","Cel Lucas Oliveira","Dr ","XV Novembro","Prof ","Pcd",
			"Km"," Ers ","Rs-","Rs 0","Rs 1","Rs 2","Rs 3","Rs 4","Rs 5","Rs 6","Rs 7","Rs 8","Br-"," Br ","Br 0","Br 1","Br 2","Br 3","Br 4",
            "Sp-","Sp 0","Sp 1","Sp 2","Sp 3","Sp 4","Sp 5","Sp 6","Sp 7","Sp 8"
        ];
        $subsB = [
            "/RJ"," da ", " de ", " di ", " do ", " du ", " um ", " uma ", " das ", " des ", " dis ", " dos ", " dus ", " a ",
            " e ", " i ", " o ", " u ", " uns ", "Rua ", "Praça ", "Travessa ", "Estrada ", "Travessa ", "Avenida ", "Avenida", "Alameda ",
            "Teresópolis", "Petrópolis", "São ", "João", "José", "Independência", "Assunção", "Gravataí", "Botânico",
            "Lindóia", "Chácara", "América", "Exposição", "Glória", "da Areia", "da Areia", "da Areia", "da Areia",
            "Sebastião", "Três", "Conceição", "Antônio", "Sabará", " Céu", "Beira Mar", "Mário", "Protásio", "Sarandi",
            "Saúde", "Família", "Guarujá", "Humaitá", "Higienópolis", "Gonçalves", "Inácio", "XII", "XIII", "Getúlio",
            "Icaraí", "Aparício", "Largo ", "Beco ", "Largo ", "Rua ", " á ", " à ", " é ", " com ", " no ", " na ",
            " nos ", " nas ", " em ", " para ", " para ", " para ", "Frente", "Fundos", "WC", " com ", " com ", " por ", "Serviço", "24h", "24h", "24h", "24h",
            "Móveis", " sem ", "Pátio", "Pavilhão", "Pé Direito", "Suíte", "Dormitório", "Tabuão", "Cerâmica", "Plantão",
            "Prédio", "Ocupação", " ao ", " aos ", "Vestiário", "Armário", "Galpão", " com ", " para ", "Térreo", "Máquina ",
            "mm", "cm", "Próprio ", "Própria ", "Consultório", "Escritório", " ou ", "Convenções", " TV", "Sotão", " com ", " não ",
            "Edifício", "Médio", "Depósito", "Dependência", "Condomínio", "Área ", "Dormitório ", "Apartamento ", "Dormitório ", "Posição", "",
            "Casa Comercial", "Casa", "Consultório", "JK", "Avenida", "Rua", "GRP", "GRP-", "GRP-", "Rodovia", "Rodovia SC-", "Rodovia SC-",
            "XV ", " II", " III", " XII", " XIII", " VII", " VIII", " LII", " LIII", " DII", " DIII", " CII", " CIII", " MII", " MIII", "Passo da Areia",
            "Água", "Parque", "Parque", "Paulista", "Reserva", "Reserva", "Residencial ", "Conjunto", "Jardim", "Jardim", "Tupi", "Cristóvão",
            "Capão","Cristóvão Colombo","Travessa Tuyuty","Vigário José Inácio","Senador Salgado Filho","Cristóvão Colombo","Praça","XV","General ","Coronel ","Germano Petersen Júnior",
			"Viamão","Presidente Franklin Roosevelt","Coronel Lucas Oliveira","Doutor ","XV de Novembro","Professor ","PCD",
			"KM"," RS-","RS-","RS-0","RS-1","RS-2","RS-3","RS-4","RS-5","RS-6","RS-7","RS-8","BR-"," BR-","BR-0","BR-1","BR-2","BR-3","BR-4",
            "SP-","SP-0","SP-1","SP-2","SP-3","SP-4","SP-5","SP-6","SP-7","SP-8"
        ];

        $dado = str_replace($subsA,$subsB,$campo);
		$dado = preg_replace('/\s+/', ' ', $dado);
		$dado = trim($dado);
		$dado = rtrim($dado,',');
		$dado = ltrim($dado,',');
		$dado = rtrim($dado,'.');
		$dado = ltrim($dado,'.');
		$dado = trim($dado);

        return $dado;
    }
}
################################################################
################################################################
if( !function_exists('FormataNumero') ){
    function FormataNumero(string $valor): string
    {
        $replace = ['R$', 'm²', 'm³', ' ','.'];
        $ajustado = str_replace($replace, '', $valor);
        return str_replace(',', '.', $ajustado);
    }
}
################################################################
################################################################
if( !function_exists('Coordenadas') ){
    function Coordenadas(string $valor): string
    {
        $replace = ['R$', 'm²', 'm³', ' '];
        $ajustado = str_replace($replace, '', $valor);
        return str_replace(',', '.', $ajustado);
    }
}
################################################################
################################################################
if( !function_exists('SeparaDados') ){
    function SeparaDados(string $texto = NULL): mixed
    {
        $dado = explode('até',$texto);
        $dado[0] = trim($dado[0]);
        $dado[1] = trim($dado[1]);

        return $dado;
    }
}
################################################################
################################################################
if( !function_exists('EstadosBR') ){
    function EstadosBR(string $nome, string $tipo = 'sigla'){
        $estados = [
            'AC' => 'Acre',
			'AL' => 'Alagoas',
			'AP' => 'Amapá',
			'AM' => 'Amazonas',
			'BA' => 'Bahia',
			'CE' => 'Ceará',
			'DF' => 'Distrito Federal',
			'ES' => 'Espírito Santo',
			'GO' => 'Goiás',
			'MA' => 'Maranhão',
			'MT' => 'Mato Grosso',
			'MS' => 'Mato Grosso do Sul',
			'MG' => 'Minas Gerais',
			'PA' => 'Pará',
			'PB' => 'Paraíba',
			'PR' => 'Paraná',
			'PE' => 'Pernambuco',
			'PI' => 'Piauí',
			'RJ' => 'Rio de Janeiro',
			'RN' => 'Rio Grande do Norte',
			'RS' => 'Rio Grande do Sul',
			'RO' => 'Rondônia',
			'RR' => 'Roraima',
			'SC' => 'Santa Catarina',
			'SP' => 'São Paulo',
			'SE' => 'Sergipe',
			'TO' => 'Tocantins'
        ];

        if( $tipo == 'sigla' ){
            $key = search_in_array($nome, $estados, 'v');
            return $key !== false ? str_replace('k', '', $key) : false;
        } else {
            return $estados[$nome] ?? false;
        }
    }
}
################################################################
################################################################
if( !function_exists('Caracteristicas') ){
	function Caracteristicas($imo){

		$caracteristicas = array();
        $infraestruturas = array();

		if( !empty($imo->arcondicionado) ){
			array_push($caracteristicas,'Ar Condicionado');
		}
		if( !empty($imo->areaservico) ){
			array_push($caracteristicas,'Área de Serviço');
		}
		if( !empty($imo->armariobanheiro) ){
			array_push($caracteristicas,'Armário no Banheiro');
		}
		if( !empty($imo->armariocozinha) ){
			array_push($caracteristicas,'Armário na Cozinha');
		}
		if( !empty($imo->armarioquarto) ){
			array_push($caracteristicas,'Armário no Quarto');
		}
		if( !empty($imo->lavabo) ){
			array_push($caracteristicas,'Lavabo');
		}
		if( !empty($imo->alarme) ){
			array_push($caracteristicas,'Alarme');
		}
		if( !empty($imo->aquecedorgas) ){
			array_push($caracteristicas,'Aquecedor à Gás');
		}
		if( !empty($imo->aquecedoreletrico) ){
			array_push($caracteristicas,'Aquecedor Elétrico');
		}
		if( !empty($imo->aquecedorsolar) ){
			array_push($caracteristicas,'Aquecedor Solar');
		}
		if( !empty($imo->cercaeletrica) ){
			array_push($caracteristicas,'Cerca Elétrica');
		}
		if( !empty($imo->gascanalizado) ){
			array_push($infraestruturas,'Gás Canalizado');
		}
		if( !empty($imo->interfone) ){
			array_push($infraestruturas,'Interfone');
		}
		if( !empty($imo->jardim) ){
			array_push($caracteristicas,'Jardim');
		}
		if( !empty($imo->lavanderia) ){
			array_push($caracteristicas,'Lavanderia');
		}
		if( !empty($imo->portaoeletronico) ){
			array_push($caracteristicas,'Portão Eletrônico');
		}
		if( !empty($imo->portaria24horas) ){
			array_push($infraestruturas,'Portaria 24h');
		}
		if( !empty($imo->seguranca24horas) ){
			array_push($infraestruturas,'Segurança 24h');
		}
		if( !empty($imo->academia) ){
			array_push($infraestruturas,'Academia');
		}
		if( !empty($imo->churrasqueira) ){
			array_push($caracteristicas,'Churrasqueira');
		}
		if( !empty($imo->hidromassagem) ){
			array_push($caracteristicas,'Hidromassagem');
		}
		if( !empty($imo->homecinema) ){
			array_push($caracteristicas,'Home Cinema');
		}
		if( !empty($imo->piscina) ){
			array_push($infraestruturas,'Piscina');
		}
		if( !empty($imo->playground) ){
			array_push($infraestruturas,'Playground');
		}
		if( !empty($imo->quadraesportiva) ){
			array_push($infraestruturas,'Quadra Esportiva');
		}
		if( !empty($imo->quadratenis) ){
			array_push($infraestruturas,'Quadra de Tênis');
		}
		if( !empty($imo->salaofestas) ){
			array_push($infraestruturas,'Salão de Festas');
		}
		if( !empty($imo->salaojogos) ){
			array_push($infraestruturas,'Salão de Jogos');
		}
		if( !empty($imo->sauna) ){
			array_push($infraestruturas,'Sauna');
		}
		if( !empty($imo->wifi) ){
			array_push($infraestruturas,'Wifi');
		}
		if( !empty($imo->espacogourmet) ){
			array_push($infraestruturas,'Espaço Gourmet');
		}
		if( !empty($imo->quadrasquash) ){
			array_push($infraestruturas,'Quadra de Squash');
		}
		if( !empty($imo->lareira) ){
			array_push($caracteristicas,'Lareira');
		}
		if( !empty($imo->tvacabo) ){
			array_push($caracteristicas,'TV a Cabo');
		}
		if( !empty($imo->permiteanimais) ){
			array_push($infraestruturas,'Permite Animais');
		}
		if( !empty($imo->beachtenis) ){
			array_push($infraestruturas,'Quadra de Beach Tênis');
		}
		if( !empty($imo->salamassagem) ){
			array_push($infraestruturas,'Sala de Massagem');
		}
		if( !empty($imo->quintal) ){
			array_push($caracteristicas,'Quintal');
		}
		if( !empty($imo->gramado) ){
			array_push($caracteristicas,'Gramado');
		}
		if( !empty($imo->rouparia) ){
			array_push($infraestruturas,'Rouparia');
		}
		if( !empty($imo->closet) ){
			array_push($caracteristicas,'Closet');
		}
		if( !empty($imo->escritorio) ){
			array_push($caracteristicas,'Escritório');
		}
        if( !empty($imo->despensa) ){
			array_push($caracteristicas,'Despensa');
		}
		if( $imo->mobiliado == '1' ){
			array_push($caracteristicas,'Mobiliado');
		}
		if( $imo->vistamar == '1' ){
			array_push($caracteristicas,'Vista Mar');
		}
		if( $imo->vistamontanha == '1' ){
			array_push($caracteristicas,'Vista Montanha');
		}
		if( $imo->vistalago == '1' ){
			array_push($caracteristicas,'Vista Lago');
		}

        uasort($caracteristicas, 'compareASCII');
        uasort($infraestruturas, 'compareASCII');

		if( count($caracteristicas) > 0 || count($infraestruturas) > 0 ){
            $tags['caracteristicas'] = $caracteristicas;
            $tags['infraestruturas'] = $infraestruturas;
			return $tags;
		}else{
			return NULL;
		}
	}
}
################################################################
################################################################
if( !function_exists('JetImob') ){
    function JetImob(?array $post = null): void
    {
        /*
        ## Parametros
        $params = "";
        if (!empty($post['nome']) ){
            $params .= "full_name=" . urlencode($post['nome']) . "&";
        }
        if (!empty($post['email']) ){
            $params .= "email=" . urlencode($post['email']) . "&";
        }
        if (!empty($post['telefone']) ){
            $params .= "phone=" . urlencode("+55" . Telefone($post['telefone'])) . "&";
        }
        if (!empty($post['mensagem']) ){
            $params .= "message=" . urlencode($post['mensagem']) . "&";
        }
        if (!empty($post['codigo']) ){
            $params .= "property_code=" . urlencode($post['codigo']) . "&";
        }
        $params .= "source=site";

        $URL = "https://api.jetimob.com/leads/nzmVshM4B95xffW0kh9vox7xHaRqh7E5izHa5JDSx1T9UA2FA2gfWaaZ9NGiYrRl";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL . "?" . $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: multipart/form-data",
            "Authorization-Key: PwmdObuyN94UQQLRfwfuGzNwFtkvZg2rROaHvnfaFfhKJs86PnyidK6NUVTwBZT3"
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
        */
    }
}
################################################################
################################################################
if( !function_exists('AtualizaViews') ){
    function AtualizaViews(){
        $db  = \Config\Database::connect();
        $siteModel = new SiteModel();

        $siteModel->Truncate('tb_imoveis_cidades');
        $db->query('INSERT INTO tb_imoveis_cidades (cidade,cidade_slug,cidade_id,bairro,bairro_slug,bairro_id,uf,cidadetotal,bairrototal) SELECT cidade,cidade_slug,cidade_id,bairro,bairro_slug,bairro_id,uf,cidadetotal,bairrototal FROM view_cidades;');

        $siteModel->Truncate('tb_imoveis_tipos');
        $db->query('INSERT INTO tb_imoveis_tipos (categoria,singular,categoria_slug,categoria_id,tipo,imoveis) SELECT categoria,singular,categoria_slug,categoria_id,tipo,imoveis FROM view_tipos;');
    }
}
################################################################
################################################################
if( !function_exists('DeletePasta') ){
    function DeletePasta(string $pasta): bool
    {
        if (!is_dir($pasta) ){
            return false;
        }

        $files = array_diff(scandir($pasta), ['.', '..']);
        if ($files === false) {
            return false;
        }

        foreach ($files as $file) {
            $fullPath = $pasta . '/' . $file;
            if (is_dir($fullPath) ){
                DeletePasta($fullPath);
            } else {
                unlink($fullPath);
            }
        }
        return rmdir($pasta);
    }
}
################################################################
################################################################
if( !function_exists('DeleteArquivo') ){
    function DeleteArquivo(string $arquivo): bool
    {
        $fullPath = caminho_fisico() . $arquivo;
        if (is_file($fullPath) ){
            return unlink($fullPath);
        }
        return false;
    }
}
################################################################
################################################################
if( !function_exists('Plural') ){
    function Plural(string $texto): string
    {
        $map = [
            // Apartamentos / variações
            'Apartamento Garden'   => 'Apartamentos Garden',
            'Apartamento Duplex'   => 'Apartamentos Duplex',
            'Apartamento Triplex'  => 'Apartamentos Triplex',
            'Apartamento'          => 'Apartamentos',
            'Studio'               => 'Studios',
            'Kitnet'               => 'Kitnets',
            'Flat'                 => 'Flats',
            'Loft'                 => 'Lofts',
            'Cobertura'            => 'Coberturas',

            // Casas
            'Casa de Condomínio'   => 'Casas de Condomínio',
            'Casa em Condomínio'   => 'Casas em Condomínio',
            'Casa de Vila'         => 'Casas de Vila',
            'Casa Comercial'       => 'Casas Comerciais',
            'Casa'                 => 'Casas',
            'Sobrado'              => 'Sobrados',
            'Laje'                 => 'Lajes',

            // Terrenos / áreas rurais
            'Terreno'              => 'Terrenos',
            'Lote'                 => 'Lotes',
            'Área'                 => 'Áreas',
            'Chácara'              => 'Chácaras',
            'Sítio'                => 'Sítios',
            'Fazenda'              => 'Fazendas',

            // Comercial / corporativo
            'Sala Comercial'       => 'Salas Comerciais',
            'Conjunto Comercial'   => 'Conjuntos Comerciais',
            'Laje Corporativa'     => 'Lajes Corporativas',
            'Terreno Comercial'    => 'Terrenos Comerciais',
            'Ponto Comercial'      => 'Pontos Comerciais',
            'Ponto'                => 'Pontos',
            'Andar'                => 'Andares',
            'Loja'                 => 'Lojas',
            'Sala'                 => 'Salas',
            'Galpão'               => 'Galpões',
            'Depósito'             => 'Depósitos',
            'Armazém'              => 'Armazéns',
            'Prédio'               => 'Prédios',
            'Edifício'             => 'Edifícios',

            // Hospedagem
            'Hotel'                => 'Hotéis',
            'Pousada'              => 'Pousadas',

            // Garagem
            'Box de Garagem'       => 'Boxes de Garagem',
            'Vaga de Garagem'      => 'Vagas de Garagem',
            'Box'                  => 'Boxes',
            'Vaga'                 => 'Vagas',
            'Garagem'              => 'Garagens',
        ];

        uksort($map, static function (string $a, string $b): int {
            return mb_strlen($b) <=> mb_strlen($a);
        });

        $from = array_keys($map);
        $to   = array_values($map);

        return str_replace($from, $to, $texto);
    }
}
################################################################
################################################################
if( !function_exists('Redireciona') ){
    function Redireciona(string $uri = '', int $code = NULL){

        if( !empty($code) ){
            header('Location: '.$uri, TRUE, $code);
        }else{
            //header('Refresh:0;url='.$uri);
            header('Location: '.$uri);
        }
		exit;
    }
}
################################################################
################################################################
if( !function_exists('FotoDownload') ){
    function FotoDownload(string $foto, string $pasta): ?string
    {
        $urlParts = explode("/", $foto);
        $original = end($urlParts);

        if (count($urlParts) > 1) {
            $acento = explode('?', $original);
            if (count($acento) > 0) {
                $original = $acento[0];
            }
        }
        $arquivo = rtrim($pasta, '/') . '/' . $original;

        if (!is_file($arquivo) ){
            $lido = null;
            if (ini_get('allow_url_fopen') ){
                $lido = @file_get_contents($foto); // Use @ to suppress warnings
            } elseif (function_exists('curl_init') ){
                $ch = curl_init($foto);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_VERBOSE, false); // Set to false for production
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                curl_setopt($ch, CURLOPT_USERAGENT, Services::request()->getUserAgent()->getAgentString());
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Be cautious with this in production
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Be cautious with this in production
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language: pt-BR,pt;q=0.8',
                    'Accept-Encoding: gzip, deflate',
                    'Connection: keep-alive',
                    'Upgrade-Insecure-Requests: 1',
                ]);
                $lido = curl_exec($ch);
                curl_close($ch);
            }

            if (!empty($lido) ){
                if (file_put_contents($arquivo, $lido) !== false) {
                    return $arquivo;
                }
            }
            return null;
        } else {
            return $arquivo;
        }
    }
}
################################################################
################################################################
if( !function_exists('ImoviewImovel') ){
    function ImoviewImovel(?array $imo = null, ?array $dados = null){
        ################################
		################################
        $siteModel = new SiteModel();
        ################################
		################################
        $imovel = arrayToObject($imo);
        unset($reg);
        ################################
		################################
        $existe = $siteModel->getRegs('tb_imoveis', [
            'limit' => '1',
            'offset' => '0',
            'codigo' => ((!empty($imovel->codigoauxiliar))?$imovel->codigoauxiliar:$imovel->codigo),
            'referencia' => $imovel->codigo
        ])->getRow();
        ################################################################
		################################################################
        $reg['log'] = serialize($imo);
        $reg['status'] = '1';
        $reg['ordem'] = '01';
        $reg['data'] = date("Y-m-d H:i:s");
        $reg['atualizacao'] = DataConv($imovel->datahoraultimaalteracao,'FullBRtoBD');
        $reg['cadastro'] = DataConv($imovel->datahoracadastro,'FullBRtoBD');
        ################################
		################################
        $reg['codigo'] = ((!empty($imovel->codigoauxiliar))?$imovel->codigoauxiliar:$imovel->codigo);
        $reg['referencia'] = $imovel->codigo;
        $reg['tipo'] = SetNulo($imovel->codigotipo);
        $reg['categoria'] = SetNulo(ConvertCase($imovel->tipo));
        $reg['corretor'] = SetNulo($imo['captadores'][0]['codigo']);
        $reg['titulo'] = SetNulo(ConvertCase($imovel->titulo));
        $reg['descricao'] = SetNulo($imovel->descricao);
        ################################
		################################
        $reg['foto'] = SetNulo($imovel->urlfotoprincipal);
        $reg['video'] = SetNulo($imovel->urlvideo);
        $reg['tour'] = NULL;
        ################################
		################################
        $reg['endereco'] = SetNulo(ConvertCase($imovel->endereco));
        $reg['numero'] = SetNulo($imovel->numero);
        $reg['complemento'] = SetNulo($imovel->complemento);
        $reg['bairro'] = SetNulo(ConvertCase($imovel->bairro));
        $reg['bairrocomercial'] = $reg['bairro'];
        $reg['bairro_id'] = SetNulo($imovel->codigobairro);
        $reg['cidade'] = SetNulo(ConvertCase($imovel->cidade));
        $reg['cidade_id'] = SetNulo($imovel->codigocidade);
        $reg['uf'] = SetNulo($imovel->estado);
        $reg['cep'] = CEP($imovel->cep);
        $reg['longitude'] = (!empty($imovel->longitude) && !empty($imovel->latitude))?Coordenadas($imovel->longitude):NULL;
        $reg['latitude'] = (!empty($imovel->longitude) && !empty($imovel->latitude))?Coordenadas($imovel->latitude):NULL;
        ################################
		################################
        $reg['empreendimento'] = SetNulo(ConvertCase($imovel->nomecondominio));
        $reg['codigoempreendimento'] = SetNulo($imovel->codigocondominio);
        ################################
		################################
        $caracs = Caracteristicas($imovel);
        if( empty($caracs['caracteristicas']) ){
            $caracs['caracteristicas'] = [];
        }
        if( empty($caracs['infraestruturas']) ){
            $caracs['infraestruturas'] = [];
        }

        $reg['caracteristicas'] = SetNulo(implode(';', $caracs['caracteristicas']));
        $reg['infraestrutura'] = SetNulo(implode(';', $caracs['infraestruturas']));
        ################################
		################################
        $reg['dormitorios'] = SetNulo($imovel->numeroquartos);
        $reg['suites'] = SetNulo($imovel->numerosuites);
        $reg['vagas'] = SetNulo($imovel->numerovagas);
        $reg['salas'] = SetNulo($imovel->numerosalas);
        $reg['varandas'] = SetNulo($imovel->numerovarandas);
        $reg['banheiros'] = SetNulo($imovel->numerobanhos);
        $reg['totalbanheiros'] = SetNulo($imovel->numerobanhos);
        ################################
		################################
        $reg['areaprivativa'] = SetNulo(Coordenadas($imovel->areaprincipal));
        $reg['areatotal'] = SetNulo(Coordenadas($imovel->areainterna)+Coordenadas($imovel->areaexterna));
        $reg['areaterreno'] = SetNulo(Coordenadas($imovel->arealote));
        ################################
		################################
        $md = URLizer($imovel->finalidade);
        if( SearchStr($md, 'venda') && !SearchStr($md, 'aluguel') && !SearchStr($md, 'temporada') ){
            $reg['modo'] = 'V';
            $reg['valorvenda'] = SetNulo(FormataNumero($imovel->valor));
        }elseif( SearchStr($md, 'aluguel') && !SearchStr($md, 'venda') && !SearchStr($md, 'temporada') ){
            $reg['modo'] = 'A';
            $reg['valorlocacao'] = SetNulo(FormataNumero($imovel->valor));
        }elseif( SearchStr($md, 'aluguel') && SearchStr($md, 'venda') && !SearchStr($md, 'temporada') ){
            $reg['modo'] = 'VA';
            $reg['valorlocacao'] = SetNulo(FormataNumero($imovel->valor));
            $reg['valorvenda'] = SetNulo(FormataNumero($imovel->valor));
        }elseif( SearchStr($md, 'venda') && SearchStr($md, 'temporada') ){
            $reg['modo'] = 'VT';
            $reg['valorvenda'] = SetNulo(FormataNumero($imovel->valor));
            $reg['valortemporada'] = SetNulo(FormataNumero($imovel->valor));
        }elseif( !SearchStr($md, 'venda') && SearchStr($md, 'temporada') ){
            $reg['modo'] = 'T';
            $reg['valortemporada'] = SetNulo(FormataNumero($imovel->valor));
        }else{
            $reg['modo'] = 'AT';
            $reg['valortemporada'] = SetNulo(FormataNumero($imovel->valor));
            $reg['valorlocacao'] = SetNulo(FormataNumero($imovel->valor));
        }

        $reg['valorde'] = SetNulo(FormataNumero($imovel->valorminimo));
        $reg['valorate'] = SetNulo(FormataNumero($imovel->valormaximo));
        $reg['iptu'] = SetNulo(FormataNumero($imovel->valoriptu));
        $reg['condominio'] = SetNulo(FormataNumero($imovel->valorcondominio));
        ################################
		################################
        if( SearchStr(URLizer($imovel->destinacao), 'resid') ){
            $reg['finalidade'] = 'R';
        }elseif( SearchStr(URLizer($imovel->destinacao), 'comer') ){
            $reg['finalidade'] = 'C';
        }else{
            $reg['finalidade'] = 'R';
        }
        ################################
		################################
        if( !SearchStr(URLizer($imovel->destaque), 'simples') ){
            $reg['destaque'] = 'S';
            $reg['superdestaque'] = 'S';
        }else{
            $reg['destaque'] = 'N';
            $reg['superdestaque'] = 'N';
        }
        ################################
		################################
        $reg['lancamento'] = 'N';
        $reg['mobiliado'] = (!empty($imovel->mobiliado))?'S':'N';
        $reg['exclusivo'] = (!empty($imovel->exclusivo))?'S':'N';
        $reg['financiamento'] = (!empty($imovel->aceitafinanciamento))?'S':'N';
        $reg['permuta'] = (!empty($imovel->aceitapermuta))?'S':'N';
        $reg['planta'] = (!empty($imovel->naplanta))?'S':'N';
        ################################
		################################
        $reg['situacao'] = SetNulo(ConvertCase($imovel->situacao));
        $reg['ocupacao'] = NULL;
        $reg['entrega'] = NULL;
        ################################################################
		################################################################
        $idm = NULL;
        ################################
		################################
        if( !empty($existe->id) ){
            // ATUALIZA IMÓVEL
            $regWhere['id'] = $existe->id;
            $siteModel->Upd('tb_imoveis', $reg, $regWhere);
            $idm = $existe->id;
        }else{
            // CADASTRA IMÓVEL
            $idm = $siteModel->Add('tb_imoveis', $reg);
        }
        ################################################################
		################################################################
        // PROCESSAMENTO DE FOTOS DO IMÓVEL
        $if = 1;
        $kfoto = str_replace('k', '', array_search_multi($imovel->urlfotoprincipal, $imo['fotos']));

        if( $kfoto !== false ) {
            unset($imo['fotos'][$kfoto]);
        }
        ################################
		################################
        if( !empty($existe->id) ){
            $siteModel->DeleteAll('tb_imoveis_fotos', 'imovel', $existe->id);
            //$siteModel->DeleteAll('tb_imoveis_videos', 'imovel', $existe->id);
        }
        ################################
		################################
        if( count($imo['fotos']) > 0 ) {
            foreach( $imo['fotos'] as $f ){
                if( SearchStr($imovel->urlfotoprincipal, 'img/house1.png') && $if == '1' ){
                    $uregWhere['id'] = $idm;
                    $ureg['foto'] = $f['url'];
                    $siteModel->Upd('tb_imoveis', $ureg, $uregWhere);
                }else{
                    $foto = [
                        'imovel' => $idm,
                        'codigo' => $reg['codigo'],
                        'foto' => $f['url'],
                        'descricao' => SetNulo($f['descricao']),
                        'data' => date("Y-m-d H:i:s"),
                        'ordem' => $if,
                        'tipo' => 'I',
                        'download' => 'N'
                    ];
                    $siteModel->Add('tb_imoveis_fotos', $foto);
                }
                $if++;
            }
        }
        ################################################################
		################################################################
        // UPDATE NA CARGA DE IMÓVEIS
        if( !empty($idm) && !empty($imo['idbd']) ){
            $cargaWhere['id'] = $imo['idbd'];
            $cargaData['processado'] = date("Y-m-d H:i:s");
            $cargaData['status'] = '1';
            $siteModel->Upd('tb_imoveis_carga', $cargaData, $cargaWhere);
        }
        ################################################################
		################################################################
        $retorno = [];
        $retorno['id'] = $idm;
        $retorno['codigo'] = $reg['codigo'];
        $retorno['acao'] = (!empty($existe->id)) ? 'upd' : 'ins';

        return $retorno;
        ################################################################
		################################################################
    }
}
################################################################
################################################################
if( !function_exists('ImoviewCondominio') ){
    function ImoviewCondominio(?array $imo = null){
        ################################
		################################
        $siteModel = new SiteModel();
        ################################
		################################
        $imovel = arrayToObject($imo);
        unset($reg);
        ################################
		################################
        $existe = $siteModel->getRegs('tb_condominios', [
            'limit' => '1',
            'offset' => '0',
            'codigo' => $imovel->codigo
        ])->getRow();
        ################################################################
		################################################################
        $reg['log'] = serialize($imo);
        $reg['status'] = '1';
        $reg['ordem'] = '01';
        $reg['data'] = date("Y-m-d H:i:s");
        $reg['atualizacao'] = DataConv($imovel->datahoraultimaalteracao,'FullBRtoBD');
        $reg['cadastro'] = DataConv($imovel->datahoracadastro,'FullBRtoBD');
        ################################
		################################
        $reg['codigo'] = $imovel->codigo;
        $reg['tipo'] = SetNulo(ConvertCase($imovel->tipo));
        $reg['empreendimento'] = SetNulo(ConvertCase($imovel->nome));
        $reg['descricao'] = SetNulo($imovel->descricao);
        ################################
		################################
        $reg['foto'] = SetNulo($imovel->urlfotoprincipal);
        $reg['video'] = SetNulo($imovel->urlvideo);
        $reg['tour'] = NULL;
        ################################
		################################
        $reg['endereco'] = SetNulo(ConvertCase($imovel->endereco));
        $reg['numero'] = SetNulo($imovel->numero);
        $reg['bairro'] = SetNulo(ConvertCase($imovel->bairro));
        $reg['bairro_id'] = SetNulo($imovel->codigobairro);
        $reg['cidade'] = SetNulo(ConvertCase($imovel->cidade));
        $reg['cidade_id'] = SetNulo($imovel->codigocidade);
        $reg['uf'] = SetNulo($imovel->estado);
        $reg['cep'] = CEP($imovel->cep);
        $reg['longitude'] = (!empty($imovel->longitude) && !empty($imovel->latitude))?Coordenadas($imovel->longitude):NULL;
        $reg['latitude'] = (!empty($imovel->longitude) && !empty($imovel->latitude))?Coordenadas($imovel->latitude):NULL;
        ################################
		################################
        $caracs = Caracteristicas($imovel);
        if( empty($caracs['caracteristicas']) ){
            $caracs['caracteristicas'] = [];
        }
        if( empty($caracs['infraestruturas']) ){
            $caracs['infraestruturas'] = [];
        }

        $reg['caracteristicas'] = SetNulo(implode(';', $caracs['caracteristicas']));
        $reg['infraestrutura'] = SetNulo(implode(';', $caracs['infraestruturas']));
        ################################
		################################
        $dormitorios = SeparaDados($imovel->numeroquartos);
        $suites = SeparaDados($imovel->numerosuites);
        $vagas = SeparaDados($imovel->numerovagas);
        $banheiros = SeparaDados($imovel->numerobanhos);

        $reg['dormitorios'] = SetNulo($dormitorios[0]);
        $reg['dormitorios_ate'] = SetNulo($dormitorios[1]);
        $reg['suites'] = SetNulo($suites[0]);
        $reg['suites_ate'] = SetNulo($suites[1]);
        $reg['vagas'] = SetNulo($vagas[0]);
        $reg['vagas_ate'] = SetNulo($vagas[1]);
        $reg['banheiros'] = SetNulo($banheiros[0]);
        $reg['banheiros_ate'] = SetNulo($banheiros[1]);
        ################################
		################################
        $area = SeparaDados($imovel->areainterna);

        $reg['area'] = SetNulo(Coordenadas($area[0]));
        $reg['area_ate'] = SetNulo(Coordenadas($area[1]));
        ################################
		################################
        $valorlocacao = SeparaDados($imovel->valoraluguel);
        $valorvenda = SeparaDados($imovel->valorvenda);
        $condominio = SeparaDados($imovel->valorcondominio);

        $reg['valorvenda'] = SetNulo(FormataNumero($valorvenda[0]));
        $reg['valorvenda_ate'] = SetNulo(FormataNumero($valorvenda[1]));
        $reg['valorlocacao'] = SetNulo(FormataNumero($valorlocacao[0]));
        $reg['valorlocacao_ate'] = SetNulo(FormataNumero($valorlocacao[1]));
        $reg['condominio'] = SetNulo(FormataNumero($condominio[1]));
        ################################
		################################
        if( SearchStr(URLizer($imovel->destinacao), 'resid') ){
            $reg['finalidade'] = 'R';
        }elseif( SearchStr(URLizer($imovel->destinacao), 'comer') ){
            $reg['finalidade'] = 'C';
        }else{
            $reg['finalidade'] = 'R';
        }
        ################################
		################################
        /*
        if( !SearchStr(URLizer($imovel->destaque), 'simples') ){
            $reg['destaque'] = 'S';
            $reg['superdestaque'] = 'S';
        }else{
            $reg['destaque'] = 'N';
            $reg['superdestaque'] = 'N';
        }
        */
        $reg['destaque'] = 'N';
        $reg['superdestaque'] = 'N';
        ################################
		################################
        $reg['lancamento'] = 'N';
        $reg['exclusivo'] = (!empty($imovel->exclusivo))?'S':'N';
        $reg['planta'] = (!empty($imovel->naplanta))?'S':'N';
        ################################################################
		################################################################
        $idm = NULL;
        ################################
		################################
        if( !empty($existe->id) ){
            // ATUALIZA IMÓVEL
            $regWhere['id'] = $existe->id;
            $siteModel->Upd('tb_condominios', $reg, $regWhere);
            $idm = $existe->id;
        }else{
            // CADASTRA IMÓVEL
            $idm = $siteModel->Add('tb_condominios', $reg);
        }
        ################################################################
		################################################################
        // PROCESSAMENTO DE FOTOS DO IMÓVEL
        $if = 1;
        $kfoto = str_replace('k', '', array_search_multi($imovel->urlfotoprincipal, $imo['fotos']));

        if( $kfoto !== false ) {
            unset($imo['fotos'][$kfoto]);
        }
        ################################
		################################
        if( !empty($existe->id) ){
            $siteModel->DeleteAll('tb_condominios_fotos', 'imovel', $existe->id);
            //$siteModel->DeleteAll('tb_condominios_videos', 'imovel', $existe->id);
        }
        ################################
		################################
        if( count($imo['fotos']) > 0 ) {
            foreach( $imo['fotos'] as $f ){
                if( SearchStr($imovel->urlfotoprincipal, 'img/house1.png') && $if == '1' ){
                    $uregWhere['id'] = $idm;
                    $ureg['foto'] = $f['url'];
                    $siteModel->Upd('tb_condominios', $ureg, $uregWhere);
                }else{
                    $foto = [
                        'imovel' => $idm,
                        'codigo' => $reg['codigo'],
                        'foto' => $f['url'],
                        'descricao' => SetNulo($f['descricao']),
                        'data' => date("Y-m-d H:i:s"),
                        'ordem' => $if,
                        'tipo' => 'I',
                        'download' => 'N'
                    ];
                    $siteModel->Add('tb_condominios_fotos', $foto);
                }
                $if++;
            }
        }
        ################################################################
		################################################################
        $retorno = [];
        $retorno['id'] = $idm;
        $retorno['codigo'] = $reg['codigo'];
        $retorno['acao'] = (!empty($existe->id)) ? 'upd' : 'ins';

        return $retorno;
        ################################################################
		################################################################
    }
}
################################################################
################################################################
?>