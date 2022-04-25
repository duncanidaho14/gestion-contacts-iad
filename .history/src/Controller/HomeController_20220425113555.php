<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Contact;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home", methods={"GET"})
     * 
     */
    public function index(ContactRepository $contactRepository, SerializerInterface $serializer): JsonResponse
    {

        return new JsonResponse(
            $serializer->serialize($contactRepository->findAll(), "json", ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true // déjà au format json
        );
    }

    public function item(Contact $contact, SerializerInterface $serializer): JsonResponse
    {
        # code...
    }
}
