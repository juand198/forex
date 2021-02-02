<?php
// src/Entity/Precio.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="precios")
 */
class Precio {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="fecha")
     */
    private $fecha;
    /**
     * @ORM\Column(type="integer")
     */
    private $open;
    /**
     * @ORM\Column(type="integer")
     */
    private $high;
    /**
     * @ORM\Column(type="integer")
     */
    private $low;
    /**
     * @ORM\Column(type="integer")
     */
    private $close;
    /**
     * @ORM\Column(type="integer")
     */
    private $volume;

    public function getFecha() {
        return $this->fecha;
    }
    public function getOpen() {
        return $this->open;
    }
    public function getHigh() {
        return $this->high;
    }
    public function getLow() {
        return $this->low;
    }
    public function getClose() {
        return $this->close;
    }
    public function getVolume() {
        return $this->volume;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setOpen($open) {
        $this->open = $open;
    }
    public function setHigh($high) {
        $this->high = $high;
    }
    public function setLow($low) {
        $this->low = $low;
    }
    public function setClose($close) {
        $this->close = $close;
    }
    public function setVolume($volume) {
        $this->volume = $volume;
    }
}