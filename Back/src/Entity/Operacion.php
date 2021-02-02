<?php
// src/Entity/Operacion.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity @ORM\Table(name="Operaciones")
 */
class Operacion {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="id")
     */
    private $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $fecha_op;
    /**
     * @ORM\Column(type="integer")
     */
    private $fecha_cl;
    /**
     * @ORM\Column(type="string")
     */
    private $tipo_op;
    /**
     * @ORM\Column(type="integer")
     */
    private $precioentrada;
    /**
     * @ORM\Column(type="integer")
     */
    private $preciosalida;
    /**
     * @ORM\Column(type="string")
     */
    private $estado;
    /**
     *  @ORM\Column(type="string")
     * @ORM\ManyToOne(targetEntity="Usuario",  inversedBy = "usuarios")
     * @ORM\JoinColumn(name="id", referencedColumnName="usuario")
     */
    private $usuario;

    public function getId() {
        return $this->id;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function getFecha_op() {
        return $this->fecha_op;
    }
    public function getFecha_cl() {
        return $this->fecha_cl;
    }
    public function getTipo_op() {
        return $this->tipo_op;
    }
    public function getPrecioentrada() {
        return $this->precioentrada;
    }
    public function getPreciosalida() {
        return $this->preciosalida;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    public function setFecha_op($fecha_op) {
        $this->fecha_op = $fecha_op;
    }
    public function setFecha_cl($fecha_cl) {
        $this->fecha_cl = $fecha_cl;
    }
    public function setTipo_op($tipo_op) {
        $this->tipo_op = $tipo_op;
    }
    public function setPrecioentrada($precioentrada) {
        $this->precioentrada = $precioentrada;
    }
    public function setPreciosalida($preciosalida) {
        $this->preciosalida = $preciosalida;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
}