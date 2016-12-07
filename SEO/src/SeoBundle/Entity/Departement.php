<?php

namespace SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="SeoBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="code", type="string", length=3)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Site",mappedBy="departement",cascade={"persist","remove","merge"})
     */
    private $sites;

    /**
     * @ORM\OneToMany(targetEntity="Camping",mappedBy="departement",cascade={"persist","remove","merge"})
     */
    private $campings;


    public function __construct() {
        $this->sites = new ArrayCollection();
        $this->campings = new ArrayCollection();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Departement
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Departement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add site
     *
     * @param \SeoBundle\Entity\Site $site
     *
     * @return Departement
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

    /**
     * Add camping
     *
     * @param \SeoBundle\Entity\Camping $camping
     *
     * @return Departement
     */
    public function addCamping(\SeoBundle\Entity\Camping $camping)
    {
        $this->campings[] = $camping;

        return $this;
    }

    /**
     * Remove camping
     *
     * @param \SeoBundle\Entity\Camping $camping
     */
    public function removeCamping(\SeoBundle\Entity\Camping $camping)
    {
        $this->campings->removeElement($camping);
    }

    /**
     * Get campings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampings()
    {
        return $this->campings;
    }
}
