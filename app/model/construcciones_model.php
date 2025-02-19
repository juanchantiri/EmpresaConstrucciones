<?php

class construccionesModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=construcciones;charset=utf8', 'root', '');
        return $db;
    }
    function getConstructions() {
        $db = $this->connect();
        $query = $db->prepare('SELECT * FROM construccion');
        $query->execute();
        $construcciones = $query->fetchAll(PDO::FETCH_OBJ);
    
        foreach ($construcciones as $construccion) {
            $construccion->costos = $this->getCostosByConstruccion($construccion->id);
            
            $total_costo = 0;
            if (!empty($construccion->costos)) { // Verifica que haya costos
                foreach ($construccion->costos as $costo) {
                    $total_costo += $costo->valor;
                }
            }
    
            $construccion->costo_total = $total_costo;
            $construccion->venta = $total_costo * 1.25;
            $construccion->costo_a_pagar = $total_costo;
    
            // Solo actualiza si hay costos
            if ($total_costo > 0) {
                $this->actualizarConstruccion($construccion->id, $construccion->venta, $construccion->costo_a_pagar);
            }
        }
    
        return $construcciones;
    }
    
    function getCostosByConstruccion($id_construccion) {
        $db = $this->connect();
        // Modificamos el nombre de la columna de 'costo' a 'valor'
        $query = $db->prepare('SELECT * FROM costos WHERE id_construccion = ?');
        $query->execute([$id_construccion]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function añadirCosto($id_construccion, $descripcion, $valor) {
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO costos (id_construccion, descripcion, valor) VALUES (?, ?, ?)');
        
        if ($query->execute([$id_construccion, $descripcion, $valor])) {
            echo "✅ Costo añadido: $descripcion - $valor <br>";
        } else {
            echo "❌ Error al añadir costo: " . implode(" ", $query->errorInfo()) . "<br>";
        }
    }
    
    
    function actualizarConstruccion($id_construccion, $venta, $costo_a_pagar) {
        $db = $this->connect();
        $query = $db->prepare('UPDATE construccion SET venta = ?, costo_a_pagar = ? WHERE id = ?');
        $query->execute([$venta, $costo_a_pagar, $id_construccion]);
    }
    
    function añadirPresupuesto($identificar, $certificado) {
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO construccion(identificar, certificado, venta, costo_a_pagar) VALUES (?, ?, 0, 0)');
        $query->execute([$identificar, $certificado]);
    
        return $db->lastInsertId();
    }

    function deletePresupuesto($id) {
        $db = $this->connect();
    
        // Primero eliminamos los costos relacionados con la construcción
        $query = $db->prepare('DELETE FROM costos WHERE id_construccion = ?');
        $query->execute([$id]);
    
        // Luego eliminamos la construcción
        $query = $db->prepare('DELETE FROM construccion WHERE id = ?');
        $query->execute([$id]);
    }
}