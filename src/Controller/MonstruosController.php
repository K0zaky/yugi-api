<?php

namespace App\Controller;
use App\Entity\Monstruo;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class MonstruosController extends AbstractController
{
    public function monstruos(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $monstruos=$this->getDoctrine()
            ->getRepository(Monstruo::class)
            ->findAll();
    
            $monstruos = $serializer->serialize(
                $monstruos,
                'json',
                ['groups' => ['monstruo']]
            );
    
            return new Response($monstruos);
        }
    }
}
