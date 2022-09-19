<?php
    require 'config/database.php';

    $db = new Database();
    $con = $db->conectar();

    $id = $_GET['id'];
    $activo = 0;

    $query = $con->prepare("SELECT codigo, descripción, inventariable, stock FROM productos WHERE id = :id AND activo =:activo");
    $query->execute(['id' => $id, 'activo' => $activo]);
    $num = $query->rowCount();
    if ($num > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        echo 'No existe el registro';
        exit;
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public(css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <title>Nuevo Registro</title>
</head>

<body class ="py-3">
    <main class ="container">
        <div class="row">
            <div class="col">
                <h4>Nuevo Registro</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">

                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                <div class="col-md-4">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $row['codigo']; ?>" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $row['descripción']; ?>" required>
                </div>

                <h5>Inventario</h5>

                <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="inventariable" name="inventariable" value="1"
                        
                        <?php
                            if ($row['inventariable']) {
                                echo 'checked';
                            }
                        ?>
                        
                        >
                        <label for="inventariable" class="form-check-label">Usa inventario</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="stock" class="form-label">Existencias</label>
                    <input type="number" id="costockdigo" name="stock" class="form-control" value="<?php echo $row['stock']; ?>">
                </div>

                <div class="col-md-12">
                    <a class="btn btn-secondary" href="index.php">Regresar</a>
                    <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                    <link rel="stylesheet" href="">
                </div>

            </div>
        </div>

    </main>
</body>
</html>