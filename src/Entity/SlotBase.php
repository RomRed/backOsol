<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SlotBase
 *
 * @ORM\Table(name="slot_base", indexes={@ORM\Index(name="slot_base_pico_FK", columns={"id_pico"}), @ORM\Index(name="slot_base_base0_FK", columns={"id_base"})})
 * @ORM\Entity(repositoryClass= "App\Repository\SlotBaseRepository")
 */
class SlotBase
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_slot_base", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSlotBase;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActived", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isactived = 'NULL';

    /**
     * @var \Base
     *
     * @ORM\ManyToOne(targetEntity="Base")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_base", referencedColumnName="id_base")
     * })
     */
    private $idBase;

    /**
     * @var \Pico
     *
     * @ORM\ManyToOne(targetEntity="Pico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pico", referencedColumnName="id_pico")
     * })
     */
    private $idPico;

    public function getIdSlotBase(): ?int
    {
        return $this->idSlotBase;
    }

    public function isIsactived(): ?bool
    {
        return $this->isactived;
    }

    public function setIsactived(?bool $isactived): static
    {
        $this->isactived = $isactived;

        return $this;
    }

    public function getIdBase(): ?Base
    {
        return $this->idBase;
    }

    public function setIdBase(?Base $idBase): static
    {
        $this->idBase = $idBase;

        return $this;
    }

    public function getIdPico(): ?Pico
    {
        return $this->idPico;
    }

    public function setIdPico(?Pico $idPico): static
    {
        $this->idPico = $idPico;

        return $this;
    }


}
