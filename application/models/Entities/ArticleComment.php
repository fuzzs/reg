<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articlecomments")
 */
class ArticleComment 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @ManyToOne(targetEntity="Article")
     * @JoinColumn(name="ArticleId", referencedColumnName="Id")
     */
    protected $Article;
    
     /**
     * @ManyToOne(targetEntity="ArticleSegment")
     * @JoinColumn(name="SegmentId", referencedColumnName="Id")
     */
    protected $Segment;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $User;

    /**
     * @Column(type="string", length=2000, unique=false, nullable=false)
     */
    protected $CommentText;
    
    /**
     * @Column(type="datetime", unique=false, nullable=false)
     */
    protected $CommentDate;
    
    public function __construct() 
    {
        
    }
    
    public function createComment($article, $user, $commentText)
    {
        $this->CommentText = $commentText;
        $this->CommentDate = new \DateTime("now");
        
        $this->Article = $article;
        $this->User = $user;
    }
    
    public function getID() { return $this->Id; }
    public function getUser() { return $this->User; }
    public function getCommentText() { return $this->CommentText; }
    public function getCommentDate() { return $this->CommentDate; }
    
    
}

?>
