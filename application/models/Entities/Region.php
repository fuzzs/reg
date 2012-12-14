<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="geo_regions")
 */
class Region 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
     /**
     * @ManyToOne(targetEntity="Country")
     * @JoinColumn(name="CountryCode", referencedColumnName="Code")
     */
    protected $Country;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $RegionName;

}

?>
