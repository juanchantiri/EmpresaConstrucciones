<?php
    class autenticacionView {
        private $user=null;

        public function __construct($user)
        {
            $this->user=$user;
        }
        
        public function showLogin ($error = ''){
            require_once 'seguridad/form_inicio_sesion.php';
        }
    }