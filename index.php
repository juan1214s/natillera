<?php
//esta pagina es  para listar los datos, q nos muestre los datos q hay dentro de la tabla
include "template/header.php";
?>

<?php
//se incluye la base de datos
include_once "model/db.php";
//se hace una consulta a la base de datos
$consulta = $bd->query("SELECT * FROM entrada3"); // query es para extraer informacion sin modificar la tabla
$entradas = $consulta->fetchALL(PDO::FETCH_OBJ); //funcion reservada, la utilizo porq hice la conexion con PDO para q me traiga la base de datos
//ES PARA AGRUPAR TODOS LOS REGISTROS de un array fetchALL(). todos los campos de la base de datos estan guardados en la variable $entradas y se debe recorrer con un metodo
?>

<?php
$id = isset($_POST['id']) ? $_POST['id'] : null;

// OR using the null coalescing operator (PHP 7.0+)
$id = $_POST['id'] ?? null;

// OR using the newer null coalescing assignment (PHP 7.4+) me toco hacer esto para guardar el commit
$id ??= null;

// Rest of your code...

try {

    $query = $bd->prepare("SELECT * FROM entrada3 WHERE idcedula = :id");
    $query->bindParam(':id', $id);
    $query->execute();

    $resultado = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>


<div class="container mt-5">
    <div class="col align-items-center">
        <div class="col-md-12">
            <?php
            if (isset($_GET["Mensaje"]) and $_GET["Mensaje"] == "error") { //isset es como un condicional del if para un error
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> No se agrego la informacion
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>

                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET["mensaje"]) and $_GET["mensaje"] === "registrado") { //isset es como un condicional del if para un error
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>REGISTRADO</strong> iNFORMACION REGISTRADA.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>

                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET["mensaje"]) and $_GET["mensaje"] === "eliminado") { //isset es como un condicional del if para un error
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ELIMINADO</strong> Entrada Eliminada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>

                </div>
            <?php
            }
            ?>



            <div class="card">
                <div class="card-header">
                    Natillera "Mosquera"
                </div>


                <div class="col-md-12">
                    <form class="p-4" action="consultarCC.php" method="GET">
                        <label for="nombre">Identificaciòn</label>
                        <input type="text" id="cedula" name="id">
                        <input type="submit" class="btn btn-primary" value="Consultar">
                    </form>
                </div>




                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ahorro</th>
                                <th scope="col">Rifa</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Numero prestamo</th>
                                <th scope="col">Prestamo</th>
                                <th scope="col">Fecha de abonos</th>
                                <th scope="col">Abono</th>
                                <th scope="col" colspan="2">Option</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            // Captura los valores que estan en la variabl entrada y la renombra como dato

                            foreach ($entradas as $dato) {
                            ?>
                                <tr>
                                    <td> <?php echo $dato->idcedula; ?> </td>
                                    <td> <?php echo $dato->nombre; ?> </td>
                                    <td> <?php echo number_format($dato->ahorro, 0, '.', ','); ?> </td>
                                    <td <?php echo ($dato->rifa < 30000) ? 'style="background-color: #FF0000;"' : 'style="background-color: green;"'; ?>>
                                        <?php echo number_format($dato->rifa, 0, '.', ','); ?>
                                    </td>
                                    <td> <?php echo $dato->fecha; ?> </td>
                                    <td> <?php echo $dato->numPrestamo; ?> </td>
                                    <td> <?php echo number_format($dato->prestamo, 0, '.', ','); ?> </td>
                                    <td> <?php echo $dato->fechaAbono; ?> </td>
                                    <td> <?php echo number_format($dato->abono, 0, '.', ','); ?> </td>
                                    <td><a href="edit.php?idcedula=<?php echo $dato->idcedula; ?>" class="text-success"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de Eliminar?')" href="delete.php?idcedula=<?php echo $dato->idcedula; ?>" class="text-danger"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>


                    </table>

                </div>

            </div>

        </div>

        <!-- Resto del código HTML... -->

<div class="col-md-12">
    <form class="p-4" action="consultarCC.php" method="GET">
        <label for="nombre">Cedula</label>
        <input type="text" id="cedula" name="id" oninput="formatoMiles(this)">
        <input type="submit" class="btn btn-primary" value="Consultar">
    </form>
</div>

<!-- Resto del código HTML... -->

<!-- Script para el formato de separación de miles -->
<script>
    function formatoMiles(input) {
        const valor = input.value.replace(/,/g, '');
        const valorFormateado = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        input.value = valorFormateado;
    }
</script>

<!-- Resto del código HTML... -->

        <div class="col-md-12">
            <div class="card ">
                <div class="card-footer">
                    Registrar entrada
                </div>
                <form class="p-4" action="register.php" method="POST">
                    <div class="mb.3">
                        <label class="form.label">Cedula</label>
                        <input type="number" class="form-control" name="texPlaca" autofocus required>
                    </div>
                    <div class="mb.3">
                        <label class="form.label">Nombre</label>
                        <input type="text" class="form-control" name="texPropietario" autofocus required>
                    </div>
                    <div class="mb.3">
                        <label class="form.label">Ahorro</label>
                        <input type="number" class="form-control" name="texHora" autofocus required >
                    </div>
                    
                    <div class="mb.3">
                        <label class="form.label">Rifa</label>
                        <input type="number" class="form-control" name="texFecha" autofocus required >
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Fecha de prestamo</label>
                        <input type="date" class="form-control" name="texFechas" autofocus required>
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Numero de prestamo</label>
                        <input type="number" class="form-control" name="texnum" autofocus required>
                    </div>

                    <div class="mb.3">
                        <label for="prestamo" class="form.label">Prestamo</label>
                        <input type="number" class="form-control" name="texTipo" autofocus required>
                    </div>

                    

                    <div class="mb.3">
                        <label class="form.label">Fecha de abono</label>
                        <input type="date" class="form-control" name="texFechaBono" autofocus required>
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Abono</label>
                        <input  id="cedula"  type="number" class="form-control" name="texAbono" autofocus required >
                    </div>

                    
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Registrar">

                    </div>
                </form>

            </div>
        </div>

    </div>

</div>

<?php
//

?>
<!-- asi se separan los numeros por miles <script> 
    function formatoMiles(input) {
        const valor = input.value.replace(/,/g, '');
        const valorFormateado = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        input.value = valorFormateado;
    }
</script>

<label for="numero">Cedula</label>
<input type="text"  oninput="formatoMiles(this)"> -->

