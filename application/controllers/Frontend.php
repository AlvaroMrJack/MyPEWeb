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
		$this->load->model('Empresa_model', 'empresa');
	}

	public function index()
	{

		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();

		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}


		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}

		$data['redes']=$this->redes->findAll();
		$data['equipo']=$this->team->findAll();
		$data['business']=$this->empresa->findAll();


		$this->load->view('Master/base.php', $data);
	}

	public function categoria()
	{
		/*$catId = $_POST['catId'];

		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		$larg = count($this->cat->findAllParentActivados());

		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}

		$data['product']=$this->prod->findByCatIdAct($catId);
		if($data['product']!=false){
			foreach ($data['product'] as $key) {
				$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
			}
		}

		$this->output->set_content_type('application/json');
	    $this->output->set_output(json_encode(array("product" => $data )));*/
	}


	public function productos($idcat=0){
		$data['redes']=$this->redes->findAll();

		$carr=$this->cat->findAllActivados();
		$canti=count($carr);

		if($idcat!=0 && $canti>=$idcat){


		$data['config']=$this->conf->findAllActivados();;
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}

		$data['product']=$this->prod->findByCatIdAct($idcat);
		$cat=$this->cat->findById($idcat);
		$data['nombreCat']=$cat->get('cat_name');

		if($data['product']!=false){
		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}
}



		}else {
			
		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();

		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}


		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}

		}

		$this->load->view('Master/productos.php', $data);
	}


	public function detalle($id=0){

		$carr=$this->prod->findAllActivados();
		$canti=count($carr);

		if($id!=0 && $canti>=$id){

		$data['config']=$this->conf->findAllActivados();
		
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		


		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}


		$data['product']=$this->prod->findById($id);
$data['multimedia']=array();
			$data['multimedia']=$this->mul->findByProId($id);
		

		$data['redes']=$this->redes->findAll();		
		$this->load->view('Master/detalle.php',$data);

}else{

		$data['redes']=$this->redes->findAll();

		$carr=$this->cat->findAllActivados();
		$canti=count($carr);

		if($idcat!=0 && $canti>=$idcat){


		$data['config']=$this->conf->findAllActivados();;
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();
		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}

		$data['product']=$this->prod->findByCatIdAct($idcat);
		$cat=$this->cat->findById($idcat);
		$data['nombreCat']=$cat->get('cat_name');

		if($data['product']!=false){
		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}
}



		}else {
			
		$data['config']=$this->conf->findAllActivados();
		$data['categoryParent']=$this->cat->findAllParentActivados();
		$data['subCat']=array();

		foreach ($data['categoryParent'] as $key) {
			$data['subCat'][$key->get('cat_id')]=$this->cat->findByParent($key->get('cat_id'));
		}


		$data['product']=$this->prod->findAllActivados();

		foreach ($data['product'] as $key) {
			$data['multimedia'][$key->get('pro_id')]=$this->mul->findByProId($key->get('pro_id'));
		}

		}

		$this->load->view('Master/productos.php', $data);

	
}
	}
}



	/*public function sendMail(){

		$name = $_POST['namePost'];
		$email = $_POST['email'];
		$texto = $_POST['message'];
		$val = null;
		if ($name != '' && $email != '' && $texto != '') {
	        $val = 1;
	      }else{
	        $val = 0;
	      }
		$this->output->set_content_type('application/json');
	    $this->output->set_output(json_encode(array("msj" => $val )));
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

		$mail->Subject = $name;
		$mail->Body    = $message.'</b>';
		$mail->AltBody = $email;

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
	        $this->output->set_content_type('application/json');
	      	$this->output->set_output(json_encode(array("msj" =>0 )));
		} else {
		    $this->output->set_content_type('application/json');
	      	$this->output->set_output(json_encode(array("msj" =>1 )));
		}
	}
*/


/* End of file Frontend.php */
/* Location: ./application/controllers/Frontend.php */