<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_dossiers")
 */
class Dossier 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @Column(type="string", length=80, unique=false, nullable=false)
     */
    protected $DossierName;
    
    /**
     * @OneToMany(targetEntity="Article", mappedBy="Dossier")
     */
    protected $Articles;
    
    /**
     * @ManyToOne(targetEntity="Dossier")
     * @JoinColumn(name="DossierIdParent", referencedColumnName="Id")
     */
    protected $Dossier;
    
    /**
     * @OneToMany(targetEntity="Dossier", mappedBy="Dossier")
     */
    protected $Dossiers;
    
    /**
     * @ManyToOne(targetEntity="Country")
     * @JoinColumn(name="CountryCode", referencedColumnName="Code")
     */
    protected $Country;
    
    /**
     * @ManyToOne(targetEntity="Region")
     * @JoinColumn(name="RegionId", referencedColumnName="Id")
     */
    protected $Region;
    
    
    public function getDossierName()
    {
        return $this->DossierName;
    }
}

?>
