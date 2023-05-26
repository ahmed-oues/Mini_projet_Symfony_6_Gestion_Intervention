<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InterventionRepository::class)
 */
class Intervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numinterv;

    /**
     * @ORM\Column(type="date")
     */
    private $dateinterv;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="interventions")
     * @ORM\JoinColumn(name="codectl", referencedColumnName="id")
     */
    private $codectl;

     /**
      * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="interventions")
      * @ORM\JoinColumn(name="referencepd", referencedColumnName="id")
      */
     private $referencepd;

     /**
      * @ORM\ManyToOne(targetEntity=Technicien::class, inversedBy="interventions")
      * @ORM\JoinColumn(name="codetech", referencedColumnName="id")
      */
     private $codetech;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuminterv(): ?int
    {
        return $this->numinterv;
    }

    public function setNuminterv(int $numinterv): self
    {
        $this->numinterv = $numinterv;

        return $this;
    }

    public function getDateinterv(): ?\DateTimeInterface
    {
        return $this->dateinterv;
    }

    public function setDateinterv(\DateTimeInterface $dateinterv): self
    {
        $this->dateinterv = $dateinterv;

        return $this;
    }

    public function getCodectl(): ?client
    {
        return $this->codectl;
    }

    public function setCodectl(?client $codectl): self
    {
        $this->codectl = $codectl;

        return $this;
    }

    public function getReferencepd(): ?produit
    {
        return $this->referencepd;
    }

    public function setReferencepd(?produit $referencepd): self
    {
        $this->referencepd = $referencepd;

        return $this;
    }

    public function getCodetech(): ?technicien
    {
        return $this->codetech;
    }

    public function setCodetech(?technicien $codetech): self
    {
        $this->codetech = $codetech;

        return $this;
    }
}
