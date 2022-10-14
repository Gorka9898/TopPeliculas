
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Peliculas</title>
</head>
<body

<?php
require('Pelicula.php');

class Top_Peliculas{


    private $arrayAs;

    public function __construct(){

        $this->arrayAs[null]=[null," ", null, null];
    }


//Añadir una pelicula
    function anadirPeli($pelicula){


        if (($pelicula->getNombre() == "") && ($pelicula->getIsan() == "")) {
            echo '<p style="color:red";>Los campos nombre y isan vacios.</p>';
        }else{
            foreach ($this->arrayAs as $clave => $valor){
                if($clave==$pelicula->getIsan()){
                    if($pelicula->getNombre() == ""){
                        unset($this->arrayAs[$pelicula->getIsan()]);
                        echo "eliminar";
                    }
                }else{
                    if(($pelicula->getNombre() != "") && ($pelicula->getIsan() == "")){
                        foreach ($this->arrayAs as $clave => $valor){
                            if(str_contains($valor->getNombre(),$pelicula->getNombre())){
                                echo $valor->getNombre()." from ".$valor->getAño();
                                echo "buscar";
                            }
                        }
                    }else if(($pelicula->getNombre() != "") && ($pelicula->getIsan() != "")){
                        $this->arrayAs[$pelicula->getIsan()]=$pelicula;
                        echo "añadir";
                    }
                }
            } 
        }

    }

    // Mostrar los datos de la pelicula

    public function verDatos(){
        echo "<table border='1'>";
        echo "<tr> <td>Nombre</td><td>Isan</td><td>Puntuacion</td><td>Año</td>";

        foreach($this->arrayAs as $clave=>$valor){

            echo "<tr><td>".$valor->getNombre()."</td><td>".$valor->getIsan()."</td><td>".$valor->getPuntuacion()."</td><td>".$valor->getAno()."</td></tr>" ;
        }
        echo "</table>";
    }
    
    public function getArrayAs(){
        $string=" ";
        foreach ($this->arrayAs as $clave => $valor){
            $array=$this->arrayAs[$clave];
            $string=" Isan: ".$array[0]." Nombre: ".$array[1]." Puntuacion: ".$array[2]." Año: ".$array[3]." & ";
            echo $string;
        }
        return $string;
    }

    public function setArrayAs($texto){

        $array=explode("&",$texto);
        $this->arrayAs[$array[0]]=[$array[1],$array[2],$array[3]];
        $this->arrayAs[$array[4]]=[$array[5],$array[6],$array[7]];
    }
    
}


?>

<form action="main.php" method="POST">

Nombre: <input type="text" name="nombrePeli" id="nombrePeli">
<br>
Isan: <input type="text" name="isanPeli" id="isanPeli">
<br>

Puntuacion:

<select name="ListaPuntos">

<option value="1" name="1">1</option>
<option value="2" name="2">2</option>
<option value="3" name="3">3</option>
<option value="4" name="4">4</option>
<option value="5" name="5">5</option>

</select>
<br>



Año: <input type="text" name="anoPeli" id="anoPeli">
<br>
<input type="submit" value="Enviar">
</form>

<?php
    // Crear los objetos pelicula
    $escondido = new Top_Peliculas();
    if (isset($_POST['escondido'])) {
    $escondido->setarrayAs($_POST['escondido']."<br>"."Nombre: ".$_POST['nombrePeli']."<br>Isan: ".$_POST['isanPeli'].",<br>Puntuacion: ".$_POST['ListaPuntos'].",<br>Año: ".$_POST['anoPeli']."<br>");
        echo "escondido: ".$escondido->getArrayAs();
    }
    echo "<br>";
        ?>
<pre><?php echo "<input type='hidden' name='escondido' value='".$escondido->getArrayAs()."' >" ?></pre>


<?php
ini_get('display_errors',1);

?>

</body>
</html>

