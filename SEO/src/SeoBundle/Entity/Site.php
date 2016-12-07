<?php

namespace SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use SeoBundle\Entity\Camping;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="SeoBundle\Repository\SiteRepository")
 */
class Site
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=100, nullable=true)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="camp", type="string", length=100, nullable=true)
     */
    private $camp;

    /**
     * @var int
     *
     * @ORM\Column(name="CT", type="integer")
     */
    private $cT;

    /**
     * @var int
     *
     * @ORM\Column(name="TF", type="integer")
     */
    private $tF;

    /**
     * @var string
     *
     * @ORM\Column(name="topical", type="string", length=100, nullable=true)
     */
    private $topical;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=20, nullable=true)
     */
    private $langue;


    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=100, nullable=true)
     */
    private $departement;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="text", nullable=true)
     */
    private $difficulte;

    /**
     * @var string
     *
     * @ORM\Column(name="infos", type="text", nullable=true)
     */
    private $infos;

    /**
     * @ORM\ManyToMany(targetEntity="Camping", inversedBy="sites",cascade={"remove","persist"})
     */
    private $campings;

    /**
     *@ORM\ManyToOne(targetEntity="Ville",inversedBy="sites",cascade={"persist","merge"})
     *@ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     *@ORM\ManyToOne(targetEntity="Region",inversedBy="sites",cascade={"persist","merge"})
     *@ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;


    public function __construct()
    {
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
     * Set url
     *
     * @param string $url
     *
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Site
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Site
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set camp
     *
     * @param string $camp
     *
     * @return Site
     */
    public function setCamp($camp)
    {
        $this->camp = $camp;

        return $this;
    }

    /**
     * Get camp
     *
     * @return string
     */
    public function getCamp()
    {
        return $this->camp;
    }

    /**
     * Set cT
     *
     * @param integer $cT
     *
     * @return Site
     */
    public function setCT($cT)
    {
        $this->cT = $cT;

        return $this;
    }

    /**
     * Get cT
     *
     * @return int
     */
    public function getCT()
    {
        return $this->cT;
    }

    /**
     * Set tF
     *
     * @param integer $tF
     *
     * @return Site
     */
    public function setTF($tF)
    {
        $this->tF = $tF;

        return $this;
    }

    /**
     * Get tF
     *
     * @return int
     */
    public function getTF()
    {
        return $this->tF;
    }

    /**
     * Set topical
     *
     * @param string $topical
     *
     * @return Site
     */
    public function setTopical($topical)
    {
        $this->topical = $topical;

        return $this;
    }

    /**
     * Get topical
     *
     * @return string
     */
    public function getTopical()
    {
        return $this->topical;
    }

    /**
     * Set langue
     *
     * @param string $langue
     *
     * @return Site
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Site
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
     * Set departement
     *
     * @param string $departement
     *
     * @return Site
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Site
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Site
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set difficulte
     *
     * @param string $difficulte
     *
     * @return Site
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    /**
     * Get difficulte
     *
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Set infos
     *
     * @param string $infos
     *
     * @return Site
     */
    public function setInfos($infos)
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * Get infos
     *
     * @return string
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * Add camping
     *
     * @param \SeoBundle\Entity\Camping $camping
     *
     * @return Site
     */
    public function addCampings(\SeoBundle\Entity\Camping $campings)
    {
        $this->campings[] = $campings;

        return $this;
    }

    /**
     * Remove camping
     *
     * @param \SeoBundle\Entity\Camping $camping
     */
    public function removeCamping(\SeoBundle\Entity\Camping $campings)
    {
        $this->campings->removeElement($campings);
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
     * Add camping
     *
     * @param \SeoBundle\Entity\Camping $camping
     *
     * @return Site
     */
    public function addCamping(\SeoBundle\Entity\Camping $camping)
    {
        $this->campings[] = $camping;

        return $this;
    }

}
