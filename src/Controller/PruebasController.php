<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{

    private $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    // Tenemos que definir como es el endpoit para poder hacer la petición desde el cliente
    // ENDPOIT
    /**
     * @Route ("/get/usuarios", name="get_users")
     */
    public function getAllUser(Request $request){
        // LLamará a base de datos y se traerá toda la lista de users
        // Devolver una respuesta en formato Json
        // Request -> petición
        // Response -> Hay que devolver una respuesta
        // $response = new Response(); // Esto lleva código de estado, por defecto 200
        // $response->setContent('<div>Hola mundo</div>');
        // Capturamos los datos que vienen en el Request
        $id = $request->get('id');
        $this->logger->alert('Mensajito');
        // Query sql para traer el user con el id = $id
        $response = new JsonResponse();
        $response->setData([
            'success' => true, // 200 Ha ido bien all
            'data' =>
                [
                    'id' => ($id), // intval -> Parse.int -> transforma a int, si dejo $id y paso un String el id lo deja a 0, NO CONTROLAMOS EL TIPADO AÚN
                    'nombre' => 'Pepe',
                    'email' => 'pepe@gmail.com'
                ],
        ]);
        return $response;
    }
}