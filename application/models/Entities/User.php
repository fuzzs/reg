<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_users")
 */
class User 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @OneToMany(targetEntity="UserRole", mappedBy="User")
     */
    protected $UserRoles;
    
    /**
     * @OneToMany(targetEntity="UserLogin", mappedBy="User")
     */
    protected $UserLogins;
    
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
    
    /**
     * @Column(type="string", length=120, unique=true, nullable=false)
     */
    protected $Username;
    
    /**
     * @Column(type="string", length=120, unique=false, nullable=false)
     */
    protected $Firstname;
    
    /**
     * @Column(type="string", length=120, unique=false, nullable=false)
     */
    protected $Lastname;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=true)
     */
    protected $Email;
    
    /**
     * @Column(type="string", length=60, unique=false, nullable=true)
     */
    protected $Password;
    
    /**
     * @Column(type="string", length=60, unique=false, nullable=true)
     */
    protected $FacebookKey;
    
    /**
     * @Column(type="string", length=5, unique=false, nullable=true)
     */
    protected $Locale;
    
    
    public function getId() {return $this->Id; }
    
    public function getUsername() {return $this->Username; }
    
    public function getFirstname() { return $this->Firstname; }
    
    public function getLastname() { return $this->Lastname; }
    
    public function getDisplayName() { return $this->Firstname . " " . $this->Lastname; }
    
    public function getHashedPassword() { return $this->Password; }
    
    public function getEmail() { return $this->Email; }
    
    public function getLocale() { return $this->Locale; }
    
    /**
     * @return Country
     */
    public function getCountry() { return $this->Country; }
    
    /**
     * @return Region
     */
    public function getRegion() { return $this->Region; }
}

?>
