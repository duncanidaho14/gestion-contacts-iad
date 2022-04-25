<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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

    /**
     * @Route("/contact/{id}", name="app_contact", methods={"GET"})
     *
     * @param Contact $contact
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function item(Contact $contact, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($contact, "json", ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }


    /**
     * @Route(name="app_create", methods={"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $manager
     * @return JsonResponse
     */
    public function post(Request $request, SerializerInterface $serializer, EntityManagerInterface $manager, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        $contact = $serializer->deserialize($request->getContent(), Contact::class, "json");

        $manager->persist($contact);
        $manager->flush();

        return new JsonResponse(
            $serializer->serialize($contact, "json", ["groups" => "get"]),
            JsonResponse::HTTP_CREATED,
            ["Location" => $urlGenerator->generate("app_post",["id"=> $contact->getId()])],
            true
        );
    }
}
