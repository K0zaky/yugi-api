<?php

namespace App\Controller;
use App\Entity\Carta;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class CartasController extends AbstractController
{
    public function cartas(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $cartas=$this->getDoctrine()
            ->getRepository(Carta::class)
            ->findAll();
    
            $cartas = $serializer->serialize(
                $cartas,
                'json',
                ['groups' => ['carta']]
            );
    
            return new Response($cartas);
        }
    }
}
