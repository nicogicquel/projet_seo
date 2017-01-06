<?php

namespace SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SeoBundle\Entity\Site;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="SeoBundle\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Site",mappedBy="ville",cascade={"persist","remove","merge"})
     */
    private $sites;

    /**
     * @ORM\OneToMany(targetEntity="Camping",mappedBy="ville",cascade={"persist","remove","merge"})
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
     * Set nom
     *
     * @param string $nom
     *
     * @return nom
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
     * @return Ville
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
     * @return Ville
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

    /**
     * Set departement
     *
     * @param \SeoBundle\Entity\Departement $departement
     *
     * @return Ville
     */
    public function setDepartement(\SeoBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \SeoBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }
}
