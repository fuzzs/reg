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
     * @JoinColumn(name="CountryCode", referencedColumnName="Code", nullable=false)
     */
    protected $Country;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $RegionName;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=true)
     */
    protected $RegionAltName;
    
    /**
     * @return int
     */
    public function getId() { return $this->Id; }
    
    /**
     * @return Country
     */
    public function getCountry() { return $this->Country; }
    
    /**
     * @return string
     */
    public function getRegionName() { return $this->RegionName; }
    
    /**
     * @return string
     */
    public function getRegionAltName() { return $this->RegionAltName; }

}

?>
