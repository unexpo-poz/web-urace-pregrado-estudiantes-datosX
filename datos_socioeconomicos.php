<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="funciones2.js"> </script>

<link rel="stylesheet" type="text/css" href="estilo.ccs" media="screen" /> </link>

<style type="text/css">
.datospf {
  text-align: left; 
  font-family:Arial; 
  font color:NAVY;
  font-size: 12px;
  font-weight: normal;
  background-color:000033; 
  border-style: solid;
  border-width: 1px;
  border-color: #6699CC;
   }
   
   .titulo {
  text-align: left;
  font-family:Arial;
 
  background-color:#TEAL;
  border-style: solid;
  border-width: 1px;
  border-color: #6699CC;
}
   </style>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>DATOS SOCIOECON&Oacute;MICOS</title>
</head>
		<?php
		include_once('inc/config.php');
		include_once('inc/odbcss_c.php');
		//echo $_POST[ac];
		$ci_e=$_POST['cedula'];
		$exp_e=$_POST['expediente'];
		$filas=$_POST['filas'];
		//echo "filas=";
		//echo $filas;
		//echo "exp_e=";
		//echo $exp_e;
		$residencia=$_POST['residencia'];
		//echo "resi =";
		//echo $residencia;		
		//print_r($_POST);
		$mostrar = "no";
		
		//////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del estudiante de la tabla DAT_SOCIOECONOMIC1//
		/////////////////////////////////////////////////////////////////////////////
		$conex = new ODBC_Conn($DSN,$user,$pass,TRUE,$laBitacora);
		$sql1 = "select * from DAT_SOCIOECONOMIC1 where exp_e='$exp_e' ";
		$conex->ExecSQL($sql1,__LINE__,true);
		$resulte = $conex->result;
		$fila_dat_soci = $conex->filas;
		//echo "fila_dat_soci=";
		//echo $fila_dat_soci;
		//print_r ($resulte);
		//$exp_e=$conex->result[0][0];
		//echo "exp_e=";
		$pa=$conex->result[0][1];
		$ma=$conex->result[0][2];
		$hn=$conex->result[0][3];
		$es=$conex->result[0][4];
		$hi=$conex->result[0][5];
		$nint=$conex->result[0][6];
		$l_resid=$conex->result[0][7];
		$estdo=$conex->result[0][8];
		$parent_hog=$conex->result[0][9];
		$alq_r=$conex->result[0][10];
		$mon=$conex->result[0][11];
		$tviv=$conex->result[0][12];
		$ubic=$conex->result[0][13];
		$ag=$conex->result[0][14];
		$ele=$conex->result[0][15];
		$tlf=$conex->result[0][16];
		$intrnet=$conex->result[0][17];
		$tvkabl=$conex->result[0][18];
			
		$trab=$conex->result[0][20];
		$ingmens=$conex->result[0][21];
		$depe=$conex->result[0][22];
		$mesad=$conex->result[0][23];
		$bec=$conex->result[0][24];
		$organism=$conex->result[0][25];
		$mont=$conex->result[0][26];
		$cancr=$conex->result[0][27];
		$resp=$conex->result[0][28];
		$cerb=$conex->result[0][29];;
		$sid=$conex->result[0][30];
		$diabe=$conex->result[0][31];
		$cardiac=$conex->result[0][32];
		$alergi=$conex->result[0][33];
		$rnal=$conex->result[0][34];
		$hepati=$conex->result[0][35];
		$transex=$conex->result[0][36];
		$otr=$conex->result[0][37];
		$cua=$conex->result[0][38];
		$quie=$conex->result[0][39];
		$padc_familia=$conex->result[0][40];
		$cual=$conex->result[0][41];
		$discap=$conex->result[0][42];
		$consulta=$conex->result[0][43];
		$specialista=$conex->result[0][44];
		$int_quirur=$conex->result[0][45];
		
		$comed=$conex->result[0][46];
		$transport=$conex->result[0][47];
		$rut=$conex->result[0][48];
		$prep=$conex->result[0][49];
		$alum=$conex->result[0][50];
		$lents=$conex->result[0][51];
		$odon=$conex->result[0][52];
		$prob_salud=$conex->result[0][53];
		$med_gene=$conex->result[0][54];
		$gineco=$conex->result[0][55];
		$odontolo=$conex->result[0][56];
		$teat=$conex->result[0][57];
		$excu=$conex->result[0][58];
		$danz=$conex->result[0][59];
		$cente=$conex->result[0][60];
		$musik=$conex->result[0][61];
		$deport=$conex->result[0][62];
		$participa=$conex->result[0][63];
		$acti=$conex->result[0][64];
		$finic=$conex->result[0][65];
		$ffinal=$conex->result[0][66];
		$intervencion=$conex->result[0][67];

		/////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del estudiante de la tabla DOBE_SOCIOECONOMIC//
		/////////////////////////////////////////////////////////////////////////////
		$sql2 = "select trabaja, turno_trabajo, instr_padre, ocup_padre, instr_madre, ocup_madre, tipo_vivienda, monto_alq, ingreso_f from DOBE_SOCIOECONOMIC where exp_e='$exp_e'";
		$conex->ExecSQL($sql2,__LINE__,true);
		$resulta = $conex->result;
		$filadobesoci = $conex->filas;
		//echo "filadobesoci=";
		//echo $filadobesoci;
		//print_r ($resulta);
		//echo "exp_e=";
		//echo $exp_e;
		$trabaja=$conex->result[0][0];
		$turno_trabajo=$conex->result[0][1];
		$instr_padre=$conex->result[0][2];
		$ocup_padre=$conex->result[0][3];
		$instr_madre=$conex->result[0][4];
		$ocup_madre=$conex->result[0][5];
		$tipo_vivienda=$conex->result[0][6];
		$monto_alq=$conex->result[0][7];
		$ingreso_f=$conex->result[0][8];

		///////////////////////////////////////////////////////////////////
		//rutina para extraer la info del estudiante de la tabla DACE002//
		/////////////////////////////////////////////////////////////////
		$sql3 = "select estrato_social from DACE002 where exp_e='$exp_e'";
		$conex->ExecSQL($sql3,__LINE__,true);
		$resultado = $conex->result;
		$fila_dace = $conex->filas;
		//echo "fila_dace=";
		//echo $fila_dace;
		//print_r ($resultado);
		//echo "exp_e=";
		//echo $exp_e;
		$estrato_social=$conex->result[0][0];	

		//////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info BANCARIA del estudiante de la tabla AYU_CUENTA//
		/////////////////////////////////////////////////////////////////////////////
		$sql4 = "select TIPO_CTA, NRO_CTA from AYU_CUENTA where CI_E='$ci_e'";
		$conex->ExecSQL($sql4,__LINE__,true);
		$resultado4 = $conex->result;
		$fila_cuenta_banco = $conex->filas;
		$tipo_cta=$conex->result[0][0];	
		$nro_cta=$conex->result[0][1];	

		/////////////////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info BENEFICIO ADQUIRIDO del estudiante de la tabla AYU_CUENTA//
		////////////////////////////////////////////////////////////////////////////////////////
		//////EL LAPSO DEL ULTIMO BENEFICIO ADQUIRIDO
		$sql55 = "select max(LAPSO) from AYU_ESTUDIANTES where CI_E='$ci_e'";
		$conex->ExecSQL($sql55,__LINE__,true);
		$resultado55 = $conex->result;
		$fila_ayu_est = $conex->filas;
		$max=$conex->result[0][0];	//EL ULTIMO LAPSO QUE HIZO AYUDANTIA

		////////////////////////////////////////////////////////////////////////////////////////
		////////////rutina para extraer la info BENEFICIO ADQUIRIDO/////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////
		$sql56 = "select TIPO, NRO_HORA, NOMBRE_AYU from AYU_ESTUDIANTES, AYU_MONTO where CI_E='$ci_e' AND LAPSO='$max' AND TIPO=TIPO_AYU";
		$conex->ExecSQL($sql56,__LINE__,true);
		$resultado56 = $conex->result;
		$fila_ayu_est = $conex->filas;
		$tipo=$conex->result[0][0];	
		$nro_hora=$conex->result[0][1];
		$nombre_ayu=$conex->result[0][2];

		/////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info DEPENDENCIA DE LA AYUDANTIA ACTUAL/////////////
		/////////////////////////////////////////////////////////////////////////////
		$sql7 = "select DEPENDENCIA from ASISTENCIAS where CI_E='$ci_e' AND LAPSO='$lapsoProceso'";
		$conex->ExecSQL($sql7,__LINE__,true);
		$resultado = $conex->result;
		$fila_dependencia = $conex->filas;
		$dependencia=$conex->result[0][0];	//DEPENDENCIA DE LA AYUDANTIA DEL LAPSO PROCESO
		
		/////////////////////////////////////////////////////////////////////////////
		///////rutina para extraer la info U.C. CURSADAS ACTUALMENTE (INSCRITOS)/////
		/////////////////////////////////////////////////////////////////////////////
		$sql8 = "select distinct U_CREDITOS, D06.C_ASIGNA from TBLACA009 T09, DACE006 D06 where EXP_E='$exp_e' AND D06.LAPSO='$lapsoProceso' AND T09.C_ASIGNA=D06.C_ASIGNA AND STATUS IN(7, 'A')";
		$conex->ExecSQL($sql8,__LINE__,true);
		$resultado8 = $conex->result;
		$fila_uc_actuales = $conex->filas;
	
		if ($fila_uc_actuales != 0){//SI HAY REGISTROS
		
			for($i=0; $i < $fila_uc_actuales; $i++){
				$matriz[]=$conex->result[$i][0];//SUSTRAE EL VALOR ABSOLUTO DE LA U.C (04 -> 4)
				//print_r($matriz);
			}
			$uc_actuales = array_sum($matriz);//SUMA LAS U.C. ACTUALES
			
		}
		
		//SI LAPSO ACTUAL ES EL MISMO LAPSO DEL ULTIMO BENEFICIO ADQUIRIDO		
		/////////////////////////////////////////////////////////////////////////////
		////////rutina para extraer EL LAPSO ANTERIOR DEL BENEFICIO ADQUIRIDO////////
		/////////////////////////////////////////////////////////////////////////////
	if ($lapsoProceso == $max){//SI LAPSO ACTUAL ES EL MISMO LAPSO DEL ULTIMO BENEFICIO ADQUIRIDO
		$semestre = $max;
		$lapso=$max;
	}else{
		$semestre = $lapsoProceso;
		$lapso=$lapsoProceso;
		$nombre_ayu = "";
	}//FIN if ($lapsoProceso == $max)

		$mostrar = "si";
		
				$a = strlen($semestre) - 1;//LA LONGITUD DEL LAPSO PROCESO - 1
				
				if ($semestre[$a] == '2'){//SI EL LAPSOPROCESO TERMINA EN "2"
				
					$LapsoAnterior = str_replace("-2", "-1", $semestre);//REMPLAZA -2 POR -1
					 
				}else{ if ($semestre[$a] == '1'){//SI EL LAPSOPROCESO TERMINA EN "1"
				
					$LapsoAnterior = (substr($semestre, 0, -2)- 1).'-2';//SUSTRAE SOLO EL A�O
							 							//AL A�O SE LE RESTA UN A�O Y CONCATENA '-2'	
						}
					}

