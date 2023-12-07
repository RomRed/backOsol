<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * UtilisateurPico
 *
 * @ORM\Table(name="utilisateur_pico", indexes={@ORM\Index(name="utilisateur_pico_organisation_FK", columns={"id_organisation"})})
 * @ORM\Entity(repositoryClass= "App\Repository\UtilisateurPicoRepository")
 */
class UtilisateurPico  implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur_pico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateurPico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_badge", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $numBadge = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $prenom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255, nullable=false)
     */
    private $mdp;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateCreation = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_update", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateUpdate = 'NULL';

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_organisation", referencedColumnName="id_organisation")
     * })
     */
    private $idOrganisation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pico", inversedBy="idUtilisateurPico")
     * @ORM\JoinTable(name="utiliser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_utilisateur_pico", referencedColumnName="id_utilisateur_pico")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_pico", referencedColumnName="id_pico")
     *   }
     * )
     */
    private $idPico = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPico = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUtilisateurPico(): ?int
    {
        return $this->idUtilisateurPico;
    }

    public function getNumBadge(): ?string
    {
        return $this->numBadge;
    }

    public function setNumBadge(?string $numBadge): static
    {
        $this->numBadge = $numBadge;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(?\DateTimeInterface $dateUpdate): static
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    public function getIdOrganisation(): ?Organisation
    {
        return $this->idOrganisation;
    }

    public function setIdOrganisation(?Organisation $idOrganisation): static
    {
        $this->idOrganisation = $idOrganisation;

        return $this;
    }

    /**
     * @return Collection<int, Pico>
     */
    public function getIdPico(): Collection
    {
        return $this->idPico;
    }

    public function addIdPico(Pico $idPico): static
    {
        if (!$this->idPico->contains($idPico)) {
            $this->idPico->add($idPico);
        }

        return $this;
    }

    public function removeIdPico(Pico $idPico): static
    {
        $this->idPico->removeElement($idPico);

        return $this;
    }



              //--------- UserInterface

    /**

     * The public representation of the user (e.g. a username, an email address, etc.)

     *

     * @see UserInterface

     */

     public function getUserIdentifier(): string

     {
 
         return (string) $this->email;
 
     }
 
 
 
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {

        return ['ROLE_USER'];
    }
 
 
 
     /**
 
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
 
     }
 
 
 
     /**
 
      * @see PasswordAuthenticatedUserInterface
 
      */
 
     public function getPassword(): string
 
     {
 
         return $this->mdp;
 
     }
 
 
 
     public function getPasswordHasherName(): ?string
 
     {
 
         return null;
 
     }
}
