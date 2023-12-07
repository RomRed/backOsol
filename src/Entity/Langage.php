<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langage
 *
 * @ORM\Table(name="langage")
 * @ORM\Entity(repositoryClass= "App\Repository\LangageRepository")
 */
class Langage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_langage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_langage", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $libelleLangage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="alias", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $alias = 'NULL';

    public function getIdLangage(): ?int
    {
        return $this->idLangage;
    }

    public function getLibelleLangage(): ?string
    {
        return $this->libelleLangage;
    }

    public function setLibelleLangage(?string $libelleLangage): static
    {
        $this->libelleLangage = $libelleLangage;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(?string $alias): static
    {
        $this->alias = $alias;

        return $this;
    }


}
