<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="geo_countries")
 */
class Country 
{
    /**
     * @Id
     * @Column(type="string", length=2, nullable=false)
     */
    protected $Code;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $CountryName;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=true)
     */
    protected $CountryAltName;
    
    /**
     * @OneToMany(targetEntity="Region", mappedBy="Country")
     */
    protected $Regions;
    
    
    /**
     * @return string
     */
    public function getCode() { return $this->Code; }
    
    /**
     * @return string
     */
    public function getCountryName() { return $this->CountryName; }
    
    /**
     * @return string
     */
    public function getCountryAltName () { return $this->CountryAltName; }
    
    /**
     * @return Region
     */
    public function getRegions() { return $this->Regions; }
}

?>
