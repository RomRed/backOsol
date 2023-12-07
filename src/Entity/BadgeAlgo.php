<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BadgeAlgo
 *
 * @ORM\Table(name="badge_algo")
 * @ORM\Entity(repositoryClass= "App\Repository\BadgeAlgoRepository")
 */
class BadgeAlgo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_badge_algo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBadgeAlgo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="algo", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $algo = 'NULL';

    public function getIdBadgeAlgo(): ?int
    {
        return $this->idBadgeAlgo;
    }

    public function getAlgo(): ?string
    {
        return $this->algo;
    }

    public function setAlgo(?string $algo): static
    {
        $this->algo = $algo;

        return $this;
    }


}
