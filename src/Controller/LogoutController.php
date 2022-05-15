<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dc7161be3dbf2250c8954e560cc35060', name: 'dashboard-')]
class LogoutController extends AbstractController
{
    #[Route('/logout', name: 'logout')]
    public function logout()
    {
    }
}