### OJO ### OJO ### OJO ### OJO ### OJO ### OJO ### OJO ### OJO ### OJO ###

		// Ajustado Manualmente para el lapso 2014-U
				$LapsoAnterior = '2014-U';
		// Para el lapso 2015-1 sera necesario ajustar el valor de $LapsoAnterior a 2014-U
		// Para el lapso 2015-2 comentar el ajuste ya que la rutina anterior calcula el lapso automaticamente.

###########################################################################
					
				////////////////////////////////////////////////////////////////////////////////////////
				///////////////////rutina para extraer INF. DEL BENEFICIO ANTERIOR//////////////////////
				////////////////////////////////////////////////////////////////////////////////////////
				$sql_BA = "select TIPO, NRO_HORA, NOMBRE_AYU, DEPENDENCIA  from AYU_ESTUDIANTES AE, AYU_MONTO, ASISTENCIAS A where AE.CI_E='$ci_e' AND A.CI_E='$ci_e' AND A.LAPSO='$LapsoAnterior' AND AE.LAPSO='$LapsoAnterior' AND TIPO = TIPO_AYU";
				$conex->ExecSQL($sql_BA,__LINE__,true);
				$resultadoBA = $conex->result;
				$fila_ayu_estBA = $conex->filas;
				$tipoBA=$conex->result[0][0];	
				$nro_horaBA=$conex->result[0][1];  //HORAS DEL BENEFICIO ANTERIOR
				$nombre_ayuBA=$conex->result[0][2];//NOMBRE DEL BENEFICIO ANTERIOR
				
				if ($conex->result[0][3] == "DEPENDENCIA"){
					$dependenciaAnte = "";
				} else {
					$dependenciaAnte=$conex->result[0][3];	//DEPENDENCIA DEL BENEFICIO ANTERIOR
				}
				

				//////////////////////////////////////////////////////////////////////////////
				///////rutina para extraer la info U.C. CURSADOAS EN EL LAPSO ANTERIOR///////
				/////////////////////////////////////////////////////////////////////////////
				$sql10 = "select distinct U_CREDITOS, D04.C_ASIGNA from TBLACA009 T09, DACE004 D04 where EXP_E='$exp_e' AND D04.LAPSO='$LapsoAnterior' AND T09.C_ASIGNA=D04.C_ASIGNA AND STATUS IN(1, 0)";
				$conex->ExecSQL($sql10,__LINE__,true);
				$resultado10 = $conex->result;
				$fila_uc_anterior = $conex->filas;
				//$uc_actuales=$conex->result[0][0];
				//print_r ($resultado8);
				if ($fila_uc_anterior != 0){//SI HAY REGISTROS
				
					for($i=0; $i<$fila_uc_anterior; $i++){
						$matriz_anterior[]=$conex->result[$i][0];//SUSTRAE EL VALOR ABSOLUTO DE LA U.C (04 -> 4)
						//print_r($matriz);
					}
					$uc_anterior = array_sum($matriz_anterior);//SUMA LAS U.C. ACTUALES
					
				}
		//////////////////////////////////////////////////////////////////
		//rutina para insertar la informacion en las tablas respectivas//
		////////////////////////////////////////////////////////////////
		$nombres= $_POST['nombres'] ; $nombres =strtoupper($nombres);
		$apellidos = $_POST['apellidos']; $apellidos =strtoupper($apellidos);
		$sexo=$_POST['sexo'];
		////direccion principal del estudiante/////
		$ciudad=$_POST['ciudad']; $ciudad =strtoupper($ciudad);
		$estado=$_POST['estado']; $estado =strtoupper($estado);
		$avenida=$_POST['avenida']; $avenida =strtoupper($avenida);
		$urbanizacion=$_POST['urbanizacion']; $urbanizacion =strtoupper($urbanizacion);
		$manzana=$_POST['manzana'];
		$edificio=$_POST['edificio']; $edificio =strtoupper($edificio);
		$nrocasa=$_POST['nrocasa'];
		$dir_p=$ciudad.".".$estado.".".$avenida.".".$urbanizacion.".".$manzana.".".$edificio.".".$nrocasa;
		//////////////////////////////////////////////////////////////////////////////////////////////////
		$telfp_e=$_POST['telfp_e'];
		////direccion de residencia del estudiante/////
		$ciudad_r=$_POST['ciudad_r']; $ciudad_r =strtoupper($ciudad_r);
		$estado_r=$_POST['estado_r']; $estado_r =strtoupper($estado_r);
		$avenida_r=$_POST['avenida_r']; $avenida_r =strtoupper($avenida_r);
		$urbanizacion_r=$_POST['urbanizacion_r']; $urbanizacion_r =strtoupper($urbanizacion_r);
		$manzana_r=$_POST['manzana_r'];
		$edificio_r=$_POST['edificio_r']; $edificio_r =strtoupper($edificio_r);
		$nrocasa_r=$_POST['nrocasa_r'];
		$dir_r="*".$ciudad_r.".".$estado_r.".".$avenida_r.".".$urbanizacion_r.".".$manzana_r.".".$edificio_r.".".$nrocasa_r;
		/////////////////////////////////////////////////////
		$telfr_e=$_POST['telfr_e'];
		///fecha de nacimiento///
		$dia=$_POST['dia'];
		$mes=$_POST['mes'];
		$ano=$_POST['ano'];
		///concatenando fecha de nacimiento///
		$f_nac=$ano."-".$mes."-".$dia;
		//echo "fecha nacimiento: ".$f_nac;
		//////////////////////////////////////
		$edo_c_e=$_POST['edo_c_e'];
		$pais_nac_e=$_POST['pais_nac_e'];//el select del formulario
		//$p_nac_e=$_POST['p_nac_e']; $p_nac_e =strtoupper($p_nac_e);
		$ciudadN=$_POST['ciudadN'];//el select de ciudades del formulario
		//$l_nac_e=$_POST['l_nac_e']; $l_nac_e =strtoupper($l_nac_e);
		$edo_nac_e = $_POST['edo_nac_e'];//el select de estados del formulario
		$otroPaisestado = strtoupper($_POST['otroPaisestado']);//Estado Nacimiento Extranjero
		$otroPaisciudad = strtoupper($_POST['otroPaisciudad']);//Ciudad Nacimiento Extranjero
		$nac_e=$_POST['nac_e']; 
		$res_extraj=$_POST['res_extraj'];
		$doc_ident=$_POST['doc_ident'];
		$pasaporte_nro=$_POST['pasaporte_nro'];
		$nombres2= $_POST['nombres2'] ; $nombres2 =strtoupper($nombres2);
		$apellidos2 = $_POST['apellidos2']; $apellidos2 =strtoupper($apellidos2); 
		$urbanizacion=$_POST['urbanizacion']; $urbanizacion =strtoupper($urbanizacion);
		$avenida=$_POST['avenida']; $avenida =strtoupper($avenida);
		$manzana=$_POST['manzana'];
		$nrocasa=$_POST['nrocasa'];		
		///telf celular///////////
		$celcod=$_POST['celcod'];
		$telf2=$_POST['telf2'];
		///concatenando telf celular///
		$telefono2=$celcod."-".$telf2;
		//////////////////////////////		
		$telefono3=$_POST['telefono3'];
		$correo1=$_POST['correo1'];
		$correo2=$_POST['correo2'];
		$ciudad=$_POST['ciudad']; $ciudad =strtoupper($ciudad);
		$estado=$_POST['estado']; $estado =strtoupper($estado);
		//$ciudadN = 0;
		if ($pais_nac_e != 232){//si es diferente de Venezuela
			$edo_nac_e = $otroPaisestado;
			$ciudadN = $otroPaisciudad;
		}
		$etnia_indigena = $_POST['etniaS'];
		$afro = $_POST['afrodescendiente'];
		$disca = $_POST['tipo_discaS'];
		$carnet_disca = $_POST['carnet_disca'];
		$filas_ACADEMICO = $_POST['filas_ACADEMICO'];
		$nomb_plantel = strtoupper($_POST['plantelI']);//$ciudad =strtoupper($ciudad);
		$tipo_plantel = $_POST['tipo_plantelS'];
		$costo_mensual = $_POST['costo_mensualI'];
		$pais_plantel = $_POST['pais_plantel'];
		$edo_plantel = $_POST['edo_plantel'];
		$cd_plantel = $_POST['codigoc_S_1'];//estados_ciudadesPlantel.php
		$mpio_plantel = $_POST['codigom_S_1'];//estados_municipios.php
		$edo_plantel_e = strtoupper($_POST['edo_plantel_eI']);
		$cd_plantel_e = strtoupper($_POST['cd_plantel_eI']);
		$mpio_plantel_e = strtoupper($_POST['mpio_plantel_eI']);

		if ($pais_plantel != 232){//si es diferente de Venezuela
			$edo_plantel = $edo_plantel_e;
			$cd_plantel = $cd_plantel_e;
			$mpio_plantel = $mpio_plantel_e;
		}
		$anio_egre_cole = $_POST['ano_egre_coleS'];
		//SE CONCATENA OTRO SISTEMA DE ESTUDIO(OTRO:XXXXXX)
		$sistema_estudio = $_POST['sistema_estudioS'];
		$otroSistema = $_POST['otroSistemaE'];
		if ($sistema_estudio == 'OTRO'){
			$sistema_estudio = strtoupper($sistema_estudio.":".$otroSistema);
		}
		$turno_estudio = $_POST['turno_estudioS'];
		//SE CONCATENA OTRO TURNO DE ESTUDIO(OTRO:XXXXXX)
		$otroTurno = $_POST['otroTurnoE'];
		if ($turno_estudio == 'OTRO'){
			$turno_estudio = strtoupper($turno_estudio.":".$otroTurno);
		}
		$titulo_b = $_POST['titulo_bS'];
		$promedio_b = $_POST['promedioS'];//�QUE SE GUARDA?
		//$tipoIngreso = $_POST['tipoIngreso'];//SE SUPONE QUE ESTO NO DEBE SER CAMBIADO POR EL ESTUDIANTE
		$opcion_cnu = $_POST['opcion_cnuS'];
		$rusnie = $_POST['sit_eI'];
		$promBachill = $_POST['ind_cnuI'];
		$opcion_cnu = $_POST['opcion_cnuS'];
		//OPCION PARA EL CNU
		switch($opcion_cnu){
			case "PRIMERA":
				$opcion_cnu = "1";
			break;
			case "SEGUNDA":
				$opcion_cnu = "2";
			break;
			case "TERCERA":
				$opcion_cnu = "3";
			break;
			case "CUARTA":
				$opcion_cnu = "4";
			break;
			case "QUINTA":
				$opcion_cnu = "5";
			break;
			case "SEXTA":
				$opcion_cnu = "6";
			break;
			case "NINGUNA":
				$opcion_cnu = "0";
			break;
		}
				
		if ($filas==1)
		{

		////////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla DACE002 //////
		//////////////////////////////////////////////////////////////////////
	//echo"esta es el print";
	//print_r($_POST);
	//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
	$sql  = "UPDATE DACE002 SET dirp_e='$dir_p', telfp_e='$telfp_e', dirr_e='$dir_r', telfr_e='$telfr_e', edo_c_e='$edo_c_e', etnia_indigena='$etnia_indigena', res_extraj='$res_extraj', doc_ident='$doc_ident', pasaporte_nro='$pasaporte_nro', urbanizacion='$urbanizacion', avenida='$avenida', manzana='$manzana', nrocasa='$nrocasa', telefono2='$telefono2', telefono3='$telefono3', correo1='$correo1', correo2='$correo2', ciudad='$ciudad', estado='$estado', ent_fed='$edo_nac_e', p_nac_e='$pais_nac_e', l_nac_e='$ciudadN', ind_cnu='$promBachill', opcion_cnu='$opcion_cnu',sexo='$sexo' WHERE exp_e='$exp_e' ";
	
		$conex->ExecSQL($sql,__LINE__,true);
		$modif = $conex->fmodif;
		//echo $modif;

	//actualizar en DOBE_SOCIOECONOMIC
	$sqlDOBE_S  = "UPDATE DOBE_SOCIOECONOMIC SET AFRODESCEN='$afro', TIPO_DISCA='$disca', CARNET_DISCA='$carnet_disca' WHERE exp_e='$exp_e' ";
	
	$conex->ExecSQL($sqlDOBE_S,__LINE__,true);
	$modif = $conex->fmodif;
	//echo $modif;

	if ($filas_ACADEMICO == 1){
		//actualizar en DOBE_ACADEMICO
		//aqui va todos los campos de 3.1. DATOS ACADEMICOS BACHILLERATO (LICEO)
		$sqlDOBE_A  = "UPDATE DOBE_ACADEMICO SET plantel='$nomb_plantel', tipo_plantel='$tipo_plantel', costo_mensual='$costo_mensual', codigo_p='$pais_plantel', codigo_e='$edo_plantel', codigo_c='$cd_plantel', codigo_m='$mpio_plantel', ano_egre_cole='$anio_egre_cole', sistema_estudio='$sistema_estudio', turno_estudio='$turno_estudio', titulo_b='$titulo_b', promedio='$promBachill' WHERE exp_e='$exp_e' ";
	
		$conex->ExecSQL($sqlDOBE_A,__LINE__,true);
		$modif = $conex->fmodif;
		//echo $modif;
	} else {
		////////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en DOBE_ACADEMICO ////
		///////////////////////////////////////////////////////////////////////////
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqlACADEMICO  = "INSERT INTO DOBE_ACADEMICO (exp_e, plantel, tipo_plantel, costo_mensual, codigo_p, codigo_e, codigo_c, codigo_m, ano_egre_cole, sistema_estudio, turno_estudio, titulo_b, promedio) VALUES ('$exp_e','$nomb_plantel', '$tipo_plantel', '$costo_mensual', '$pais_plantel', '$edo_plantel', '$cd_plantel', '$mpio_plantel', '$anio_egre_cole', '$sistema_estudio', '$turno_estudio', '$titulo_b', '$promBachill')";
	
		$conex->ExecSQL($sqlACADEMICO,__LINE__,true);
		$modif = $conex->fmodif;
		//echo $modif;
	}
		}
			else
					{
		////////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la base de datos DACE002 ////
		///////////////////////////////////////////////////////////////////////////
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqlent  = "INSERT INTO DACE002 (exp_e, dirp_e, telfp_e, dirr_e, telfr_e, edo_c_e, etnia_indigena, res_extraj, doc_ident, pasaporte_nro, urbanizacion, avenida, manzana, nrocasa, telefono2, telefono3, correo1, correo2, ciudad, estado, ent_fed, p_nac_e, l_nac_e, ind_cnu, opcion_cnu, sexi) VALUES ('$exp_e', '$dir_p', '$telfp_e', '$dir_r', '$telfr_e', '$edo_c_e','$etnia_indigena', '$res_extraj', '$doc_ident', '$pasaporte_nro', '$urbanizacion', '$avenida', '$manzana', '$nrocasa', '$telefono2', '$telefono3', '$correo1', '$correo2', '$ciudad', '$estado', '$edo_nac_e', '$pais_nac_e', '$ciudadN', '$promBachill', '$opcion_cnu', '$sexo')";
	
		$conex->ExecSQL($sqlent,__LINE__,true);
		$modif = $conex->fmodif;
		//echo $modif;
						}	
						
		/////////////////////////////////////////////////		
		/*
		if ($fila_cuenta_banco == 1)
		{

		////////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla AYU_CUENTA //////
		//////////////////////////////////////////////////////////////////////
		$sql2  = "UPDATE AYU_CUENTA SET TIPO_CTA='$tipo_cta', NRO_CTA='$nro_cta' WHERE CI_E='$ci_e'";
	
		$conex->ExecSQL($sql2,__LINE__,true);
		$modif = $conex->fmodif;
	
		}
			else{ if ($fila_ayu_est > 0){

		////////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la TABLA AYU_CUENTA////
		///////////////////////////////////////////////////////////////////////////
		//echo $tipo_cta;
		//echo $nro_cta;
		$sqlent2  = "INSERT INTO AYU_CUENTA (TIPO_CTA, NRO_CTA) VALUES ('$tipo_cta', '$nro_cta') ";
	
		$conex->ExecSQL($sqlent2,__LINE__,true);
		$modif = $conex->fmodif;

					}
			}
	*/
	/////////////////////////////////////////
		//Si le dio la bot�n Guardar y Salir										
		if ($_POST[ac] == '2') 
				
		die (" <script language= \"javascript\" > window.close (); </script> ");
		
		
		?>


	<body onload="javascript:mostrar();">
    
    <table border="0" width="1000px" background = "imagenes/header_espi.GIF" align="center">
		<tr><td>
		<img src="imagenes/dibujo2.GIF" width="1000px" height="136" border="0" alt="" title = "">
		</td></tr>
