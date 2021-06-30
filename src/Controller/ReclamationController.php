<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="reclamation")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ReclamationController.php',
        ]);
    }


    /**
     * @Route("/addReclamation", name="addUser", methods={"post"})
     */
    public function addUser(Request $request){
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $u = $serializer->deserialize($data, 'App\Entity\Reclamation', 'json');
        $em= $this->getDoctrine()->getManager();
        $em->persist($u);
        $em->flush();
        $response = new Response('', Response::HTTP_CREATED);
        //Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');
        // You can set the allowed methods too, if you want
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');
        return $response;


    }
}
