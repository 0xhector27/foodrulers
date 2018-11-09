<?php
class Lang_switcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function switch_language($language = 'english', $flag_icon = 'flag-icon-gb', $abbrev = 'EN') {

        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        $this->session->set_userdata('flag', $flag_icon);
        $this->session->set_userdata('abbrev', $abbrev);
        redirect($_SERVER['HTTP_REFERER']);
        
    }
}