</table>
<table align="center">
<tr>
	<td><B><font color=NAVY>INFORMACI&Oacute;N SOCIOECON&Oacute;MICA</font></B></td>
</tr>
</table>


	<form action="envio_regulares.php" method="post" name="valido" >

	<input type="hidden" name="fila_cuenta_banco"    value="<?php echo $fila_cuenta_banco; ?>" />
	<input type="hidden" name="expediente"    value="<?php echo $exp_e; ?>" />
	<input type="hidden" name="fila_dat_soci" value="<?php echo $fila_dat_soci; ?>" />
    <input type="hidden" name="filadobesoci"  value="<?php echo $filadobesoci; ?>" />
    <input type="hidden" name="fila_dace"     value="<?php echo $fila_dace; ?>" />
    <input type="hidden" name="fila_ayu_est"     value="<?php echo $fila_ayu_est; ?>" />
    <input type="hidden" name="resi"   	      value="<?php echo $residencia; ?>" />

	<input type="hidden" name="nac"        value="<?php echo $nac_e; ?>" />
	<input type="hidden" name="cedula"        value="<?php echo $ci_e; ?>" />
    <input type="hidden" name="sexo"        value="<?php echo $sexo; ?>" />
    <input type="hidden" name="a"          value="<?php echo $an; ?>" />
	<input type="hidden" name="m"          value="<?php echo $me; ?>" />
    <input type="hidden" name="d"          value="<?php echo $di; ?>" />
   	<input type="hidden" name="edociv"     value="<?php echo $edo_c_e; ?>" />
   	<input type="hidden" name="f_nac"     value="<?php echo $f_nac; ?>" />
	
   	<input type="hidden" name="lapso"     value="<?php echo $lapso; ?>" />
   	<input type="hidden" name="beneficioactual"     value="<?php echo $nombre_ayu; ?>" />
   	<input type="hidden" name="nrohorasactual"     value="<?php echo $nro_hora; ?>" />
   	<input type="hidden" name="dependenciactu"     value="<?php echo $dependencia; ?>" />
   	<input type="hidden" name="uc_actuales"     value="<?php echo $uc_actuales; ?>" />
   	<input type="hidden" name="LapsoAnterior"     value="<?php echo $LapsoAnterior; ?>" />
   	<input type="hidden" name="beneficioanterior"     value="<?php echo $nombre_ayuBA; ?>" />
   	<input type="hidden" name="nrohorasanterior"     value="<?php echo $nro_horaBA; ?>" />
   	<input type="hidden" name="dependenciante"     value="<?php echo $dependenciaAnte; ?>" />
   	<input type="hidden" name="uc_anterior"     value="<?php echo $uc_anterior; ?>" />
	
        
    <input type="hidden" name="pad"      value="<?php echo $pa; ?>" />
    <input type="hidden" name="mad"      value="<?php echo $ma; ?>" />
    <input type="hidden" name="herm"     value="<?php echo $hn; ?>" />
	<input type="hidden" name="esp"      value="<?php echo $es; ?>" />
    <input type="hidden" name="hij"      value="<?php echo $hi; ?>" />
    <input type="hidden" name="numint"   value="<?php echo $nint; ?>" />
	<input type="hidden" name="parent"   value="<?php echo $parent_hog; ?>" />
    <input type="hidden" name="lres"     value="<?php echo $l_resid; ?>" />
    <input type="hidden" name="turno"    value="<?php echo $turno_trabajo; ?>">
    <input type="hidden" name="instr_p"  value="<?php echo $instr_padre; ?>" />
    <input type="hidden" name="ocup_p"   value="<?php echo $ocup_padre; ?>" />
    <input type="hidden" name="instr_m"  value="<?php echo $instr_madre; ?>" />
    <input type="hidden" name="ocup_m"   value="<?php echo $ocup_madre; ?>" />
    <input type="hidden" name="tipo_vivien" value="<?php echo $tipo_vivienda; ?>" />
    <input type="hidden" name="st_social" value="<?php echo $estrato_social; ?>" />
    <input type="hidden" name="ing_f"     value="<?php echo $ingreso_f; ?>" />
    <input type="hidden" name="residen"     value="<?php echo $alq_r; ?>" />
    <input type="hidden" name="tvi"      value="<?php echo $tviv; ?>" />
    <input type="hidden" name="ubi"      value="<?php echo $ubic; ?>" />
    <input type="hidden" name="ag"        value="<?php echo $ag; ?>" />
    <input type="hidden" name="elec"     value="<?php echo $ele; ?>" />
    <input type="hidden" name="telefo"   value="<?php echo $tlf; ?>" />
	<input type="hidden" name="intern"   value="<?php echo $intrnet; ?>" />
    <input type="hidden" name="tvca"     value="<?php echo $tvkabl; ?>" />
    <input type="hidden" name="trab"     value="<?php echo $trab; ?>">
    <input type="hidden" name="b"        value="<?php echo $bec; ?>" />
    <input type="hidden" name="ca"       value="<?php echo $cancr; ?>" />
	<input type="hidden" name="re"       value="<?php echo $resp; ?>" />
    <input type="hidden" name="cere"     value="<?php echo $cerb; ?>" />
    <input type="hidden" name="si"       value="<?php echo $sid; ?>" />
    <input type="hidden" name="di"       value="<?php echo $diabe; ?>" />
	<input type="hidden" name="card"     value="<?php echo $cardiac; ?>" />
    <input type="hidden" name="ale"      value="<?php echo $alergi; ?>" />
    <input type="hidden" name="ren"      value="<?php echo $rnal; ?>" />
	<input type="hidden" name="hep"      value="<?php echo $hepati; ?>" />
    <input type="hidden" name="tx"       value="<?php echo $transex; ?>" />
    <input type="hidden" name="o"        value="<?php echo $otr; ?>" />
    <input type="hidden" name="pade"     value="<?php echo $padc_familia; ?>" />
    <input type="hidden" name="dis"      value="<?php echo $discap; ?>" />
    <input type="hidden" name="inter"    value="<?php echo $int_quirur; ?>">
    <input type="hidden" name="cons"     value="<?php echo $consulta; ?>"/>
    <input type="hidden" name="pr"       value="<?php echo $prep; ?>" />
    <input type="hidden" name="al"       value="<?php echo $alum; ?>" />
    <input type="hidden" name="len"      value="<?php echo $lents; ?>" />
	<input type="hidden" name="od"       value="<?php echo $odon; ?>" />
    <input type="hidden" name="probs"    value="<?php echo $prob_salud; ?>" />
    <input type="hidden" name="med"      value="<?php echo $med_gene; ?>" />
	<input type="hidden" name="gin"      value="<?php echo $gineco; ?>" />
	<input type="hidden" name="odo"      value="<?php echo $odontolo; ?>" />
    <input type="hidden" name="com"      value="<?php echo $comed; ?>" />
    <input type="hidden" name="trans"    value="<?php echo $transport; ?>" />
    <input type="hidden" name="tea"      value="<?php echo $teat; ?>" />
	<input type="hidden" name="ex"       value="<?php echo $excu; ?>" />
    <input type="hidden" name="dan"      value="<?php echo $danz; ?>" />
    <input type="hidden" name="ce"       value="<?php echo $cente; ?>" />
    <input type="hidden" name="musi"     value="<?php echo $musik; ?>" />
	<input type="hidden" name="depo"     value="<?php echo $deport; ?>" />
    <input type="hidden" name="part"     value="<?php echo $participa; ?>" />
    <input type="hidden" name="tipo_cta"    value="<?php echo $tipo_cta; ?>" />
    <input type="hidden" name="nro_cta"     value="<?php echo $nro_cta; ?>" />
	<input type="hidden" name="mostrar"     value="<?php echo $mostrar; ?>" />
	<!-- aqui van los datos nuevos -->
	<input type="hidden" name="etnia" value="<?php echo $etnia_indigena; ?>" />
	<input type="hidden" name="afro" value="<?php echo $afro; ?>" />
	<input type="hidden" name="disca" value="<?php echo $disca; ?>" />
	<input type="hidden" name="carnet_disca" value="<?php echo $carnet_disca; ?>" />
	<input type="hidden" name="nomb_plantel" value="<?php echo $nomb_plantel; ?>" />
	<input type="hidden" name="tipo_plantel" value="<?php echo $tipo_plantel; ?>" />
	<input type="hidden" name="costo_mensual" value="<?php echo $costo_mensual; ?>" />
	<input type="hidden" name="pais_plantel" value="<?php echo $pais_plantel; ?>" />
	<input type="hidden" name="edo_plantel" value="<?php echo $edo_plantel; ?>" />
	<input type="hidden" name="cd_plantel" value="<?php echo $cd_plantel; ?>" />
	<input type="hidden" name="mpio_plantel" value="<?php echo $mpio_plantel; ?>" />
	<input type="hidden" name="anio_egre_cole" value="<?php echo $anio_egre_cole; ?>" />
	<input type="hidden" name="sistema_estudio" value="<?php echo $sistema_estudio; ?>" />
	<input type="hidden" name="turno_estudio" value="<?php echo $turno_estudio; ?>" />
	<input type="hidden" name="titulo_b" value="<?php echo $titulo_b; ?>" />
	<input type="hidden" name="opcion_cnu" value="<?php echo $opcion_cnu; ?>" />
	<input type="hidden" name="rusnie" value="<?php echo $rusnie; ?>" />
	<input type="hidden" name="promBachill" value="<?php echo $promBachill; ?>" />

