<?php
//src/Controller/OrdenesController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Operacion;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrdenesController extends AbstractController{
    /**
     * @Route("/getOrdenes/{user}", name="getOrdenes")
     */
    public function getOrdenes($user) {
        $ordenes = $this->getDoctrine()->getRepository(Operacion::class)->findBy(['usuario'=>$user]);
        $json = [];
        $mensaje = [];
        foreach($ordenes as $orden){
            $json['fecha'] = $orden->getUsuario();
            $json['open'] = $orden->getFecha_op();
            $json['high'] = $orden->getTipo_op();
            $json['low'] = $orden->getPrecioentrada();
            $json['close'] = $orden->getPreciosalida();
            $json['volume'] = $orden->getEstado();
            array_push($mensaje,$json);
        }

        return new JsonResponse($mensaje);
    }

}
?>