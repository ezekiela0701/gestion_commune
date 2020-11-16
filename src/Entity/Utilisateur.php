<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(
 * fields = {"Username"},
 * message = "Ce nom d'utilisateur est déjà utilisé! "
 * )
 */
class Utilisateur implements UserInterface 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255 , unique=true)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8" , minMessage="Votre mot de passe doit contenir au moins 8 caracteres")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password" , message="Le mot de passe est different")
     */
    public $confirm_password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = [];

    public function __construct() {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsActive(){
        return $this->isActive;
    }
    public function setIsActive($isActive){
        $this->isActive=$isActive;
        return $this;
    }

    public function eraseCredentials(){}
    
    public function getSalt(){
        return null;
    }

    public function getRoles(): ?array{
        if(empty($this->roles)){
            return ['ROLE_USER'];
        }
        return $this->roles;
    }
    function addRole($role) {
        $this->roles[] = $role;
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    // public function __ToString()
    // {
    //     return $this->getRoles();
    // }

    
    // public function serialize() {
    //     return serialize(array(
    //         $this->id,
    //         $this->Name,
    //         $this->Username,
    //         $this->password,
    //         $this->isActive,
    //             // see section on salt below
    //             // $this->salt,
    //     ));
    // }

    
    // public function unserialize($serialized) {
    //     list (
    //             $this->id,
    //             $this->Name,
    //             $this->username,
    //             $this->password,
    //             $this->isActive,
    //             // see section on salt below
    //             // $this->salt
    //             ) = unserialize($serialized);
    // }


}