<!--$tipoIngreso = $_POST['tipoIngreso'];//SE SUPONE QUE ESTO NO DEBE SER CAMBIADO POR EL ESTUDIANTE
 -->
<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color=NAVY><B>4. DATOS FAMILIARES</B></font></td>
</tr>
</table> 

<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td width="2%" colspan="3" > 
    <font color= NAVY>Grupo Familiar: </font>&nbsp;&nbsp;
            
    <font color= NAVY>Padre  </font>
    <input type="checkbox" name="padre" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            
    <font color= NAVY>Madre </font>
    <input type="checkbox" name="madre" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY>Hermanos </font>
    <input type="checkbox" name="hnos" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY>Esposa(o) </font> 
    <input type="checkbox" name="espo" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY>Hijos </font>
    <input type="checkbox" name="hijos" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
</tr>
  		
<tr>
    <td width="23%">
    <font color= NAVY> N&deg; de Personas que Conforman el Grupo Familiar: </font><br/>
    <select name="nintegrantes" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="4 O MENOS"> 4 Personas o menos </option>
    <option value="5 PERSONAS"> 5 Personas </option>
    <option value="6 PERSONAS"> 6 Personas </option>
    <option value="7 PERSONAS"> 7 Personas </option>
    <option value="8 O MAS"> 8 Personas o m&aacute;s </option>
    </select> 
    </td>
            
            
    <td width="23%">
    <font color= NAVY> Parentesco con el Jefe(a) del Hogar donde Resides: </font><br/>
    <select name="parentesco_hog" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="JEF DE HOGAR"> Yo soy jefe(a) </option>
    <option value="ESPOSO(A)"> Esposo(a) </option>
    <option value="HIJO(A)"> Hijo(a) o Hijastro(a) </option>
    <option value="HERMANO(A)"> Hermano(a) </option>
    <option value="SOBRINO(A)"> Sobrino(a) </option>
    <option value="YERNO"> Yerno </option>
    <option value="NUERA"> Nuera </option>
    <option value="NINGUNO"> No soy pariente </option>
    </select>
    </td>
        
        
    <td width="23%">
    <label for="lug_resid"></label><font color= NAVY> Lugar de Residencia del Grupo Familiar: </font><br/>
    <select name="lug_resid" size="1" onchange="toggle_lug_resid(this)" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="PTOO"> Puerto Ordaz </option>
    <option value="SNFELIX"> San Felix </option>
    <option value="OTRO"> Otro Estado </option>
    </select>
            
    <span id="span_otro_lugar" style="display:none"> <label for="estado">
    <input name="estado" type="text" size="25" maxlength="25" id="estado" onkeyup="letras ()" value="<?php echo "$estdo";?>" 
    class="datospf"/> </label></span>
    </td>
