<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class RegloLoader extends CI_Loader 
{
    
    public function template ($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('templates/publicHeader', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('templates/publicFooter', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
    
}
