<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/clients', name: 'clients-')]
#[isGranted('IS_AUTHENTICATED_FULLY')]

class ClientController extends AbstractController
{
    // DISPLAY ALL DEVELOPERS
    #[Route('/all-clients', name: 'all-clients')]
    #[IsGranted('ROLE_ADMIN')]
    public function allClients(ClientRepository $cr, Request $request)
    {
        // FIND ALL CLIENTS
        $clients = $cr->findAll();

        // ADD NEW CLIENT
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $cr->add($client, true);
            return $this->redirectToRoute('clients-all-clients');
        }
        // DISPLAY ALL CLIENTS
        return $this->render('client/all-clients.html.twig', ['clients' => $clients, 'form' => $form->createView()]);
    }

    // ADD CLIENT
    // #[Route('/add-client', name: 'add-client')]
    // public function addClient(ClientRepository $cr, Request $request)
    // {
    //     $client = new Client();
    //     $form = $this->createForm(ClientType::class, $client);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $client = $form->getData();
    //         $cr->add($client);
    //         return $this->redirectToRoute('clients-all-clients');
    //     }
    //     return $this->render('client/all-clients.html.twig', ['form' => $form->createView()]);
    // }

    // EDIT CLIENT
    #[Route('/edit-client/{id}', name: 'edit-client')]
    public function editClient($id, ClientRepository $cr, Request $request)
    {
        $client = $cr->find($id);

        $editClientForm = $this->createForm(ClientType::class, $client, [
            'method' => 'PUT',
            'action' => $this->generateUrl('clients-edit-client', ['id' => $id])
        ]);

        $editClientForm->handleRequest($request);

        if ($editClientForm->isSubmitted() && $editClientForm->isValid() && $request->isMethod("PUT")) {
            $editedClient = $editClientForm->getData();
            dd($editedClient);
            $cr->add($editedClient, true);

            return $this->redirectToRoute('clients-all-clients');
        }

        return $this->render('client/client-profile.html.twig', ['client' => $client, 'editform' => $editClientForm->createView()]);
    }

    // DELETE CLIENT
    #[Route('/delete-client/{id}', name: 'delete-client')]
    public function deleteClient($id, ClientRepository $cr)
    {
        $client = $cr->find($id);
        if ($client == null)
            throw $this->createNotFoundException('Client not found!');
        $cr->remove($client, true);

        return $this->redirectToRoute('clients-all-clients');
    }
}
