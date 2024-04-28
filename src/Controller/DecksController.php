<?php

namespace App\Controller;
use App\Entity\Deck;
use App\Entity\Usuario;

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

        if($request->isMethod("PUT")){
            if (!empty($deck)){
                $bodyData=$request->getContent();
                $deck=$serializer->deserialize(
                $bodyData,
                Deck::class,
                'json',
                ['object_to_populate'=>$deck]
            ); 

            $this->getDoctrine()->getManager()->persist($deck);
            $this->getDoctrine()->getManager()->flush();
            
            $deck =$serializer->serialize(
                $deck,
                'json',
                ['groups'=>['deck']]

                );

                return new Response($deck);
            }

            
            return new JsonResponse(["msg" => 'Affiliation not found'], 404);
        }

        if ($request->isMethod("DELETE")) {

            $deckId=$request->get("id");

            $deck = $this->getDoctrine()
            ->getRepository(Deck::class)
            ->findOneBy(["id" => $deckId]);

            $deckClon = clone $deck;

    
            $this->getDoctrine()->getManager()->remove($deck);
            $this->getDoctrine()->getManager()->flush();

            $deckClon = $serializer-> serialize(
                $deckClon,
                "json",
                ["groups"=>"deck"]
            );
    
            return new Response($deckClon);
        }

        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"]);
    }

    public function decksByUser(SerializerInterface $serializer, Request $request){

        $idDeck = $request->get('id');

        $deck = $this->getDoctrine()->getRepository(Deck::class)
        ->findOneBy(["id"=> $idDeck]);

        $usuario = $deck->getIdUser();


        if ($request->isMethod("GET")){
            

            $usuario = $serializer->serialize(
                $usuario,
                'json',
                ['groups' => ['podcast']]
            );

            return new Response($usuario);
        }

        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"]);
    }
    
}
