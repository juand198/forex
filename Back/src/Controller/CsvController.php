<?php
//src/Controller/csvController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Precio;

class CsvController extends AbstractController{
    /**
     * @Route("/csv", name="csv")
     */
    public function csv() {
        return $this->render("csv.html.twig");
    }
    /**
     * @Route("/subircsv", name="subircsv")
     */
    public function subircsv() {

        $con=mysqli_connect("localhost","root","","forex");
        
        if($_FILES){
            $name = $_FILES['filename']['name'];            
            if(move_uploaded_file($_FILES['filename']['tmp_name'],$name)){
                $fichero = fopen($name,'r');
                if($fichero === FALSE){
                    echo "<p>No se ha podido encontrar el fichero</p>";
                }else{
                    while(!feof($fichero)){

                        $linea =  fgets($fichero);

                        $partido = explode(";",$linea);

                        $partido[0] = str_replace(".", "/", $partido[0]);
                        $partido[0] = strtotime($partido[0]);
                        $partido[1] = floatval($partido[1])*100000;
                        $partido[2] = floatval($partido[2])*100000;
                        $partido[3] = floatval($partido[3])*100000;
                        $partido[4] = floatval($partido[4])*100000;
                        $partido[5] = floatval($partido[5])*100000;
                        
                        $entityManager = $this->getDoctrine()->getManager();

                        $precio = new Precio();
                        $precio->setFecha($partido[0]);
                        $precio->setOpen($partido[1]);
                        $precio->setHigh($partido[2]);
                        $precio->setLow($partido[3]);
                        $precio->setClose($partido[4]);
                        $precio->setVolume($partido[5]);

                        $entityManager->persist($precio);
                        $entityManager->flush();
                    }
                }
            }
        }
        return $this->render("subircsv.html.twig");
    }
}
?>