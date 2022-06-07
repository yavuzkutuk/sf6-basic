<?php

namespace App\Controller;

use App\Service\Mailer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Mailer $mailer): Response
    {
        try {
            $mailer->send();
        } catch (TransportExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
