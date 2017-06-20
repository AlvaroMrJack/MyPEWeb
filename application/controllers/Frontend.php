<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'conf');
		$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');
		$this->load->model('Redes_model', 'redes');
		$this->load->model('Team_model', 'team');
	}

	public function index()
	{

		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}

		$data['redes']=$this->redes->findAll();
		$data['equipo']=$this->team->findAll();


		$this->load->view('Master/base.php', $data);
	}

	public function categoria()
	{


		$data['config']=$this->conf->findAll();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key => $value) {
			$data['subCat'][$key->cat_id]=$this->cat->findByParent($key->cat_id);
		}
		//$data['product']=$this->prod->findByCatIdAct();
/*
		foreach ($data['product'] as $key => $value) {
			$data['multimedia'][$key->pro_id]=$this->mul->findByProId($key->pro_id);
		}
		$data['redes']=$this->redes->findAll();*/


		//$this->load->view('Frontend/catalogo', $data);







		$this->load->database();
		$this->load->model('Category_model', 'cat');
		$this->load->model('Config_model', 'conf');
		$this->load->model('Multimedia_model', 'mul');
		$this->load->model('Product_model', 'prod');
		$this->load->model('Redes_model', 'redes');

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
		$social_network=$this->redes->findAll();

		var_dump($social_network[0]);




	}

	public function sendMail(){

		$name = $_POST['namePost'];
		$email = $_POST['email'];
		$texto = $_POST['message'];
		$val = null;
		if ($name != '' && $email != '' && $texto != '') {
	        $val = 1;
	      }else{
	        $val = 0;
	      }
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
	      	$this->output->set_output(json_encode(array("msj" =>$val )));
		} else {
		    $this->output->set_content_type('application/json');
	      	$this->output->set_output(json_encode(array("msj" =>$val )));
		}

	}

}

/* End of file Frontend.php */
/* Location: ./application/controllers/Frontend.php */