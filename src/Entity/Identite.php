<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IdentiteRepository")
 */
class Identite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,minMessage="Le nom doit contenir au moins 3 caractères")
     * @Assert\NotBlank()
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $LieuNaissance;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=3 , minMessage="Le nom doit contenir au moins 3 caractères")
     */
    private $NomPere;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissancePere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $LieuNaissancePere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $ProfessionPere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $AdressePere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=3 , minMessage="Le nom doit contenir au moins 3 caractères")
     */
    private $NomMere;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissanceMere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $LieuNaissanceMere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $ProfessionMere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $AdresseMere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=3 , minMessage="Le nom doit contenir au moins 3 caractères")
     */
    private $NomFaitPar;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissanceFaitPar;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $LieuNaissanceFaitPar;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $ProfessionFaitPar;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $AdresseFaitPar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->LieuNaissance;
    }

    public function setLieuNaissance(string $LieuNaissance): self
    {
        $this->LieuNaissance = $LieuNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getNomPere(): ?string
    {
        return $this->NomPere;
    }

    public function setNomPere(string $NomPere): self
    {
        $this->NomPere = $NomPere;

        return $this;
    }

    public function getDateNaissancePere(): ?\DateTimeInterface{
        return $this->DateNaissancePere;
    }

    public function setDateNaissancePere(\DateTimeInterface $DateNaissancePere): self
    {
        $this->DateNaissancePere = $DateNaissancePere;

        return $this;
    }

    public function getLieuNaissancePere(): ?string
    {
        return $this->LieuNaissancePere;
    }

    public function setLieuNaissancePere(string $LieuNaissancePere): self
    {
        $this->LieuNaissancePere = $LieuNaissancePere;

        return $this;
    }

    public function getProfessionPere(): ?string
    {
        return $this->ProfessionPere;
    }

    public function setProfessionPere(string $ProfessionPere): self
    {
        $this->ProfessionPere = $ProfessionPere;

        return $this;
    }

    public function getAdressePere(): ?string
    {
        return $this->AdressePere;
    }

    public function setAdressePere(string $AdressePere): self
    {
        $this->AdressePere = $AdressePere;

        return $this;
    }

    public function getNomMere(): ?string
    {
        return $this->NomMere;
    }

    public function setNomMere(string $NomMere): self
    {
        $this->NomMere = $NomMere;

        return $this;
    }

    public function getDateNaissanceMere(): ?\DateTimeInterface
    {
        return $this->DateNaissanceMere;
    }

    public function setDateNaissanceMere(\DateTimeInterface $DateNaissanceMere): self
    {
        $this->DateNaissanceMere = $DateNaissanceMere;

        return $this;
    }

    public function getLieuNaissanceMere(): ?string
    {
        return $this->LieuNaissanceMere;
    }

    public function setLieuNaissanceMere(string $LieuNaissanceMere): self
    {
        $this->LieuNaissanceMere = $LieuNaissanceMere;

        return $this;
    }

    public function getProfessionMere(): ?string
    {
        return $this->ProfessionMere;
    }

    public function setProfessionMere(string $ProfessionMere): self
    {
        $this->ProfessionMere = $ProfessionMere;

        return $this;
    }

    public function getAdresseMere(): ?string
    {
        return $this->AdresseMere;
    }

    public function setAdresseMere(string $AdresseMere): self
    {
        $this->AdresseMere = $AdresseMere;

        return $this;
    }

    public function getNomFaitPar(): ?string
    {
        return $this->NomFaitPar;
    }

    public function setNomFaitPar(string $NomFaitPar): self
    {
        $this->NomFaitPar = $NomFaitPar;

        return $this;
    }

    public function getDateNaissanceFaitPar(): ?\DateTimeInterface
    {
        return $this->DateNaissanceFaitPar;
    }

    public function setDateNaissanceFaitPar(\DateTimeInterface $DateNaissanceFaitPar): self
    {
        $this->DateNaissanceFaitPar = $DateNaissanceFaitPar;

        return $this;
    }

    public function getLieuNaissanceFaitPar(): ?string
    {
        return $this->LieuNaissanceFaitPar;
    }

    public function setLieuNaissanceFaitPar(string $LieuNaissanceFaitPar): self
    {
        $this->LieuNaissanceFaitPar = $LieuNaissanceFaitPar;

        return $this;
    }

    public function getProfessionFaitPar(): ?string
    {
        return $this->ProfessionFaitPar;
    }

    public function setProfessionFaitPar(string $ProfessionFaitPar): self
    {
        $this->ProfessionFaitPar = $ProfessionFaitPar;

        return $this;
    }

    public function getAdresseFaitPar(): ?string
    {
        return $this->AdresseFaitPar;
    }

    public function setAdresseFaitPar(string $AdresseFaitPar): self
    {
        $this->AdresseFaitPar = $AdresseFaitPar;

        return $this;
    }
}
