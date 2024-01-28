<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script LANGUAGE="Javascript" src="funciones1.js"> </script>

<!-- PARA GENERAR LAS CIUDADES Y MUNICIPIOS DEL PLANTEL-->
<script LANGUAGE="Javascript" src="asincronos.js"> </script>

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
<title>DATOS PERSONALES Y ACADEMICOS</title>
</head>
		<?php
		////////////////////////////////////////////////////////////
		//rutina para buscar la cedula en la base de datos DACE002//	
		////////////////////////////////////////////////////////////
		include_once('inc/config.php');
		require_once("inc/odbcss_c.php");
		
		//$ci_e="15909312";
		$ci_e=$_POST['cedula'];
		$conex = new ODBC_Conn($DSN,$user,$pass,TRUE,$laBitacora);
		$mSQL  = "select * from DACE002 where ci_e='$ci_e' ";
		$conex->ExecSQL($mSQL,__LINE__,true);
		$resulta = $conex->result;
		$filas=$conex->filas;
		/*echo "filas=";
		echo $filas;*/
		//print_r ($resulta);
			
		/////////////////////////////////////////////
		//rutina para extraer los datos de DACE002//	
		///////////////////////////////////////////	
		$ci_e=$conex->result[0][0];
		$nombres=$conex->result[0][1];
		$apellidos=$conex->result[0][2];
		$exp_e=$conex->result[0][5];
		$lapso_in=$conex->result[0][6];
		$sexo=$conex->result[0][7];
		////direccion principal del estudiante/////
		$dirp_e=explode(".",$conex->result[0][8]);
		$ciudad=$dirp_e[0];
		$estado=$dirp_e[1];
		$avenida=$dirp_e[2];
		$urbanizacion=$dirp_e[3];
		$manzana=$dirp_e[4];
		$edificio=$dirp_e[5];
		$nrocasa=$dirp_e[6];
		//////////////////////////////////////////
		$telfp_e=$conex->result[0][9];
		//////////////////////////////////////////
		//rutina para obtener primer caracter de direccion residencia utilizando funcion substr/////
		$dirr_e = explode(".",$conex->result[0][10]);
		//echo $dirr_e[0];
		$ciudad_r=substr($dirr_e[0],0,1);
		// el siguiente bloque de asignacion de valores, debe hacerse solamente si el //////////////
		// estudiante ya cargo por primera vez la dir de residencia (primer caracter valido)////////
		$dirr_e= explode(".",$conex->result[0][10]);
		if ($ciudad_r == '*')
		{
		$ciudad_r=substr($dirr_e[0],1);
		$estado_r=$dirr_e[1];
		$avenida_r=$dirr_e[2];
		$urbanizacion_r=$dirr_e[3];
		$manzana_r=$dirr_e[4];
		$edificio_r=$dirr_e[5];
		$nrocasa_r=$dirr_e[6];
		}
		///////////////////////////////////////////////////////////////////////
		$telfr_e=$conex->result[0][11];
		$f_nac_e = explode("-",$conex->result[0][12]);//FECHA DE NACIMIENTO
		$an = $f_nac_e[0];
		$me = $f_nac_e[1];
		$di = $f_nac_e[2];
		$edo_c_e=$conex->result[0][13];
		$p_nac_e=$conex->result[0][14];//PAIS DE NACIMIENTO
		$l_nac_e=$conex->result[0][15];//CIUDAD DE NACIMIENTO
		$nac_e=$conex->result[0][16];
		$estatus_e=$conex->result[0][70];
		$fec_ins = explode("-",$conex->result[0][71]);
		$ano_i = $fec_ins[0];
		$mes_i = $fec_ins[1];
		$dia_i = $fec_ins[2];
		$semestre=$conex->result[0][73];
		$ind_acad_t=$conex->result[0][81];
		$c_aprob_equiv_t=$conex->result[0][83];
		$u_cred_aprob_t=$conex->result[0][85];
		$u_cred_insc_t=$conex->result[0][87];
		$u_c_p_indic_t=$conex->result[0][89];
		$u_cred_pen_t=$conex->result[0][91];
		$res_extraj=$conex->result[0][94];
		$etnia_indigena=$conex->result[0][95];
		$edo_nac_e=$conex->result[0][100];
		$tesista=$conex->result[0][106];
		$doc_ident=$conex->result[0][107];
		$pasaporte_nro=$conex->result[0][108];
		$ind_cnu=$conex->result[0][109];
		$nombres2=$conex->result[0][113];
		$apellidos2=$conex->result[0][114];
		$urbanizacion=$conex->result[0][115];
		$avenida=$conex->result[0][116];
		$manzana=$conex->result[0][117];
		$nrocasa=$conex->result[0][118];	
		$telefono2 = explode("-",$conex->result[0][120]);
		$edo_nacimiento = $conex->result[0][24];//ENT_FED, ESTADO DE NACIMIENTO
		//$c_ingreso = $conex->result[0][29];
		$opcion_cnu = $conex->result[0][96];
		$sit_e = $conex->result[0][26]; 
		
		if (count($telefono2) < 2)
		{
			$celcod="";
			$telf2 ="";	
		}
			else{
				$celcod=substr($telefono2[0],1);	
				$telf2 = $telefono2[1];
				//print_r($telefono2);
				}			
		$telefono3=$conex->result[0][121];
		$correo1=$conex->result[0][122];
		$correo2=$conex->result[0][123];
		$correo_inst=$conex->result[0][126];//CORREO INSTITUCIONAL
		$clave_correo=$conex->result[0][128];//CLAVE DEL CORREO INSTITUCIONAL
		$ciudad=$conex->result[0][124];
		$estado=$conex->result[0][125];
		
	
		//////////////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del estudiante de la base de datos DAT_SOCIOECONOMIC1//
		////////////////////////////////////////////////////////////////////////////////////
		if ($filas==1)
		{
			$sqlse = "select residencia from DAT_SOCIOECONOMIC1 where exp_e='$exp_e' ";
			$conex->ExecSQL($sqlse,__LINE__,true);
			$resulto = $conex->result;
			$fila = $conex->filas;
			//echo "fila=";
			//echo $fila;
			//print_r ($resulto);
			//echo "exp_e=";
			//echo $exp_e;
			$residencia=$conex->result[0][0];
			
			
			///////////////////////////////////////////////////////////////////////////////
			//rutina para extraer la info del estudiante de la base de datos TABLACA010///
			/////////////////////////////////////////////////////////////////////////////
			$sqlCA = "select carrera from DACE002 a, TBLACA010 b where a.c_uni_ca=b.c_uni_ca and exp_e='$exp_e'";
			$conex->ExecSQL($sqlCA,__LINE__,true);
			//$resul = $conex->result;
			//$fila_TCA = $conex->filas;
			//echo "fila_TCA=";
			//echo $fila_TCA;
			//print_r ($resul);
			//echo "exp_e=";
			//echo $exp_e;
			//echo "carrera ".$carrera;
			$carrera=$conex->result[0][0];
			
			/////////////////////////////////////////////////////////////////////////////////
			//rutina para extraer la info del estudiante de la base de datos TIPO_INGRESO///
			///////////////////////////////////////////////////////////////////////////////
			$sqlf = "select ingreso from DACE002 a, TIPO_INGRESO b where a.c_ingreso=b.c_ingreso and exp_e='$exp_e'";
			$conex->ExecSQL($sqlf,__LINE__,true);
			$resultado = $conex->result;
			$fila_TI = $conex->filas;
			//echo "fila_TI=";
			//echo $fila_TI;
			//print_r ($resultado);
			//echo "exp_e=";
			//echo $exp_e;
			//echo $conex->result[0][0];
			$ingreso=$conex->result[0][0];
			
			///////////////////////////////////////////////////////////////////////////////////
			//rutina para extraer la info del estudiante de la base de datos PENSUM_ESTUDIO//
			///////////////////////////////////////////////////////////////////////////////////
			$sqlPEN = "select a.pensum,descripcion from PENSUM_ESTUDIO a, DACE002 b where a.pensum=b.pensum and exp_e='$exp_e'";
			$conex->ExecSQL($sqlPEN,__LINE__,true);
			$r = $conex->result;
			$fila_pen = $conex->filas;
			///echo "fila_pen=";
			//echo $fila_pen;
			//print_r ($r);
			//echo "exp_e=";
			//echo $exp_e;
			$descripcion_p=$conex->result[0][1];
			//echo "descripcion ".$descripcion;

			///////////////////////////////////////////////////////////////////////////////////
			   //rutina para extraer tipos de discapacidades de la base de datos NINGRESO//
			///////////////////////////////////////////////////////////////////////////////////
			$Cdatos_p   = new ODBC_Conn($DSN,$user,$pass);
			$sql_disca = "SELECT NUMERO, DESCRIPCION ";
			$sql_disca.= "FROM DISCAPACIDAD ";
			$sql_disca.= "ORDER BY NUMERO ASC";
			$Cdatos_p->ExecSQL($sql_disca) or die ("No se ha podido realizar la consulta");
			$filas3 = $Cdatos_p->filas;
			$conex_disca = $Cdatos_p->result;
			//print_r($conex_disca);
			
			///////////////////////////////////////////////////////////////////////////////////
			   /////////////rutina para extraer AFRODESCENDIENTE de DACEPOZ/////////////////
			///////////////////////////////////////////////////////////////////////////////////
			$sqlDOBE = "select afrodescen,tipo_disca,carnet_disca ";
			$sqlDOBE.= "from DOBE_SOCIOECONOMIC where exp_e='$exp_e'";
			$conex->ExecSQL($sqlDOBE,__LINE__,true);
			$afrodescen = $conex->result[0][0];
			$tipo_disca = $conex->result[0][1];
			$carnet_disca = $conex->result[0][2];

			///////////////////////////////////////////////////////////////////////////////////
			/////////////rutina para extraer LISTA DE ETNIAS INDIGENAS de DACEPOZ//////////////
			///////////////////////////////////////////////////////////////////////////////////
			$sqlINDIGENA = "select CODIGO,ETNIA ";
			$sqlINDIGENA.= "from ETNIA_INDIGENA";
			$conex->ExecSQL($sqlINDIGENA,__LINE__,true);
			$filas_etn = $conex->filas;
			$conex_etnia = $conex->result;
			//print_r($conex_etnia);
			
			///////////////////////////////////////////////////////////////////////////////////
			//////////////////datos del plantel DOBE_ACADEMICO de DACEPOZ//////////////////////
			///////////////////////////////////////////////////////////////////////////////////
			$sqlACADEMICO = "select PLANTEL, TIPO_PLANTEL, SISTEMA_ESTUDIO, TURNO_ESTUDIO, TITULO_B, ";
			$sqlACADEMICO.= "PROMEDIO, COSTO_MENSUAL, CODIGO_P, CODIGO_E, CODIGO_C, CODIGO_M, ANO_EGRE_COLE ";
			$sqlACADEMICO.= "from DOBE_ACADEMICO where exp_e='$exp_e'";
			$conex->ExecSQL($sqlACADEMICO,__LINE__,true);
			$filas_ACADEMICO = $conex->filas;
			$plantel = $conex->result[0][0];
			$tipo_plantel = $conex->result[0][1];
			$sistema_estudio = $conex->result[0][2];
			$turno_estudio = $conex->result[0][3];
			$titulo_b = $conex->result[0][4];
			$promedio = $conex->result[0][5];
			$costo_mensual = $conex->result[0][6];
			$codigo_p = $conex->result[0][7];
			$codigo_e = $conex->result[0][8];
			$codigo_c = $conex->result[0][9];
			$codigo_m = $conex->result[0][10];
			$anio_egreso = $conex->result[0][11];

			//PARA OTRO SISTEMA DE ESTUDIO
			$valor_estudio = strpos($sistema_estudio,"OTRO:");
			if ($valor_estudio === 0){//SI ES OTRO SISTEMA DE ESTUDIO(OTRO:XXXXXX)
				//echo "holass";
				$otro_siste_estu = substr($sistema_estudio,5);//EL SISTEMA DE ESTUDIO SIN "OTRO:"
				$sistema_estudio = "OTRO";
			}

			//PARA OTRO TURNO
			$valor_turno = strpos($turno_estudio,"OTRO:");
			if ($valor_turno === 0){
				$otro_turno_estudio = substr($turno_estudio,5);//EL TURNO DE ESTUDIO SIN "OTRO:"
				$turno_estudio = "OTRO";
			}
			?>

 	<body onload="javascript:mostrar(); calcularEdad(); conf_inicial_NAC();">
    
    <table border="0" width="1000px" background="imagenes/header_espi.GIF" align="center">
		<tr><td>
		<img src="imagenes/dibujo2.GIF" width="1000px" height="136" border="0" alt="" title="">
		</td></tr>
	</table>
    
<div style="font-weight:bold;text-alig:center;color:navy;" width="1000px" align="center">
INFORMACION PERSONAL Y ACADEMICA
</div>
		
	<form action="datos_socioeconomicos.php" method="post" name="valido">
    
	<input type="hidden" name="expediente" value="<?php echo $exp_e; ?>" />
	<input type="hidden" name="filas"      value="<?php echo $filas; ?>" />    
    <input type="hidden" name="nac"        value="<?php echo $nac_e; ?>" />
    <input type="hidden" name="cedula"        value="<?php echo $ci_e; ?>" />
	<input type="hidden" name="nomb"      value="<?php echo $nombres; ?>" />
	<input type="hidden" name="apellid"   value="<?php echo $apellidos; ?>" />
    <input type="hidden" name="extranjero" value="<?php echo $res_extraj; ?>" />
    <input type="hidden" name="documnto"   value="<?php echo $doc_ident; ?>" />
    <input type="hidden" name="cxo"        value="<?php echo $sexo; ?>" />
    <input type="hidden" name="a"          value="<?php echo $an; ?>" /><!--A�O DE NACIMIENTO-->
	<input type="hidden" name="m"          value="<?php echo $me; ?>" /><!--MES DE NACIMIENTO-->
    <input type="hidden" name="d"          value="<?php echo $di; ?>" /><!--DIA DE NACIMIENTO-->
   	<input type="hidden" name="edociv"     value="<?php echo $edo_c_e; ?>" />
    <input type="hidden" name="tel"        value="<?php echo $telefono2; ?>" />
    <input type="hidden" name="cod"        value="<?php echo $celcod; ?>" />
    <input type="hidden" name="resi"   	   value="<?php echo $residencia; ?>" />
    <input type="hidden" name="an"         value="<?php echo $ano_i; ?>" />
	<input type="hidden" name="ms"         value="<?php echo $mes_i; ?>" />
    <input type="hidden" name="di"         value="<?php echo $dia_i; ?>" />
    <input type="hidden" name="estatus"    value="<?php echo $estatus_e; ?>" />
    <input type="hidden" name="tesis"      value="<?php echo $tesista; ?>" />
	<input type="hidden" name="etnia" id="etnia" value="<?php echo $etnia_indigena; ?>" />
	<input type="hidden" name="pais_hidden" id="pais_hidden" value="<?php echo $p_nac_e; ?>" />
	<input type="hidden" name="edo_nacimiento" id="edo_nacimiento" value="<?php echo $edo_nacimiento; ?>" />
	<input type="hidden" name="lugar_nac" id="lugar_nac" value="<?php echo $l_nac_e; ?>" />
	<input type="hidden" name="otroEstado" id="otroEstado" value="<?php echo $otroPaisestado; ?>" />
	<input type="hidden" name="otroCiudad" id="otroCiudad" value="<?php echo $otroPaisciudad; ?>" />
	<input type="hidden" name="afro" id="afro" value="<?php echo $afrodescen; ?>" />
	<input type="hidden" name="discapacidad" id="discapacidad" value="<?php echo $tipo_disca; ?>" />
	<input type="hidden" name="carnet" id="carnet" value="<?php echo $carnet_disca; ?>" />
	<input type="hidden" name="plantel" id="plantel" value="<?php echo $plantel; ?>" />
	<input type="hidden" name="tipo_plantel" id="tipo_plantel" value="<?php echo $tipo_plantel; ?>" />
	<input type="hidden" name="sistema_estudio" id="sistema_estudio" value="<?php echo $sistema_estudio; ?>" />
	<input type="hidden" name="otro_siste_estu" id="otro_siste_estu" value="<?php echo $otro_siste_estu; ?>" />
	<input type="hidden" name="turno_estudio" id="turno_estudio" value="<?php echo $turno_estudio; ?>" />
	<input type="hidden" name="otro_turno_estudio" id="otro_turno_estudio" value="<?php echo $otro_turno_estudio; ?>" />
	<!-- <input type="hidden" name="turno_estudio" id="turno_estudio" value="<?php echo $turno_estudio; ?>" /> -->

	<input type="hidden" name="titulo_b" id="titulo_b" value="<?php echo $titulo_b; ?>" />
	<input type="hidden" name="promedio_b" id="promedio_b" value="<?php echo $promedio; ?>" />
	<input type="hidden" name="costo_mensual" id="costo_mensual" value="<?php echo $costo_mensual; ?>" />
	<input type="hidden" name="c_ingreso" id="c_ingreso" value="<?php echo $c_ingreso; ?>" />
	<input type="hidden" name="opcion_cnu" id="opcion_cnu" value="<?php echo $opcion_cnu; ?>" />
	<input type="hidden" name="sit_e" id="sit_e" value="<?php echo $sit_e; ?>" />
	<!-- <input type="hidden" name="ind_cnu" id="ind_cnu" value="<?php echo $ind_cnu; ?>" /> -->

	<input type="hidden" name="filas_ACADEMICO" id="filas_ACADEMICO" value="<?php echo $filas_ACADEMICO; ?>" />
	<input type="hidden" name="codpaisplantel" id="codpaisplantel" value="<?php echo $codigo_p; ?>" />
	<input type="hidden" name="codedoplantel" id="codedoplantel" value="<?php echo $codigo_e; ?>" />
	<input type="hidden" name="codcdplantel" id="codcdplantel" value="<?php echo $codigo_c; ?>" />
	<input type="hidden" name="codmpioplantel" id="codmpioplantel" value="<?php echo $codigo_m; ?>" />
	<input type="hidden" name="anio_egreso" id="anio_egreso" value="<?php echo $anio_egreso; ?>" />

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>1. IDENTIFICACION DEL ESTUDIANTE</B></font></td>
</tr>
</table>

<table width="1000px" border="0" class="datospf" cellspacing="12" align="center">
<tr>
    <td> 
    <label for="nac_e"></label>
    <font color= NAVY> C&eacute;dula: </font> <br/>
    <select name="nac_e" id="nac_e" size="1" disabled="disabled" readonly="readonly" onchange="toggle_nac_e(this)" class="datospf">
    <option value=" "> -S- </option>
    <option value="V"> V </option>
    <option value="E"> E </option>
    </select> 
       
    <input name="ci_e" type="text" size="10" maxlength="10" disabled="disabled" readonly="readonly" value="<?php echo "$ci_e"; ?>" class="datospf"/> 
    </td>
    
    <td> 
    <font color= NAVY> Expediente: </font><br/>
    <input name="exp_e" type="text" size="10" maxlength="12" disabled="disabled" readonly="readonly" 
    value="<?php echo "$exp_e"; ?>" class="datospf"/>
    </td>
    
    <td>
    <span id="span_extranjero" style="display:none"> <label for="res_extraj">
    <font color= NAVY> Tipo: </font></label> <br/>
    <select name= "res_extraj" id="res_extraj" size="1" class="datospf">
    <option value=""> -SELECCIONE- </option>
    <option value="TRANSEUNTE"> TRANSEUNTE </option>
    <option value="RESIDENTE"> RESIDENTE </option> 
    </select></span>
    </td>
    
    <td>
    <span id="span_doc" style="display:none"> <label for="doc_ident"><font color= NAVY> Documento: </font></label> <br/>
    <select name="doc_ident" id="doc_ident" size="1" onchange="toggle_nro_pasaporte(this)" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="CEDULA"> C&eacute;dula </option>
    <option value="PASAPORTE"> Pasaporte </option> 
    </select></span>
    </td>
</tr>
<tr>    
    <td>
    <span id="span_nropasap" style="display:none"> <label for="pasaporte_nro">
    <font color= NAVY> Pasaporte Nº: </font></label><br/>
    <input name="pasaporte_nro" id="pasaporte_nro" type="text" size="20" maxlength="15" value="<?php echo "$pasaporte_nro"; ?>" 
    onkeyup="numeros ()" class="datospf"/></span>
    </td>
</tr>
  	
<tr>
    <td>
    <font color= NAVY> Primer Apellido: </font> <br/>
    <input name="apellidos" type="text" size="25" maxlength="25" disabled="disabled" readonly="readonly" 
    value="<?php echo "$apellidos"; ?>" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY > Segundo Apellido: </font> <br/>
    <input name="apellidos2" id="apellidos2" type="text" size="20" maxlength="25" value="<?php echo "$apellidos2"; ?>" class="datospf" disabled="disabled" readonly="readonly"/>
    </td>
    
    <td>
    <font color= NAVY> Primer Nombre: </font> <br/>
    <input name="nombres" type="text" size="20" maxlength="25" disabled="disabled" readonly="readonly"
    value="<?php echo "$nombres"; ?>" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Segundo Nombre:</font> <br/>
    <input name="nombres2" id="nombres2" type="text" size="20" maxlength="25" value="<?php echo "$nombres2"; ?>" class="datospf" disabled="disabled" readonly="readonly"/>
    </td>
    
<!--    <td>
    <font color= NAVY> Sexo: </font><br/>
    <select name="sexo" size="1" class="datospf">
    <option value=""> -S-</option>
    <option value="0"> F </option>
    <option value="1"> M </option>
    </select>
   	</td>
-->

</tr>
  
<tr>
    <td colspan="2">
    <font color= NAVY>Fecha de Nacimiento:</font> <br/>
    <select name="dia" size="1" class="datospf" id="dia" onchange="calcularEdad();" disabled="disabled" readonly="readonly" style="font-size:10px;">
    <option value="00"> -D- </option>
    <option value="01"> 01</option>
    <option value="02"> 02</option>
    <option value="03"> 03</option>
    <option value="04"> 04</option>
    <option value="05"> 05</option>
    <option value="06"> 06</option>
    <option value="07"> 07</option>
    <option value="08"> 08</option>
    <option value="09"> 09</option>
    <option value="10"> 10</option> 
    <option value="11"> 11</option>
    <option value="12"> 12</option>
	<option value="13"> 13</option>
    <option value="14"> 14</option>
    <option value="15"> 15</option>
    <option value="16"> 16</option>
    <option value="17"> 17</option>
    <option value="18"> 18</option>
    <option value="19"> 19</option>
    <option value="20"> 20</option>
    <option value="21"> 21</option>
    <option value="22"> 22</option>
    <option value="23"> 23</option>
	<option value="24"> 24</option>
    <option value="25"> 25</option>
    <option value="26"> 26</option>
    <option value="27"> 27</option> 
    <option value="28"> 28</option>
    <option value="29"> 29</option>
    <option value="30"> 30</option>
    <option value="31"> 31</option>
    </select>

    <select name="mes" class="datospf" id="mes" onchange="calcularEdad();" disabled="disabled" readonly="readonly" style="font-size:10px;">
    <option value="00"> -M- </option>
    <option value="01"> Enero</option>
    <option value="02"> Febrero</option>
    <option value="03"> Marzo</option>
    <option value="04"> Abril</option>
    <option value="05"> Mayo</option>
    <option value="06"> Junio</option>
    <option value="07"> Julio</option>
    <option value="08"> Agosto</option>
    <option value="09"> Septiembre</option>
    <option value="10"> Octubre</option> 
    <option value="11"> Noviembre</option>
    <option value="12"> Diciembre</option>
    </select>
  
     
     <select name="ano" class="datospf" id="ano" onchange="calcularEdad();" disabled="disabled" readonly="readonly" style="font-size:10px;">
     <option value=""> -A-</option>
     <option value="1970"> 1970</option>
     <option value="1971"> 1971</option>
     <option value="1972"> 1972</option>
     <option value="1973"> 1973</option>
     <option value="1974"> 1974</option>
     <option value="1975"> 1975</option>
     <option value="1976"> 1976</option>
     <option value="1977"> 1977</option>
     <option value="1978"> 1978</option>
     <option value="1979"> 1979</option> 
     <option value="1980"> 1980</option>
     <option value="1981"> 1981</option>
     <option value="1982"> 1982</option>
     <option value="1983"> 1983</option>
     <option value="1984"> 1984</option>
     <option value="1985"> 1985</option>
     <option value="1986"> 1986</option>
     <option value="1987"> 1987</option>
     <option value="1988"> 1988</option>
     <option value="1989"> 1989</option> 
     <option value="1990"> 1990</option>
     <option value="1991"> 1991</option>
     <option value="1992"> 1992</option>
     <option value="1993"> 1993</option>
     <option value="1994"> 1994</option>
     <option value="1995"> 1995</option>
     <option value="1996"> 1996</option>
     <option value="1997"> 1997</option>
     <option value="1998"> 1998</option> 
     </select> 
     </td>
	 
     <td>
    <font color= NAVY> Edad: </font><br/>
    <input name="edad" type="text" size="1" maxlength="2" value="<?php echo "$edad"; ?>" class="datospf" id="edad"
    disabled="disabled" readonly="readonly"/>	
    </td>

    <td>
    <font color= NAVY> Sexo: </font><br/>
    <select name="sexo" id="sexo" size="1" class="datospf">
    <option value=""> -S-</option>
    <option value="0"> F </option>
    <option value="1"> M </option>
    </select>
   	</td>
</tr>
<tr>
     <td>
	 
	<?php //LISTA DESPLEGABLE DE LOS PAISES
	$sql_pais = "SELECT CODIGO, PAI_NOMBRE ";
	$sql_pais.= "FROM PAISES ";
	$sql_pais.= "ORDER BY PAI_NOMBRE ASC";
	$conex->ExecSQL($sql_pais) or die ("No se ha podido realizar la consulta");
	$filas1=$conex->filas;
	$conexPais = $conex->result;
	?>	
     <font color= NAVY> Pa&iacute;s de Nacimiento:</font>
	<!--<select name="pais_nac_e" id="pais_nac_e" onChange="paisnacimiento();">-->
	<select name="pais_nac_e" id="pais_nac_e" class="datospf" onChange="paisnacimiento(this.value);">
	<option selected="selected" value=0> -SELECCIONE- </option>
	<?php
		for ($p=0; $p<$filas1; $p++){
			$CODIGO = $conexPais[$p][0];
			$PAI_NOMBRE = $conexPais[$p][1];
	?>
		<option value="<?php echo $CODIGO;?>"><?php echo $PAI_NOMBRE;?></option>
	<?php
		}
	?>
	</select>
	 
<!-- <?php /*?>     <input name="p_nac_e" id="p_nac_e" type="text" size="20" maxlength="30" value="<?php echo "$p_nac_e"; ?>" class="datospf" 
     disabled="disabled" readonly="readonly"/>
<?php */?> -->     

	</td>
   
	<?php //LISTA DESPLEGABLE DE LOS ESTADOS DE VENEZUELA
	$sql_estado = "SELECT CODIGO, EDO_NOMBRE ";
	$sql_estado.= "FROM ESTADOS ";
	$sql_estado.= "ORDER BY EDO_NOMBRE ASC";
	$conex->ExecSQL($sql_estado) or die ("No se ha podido realizar la consulta");
	$filas2 = $conex->filas;
	$conex_estado = $conex->result;
	?>
	
    <td>
	<!--<span id="span_edo_nacimiento" style="display:none"> <label for="edo_nac_e">-->
	<span id="span_edo_nacimiento">
  	<font color= NAVY> Estado de Nacimiento:</font></label><br/>
	<select name="edo_nac_e" id="edo_nac_e" class="datospf" onChange="ciudades(this.value,pais_nac_e.value);">
			<option selected="selected" value=0> -SELECCIONE- </option>
	<?php
			for ($e = 0; $e < $filas2; $e++){
			$CODIGO = $conex_estado[$e][0];
			$EDO_NOMBRE = $conex_estado[$e][1];
	?>
			<option value="<?php echo $CODIGO;?>"><?php echo $EDO_NOMBRE;?></option>
	<?php
		}
	?>
	</select>
	</span>	
    </td>
	
	<td> 
	<!--<span id="span_ciudad_nacimiento" style="display:none"> <label for="ciudad_nac_e">-->
	<span id="span_ciudad_nacimiento"> <label for="ciudad_nac_e">
    <font id="ciudad_nac_e" color= NAVY> Ciudad de Nacimiento: </font><br/>
    <div id="capa">
	<select name="ciudadN" id="ciudadN" class="datospf">
		<option value="">-SELECCIONE-</option>
	</div>
	</span>
    </td>
	
    <!-- <td>
  	<font color= NAVY> Estado de Nacimiento:</font> <br />
    <input name="edo_nac_e" id="edo_nac_e" type="text" size="20" maxlength="30" value="<?php echo "$edo_nac_e"; ?>" class="datospf"
    disabled="disabled" readonly="readonly"/>
    </td> -->
 
   <!-- <td>
    <font color= NAVY> Ciudad de Nacimiento: </font> <br/>
    <input name="l_nac_e" id="l_nac_e" type="text" size="20" maxlength="30" value="<?php echo "$l_nac_e"; ?>"  
    class="datospf" disabled="disabled" readonly="readonly"/>
    </td> -->

   <!-- <td>
    <font color= NAVY> Edad: </font><br/>
    <input name="edad" type="text" size="1" maxlength="2" value="<?php echo "$edad"; ?>" class="datospf" id="edad"
    disabled="disabled" readonly="readonly"/>	
    </td> -->
</tr>

<tr>
	<td>
	<!--ESTADO DE NACIMIENTO DE OTRO PAIS-->
	<span id="span_otroPaisestado" style="display:none"> 
    <font color= NAVY> Estado o Provincia de Nacimiento: </font></label><br/>
    <input name="otroPaisestado" id="otroPaisestado" type="text" size="39" maxlength="45" value="<?php 	echo "$otroPaisestado"; ?>">
	</span>
	</td>
	
    <td>
	<!--CIUDAD DE NACIMIENTO DE OTRO PAIS-->
	<span id="span_otroPaisciudad" style="display:none"> <label for="otroPaisciudad"> 
    <font color= NAVY> Ciudad de Nacimiento: </font></label><br/>
    <input name="otroPaisciudad" id="otroPaisciudad" type="text" size="25" maxlength="25" value="<?php 	echo "$otroPaisciudad"; ?>">
	</span>
    </td>
</tr>
 
<tr>
    <td>
    <font color= NAVY> Etnia Ind&iacute;gena:</font> <br/>
    <!-- <input name="etnia_indigena" id="etnia_indigena" type="text" size="20" maxlength="25" value="<?php echo "$etnia_indigena"; ?>"  
    onkeyup="letras ()" class="datospf"/> -->
	<select name="etniaS" id="etniaS" class="datospf">
		<option selected="selected" value = 0 >NO</option>
		<?php
		for ($in=0; $in<$filas_etn; $in++){
			$codigo_etnia = $conex_etnia[$in][0];
			$etnia = $conex_etnia[$in][1];
		?>
		<option value="<?php echo $codigo_etnia;?>"><?php echo $etnia;?></option>
		<?php
		}
		?>
	</select>
    </td>

	<!-- AFRODESCENDIENTE, DISCAPACIDAD Y CARNET -->
	<td>
    <font color= NAVY>Afrodescendiente:</font> <br/>
	<!-- <input name="afrodescendiente" type="hidden" value="{$_d['afrodescen']}"> -->
    <select name="afrodescendiente" id="afrodescendiente" class="datospf" style="width:100px;">
		<option value="">NO</option>
		<option value="AFROAMERICANO">AFROAMERICANO</option>
		<option value="AFROEUROPEO">AFROEUROPEO</option>
		<option value="AFROASI�TICO">AFROASI�TICO</option>
		<option value="AFROESTADOUNIDENSE">AFROESTADOUNIDENSE</option>
		<option value="AFROANTILLANO">AFROANTILLANO</option>
		<option value="AFROCUBANO">AFROCUBANO</option>
		<option value="AFROVENEZOLANO">AFROVENEZOLANO</option>
		<option value="AFROBRASILE�O">AFROBRASILE�O</option>
		<option value="AFROARGENTINO">AFROARGENTINO</option>
		<option value="AFROBOLIVIANO">AFROBOLIVIANO</option>
		<option value="AFROCHILENO">AFROCHILENO</option>
		<option value="AFROCOLOMBIANO">AFROCOLOMBIANO</option>
		<option value="AFROECUATORIANO">AFROECUATORIANO</option>
		<option value="AFROMEXICANO">AFROMEXICANO</option>
		<option value="AFROPERUANO">AFROPERUANO</option>
		<option value="AFROURUGUAYO">AFROURUGUAYO</option>
		<option value="AFROESPA�OL">AFROESPA�OL</option>
	</select>
    </td>

	<td>
    <font color= NAVY>Discapacidad:</font> <br/>
	<!-- <input name="tipo_disca" type="hidden" value="{$_d['tipo_disca']}"> -->
	<select name="tipo_discaS" id="tipo_discaS" class="datospf" style="width: 170px;" onChange="cambio_disca(this.value)"> 
	<option value="">NO</option>
	<?php
	for ($d=0; $d<$filas3; $d++){
		$numero = $conex_disca[$d][0];
		$descripcion = $conex_disca[$d][1]; 
		$OpcionD  = '<option value='.$numero.'>'.$descripcion.'</option>';
		print $OpcionD;
	}
	?>
	</select></br>
	<span id="span_carnet" style="display:none"
	<div id="discaEtq" style="display: none;"><font color= NAVY>Carnet Discapacidad:<font></div>
	<input name="carnet_disca" id="carnet_disca" type="text" maxlength="30" class="datospf" style="width: 150px;" value="<?php echo $carnet_disca;?>">
	</span>
    </td>
</tr>

<tr>
    <td>
    <font color= NAVY> Estado Civ&iacute;l: </font><br/>
    <select name="edo_c_e" size="1" class="datospf">
    <option value=""> -SELECCIONE-</option>
    <option value="1"> Soltero(a)</option>
    <option value="2"> Casado(a)</option>
    <option value="3"> Concubino(a)</option>
    <option value="4"> Viudo(a)</option>
    <option value="5"> Divorciado(a)</option>
    </select>
    </td>
    
    <td colspan="1">
    <font color= NAVY> Correo Electr&oacute;nico Pr&iacute;ncipal: </font><br/>
    <input name="correo1" id="correo1" type="text" size="35" maxlength="50" value="<?php echo "$correo1"; ?>" class="datospf"/>
    </td>

	<td colspan="1">
    <font color= NAVY> Correo Electr&oacute;nico Secundario: </font><br/>
    <input name="correo2" id="correo2" type="text" size="35" maxlength="50" value="<?php echo "$correo2"; ?>" class="datospf"/>
    </td>
</tr>

<!--///MUESTRA EL CORREO INSTITUCIONAL///-->
<tr>
    <td colspan="1">
    <font color= "#FF3300"> Correo Electr&oacute;nico Institucional: </font><br/>
    <input name="correo_inst" id="correo_inst" type="text" size="60" maxlength="60" readonly="true" value="<?php echo "$correo_inst"; ?>" class="datospf"/>
    </td>
      
    <td colspan="2">
    <font color= "#FF3300"> Clave: </font><br/>
    <input name="clave_correo" id="clave_correo" type="text" size="35" maxlength="50" readonly="true" value="<?php echo "$clave_correo"; ?>" class="datospf"/>
    </td>
</tr>
</table>

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>2. DIRECCION DE HABITACION </B></font></td>
</tr>
</table> 

<table width="1000px" border="0" class="datospf" cellspacing="12" align="center">
<tr>
    <td>
    <font color= NAVY><B>Direcci&oacute;n Permanente:</B></font></font>	
    </td>
</tr>
  
<tr>
    <td>
    <font color= NAVY> Ciudad: </font><br/>
    <input name="ciudad" id="ciudad" type="text" size="25" maxlength="30" value="<?php echo "$ciudad"; ?>" onkeyup="letras ()" 
    class="datospf"/> 
    </td>
    
    <td>
    <font color= NAVY> Estado: </font><br/>
    <input name="estado" id="estado" type="text" size="25" maxlength="30" value="<?php echo "$estado"; ?>" onkeyup="letras ()" 
    class="datospf"/> 
    </td>
    
    <td width="40%">
    <font color= NAVY> Aven&iacute;da/Calle: </font><br/>
    <input name="avenida" id="avenida" type="text" size="50" maxlength="30" value="<?php echo "$avenida"; ?>" onkeyup="letras ()" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Barrio/Urb: </font><br/>
    <input name="urbanizacion" id="urbanizacion" type="text" size="25" maxlength="30" value="<?php echo "$urbanizacion"; ?>" 
    onkeyup="letras ()" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Manzana N&deg;: </font><br/>
    <input name="manzana" id="manzana" type="text" size="4" maxlength="30" value="<?php echo "$manzana"; ?>" onkeyup="numeros ()" 
    class="datospf"/>
    </td>
</tr>
  
<tr>
    <td>
    <font color= NAVY>Edif&iacute;cio/Torre N&deg;: </font><br/>
    <input name="edificio" id="edificio" type="text" size="8" maxlength="8" value="<?php echo "$edificio"; ?>" onkeyup="numeros ()" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Casa/Apto N&deg;: </font><br/>
    <input name="nrocasa" id="nrocasa" type="text" size="6" maxlength="30" value="<?php echo "$nrocasa"; ?>" onkeyup="numeros ()" 	    class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Tlf Hab (Ej:0286-1234567): </font><br/>
    <input name="telfp_e" id="telfp_e" type="text" size="15" maxlength="12" value="<?php echo "$telfp_e"; ?>" onkeyup="numeros ()"
    class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Tlf cel (ej: 0424-1234567): </font><br/>
    <select name="celcod" class="datospf" size="1" >
    <option value="">-SEL-</option>
	<option value="0414" >0414</option>
	<option value="0424">0424</option>
    <option value="0416">0416</option>
	<option value="0426">0426</option>
	<option value="0412">0412</option>
	</select>&nbsp;-&nbsp;
    	
    <input name="telf2" id="telf2" type="text" size="10" maxlength="7" value="<?php echo "$telf2"; ?>" 
    onkeyup="numeros ()" class="datospf"/>
 	</td>
    
    <td>
    <font color= NAVY> Tlf Auxiliar: </font><br/>
    <input name="telefono3" id="telefono3" type="text" size="13" maxlength="12" value="<?php echo "$telefono3"; ?>" 
    onkeyup="numeros ()" class="datospf"/>
    </td>
</tr>
  
<tr>
    <td colspan="5" >
    <font color= NAVY> �Vive residenciado? </font>
    <input id="residencia" type="radio" name="residencia" value="SI"  onclick="toggle_residencia(this)" class="datospf"/>No
    <input id="residencia" type="radio" name="residencia" value="NO"  onclick="toggle_residencia(this)" class="datospf" />Si
    </td>
</tr>
 
<tr>
    <td>
    <font color= NAVY><div id="div_residen" style="display:none">
    <B>Direcci&oacute;n de Residencia:</B></div></font>
    </td>
</tr>

<tr>
    <td>
    <div id="div_residencia" style="display:none"> <label for="ciudad_r">
    <font color= NAVY> Ciudad: </font></label> <br/>
    <input name="ciudad_r" id="ciudad_r" type="text" size="25" maxlength="30" onkeyup="letras ()" class="datospf" 
    value="<?php echo "$ciudad_r";?>"/> </div>
    </td>
    
    <td>
    <div id="div_estado" style="display:none"> <label for="estado_r">
    <font color= NAVY> Estado: </font></label><br/>
    <input name="estado_r" id="estado_r" type="text" size="25" maxlength="30" onkeyup="letras ()" class="datospf" 
    value="<?php echo "$estado_r";?>"/> </div> 
    </td>
    
    <td>
    <div id="div_avenida" style="display:none"> <label for="avenida_r">
    <font color= NAVY> Aven&iacute;da/Calle: </font><br/>
    <input name="avenida_r" id="avenida_r" type="text" size="25" maxlength="30" onkeyup="letras ()" class="datospf" 
    value="<?php echo "$avenida_r";?>"/> </div></label>
    </td>
    
    <td>
    <div id="div_urbanizacion" style="display:none"> <label for="urbanizacion_r">
    <font color= NAVY> Barrio/Urb: </font><br/>
    <input name="urbanizacion_r" id="urbanizacion_r" type="text" size="25" maxlength="30" onkeyup="letras ()" class="datospf" 
    value="<?php echo "$urbanizacion_r";?>"/></div></label>
    </td>
    
    <td>
    <div id="div_manzana" style="display:none"> <label for="manzana_r">
    <font color= NAVY> Manzana Nº: </font><br/>
    <input name="manzana_r" id="manzana_r" type="text" size="8" maxlength="8" value="<?php echo "$manzana_r";?>" onkeyup="numeros ()" 
    class="datospf"/> </div></label>
    </td>
</tr>
  
<tr>
    <td width="30%">
    <div id="div_edificio" style="display:none"> <label for="edificio_r">
    <font color= NAVY> Edif&iacute;cio/Torre Nº: </font><br/>
    <input name="edificio_r" id="edificio_r" type="text" size="7" maxlength="8" value="<?php echo "$edificio_r";?>" 
    onkeyup="numeros ()" class="datospf"/> </div></label>
    </td>
    
    <td>
    <div id="div_nrocasa" style="display:none"> <label for="nrocasa_r">
    <font color= NAVY> Casa/Apto Nº: </font><br/>
    <input name="nrocasa_r" id="nrocasa_r" type="text" size="7" maxlength="30" value="<?php echo "$nrocasa_r";?>" onkeyup="numeros ()"    class="datospf"/> </div></label>
    </td>
    
    <td colspan="2">
    <div id="div_telefono" style="display:none"> <label for="telfr_e">
    <font color= NAVY> Tlf Hab (Ej:0286-1234567): </font><br/>
    <input name="telfr_e" id="telfr_e" type="text" size="13" maxlength="12" value="<?php echo "$telfr_e";?>" onkeyup="numeros ()" 
    class="datospf"/> </div></label>
    </td>
        
    <td></td><td></td><td></td>
</tr>
</table>

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>3. DATOS ACADEMICOS UNEXPO </B></font></td>
</tr>
</table>
     
<table width="1000px" border="0" class="datospf" cellspacing="12" align="center">
<tr>
    <td colspan="5"><font color= NAVY font-family:Arial; ><B>Datos Acad&eacute;micos Universitarios Actuales:</B></font></td>
</tr>
    
<tr>
    <td>
    <font color= NAVY> Fecha de Inscripci&oacute;n: </font><br/>
    <select name="dia_ins" size="1" class="datospf" disabled="disabled" readonly="readonly">
    <option value="00"> -D-</option>
 	<option value="01"> 01</option>
   	<option value="02"> 02</option>
    <option value="03"> 03</option>
    <option value="04"> 04</option>
    <option value="05"> 05</option>
    <option value="06"> 06</option>
    <option value="07"> 07</option>
    <option value="08"> 08</option>
    <option value="09"> 09</option>
    <option value="10"> 10</option> 
    <option value="11"> 11</option>
    <option value="12"> 12</option>
	<option value="13"> 13</option>
    <option value="14"> 14</option>
    <option value="15"> 15</option>
    <option value="16"> 16</option>
    <option value="17"> 17</option>
    <option value="18"> 18</option>
    <option value="19"> 19</option>
    <option value="20"> 20</option>
    <option value="21"> 21</option>
    <option value="22"> 22</option>
    <option value="23"> 23</option>
	<option value="24"> 24</option>
    <option value="25"> 25</option>
    <option value="26"> 26</option>
    <option value="27"> 27</option> 
    <option value="28"> 28</option>
    <option value="29"> 29</option>
    <option value="30"> 30</option>
    <option value="31"> 31</option>
    </select>

    <select name="mes_ins" size="1" class="datospf" disabled="disabled" readonly="readonly">
   	<option value="00"> -M-</option>
   	<option value="01"> Enero</option>
  	<option value="02"> Febrero</option>
   	<option value="03"> Marzo</option>
 	<option value="04"> Abril</option>
    <option value="05"> Mayo</option>
    <option value="06"> Junio</option>
    <option value="07"> Julio</option>
    <option value="08"> Agosto</option>
    <option value="09"> Septiembre</option>
    <option value="10"> Octubre</option> 
    <option value="11"> Noviembre</option>
    <option value="12"> Diciembre</option>
    </select>
  
    <select name="ano_ins" size="1" class="datospf" disabled="disabled" readonly="readonly">
    <option value=""> -A-</option>
	<option value="1990"> 1990</option>
    <option value="1991"> 1991</option>
    <option value="1992"> 1992</option>
    <option value="1993"> 1993</option>
    <option value="1994"> 1994</option>
    <option value="1995"> 1995</option>
    <option value="1996"> 1996</option>
    <option value="1997"> 1997</option>
    <option value="1998"> 1998</option>
    <option value="1999"> 1999</option>
    <option value="2000"> 2000</option>
    <option value="2001"> 2001</option>
    <option value="2002"> 2002</option>
    <option value="2003"> 2003</option>
    <option value="2004"> 2004</option>
    <option value="2005"> 2005</option>
    <option value="2006"> 2006</option>
    <option value="2007"> 2007</option>
    <option value="2008"> 2008</option>
    <option value="2009"> 2009</option>
    <option value="2010"> 2010</option>
	<option value="2011"> 2011</option>
	<option value="2012"> 2012</option>
	<option value="2013"> 2013</option>
	<option value="2014"> 2014</option>
    </select> 
    </td>
  
    <td>
   	<font color= NAVY> Condici&oacute;n de Ingreso: </font><br/>
    <input name="ingreso" type="text" size="20" maxlength="30" disabled="disabled" readonly="readonly" 
    value="<?php echo "$ingreso"; ?>" class="datospf"/>
    </td>
    
    <td>
   	<font color= NAVY> Lapso de Ingreso: </font><br/>
   	<input name="lapso_in" type="text" size="8" maxlength="8" disabled="disabled" readonly="readonly" 
    value="<?php echo "$lapso_in"; ?>" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Especialidad: </font><br/>
    <input name="carrera" type="text" size="30" maxlength="11" disabled="disabled" readonly="readonly" 
    value="<?php echo "$carrera"; ?>" class="datospf"/>
    </td>
    
    <td>
    <font color= NAVY> Pensum: </font><br/>
    <input name="pensum" type="text" size="20" maxlength="20" value="<?php echo "$descripcion_p"; ?>" disabled="disabled" 
    readonly="readonly" class="datospf"/>
    </td>
</tr>

<tr>
	<td>
    <font color= NAVY> Estatus: </font><br/>
    <select name="estatus_e" size="1" disabled="disabled" readonly="readonly" class="datospf">
    <option value=" "> -SELECCIONE-</option>
    <option value="1"> Act&iacute;vo </option>
    <option value="2"> Inact&iacute;vo </option>
    </select>
    </td>
	
    <td>
    <font color= NAVY> Semestre: </font><br/>
    <input name="semestre" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$semestre"; ?>" class="datospf"/>
    </td>
	
    <td>
    <font color= NAVY> Cr&eacute;ditos Aprobados: </font><br/>
    <input name="u_cred_aprob_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$u_cred_aprob_t"; ?>" class="datospf"/>	
    </td>
	
    <td>
    <font color= NAVY> Cr&eacute;ditos Aprobados para el Pensum: </font><br/>
    <input name="u_cred_pen_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$u_cred_pen_t"; ?>" class="datospf"/>
    </td>
	<!-- 
    <td>
    <font color= NAVY> Cr&eacute;ditos Inscritos:</font><br/>
    <input name="u_cred_insc_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$u_cred_insc_t"; ?>" class="datospf"/>
    </td> -->
</tr>
    
    <tr>
	<td>
    <font color= NAVY> Cr&eacute;ditos Aprobados por Equivalencia: </font><br/>
    <input name="c_aprob_equiv_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$c_aprob_equiv_t"; ?>" class="datospf"/>
    </td>
	
    <td>
    <font color= NAVY> Indice Acad&eacute;mico: </font><br/>
    <input name="ind_acad_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$ind_acad_t"; ?>" class="datospf"/>
    </td>
	
    <td>
    <font color= NAVY> Tesista: </font><br/>
    <select name="tesista" size="1" disabled="disabled" readonly="readonly" class="datospf">
    <option value=""> -S-</option>
    <option value="0"> No</option>
    <option value="1"> S&iacute;</option>
    </select>	
    </td>
	
    <td>
    <font color= NAVY> Cr&eacute;ditos para el Indice: </font><br/>
    <input name="u_c_p_indic_t" type="text" size="3" maxlength="3" disabled="disabled" readonly="readonly" 
    value="<?php echo "$u_c_p_indic_t"; ?>" class="datospf"/>
    </td>
    <td></td>
</tr>
</table>

<table width="1000px" border="0" class="titulo" align="center">
<tr>
    <td class="titulo"> <font color= NAVY><B>3.1. DATOS ACADEMICOS BACHILLERATO (LICEO) </B></font></td>
</tr>
</table>

<table width="1000px" border="0" class="datospf" cellspacing="12" align="center">
<tr>
    <td colspan="3"><font color= NAVY font-family:Arial; ><B>Datos Acad&eacute;micos Bachillerato:</B></font></td>
</tr>
<tr>
    <td colspan="2"><font color= NAVY>Nombre del Plantel de Procedencia:</font><br/>
	<input name="plantelI" maxlength="100" id="plantelI" class="datospf" style="width: 550px;" type="text" value="<?php echo $plantel; ?>">
	</td>

	<td colspan="1"><font color= NAVY>Tipo de Plantel:</font><br/>
	<!-- <input name="tipo_plantel" type="hidden" value = "{$_d['tipo_plantel']}"> -->
	<select name="tipo_plantelS" id="tipo_plantelS" class="datospf" style="width: 100px;" onChange="costo_mens(this.value);">
		<option value="">SELECCIONE</option>
		<option value="PUBLICO">P&Uacute;BLICO</option>
		<option value="PRIVADO">PRIVADO</option>
	</select>
	<div id="nom_mensu" style="display:none;" color= NAVY>Mensualidad:</div>
	<!-- <font id="nom_mensu" style="display:none;" color= NAVY>Mensualidad:</font><br/> -->
	<input name="costo_mensualI" maxlength="20" id="costo_mensualI" class="datospf" style="width:100px; display:none;" type="text" onkeyup="numeros ()">
	</td>
</tr>

<tr>
    <td colspan="1"><font color= NAVY>Pa&iacute;s de Ubicaci&oacute;n del Plantel:</font><br/>
	<select name="pais_plantel" id="pais_plantel" class="datospf" onChange="paisplantel(this.value);">
		<option selected="selected" value=0>-SELECCIONE-</option>
		<?php
		for ($p=0; $p<$filas1; $p++){
			$CODIGO = $conexPais[$p][0];
			$PAI_NOMBRE = $conexPais[$p][1];
		?>
		<option value="<?php echo $CODIGO;?>"><?php echo $PAI_NOMBRE;?></option>
		<?php
		}
		?>
	</select>
	</td>

	<td colspan="1">
	<span id="edo_plantel_v" style="display:none">
	<font color= NAVY>Estado de Ubicaci&oacute;n del Plantel:</font><br/>
	<select name="edo_plantel" id="edo_plantel" class="datospf" onChange="ciudades_p(this.value,pais_plantel.value); ;
					municipios(this.value,pais_plantel.value);">
		<option selected="selected" value=0> -SELECCIONE- </option>
		<?php
		for ($e = 0; $e < $filas2; $e++){
			$CODIGO = $conex_estado[$e][0];
			$EDO_NOMBRE = $conex_estado[$e][1];
		?>
		<option value="<?php echo $CODIGO;?>"><?php echo $EDO_NOMBRE;?></option>
		<?php
		}
		?>
	</select>
	</span>
	</td>

	<td colspan="1"> 
	<span id="cd_plantel_v" style="display:none">
	<label for="ciudad_plantel">
    <font id="ciudad_plantel" color= NAVY>Ciudad de Ubicaci&oacute;n del Plantel:</font><br/>
    <div id="capa_p">
	<select name="codigoc_S_1" id="codigoc_S_1" class="datospf" style="display:none">
		<option value="">-SELECCIONE-</option>
	</div>
	</span>
    </td>
</tr>

<tr>
	<td colspan="2">
	<span id="mpio_plantel_v" style="display:none">
	<font color= NAVY>Municipio de Ubicaci&oacute;n del Plantel:</font><br/>
	<!-- el select que esta en el archivo de municipios -->
	<div id="capa2">
	<select name="codigom_S_1" id="codigom_S_1" class="datospf" style="display:none">
		<option value="">-SELECCIONE-</option>
	</div>
	</span>
	</td>
</tr>

<!-- Edo, Cd y Mpio del Plantel EXTRANJERO -->
<tr id="tr_plantel">
<!-- <td id="td_edo_plantel" style="display:none"> -->
<td>
<span id="edo_plantel_eSpan" style="display:none">
	<font color= NAVY> Estado de Ubicaci&oacute;n del Plantel:</font> <br />
    <input name="edo_plantel_eI" id="edo_plantel_eI" type="text" size="50" maxlength="80" value="<?php echo "$edo_plantel_e"; ?>" class="datospf" style="display:none"/>
</span>
</td>

<!-- <td id="td_cd_plantel" colspan = "2" style="display:none"> -->
<td>
<span id="cd_plantel_eSpan" style="display:none">
    <font color= NAVY> Ciudad de Ubicaci&oacute;n del Plantel: </font> <br/>
    <input name="cd_plantel_eI" id="cd_plantel_eI" type="text" size="65" maxlength="80" value="<?php echo "$cd_plantel_e"; ?>" class="datospf"/>
</span>
</td>

<!-- <td id="td_mpio_plantel" colspan = "2" style="display:none"> -->
<td>
<span id="mpio_plantel_eSpan" style="display:none">
    <font color= NAVY> Municipio de Ubicaci&oacute;n del Plantel: </font> <br/>
    <input name="mpio_plantel_eI" id="mpio_plantel_eI" type="text" size="50" maxlength="80" value="<?php echo "$mpio_plantel_e"; ?>" class="datospf"/>
</span>
</td>
</tr>
<!--FIN Edo, Cd y Mpio del Plantel EXTRANJERO -->

<tr>
	<td colspan="1"><font color= NAVY>A�o de Egreso del Liceo:</font><br/>
	<select name="ano_egre_coleS" id="ano_egre_coleS" class="datospf" >
		<option value="">-SELECCIONE-</option>
		<?php
		for ($a=date('Y'); $a>=(date('Y')-60); $a--){
			$OpcionA = '<option value='.$a.'>'.$a.'</option>';
			print $OpcionA;
		}
		?>
	</select> 
	</td>

    <td colspan="1"><font color= NAVY>Sistema de Estudio:</font><br/>
	<!-- <input name="sistema_estudio" type="hidden" value = "{$_d['sistema_estudio']}"> -->
	<select name="sistema_estudioS" id="sistema_estudioS" class="datospf" onChange="otro_sistema(this.value);">
		<option value=""> -SELECCIONE-</option>
		<option value="REGULAR">REGULAR</option>
		<option value="PARASISTEMA">PARASISTEMA </option>
		<option value="OTRO">OTRO (indique abajo):</option>
	</select>
	<input name="otroSistemaE" maxlength="15" id="otroSistemaE" class="datospf" style="width: 130px; display:none;" type="text" onKeyUp="letras ();">
	</td>

	<td colspan="1"><font color= NAVY>Turno:</font><br/>
	<!-- <input name="turno_estudio" type="hidden" value = "{$_d['turno_estudio']}"> -->
	<select name="turno_estudioS" id="turno_estudioS" class="datospf" onChange="otro_turno(this.value);">
		<option value=""> -SELECCIONE-</option>
		<option value="DIURNO">DIURNO</option> 
		<option value="NOCTURNO">NOCTURNO</option> 
		<option value="ESTUDIOS LIBRES">ESTUDIOS LIBRES</option>
		<option value="OTRO">OTRO (indique abajo):</option>
	</select>
	<input name="otroTurnoE" maxlength="20" id="otroTurnoE" class="datospf" style="width: 130px; display:none;" type="text" onKeyUp="letras ();">
	</td>

</tr>

<tr>
	<!-- <td colspan="1"><font color= NAVY>Promedio de Bachillerato:</font><br/>
	<select name="promedioS" id="promedioS" class="datospf" style="width: 145px;">
		<option value="">-SELECCIONE-</option>
		<option value="menor 13">MENOS DE 13 PUNTOS</option>
		<option value="de 13 a 16">ENTRE 13 Y 16 PUNTOS</option>
		<option value="de 16 a 18">ENTRE 16 Y 18 PUNTOS</option>
		<option value="de 18 a 20">ENTRE 18 Y 20 PUNTOS</option>
	</select>
	</td> -->
	<td colspan="2"><font color= NAVY>T&iacute;tulo Obtenido:</font><br/>
	<!-- <input name="titulo_b" type="hidden" value = "{$_d['titulo_b']}"> -->
	<select name="titulo_bS" id="titulo_bS" class="datospf" style="text-transform: none;">
		<option value=""> -SELECCIONE-</option>
		<option value="CIENCIAS">CIENCIAS BASICAS Y TECNOLOGICAS</option>
		<option value="INDUSTRIAL">INDUSTRIAL MENCI&Oacute;N(T&Eacute;CNICO MEDIO)</option>
		<option value="CONSTRUCCION CIVIL">CONSTRUCCI&Oacute;N CIVIL</option>
		<option value="CONSTRUCCION NAVAL">CONTRUCCI&Oacute;N NAVAL</option>
		<option value="ELECTRICIDAD">ELECTRICIDAD</option>
		<option value="INSTRUMENTACION">INSTRUMENTACI&Oacute;N</option>
		<option value="MECANICA-MANTENIMIENTO">M&Eacute;CANICA DE MANTENIMIENTO</option>
		<option value="MAQUINAS Y HERRAMIENTAS">M&Aacute;QUINAS Y HERRAMIENTAS</option>
		<option value="REFRIG Y AIRE ACONDIC.">REFRIGERACION Y AIRE ACONDICIONADO</option>
		<option value="QUIMICA INDUTRIAL">QU&Iacute;MICA INDUSTRIAL</option>
		<option value="ELECTROMECANICO">ELECTROMEC&Aacute;NICO</option>
	</select>
	</td>

	<td colspan="1"><font color= NAVY>Prom.Total Bachill.:</font><br/>
	<input type="text" name="ind_cnuI" id="ind_cnuI" style="width: 50px;" maxlength="5" class="datospf" value="<?php echo $ind_cnu; ?>" >
	</td>
</tr>
<!--
<tr>
    
	 <td colspan="1"><font color= NAVY>Prom.Castell.:</font><br/>
	<input type="text" name="promedio_cast" value="" id="promedio_cast" style="width: 50px;" maxlength="5" class="datospf" onKeyUp="validarN(this);" onChange="validar(this);">
	</td>

	<td colspan="1"><font color= NAVY>Prom.Quimica:</font><br/>
	<input type="text" name="promedio_quim" value="" id="promedio_quim" style="width: 50px;" maxlength="5" class="datospf" onKeyUp="validarN(this);" onChange="validar(this);">
	</td>

	<td colspan="1"><font color= NAVY>Prom.F&iacute;sica:</font><br/>
	<input type="text" name="promedio_fisi" value="" id="promedio_fisi" style="width: 50px;" maxlength="5" class="datospf" onKeyUp="validarN(this);" onChange="validar(this);">
	</td> -->

<!-- <tr>
	<td colspan="1"><font color= NAVY>Prom.Matem&aacute;tica:</font><br/>
	<input type="text" name="promedio_mate" value="" id="promedio_mate" style="width: 50px;" maxlength="5" class="datospf" onKeyUp="validarN(this);" onChange="validar(this);">
	</td>
</tr> -->
<tr>
	<td colspan="1"><font color= NAVY>Asignado por:</font><br/>
	<!-- <input name="ingreso" type ="hidden" value="{$_d['ingreso']}" > -->
	<input name="tipoIngreso" maxlength="20" id="tipoIngreso" class="datospf" style="width: 150px;" type="text" disabled="disabled" value="<?php echo $ingreso ?>">
	</td>

    <td colspan="1"><font color= NAVY>Opci&oacute;n CNU para UNEXPO:</font><br/>
	<!-- <input name="opcion_cnu" type="hidden" value = "{$_d['opcion_cnu']}"> -->
	<select name="opcion_cnuS" id="opcion_cnuS" class="datospf" style="width: 150px;">
		<option value="">-SELECCIONE-</option>
		<option value="PRIMERA">PRIMERA OPCI&Oacute;N</option>
		<option value="SEGUNDA">SEGUNDA OPCI&Oacute;N</option>
		<option value="TERCERA">TERCERA OPCI&Oacute;N</option>
		<option value="CUARTA">CUARTA OPCI&Oacute;N</option>
		<option value="QUINTA">QUINTA OPCI&Oacute;N</option>
		<option value="SEXTA">SEXTA OPCI&Oacute;N</option>
		<option value="NINGUNA">NINGUNA OPCI&Oacute;N</option>
	</select>
	</td>

	<td colspan="1"><font color= NAVY>Nro. Rusnie:</font><br/>
	<input type="text" name="sit_eI" id="sit_eI" style="width: 150px;" maxlength="13" class="datospf" value="<?php echo $sit_e; ?>">
	</td>

</tr>
<tr>
    <td colspan="4"><font color= NAVY>Debes colocar el promedio igual que este ejemplo: xx.xx</font><br/></td>
</tr>
</table>
<?php
		if ($filas==1) 
		{
		?>
        
        <table width="1000px" border="0" align="center" cellspacing="5">
  <tr>
    <td width="">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   <input type="button" name="guardar" value="GUARDAR Y SALIR" onclick="valida_envia('2')" > 
    </td>
    
    <td width="20">
     
    </td>
    
    <td width="15"> 
    <input type="button" name="actualizar" value="CONTINUAR" onclick="valida_envia('1')" >
    </td>
  
  </tr>
</table>

       <input type="hidden" name="ac" value="">
       
		<?php 
		}
			
		?>
          
		</form>
		<?php 
		}
				else {
					echo "error";}

		?>
</body>
</html>
