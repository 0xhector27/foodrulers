<?php
class Language_loader
{
	function initialize(){
		$ci =& get_instance();
		$ci->load->helper('language');

		$site_lang = $ci->session->userdata('site_lang');
		if($site_lang){
			$ci->lang->load(array('login','menu','content','dashboard'), $ci->session->userdata('site_lang'));
		}
		else {
			$ci->lang->load(array('login','menu','content','dashboard'),'english');
		}
	}
}
