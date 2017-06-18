<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_twig extends CI_Controller {

	public function index()
	{
		$loader = new Twig_Loader_Filesystem('application/views/Frontend');
		$twig = new Twig_Environment($loader, []);

		/*VARIABLES*/
		$logo = "nombre empresa";
		$who = "extraño";
		$header_text_h2 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum lorem risus, nec suscipit lorem laoreet quis.";

		$ico0 = "mdi-image-flash-on";
		$ico1 = "mdi-social-group";
		$ico2 = "mdi-hardware-desktop-windows";

		$icons_Caption = array(
			'ico0' => $ico0,
			'ico1' => $ico1,
			'ico2' => $ico2
			 );

		$categories_navbar = array(
			'inicio',
			'productos',
			'team',
			'contacto'
			);

		$promo_caption0 = "Speeds up development";
		$promo_caption1 = "User Experience Focused";
		$promo_caption2 = "Fully responsive";

		$promo_captions = array(
			'promo_caption0' => $promo_caption0,
			'promo_caption1' => $promo_caption1,
			'promo_caption2' => $promo_caption2
			);

		$social_network = array(
			'facebook',
			'youtube',
			'instagram'
			);

		$web_site = array(
			'www.facebook.com',
			'www.youtube.com',
			'www.instagram.com'
			);
		 $action = "controlador_correo";

		/*VISTA HEADER*/
		$styles = array(
			'plugin_H'  => base_url('resources/min/plugin-min.css'),
			'custom_H'  => base_url('resources/min/custom-min.css'),
			'pnotify_H' => base_url('resources/js/pnotify.custom.min.css'),
			'style_H'   => base_url('resources/css/style.css')
			);

		/*VISTA SCRIPT*/
		$scripts = array(
			'plugin_S'  => base_url('resources/min/plugin-min.js'),
			'custom_S'  => base_url('resources/min/custom-min.js'),
			'pnotify_S' => base_url('resources/js/pnotify.custom.min.js')
			);

		echo $twig->render('header.twig', compact('styles'));
		echo $twig->render('body.twig', compact('logo','categories_navbar','header_text_h2','icons_Caption','promo_captions'));
		echo $twig->render('footer.twig', compact('social_network','action'));
		echo $twig->render('script.twig', compact('scripts'));
	}

}

/* End of file Frontend_twig.php */
/* Location: ./application/controllers/Frontend_twig.php */