<?php


class ArticleAjaxController extends RegloController 
{
    private $articleBusiness;
    private $numRec = 5;
    
    function __construct()
    {
        parent::__construct();
    }
    
    function init()
    {
        if ($this->articleBusiness == null)
        {
            $this->articleBusiness = new Business\ArticleBusiness($this->doctrine);
        }
    }

    function getArticle($articleID = null, $inclComments = false, $inclReviews = false, $pageNum = 1)
    {
        
        $this->init();
        
        $article = $this->articleBusiness->getArticleByID($articleID);
        
        //$data['test'] = APPPATH;
        //$this->load->template('ArticleMainView', $data);
        
        if (!$article->HasError)
        {
            $data['article'] = $article->Data;
            $data['articleMenu'] = $this->getArticleMenu($articleID);
            $this->load->view('ajax/Article', $data);
        }
    }
    
    function getArticleList($pageNum = 1)
    {
       
        $this->init();
        
        if ($pageNum > 1)
        {
            $start = ($pageNum -1) * $this->numRec;
        }
        else
        {
            $start = 0;
        }
        
        $articles = $this->articleBusiness->getAllArticles($start, $this->numRec);
        
        if (!$articles->HasError)
        {
            $data['articles'] = $articles->Data;
            $this->load->view('ajax/ArticleList', $data);
        }
        else
        {
            $data['errorMsg'] = "Error";
            $this->load->view('ajax/Error', $data);
        }
        
    }
    
    function getArticleMenu($articleID = null)
    {
        //TODO: mettre les droits en fonction de l'article et de l'usager.
        
        $data['articleID'] = $articleID;
        return $this->load->view('ajax/ArticleMenu', $data, true);
    }
    
    function addComment()
    {
        $articleID = $this->input->post("articleID");
        $commentText = $this->input->post("commentText");
        
        $this->init();
        $retValue = $this->articleBusiness->addComment($articleID, $commentText);
        
        return "cool";
    }
    
    function getArticleComments($articleID)
    {
        $this->init();
        
        $article = $this->articleBusiness->getArticleByID($articleID);
        
        
        if (!$article->HasError)
        {
            $data['comments'] = $article->Data->getComments();
            $this->load->view("ajax\ArticleCommentList", $data);
        }
    }
    
}
?>
