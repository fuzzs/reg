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
     * @Column(type="string", length=500, unique=false, nullable=true)
     */
    protected $ActicleContent;
    
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
}

?>
