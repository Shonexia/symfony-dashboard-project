<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/developers', name: 'developers-')]
#[isGranted('IS_AUTHENTICATED_FULLY')]

class DeveloperController extends AbstractController
{

    // DISPLAY ALL DEVELOPERS
    #[Route('/all-developers', name: 'all-developers')]
    #[IsGranted('ROLE_ADMIN')]
    public function allDevelopers(UserRepository $ur)
    {
        $developers = $ur->findAll();
        return $this->render('developer/all-developers.html.twig', ['developers' => $developers]);
    }

    // VIEW DEVELOPER PROFILE
    #[Route('/developer-profile', name: 'developer-profile')]
    public function developerProfile()
    {
        return $this->render('developer/developer-profile.html.twig');
    }
}
