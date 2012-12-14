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
     * @OneToMany(targetEntity="Region", mappedBy="Country")
     */
    protected $Regions;
}

?>
