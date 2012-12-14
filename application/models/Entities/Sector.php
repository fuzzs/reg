<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_sectors")
 */
class Sector 
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
    protected $SectorName;
    
    /**
     * @OneToMany(targetEntity="ArticleSector", mappedBy="Sector")
     */
    protected $ArticleSectors;

}

?>
