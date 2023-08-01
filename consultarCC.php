<?php
//esta pagina es  para listar los datos, q nos muestre los datos q hay dentro de la tabla
include "template/header.php";
?>

<?php
$password = "";
$user = "root";
$name_bd = "parqueadero";

try {
    $bd = new PDO("mysql:host=localhost; dbname=" . $name_bd, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
} catch (Exception $e) {
    echo "Problema en la conexión: " . $e->getMessage();
}
?>

<?php
$id = $_GET['id']; // Suponiendo que el ID se pasa a través de la URL como un parámetro llamado "id"

try {
    $query = $bd->prepare("SELECT * FROM entrada3 WHERE idcedula = :id");
    $query->bindParam(':id', $id);
    $query->execute();

    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-5">
        <div class="col align-items-center">
            <div class="col-md-12">
                <form class="p-4" action="consultarCC.php" method="GET">
                    <label for="nombre">Cedula</label>
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
                            <th scope="col">Fecha de prestamo</th>
                            <th scope="col">Num prestamo</th>
                            <th scope="col">Prestamo</th>
                            <th scope="col">Fecha de abono</th>
                            <th scope="col">Abono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h1>Numero de cedula seleccionado <?php echo $id; ?></h1>

                        <?php if ($resultado) : ?>
                            <?php foreach ($resultado as $fila) : ?>
                                <tr>
                                    <td> <?php echo $fila['idcedula']; ?> </td>
                                    <td> <?php echo $fila['nombre']; ?> </td>
                                    <td> <?php echo number_format($fila['ahorro'], 0, '.', ','); ?> </td>
                                    <td <?php echo ($fila['rifa'] < 30000) ? 'style="background-color: #FF0000;"' : 'style="background-color: green;"'; ?>>
                                        <?php echo number_format($fila['rifa'], 0, '.', ','); ?>
                                    </td>
                                    <td> <?php echo $fila['fecha']; ?> </td>
                                    <td> <?php echo $fila['numPrestamo']; ?> </td>
                                    <td> <?php echo number_format($fila['prestamo'], 0, '.', ','); ?> </td>
                                    <td> <?php echo $fila['fechaAbono']; ?> </td>
                                    <td> <?php echo number_format($fila['abono'], 0, '.', ','); ?> </td>
                                    <td><a href="edit.php?idcedula=<?php echo $fila['idcedula']; ?>" class="text-success"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de Eliminar?')" href="delete.php?idcedula=<?php echo $fila['idcedula']; ?>" class="text-danger"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No se encontró información para el ID <?php echo $id; ?></p>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
