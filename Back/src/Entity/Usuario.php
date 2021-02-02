<?php
//src/Entity/Usuario.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="precios")
 */
class Usuario implements UserInterface, \Serializable{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nombre;
    /**
     * @ORM\Column(type="string")
     */
    private $pssw;
    /**
    * Bidireccional
	* @ORM\OneToMany(targetEntity="Operacion", mappedBy="usuario")
	*/
    private $operaciones;

    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getPssw() {
        return $this->pssw;
    }
    public function getOperaciones() {
        return $this->operaciones;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setPssw($pssw) {
        $this->pssw = $pssw;
    }


    public function serialize(){
        return serialize(array(
            $this->id,
            $this->nombre,
            $this->pssw,
        ));
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->nombre,
            $this->pssw,
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return array('ROLE_USER');            }

    public function getPassword()
    {
        return $this->getPssw();
    }

    public function getSalt()
    {
        return;
    }

    public function getUsername()
    {
        return $this->getNombre();
    }

    public function eraseCredentials()
    {
        return;
    }

}