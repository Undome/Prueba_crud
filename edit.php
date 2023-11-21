<?php
    $servername = "";
    $username = "u373289608_dantech";
    $password = "p/8BilzU";
    $database = "u373289608_crudprueba"; 

    // Crear conneción
    $connection = new mysqli("$servername, $username, $password, $database");

    $id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $succesMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {


        if ( !isset($_GET["id"]) ) {
            header("location: /Prueba_crud/index.php");
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM clients";
        $result = $ connection_>query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /Prueba_crud/index.php")
            exit;
        }

        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
    } else {

        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do {
            if ( empty($id) || empty($name) || empty($email) || empty($phone) || empty($address) ) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE clients" . 
                    "SET name = '$name', email = '$email', phone = '$phone', address = '$address' " . 
                    "WHERE id = $id";

            $result = $connection->query($sql);
            
            if (!$result) {
                $errorMessage = "Invalid query" . $connection->error;
                break;
            }

            $succesMessage = "El cliente se actualizo correctamente";

        } while (false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo cliente</h2>

        <?php
            if ( !empty($errorMessage) ) {
                echo "
                <div class='alert alert_warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Teléfono</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Dirección</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <?php
            if ( !empty($succesMessage) ) {
                echo "
                <div class='alert alert_success alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                </div>
                ";
            }
        ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/Prueba_crud/index.php" class="btn btn-outline-primary" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>