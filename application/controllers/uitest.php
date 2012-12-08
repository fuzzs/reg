<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UiTest extends RegloController {

    public function test()
    {
        $this->load->template("UiTestView");
        
    }
}
?>
