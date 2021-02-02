<?php
//src/Controller/PrecioController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BD;
use Symfony\Component\HttpFoundation\JsonResponse;

class PrecioController extends AbstractController{
    /**
     * @Route("/getPrecio", name="precios")
     */
    public function precios() {
        $conexion = new BD($this->getDoctrine()->getManager());
        $precios = $conexion->buscarPrecio();
        $json = [];
        $mensaje = [];

        foreach($precios as $precio){
            $json['fecha'] = $precio->getFecha();
            $json['open'] = $precio->getOpen();
            $json['high'] = $precio->getHigh();
            $json['low'] = $precio->getLow();
            $json['close'] = $precio->getClose();
            $json['volume'] = $precio->getVolume();
            array_push($mensaje,$json);
        }

        return new JsonResponse($mensaje);
    }
}
?>