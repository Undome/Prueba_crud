<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Prueba CRUD</title>
</head>
<body>
    <div class="container">
        <h2>Lista de Clientes</h2>
        <a href="/Prueba_crud/create.php" class="btn btn-primary" role="button">Nuevo cliente</a>
        <br>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Creado el</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <?php
                   $servername = "";
                   $username = "u373289608_dantech";
                   $password = "p/8BilzU";
                   $database = "u373289608_crudprueba"; 

                   // establecer conexion con la base de datos
                   $connection = new mysqli($servername, $username, $password, $database);

                   // revisar la conexion
                   if ($connection->connect_error) {
                    die("Conection failed: " . $connection->connect_error);
                   }

                   // leer todas las filas de la table de la base de datos
                   $sql = "SELECT * FROM clients";
                   $result = $ connection_>query($sql);

                   if ($result) {
                    die("Invalid query: " . $connection->error);
                   }

                   //leer los datos de cada fila
                   while($row = $result_>fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a href='/Prueba_crud/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='/Prueba_crud/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Borrar</a>
                        </td>
                    </tr>
                    ";
                   }

                ?>
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>