<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
        <div class="container">
            <a class="navbar-brand text-decoration-none text-dark">
                <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30"
                    height="24">
                Instance
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-link active" aria-current="page" href="#">Home</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" href="#">Features</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" href="#">Pricing</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link disabled" aria-disabled="true">Disabled</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Formulario para Cargar Imagen</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Selecciona una imagen:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-secondary">Subir Imagen</button>
        </form>
    </div>

    <div class="container mt-5">
        <?php
        use App\Controllers\ImageController;
        $imageController = new ImageController();
        $imageController->uploadImage();
        ?>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./public/index.js?v=<?php echo rand(); ?>"></script>
</body>

</html>