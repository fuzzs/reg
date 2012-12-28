<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class RegloLoader extends CI_Loader 
{
    private $contentHeader;
    private $contentFooter;
    
    private $isHeaderInitialized;
    private $isFooterInitialized;
    
    public function template ($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->templateHeader('templates/publicHeader', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->templateFooter('templates/publicFooter', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
    
    public function templateHeader($template_name, $vars = array(), $return = FALSE)
    {
        $this->contentHeader  = $this->view('templates/publicHeader', $vars, $return);
        $this->isHeaderInitialized = true;
        if ($return)
        {
             $this->contentHeader;
        }
    }
    
    public function templateFooter($template_name, $vars = array(), $return = FALSE)
    {
        $this->contentFooter  = $this->view('templates/publicFooter', $vars, $return);
        $this->isFooterInitialized = true;
        if ($return)
        {
             $this->contentFooter;
        }
    }
    
}
