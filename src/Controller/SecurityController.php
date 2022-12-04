<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{


    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $utils): Response
    {
        $formView = $this->createForm(LoginType::class);

        return $this->render('security/login.html.twig', [
            'formView' => $formView->createView(),
            'error' => $utils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        throw new \Exception("logout() should never be reached");
    }
}
