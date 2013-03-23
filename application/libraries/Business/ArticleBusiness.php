<?php

namespace Business;

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager;

/**
 * Description of ArticleBusiness
 *
 * @author fuzzes
 */
class ArticleBusiness extends BusinessBase
{
    /** @var EntityManager */
    protected $em;

    /**
     * 
     * @param \Doctrine $doctrine
     */
    public function __construct(\Doctrine $doctrine) 
    {
        parent::__construct($doctrine);
        $this->em = $doctrine->getEntityManager();
    }
    
    /**
     * 
     * @param integer $start
     * @param integer $numRec
     * @return \Business\RegloTransport
     */
    public function getAllArticles($start, $numRec)
    {
        /* @var $query \Doctrine\ORM\Query */
        /* @var $ret RegloTransport */
        /* @var $retArticle \Entities\Article */
        $ret = new RegloTransport();
        
        $dql = "SELECT ar FROM Entities\Article ar";
        
        $query = $this->em->createQuery($dql)
                ->setFirstResult($start)
                ->setMaxResults($numRec);
        
        $retArticle = $query->getResult();
        if ($retArticle != null)
        {
            $ret->Data = $retArticle;
            $ret->HasError = false;
        }
        else
        {
            $ret->HasError = true;
            $ret->Message = "No rows returned";
        }
        
        return $ret;
    }
    
    /**
     * 
     * @param integer $articleID
     * @return \Business\RegloTransport
     */
    public function getArticleByID($articleID)
    {
        /* @var $ret RegloTransport */
        /* @var $retArticle \Entities\Article */
        $ret = new RegloTransport();
        $retArticle = $this->em->find("Entities\Article", $articleID);
        if ($retArticle != null)
        {
            $ret->Data = $retArticle;
            $ret->HasError = false;
        }
        else
        {
            $ret->HasError = true;
            $ret->Message = "No rows returned";
        }
        
        return $ret;
    }
    
    /**
     * 
     * @param integer $articleID
     * @param string $commentText
     * @return \Business\RegloTransport
     */
    public function addComment($articleID, $commentText)
    {
        /* @var $query \Doctrine\ORM\Query */
        /* @var $ret RegloTransport */
        /* @var $retArticle \Entities\Article */
        //TODO: check user rights
        $ret = new RegloTransport();
        
        
        if ($this->userCanAddComments($articleID))
        {
        
            $retArticle = $this->em->find("Entities\Article", $articleID);

            if ($retArticle != null)
            {
                $comment = new \Entities\ArticleComment();
                $comment->createComment($retArticle->Data, $this->currentUser, $commentText);
                $retArticle->getComments()->add($comment);

                $this->em->persist($comment);
                $this->em->persist($retArticle);
                $this->em->flush();
                $ret->HasError = false;
                $ret->Message = "OK";
            }
        }
        else
        {
            $ret->HasError = true;
        }
        
        return $ret;
    }
    
    /**
     * 
     * @param string $articleTitle
     * @param string $articleText
     * @return \Business\RegloTransport
     */
    public function addArticle($articleTitle, $articleText)
    {
        //TODO: check user rights
        $ret = new RegloTransport();
        
        $article = new \Entities\Article();
        $article->createArticle($this->currentUser, $articleTitle, $articleText);
        $this->em->persist($article);
        $this->em->flush();
        $ret->HasError = false;
        $ret->Message = "OK";
        
        
        return $ret;
    }
    
    public function saveArticle($articleID, $articleTitle, $articleContent)
    {
        /* @var $article \Entities\Article */
        $article = $this->em->find("Entities\Article", $articleID);
        
        $article->updateArticle($articleTitle, $articleContent);
        
        $this->em->persist($article);
        $this->em->flush();
        
        $ret = new RegloTransport();
        $ret->HasError = false;
        $ret->Message = "OK";
        
        
        return $ret;
        
    }
    
    /**
     * 
     * @param int $articleId
     * @return boolean
     */
    public function userCanSaveArticle($articleID = null)
    {
        return true;
    }
    
    public function userCanAddComments($articleID = null)
    {
        return true;
    }
}

?>