</tr>
   
    <td>
    <font color= NAVY> Instrucci&oacute;n Acad&eacute;mica del Padre: </font><br/>
    <select name="instr_padre" size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="PRIMARIA INCOMPLETA"> Primaria Incompleta </option>
    <option value="PRIMARIA COMPLETA"> Primaria Completa </option>
    <option value="SECUNDARIA INCOMPLETA"> Secundaria Incompleta </option>
    <option value="SECUNDARIA COMPLETA"> Secundaria Completa </option>
    <option value="TECNICO SUP. UNIVERSITARIO"> T&eacute;cnico Sup. Universitario </option>
    <option value="UNIVERSITARIO"> Universitario </option>
    </select> 
    </td>
       
    <td>
    <label for="ocup_padre"></label>
    <font color= NAVY> Ocupaci&oacute;n del Padre: </font><br/>
    <select name="ocup_padre" onchange="toggle_otra_ocup(this)" size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="PROFESIONAL UNIVERSITARIO"> Profesional Universitario </option>
    <option value="COMERCIANTE FORMAL"> Comerciante Formal </option>
    <option value="COMERCIANTE INFORMAL"> Comerciante Informal </option>
    <option value="EMPLEADO"> Empleado </option>
    <option value="OBRERO"> Obrero </option>
    <option value="TECNICO"> T&eacute;cnico </option>
	<option value="HOGAR"> Hogar </option>
    <option value="POLITICO"> Pol&iacute;tico </option>
    <option value="OTRO"> Otra </option>
	</select>
     
            
    <span id="span_otra_ocup" style="display:none"> <label for="otra_ocup">
    <input name="otra_ocup" type="text" size="18" maxlength="25" id="otra_ocup" onkeyup="letras ()" 
    value="<?php echo "$ocup_padre";?>" class="datospf"/> </span> 
    </td>
        
    <td>
    <font color= NAVY> Instrucci&oacute;n Acad&eacute;mica de la Madre: </font><br/>
    <select name="instr_madre"  size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="PRIMARIA INCOMPLETA"> Primaria Incompleta </option>
    <option value="PRIMARIA COMPLETA"> Primaria Completa </option>
    <option value="SECUNDARIA INCOMPLETA"> Secundaria Incompleta </option>
    <option value="SECUNDARIA COMPLETA"> Secundaria Completa </option>
    <option value="TECNICO SUP. UNIVERSITARIO"> T&eacute;cnico Sup. Universitario </option>
    <option value="UNIVERSITARIO"> Universitario </option>
    </select> 
    </td>
</tr>

