<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="route_home")
     */
    public function index()
    {
        return $this->redirectToRoute('route_dashboard');
    }
}
