<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dc7161be3dbf2250c8954e560cc35060', name: 'dashboard-')]
#[isGranted('IS_AUTHENTICATED_FULLY')]

class DashboardController extends AbstractController
{
    #[Route('/', name: 'index')]
    // #[isGranted('ROLE_ADMIN)]
    public function index()
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('dashboard-admin-profile');
        } else if ($this->isGranted('ROLE_DEVELOPER')) {
            return $this->redirectToRoute('developers-developer-profile');
        } else
            return $this->redirectToRoute(('dashboard-logout'));
    }


    // DISPLAY MY PROFILE
    #[Route('/my-profile', name: 'my-profile')]
    public function myProfile()
    {
        return $this->render('dashboard/my-profile.html.twig');
    }

    #[Route('/admin-profile', name: 'admin-profile')]
    public function adminProfile()
    {
        return $this->render('dashboard/admin-profile.html.twig');
    }
}
