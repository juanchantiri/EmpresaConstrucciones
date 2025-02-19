<?php require_once 'view/templates/header.phtml'?>

<?php if($error): ?>
    <div class='alert alert-danger' role = 'alert'>
        <?= $error ?>
    </div>
<?php endif ?>


<body>
        <form action="Login" method="post">
            <div>
                <h2>Iniciar Sesión</h2>
                <label for = "email">Email:</label>
                <input type="email" class= "form-control "name="email" id="email" required>

                <label for = "password">Contraseña:</label>
                <input type="password" name="password" id = "password" required>
            </div>
            <button type="submit" class="botonForm">Ingresar</button>
        </form>
    </div>
</body>
</html>
