<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articlesectors")
 */
class ArticleSector
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
     /**
     * @ManyToOne(targetEntity="Sector")
     * @JoinColumn(name="SectorId", referencedColumnName="Id")
     */
    protected $Sector;
    
    /**
     * @ManyToOne(targetEntity="Article")
     * @JoinColumn(name="ArticleId", referencedColumnName="Id")
     */
    protected $Article;
    
}

?>
