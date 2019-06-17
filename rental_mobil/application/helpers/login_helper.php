<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('admin');
    if (!isset($user)) { return false; } else { return true; }
}