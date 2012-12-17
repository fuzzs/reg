<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once APPPATH.'models\Entities\Article.php';

class RegloController extends CI_Controller 
{
    protected $em;
    
    function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
   
}