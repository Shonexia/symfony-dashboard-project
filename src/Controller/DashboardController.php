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
        // ROLE_ADMIN
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', "Role error", 'You must be a moderator');

        // ovo vodi na istu dashboard stranicu
        // if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_SUPER_ADMIN')) {
        //     return $this->render('dashboard/index.html.twig');
        // } else {
        //     // return new Response('You are not logged in!');
        //     return $this->redirectToRoute(('dashboard-logout'));
        // }


        // if ($this->isGranted('ROLE_ADMIN')) {
        //     return $this->render('dashboard/index.html.twig');
        // } elseif ($this->isGranted('ROLE_SUPER_ADMIN')) {
        //     return $this->render('dashboard/my-profile.html.twig');
        // } elseif ($this->isGranted('ROLE_DEVELOPER')) {
        //     return $this->render('dashboard/my-profile.html.twig');
        // } else
        //     // return new Response('You are not logged in!');
        //     return $this->redirectToRoute(('dashboard-logout'));


        if ($this->isGranted('ROLE_ADMIN')) {
            // return $this->render('dashboard/my-profile.html.twig');
            return $this->redirectToRoute('dashboard-admin-profile');

            //redirect toroute my profile
        } else if ($this->isGranted('ROLE_DEVELOPER')) {
            return $this->redirectToRoute('developers-developer-profile');
        } else
            // return new Response('You are not logged in!');
            return $this->redirectToRoute(('dashboard-logout'));
    }


    // DISPLAY MY PROFILE
    //myprofile/{id}
    #[Route('/my-profile', name: 'my-profile')]
    public function myProfile()
    {

        return $this->render('dashboard/my-profile.html.twig');

        // $myProfile = $ur->find($id);
        // $profile = $ur->findAll();
        // // dd($profile);
        // return $this->render('dashboard/my-profile.html.twig', ['profile' => $profile]);
    }

    #[Route('/admin-profile', name: 'admin-profile')]
    public function adminProfile()
    {
        return $this->render('dashboard/admin-profile.html.twig');
    }
}

// admin profile ruta

// developer profile ruta

// oba ova vode na svoj twig poseban
// i onda u navigaciji napisati ko koji my profile vidi