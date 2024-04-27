<?php

namespace App\Controller;
use App\Entity\Usuario;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class UsuariosController extends AbstractController
{
    public function usuarios(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $usuarios=$this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findAll();
    
            $usuarios = $serializer->serialize(
                $usuarios,
                'json',
                ['groups' => ['usuario']]
            );
    
            return new Response($usuarios);
        }


        if ($request->isMethod("POST")) {
            $bodyData = $request->getContent();
            $usuarios = $serializer->deserialize(
                $bodyData, Usuario::class,
                'json'
            );

            $this->getDoctrine()->getManager()->persist($usuarios);
            $this->getDoctrine()->getManager()->flush();

            $usuarios = $serializer->serialize(
                $usuarios,
                "json",
                ["groups" => ["affiliation"]]);

            return new Response($usuarios);
        }

        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"]);
    }
}
