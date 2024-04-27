<?php

namespace App\Controller;
use App\Entity\Deck;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class DecksController extends AbstractController
{
    public function decks(SerializerInterface $serializer, Request $request)
    {
        if ($request->isMethod("GET")){
            $decks=$this->getDoctrine()
            ->getRepository(Deck::class)
            ->findAll();
    
            $decks = $serializer->serialize(
                $decks,
                'json',
                ['groups' => ['deck']]
            );
    
            return new Response($decks);
        }

        if ($request->isMethod("POST")) {
            $bodyData = $request->getContent();
            $decks = $serializer->deserialize(
                $bodyData, Deck::class,
                'json'
            );

            $this->getDoctrine()->getManager()->persist($decks);
            $this->getDoctrine()->getManager()->flush();

            $decks = $serializer->serialize(
                $decks,
                "json",
                ["groups" => ["affiliation"]]);

            return new Response($decks);
        }

        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"]);
        
    }

    public function deckById(SerializerInterface $serializer, Request $request){

        $idDeck=$request->get("id");
        $deck=null;

        $deck=$this->getDoctrine()
        ->getRepository(Deck::class)
        ->findOneBy(["id"=>$idDeck]);

        $deckTitle=$deck->getNombre();



        if ($request->isMethod("GET")){

    
            $decks = $serializer->serialize(
                $deck,
                'json',
                ['groups' => ['deck']]
            );
    
            return new Response($decks);
        }

        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"]);
    }
    
}
