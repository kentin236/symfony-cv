<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/default", name="default", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route(path="/default-json", name="default_json", methods={"GET"})
     */
    public function indexJson(): JsonResponse
    {
        return $this->json([
            'route' => '/default-json',
            'status' => 200
        ], JsonResponse::HTTP_OK, [], []);
    }

    /**
     * @Route(path="/default-react", name="default_react", methods={"GET"})
     */
    public function indexReact(): Response
    {
        return $this->render('default/react.html.twig');
    }

    /**
     * @Route(path="/api/note", methods={"GET"})
     * @return JsonResponse
     */
    public function getNotes(): JsonResponse
    {
        $notes = [
            ['id' => 1, 'title' => "Hello 1 world", 'content' => 'i am the content'],
            ['id' => 2, 'title' => "Hello 2 world", 'content' => 'i am the content'],
            ['id' => 3, 'title' => "Hello 3 World", 'content' => 'i am the content'],
        ];
        return $this->json($notes, 200, ['Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*']);
    }
}
