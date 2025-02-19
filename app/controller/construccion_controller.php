<?php
require_once 'model/construcciones_model.php';
require_once 'view/construcciones_view.php';

class construccionesController {
    private $model;
    private $view; 

    function __construct($res) {
        $this->model = new construccionesModel();
        $this->view = new construccionesView($res);
    }

    function showConstructions() {
        $construcciones = $this->model->getConstructions();
        return $this->view->mostrarConstrucciones($construcciones);
    }

    function mostrarFormPresupuesto() {
        $construcciones = $this->model->getConstructions();
        return $this->view->mostrarFormPresupuesto($construcciones);
    }

    function addPresupuesto() {
        // Recibimos los datos del formulario
        $identificar = $_POST['identificar'];
        $certificado = $_POST['certificado'];
        
        // Insertamos la construcción (sin costos aún)
        $id_construccion = $this->model->añadirPresupuesto($identificar, $certificado);
    
        // Verificamos si se enviaron costos correctamente
        if (isset($_POST['costos']) && is_array($_POST['costos'])) {
            foreach ($_POST['costos'] as $costo) {
                if (!empty($costo['descripcion']) && !empty($costo['valor']) && is_numeric($costo['valor'])) {
                    $this->model->añadirCosto($id_construccion, trim($costo['descripcion']), floatval($costo['valor']));
                }
            }
        } else {
            echo "⚠️ No se enviaron costos.";
            die();
        }
    
        // Actualizar venta y costo total
        $totalCosto = 0;
        $costos = $this->model->getCostosByConstruccion($id_construccion);
    
        foreach ($costos as $costo) {
            $totalCosto += $costo->valor;
        }
    
        $venta = $totalCosto * 1.25;
        $costo_a_pagar = $totalCosto;
    
        $this->model->actualizarConstruccion($id_construccion, $venta, $costo_a_pagar);
    
        // Redirigir
        header('Location: ' . BASE_URL);
        die();
    }
    

    function borrarPresupuesto($id) {
        $this->model->deletePresupuesto($id);
        header('Location: ' . BASE_URL);
        die();
    }
}
