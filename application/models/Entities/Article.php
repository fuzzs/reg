<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articles")
 */
class Article 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $ArticleTitle;
    
    /**
     * @Column(type="blob", unique=false, nullable=true)
     */
    protected $ArticleContent;
    
    /**
     * @Column(type="datetime", unique=false, nullable=false)
     */
    protected $ArticleDate;
    
    /**
     * @OneToMany(targetEntity="ArticleSegment", mappedBy="Article")
     */
    protected $ArticleSegments;
    
    /**
     * @OneToMany(targetEntity="ArticleComment", mappedBy="Article")
     */
    protected $ArticleComments;
    
    /**
     * @OneToMany(targetEntity="ArticleSector", mappedBy="Article")
     */
    protected $ArticleSectors;
    
    /**
     * @OneToMany(targetEntity="ArticleVote", mappedBy="Article")
     */
    protected $ArticleVotes;
    
    /**
     * @ManyToOne(targetEntity="Dossier")
     * @JoinColumn(name="DossierId", referencedColumnName="Id")
     */
    protected $Dossier;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $User;
    
    /**
     * @ManyToOne(targetEntity="Country")
     * @JoinColumn(name="CountryCode", referencedColumnName="Code")
     */
    protected $Country;
    
    /**
     * @ManyToOne(targetEntity="Region")
     * @JoinColumn(name="RegionId", referencedColumnName="Id")
     */
    protected $Region;
    
    /**
     * @ManyToOne(targetEntity="ArticleType")
     * @JoinColumn(name="ArticleTypeCode", referencedColumnName="Code")
     */
    protected $ArticleType;
    
    /**
     * @ManyToOne(targetEntity="Language")
     * @JoinColumn(name="LanguageCode", referencedColumnName="Code")
     */
    protected $Language;
    
    public function __construct() 
    {
        $this->ArticleSegments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ArticleComments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ArticleSectors = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getID() { return $this->Id; }
    
    public function getContent() { return stream_get_contents($this->ArticleContent); }
    
    public function getTitle() { return $this->ArticleTitle; }
    
    public function getDate() { return $this->ArticleDate; }
    
    public function getDossier() { return $this->Dossier; }
    
    public function getUser() { return $this->User; }
    
    public function getComments() { return $this->ArticleComments; }
    
    public function getCountry() { return $this->Country; }
    
    public function getRegion() { return $this->Region; }
    
    public function getArticleType() { return $this->ArticleType; }
    
    public function getLanguage() { return $this->Language; }
    
    public function createArticle($user, $articleTitle, $articleContent)
    {
        $this->User = $user;
        $this->ArticleTitle = $articleTitle;
        $this->ArticleContent = $articleContent;
        
        $this->ArticleDate = new \DateTime("now");
    }
    
    public function updateArticle($articleTitle, $articleContent)
    {
        $this->ArticleTitle = $articleTitle;
        $this->ArticleContent = $articleContent;
    }
}

?>
