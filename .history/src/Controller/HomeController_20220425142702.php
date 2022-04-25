<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManager;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/api", name="app_home", methods={"GET"})
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
     * @Route("/api/{id}", name="app_contact", methods={"GET"})
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
     * @Route("/api/create", name="app_create", methods={"POST"})
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
            ["Location" => $urlGenerator->generate("app_contact",["id"=> $contact->getId()])],
            true
        );
    }


    public function put(Contact $contact, EntityManagerInterface $manager, SerializerInterface $serializer, ValidatorInterface $validator): JsonResponse
    {
        $errors = $validator->validate($contact);
        if($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST)
        }
        return new JsonResponse();
    }
    /**
     * @Route("/api/delete/{id}", name="app_delete", methods={"DELETE"})
     *
     * @param Contact $contact
     * @param EntityManagerInterface $manager
     * @return void
     */
    public function delete(Contact $contact, EntityManagerInterface $manager)
    {
        $manager->remove($contact);
        $manager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
