<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wish")
 */
class WishController extends AbstractController
{
    /**
     * @Route("/", name="wish_index")
     */
    public function index(WishRepository $wishRepository): Response
    {

        $wish = $wishRepository->findBy(['isPublished' => true], ['dateCreated' => 'DESC']);
        return $this->render('main/index.html.twig', ['bucketlist' => $wish]);
    }

    /**
     * @Route("/{id}", name="wish_show")
     */
    public function show(int $id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);

        if ($wish === null) {

            throw $this->createNotFoundException("pas de liste trouvée");
        }


        return $this->render('main/show.html.twig', [
            'wish' => $wish
        ]);

    }

}
