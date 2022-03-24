<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Email is required")
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Assert\Length(
     *      min = 6,
     *      minMessage = "the password must be at least {{ limit }} characters long",
     *
     * )
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="nom is required")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="prenom is required")
     */
    private $prenom;
    /**
     * @ORM\Column(type="date")
     ** @Assert\NotBlank(message="date de naissance is required")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="genre is required")
     */
    private $genre;





    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=Calendar::class, mappedBy="utilisateur")
     */
    private $calendar;

    public function __construct()
    {
        $this->calendar = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->genre = $Genre;

        return $this;
    }



    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }


    public function getImageuser(): ?string
    {
        return $this->imageuser;
    }

    public function setImageuser(string $imageuser): self
    {
        $this->imageuser = $imageuser;

        return $this;
    }

    /////////
    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */


    public function setRoles(array $roles): self
    {
        $this->role = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->mdp;
    }

    public function setPassword(string $password): self
    {
        $this->mdp = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRoles()
    {
        $roles = json_decode($this->role);
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @return Collection<int, Calendar>
     */
    public function getCalendar(): Collection
    {
        return $this->calendar;
    }

    public function addCalendar(Calendar $calendar): self
    {
        if (!$this->calendar->contains($calendar)) {
            $this->calendar[] = $calendar;
            $calendar->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCalendar(Calendar $calendar): self
    {
        if ($this->calendar->removeElement($calendar)) {
            // set the owning side to null (unless already changed)
            if ($calendar->getUtilisateur() === $this) {
                $calendar->setUtilisateur(null);
            }
        }

        return $this;
    }

}
