<?php
//esta pagina es  para listar los datos, q nos muestre los datos q hay dentro de la tabla
include "template/header.php";
?>
<?php
if(!isset($_GET["idcedula"])){
    header("Location:index.php?mensaje=error");
    exit();
}

include_once "model/db.php";

$varPlaca = $_GET["idcedula"];
$consulta = $bd->prepare("SELECT * FROM entrada3 WHERE idcedula=?;");
$consulta->execute([$varPlaca]);
$varPlaca = $consulta->fetch(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Actualizar;
                </div>
                <form class="p-5" action="editProcess.php" method="post">

                <div class="mb-4">
                        <label class="form-label">Cedula</label>
                        <input type="text"class="form-control" name="txtPlaca" required value="<?php echo $varPlaca->idcedula;?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text"class="form-control" name="txtPropietario" required value="<?php echo $varPlaca->nombre;?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ahorro</label>
                        <input type="text"class="form-control" name="txthoraEntrada" required value="<?php echo $varPlaca->ahorro;?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rifa</label>
                        <input type="text"class="form-control" name="txtfecha" required value="<?php echo $varPlaca->rifa;?>">
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Fecha</label>
                        <input type="date" class="form-control" name = "txtfechas" required value="<?php echo $varPlaca->fecha;?>" >
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Numero de prestamo</label>
                        <input type="number" class="form-control" name = "txtnum"  required value="<?php echo $varPlaca->numPrestamo;?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prestamo</label>
                        <input type="text"class="form-control" name="txtTip_Vehiculo" required value="<?php echo $varPlaca->prestamo;?>">
                    </div>

                    <div class="mb.3">
                        <label class="form.label">Fecha de abono</label>
                        <input type="date" class="form-control" name = "txtfechaAbono" required value="<?php echo $varPlaca->fechaAbono;?>" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Abono</label>
                        <input type="text"class="form-control" name="txtAbono" required value="<?php echo $varPlaca->abono;?>">
                    </div>
                   <div class="d-grid">
                   <input type="hidden" name="txtPlaca" value="<?php echo $varPlaca->idcedula ?>">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>                <div class="d-grid">
                        <input type="hidden" name="txtPlaca" value="<?php $varPlaca->idcedula?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
//

?>