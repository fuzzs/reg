<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="int_languages")
 */
class Language
{
    /**
     * @Id
     * @Column(type="string", length=2,nullable=false)
     */
    protected $Code;
    
    /**
     * @Column(type="string", length=50, unique=false, nullable=false)
     */
    protected $LanguageName;
    
    /**
     * @Column(type="string", length=50, unique=false, nullable=false)
     */
    protected $LanguageNameEnglish;
    
    /**
     * @Column(type="boolean", unique=false, nullable=false)
     */
    protected $IsSupported;
    
    public function getCode() { return $this->Code; }
    
    public function getLanguageName() { return $this->LanguageName; }
    
}

?>
