<?php

class construccionesView{

    private $user=null;

    public function __construct($user) {
        $this->user=$user;
    }

    public function mostrarConstrucciones($construcciones){
        $count = count ($construcciones);

        require 'templates/tabla_construcciones.phtml';
}
    public function mostrarFormPresupuesto($construcciones){
        require 'templates/añadirPresupuesto.phtml';
    }


}