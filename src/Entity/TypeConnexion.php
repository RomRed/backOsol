<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeConnexion
 *
 * @ORM\Table(name="type_connexion")
 * @ORM\Entity(repositoryClass= "App\Repository\TypeConnexionRepository")
 */
class TypeConnexion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_connexion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeConnexion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_type_connexion", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $libelleTypeConnexion = 'NULL';

    public function getIdTypeConnexion(): ?int
    {
        return $this->idTypeConnexion;
    }

    public function getLibelleTypeConnexion(): ?string
    {
        return $this->libelleTypeConnexion;
    }

    public function setLibelleTypeConnexion(?string $libelleTypeConnexion): static
    {
        $this->libelleTypeConnexion = $libelleTypeConnexion;

        return $this;
    }


}
