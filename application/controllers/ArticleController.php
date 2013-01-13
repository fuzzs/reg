<?php
/**
 * Main page for the website.
 * @author fuzzes
 */
class ArticleController extends RegloController
{
    /* @var $articleBusiness Business\ArticleBusiness */
    protected $articleBusiness;
    /* @var $numRec integer */
    protected $numRec = 30;
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    protected function init()
    {
        if ($this->articleBusiness == null)
        {
            $this->articleBusiness = new Business\ArticleBusiness($this->doctrine);
        }
    }
    
    public function index()
    {
        $this->main();
    }
    
    public function main()
    {
        $this->init();
        
        $data['pageTitle'] = "Reglo.net";
        
        //$article = $this->articleBusiness->getArticleByID(1);
        
        $data['test'] = sha1('bonjour');
        //$data['test'] = APPPATH;
        //$this->load->template('ArticleMainView', $data);
        
        $this->load->templateHeader('ArticleMainView', $data);
        $this->load->view('ArticleMainView', $data);
        $this->load->templateFooter('ArticleMainView', $data); 
    }
    
    protected function getArticleBase($articleID = null, $inclComments = false, $inclReviews = false, $pageNum = 1)
    {
        $this->init();
        
        $article = $this->articleBusiness->getArticleByID($articleID);
        
        //$data['test'] = APPPATH;
        //$this->load->template('ArticleMainView', $data);
        
        if (!$article->HasError)
        {
            $data['article'] = $article->Data;
            $data['articleMenu'] = $this->getArticleMenu($articleID);
            $ret = new \Business\RegloTransport();
            $ret->HasError = false;
            $ret->Data = $data;
            return $ret;
        }
        else
        {
            return $article;
        }
    }
    
    protected function getArticleListBase($pageNum = 1)
    {
        $ret = new \Business\RegloTransport();
        
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
        $data['user'] = $this->currentUser->getFirstname();
        
        if (!$articles->HasError)
        {
            $data['articles'] = $articles->Data;
            $ret->HasError = false;
            $ret->Data = $data;
        }
        else
        {
            $data['errorMsg'] = "Error";
            $ret->HasError = true;
            $ret->Data = $data;
        }
        
        return $ret;
        
    }
    
    protected function getArticleCommentsBase($articleID)
    {
        $ret = new \Business\RegloTransport();
        $this->init();
        
        $article = $this->articleBusiness->getArticleByID($articleID);
        
        if (!$article->HasError)
        {
            $data['comments'] = $article->Data->getComments();
            $ret->HasError = false;
            $ret->Data = $data;
            //$this->load->view("ajax\ArticleCommentList", $data);
        }
        else
        {
            $ret->HasError = true;
            $ret->Data = array();
        }
        
        return $ret;
    }
    
    protected function getEditArticleFormBase($articleId = null)
    {
        $ret = new \Business\RegloTransport();
        
        //TODO: get dossier list
        //TODO: get sections list
        $data['dossiers'] = "";
        $data['sections'] = "";
        
        if ($articleId != null)
        {
            $this->init();
            $article = $this->articleBusiness->getArticleByID($articleId);
            if(!$article->HasError)
            {
                $data['articleTitle'] = $article->Data->getTitle();
                $data['articleContent'] = $article->Data->getContent();
                $data['articleId'] = $articleId;
            }
        }
        else
        {
            $data['articleTitle'] = "";
            $data['articleContent'] = "";
            $data['articleId'] = "";
        }
        
        $data['lbl'] = array( "art_post_button" => $this->lang->line('art_post_button'));
        $ret->HasError = false;
        $ret->Data = $data;
        
        return $ret;
    }
    
    public function getArticle($articleID = null, $inclComments = false, $inclReviews = false, $pageNum = 1)
    {
        $ret = new \Business\RegloTransport();
        $ret = $this->getArticleBase($articleID, $inclComments, $inclReviews, $pageNum);
        
        if ($ret->HasError)
        {
            $this->load->view('Error', $ret->Data);
        }
        else
        {
            $this->load->view('Article', $ret->Data);
        }
    }
    
    public function getArticleMenu($articleID = null)
    {
        //TODO: mettre les droits en fonction de l'article et de l'usager.
        
        $data['articleID'] = $articleID;
        return $this->load->view('ajax/ArticleMenu', $data, true);
    }
    
    public function addComment()
    {
        $articleID = urldecode($this->input->post("articleID"));
        $commentText = urldecode($this->input->post("commentText"));
        
        $this->init();
        $retValue = $this->articleBusiness->addComment($articleID, $commentText);
        
        return "cool";
    }
    
    
    public function getEditArticleForm($articleId = null)
    {
        //$articleId = urldecode($this->input->post("articleid"));
        //TODO: check if user can edit article
        
        
        
        $ret = $this->getEditArticleFormBase($articleId);
        $this->load->view("ArticleEdit", $ret->Data);
    }
    
    public function saveArticle()
    {
        $articleTitle = urldecode($this->input->post("articleTitle"));
        $articleText = urldecode($this->input->post("articleText"));
        $articleId = urldecode($this->input->post("articleId"));
        
        
        $this->init();
        
        
        
        if ($articleId != null)
        {
            $retValue = $this->articleBusiness->saveArticle($articleId, $articleTitle, $articleText);
        }
        else
        {
            $retValue = $this->articleBusiness->addArticle($articleTitle, $articleText);
        }
        
        return "cool";
    }
}

?>