<tr>
    <td>
    <font color= NAVY>Ocupaci&oacute;n de la Madre: </font><br/>
    <select name="ocup_madre" onchange="toggle_otra_oc(this)" size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="PROFESIONAL UNIVERSITARIO"> Profesional Universitario </option>
    <option value="COMERCIANTE FORMAL"> Comerciante Formal </option>
    <option value="COMERCIANTE INFORMAL"> Comerciante Informal </option>
    <option value="EMPLEADA"> Empleada </option>
    <option value="OBRERA"> Obrera </option>
    <option value="TECNICO"> T&eacute;cnico </option>
	<option value="HOGAR"> Hogar </option>
    <option value="POLITICA"> Pol&iacute;tica </option>
    <option value="OTRO"> Otra </option>
    </select>
            
    <span id="span_otra_oc" style="display:none"> <label for="otra_oc">
    <input name="otra_oc" type="text" size="18" maxlength="25" id="otra_oc" onkeyup="letras ()" 
    value="<?php echo "$ocup_madre";?>" class="datospf"/> </span> 
    
    </td>
        
    <td>
    <label for="tipo_vivienda"></label><font color= NAVY> Tenencia de Vivienda: </font><br/>
    <select name="tipo_vivienda" size="1" onchange="toggle_alquilada(this)" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="PROPIA"> Pr&oacute;pia </option>
    <option value="ALQUILADA"> Alquilada </option>
    <option value="HIPOTECADA"> Hipotecada </option>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
            
    <span id="span_alquiler" style="display:none"> <label for="monto_alq"> <font color= NAVY> Alquiler(Bs):</font></label>
    <input name="monto_alq" type="text" size="6" maxlength="8" id="monto_alq" onkeyup="numeros ()" 
    value="<?php echo "$monto_alq";?>" class="datospf"/> </span> 
	</td>
    <td>
    <font color= NAVY> Estrato Social: </font><br/>
    <select name="estrato_social" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="ALTO"> Alto </option>
    <option value="MEDIO"> Medio </option>
    <option value="BAJO"> Bajo </option>
    </select>
    </td>
</tr>

    <tr>
    <td colspan="2" style="width: 370px; vertical-align:top;" >
    <font color= NAVY> Ingreso Familiar: </font><br/>
						
			<select name="ingreso_f" id="ingreso_f" class="datospf" style="width:175px;" >
			<option value=""> -SELECCIONE-</option>
<?php

	global $unidadTributaria, $rangosIngresoFamiliar;
	$vUT = $unidadTributaria;
	$rango = $rangosIngresoFamiliar;
	$unaOpcion  = '<option value="1:MENOS DE '. $rango[0].' UT">';
	$unaOpcion .= 'MENOS DE '. $vUT*$rango[0] .' Bs.F</option>';
//	muestrame($rango);
	
	print $unaOpcion;
	$ik = 1;
	for($k=0; $k< count($rango) - 1;$k++) {
		$ik++;
		$unaOpcion  = '<option value="'.$ik.':DE '. $rango[$k].' A '. $rango[$k+1].' UT">';
		$unaOpcion .= 'DE '. ($rango[$k]*$vUT+1).' A '. $rango[$k+1]*$vUT.' Bs.F</option>';
		print $unaOpcion;
	}
	$unaOpcion  = '<option value="'.++$ik.':MAS DE '. $rango[$k].' UT">';
	$unaOpcion .= 'MAS DE '. $vUT*$rango[$k] .' Bs.F</option>';
	print $unaOpcion;
	
	
	echo "</select><br>&nbsp;";
?>
</td>
    
</tr>

</table>
		
<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color=NAVY><B>5. DATOS DE LA VIVIENDA DONDE RESIDE</B></font></td>
</tr>
</table> 

<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td>
    <font color= NAVY> &iquest;Vives en Residencia? </font>
    <input id="alq_resi" type="radio" name="alq_resi" value="SI" onclick="toggle_alq_resi(this)" class="datospf"/>S&iacute;
    <input id="alq_resi" type="radio" name="alq_resi" value="NO" onclick="toggle_alq_resi(this)" class="datospf"/>No
    </td>

	<td>
    <font color= NAVY> Tipo de Vivienda: </font>
    <select name="tvivienda" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="CASA"> Casa </option>
    <option value="QUINTA"> Quinta </option>
    <option value="APTO"> Apartamento </option>
    <option value="RANCHO"> Rancho </option>
    <option value="ANEXO"> Anexo </option>
    </select>
    </td>

	<td>
    <font color= NAVY> Ubicaci&oacute;n: </font>
    <select name="ubicacion" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="URBPOPULAR"> Urb. Popular </option>
    <option value="BARRIO"> Barrio </option>
    <option value="RURAL"> Zona rural </option>
    <option value="URBLUJOSA"> Urb. Lujosa </option>
    </select>
    </td>
                        
    <td>
    <div id="div_residencia" style="display:none"> <label for="monto"><font color= NAVY> Alquiler Residencia (Bs): </font></label>
    <input name="monto" type="text" size="6" maxlength="8" id="monto" onkeyup="numeros ()" value="<?php echo "$mon";?>" 
    class="datospf"/> </div> 
    </td>
</tr>
 
<tr>
    <td colspan="4">
    <font color= NAVY> Serv&iacute;cios: </font>&nbsp;&nbsp;
     					
    <font color= NAVY> Agua </font>
    <input type="checkbox" name="agua" value="SI" class="datospf"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            			
    <font color= NAVY> Electricidad </font>
    <input type="checkbox" name="elect" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      					
    <font color= NAVY> Tel&eacute;fono </font>
    <input type="checkbox" name="telef" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      					
    <font color= NAVY> Internet </font>
    <input type="checkbox" name="internet" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      					
    <font color= NAVY> Tv Cable </font>
    <input type="checkbox" name="tvcable" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>			
</tr>
</table>
        
        
<table width="1000px" border="0" class="titulo" class="datospf" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>6. DATOS ECON&Oacute;MICO&nbsp;-&nbsp;LABORALES</B></font></td>
</tr>
</table> 

	<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="2" width="25%">
    <font color= NAVY> &iquest;De qui&eacute;n dependes econ&oacute;micamente? </font>&nbsp;&nbsp;&nbsp;
    <input name="depend" id="depend" type="text" size="23" maxlength="30" onkeyup="letras ()" class="datospf"
    value="<?php echo "$depe"; ?>"/>
    </td>
        
    <td colspan="3" width="">
    <font color= NAVY> &iquest;Cu&aacute;nto dinero rec&iacute;bes mensualmente de tu sosten econ&oacute;mico? (Bs): </font>
    <input name="mesada" id="mesada" type="text" size="6" maxlength="8" onkeyup="numeros ()" class="datospf"
    value="<?php echo "$mesad"; ?>" />
    </td>
</tr>
 
<tr>
    <td width="25%">
    <font color= NAVY> &iquest;Trabajas? </font>
    <input id="trabajo" type="radio" name="trabajo" value="1" onclick="toggle_trabajo(this)" class="datospf"/>S&iacute;
    <input id="trabajo" type="radio" name="trabajo" value="2" onclick="toggle_trabajo(this)" class="datospf"/>No
               
    <div id="div_turno" style="display:none"> <label for="turno_trabajo"><font color= NAVY> Turno: </font></label>
    <select name="turno_trabajo" size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="DIURNO"> Diurno</option>
    <option value="NOCTURNO"> Nocturno</option>
    <option value="MIXTO"> Mixto</option>
    </select> </div>        
    </td>
    	
    <td width="20%">
    <div id="div_ingreso" style="display:none"> <label for="ingmensual"><font color= NAVY> Ingreso Mensual (Bs): </font></label>
    <input name="ingmensual" type="text" size="5" maxlength="8" id="ingmensual" onkeyup="numeros ()" 
    value="<?php echo "$ingmens";?>" class="datospf"/> </div> 
    </td>
     	
    <td width="25%">
    <font color= NAVY> &iquest;Recibes alguna beca? </font>
    <input id="beca" type="radio" name="beca" value="SI" onclick="toggle_beca(this)" class="datospf"/>S&iacute;
    <input id="beca" type="radio" name="beca" value="NO" onclick="toggle_beca(this)" class="datospf"/>No
    </td>
     
    <td width="17%">
	<div id="div_beca" style="display:none"> <label for="org"> <font color= NAVY> Organ&iacute;smo: </font><br/></label>
    <input name="organismo" type="text" size="20" maxlength="35" id="org" onkeyup="letras ()" class="datospf"
    value="<?php echo "$organism"; ?>"/> </div>
    </td>
        
    <td>
    <span id="div_b" style="display:none"> <label for="mont"> <font color= NAVY> Monto (Bs): </font><br/></label>
    <input name="mont" type="text" size="5" maxlength="8" id="mont" onkeyup="numeros ()" class="datospf"
    value="<?php echo "$mont"; ?>"/></span>
    </td>
</tr>
</table>

		
<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>7. DATOS SALUD </B></font></td>
</tr>
</table> 

<table width="1000px" border="0"  cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="34">
    <font color= NAVY> Se&ntilde;ala si padeces o has padec&iacute;do de alguna(s) de las siguientes enfermedades: </font>
   </td>
</tr>
  
