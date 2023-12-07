<?php

namespace App\Controller;

use App\Entity\UtilisateurPico;

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

}
