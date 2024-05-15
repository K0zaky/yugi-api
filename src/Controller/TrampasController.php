<?php

namespace App\Controller;
use App\Entity\Trampa;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class TrampasController extends AbstractController
{
    public function trampas(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $trampas=$this->getDoctrine()
            ->getRepository(Trampa::class)
            ->findAll();
    
            $trampas = $serializer->serialize(
                $trampas,
                'json',
                ['groups' => ['trampa']]
            );
    
            return new Response($trampas);
        }
    }

    public function trampaById(SerializerInterface $serializer, Request $request){

        $idTrampa=$request->get("id");
        $trampa=null;

        $trampa=$this->getDoctrine()
        ->getRepository(Trampa::class)
        ->findOneBy(["id"=>$idTrampa]);


        if ($request->isMethod("GET")){

    
            $trampas = $serializer->serialize(
                $trampa,
                'json',
                ['groups' => ['trampa']]
            );
    
            return new Response($trampas);
        }
    }
}
