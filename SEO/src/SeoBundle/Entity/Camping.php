<?php

namespace SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use SeoBundle\Entity\Site;
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
     * @ORM\Column(name="nomCamping", type="string", length=255)
     */
    private $nomCamping;


    /**
     *
     * @ORM\ManyToMany(targetEntity="Site", mappedBy="campings")
     */
    protected $sites;

    /**
     *@ORM\ManyToOne(targetEntity="Ville",inversedBy="campings",cascade={"persist","merge"})
     *@ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     *@ORM\ManyToOne(targetEntity="Region",inversedBy="campings",cascade={"persist","merge"})
     *@ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     *@ORM\ManyToOne(targetEntity="Departement",inversedBy="campings",cascade={"persist","merge"})
     *@ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     */
    private $departement;


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
     * Set region
     *
     * @param string $region
     *
     * @return Camping
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }


    /**
     * Add site
     *
     * @param \SeoBundle\Entity\Site $sites
     *
     * @return Camping
     */
    public function addSites(\SeoBundle\Entity\Site $sites)
    {
        $this->sites[] = $sites;

        return $this;
    }

    /**
     * Remove site
     *
     * @param \SeoBundle\Entity\Site $sites
     */
    public function removeSites(\SeoBundle\Entity\Site $sites)
    {
        $this->sites->removeElement($sites);
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
     * Set nomCamping
     *
     * @param string $nomCamping
     *
     * @return Camping
     */
    public function setNomCamping($nomCamping)
    {
        $this->nomCamping = $nomCamping;

        return $this;
    }

    /**
     * Get nomCamping
     *
     * @return string
     */
    public function getNomCamping()
    {
        return $this->nomCamping;
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
     * Set ville
     *
     * @param \SeoBundle\Entity\Ville $ville
     *
     * @return Camping
     */
    public function setVille(\SeoBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \SeoBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set departement
     *
     * @param \SeoBundle\Entity\Departement $departement
     *
     * @return Camping
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
