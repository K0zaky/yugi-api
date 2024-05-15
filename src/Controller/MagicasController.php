<?php

namespace App\Controller;
use App\Entity\Magica;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class MagicasController extends AbstractController
{
    public function magicas(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $magicas=$this->getDoctrine()
            ->getRepository(Magica::class)
            ->findAll();
    
            $magicas = $serializer->serialize(
                $magicas,
                'json',
                ['groups' => ['magica']]
            );
    
            return new Response($magicas);
        }
    }

    public function magicaById(SerializerInterface $serializer, Request $request){

        $idMagica=$request->get("id");
        $magica=null;

        $magica=$this->getDoctrine()
        ->getRepository(Magica::class)
        ->findOneBy(["id"=>$idMagica]);


        if ($request->isMethod("GET")){

    
            $magicas = $serializer->serialize(
                $magica,
                'json',
                ['groups' => ['magica']]
            );
    
            return new Response($magicas);
        }
    }
}
