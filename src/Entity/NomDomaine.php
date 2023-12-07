<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomDomaine
 *
 * @ORM\Table(name="nom_domaine", indexes={@ORM\Index(name="nom_domaine_organisation_FK", columns={"id_organisation"})})
 * @ORM\Entity(repositoryClass= "App\Repository\NomDomaineRepository")
 */
class NomDomaine
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nom_domaine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNomDomaine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_ndd", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $libelleNdd = 'NULL';

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_organisation", referencedColumnName="id_organisation")
     * })
     */
    private $idOrganisation;

    public function getIdNomDomaine(): ?int
    {
        return $this->idNomDomaine;
    }

    public function getLibelleNdd(): ?string
    {
        return $this->libelleNdd;
    }

    public function setLibelleNdd(?string $libelleNdd): static
    {
        $this->libelleNdd = $libelleNdd;

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


}
