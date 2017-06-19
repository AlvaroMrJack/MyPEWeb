<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_twig extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'conf');
		$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');
		$this->load->model('Redes_model', 'redes');
	}

	public function index()
	{
		$loader = new Twig_Loader_Filesystem('application/views/Frontend');/*hace referencia a donde estan las vistas*/
		$twig = new Twig_Environment($loader, []);

		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key => $value) {
			$data['multimedia'][$key->pro_id]=$this->mul->findByProId($key->pro_id);
		}


		/*BODY.NAVBAR*/
		$logo = "nombre empresa";/*NOBRE ESCRITO SOLAMENTE SIN LOGO*//*CON_NOMBREFANTASIA*/
		$navbarColor = "blue accent-2";/*GAMA DE COLORES DE MATERIALIZECSS SIN HEXADECIMAL*//*CON_NAVBAR*/
		$colorNavbar = "ffffff";/*HEXADECIMAL SIN SIGNO #*//*CON_FONTCOLOR*/
		$colorLogo   = "ffffff";/*HEXADECIMAL SIN SIGNO #*//*CON_LOGOCOLOR*/
		$categories_navbar = array('inicio','productos','team','contacto');
		/*BODY.NAVBAR*/

		/*BODY.INDEX-BANNER*/
		$indexBanner = "2196f3";/*HEXADECIMAL SIN SIGNO #*/
		/*BODY.INDEX-BANNER*/

		/*BODY.HEADER_TEXT_H2*/
		$header_text_h2 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum lorem risus, nec suscipit lorem laoreet quis.";/*CON_TEXTCAPTION*/
		/*BODY.HEADER_TEXT_H2*/

		/*BODY.PROMO_EXAMPLE*/
		$ico0 = "mdi-image-flash-on";
		$ico1 = "mdi-social-group";
		$ico2 = "mdi-hardware-desktop-windows";
		$icons_Caption = array(
			'ico0' => $ico0,
			'ico1' => $ico1,
			'ico2' => $ico2
			 );/*NEW_ICONS*/
		$colorIcon = "c6ff00";/*NEW_ICONCOLOR*/

		$promo_caption0 = "Speeds up development";
		$promo_caption1 = "User Experience Focused";
		$promo_caption2 = "Fully responsive";

		$promo_captions = array(
			'promo_caption0' => $promo_caption0,
			'promo_caption1' => $promo_caption1,
			'promo_caption2' => $promo_caption2
			);/*NEW_SUBJECT*/
		$text_caption = array(
			'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore sunt sapiente laborum nemo, possimus consectetur numquam perferendis ipsum hic autem ratione quod placeat facere aliquid quaerat corporis, incidunt, inventore, doloribus.'/*NEW_TEXT*/
			);
		/*BODY.PROMO_EXAMPLE*/

		/*BODY.PRODUCT_HEADER*/
		$product_header = array('content_p_h' => "productos", "color_p_h" => "2196f3" );/*HEXADECIMAL SIN SIGNO #*//*CON_TITLESCOLOR*/
		/*BODY.PRODUCT_HEADER*/

		/*FOOTER*/
		$footer_color_principal = "cyan darken-1";/*GAMA DE COLORES DE MATERIALIZECSS SIN HEXADECIMAL*//*CON_FOOTER*/
		$footer_color_end = "light-blue darken-4";/*GAMA DE COLORES DE MATERIALIZECSS SIN HEXADECIMAL*//*CON_FOOTER2*/
		/*FOOTER*/

		/*FOOTER.SOCIAL_NETWORK*/
		$social_network = array();
		$social_network[] = $this->redes->findAll();

		$social = array(
			'facebook',
			'youtube',
			'instagram'
			);

		$web_site = array(
			'www.facebook.com',
			'www.youtube.com',
			'www.instagram.com'
			);
		$mailfont_color = "white";/*COLORES PRIMARIOS Y SECUNDARIOS EN INGLES*//*CON_FOOTERFONTMAIL_COLOR*/
		$mailicon_color = "red";/*COLORES PRIMARIOS Y SECUNDARIOS EN INGLES*//*CON_FOOTERICONMAIL_COLOR*/
		/*FOOTER.SOCIAL_NETWORK*/

		/*HEADER*/
		$styles = array(
			'plugin_H'  => base_url('resources/min/plugin-min.css'),
			'custom_H'  => base_url('resources/min/custom-min.css'),
			'pnotify_H' => base_url('resources/js/pnotify.custom.min.css'),
			'style_H'   => base_url('resources/css/style.css')
			);
		/*HEADER*/

		/*SCRIPT*/
		$scripts = array(
			'plugin_S'  => base_url('resources/min/plugin-min.js'),
			'custom_S'  => base_url('resources/min/custom-min.js'),
			'pnotify_S' => base_url('resources/js/pnotify.custom.min.js')
			);
		/*SCRIPT*/


		echo $twig->render('header.twig', compact('styles'));
		echo $twig->render('body.twig', compact('colorNavbar','colorLogo','navbarColor','logo','categories_navbar','indexBanner','header_text_h2','icons_Caption','colorIcon','promo_captions','text_caption','product_header'));
		echo $twig->render('footer.twig', array('rrss' => $social ,'footer_color' => $footer_color_principal,'footer_color_end' => $navbarColor,'mailfont_color' => $mailfont_color,'mailicon_color' => $mailicon_color));

		echo $twig->render('script.twig', compact('scripts'));
	}

	public function sendMail(){

		$validarEnvio = $_POST['name'];

		if ($validarEnvio == 'alvaro') {
	        $val = 0;
	      }else{
	        $val = 1;
	      }
	      $this->output->set_content_type('application/json');
	      $this->output->set_output(json_encode(array("msj" =>$val )));
		/*
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'user@example.com';                 // SMTP username
		$mail->Password = 'secret';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('from@example.com', 'Mailer');
		$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
		$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		    $this->output->set_content_type('application/json');
 			$this->output->set_output(json_encode(array("msj"=>0)));
		} else {
		    $this->output->set_content_type('application/json');
 			$this->output->set_output(json_encode(array("msj"=>1)));
		}*/


	}

}

/* End of file Frontend_twig.php */
/* Location: ./application/controllers/Frontend_twig.php */