<?php
#############################################
#############################################
namespace App\Libraries;
#############################################
#############################################
## Classe para Paginação
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
class Paginacao{

    public $uri = '';
    public $base_url = '';
    public $ajax = 0;
    public $total_rows = '';
    public $per_page = 10;
    public $num_links = 6;
    public $cur_page = 0;
    public $first_link = '&lsaquo; First';
    public $next_link = 'Próximo';
    public $prev_link = 'Anterior';
    public $last_link = 'Last &rsaquo;';
    public $uri_segment = 3;
    public $full_tag_open = '';
    public $full_tag_close = '';
    public $first_tag_open = '';
    public $first_tag_close = '&nbsp;';
    public $last_tag_open = '&nbsp;';
    public $last_tag_close = '';
    public $cur_tag_open = '&nbsp;<strong>';
    public $cur_tag_close = '</strong>';
    public $next_tag_open = '&nbsp;';
    public $next_tag_close = '&nbsp;';
    public $prev_tag_open = '&nbsp;';
    public $prev_tag_close = '';
    public $num_tag_open = '&nbsp;';
    public $num_tag_close = '';
    public $page_query_string = FALSE;
    public $query_string_segment = 'per_page';
    public $url_complement = '';

    public function __construct(array $params = []){
        if( !empty($params) ){
            foreach( $params as $key => $val ){
                if( property_exists($this, $key) ){
                    $this->$key = $val;
                }
            }
        }
    }

    function create_links(){
        // If our item count or per-page total is zero there is no need to continue.
        if ($this->total_rows == 0 || $this->per_page == 0) {
            return '';
        }

        // Calculate the total number of pages
        $num_pages = ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        if ($num_pages == 1) {
            return '';
        }


        if ($this->uri->getSegment($this->uri_segment) != 0) {
            $this->cur_page = $this->uri->getSegment($this->uri_segment);

            // Prep the current page - no funny business!
            $this->cur_page = (int) $this->cur_page;

        }

		$this->num_links = (int) $this->num_links;

		if ($this->num_links < 1) {
            show_error('Your number of links must be a positive number.');
        }

        if (!is_numeric($this->cur_page)) {
            $this->cur_page = 1;
        }

		// Is the page number beyond the result range?
        // If so we show the last page
        if ($this->cur_page > ceil($this->total_rows/$this->per_page) ) {
            $this->cur_page = ($num_pages - 1);
        }

		$uri_page_number = $this->cur_page;
        //$this->cur_page = floor(($this->cur_page / $this->per_page) + 1);

		// Calculate the start and end numbers. These determine
        // which number to start and end the digit links with
        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links) : 1;
        $end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        if ($this->page_query_string === TRUE) {
            $this->base_url = rtrim($this->base_url) . '&amp;' . $this->query_string_segment . '=';
        } else {
            $this->base_url = rtrim($this->base_url, '/') . '/';
        }

        // And here we go...
        $output = '';

		$output .= '<ul>'.PHP_EOL;

        // Render the "previous" link
        if ($this->cur_page != 1) {
            $i = $uri_page_number - 1;
            //  if ($i == 0) $i = '';
            $output .= '<li class="prev"><a href="' . $this->base_url . '/' . $this->url_complement .'/'. $i .'/" title="'.$this->prev_link.'" class="paginas" data-page="'. $i .'"><svg width="13" height="13" viewBox="0 0 192 144" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M31.9851 80.5957L85.0583 132.119L73.6524 143.894L2.81859e-07 72.3941L73.6524 0.894293L85.0583 12.6695L31.9851 64.1926L192 64.1926L192 80.5956L31.9851 80.5957Z" fill="black"/></svg></a></li>'.PHP_EOL;
        }

        // Write the digit links
        for ($loop = $start; $loop <= $end; $loop++) {
            //$i = ($loop * $this->per_page);
			$i = $loop;

            if ($i >= 0) {
                if ($this->cur_page == $loop) {
                    $output .= '<li><a href="' . $this->base_url . '/' .$this->url_complement. '/'. $loop . '/" title="Página '.$loop.'" class="paginas ativo" data-page="atual">'.$loop.'</a></li>'.PHP_EOL; // Current page
                } else {
                    //$n = ($i == 0) ? '' : $i;
                    $output .= '<li><a href="' . $this->base_url . '/' .$this->url_complement. '/'. $loop . '/" title="Página '.$loop.'" class="paginas" data-page="'. $loop .'">'.$loop.'</a></li>'.PHP_EOL;
                }
            }
        }


