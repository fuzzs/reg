<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UiTest extends CI_Controller {

    public function test()
    {
        $this->load->view("UiTestView");
        
    }
}
?>
