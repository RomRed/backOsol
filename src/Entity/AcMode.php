<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcMode
 *
 * @ORM\Table(name="ac_mode")
 * @ORM\Entity(repositoryClass= "App\Repository\AcModeRepository")
 */
class AcMode
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ac_mode", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAcMode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_ac_mode", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $libelleAcMode = 'NULL';

    public function getIdAcMode(): ?int
    {
        return $this->idAcMode;
    }

    public function getLibelleAcMode(): ?string
    {
        return $this->libelleAcMode;
    }

    public function setLibelleAcMode(?string $libelleAcMode): static
    {
        $this->libelleAcMode = $libelleAcMode;

        return $this;
    }
    /**
     * Set the value of idAcMode
     *
     * @param  int  $idAcMode
     *
     * @return  self
     */ 
    public function setIdAcMode(int $idAcMode)
    {
        $this->idAcMode = $idAcMode;

        return $this;
    }
}
