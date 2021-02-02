<?php
//src/Controller/OperacionesController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("/operacion")
 */
class OperacionesController extends AbstractController{
    /**
     * @Route("/venta/", name="venta")
     */
    public function venta() {
        $conexion = new BD($this->getDoctrine()->getManager());
        $conexion->vender();
        return $this->render("vender.html.twig");
    }
    /**
     * @Route("/compra/", name="compra")
     */
    public function compra() {
        $conexion = new BD($this->getDoctrine()->getManager());
        $conexion->comprar();
        return $this->render("compra.html.twig");
    }

    /**
     * @Route("/cerrar/{id}", name="cerrar")
     */
    public function cerrar($id) {
        $conexion = new BD($this->getDoctrine()->getManager());
        $conexion->cerrar($id);
        return $this->render("cerrar.html.twig");
    }

}
?>