<?php include('BDconect.php');?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Actualizar información de Productos</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Perzonali los mensajes de error y exito -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>
</head>

<body>
<header> 
  <div class="container">
    <h1 class="display-4">MySQL y PHP con PDO - CRUD</h1>
  </div>
</header>

<div class="container">

<?php  
if(isset($_POST['eliminar'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `producto` WHERE `id`=:id";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':id', $id, PDO::PARAM_INT);
$id=trim($_POST['id']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 
Gracias: $count registro ha sido eliminado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
$cod=$_POST['cod'];
$nombres=$_POST['nombres'];
$descripcion=$_POST['descripcion'];
$cantidad=$_POST['cantidad'];
$categoria=$_POST['categoria'];
$proveedor=$_POST['proveedor'];
$lugar=$_POST['lugar'];
$fregis = date('Y-m-d');
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into producto(cod,nombres,descripcion,cantidad,categoria,proveedor,lugar,fregis) values(:cod,:nombres,:descripcion,:cantidad,:categoria,:proveedor,:lugar,:fregis)";
    
$sql = $connect->prepare($sql);

$sql->bindParam(':cod',$cod,PDO::PARAM_STR, 25);
$sql->bindParam(':nombres',$nombres,PDO::PARAM_STR, 25);
$sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR, 25);
$sql->bindParam(':cantidad',$cantidad,PDO::PARAM_INT);
$sql->bindParam(':categoria',$categoria,PDO::PARAM_STR,25);
$sql->bindParam(':proveedor',$proveedor,PDO::PARAM_STR,25);
$sql->bindParam(':lugar',$lugar,PDO::PARAM_STR,25);
$sql->bindParam(':fregis',$fregis,PDO::PARAM_STR);
    
$sql->execute();

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > El producto $nombres se registro correctamente  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>

<?php
    
if(isset($_POST['actualizar'])){
///////////// Informacion enviada por el formulario /////////////
$id=trim($_POST['id']);
$cod=trim($_POST['cod']);
$nombres=trim($_POST['nombres']);
$descripcion=trim($_POST['descripcion']);
$cantidad=trim($_POST['cantidad']);
$categoria=trim($_POST['categoria']);
$proveedor=trim($_POST['proveedor']);
$lugar=trim($_POST['lugar']);
$fregis = date('Y-m-d');
///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE producto
SET `cod`=:cod, `nombres`= :nombres, `descripcion` = :descripcion, `cantidad` = :cantidad, `categoria` = :categoria, `proveedor` = :proveedor, `lugar` = :lugar, `fregis` = :fregis
WHERE `id` = :id";
$sql = $connect->prepare($consulta);

$sql->bindParam(':cod',$cod,PDO::PARAM_STR, 25);
$sql->bindParam(':nombres',$nombres,PDO::PARAM_STR, 25);
$sql->bindParam(':descripcion',$descripcion,PDO::PARAM_STR, 25);
$sql->bindParam(':cantidad',$cantidad,PDO::PARAM_INT);
$sql->bindParam(':categoria',$categoria,PDO::PARAM_STR,25);
$sql->bindParam(':proveedor',$proveedor,PDO::PARAM_STR,25);
$sql->bindParam(':lugar',$lugar,PDO::PARAM_STR,25);
$sql->bindParam(':fregis',$fregis,PDO::PARAM_STR);
$sql->bindParam(':id',$id,PDO::PARAM_INT);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 

  
Gracias: $count registro ha sido actualizado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actualizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  <h3 class="mt-5">Administrar datos de producto</h3>
  <hr>
  <div class="row">
  
  <!-- Insertar Registros-->
  <?php 
if (isset($_POST['formInsertar'])){?>
    <div class="col-12 col-md-12"> 
<form action="" method="POST">
  <div class="form-row">
    
  <div class="form-group col-md-6">
      <label for="cod">Codigo</label>
      <input name="cod" type="text" class="form-control" placeholder="Código">
    </div>
    <div class="form-group col-md-6">
      <label for="nombres">Nombre</label>
      <input name="nombres" type="text" class="form-control" placeholder="Nombres">
    </div>
    <div class="form-group col-md-6">
      <label for="descripcion">Descripción</label>
      <input name="descripcion" type="text" class="form-control" id="edad" placeholder="Descripcion">
    </div>
    <div class="form-group col-md-6">
      <label for="cantidad">Cantidad</label>
      <input name="cantidad" type="text" class="form-control" id="edad" placeholder="Cantidad">
    </div>

  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="proveedor">Proveedor</label>
      <input name="proveedor" type="text" class="form-control" id="proveedor" placeholder="Proveedor">
    </div>

  <div class="form-group col-md-6">
    <label for="Lugar">Lugar</label>
    <select required name="lugar" class="form-control" id="lugar">
    <option value="">...</option>
    <option value="Colombia">Colombia</option>
    <option value="Argentina">Argentina</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Peru">Peru</option>
    <option value="Brasil">Brasil</option>
    <option value="Bolivia">Bolivia</option>
    <option value="EEUU">EEUU</option>
    <option value="Europa">Europa</option>
    <option value="Asia">Asia</option>
    
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="categoria">Categoría</label>
    <select required name="categoria" class="form-control" id="categoria">
    <option value="">...</option>
    <option value="Accesorios">Accesorios</option>
    <option value="Computadoras">Computadoras</option>
    <option value="Impresoras">Impresoras</option>
    <option value="Monitores">Monitores</option>
    <option value="Portatiles">Portatiles</option>
    <option value="Tabletas">Tabletas</option>
    <option value="Celulares">Celulares</option>
    <option value="Servidores">Servidores</option>
    
    </select>
  </div>

</div>
<div class="form-group">
  <button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
</div>
</form>
    </div> 
<?php }  ?>
<!-- Fin Insertar Registros-->

<!--editar-->
<?php 
if (isset($_POST['editar'])){
$id = $_POST['id'];
$sql= "SELECT * FROM producto WHERE id = :id"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->id;?>" name="id" type="hidden">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="cod">Código</label>
      <input value="<?php echo $obj->cod;?>" name="cod" type="text" class="form-control" placeholder="cod">
    </div>
    <div class="form-group col-md-6">
      <label for="nombres">Nombre</label>
      <input value="<?php echo $obj->nombres;?>" name="nombres" type="text" class="form-control" placeholder="Nombres">
    </div>
    <div class="form-group col-md-6">
      <label for="descripcion">Descripcion</label>
      <input value="<?php echo $obj->descripcion;?>" name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion">
    </div>
    <div class="form-group col-md-6">
      <label for="cantidad">Cantidad</label>
      <input value="<?php echo $obj->cantidad;?>" name="cantidad" type="text" class="form-control" id="cantidad" placeholder="Cantidad">
    </div>
    <div class="form-group col-md-6">
      <label for="proveedor">Proveedor</label>
      <input value="<?php echo $obj->proveedor;?>" name="proveedor" type="text" class="form-control" id="proveedor" placeholder="proveedor">
    </div>
  </div>
<div class="form-row">  

  <div class="form-group col-md-6">
    <label for="Lugar">Lugar</label>
    <select required name="lugar" class="form-control" id="lugar">
    <option value="<?php echo $obj->lugar;?>"><?php echo $obj->lugar;?></option>        
    <option value="">...</option>
    <option value="Colombia">Colombia</option>
    <option value="Argentina">Argentina</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Peru">Peru</option>
    <option value="Brasil">Brasil</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Chile">Chile</option>
    <option value="EEUU">EEUU</option>
    <option value="Europa">Europa</option>
    <option value="Asia">Asia</option>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="categoria">Categoria</label>
    <select required name="categoria" class="form-control" id="categoria">
    <option value="<?php echo $obj->categoria;?>"><?php echo $obj->categoria;?></option>        
    <option value="">...</option>
    <option value="Accesorios">Accesorios</option>
    <option value="Computadoras">Computadoras</option>
    <option value="Impresoras">Impresoras</option>
    <option value="Monitores">Monitores</option>
    <option value="Portatiles">Portatiles</option>
    <option value="Tabletas">Tabletas</option>
    <option value="Celulares">Celulares</option>
    <option value="Servidores">Servidores</option>

  </select>
  </div>

</div>
<div class="form-group">
  <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
</div>
</form>
    </div>  
<?php }?>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
<div style="float:right; margin-bottom:5px;">

<form action="" method="post"><button class="btn btn-primary" name="formInsertar">Nuevo registro</button>  <a href="index.php"><button type="button" class="btn btn-primary">Cancelar</button></a></form></div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-light">
    <th width="10%">Código</th>
    <th width="20%">Nombre</th>
    <th width="30%">Descripción</th>
    <th width="5%">Cantidad</th>
    <th width="10%">Categoria</th>
    <th width="15%">Proveedor</th>
    <th width="15%">Lugar</th>
    <th width="10%">Fecha registro</th>
    <th width="5%" colspan="5"></th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM producto"; 
$query = $connect -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> cod."</td>
<td>".$result -> nombres."</td>
<td>".$result -> descripcion."</td>
<td>".$result -> cantidad."</td>
<td>".$result -> categoria."</td>
<td>".$result -> proveedor."</td>
<td>".$result -> lugar."</td>
<td>".$result -> fregis."</td>
<td>
<form method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button name='editar'>Editar</button>
</form>
</td>

<td>
<form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button name='eliminar'>Eliminar</button>
</form>
</td>
</tr>";

  }
}
?>
</tbody>
</table>
  </div>
</div>  
</div>
</div>
</div>
  
</div>
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Curso <a href=# target="_blank">ProgWeb</a></p>
    </span> </div>
</footer>
</body>
</html>





<!--gracias a NEstor Tapia del baulphp.com-->