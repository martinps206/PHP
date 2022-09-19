<?php
    require 'config/database.php';

    $db = new Database();
    $con = $db->conectar();

    $activo = 1;

    $comando = $con->prepare("SELECT id, codigo, descripcion, stock FROM productos WHERE activo = :mi_activo ORDER BY id ASC");

    $comando->execute(['mi_activo' => $activo]);     
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public(css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>


</head>
<body class ="py-3">
    <main class ="container">
        <div class="row">
            <div class="col">
                <h4>Productos
                    <a href="nuevo.php" class="btn btn-primary float-right">Nuevo</a>
                </h4>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($resultado AS $row){
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['codigo'];?></td>
                                <td><?php echo $row['descripcion'];?></td>
                                <td><?php echo $row['stock'];?></td>
                                <td> <a href="editar.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Editar</a> </td>
                                <td> <a href="eliminar.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Eliminar</a> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    
</body>
</html>