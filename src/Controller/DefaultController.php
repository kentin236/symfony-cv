<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
            'route'  => '/default-json',
            'status' => 200,
        ], JsonResponse::HTTP_OK, [], []);
    }

    /**
     * @Route(path="/default-react", name="default_react", methods={"GET"})
     */
    public function indexReact(): Response
    {
        $data = ['1', 2, '3'];
        $notes = [
            ['id' => 1, 'title' => 'Hello 1 world', 'content' => 'i am the content'],
            ['id' => 2, 'title' => 'Hello 2 world', 'content' => 'i am the content'],
            ['id' => 3, 'title' => 'Hello 3 World', 'content' => 'i am the content'],
        ];

        return $this->render('default/react.html.twig', [
            'data'  => $data,
            'notes' => $notes,
        ]);
    }

    /**
     * @Route(path="/api/note", methods={"GET"})
     */
    public function getNotes(): JsonResponse
    {
        $notes = [
            ['id' => 1, 'title' => 'Hello 1', 'content' => 'CONTENT 1'],
            ['id' => 2, 'title' => 'Hello 2', 'content' => 'CONTENT 2'],
            ['id' => 3, 'title' => 'Hello 3', 'content' => 'CONTENT 3'],
        ];

        return $this->json(
            $notes,
            JsonResponse::HTTP_OK,
            ['Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*']
        );
    }
}
