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
    public function __construct($doctrine) 
    {
        parent::__construct($doctrine);
    }
    
    public function getAllArticles($start, $numRec)
    {
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
    
    public function getArticleByID($articleID)
    {
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
    
    public function addComment($articleID, $commentText)
    {
        $ret = new RegloTransport();
        
        $retArticle = $this->getArticleByID($articleID);
        
        if (!$retArticle->HasError)
        {
            $comment = new \Entities\ArticleComment();
            $comment->createComment($retArticle->Data, $this->currentUser, $commentText);
            $retArticle->Data->getComments()->add($comment);
            
            $this->em->persist($comment);
            $this->em->persist($retArticle->Data);
            $this->em->flush();
            $ret->HasError = false;
            $ret->Message = "OK";
        }
        
        return $ret;
    }
}

?>
