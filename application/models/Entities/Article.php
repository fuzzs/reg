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
     * @Column(type="date", unique=false, nullable=false)
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
     * @ManyToOne(targetEntity="Dossier")
     * @JoinColumn(name="DossierId", referencedColumnName="Id")
     */
    protected $Dossier;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $User;
    
    public function __construct() 
    {
        $this->ArticleSegments = new ArrayCollection();
        $this->ArticleComments = new ArrayCollection();
        $this->ArticleSectors = new ArrayCollection();
    }
    
    public function getID() { return $this->Id; }
    
    public function getContent() { return stream_get_contents($this->ArticleContent); }
    
    public function getTitle() { return $this->ArticleTitle; }
    
    public function getDate() { return $this->ArticleDate; }
    
    public function getDossier() { return $this->Dossier; }
    
    public function getUser() { return $this->User; }
    
    public function getComments() { return $this->ArticleComments; }
}

?>
