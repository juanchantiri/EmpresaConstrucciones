<?php

class construccionesModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=construcciones;charset=utf8', 'root', '');
        return $db;
    }
        function getConstructions(){
            $db = $this -> connect();
            $query=$db->prepare('SELECT * FROM construccion');
            $query->execute();
            $construcciones = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de construcciones

                    // Recorremos cada construcción y calculamos el valor de la venta
          foreach ($construcciones as $construccion) {
            $construccion->venta = $construccion->costo * 1.25; // Venta es un 25% más que el costo
          }
            return $construcciones;
        } 


        function añadirPresupuesto($costo,$venta,$certificado,$costo_a_pagar, $identificar){
            $db = $this -> connect();
            $query=$db->prepare('INSERT INTO construccion(costo,venta,certificado,costo_a_pagar,identificar) VALUES (?,?,?,?,?)');
            $query->execute([$costo,$venta,$certificado,$costo_a_pagar,$identificar]);

            $id=$db->lastInsertId();

            return $id;
        }
        
        function deletePresupueto($id){
            $db = $this -> connect();
            $query = $db->prepare('DELETE FROM construccion WHERE id =?');
            $query->execute([$id]);

            return;
        }
} 