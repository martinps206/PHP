<?php

    require 'config/database.php';

    $db = new Database();
    $con = $db->conectar();

    $correcto = false;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;

        if($stock == ''){
            $stock = 0;
        }

        $query = $con->prepare("UPDATE productos SET codigo = ?, descripción = ?, inventariable = ?, stock = ? WHERE id = ?");
        $resultado = $query->execute(array($codigo, $descripcion, $inventariable, $stock, $id));

        if ($resultado) {
            $correcto = true;
        }    

    }else{
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;

        if($stock == ''){
            $stock = 0;
        }


        $query = $con->prepare("INSERT INTO productos (codigo, descripcion, inventariable, stock, activo) VALUES (:cod, :descr, :inv, :sto, 1)");
        $resultado = $query->execute(array('cod' => $codigo, 'descr' => $descripcion, 'inv' => $inventariable, 'sto' => $stock));
        
        if ($resultado) {
            $correcto = true;
            //echo $con->lastInsertId();
        }
    
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
    <title>Guardar</title>
</head>
<body class ="py-3">
    <main class ="container">
        <div class="row">
            <div class="col">
                <?php if($correcto) { ?>
                    <h3>Registro Guardado</h3>
                <?php } else { ?> 
                    <h3>Error al guardar</h3>
                <?php } ?>   
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>