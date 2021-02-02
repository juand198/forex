<?php
namespace App\Controller;

use App\Entity\Precio;
use App\Entity\Operacion;
use Doctrine\ORM\EntityManagerInterface;

class BD {

    private $manager;

    function __construct(EntityManagerInterface  $manager){
        $this->manager = $manager;
    }

    function buscarPrecio(){
        $precios = $this->manager->getRepository(Precio::class)->findBy(['fecha'=>"1606950000"]);
        return $precios;
    }

    function vender(){
        $precio = $this->buscarPrecio()[0];
        $fecha = date_create();
        $venta = new Operacion();
        $venta->setUsuario(1);
        $venta->setFecha_op(date_timestamp_get($fecha));
        $venta->setTipo_op("Venta");
        $venta->setPrecioentrada($precio->getClose());
        $venta->setPreciosalida("");
        $venta->setEstado("Abierta");

        $this->manager->persist($venta);
        $this->manager->flush();
    }

    function comprar(){
        $precio = $this->buscarPrecio()[0];
        $fecha = date_create();
        $compra = new Operacion();
        $compra->setUsuario(1);
        $compra->setFecha_op($precio->getFecha());
        $compra->setTipo_op("Compra");
        $compra->setPrecioentrada($precio->getClose());
        $compra->setPreciosalida("");
        $compra->setEstado("Abierta");

        $this->manager->persist($compra);
        $this->manager->flush();
    }

    function cerrar($id){
        $precio = $this->buscarPrecio()[0];
        $operacion = $this->manager->getRepository(Operacion::class)->findBy(['id'=>$id]);

        $operacion[0]->setEstado("Cerrado");
        $operacion[0]->setPreciosalida($precio->getClose());
        $operacion[0]->setFecha_cl($precio->getFecha());

        $this->manager->persist($operacion[0]);
        $this->manager->flush();
    }

}


?>