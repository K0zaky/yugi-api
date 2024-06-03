<?php

namespace App\Controller;
use App\Entity\Deck;
use App\Entity\Usuario;
use App\Entity\Carta;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Routing\Annotation\Route;

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

            $requestData = json_decode($request->getContent(), true);
    
            if (!isset($requestData['id_user'])) {
                return new JsonResponse(["msg" => "Field 'id_user' is required"], 400);
            }
    
            $userId = $requestData['id_user'];
    
            $user = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->find($userId);
    
            if (!$user) {
                return new JsonResponse(["msg" => "User not found"], 404);
            }
    
            $deck = new Deck();
            $deck->setNombre($requestData['nombre']);
            $deck->setPrecio($requestData['precio']);
            $deck->setIdUser($user);
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($deck);
            $entityManager->flush();
    
            $serializedDeck = $serializer->serialize(
                $deck,
                'json',
                ['groups' => ['deck']]
            );
    
            return new Response($serializedDeck);
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

        if ($request->isMethod("PUT")) {
            $bodyData = $request->getContent();
        
            $entityManager = $this->getDoctrine()->getManager();
        
            $idDeck = $request->get("id");
            $deck = $entityManager->getRepository(Deck::class)->findOneBy(["id" => $idDeck]);
        
            if (!$deck) {
                return new JsonResponse(["msg" => 'Deck not found'], 404);
            }
        
            $requestData = json_decode($bodyData, true);
        
            unset($requestData['id_user']);
        

            $updatedDeck = $serializer->deserialize(
                json_encode($requestData),
                Deck::class,
                'json',
                [AbstractNormalizer::OBJECT_TO_POPULATE => $deck]
            );
   
            $entityManager->flush();
        
            $serializedDeck = $serializer->serialize(
                $updatedDeck,
                'json',
                ['groups' => ['deck']]
            );
        
            return new Response($serializedDeck);
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

    public function decksByUser(SerializerInterface $serializer, Request $request)
    {
        $userId = $request->get('id');
    
        $decks = $this->getDoctrine()->getRepository(Deck::class)
            ->findBy(['idUser' => $userId]);
    
        if (!$decks) {
            return new JsonResponse(["msg" => "No decks found for the user with ID: $userId"], 404);
        }
    
        if ($request->isMethod("GET")) {
            $serializedDecks = $serializer->serialize(
                $decks,
                'json',
                ['groups' => ['deck']]
            );
    
            return new Response($serializedDecks);
        }
    
        return new JsonResponse(["msg" => $request->getMethod() . " not allowed"], 405);
    }

    public function cartaEnDeck(SerializerInterface $serializer, Request $request, int $deck_id)
    {
        $entityManager = $this->getDoctrine()->getManager();
    
        $deck = $entityManager->getRepository(Deck::class)->find($deck_id);
    
        if (!$deck) {
            return new Response('Deck not found', Response::HTTP_NOT_FOUND);
        }

        $cartasEnDeck = $deck->getIdCarta();

        $serializedCartas = $serializer->serialize(
            $cartasEnDeck,
            'json',
            ['groups' => ['carta']]
        );

        return new Response($serializedCartas);
    }

    /**
     * @Route("/deck/{deck_id}", name="add_carta_to_deck", methods={"PUT"})
     */
    public function addCartaToDeck(SerializerInterface $serializer, Request $request, $deck_id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        

        $deck = $entityManager->getRepository(Deck::class)->find($deck_id);
        if (!$deck) {
            return new Response("No se encontró el mazo con el ID proporcionado.", Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $carta_id = $data['id_carta'] ?? null;

        if (!$carta_id) {
            return new Response("El ID de la carta no fue proporcionado en la solicitud.", Response::HTTP_BAD_REQUEST);
        }

        $carta = $entityManager->getRepository(Carta::class)->find($carta_id);
        if (!$carta) {
            return new Response("No se encontró la carta con el ID proporcionado.", Response::HTTP_NOT_FOUND);
        }

        $deck->addIdCarta($carta);
        $entityManager->flush();

        $serializedCarta = $serializer->serialize(
            $carta,
            'json',
            ['groups' => ['carta']]
        );

        return new Response($serializedCarta);
    }
    
public function removeCartaFromDeck(Request $request, int $deck_id, int $carta_id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    
    $deck = $entityManager->getRepository(Deck::class)->find($deck_id);
    
    if (!$deck) {
        return new Response('Deck no encontrado', Response::HTTP_NOT_FOUND);
    }

    $carta = $entityManager->getRepository(Carta::class)->find($carta_id);
    
    if (!$carta) {
        return new Response('Carta no encontrada', Response::HTTP_NOT_FOUND);
    }

    $deck->removeIdCarta($carta);

    $entityManager->flush();

    return new Response('Carta removed from Deck', Response::HTTP_OK);
}
    
    
}
