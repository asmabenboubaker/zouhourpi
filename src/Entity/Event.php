<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Groups("Event")

     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)

     * @Groups("Event")
     */
    private $nom;





    /**
     * @ORM\Column(type="string", length=255, nullable=true)

     * @Groups("Event")
     */
    private $lieu;

    /**
     * @ORM\Column(type="string" , nullable=true)


  *@Groups("Event")
     */

    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("Event")

     */
    private $image;









    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->calender = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }



    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }










}
