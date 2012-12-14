<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="reg_articles")
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
}

?>
