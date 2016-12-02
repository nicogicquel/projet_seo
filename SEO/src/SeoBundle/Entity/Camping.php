<?php

namespace SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Camping
 *
 * @ORM\Table(name="camping")
 * @ORM\Entity(repositoryClass="SeoBundle\Repository\CampingRepository")
 */
class Camping
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="depCamping", type="string", length=255)
     */
    private $depCamping;

    /**
     * @var string
     *
     * @ORM\Column(name="regionCamping", type="string", length=255)
     */
    private $regionCamping;

    /**
     * @var string
     *
     * @ORM\Column(name="villeCamping", type="string", length=255)
     */
    private $villeCamping;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Site", inversedBy="campings", cascade={"remove","persist"}))
     */
    protected $sites;


    public function __construct()
    {
        
        $this->sites=new ArrayCollection();
        
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
     * Set name
     *
     * @param string $name
     *
     * @return Camping
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set depCamping
     *
     * @param string $depCamping
     *
     * @return Camping
     */
    public function setDepCamping($depCamping)
    {
        $this->depCamping = $depCamping;

        return $this;
    }

    /**
     * Get depCamping
     *
     * @return string
     */
    public function getDepCamping()
    {
        return $this->depCamping;
    }

    /**
     * Set regionCamping
     *
     * @param string $regionCamping
     *
     * @return Camping
     */
    public function setRegionCamping($regionCamping)
    {
        $this->regionCamping = $regionCamping;

        return $this;
    }

    /**
     * Get regionCamping
     *
     * @return string
     */
    public function getRegionCamping()
    {
        return $this->regionCamping;
    }

    /**
     * Set villeCamping
     *
     * @param string $villeCamping
     *
     * @return Camping
     */
    public function setVilleCamping($villeCamping)
    {
        $this->villeCamping = $villeCamping;

        return $this;
    }

    /**
     * Get villeCamping
     *
     * @return string
     */
    public function getVilleCamping()
    {
        return $this->villeCamping;
    }

    /**
     * Add site
     *
     * @param \SeoBundle\Entity\Site $site
     *
     * @return Camping
     */
    public function addSite(\SeoBundle\Entity\Site $site)
    {
        $this->sites[] = $site;

        return $this;
    }

    /**
     * Remove site
     *
     * @param \SeoBundle\Entity\Site $site
     */
    public function removeSite(\SeoBundle\Entity\Site $site)
    {
        $this->sites->removeElement($site);
    }

    /**
     * Get sites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSites()
    {
        return $this->sites;
    }
}
