<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php
	//print_r($_POST);
	/*
	foreach ($_POST as $nombre_campo => $valor){
	echo $nombre_campo ."=>". $valor;
	echo "<br>";
	}
	*/
	include_once('inc/config.php');
	require_once("inc/odbcss_c.php");
	
	//$DSN	= $_POST['basedatos'];
	$pais	= $_POST['pais'];
	$estado = $_POST['estado'];
	$codigo_ciudad = $_POST['cdNacimiento'];
	
	$conex = new ODBC_Conn($DSN, $user, $pass);
	
	
	if (isset($_POST['ciudad'])){
		$codigo_ciudad = $_POST['ciudad'];		
		//$sql = "SELECT cd_nombre FROM ciudades WHERE codigo='".$codigo_ciudad."'";
		$sql = "SELECT cd_nombre FROM ciudades WHERE codigo='".$codigo_ciudad."' and cod_pais='".$pais."' and cod_edo='".$estado."'";
		$conex->ExecSQL($sql) or die ("No se ha podido realizar la consulta");
		$nombre_ciudad = $conex->result[0][0];
		
		$option = "<option value=\"".$codigo_ciudad."\" selected> ".utf8_encode($nombre_ciudad)." </option>";
		
		$var = " AND codigo != '".$codigo_ciudad."' ";
	}else{
		$option = " ";
		$var = " ";
	}
	
	$sqlCiudad = "SELECT CODIGO, CD_NOMBRE ";
	$sqlCiudad.= "FROM CIUDADES ";
	$sqlCiudad.= "WHERE COD_PAIS='".$pais."' AND COD_EDO='".$estado."' ";
	$sqlCiudad.= $var;
	$sqlCiudad.=" ORDER BY CD_NOMBRE ASC";
	//echo $sqlCiudad;
	$conex->ExecSQL($sqlCiudad) or die ("No se ha podido realizar la consulta");
	$filas3 = $conex->filas;
	$conex_ciudad = $conex->result;
?>
						
<select name="ciudadN" id="ciudadN" class="datospf"><!--LISTA DESPLEGABLE DE CIUDADES-->
	<option value="">-SELECCIONE-</option>
	<?php
		echo $option;
		for ($c = 0; $c < $filas3; $c++){
			$CODIGO 	= $conex_ciudad[$c][0];
			$CD_NOMBRE 	= $conex_ciudad[$c][1];
	?>

		<option value="<?php echo $CODIGO;?>"><?php echo utf8_encode($CD_NOMBRE);?></option>
	<?php
		}
	?>
</select>

</body>

</html>
