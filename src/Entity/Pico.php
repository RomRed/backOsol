<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pico
 *
 * @ORM\Table(name="pico")
 * @ORM\Entity(repositoryClass= "App\Repository\PicoRepository")
 */
class Pico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alias", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $alias = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="issues", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $issues = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="version", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $version = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cell", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $cell = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="temp", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $temp = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="soh", type="decimal", precision=15, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $soh = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="soc", type="decimal", precision=15, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $soc = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="powerin", type="decimal", precision=15, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $powerin = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="voltage", type="decimal", precision=15, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $voltage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="voltagein", type="decimal", precision=15, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $voltagein = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="lenlog", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $lenlog = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="accelleromax", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $accelleromax = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="available", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $available = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cable", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $cable = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="locker", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $locker = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="current_pico", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $currentPico = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="balance", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $balance = NULL;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isUnlock_slot", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isunlockSlot = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActived", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isactived = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UtilisateurPico", mappedBy="idPico")
     */
    private $idUtilisateurPico = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUtilisateurPico = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdPico(): ?int
    {
        return $this->idPico;
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

    public function getIssues(): ?string
    {
        return $this->issues;
    }

    public function setIssues(?string $issues): static
    {
        $this->issues = $issues;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getCell(): ?string
    {
        return $this->cell;
    }

    public function setCell(?string $cell): static
    {
        $this->cell = $cell;

        return $this;
    }

    public function getTemp(): ?string
    {
        return $this->temp;
    }

    public function setTemp(?string $temp): static
    {
        $this->temp = $temp;

        return $this;
    }

    public function getSoh(): ?string
    {
        return $this->soh;
    }

    public function setSoh(?string $soh): static
    {
        $this->soh = $soh;

        return $this;
    }

    public function getSoc(): ?string
    {
        return $this->soc;
    }

    public function setSoc(?string $soc): static
    {
        $this->soc = $soc;

        return $this;
    }

    public function getPowerin(): ?string
    {
        return $this->powerin;
    }

    public function setPowerin(?string $powerin): static
    {
        $this->powerin = $powerin;

        return $this;
    }

    public function getVoltage(): ?string
    {
        return $this->voltage;
    }

    public function setVoltage(?string $voltage): static
    {
        $this->voltage = $voltage;

        return $this;
    }

    public function getVoltagein(): ?string
    {
        return $this->voltagein;
    }

    public function setVoltagein(?string $voltagein): static
    {
        $this->voltagein = $voltagein;

        return $this;
    }

    public function getLenlog(): ?int
    {
        return $this->lenlog;
    }

    public function setLenlog(?int $lenlog): static
    {
        $this->lenlog = $lenlog;

        return $this;
    }

    public function getAccelleromax(): ?int
    {
        return $this->accelleromax;
    }

    public function setAccelleromax(?int $accelleromax): static
    {
        $this->accelleromax = $accelleromax;

        return $this;
    }

    public function getAvailable(): ?int
    {
        return $this->available;
    }

    public function setAvailable(?int $available): static
    {
        $this->available = $available;

        return $this;
    }

    public function getCable(): ?int
    {
        return $this->cable;
    }

    public function setCable(?int $cable): static
    {
        $this->cable = $cable;

        return $this;
    }

    public function getLocker(): ?int
    {
        return $this->locker;
    }

    public function setLocker(?int $locker): static
    {
        $this->locker = $locker;

        return $this;
    }

    public function getCurrentPico(): ?int
    {
        return $this->currentPico;
    }

    public function setCurrentPico(?int $currentPico): static
    {
        $this->currentPico = $currentPico;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(?int $balance): static
    {
        $this->balance = $balance;

        return $this;
    }

    public function isIsunlockSlot(): ?bool
    {
        return $this->isunlockSlot;
    }

    public function setIsunlockSlot(?bool $isunlockSlot): static
    {
        $this->isunlockSlot = $isunlockSlot;

        return $this;
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

    /**
     * @return Collection<int, UtilisateurPico>
     */
    public function getIdUtilisateurPico(): Collection
    {
        return $this->idUtilisateurPico;
    }

    public function addIdUtilisateurPico(UtilisateurPico $idUtilisateurPico): static
    {
        if (!$this->idUtilisateurPico->contains($idUtilisateurPico)) {
            $this->idUtilisateurPico->add($idUtilisateurPico);
            $idUtilisateurPico->addIdPico($this);
        }

        return $this;
    }

    public function removeIdUtilisateurPico(UtilisateurPico $idUtilisateurPico): static
    {
        if ($this->idUtilisateurPico->removeElement($idUtilisateurPico)) {
            $idUtilisateurPico->removeIdPico($this);
        }

        return $this;
    }

}