<tr>
    <td colspan="34">
    <font color= NAVY> C&aacute;ncer </font>
    <input type="checkbox" name="cancer" value="SI" />&nbsp;&nbsp;&nbsp; 
      					
    <font color= NAVY> Respiratoria </font>
    <input type="checkbox" name="respi" value="SI" /> &nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Cerebrovascular </font>
    <input type="checkbox" name="cereb" value="SI" />&nbsp;&nbsp;
            
    <font color= NAVY> SIDA </font>
    <input type="checkbox" name="sida" value="SI" /> &nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Diabetes </font>
    <input type="checkbox" name="diab" value="SI" /> &nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Card&iacute;aca </font>
    <input type="checkbox" name="cardia" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Alergia </font>
    <input type="checkbox" name="alerg" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Renal </font>
    <input type="checkbox" name="renal" value="SI" />&nbsp;&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Hepat&iacute;tis </font>
    <input type="checkbox" name="hepat" value="SI" />&nbsp;&nbsp;&nbsp;
            
    <font color= NAVY> Transm. Sexual </font>
    <input type="checkbox" name="trsex" value="SI" /> &nbsp;&nbsp;
    </td>
</tr>
  
<tr>
    <td colspan="2">
		<font color= NAVY> Otra </font>
		<input id="otra" type="radio" name="otra" value="SI" onclick="toggle_otra(this)" />S&iacute;
		<input id="otra" type="radio" name="otra" value="NO" onclick="toggle_otra(this)" />No 
		&nbsp;&nbsp;
		<span id="div_otra" style="display:none"> <label for="cu"> <font color= NAVY> Cual? </font></label>
		<input name="cua" type="text" size="20" maxlength="30" id="cua" value="<?php echo "$cua"; ?>" onkeyup="letras ()" 
		class="datospf"/> </span>
    </td>
</tr>
  
<tr>
    <td colspan="34">
    <font color= NAVY> Algun Familiar Padece o ha Padecido de Alguna de las Enfermedades Mencionadas Anteriormente? </font>
    <input id="padc_familia" type="radio" name="padc_familia" value="SI"  onclick="toggle_padec_familia(this)" />S&iacute;
    <input id="padc_familia" type="radio" name="padc_familia" value="NO"  onclick="toggle_padec_familia(this)" />No 
    </td>
</tr>
 		
<tr>
    <td>
    <span id="div_familiar" style="display:none"> <label for="quien"><font color= NAVY> &iquest;Qui&eacute;n? </font></label>
    <input name="quien" id="quien" type="text" size="30" maxlength="25" value="<?php echo "$quie"; ?>" onkeyup="letras ()"
    class="datospf"/> </span>		
    </td>
        
    <td colspan="2">
    <span id="div_enfermedad" style="display:none"> <label for="cual"> <font color= NAVY> &iquest;Cu&aacute;l Enfermedad? </font> </label>
    <input name="cual" type="text" size="40" maxlength="50" id="cual" value="<?php echo "$cual"; ?>" onkeyup="letras ()"
    class="datospf"/></span> 
    </td>
</tr>
        
<tr>
    <!-- <td>
    <font color= NAVY> &iquest;Padeces de Alguna Discapacidad? </font>
    <select name="disc" size="1" class="datospf"> 
    <option value=""> -SELECCIONE- </option>
    <option value="NINGUNA"> No poseo ninguna discapacidad </option>
    <option value="MENTAL"> Psiquica Mental </option>
    <option value="INTELECTUAL"> Psiquica Intelectual </option>
    <option value="VISUAL"> Sensorial Visual </option>
    <option value="AUDITIVA">Sensorial Auditiva </option>
    <option value="FISICA"> F&iacute;sica </option>
    <option value="MIXTA"> Mixta o Plurideficiente </option>
    </select>
    </td> -->
            
    <td colspan="11">
    <font color= NAVY> &iquest;Requieres de Alguna intervenci&oacute;n Quir&uacute;rgica? </font>
   	<input id="int_quir" type="radio" name="int_quir" value="SI" onclick="toggle_intervencion(this)"  />S&iacute;
    <input id="int_quir" type="radio" name="int_quir" value="NO" onclick="toggle_intervencion(this)" />No 
            
    <span id="div_intervencion" style="display:none"> <label for="cual_intervencion"> 
    <font color= NAVY> &iquest;Cual? </font></label> &nbsp;&nbsp;
    <input name="intervencion" type="text" size="30" maxlength="30" id="intervencion" value="<?php echo "$intervencion"; ?>" 
    onkeyup="letras ()" class="datospf"/></span>
    </td>
     
    <td></td><td></td><td></td><td></td>
       
    <td colspan="15"><font color= NAVY> &iquest;Requieres Consultas M&eacute;dicas Periodicamente? </font>
    <input id="consult" type="radio" name="consult" value="SI" onclick="toggle_consult(this)" />S&iacute;
    <input id="consult" type="radio" name="consult" value="NO" onclick="toggle_consult(this)" />No 
    </td>
    <td></td><td></td><td></td>
</tr>
  
<tr>
    <td>
    <span id="div_consult" style="display:none"> <label for="especialista"> <font color= NAVY> &iquest;Con que tipo de especialista? 
    </font></label>
    <input name="especialista" type="text" size="30" maxlength="30" id="especialista" value="<?php echo "$specialista"; ?>" 
    onkeyup="letras ()" class="datospf"/> </div> 
    </td>
    
    <td></td>
</tr>
</table>

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>8. SERVICIOS </B></font></td>
</tr>
</table> 

<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="4">
    <font color= NAVY> &iquest;Cuales de los Siguientes Serv&iacute;cios Requieres este Semestre? </font>  
    </td>
</tr> 
		
<tr>
    <td width="20%">
    <font color= NAVY> Preparadur&iacute;a:</font>
    </td>
   
    <td>
    <font color= NAVY> Como preparador </font>
    <input type="checkbox" name="prepa" value="SI" />
    </td>
      
    <td width="20%">
    <font color= NAVY> Como alumno </font>
    <input type="checkbox" name="alumn" value="SI" /> 
    </td>
      
    <td></td>
</tr>  		
        
<tr>
    <td>
    <font color= NAVY> Ayuda Econ&oacute;mica: </font>
    </td>
      
    <td>
 	<font color= NAVY> Lentes correctivos </font>
    <input type="checkbox" name="lentes" value="SI" />  
    </td>
      
    <td>
    <font color= NAVY> Odontolog&iacute;a </font>&nbsp;
    <input type="checkbox" name="odont" value="SI" />
    </td>
      
    <td>
    <font color= NAVY> Problemas de salud </font>
    <input type="checkbox" name="prob_sal" value="SI" />
    </td>
</tr>
        
<tr>
    <td>
    <font color= NAVY> Consultas M&eacute;dicas:</font> 
    </td>
    
    <td>
    <font color= NAVY> Medic&iacute;na general </font>&nbsp;
    <input type="checkbox" name="med_gen" value="SI" />
    </td>
      
    <td>
    <font color= NAVY> Ginecolog&iacute;a </font>&nbsp;&nbsp;
    <input type="checkbox" name="ginec" value="SI" />
    </td>
      		
    <td>
    <font color= NAVY> Odontolog&iacute;a </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="odonto" value="SI" />
    </td>
</tr>
    
<tr>  	
	<td width="20%">
    <font color= NAVY> Comedor </font>
    <select name="comedor" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="ALMUERZO"> Almuerzo </option>
    <option value="CENA"> Cena </option>
    <option value="ALM-CEN"> Almuerzo y cena </option>
    <option value="NO"> No </option>
    </select>
    </td>

	<td width="20%">
    <font color= NAVY> Transporte </font> 
    <input id="transp" type="radio" name="transp" value="SI" onclick="toggle_transp(this)" class="datospf" />S&iacute;
    <input id="transp" type="radio" name="transp" value="NO" onclick="toggle_transp(this)" />No
    </td>
      	
    <td colspan="2">
    <div id="div_transp" style="display:none"> <label for="ruta"><font color= NAVY> Cual ruta? (ej: San Felix, Los Olivos) </font>
    </label>
    <input name="ruta" type="text" size="20" maxlength="20" id="ruta" class="datospf" value="<?php echo "$rut"; ?>"
    onkeyup="letras ()" /> </div>
    </td>
</tr>
</table>


<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>9. ACTIVIDADES </B></font></td>
</tr>
</table> 


<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="6">
    <font color= NAVY> &iquest;En Cual de las Siguientes Actividades te Gustar&iacute;a Participar? </font> 
    </td>
</tr> 

