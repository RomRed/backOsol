<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base
 *
 * @ORM\Table(name="base", indexes={@ORM\Index(name="base_organisation2_FK", columns={"id_organisation"}), @ORM\Index(name="base_ac_mode_FK", columns={"id_ac_mode"}), @ORM\Index(name="base_mode_charge0_FK", columns={"id_mode_charge"}), @ORM\Index(name="base_firmware1_FK", columns={"id_firmware"})})
 * @ORM\Entity(repositoryClass= "App\Repository\BaseRepository")
 */
class Base
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_base", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBase;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_alias", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $shortAlias = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="long_alias", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $longAlias = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="localisation_installation", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $localisationInstallation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude_base", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $latitudeBase = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude_base", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $longitudeBase = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mac_wifi", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $macWifi = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mac_ethernet", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $macEthernet = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse_ip", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $adresseIp = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="qr_code", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $qrCode = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEnable_auth_local", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isenableAuthLocal = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActived_maintenance_mode", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isactivedMaintenanceMode = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActived_status", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isactivedStatus = 'NULL';

    /**
     * @var \AcMode
     *
     * @ORM\ManyToOne(targetEntity="AcMode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ac_mode", referencedColumnName="id_ac_mode")
     * })
     */
    private $idAcMode;

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
     * @var \Firmware
     *
     * @ORM\ManyToOne(targetEntity="Firmware")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_firmware", referencedColumnName="id_firmware")
     * })
     */
    private $idFirmware;

    /**
     * @var \ModeCharge
     *
     * @ORM\ManyToOne(targetEntity="ModeCharge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_mode_charge", referencedColumnName="id_mode_charge")
     * })
     */
    private $idModeCharge;

    public function getIdBase(): ?int
    {
        return $this->idBase;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getShortAlias(): ?string
    {
        return $this->shortAlias;
    }

    public function setShortAlias(?string $shortAlias): static
    {
        $this->shortAlias = $shortAlias;

        return $this;
    }

    public function getLongAlias(): ?string
    {
        return $this->longAlias;
    }

    public function setLongAlias(?string $longAlias): static
    {
        $this->longAlias = $longAlias;

        return $this;
    }

    public function getLocalisationInstallation(): ?string
    {
        return $this->localisationInstallation;
    }

    public function setLocalisationInstallation(?string $localisationInstallation): static
    {
        $this->localisationInstallation = $localisationInstallation;

        return $this;
    }

    public function getLatitudeBase(): ?string
    {
        return $this->latitudeBase;
    }

    public function setLatitudeBase(?string $latitudeBase): static
    {
        $this->latitudeBase = $latitudeBase;

        return $this;
    }

    public function getLongitudeBase(): ?string
    {
        return $this->longitudeBase;
    }

    public function setLongitudeBase(?string $longitudeBase): static
    {
        $this->longitudeBase = $longitudeBase;

        return $this;
    }

    public function getMacWifi(): ?string
    {
        return $this->macWifi;
    }

    public function setMacWifi(?string $macWifi): static
    {
        $this->macWifi = $macWifi;

        return $this;
    }

    public function getMacEthernet(): ?string
    {
        return $this->macEthernet;
    }

    public function setMacEthernet(?string $macEthernet): static
    {
        $this->macEthernet = $macEthernet;

        return $this;
    }

    public function getAdresseIp(): ?string
    {
        return $this->adresseIp;
    }

    public function setAdresseIp(?string $adresseIp): static
    {
        $this->adresseIp = $adresseIp;

        return $this;
    }

    public function getQrCode(): ?string
    {
        return $this->qrCode;
    }

    public function setQrCode(?string $qrCode): static
    {
        $this->qrCode = $qrCode;

        return $this;
    }

    public function isIsenableAuthLocal(): ?bool
    {
        return $this->isenableAuthLocal;
    }

    public function setIsenableAuthLocal(?bool $isenableAuthLocal): static
    {
        $this->isenableAuthLocal = $isenableAuthLocal;

        return $this;
    }

    public function isIsactivedMaintenanceMode(): ?bool
    {
        return $this->isactivedMaintenanceMode;
    }

    public function setIsactivedMaintenanceMode(?bool $isactivedMaintenanceMode): static
    {
        $this->isactivedMaintenanceMode = $isactivedMaintenanceMode;

        return $this;
    }

    public function isIsactivedStatus(): ?bool
    {
        return $this->isactivedStatus;
    }

    public function setIsactivedStatus(?bool $isactivedStatus): static
    {
        $this->isactivedStatus = $isactivedStatus;

        return $this;
    }

    public function getIdAcMode(): ?AcMode
    {
        return $this->idAcMode;
    }

    public function setIdAcMode(?AcMode $idAcMode): static
    {
        $this->idAcMode = $idAcMode;

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

    public function getIdFirmware(): ?Firmware
    {
        return $this->idFirmware;
    }

    public function setIdFirmware(?Firmware $idFirmware): static
    {
        $this->idFirmware = $idFirmware;

        return $this;
    }

    public function getIdModeCharge(): ?ModeCharge
    {
        return $this->idModeCharge;
    }

    public function setIdModeCharge(?ModeCharge $idModeCharge): static
    {
        $this->idModeCharge = $idModeCharge;

        return $this;
    }


}
