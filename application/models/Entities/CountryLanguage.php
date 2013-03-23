<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="geo_countrylanguages")
 */
class CountryLanguage 
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
     * @ManyToOne(targetEntity="Language")
     * @JoinColumn(name="LanguageCode", referencedColumnName="Code", nullable=false)
     */
    protected $Language;
    
    /**
     * 
     * @COlumn(type="string", length=5, unique=false, nullable=false)
     */
    protected $Locale;
    
    /**
     * 
     * @COlumn(type="integer", unique=false, nullable=false)
     */
    protected $IsAltLanguage;
    
    /**
     * 
     * @COlumn(type="integer", unique=false, nullable=false)
     */
    protected $IsActive;
    

}

?>

