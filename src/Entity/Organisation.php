<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Organisation
 *
 * @ORM\Table(name="organisation", indexes={@ORM\Index(name="organisation_langage1_FK", columns={"id_langage"}), @ORM\Index(name="organisation_ville2_FK", columns={"id_ville"}), @ORM\Index(name="organisation_badge_algo_FK", columns={"id_badge_algo"}), @ORM\Index(name="organisation_type_connexion0_FK", columns={"id_type_connexion"})})
 * @ORM\Entity(repositoryClass= "App\Repository\OrganisationRepository")
 */
class Organisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_organisation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrganisation;

    /**
     * @var string
     *
     * @ORM\Column(name="raison_sociale", type="string", length=150, nullable=false)
     */
    private $raisonSociale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adresse = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=14, nullable=true, options={"default"="NULL"})
     */
    private $telephone = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_manager", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $nomManager = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_automatic_create_update_users", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $linkAutomaticCreateUpdateUsers = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $logo = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="time_limit", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $timeLimit = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="logs_delay", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $logsDelay = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="min_soc", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $minSoc = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="limit_area", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $limitArea = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbr_pico_par_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $nbrPicoParUser = NULL;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_creation_organisation", type="date", nullable=true, options={"default"="NULL"})
     */
    private $dateCreationOrganisation = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="automation_time", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $automationTime = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isLimited_area", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $islimitedArea = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="lock_state", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $lockState = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isLimited_time", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $islimitedTime = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEnable_gps_data_collect", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isenableGpsDataCollect = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEnable_nfc", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isenableNfc = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEnable_pico_usb_recharge", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isenablePicoUsbRecharge = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isEnable_statistic_section", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $isenableStatisticSection = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat_org", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $latOrg = NULL;

    /**
     * @var float|null
     *
     * @ORM\Column(name="long_org", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $longOrg = NULL;

    /**
     * @var \Langage
     *
     * @ORM\ManyToOne(targetEntity="Langage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_langage", referencedColumnName="id_langage")
     * })
     */
    private $idLangage;

    /**
     * @var \TypeConnexion
     *
     * @ORM\ManyToOne(targetEntity="TypeConnexion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_connexion", referencedColumnName="id_type_connexion")
     * })
     */
    private $idTypeConnexion;

    /**
     * @var \BadgeAlgo
     *
     * @ORM\ManyToOne(targetEntity="BadgeAlgo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_badge_algo", referencedColumnName="id_badge_algo")
     * })
     */
    private $idBadgeAlgo;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ville", referencedColumnName="id_ville")
     * })
     */
    private $idVille;

    public function getIdOrganisation(): ?int
    {
        return $this->idOrganisation;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): static
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNomManager(): ?string
    {
        return $this->nomManager;
    }

    public function setNomManager(?string $nomManager): static
    {
        $this->nomManager = $nomManager;

        return $this;
    }

    public function getLinkAutomaticCreateUpdateUsers(): ?string
    {
        return $this->linkAutomaticCreateUpdateUsers;
    }

    public function setLinkAutomaticCreateUpdateUsers(?string $linkAutomaticCreateUpdateUsers): static
    {
        $this->linkAutomaticCreateUpdateUsers = $linkAutomaticCreateUpdateUsers;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getTimeLimit(): ?int
    {
        return $this->timeLimit;
    }

    public function setTimeLimit(?int $timeLimit): static
    {
        $this->timeLimit = $timeLimit;

        return $this;
    }

    public function getLogsDelay(): ?int
    {
        return $this->logsDelay;
    }

    public function setLogsDelay(?int $logsDelay): static
    {
        $this->logsDelay = $logsDelay;

        return $this;
    }

    public function getMinSoc(): ?int
    {
        return $this->minSoc;
    }

    public function setMinSoc(?int $minSoc): static
    {
        $this->minSoc = $minSoc;

        return $this;
    }

    public function getLimitArea(): ?int
    {
        return $this->limitArea;
    }

    public function setLimitArea(?int $limitArea): static
    {
        $this->limitArea = $limitArea;

        return $this;
    }

    public function getNbrPicoParUser(): ?int
    {
        return $this->nbrPicoParUser;
    }

    public function setNbrPicoParUser(?int $nbrPicoParUser): static
    {
        $this->nbrPicoParUser = $nbrPicoParUser;

        return $this;
    }

    public function getDateCreationOrganisation(): ?\DateTimeInterface
    {
        return $this->dateCreationOrganisation;
    }

    public function setDateCreationOrganisation(?\DateTimeInterface $dateCreationOrganisation): static
    {
        $this->dateCreationOrganisation = $dateCreationOrganisation;

        return $this;
    }

    public function getAutomationTime(): ?\DateTimeInterface
    {
        return $this->automationTime;
    }

    public function setAutomationTime(?\DateTimeInterface $automationTime): static
    {
        $this->automationTime = $automationTime;

        return $this;
    }

    public function isIslimitedArea(): ?bool
    {
        return $this->islimitedArea;
    }

    public function setIslimitedArea(?bool $islimitedArea): static
    {
        $this->islimitedArea = $islimitedArea;

        return $this;
    }

    public function isLockState(): ?bool
    {
        return $this->lockState;
    }

    public function setLockState(?bool $lockState): static
    {
        $this->lockState = $lockState;

        return $this;
    }

    public function isIslimitedTime(): ?bool
    {
        return $this->islimitedTime;
    }

    public function setIslimitedTime(?bool $islimitedTime): static
    {
        $this->islimitedTime = $islimitedTime;

        return $this;
    }

    public function isIsenableGpsDataCollect(): ?bool
    {
        return $this->isenableGpsDataCollect;
    }

    public function setIsenableGpsDataCollect(?bool $isenableGpsDataCollect): static
    {
        $this->isenableGpsDataCollect = $isenableGpsDataCollect;

        return $this;
    }

    public function isIsenableNfc(): ?bool
    {
        return $this->isenableNfc;
    }

    public function setIsenableNfc(?bool $isenableNfc): static
    {
        $this->isenableNfc = $isenableNfc;

        return $this;
    }

    public function isIsenablePicoUsbRecharge(): ?bool
    {
        return $this->isenablePicoUsbRecharge;
    }

    public function setIsenablePicoUsbRecharge(?bool $isenablePicoUsbRecharge): static
    {
        $this->isenablePicoUsbRecharge = $isenablePicoUsbRecharge;

        return $this;
    }

    public function isIsenableStatisticSection(): ?bool
    {
        return $this->isenableStatisticSection;
    }

    public function setIsenableStatisticSection(?bool $isenableStatisticSection): static
    {
        $this->isenableStatisticSection = $isenableStatisticSection;

        return $this;
    }

    public function getLatOrg(): ?float
    {
        return $this->latOrg;
    }

    public function setLatOrg(?float $latOrg): static
    {
        $this->latOrg = $latOrg;

        return $this;
    }

    public function getLongOrg(): ?float
    {
        return $this->longOrg;
    }

    public function setLongOrg(?float $longOrg): static
    {
        $this->longOrg = $longOrg;

        return $this;
    }

    public function getIdLangage(): ?Langage
    {
        return $this->idLangage;
    }

    public function setIdLangage(?Langage $idLangage): static
    {
        $this->idLangage = $idLangage;

        return $this;
    }

    public function getIdTypeConnexion(): ?TypeConnexion
    {
        return $this->idTypeConnexion;
    }

    public function setIdTypeConnexion(?TypeConnexion $idTypeConnexion): static
    {
        $this->idTypeConnexion = $idTypeConnexion;

        return $this;
    }

    public function getIdBadgeAlgo(): ?BadgeAlgo
    {
        return $this->idBadgeAlgo;
    }

    public function setIdBadgeAlgo(?BadgeAlgo $idBadgeAlgo): static
    {
        $this->idBadgeAlgo = $idBadgeAlgo;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): static
    {
        $this->idVille = $idVille;

        return $this;
    }


}
