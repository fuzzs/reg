<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="reg_articlesegments")
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
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $SegmentTitle;
    
    /**
     * @Column(type="string", length=500, unique=false, nullable=true)
     */
    protected $SegmentContent;
    
    /**
     * @ManyToOne(targetEntity="Article")
     * @JoinColumn(name="ArticleId", referencedColumnName="Id")
     */
    protected $Acticle;
}

?>
