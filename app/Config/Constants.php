<?php

##########################################################
##########################################################
define('REFERENCIA', 'frprime');
define('CIDADE','Volta Redonda');
define('DOMINIO','frprime.leadlink.com.br');
define('ORIGEM',array('facebook','google','instagram','insta','youtube','linkedin','meta','googleinst','organico'));
define('TIMEOUT','10');
define('ADMLIMITE','100');
define('LIMITE','12');
define('ROBOTS','noindex,nofollow');
##########################################################
##########################################################
// KEYS PARA FUNCTION DE ENCODE E DECODE
define('PRIVATE_KEY',md5(DOMINIO));
define('SECRET_KEY',md5('Lead Link Site para Imobiliárias'));
##########################################################
##########################################################
// VALORES DE SELECTS
define('VALORDE',array(
	'locacao' => array('500','1000','1500','2000','2500','3000','3500','4000','5000','8000','10000'),
	'venda' => array('100000','200000','300000','400000','500000','750000','1000000','1500000','2000000','3000000','5000000','8000000','10000000')
));
define('VALORATE',array(
	'locacao' => array('500','1000','1500','2000','2500','3000','3500','4000','5000','8000','10000','M10000'),
	'venda' => array('200000','300000','400000','500000','750000','1000000','1500000','2000000','3000000','5000000','8000000','10000000','M10000000')
));
##########################################################
##########################################################
/*
|--------------------------------------------------------------------------
| Dados de SMTP para Envio de E-mails
|--------------------------------------------------------------------------
*/
define('SMTP_URL','smtpi.uni5.net');
define('SMTP_PORTA','587');
define('SMTP_EMAIL','naoresponda@leadlink.com.br');
define('SMTP_SENHA','L34D&L1nK');
define('SMTP_SEGURANCA','tls');
##########################################################
##########################################################


/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2_592_000);
defined('YEAR')   || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code
