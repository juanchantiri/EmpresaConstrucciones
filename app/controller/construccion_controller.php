<?php
    require_once 'model/construcciones_model.php';
    require_once 'view/construcciones_view.php';

    class construccionesController{
        private $model;
        private $view; 
    
        function __construct($res) {
            $this ->model = new construccionesModel();
            $this ->view = new construccionesView($res);
        }
    
        function showConstructions(){
            $construcciones = $this->model->getConstructions();

            return $this->view->mostrarConstrucciones($construcciones);
        }
        function mostrarFormPresupuesto(){
            $construcciones = $this->model->getConstructions();

            return $this->view->mostrarFormPresupuesto($construcciones);
        }
        function addPresupuesto(){

            $costo=$_POST['costo'];
            $venta=$_POST['venta'];
            $certificado=$_POST['certificado'];
            $costo_a_pagar=$_POST['costo_a_pagar'];
            $identificar=$_POST['identificar'];
        
            header('Location: ' . BASE_URL);
    
            return $this->model->añadirPresupuesto($costo,$venta,$certificado,$costo_a_pagar, $identificar);
    
        }

        function borrarPresupuesto($id){
            $this->model->deletePresupueto($id);

            header('Location: ' . BASE_URL);
            die();
        }


    }