<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeCharge
 *
 * @ORM\Table(name="mode_charge")
 * @ORM\Entity(repositoryClass= "App\Repository\ModeChargeRepository")
 */
class ModeCharge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mode_charge", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeCharge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_mode_charge", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $libelleModeCharge = 'NULL';

    public function getIdModeCharge(): ?int
    {
        return $this->idModeCharge;
    }

    public function getLibelleModeCharge(): ?string
    {
        return $this->libelleModeCharge;
    }

    public function setLibelleModeCharge(?string $libelleModeCharge): static
    {
        $this->libelleModeCharge = $libelleModeCharge;

        return $this;
    }


}
