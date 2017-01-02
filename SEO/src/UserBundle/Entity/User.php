<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Role\RoleInterface;
use UserBundle\Entity\Role;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable 
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
     * @ORM\Column(name="username", type="string", length=100, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    /*private $salt;*/

    /**
     * 
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     */
    private $userRoles;


    public function __construct()
    {
        $this->userRoles= new ArrayCollection();
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    /*public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }*/

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Set userRoles
     *
     * @param integer $userRoles
     *
     * @return User
     */
    public function setUserRoles($userRoles)
    {
        $this->userRoles[] = $userRoles;

        return $this;
    }

    /**
     * Get userRoles
     *
     * @return array
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    public function eraseCredentials()
    {

    }

    /**
     * Renvoie l'objet au format serialisé
     * @return string
     */
    public function serialize()
    {
        return \json_encode(array($this->id, $this->username, $this->password, $this->userRoles));
    }

    /**
     * Renseigne les valeurs de l'objet à partir d'une chaine serialisée
     * @param type $serialized
     */
    public function unserialize($serialized)
    {
        list($this->id, $this->username, $this->password, $this->userRoles) = \json_decode($serialized);
    }


    /**
     * Add userRoles
     *
     * @param \UserBundle\Entity\UserRoles $userRoles
     *
     * @return User
     */
    public function addUserRole(\UserBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;

        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param \UserBundle\Entity\Role $UserRoles
     */
    public function removeUserRoles(\UserBundle\Entity\Role $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
    }

    /**
     * Gets an array of roles.
     *
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->userRoles->toArray();
        
    }

    //Génère un mot de passe aléatoire
    function cryptPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Remove userRole
     *
     * @param \UserBundle\Entity\Role $userRole
     */
    public function removeUserRole(\UserBundle\Entity\Role $userRole)
    {
        $this->userRoles->removeElement($userRole);
    }
}
