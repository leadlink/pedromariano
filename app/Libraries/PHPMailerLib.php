<?php
#############################################
#############################################
namespace App\Libraries;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
#############################################
#############################################
## PHPMailer Class para CodeIgniter 4
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

class PHPMailerLib{
	public function __construct()
	{
		// Load PHPMailer classes
		require_once APPPATH . 'Libraries/PHPMailer/src/Exception.php';
		require_once APPPATH . 'Libraries/PHPMailer/src/PHPMailer.php';
		require_once APPPATH . 'Libraries/PHPMailer/src/SMTP.php';
	}

	public function load()
	{
		return new PHPMailer(true);
	}
}
?>