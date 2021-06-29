<?php
function mytheme_child_scripts(){
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('mytheme-child-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_style('mytheme-child-style', get_stylesheet_directory_uri().'/style.css');
	wp_enqueue_style('mytheme-child-style-casual', get_stylesheet_directory_uri().'/assets/css/style-casual.css');
	wp_register_script('mytheme-child-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');
	wp_register_script('mytheme-child-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
	wp_register_script('mytheme-child-bootstrapsj', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
	wp_enqueue_script('mytheme-child-jquery');	
	wp_enqueue_script('mytheme-child-popper');
	wp_enqueue_script('mytheme-child-bootstrapsj');
	wp_enqueue_script('mytheme-child-wizard', get_stylesheet_directory_uri().'/assets/js/wizard.js',array('mytheme-child-jquery'), '', true);
	wp_enqueue_script('mytheme-child-ajax-send-data', get_stylesheet_directory_uri().'/assets/js/ajax-send-data.js',array('mytheme-child-wizard'), '', true);
}
add_action('wp_enqueue_scripts', 'mytheme_child_scripts');

function ajax_variable(){
	$variable = array('ajax_url' => admin_url('admin-ajax.php'),
					'nonce' => wp_create_nonce('ajax-data-send-nonce'),
					'path' => get_stylesheet_directory_uri(),
					'action' => 'wizard_send');
	echo (
		'<script type="text/javascript">window.wp_data='.
		json_encode($variable).
		';</script>'
	);
}
add_action('wp_head', 'ajax_variable');

function wizard_send(){
	if (isset($_POST)) {
		$data = $_POST;		
		console.log($data);
	}


	check_ajax_referer('ajax-data-send-nonce', 'nonce');

	$name = "name is: ".$data['name'];
	$nonce = ' and nonce is: '.$data['nonce'];
	$return = [];

	if ($data['email'] === '' || $data['name']=== '' || 
		$data['phone'] === '' || $data['quantity']=== '' || 
		$data['price']=== '') {
		$return['success'] = 0;
		$return['message'] = 'fieldes are empty and  email not send';
	}else{
		$message .= "Email:";
		$message .= $data['email'];
		$message .= "\n\n" ;
		$message .= "Name:";
		$message .= $data['name'];
		$message .= "\n\n";
		$message .= "Phone:";
		$message .= $data['phone'];
		$message .= "\n\n";
		$message .= "Quantity:";
		$message .= $data['quantity'];
		$message .= "\n\n";
		$message .= "Price:";
		$message .= $data['price'];
		$message .= "\n\n";

		$return['success'] = 1;
		$return['message'] = $message;
	}


	wp_mail($data['email'], 'checking wizard', $message);

	
	echo json_encode($return); 

	wp_die();
}
add_action('wp_ajax_wizard_send', 'wizard_send');
add_action('wp_ajax_nopriv_wizard_send', 'wizard_send');

function wizard_shortcode($atts=[], $tag=''){
	$wizard_atts =shortcode_atts(
		array(
			'title' => 'Test work',
		), $atts, $tag);
	ob_start();
	get_template_part('wizart-page');
	return ob_get_clean();
}

function wizard_shortcode_init(){
	add_shortcode('r_test', 'wizard_shortcode');
}

add_action('init', 'wizard_shortcode_init');

?>