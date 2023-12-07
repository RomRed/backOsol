<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Firmware
 *
 * @ORM\Table(name="firmware")
 * @ORM\Entity(repositoryClass= "App\Repository\FirmwareRepository")
 */
class Firmware
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_firmware", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFirmware;

    /**
     * @var string|null
     *
     * @ORM\Column(name="version", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $version = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $url = 'NULL';

    public function getIdFirmware(): ?int
    {
        return $this->idFirmware;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }


}
