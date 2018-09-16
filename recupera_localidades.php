<?php
include './config.php';

$id_provincia=$_GET['provincia_id'];

$sql="SELECT * FROM localidades WHERE id_provincia=$id_provincia ORDER BY detalle";
$res=mysqli_query($link,$sql);
@mysqli_close($link);
	
?>
<select type="input" class="btn btn-warning" name="codloc" id="codloc"   style="cursor: pointer">
	<option value="x" >Seleccione...</option>

	<?php
	while($row = mysqli_fetch_assoc ($res)){
		?><option value="<?php echo $row['id'];?>"><?php echo $row['detalle'];?></option><?php
	}?>
	
</select>