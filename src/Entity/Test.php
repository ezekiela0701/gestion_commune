<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $TestTableau = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestTableau(): ?array
    {
        return $this->TestTableau;
    }

    public function setTestTableau(?array $TestTableau): self
    {
        $this->TestTableau = $TestTableau;

        return $this;
    }
}
