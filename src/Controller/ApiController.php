<?php

namespace App\Controller;

use App\Entity\Base;
use App\Entity\Pico;
use App\Entity\AcMode;
use App\Entity\Firmware;
use App\Entity\SlotBase;
use App\Entity\ModeCharge;
use App\Entity\Organisation;
use App\Entity\UtilisateurPico;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class ApiController extends AbstractController
{
    private ManagerRegistry $managerRegistry;

    private JWTTokenManagerInterface $jwtManager;
    private UserPasswordHasherInterface  $passwordEncoder;

    public function __construct(ManagerRegistry $managerRegistry, JWTTokenManagerInterface $jwtManager, UserPasswordHasherInterface $passwordEncoder)
    {
        $this->managerRegistry = $managerRegistry;
        $this->jwtManager = $jwtManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    
    #[Route('/api', name: 'app_api')]
    public function getUsers()
{
    
    $userRepository  = $this->managerRegistry->getRepository(UtilisateurPico::class);
    $users = $userRepository->findAll();

    $data = [];

    foreach ($users as $user) {
        $data[] = [
            'idUtilisateurPico' => $user->getIdUtilisateurPico(),
            'numBadge' => $user->getNumBadge(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email'=> $user-> getEmail(),
            'mdp'=> $user-> getMdp(),
        ];
    }


    return new JsonResponse($data);
}

#[Route('/api/login', name: 'app_api_login', methods: ['POST'])]
public function login(Request $request, Security $security)
{
    $data = json_decode($request->getContent(), true);

    $userRepository = $this->managerRegistry->getRepository(UtilisateurPico::class);
    $user = $userRepository->findOneBy(['email' => $data['email']]);

    if (!$user || !$this->passwordEncoder->isPasswordValid($user, $data['password'])) {
        return new JsonResponse(['message' => 'Identifiants incorrects'], Response::HTTP_UNAUTHORIZED);
    }

    $token = $this->jwtManager->create($user);

    // Ajoute les informations de l'utilisateur dans la réponse
    $userData = [
        'idUtilisateurPico' => $user->getIdUtilisateurPico(),
        'numBadge' => $user->getNumBadge(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'email'=> $user->getEmail(),
    ];

    // Retourne les informations de l'utilisateur dans la réponse
    return new JsonResponse(['token' => $token, 'user' => $userData, 'message' => 'Authentification réussie']);
}

#[Route('/api/user', name: 'app_api_user', methods: ['GET'])]
    public function getUserInfo(Security $security)
    {
        $user = $security->getUser();

        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non authentifié'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $userData = [
            'idUtilisateurPico' => $user->getIdUtilisateurPico(),
            'numBadge' => $user->getNumBadge(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email'=> $user->getEmail(),
        ];

        return new JsonResponse(['user' => $userData]);
    }


    #[Route('/api/pico', name: 'app_api_pico', methods: ['GET'])]
    public function getPicos(): JsonResponse
    {
        
        $picoRepository = $this->managerRegistry->getRepository(Pico::class);
        $picos = $picoRepository->findAll();

        $data = [];

        foreach ($picos as $pico) {
            $data[] = [
                'idPico' => $pico->getIdPico(),
                'alias' => $pico->getAlias(),
                'issues' => $pico->getIssues(),
                'version' => $pico->getVersion(),
                'cell' => $pico->getCell(),
                'temp' => $pico->getTemp(),
                'soh' => $pico->getSoh(),
                'soc' => $pico->getSoc(),
                'powerin' => $pico->getPowerin(),
                'voltage' => $pico->getVoltage(),
                'voltagein' => $pico->getVoltagein(),
                'lenlog' => $pico->getLenlog(),
                'accelleromax' => $pico->getAccelleromax(),
                'available' => $pico->getAvailable(),
                'cable' => $pico->getCable(),
                'locker' => $pico->getLocker(),
                'currentPico' => $pico->getCurrentPico(),
                'balance' => $pico->getBalance(),
                'isunlockSlot' => $pico->isIsunlockSlot(),
                'isactived' => $pico->isIsactived(),
            ];
        }

        return $this->json($data);
    }



    #[Route('/api/bases', name: 'app_api_bases', methods: ['POST'])]
public function addBase(Request $request): JsonResponse
{
    $data = json_decode($request->getContent(), true);
    
        $idAcMode = $data['idAcMode'];
        $acMode = $this->managerRegistry->getRepository(AcMode::class)->find($idAcMode);

        $idModeCharge = $data['idModeCharge'];
        $modeCharge = $this->managerRegistry->getRepository(ModeCharge::class)->find($idModeCharge);
    
        $idFirmware = $data['idFirmware'];
        $firmware = $this->managerRegistry->getRepository(Firmware::class)->find($idFirmware);
    
        $idOrganisation = $data['idOrganisation'];
        $organisation = $this->managerRegistry->getRepository(Organisation::class)->find($idOrganisation);

    $base = new Base();
    $base->setDescription($data['description']);
    $base->setShortAlias($data['shortAlias']);
    $base->setLongAlias($data['longAlias']);
    $base->setLocalisationInstallation($data['localisationInstallation']);
    $base->setLatitudeBase($data['latitudeBase']);
    $base->setLongitudeBase($data['longitudeBase']);
    $base->setMacWifi($data['macWifi']);
    $base->setMacEthernet($data['macEthernet']);
    $base->setAdresseIp($data['adresseIp']);
    $base->setQrCode($data['qrCode']);
    $base->setIsenableAuthLocal(isset($data['isenableAuthLocal']));
    $base->setIsactivedMaintenanceMode(isset($data['isactivedMaintenanceMode']));
    $base->setIsactivedStatus(isset($data['isactivedStatus']));
    $base->setIdAcMode($acMode);
    $base->setIdModeCharge($modeCharge);
    $base->setIdFirmware($firmware);
    $base->setIdOrganisation($organisation);
    
    //  la nouvelle base est dans la base de données :
    $entityManager = $this->managerRegistry->getManager();
    $entityManager->persist($base);
    $entityManager->flush();

    return new JsonResponse(['message' => 'Base ajoutée avec succès'], JsonResponse::HTTP_CREATED);
}



#[Route('/api/mode_charges', name: 'api_mode_charges', methods: ['GET'])]
public function getModeCharges(): JsonResponse
{
    $modeChargeRepository = $this->managerRegistry->getRepository(ModeCharge::class);
    $modeCharges = $modeChargeRepository->findAll();

    $data = [];

    foreach ($modeCharges as $modeCharge) {
        $data[] = [
            'idModeCharge' => $modeCharge->getIdModeCharge(),
            // 'nomModeCharge' => $modeCharge->getLibelleModeCharge(),
        ];
    }

    return new JsonResponse($data);
}


#[Route('/api/firmwares', name: 'api_firmwares', methods: ['GET'])]
public function getFirmwares(): JsonResponse
{
    $firmwareRepository = $this->managerRegistry->getRepository(Firmware::class);
    $firmwares = $firmwareRepository->findAll();

    $data = [];

    foreach ($firmwares as $firmware) {
        $data[] = [
            'idFirmware' => $firmware->getIdFirmware(),
            // 'version' => $firmware->getVersion(),
        ];
    }

    return new JsonResponse($data);
}

#[Route('/api/organisations', name: 'api_organisations', methods: ['GET'])]
public function getOrganisations(): JsonResponse
{
    $organisationRepository = $this->managerRegistry->getRepository(Organisation::class);
    $organisations = $organisationRepository->findAll();

    $data = [];

    foreach ($organisations as $organisation) {
        $data[] = [
            'idOrganisation' => $organisation->getIdOrganisation(),
            'raisonSociale' => $organisation->getRaisonSociale(),
            'adresse'=>$organisation->getAdresse(),
            'email'=>$organisation->getEmail(),
            'telephone'=>$organisation->getTelephone(),
            'nom_manager'=>$organisation->getNomManager(),
            'link_automatic_create_update_users'=>$organisation->getLinkAutomaticCreateUpdateUsers(),
            'logo'=>$organisation->getLogo(),
            'time_limit'=>$organisation->getTimeLimit(),
            'logs_delay'=>$organisation->getLogsDelay(),
            'min_soc'=>$organisation->getMinSoc(),
            'limit_area'=>$organisation->getLimitArea(),
            'nbr_pico_par_user'=>$organisation->getNbrPicoParUser(),
            'date_creation_organisation'=>$organisation->getDateCreationOrganisation(),
            'automation_time'=>$organisation->getAutomationTime(),
            'isLimited_area'=>$organisation->isIslimitedArea(),
            'lock-state'=>$organisation->isLockState(),
            'isEnable_gps_data_collect'=>$organisation->isIsenableGpsDataCollect(),
            'isEnable_nfc'=>$organisation->isIsenableNfc(),
            'isEnable_pico_usb_recharge'=>$organisation->isIsenablePicoUsbRecharge(),
            'isEnable_statistic_section'=>$organisation->isIsenableStatisticSection(),
            'lat_org'=>$organisation->getLatOrg(),
            'long_org'=>$organisation->getLongOrg(),
            // 'id_badge_algo'=>$organisation->getIdBadgeAlgo(), 
            // 'id_type_connexion'=>$organisation->getIdTypeConnexion(),
            // 'id_langue'=>$organisation->getIdLangage(),
            // 'id_ville'=>$organisation->getIdVille()

        ];
    }

    return new JsonResponse($data);
}

#[Route('/api/ac_mode', name: 'api_ac_mode', methods: ['GET'])]
public function getAcMode(): JsonResponse
{
    $AcModeRepository = $this->managerRegistry->getRepository(AcMode::class);
    $AcModes = $AcModeRepository->findAll();

    $data = [];

    foreach ($AcModes as $AcMode) {
        $data[] = [
            'idAcMode' => $AcMode->getIdAcMode(),
            // 'libelleAcMode' => $AcMode->getLibelleAcMode(),
        ];
    }

    return new JsonResponse($data);
}

#[Route('/api/basesliste', name: 'app_api_bases_liste', methods: ['GET'])]
public function getBase(): JsonResponse
{

    $baseRepository = $this->managerRegistry->getRepository(base::class);
    $bases = $baseRepository->findAll();

    $data = [];
    foreach ($bases as $base) {


    $data [] = [
        'id_base' => $base->getIdBase(),
        'description' => $base->getDescription(),
        'short_alias' => $base->getShortAlias(),
        'long_alias' => $base->getLongAlias(),
        'localisation_installation' => $base->getLocalisationInstallation(),
        'latitude_base' => $base->getLatitudeBase(),
        'longitude_base' => $base->getLongitudeBase(),
        'mac_wifi' => $base->getMacWifi(),
        'mac_ethernet' => $base->getMacEthernet(),
        'adresse_ip' => $base->getAdresseIp(),
        'qr_code' => $base->getQrCode(),
        'isenable_auth_local' => $base->isIsenableAuthLocal(),
        'isactived_maintenance_mode' => $base->isIsactivedMaintenanceMode(),
        'isactived_status' => $base->isIsactivedStatus(),

        'ac_mode' => [
            'id_ac_mode' => $base->getIdAcMode()->getIdAcMode(),

        ],
        'organisation' => [
            'id_organisation' => $base->getIdOrganisation()->getIdOrganisation(),

        ],
        'firmware' => [
            'id_firmware' => $base->getIdFirmware()->getIdFirmware(),

        ],
        'mode_charge' => [
            'id_mode_charge' => $base->getIdModeCharge()->getIdModeCharge(),

        ],
    ];

    }
    return $this->json($data);
}


#[Route('/api/baseDelete', name: 'app_api_bases_delete', methods: ['DELETE'])]
public function delete(Request $request, EntityManagerInterface $entityManager): Response
{
    try {
        $data = json_decode($request->getContent(), true);
        $ids = $data['ids'] ?? null;

        if (!$ids) {
            return $this->json(['error' => 'Aucun ID spécifié pour la suppression'], Response::HTTP_BAD_REQUEST);
        }


        foreach ($ids as $id) {
            $base = $entityManager->getRepository(Base::class)->find($id);
            if ($base) {

                $slotBases = $entityManager->getRepository(SlotBase::class)->findBy(['idBase' => $base]);
                foreach ($slotBases as $slotBase) {
                    $entityManager->remove($slotBase);
                }
                $entityManager->remove($base);
            }
        }

        $entityManager->flush();

        return $this->json(['message' => 'Base supprimée avec succès'], Response::HTTP_OK);
    } catch (\Exception $e) {
        error_log('Exception lors de la suppression de la base: ' . $e->getMessage());

        return $this->json(['error' => 'Erreur lors de la suppression de la base: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

}
