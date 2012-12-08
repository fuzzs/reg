<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Landing extends RegloController {

    public function index()
    {
        $data['pageTitle'] = "Reglo.net";
        $this->load->template('landingView', $data);
    }
}
