<?php
include './config.php';

$sql="SELECT * FROM provincias ORDER BY detalle";

$res=mysqli_query($link,$sql);
@mysqli_close($link);

?>
<select type="input" class="btn btn-warning" name="codprv" id="codprv"  onchange = "Carga_Localidades();" style="cursor: pointer">
	<option value="x" >Seleccione...</option>

	<?php
	while($row = mysqli_fetch_assoc ($res)){
		?><option value="<?php echo $row['id'];?>"><?php echo $row['detalle'];?></option><?php
	}?>

</select>