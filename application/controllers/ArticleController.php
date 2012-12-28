<?php

class ArticleController extends RegloController
{
    private $articleBusiness;
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->main();
    }
    
    public function main()
    {
        $this->articleBusiness = new Business\ArticleBusiness($this->doctrine);
        
        $data['pageTitle'] = "Reglo.net";
        
        $article = $this->articleBusiness->getArticleByID(1);
        
        $data['test'] = $article->Data->getContent();
        //$data['test'] = APPPATH;
        //$this->load->template('ArticleMainView', $data);
        
        $this->load->templateHeader('ArticleMainView', $data);
        $this->load->view('ArticleMainView', $data);
        $this->load->templateFooter('ArticleMainView', $data);
    }
}

?>
