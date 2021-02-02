<?php
//src/Controller/UsuarioController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BD;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsuarioController extends AbstractController{
    /**
     * @Route("/login", name="login")
     */
    public function login(){
        return $this->render("login.html.twig");
    }
}
?>