<tr>
    <td width="8%">
    <font color= NAVY> Grupo de teatro </font>
    <input type="checkbox" name="teatro" value="SI" />
    </td> 
     
    <td width="4%"> 
    <font color= NAVY> Excursionismo </font>
    <input type="checkbox" name="excur" value="SI" />
    </td>
      
    <td width="6%">
    <font color= NAVY> Danza </font>
    <input type="checkbox" name="danza" value="SI" />
  	</td>
      
    <td width="11%">
    <font color= NAVY> Centro de estudiantes </font>
    <input type="checkbox" name="centroe" value="SI" />
    </td>
      
    <td width="6%">
    <font color= NAVY> M&uacute;sica </font>
    <input type="checkbox" name="musica" value="SI" />
   	</td>
      
    <td width="8%">
    <font color= NAVY> Deporte </font>
    <select name="dep" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="ATLETISMO"> Atlet&iacute;smo </option>
    <option value="AJEDREZ"> Ajedr&eacute;z </option>
    <option value="BASKET"> Backet </option>
    <option value="BEISBOL"> B&eacute;isbol </option>
    <option value="DOMINO"> Domin&oacute; </option>
    <option value="FUTBOL"> F&uacute;tbol </option>
    <option value="FUT_SALA"> F&uacute;tbol sala </option>
    <option value="KARATE"> Karate </option>
    <option value="RUGBY"> Rugby </option>
    <option value="TAEKWONDO"> Tae kwon do </option>
    <option value="TNIS_MESA"> Tenis de mesa </option>
    <option value="VOLEIBOL"> Voleibol </option>
    </select>
    </td>
</tr>

<tr>
    <td colspan="6">
    <font color= NAVY> &iquest;Has Participado en Alguna de las Actividades Mencionadas Anteriormente o Alguna Otra? </font>				    &nbsp;&nbsp;&nbsp; 
    <input id="particip" type="radio" name="particip" value="SI"  onclick="toggle_particip(this)" />S&iacute;
    <input id="particip" type="radio" name="particip" value="NO"  onclick="toggle_particip(this)" />No
    </td>
</tr> 
		
<tr>
    <td colspan="2" width="20">
    <span id="div_act" style="display:none"> <label for="acti"><font color= NAVY> &iquest;Cual? </font></label>
    <input name="act" type="text" size="30" maxlength="20" id="act" value="<?php echo "$acti"; ?>" onkeyup="letras ()" 
    class="datospf"/> </span>
    </td>
    
    <td colspan="2">
    <span id="div_ac" style="display:none"><label for="fini"><font color= NAVY> Fecha Inicio (dd/mm/aaaa): </font> </label>
    <input name="fini" type="text" size="8" maxlength="10" id="fini" value="<?php echo "$finic"; ?>" onkeyup="numeros ()" 
    class="datospf"/></span>
    </td>
     
    <td colspan="2" >
    <span id="div_a" style="display:none"> <label for="ffin"> <font color= NAVY> Fecha Final (dd/mm/aaaa): </font></label>
    <input name="ffin" type="text" size="8" maxlength="10" id="ffin" value="<?php echo "$ffinal"; ?>"onkeyup="numeros ()" 
    class="datospf"/> </span>
    </td>
</tr>
</table>


<!--////////////////////////////INFORMACION BANCARIA///////////////////////////////////////-->


<?php if ($fila_ayu_est > 0){ ?>
<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>10. INFORMACION BANCARIA </B></font></td>
</tr>
</table> 


<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">


<tr>
    <td colspan="2">
    <font color= NAVY> Banco: Banco de Venezuela </font> 
    </td>
 
	<?php
	/*switch ($tipo_cta){
		case "0":
			$cta = "Corriente";
			break;
		case "1":
			$cta = "Ahorro";
			break;
	}*/
	
	?>   
    <td colspan="2">
	<input type="hidden" name="tipocta" value="<?php echo $tipo_cta ?>"/>
    <font color= NAVY> Tipo de cuenta </font>
    <select name="tipocuenta" size="1" class="datospf">
	<?php //if ($fila_cuenta_banco == 1){ ?><!--SI HAY REGISTRO EN LA TABLA AYU_CUENTA-->
<!--    <option value="<?php// echo $tipo_cta ?>" selected="selected"> <?php //echo $cta ?> </option>MUESTRA EL TIPO DE CUENTA 						                                                                                                 CORRESPONDIENTE-->
	<?php //}else{ ?>
    
	<?php //} ?>
	<option value=""> -Seleccione- </option><!--SI NO HAY REGISTRO MUESTRA -Selecione -->
    <option value="1"> Ahorro </option>
    <option value="0"> Corriente </option>
    </select>
    </td>


    <td colspan="2">
    <font color= NAVY>N�mero de cuenta: </font>&nbsp;&nbsp;&nbsp; 
    <input id="nrocuenta" type="text" name="nrocuenta" size="25" maxlength="20" value="<?php echo $nro_cta; ?>" onkeyup="numeros()" class="datospf" this.value/>
    </td>
</tr> 
<?php }else{ ?>
<input name="tipocuenta" type="hidden" value="">
<input name="nrocuenta" type="hidden" value="">

</table>
<?php } ?>


<!--/////////////////////////////// BENEFICIO ADQUIRIDO////////////////////////////////////////////-->

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>11. BENEFICIO ADQUIRIDO </B></font></td>
</tr>
</table> 

<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="2">
    <font color= NAVY>Lapso: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="lapsoactual" name="lapsoactual" size="5" maxlength="8" readonly="readonly" value="<?php echo $lapso; ?>" class="datospf"/>
    </td>
	
    <td colspan="2">
    <font color= NAVY>Beneficio: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="beneficioactual" name="beneficioactual" size="30" maxlength="30" readonly="readonly" value="<?php echo $nombre_ayu; ?>" class="datospf"/>
    </td>
	
	<td colspan="2">
    <font color= NAVY>Nro. de horas: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="nrohorasactual" name="nrohorasactual" size="5" maxlength="3" readonly="readonly" value="<?php echo $nro_hora; ?>" class="datospf"/>
    </td>
</tr> 


<!--SI EL BENEFICIO ADQUIRIDO ES DEL LAPSO EN PROCESO MUESTRA LO SIGUIENTE:-->

<?php //if ($lapsoProceso == $max){?>

<tr>
    <td colspan="2">
    <font color= NAVY>Dependencia: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="dependenciactu" name="dependenciactu" size="25" maxlength="25" readonly="readonly" value="<?php echo $dependencia; ?>" class="datospf"/>
    </td>
	
    <td colspan="2">
    <font color= NAVY>U.C. Cursadas actualmente: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="uc_actuales" name="uc_actuales" size="10" maxlength="10" readonly="readonly" value="<?php echo $uc_actuales; ?>" class="datospf"/>
    </td>
</tr> 	
<?php// } ?>

</table>

<?php //if ($lapsoProceso == $max){?>
<!--///////////////////////ULTIMO BENEFICIO ADQUIRIDO////////////////////////////////////////////-->

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>12. BENEFICIO ANTERIOR </B></font></td>
</tr>
</table> 


<table width="1000px" border="0" cellspacing="12" class="datospf" align="center">
<tr>
    <td colspan="2">
    <font color= NAVY>Lapso: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="lapsoanterior" name="lapsoanterior" size="5" maxlength="8" readonly="readonly" value="<?php echo $LapsoAnterior; ?>" class="datospf"/>
    </td>
	
    <td colspan="2">
    <font color= NAVY>Beneficio: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="beneficioanterior" name="beneficioanterior" size="30" maxlength="30" readonly="readonly" value="<?php echo $nombre_ayuBA; ?>" class="datospf"/>
    </td>
	
	<td colspan="2">
    <font color= NAVY>Nro. de horas: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="nrohorasanterior" name="nrohorasanterior" size="5" maxlength="3" readonly="readonly" value="<?php echo $nro_horaBA; ?>" class="datospf"/>
    </td>
</tr> 

<tr>
    <td colspan="2">
    <font color= NAVY>Dependencia: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="dependenciante" name="dependenciante" size="25" maxlength="25" readonly="readonly" value="<?php echo $dependenciaAnte; ?>" class="datospf"/>
    </td>
	
    <td colspan="2">
    <font color= NAVY>U.C. Cursadas en el lapso <?php echo $LapsoAnterior ?>: </font>&nbsp;&nbsp;&nbsp; 
    <input type="text" id="uc_anterior" name="uc_anterior" size="10" maxlength="10" readonly="readonly" value="<?php echo $uc_anterior; ?>" class="datospf"/>
    </td>
</tr> 	
		
</table>
<?php//} // FIN if ($lapsoProceso == $max)?>



<?php
		if ($filas==1) 
		{
		?>
        
        <table width="1000px" border="0" cellspacing="5" align="center">
  <tr>
    <td width="">
		
        <input type="button" name="ATRAS" value="ATRAS" onClick="goback()">
        </td>
    
    <td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" name="guardar" value="GUARDAR Y SALIR" onclick="valida_envia('2')" > 
    </td>
    
    <td width="15">        
      <input type="button" name="actualizar" value="CONTINUAR"  onclick="valida_envia('1')"/>  
        </td>
  
  </tr>
</table>

       <input type="hidden" name="ac" value="">
		
		
		<?php 
		}
			
		?>
        
	</form>
</body>
</html>