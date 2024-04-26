<?php

namespace App\Controller;

use App\Entity\Short;
use App\Repository\ShortRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ShortThisController extends AbstractController
{
    #[Route('/short_this', name: 'app_short_this', methods: ['POST'])]
    public function index(Request $request, ShortRepository $url, EntityManagerInterface $em): JsonResponse
    {
        //agregar el nuevo link a la base de datos
        $shortlink = new Short;
        $shortlink->setUrl($request->get('url'));

        //generar el nuevo shortlink
        

        //esto me esta devolviendo toda la info de la db
        $links = $url->findAll();
        $data = [];
        foreach ($links as $link) {
            $data[] = [
                'url' => $link->getUrl(),
            ];
        };
        //devuelvo con json
        return $this->json([
            'success' => true,
            'data' => $request->get('url')
        ]);
    }


}
