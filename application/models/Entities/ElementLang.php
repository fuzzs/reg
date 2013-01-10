<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="int_elementlang")
 */
class ElementLang
{
    /**
     * @Id
     * @Column(type="integer",nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @ManyToOne(targetEntity="Language")
     * @JoinColumn(name="LanguageCode", referencedColumnName="Code")
     */
    protected $Language;
    
    /**
     * @Column(type="string", length=20, unique=false, nullable=false)
     */
    protected $ElementRefered;
    
    /**
     * @Column(type="string", length=30, unique=false, nullable=false)
     */
    protected $ElementCode;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $ElementLabel;
    
    public function getId() { return $this->Id; }
    
    public function getElementLabel() { return $this->ElementLabel; }
    
}

?>
