<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\MatiereRepository;
use App\Entity\Matiere;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(matiereRepository $matiereRepository): Response
    {

        $matieres = $matiereRepository ->findAll();

        $u = new User();
        $u->setRoles(["ROLE_USER"]);

        return $this->render('home/index.html.twig', [
            'matieres' => $matieres,
        ]);
    }
}
