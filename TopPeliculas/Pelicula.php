<?php


class Pelicula{


private $nombre;
private $isan;
private $puntuacion;
private $ano;



public function __constructor($nombre, $isan, $puntuacion, $ano){

    $this->nombre=$nombre;
    $this->isan=$isan;
    $this->puntuacion=$puntuacion;
    $this->ano=$ano;

}

public function getNombre(){
    return $this->nombre;
}

public function setNombre(){
    return $this->nombre;
}

public function getIsan(){
    return $this->isan;
}

public function setIsan(){
    return $this->isan;
}

public function getPuntuacion(){
    return $this->puntuacion;
}

public function setPuntuacion(){
    return $this->puntuacion;
}

public function getAno(){
    return $this->ano;
}

public function setAno(){
    return $this->ano;
}












}










?>