<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articlesegments")
 */
class ArticleSegment 
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
    protected $Acticle;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $SegmentTitle;
    
    /**
     * @Column(type="string", length=500, unique=false, nullable=true)
     */
    protected $SegmentContent;
    
    /**
     * @Column(type="date", unique=false, nullable=false)
     */
    protected $DatePosted;
    

}

?>
