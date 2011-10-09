<?php

namespace ActualSkill\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ActualSkill\SiteBundle\Entity\Country
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $iso2
     *
     * @ORM\Column(name="iso2", type="string", length=2)
     */
    private $iso2;

    /**
     * @var string $iso3
     *
     * @ORM\Column(name="iso3", type="string", length=3)
     */
    private $iso3;

    /**
     * @var integer $iso_numeric
     *
     * @ORM\Column(name="iso_numeric", type="integer")
     */
    private $iso_numeric;

    /**
     * @var string $fips
     *
     * @ORM\Column(name="fips", type="string", length=2)
     */
    private $fips;

    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string $capital
     *
     * @ORM\Column(name="capital", type="string", length=255)
     */
    private $capital;

    /**
     * @var integer $area
     *
     * @ORM\Column(name="area", type="integer")
     */
    private $area;

    /**
     * @var integer $population
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;

    /**
     * @var string $continent
     *
     * @ORM\Column(name="continent", type="string", length=2)
     */
    private $continent;

    /**
     * @var string $currency_code
     *
     * @ORM\Column(name="currency_code", type="string", length=3)
     */
    private $currency_code;

    /**
     * @var string $currency_name
     *
     * @ORM\Column(name="currency_name", type="string", length=100)
     */
    private $currency_name;

    /**
     * @var string $languages
     *
     * @ORM\Column(name="languages", type="string", length=100)
     */
    private $languages;

    /**
     * @var integer $geonameid
     *
     * @ORM\Column(name="geonameid", type="integer")
     */
    private $geonameid;

    /**
     *
     * @ORM\OneToMany(targetEntity="Player", mappedBy="country_id")
     */    
    private $players;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Club", mappedBy="country_id")
     */    
    private $clubs;

    public function __construct() {
        $this->players = new ArrayCollection();
        $this->clubs = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set iso2
     *
     * @param string $iso2
     */
    public function setIso2($iso2)
    {
        $this->iso2 = $iso2;
    }

    /**
     * Get iso2
     *
     * @return string 
     */
    public function getIso2()
    {
        return $this->iso2;
    }

    /**
     * Set iso3
     *
     * @param string $iso3
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
    }

    /**
     * Get iso3
     *
     * @return string 
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set iso_numeric
     *
     * @param integer $isoNumeric
     */
    public function setIsoNumeric($isoNumeric)
    {
        $this->iso_numeric = $isoNumeric;
    }

    /**
     * Get iso_numeric
     *
     * @return integer 
     */
    public function getIsoNumeric()
    {
        return $this->iso_numeric;
    }

    /**
     * Set fips
     *
     * @param string $fips
     */
    public function setFips($fips)
    {
        $this->fips = $fips;
    }

    /**
     * Get fips
     *
     * @return string 
     */
    public function getFips()
    {
        return $this->fips;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set capital
     *
     * @param string $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * Get capital
     *
     * @return string 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set area
     *
     * @param integer $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set population
     *
     * @param integer $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set continent
     *
     * @param string $continent
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;
    }

    /**
     * Get continent
     *
     * @return string 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set currency_code
     *
     * @param string $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currency_code = $currencyCode;
    }

    /**
     * Get currency_code
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Set currency_name
     *
     * @param string $currencyName
     */
    public function setCurrencyName($currencyName)
    {
        $this->currency_name = $currencyName;
    }

    /**
     * Get currency_name
     *
     * @return string 
     */
    public function getCurrencyName()
    {
        return $this->currency_name;
    }

    /**
     * Set languages
     *
     * @param string $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set geonameid
     *
     * @param integer $geonameid
     */
    public function setGeonameid($geonameid)
    {
        $this->geonameid = $geonameid;
    }

    /**
     * Get geonameid
     *
     * @return integer 
     */
    public function getGeonameid()
    {
        return $this->geonameid;
    }

    /**
     * Add players
     *
     * @param ActualSkill\SiteBundle\Entity\Player $players
     */
    public function addPlayers(\ActualSkill\SiteBundle\Entity\Player $players)
    {
        $this->players[] = $players;
    }

    /**
     * Get players
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add clubs
     *
     * @param ActualSkill\SiteBundle\Entity\Club $clubs
     */
    public function addClubs(\ActualSkill\SiteBundle\Entity\Club $clubs)
    {
        $this->clubs[] = $clubs;
    }

    /**
     * Get clubs
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClubs()
    {
        return $this->clubs;
    }
    
    public function __toString() {
        return $this->country;
    }
}