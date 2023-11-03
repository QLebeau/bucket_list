<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function about()
    {
        $jsonData = file_get_contents('../templates/main/team.json');
        $decodedData = json_decode($jsonData, true);

        return $this->render('main/aboutus.html.twig', [
            'teamMembers' => $decodedData,
        ]);
    }


}
