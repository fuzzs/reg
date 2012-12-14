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
    
    
}

?>
