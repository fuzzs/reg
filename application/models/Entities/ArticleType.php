<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articletypes")
 */
class ArticleType
{
    /**
     * @Id
     * @Column(type="string", length=15,nullable=false)
     */
    protected $Code;
    
    /**
     * @Column(type="string", length=50, unique=false, nullable=false)
     */
    protected $ArticleTypeName;
    
    public function getCode() { return $this->Code; }
    
    public function getArticleTypeName() { return $this->ArticleTypeName; }
    
}

?>