        // Render the "next" link
        if ($this->cur_page < $num_pages) {
			$i = $this->cur_page + 1;
            $output .= '<li class="next"><a href="' . $this->base_url . '/' .$this->url_complement. '/'. $i . '/" title="'.$this->next_link.'" class="paginas" data-page="'. $i .'"><svg width="13" height="13" viewBox="0 0 192 144" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M160.015 64.1929L106.942 12.67L118.348 0.894287L192 72.3945L118.348 143.894L106.942 132.119L160.015 80.596H0V64.1929H160.015Z" fill="black"/></svg></a></li>'.PHP_EOL;
        }

		$output .= '</ul>'.PHP_EOL;

        $output = preg_replace("#([^:])//+#", "\\1/", $output);

        return $output;
    }

    function create_links_admin(){
        // If our item count or per-page total is zero there is no need to continue.
        if ($this->total_rows == 0 OR $this->per_page == 0) {
            return '';
        }

        // Calculate the total number of pages
        $num_pages = ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        if ($num_pages == 1) {
            return '';
        }

        // Determine the current page number.
        $CI = & get_instance();

        if ($this->page_query_string === TRUE) {
            if ($CI->input->get($this->query_string_segment) != 0) {
                $this->cur_page = $CI->input->get($this->query_string_segment);

                // Prep the current page - no funny business!
                $this->cur_page = (int) $this->cur_page;
            }
        } else {
            if ($this->uri->getSegment($this->uri_segment) != 0) {
                $this->cur_page = $this->uri->getSegment($this->uri_segment);

                // Prep the current page - no funny business!
                $this->cur_page = (int) $this->cur_page;
            }
        }

        $this->num_links = (int) $this->num_links;

        if ($this->num_links < 1) {
            show_error('Your number of links must be a positive number.');
        }

        if (!is_numeric($this->cur_page)) {
            $this->cur_page = 0;
        }

        if ($this->cur_page > $this->total_rows) {
            $this->cur_page = ($num_pages - 1) * $this->per_page;
        }

        $uri_page_number = $this->cur_page;
        $this->cur_page = floor(($this->cur_page / $this->per_page) + 1);

        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        if ($this->page_query_string === TRUE) {
            $this->base_url = rtrim($this->base_url) . '&amp;' . $this->query_string_segment . '=';
        } else {
            $this->base_url = rtrim($this->base_url, '/') . '/';
        }

        // And here we go...
        $output = '<div class="pagination"><ul>';

        // Render the "previous" link
        if ($this->cur_page != 1) {
            $i = $uri_page_number - $this->per_page;
            //	if ($i == 0) $i = '';
            $output .= '<li><a href="' . $this->base_url . $i . '/' . $this->url_complement . '" class="previous_page">' . $this->prev_link . '</a></li>';
        }

        // Write the digit links
        for ($loop = $start - 1; $loop <= $end; $loop++) {
            $i = ($loop * $this->per_page) - $this->per_page;

            if ($i >= 0) {
                if ($this->cur_page == $loop) {
                    $output .= '<li><a href="javascript:void(0);" class="active">'.$loop.'</a></li>'; // Current page
                } else {
                    //$n = ($i == 0) ? '' : $i;
                    $output .= '<li><a href="' . $this->base_url . $i . '/' . $this->url_complement . '">'.$loop.'</a></li>';
                }
            }
        }

        // Render the "next" link
        if ($this->cur_page < $num_pages) {
            $output .= '<li><a href="' . $this->base_url . ($this->cur_page * $this->per_page) . '/' . $this->url_complement . '" class="next_pages">' . $this->next_link . '</a></li>';
        }

        $output .= '</ul></div>';

        $output = preg_replace("#([^:])//+#", "\\1/", $output);

        return $output . '</ul>';
    }

}
