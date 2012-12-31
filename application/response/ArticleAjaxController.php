<?php

require_once APPPATH.'/controllers/ArticleController.php';

/**
 * 
 */
class ArticleAjaxController extends ArticleController 
{
    /* @var $articleBusiness Business\ArticleBusiness */
    //private $articleBusiness;

    
    function __construct()
    {
        parent::__construct();
    }
   
    public function getArticle($articleID = null, $inclComments = false, $inclReviews = false, $pageNum = 1)
    {
        $ret = new \Business\RegloTransport();
        $ret = $this->getArticleBase($articleID, $inclComments, $inclReviews, $pageNum);
        
        if ($ret->HasError)
        {
            $this->load->view('ajax/Error', $ret->Data);
        }
        else
        {
            $this->load->view('ajax/Article', $ret->Data);
        }
            
    }
    
    
    public function getArticleList($pageNum = 1)
    {
        $ret = new \Business\RegloTransport();
        $ret = $this->getArticleListBase($pageNum);
        
        if ($ret->HasError)
        {
            $this->load->view('ajax/Error', $ret->Data);
        }
        else
        {  
            $this->load->view('ajax/ArticleList', $ret->Data);
        }
        
    }
      
    public function getArticleComments($articleID)
    {
        $ret = new \Business\RegloTransport();
        $ret = $this->getArticleCommentsBase($articleID);
        
        if ($ret->HasError)
        {
            $this->load->view("ajax\Error", $ret->Data);
        }
        else
        {
            $this->load->view("ajax\ArticleCommentList", $ret->Data);
        }
    }
    
    public function getEditArticleForm()
    {
        $ret = $this->getEditArticleFormBase();
        $this->load->view("ajax\ArticleEdit", $ret->Data);
    }
        
}
?>
