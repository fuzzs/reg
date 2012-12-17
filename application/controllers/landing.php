<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Landing extends RegloController {

    public function index()
    {
        $data['pageTitle'] = "Reglo.net";
        
        $article = $this->em->find("Entities\Article", 1);
        
        $data['test'] = $article->getContent();
        //$data['test'] = APPPATH;
        $this->load->template('landingView', $data);
    }
}
