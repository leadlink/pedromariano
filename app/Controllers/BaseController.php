<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\SiteModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['principal', 'busca'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;
    protected $dados;
    protected $SiteModel;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger){
        #######################################################
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        #######################################################
        // Preload any models, libraries, etc, here.
        #######################################################
        #######################################################
        $this->session = service('session');
        $this->uri = service('uri');
        $this->SiteModel = new SiteModel();
        $this->session->set('session_id',session_id());
        $this->session->set('usuario',serialize(getUserIP()));
        $config = $this->SiteModel->getRegistro('tb_config', 'id', '1');
        $this->sitenome = $config->titulo;
        $this->dados = [
            'SiteModel' => $this->SiteModel,
            'config' => $config,
            'enderecos' => $this->SiteModel->getRegistros('tb_config','id', 'asc'),
            'robots' => ROBOTS
        ];
        #######################################################
        #######################################################
    }
}
