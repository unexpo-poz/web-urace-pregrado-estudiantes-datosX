		<?php
		include_once('inc/config.php');
		include_once('inc/odbcss_c.php');
		///////INFORMACION BANCARIA//////////////
		$fila_cuenta_banco = $_POST['fila_cuenta_banco'];
		$tipo_cta = $_POST['tipocuenta'];
		$nro_cta = $_POST['nrocuenta'];
		$lapsoBanco = $_POST['lapsoBanco'];
		
		///////ULTIMO BENEFICIO ADQUIRIDO////////
		$fila_ayu_est=$_POST['fila_ayu_est'];
		$beneficio = $_POST['beneficio'];
		$horas = $_POST['nrohoras'];
		$lapso = $_POST['lapso'];
		$nombre_ayu = $_POST['beneficioactual'];
		$nrohorasactual = $_POST['nrohorasactual'];
		$dependenciactu = $_POST['dependenciactu'];
		$uc_actuales = $_POST['uc_actuales'];
		
		$LapsoAnterior = $_POST['LapsoAnterior'];
		$nombre_ayuBA = $_POST['beneficioanterior'];
		$nro_horaBA = $_POST['nrohorasanterior'];
		$dependenciaAnte = $_POST['dependenciante'];
		$uc_anterior = $_POST['uc_anterior'];
		$mostrar = $_POST['mostrar'];
		
/*		/////////BENEFICIO ANATERIOR///////////
		//$fila_ayu_est=$_POST['fila_ayu_est'];
		$beneficio = $_POST['beneficio'];
		$horas = $_POST['nrohoras'];
*/		
		/////////////OTROS DATOS/////////////////
		$exp_e=$_POST['expediente'];
		$fila_dat_soci=$_POST['fila_dat_soci'];
		$filadobesoci=$_POST['filadobesoci'];
		$fila_dace=$_POST['fila_dace'];
		$residencia=$_POST['resi'];
		//echo "residencia=";
		//echo $residencia;
		//echo $_POST[ac];
		//print_r($_POST);
		$ci_e=$_POST['cedula'];
		$sexo=$_POST['sexo'];
		$f_nac=$_POST['f_nac'];
		
		$padre=$_POST['padre'];
		$madre=$_POST['madre'];
		$hnos=$_POST['hnos'];
		$espo=$_POST['espo'];
		$hijos=$_POST['hijos'];
		$nintegrantes=$_POST['nintegrantes'];
		$lug_resid=$_POST['lug_resid'];
		$estado=$_POST['estado']; $estado =strtoupper($estado);
		$parentesco_hog=$_POST['parentesco_hog'];
		//bloque que va hacia dobe_socioeconomic//
		$turno_trabajo=$_POST['turno_trabajo'];
		$instr_padre=$_POST['instr_padre'];
		$ocup_padre=$_POST['ocup_padre'];	
		($ocup_padre == 'OTRO') ? $ocup_padre = strtoupper($_POST['otra_ocup']) : $ocup_padre = strtoupper($_POST['ocup_padre']);	
		$instr_madre=$_POST['instr_madre'];
		$ocup_madre=$_POST['ocup_madre']; 
		($ocup_madre == 'OTRO') ? $ocup_madre = strtoupper($_POST['otra_oc']) : $ocup_madre = strtoupper($_POST['ocup_madre']);		
		$tipo_vivienda=$_POST['tipo_vivienda'];
		$monto_alq=$_POST['monto_alq'];
		$ingreso_f=$_POST['ingreso_f'];
		//////////////////////////////////////////
		$estrato_social=$_POST['estrato_social'];
		$alq_resi=$_POST['alq_resi'];
		$monto=$_POST['monto'];
		$tvivienda=$_POST['tvivienda'];
		$ubicacion=$_POST['ubicacion'];
		$agua=$_POST['agua'];
		$elect=$_POST['elect'];
		$telef=$_POST['telef'];
		$tvcable=$_POST['tvcable'];
		$internet=$_POST['internet'];		
		$trabajo=$_POST['trabajo'];
		$ingmensual=$_POST['ingmensual'];
		$depend=$_POST['depend']; $depend =strtoupper($depend);
		$mesada=$_POST['mesada'];
		$beca=$_POST['beca'];
		$organismo=$_POST['organismo']; $organismo =strtoupper($organismo);
		$mont=$_POST['mont'];
		$cancer=$_POST['cancer'];
		$respi=$_POST['respi'];
		$cereb=$_POST['cereb'];
		$sida=$_POST['sida'];
		$diab=$_POST['diab'];
		$cardia=$_POST['cardia'];
		$alerg=$_POST['alerg'];
		$renal=$_POST['renal'];
		$hepat=$_POST['hepat'];
		$trsex=$_POST['trsex'];
		$otra=$_POST['otra'];
		$cua=$_POST['cua']; $cua =strtoupper($cua);
		$quien=$_POST['quien']; $quien =strtoupper($quien);
		$padc_familia=$_POST['padc_familia'];
		$cual=$_POST['cual']; $cual =strtoupper($cual);
		$disc=$_POST['disc'];
		$consult=$_POST['consult'];
		$especialista=$_POST['especialista']; $especialista =strtoupper($especialista);
		$int_quir=$_POST['int_quir'];
		$comedor=$_POST['comedor'];
		$transp=$_POST['transp'];
		$ruta=$_POST['ruta']; $ruta =strtoupper($ruta);
		$prepa=$_POST['prepa'];
		$alumn=$_POST['alumn'];
		$lentes=$_POST['lentes'];
		$odont=$_POST['odont'];
		$prob_sal=$_POST['prob_sal'];
		$med_gen=$_POST['med_gen'];
		$ginec=$_POST['ginec'];
		$odonto=$_POST['odonto'];
		$teatro=$_POST['teatro'];
		$excur=$_POST['excur'];
		$danza=$_POST['danza'];
		$centroe=$_POST['centroe'];
		$musica=$_POST['musica'];
		$dep=$_POST['dep'];
		$particip=$_POST['particip'];
		$act=$_POST['act']; $act =strtoupper($act);
		$fini=$_POST['fini'];
		$ffin=$_POST['ffin'];
		$intervencion=$_POST['intervencion']; $intervencion =strtoupper($intervencion);

		$etnia_indigena = $_POST['etnia'];//etnia (el select)
		$disca = $_POST['disca'];//disca
		$carnet_disca = $_POST['carnet_disca'];
		$nomb_plantel = $_POST['nomb_plantel'];
		$tipo_plantel = $_POST['tipo_plantel'];
		$costo_mensual = $_POST['costo_mensual'];
		$pais_plantel = $_POST['pais_plantel'];
		$edo_plantel = $_POST['edo_plantel'];
		$cd_plantel = $_POST['cd_plantel'];
		$mpio_plantel = $_POST['mpio_plantel'];
		$anio_egre_cole = $_POST['anio_egre_cole'];
		$sistema_estudio = $_POST['sistema_estudio'];
		$turno_estudio = $_POST['turno_estudio'];
		$titulo_b = $_POST['titulo_b'];
		$opcion_cnu = $_POST['opcion_cnu'];
		$rusnie = $_POST['rusnie'];
		$promBachill = $_POST['promBachill'];

		$conex = new ODBC_Conn($DSN,$user,$pass,TRUE,'prueba.log');
		if ($fila_dat_soci==1)
		{

		////////////////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla DAT_SOCIOECONOMIC1 ///
		//////////////////////////////////////////////////////////////////////////////
	
	$sql  = "UPDATE DAT_SOCIOECONOMIC1 SET padre='$padre', madre='$madre', hnos='$hnos', espo='$espo', hijos='$hijos', nintegrantes= '$nintegrantes', lug_resid='$lug_resid', estado='$estado', parentesco_hog='$parentesco_hog', alq_resi='$alq_resi', monto= '$monto', tvivienda='$tvivienda', ubicacion='$ubicacion', agua='$agua', elect='$elect', telef='$telef', tvcable='$tvcable', internet= '$internet', residencia='$residencia', trabajo='$trabajo', ingmensual='$ingmensual', depend='$depend', mesada='$mesada', beca='$beca', organismo='$organismo', mont='$mont', cancer='$cancer', respi='$respi', cereb='$cereb', sida='$sida', diab='$diab', cardia='$cardia', alerg='$alerg', renal='$renal', hepat='$hepat', trsex='$trsex', otra='$otra',cua='$cua', quien='$quien', padc_familia='$padc_familia', cual='$cual', disc='$disc', consult='$consult', especialista='$especialista',int_quir='$int_quir', comedor='$comedor' , transp='$transp', ruta='$ruta', prepa='$prepa', alumn='$alumn', lentes='$lentes', odont='$odont', prob_sal='$prob_sal', med_gen='$med_gen', ginec='$ginec', odonto='$odonto', teatro='$teatro',excur='$excur', danza='$danza', centroe='$centroe', musica='$musica', dep='$dep', particip='$particip', act='$act', fini='$fini', ffin='$ffin', intervencion='$intervencion' WHERE exp_e='$exp_e' ";
	
	$conex->ExecSQL($sql,__LINE__,true);
	$resultado = $conex->result;
	$modif = $conex->fmodif;
	//echo $modif;
		
		}
			else
					{

	//echo "expediente: ".$exp_e;
	//echo "residencia: ".$residencia;
		/////////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la tabla DAT_SOCIOECONOMIC1 //
		///////////////////////////////////////////////////////////////////////////
	
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqlent  = "INSERT INTO DAT_SOCIOECONOMIC1 (exp_e, padre, madre, hnos, espo, hijos, nintegrantes, lug_resid, estado, parentesco_hog, alq_resi, monto, tvivienda, ubicacion, agua, elect, telef, tvcable,  internet,  residencia, trabajo, ingmensual, depend, mesada, beca, organismo, mont, cancer, respi, cereb, sida, diab, cardia, alerg, renal, hepat, trsex, otra, cua, quien, padc_familia, cual, disc, consult, especialista, int_quir, comedor, transp, ruta, prepa, alumn, lentes, odont, prob_sal, med_gen, ginec, odonto, teatro, excur, danza, centroe, musica, dep, particip, act, fini, ffin, intervencion) VALUES ('$exp_e', '$padre', '$madre', '$hnos', '$espo', '$hijos', '$nintegrantes', '$lug_resid', '$estado', '$parentesco_hog', '$alq_resi', '$monto', '$tvivienda', '$ubicacion', '$agua', '$elect', '$telef', '$tvcable', '$internet',  '$residencia',  '$trabajo', '$ingmensual', '$depend', '$mesada', '$beca', '$organismo', '$mont', '$cancer', '$respi', '$cereb', '$sida', '$diab', '$cardia', '$alerg', '$renal', '$hepat', '$trsex', '$otra', '$cua', '$quien', '$padc_familia', '$cual', '$disc', '$consult', '$especialista', '$int_quir', '$comedor', '$transp', '$ruta', '$prepa', '$alumn', '$lentes', '$odont', '$prob_sal', '$med_gen', '$ginec', '$odonto', '$teatro', '$excur', '$danza', '$centroe', '$musica', '$dep', '$particip', '$act', '$fini', '$ffin', '$intervencion')";
	
		$conex->ExecSQL($sqlent,__LINE__,true);
		$resultado = $conex->result;
		$modif = $conex->fmodif;
		//echo $modif;
		
					}

		//echo "dobe: ".$filadobesoci;
		
		if ($filadobesoci==1)
		{

		//////////////////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla DOBE_SOCIOECONOMIC /////
		////////////////////////////////////////////////////////////////////////////////
	
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqls  = "UPDATE DOBE_SOCIOECONOMIC SET trabaja='$trabajo', turno_trabajo='$turno_trabajo', instr_padre='$instr_padre', ocup_padre='$ocup_padre', instr_madre='$instr_madre', ocup_madre='$ocup_madre', tipo_vivienda='$tipo_vivienda', monto_alq='$monto_alq', ingreso_f='$ingreso_f', becario='$beca' WHERE exp_e='$exp_e' ";
	
	$conex->ExecSQL($sqls,__LINE__,true);
	$res = $conex->result;
	$modif = $conex->fmodif;
	//echo $modif;
	
		}
			else
					{

		///////////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la tabla DOBE_SOCIOECONOMIC ////
		/////////////////////////////////////////////////////////////////////////////
	
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqlins  = "INSERT INTO DOBE_SOCIOECONOMIC (exp_e, trabaja, turno_trabajo, instr_padre, ocup_padre, instr_madre, ocup_madre, tipo_vivienda, monto_alq, ingreso_f ,becario) VALUES ('$exp_e','$trabajo', '$turno_trabajo', '$instr_padre', '$ocup_padre', '$instr_madre', '$ocup_madre', '$tipo_vivienda', '$monto_alq','$ingreso_f' ,'$beca')";	
		
		$conex->ExecSQL($sqlins,__LINE__,true);
		$resu = $conex->result;
		$modif = $conex->fmodif;
		//echo $modif;
		
					}
		
		
		if ($fila_dace==1)
		{

		///////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla DACE002 //////
		///////////////////////////////////////////////////////////////////////
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqls  = "UPDATE DACE002 SET estrato_social='$estrato_social', trabajo='$trabajo', becario='$beca', organismo='$organismo' WHERE exp_e='$exp_e' ";
	
	$conex->ExecSQL($sqls,__LINE__,true);
	$resp = $conex->result;
	$modif = $conex->fmodif;
	//echo $modif;
	
		}
			else
					{

		/////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la tabla DACE002 /////
		///////////////////////////////////////////////////////////////////
	
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'pruebas.log');
		$sqlins  = "INSERT INTO DACE002 (exp_e, estrato_social, trabajo, becario, organismo) VALUES ('$exp_e', '$estrato_social', '$trabajo', '$beca', '$organismo')";	
		
		$conex->ExecSQL($sqlins,__LINE__,true);
		$resu = $conex->result;
		$modif = $conex->fmodif;
		//echo $modif;
		
					}
		
		if ($_POST[ac] == '2') 	
		die (" <script language= \"javascript\" > window.close (); </script> ");
		
		?>

		<?php
		
		//$conex = new ODBC_Conn('dace9','sysadm','sysadm',TRUE,'prueba.log');
		$mSQL  = "select * from DACE002 where ci_e='$ci_e' ";
		$conex->ExecSQL($mSQL,__LINE__,true);
		$resulta = $conex->result;
		$filas=$conex->filas;
		
		/////////////////////////////////////////////
		//rutina para extraer los datos de DACE002//	
		///////////////////////////////////////////	
		//$ci_e=$conex->result[0][0];
		$nombres=$conex->result[0][1];
		$apellidos=$conex->result[0][2];
		//$exp_e=$conex->result[0][5];
		$lapso_in=$conex->result[0][6];
		//$sexo=$conex->result[0][7];
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
		$f_nac_e= $conex->result[0][12];
		$edo_c_e=$conex->result[0][13];
		$p_nac_e=$conex->result[0][14];//PAIS DE NACIMIENTO
		$p_nac_e2 = $p_nac_e;
		$l_nac_e=$conex->result[0][15];//CIUDAD DE NACIMIENTO
		$l_nac_e2 = $l_nac_e;
		$estado_nac = $conex->result[0][24];//ESTADO DE NACIMIENTO
		$estado_nac2 = $estado_nac;
		$nac_e=$conex->result[0][16];
		$estatus_e=$conex->result[0][70];
		$fec_ins = $conex->result[0][71];

		//echo "fecha inscripcion =";
		//echo $fec_ins;
		$semestre=$conex->result[0][73];
		$ind_acad_t=$conex->result[0][81];
		$c_aprob_equiv_t=$conex->result[0][83];
		$u_cred_aprob_t=$conex->result[0][85];
		$u_cred_insc_t=$conex->result[0][87];
		$u_c_p_indic_t=$conex->result[0][89];
		$u_cred_pen_t=$conex->result[0][91];

		//$etnia_indigena=$conex->result[0][95];
		$edo_nac_e=$conex->result[0][100];
		$tesista=$conex->result[0][106];
		$doc_ident=$conex->result[0][107];

		$ind_cnu=$conex->result[0][109];
		$nombres2=$conex->result[0][113];
		$apellidos2=$conex->result[0][114];
		$urbanizacion=$conex->result[0][115];
		$avenida=$conex->result[0][116];
		$manzana=$conex->result[0][117];
		$nrocasa=$conex->result[0][118];	
		$telefono2 = explode("-",$conex->result[0][120]);	
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
		
		$correo1 = $conex->result[0][126];
		$clave = $conex->result[0][128];

		$ciudad=$conex->result[0][124];
		$estado=$conex->result[0][125];

		/////////////rutina para extraer el nombre de la etnia indigena///////////////
		//////////////////////////////////////////////////////////////////////////////
		$sql_etnia = "select etnia from etnia_indigena where codigo = $etnia_indigena";
		$conex->ExecSQL($sql_etnia,__LINE__,true);
		$etnia_indigena = $conex->result[0][0];
		if ($etnia_indigena == ""){$etnia_indigena = "NO";}//si esta vacio muestra NO

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
			
			////////////////////////////////////////////////////////////////////////////////
			//rutina para extraer la info del estudiante de la base de datos TIPO_INGRESO///
			////////////////////////////////////////////////////////////////////////////////
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
			$descripcion=$conex->result[0][1];
			//echo "descripcion ".$descripcion;


			$sql1 = "select * from DAT_SOCIOECONOMIC1 where exp_e='$exp_e' ";
		$conex->ExecSQL($sql1,__LINE__,true);
		$resulte = $conex->result;
		$fila_dat_soci = $conex->filas;
		//echo "fila_dat_soci=";
		//echo $fila_dat_soci;
		//print_r ($resulte);
		//$exp_e=$conex->result[0][0];
		//echo "exp_e=";
		//echo $exp_e;
			
			
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
		
		
		//////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del estudiante de la tabla DOBE_SOCIOECONOMIC//
		////////////////////////////////////////////////////////////////////////////
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
		$estrato_social=$conex->result[0][0];		

		////////////////////////////////////////////////////////////////////////
		////// rutina para actualizar la informacion en la tabla AYU_CUENTA ////
		////////////////////////////////////////////////////////////////////////
		if ($fila_cuenta_banco == 1){
			if (strlen($nro_cta) == 20){
				$sql2  = "UPDATE AYU_CUENTA SET TIPO_CTA='$tipo_cta', NRO_CTA='$nro_cta' WHERE CI_E='$ci_e'";	
				$conex->ExecSQL($sql2,__LINE__,true);
				$modif = $conex->fmodif;
			}
		}
			else{ if ($fila_ayu_est > 0){//NO TIENE CUENTA Y NO TIENE BENEFICIO DE AYUDANTIA

		///////////////////////////////////////////////////////////////////////////
		////// rutina para insertar la informacion en la TABLA AYU_CUENTA//////////
		///////////////////////////////////////////////////////////////////////////
		$sqlent2  = "INSERT INTO AYU_CUENTA (TIPO_CTA, NRO_CTA) VALUES ('$tipo_cta', '$nro_cta') ";
		$conex->ExecSQL($sqlent2,__LINE__,true);
		$modif = $conex->fmodif;

				}

						}
		//////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del Nombre del pais de la tabla PAISES//
		//////////////////////////////////////////////////////////////////////
		$sqlP = "select pai_nombre from paises where codigo = $p_nac_e";
		$conex->ExecSQL($sqlP,__LINE__,true);
		$resultadoP = $conex->result;
		$p_nac_e = $resultadoP[0][0];		

		if ($p_nac_e == 'Venezuela'){
		////////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del Nombre de la ciudad de la tabla CIUDADES//
		////////////////////////////////////////////////////////////////////////////
		$sqlC = "select cd_nombre from ciudades where codigo = $l_nac_e";
		$conex->ExecSQL($sqlC,__LINE__,true);
		$resultadoC = $conex->result;
		$l_nac_e = $resultadoC[0][0];		
		
		//////////////////////////////////////////////////////////////////////////
		//rutina para extraer la info del Nombre del estado  de la tabla ESTADOS//
		//////////////////////////////////////////////////////////////////////////
		$sqlE = "select edo_nombre from estados where codigo = $estado_nac";
		$conex->ExecSQL($sqlE,__LINE__,true);
		$resultadoE = $conex->result;
		$estado_nac = $resultadoE[0][0];
		}//fin if ($p_nac_e == 'Venezuela')
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE DATOS PERSONALES, ACADEMICOS Y SOCIOECONOMICOS</title>

<script languaje="javascript">
function imprimir(){
	var ocul;
	//alert('Recuerde entregar dos (2) copias firmadas de esta acta en el departamento.');
	botones=document.getElementById("oculto");
	botones.style.visibility='hidden';
	//alert('EL botòn "Imprimir" se activará nuevamente en 5 segundos.');
	window.print();
	setTimeout("botones.style.visibility='visible'",2000);
}
</script>

</head>
<body>
       
<table border="0" align="center" style="font-family:arial;width:900px;color:navy;font-weight:bold;">
	<tr>
        <td  rowspan="5" align="center"> 
			<img border="0" src="/img/logo_unexpo_azul.png" 
		     width="80" height="60">
        </td>
        <td align="center">
			Universidad Nacional Experimental Polit&eacute;cnica
        </td>
    </tr>
        
    <tr>  
        <td align="center">
			<?php echo utf8_encode("Antonio Jos&eacute; de Sucre") ?>
        </td>
  	</tr>
    
    <tr>  
        <td align="center">
			Vicerrectorado Puerto Ordaz
        </td>
  	</tr>
	<tr>   
        <td align="center">
			<?php echo $nombreDependencia;?>
        </td>
  	</tr>    
   	<tr>   
        <td align="center">
			Reporte de Datos Personales, Acad&eacute;micos e Informaci&oacute;n Socioecon&oacute;mica
        </td>
  	</tr>
</table>

<table border="1" align="center" style="font-family:arial;width:908px;border-collapse:collapse;">
<tr>
    <td style="padding-left:5px;padding-top:5px;padding-bottom:5px;"><font color= NAVY><B>IDENTIFICACION DEL ESTUDIANTE</B></font>
    </td>
</tr>
</table>

<table border="1" align="center" style="font-family:arial;width:900px;">
<tr><td>
<table border="0" align="left" style="font-family:arial;width:900px;">
<tr>
    <td> 
		<font color= NAVY><B> C&eacute;dula: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$nac_e"; ?>&nbsp;-&nbsp;
		<?php echo "$ci_e"; ?></span>
    </td>

    <td>
		<font color= NAVY><B> Expediente: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$exp_e"; ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Primer Apellido: </font></B><br/>
		<span style="font-size:13px;padding-left:5px;"> 
		 <?php echo utf8_encode("$apellidos"); ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Primer Nombre: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;"> 
		<?php echo utf8_encode("$nombres"); ?></span>
    </td>
    
    <td>
		<font color= NAVY> <B>Fecha de Nacimiento: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;"> 
		<?php echo implode('/',array_reverse(explode('-',$f_nac_e))) ?></span>
    </td>
    
</tr>

<tr>

	<td>
		<font color= NAVY><B> Sexo: </font></B><br/>
		<span style="font-size:13px;padding-left:5px;"> 

		<?php 
			switch ($sexo){
				case 0:
					echo "F";
					break;	
				case 1:
					echo "M";
					break;	
			}
		?>
		</span>
    </td>
        
	<td>
		<font color= NAVY><B> Pa&iacute;s de Nacimiento:</B></font><br/>
		 <span style="font-size:13px;padding-left:5px;"> 
		<?php echo utf8_encode(strtoupper("$p_nac_e")); ?></span>
    </td>
    <td>
		<font color= NAVY><B> Estado de Nacimiento: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo utf8_encode(strtoupper("$estado_nac")); ?></span> 
    </td>

     <td>
		<font color= NAVY><B> Ciudad de Nacimiento: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo utf8_encode(strtoupper("$l_nac_e")); ?></span> 
    </td>

    <td>
		<font color= NAVY><B> Etnia Ind&iacute;gena:</B></font> <br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo "$etnia_indigena"; ?></span>
    </td>
</tr>

<tr>
    <td>
		<font color= NAVY><B> Estado Civ&iacute;l: </B></font><br />
		<span style="font-size:13px;padding-left:5px;">
		<?php 
			switch ($edo_c_e){
				case 1:
					echo "SOLTERO(A)";
					break;
				case 2:
					echo "CASADO(A)";
					break;
				case 3:
					echo "CONCUBINO(A)";
					break;
				case 4:
					echo "VIUDO(A)";
					break;
				case 5:
					echo "DIVORCIADO(A)";
					break;		
			}
		?>
		</span>
    </td>   

</tr>

<tr>
    <td colspan="5">
		<font color="#FF3300"> <B>Correo Electr&oacute;nico Estudiantil: </font>&nbsp;
		<?php echo "$correo1"; ?></B>&nbsp;&nbsp;
		<font color="#FF3300"> <B>Clave: </font>&nbsp;
		<?php echo "$clave"; ?></B>
    </td>
</tr>
</table>
</td></tr>
</table>

<table border="1" align="center" style="font-family:arial;width:908px;border-collapse:collapse;">
<tr>
	<td style="padding-left:5px;padding-top:5px;padding-bottom:5px;">
		<font color=NAVY><B>DIRECCION DE HABITACION </B></font>
     </td>
</tr>
</table>

<table border="1" align="center" style="font-family:arial;width:900px;">
<tr><td>
<table border="0" align="left" style="font-family:arial;width:900px;">
<tr>
	<td>
		<font color= NAVY> <font-family:Arial;><B>Direcci&oacute;n Permanente:</B></font></font>	
    </td>
	
	<td>
		<font color= NAVY><B> Ciudad: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo "$ciudad"; ?></span> 
	</td>

    <td>
		<font color= NAVY><B> Aven&iacute;da/Calle: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$avenida"; ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Barrio/Urb: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo "$urbanizacion"; ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Manzana Nº: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$manzana"; ?></span>
    </td> 
    
</tr>
<tr>
    <td>
		<font color= NAVY><B>Edif&iacute;cio/Torre Nº:</B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$edificio"; ?></span>
    </td>
	
    <td>
		<font color= NAVY><B> Casa/Apto Nº: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$nrocasa"; ?></span>	
    </td>
    
    <td>
		<font color= NAVY><B> Tlf Hab: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$telfp_e"; ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Tlf cel: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$celcod"; ?>&nbsp;-&nbsp;
		<?php echo "$telf2"; ?>   	</span>
   	</td>
    
    <td>
		<font color= NAVY><B> Tlf Auxiliar:</B> </font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$telefono3"; ?></span>
	</td>    
    
</tr>   
</table>
</td></tr>
</table>

<table border="1" align="center" style="font-family:arial;width:908px;border-collapse:collapse;">
<tr>
	<td style="padding-left:5px;padding-top:5px;padding-bottom:5px;">
		<font color= NAVY><B>DATOS ACADEMICOS ACTUALES </B></font>
    </td>
</tr>
</table> 
<table border="1" align="center" style="font-family:arial;width:900px;">
<tr><td>
<table border="0" align="left" style="font-family:arial;width:900px;">
<tr>
	<td>
		<font color= NAVY><B> Fecha de Inscripci&oacute;n:</B> </font>
		<span style="font-size:15px;padding-left:5px;">
	   <?php echo implode('/',array_reverse(explode('-',$fec_ins))) ?></span>
    </td>
  
    <td>
		<font color= NAVY><B> Condici&oacute;n de Ingreso: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo "$ingreso"; ?></span>
    </td>
    
    <td>
		<font color= NAVY><B> Lapso de Ingreso: </B></font>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$lapso_in"; ?></span>
    </td>
    
    <td colspan="2">
		<font color= NAVY><B> Especialidad: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php echo "$carrera"; ?></span>
    </td>

</tr>

<tr>
	<td>
		<font color= NAVY><B> Pensum: </B></font><br/>
		<span style="font-size:14px;padding-left:5px;">
		<?php echo "$descripcion"; ?></span>
    </td>
    
	<td>
		<font color= NAVY><B> Estatus: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php 
			switch ($estatus_e){

				case 1:
					echo "ACTIVO";
					break;	
				case 2:
					echo "INACTIVO";
					break;	
			}
		?></span>
    </td>
	
    <td>
		<font color= NAVY><B> Semestre: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$semestre"; ?></span>
    </td>
	
    <td>
		<font color= NAVY><B> Cr&eacute;ditos Aprobados: </B></font>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$u_cred_aprob_t"; ?></span>
    </td>
	
    <td>
		<font color= NAVY><B> Cr&eacute;ditos Aprobados para el Pensum: </B></font>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$u_cred_pen_t"; ?></span>
    </td>
	    
</tr>
<tr>
	<td>
		<!-- <font color= NAVY> <B>Cr&eacute;ditos Inscritos:</B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$u_cred_insc_t"; ?></span> -->
    </td>
    
	<td>
		<font color= NAVY><B> Cr&eacute;ditos Aprobados por Equivalencia:</B> </font>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$c_aprob_equiv_t"; ?></span>
    </td>
	
    <td>
		<font color= NAVY> <B>Indice Acad&eacute;mico: </B></font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$ind_acad_t"; ?></span>
    </td>
	
    <td>
		<font color= NAVY><B> Tesista: </B></font><br/>
		<span style="font-size:13px;padding-left:5px;">
		<?php 
			switch ($tesista){

				case 0:
					echo "NO";
					break;	
				case 1:
					echo "SI";
					break;	
			}
		?>
		</span>
    </td>
	
    <td>
		<font color= NAVY><B> Cr&eacute;ditos para el Indice:</B> </font><br/>
		<span style="font-size:15px;padding-left:5px;">
		<?php echo "$u_c_p_indic_t"; ?></span>
    </td>
</tr>
</table>
</td></tr>
</table>
<table border="0" align="center" style="font-family:arial;width:900px;">
<tr>
	<td align="center"><br/>
		<div align="center" id="oculto" style="text-align:center;"><input type="button" value="Imprimir" onClick="imprimir();">&nbsp;&nbsp;<input type="button" value="Cerrar" onClick="window.close();">
		
		<form action="envio_regulares2.php" method="post">
		
		<input type="hidden" name="expediente"    value="<?php echo $exp_e; ?>" />
		<input type="hidden" name="fila_dat_soci" value="<?php echo $fila_dat_soci; ?>" />
		<input type="hidden" name="filadobesoci"  value="<?php echo $filadobesoci; ?>" />
		<input type="hidden" name="fila_dace"     value="<?php echo $fila_dace; ?>" />
		<input type="hidden" name="fila_ayu_est"    value="<?php echo $fila_ayu_est; ?>" />	
		<input type="hidden" name="resi"   	      value="<?php echo $residencia; ?>" />
		<input type="hidden" name="tipocuenta"    value="<?php echo $tipo_cta; ?>" />
		<input type="hidden" name="nrocuenta"    value="<?php echo $nro_cta; ?>" />
		<input type="hidden" name="beneficio"    value="<?php echo $beneficio; ?>" />
		<input type="hidden" name="nrohoras"    value="<?php echo $horas; ?>" />
		<input type="hidden" name="lapsoBanco"    value="<?php echo $lapsoBanco; ?>" />
				
		<input type="hidden" name="nac"        	value="<?php echo $nac_e; ?>" />
		<input type="hidden" name="cedula"        value="<?php echo $ci_e; ?>" />
		<input type="hidden" name="sexo"        value="<?php echo $sexo; ?>" />
		<input type="hidden" name="apellidos"        value="<?php echo $apellidos; ?>" />
		<input type="hidden" name="nombres"        value="<?php echo $nombres; ?>" />
		<input type="hidden" name="f_nac_e"        value="<?php echo $f_nac_e; ?>" />
		<input type="hidden" name="p_nac_e"        value="<?php echo $p_nac_e; ?>" />
		<input type="hidden" name="p_nac_e2"        value="<?php echo $p_nac_e2; ?>" />
		
		<input type="hidden" name="estado_nac"		value="<?php echo utf8_encode($estado_nac); ?>" />
		<input type="hidden" name="estado_nac2"		value="<?php echo $estado_nac2; ?>" />

		<input type="hidden" name="l_nac_e"        value="<?php echo utf8_encode($l_nac_e); ?>" />
		<input type="hidden" name="l_nac_e2"        value="<?php echo utf8_encode($l_nac_e2); ?>" />
		
		<input type="hidden" name="etnia_indigena"        value="<?php echo $etnia_indigena; ?>" />
		<input type="hidden" name="correo1"        value="<?php echo $correo1; ?>" />
		<input type="hidden" name="clave"        value="<?php echo $clave; ?>" />
		<input type="hidden" name="a"          value="<?php echo $an; ?>" />
		<input type="hidden" name="m"          value="<?php echo $me; ?>" />
		<input type="hidden" name="d"          value="<?php echo $di; ?>" />
		<input type="hidden" name="edo_c_e"     value="<?php echo $edo_c_e; ?>" />
		<input type="hidden" name="ciudad"     value="<?php echo $ciudad; ?>" />
		<input type="hidden" name="avenida"     value="<?php echo $avenida; ?>" />
		<input type="hidden" name="urbanizacion"     value="<?php echo $urbanizacion; ?>" />
		<input type="hidden" name="manzana"     value="<?php echo $manzana; ?>" />
		<input type="hidden" name="edificio"     value="<?php echo $edificio; ?>" />
		<input type="hidden" name="nrocasa"     value="<?php echo $nrocasa; ?>" />
		<input type="hidden" name="telfp_e"     value="<?php echo $telfp_e; ?>" />
		<input type="hidden" name="celcod"     value="<?php echo $celcod; ?>" />
		<input type="hidden" name="telf2"        value="<?php echo $telf2; ?>" />
		<input type="hidden" name="telefono3"        value="<?php echo $telefono3; ?>" />
		
		<!----------------DATOS ACADEMICOS ACTUALES------------->
		<input type="hidden" name="fec_ins"        value="<?php echo $fec_ins; ?>" />
		<input type="hidden" name="ingreso"        value="<?php echo $ingreso; ?>" />
		<input type="hidden" name="lapso_in"        value="<?php echo $lapso_in; ?>" />
		<input type="hidden" name="carrera"        value="<?php echo $carrera; ?>" />
		<input type="hidden" name="descripcion"        value="<?php echo $descripcion; ?>" />
		<input type="hidden" name="estatus_e"        value="<?php echo $estatus_e; ?>" />
		<input type="hidden" name="semestre"        value="<?php echo $semestre; ?>" />
		<input type="hidden" name="u_cred_aprob_t"        value="<?php echo $u_cred_aprob_t; ?>" />
		<input type="hidden" name="u_cred_pen_t"        value="<?php echo $u_cred_pen_t; ?>" />
		<input type="hidden" name="u_cred_insc_t"        value="<?php echo $u_cred_insc_t; ?>" />
		<input type="hidden" name="c_aprob_equiv_t"        value="<?php echo $c_aprob_equiv_t; ?>" />
		<input type="hidden" name="ind_acad_t"        value="<?php echo $ind_acad_t; ?>" />
		<input type="hidden" name="tesista"        value="<?php echo $tesista; ?>" />
		<input type="hidden" name="u_c_p_indic_t"        value="<?php echo $u_c_p_indic_t; ?>" />
			
		<input type="hidden" name="padre"      value="<?php echo $pa; ?>" />
		<input type="hidden" name="madre"      value="<?php echo $ma; ?>" />
		<input type="hidden" name="hnos"     value="<?php echo $hn; ?>" />
		<input type="hidden" name="espo"      value="<?php echo $es; ?>" />
		<input type="hidden" name="hijos"      value="<?php echo $hi; ?>" />
		
		<input type="hidden" name="nintegrantes"   value="<?php echo $nintegrantes; ?>" />
		<input type="hidden" name="parent"   value="<?php echo $parent_hog; ?>" />
		<input type="hidden" name="lres"     value="<?php echo $l_resid; ?>" />
		<input type="hidden" name="turno"    value="<?php echo $turno_trabajo; ?>">
		<input type="hidden" name="instr_p"  value="<?php echo $instr_padre; ?>" />
		<input type="hidden" name="ocup_p"   value="<?php echo $ocup_padre; ?>" />
		<input type="hidden" name="instr_m"  value="<?php echo $instr_madre; ?>" />
		<input type="hidden" name="ocup_m"   value="<?php echo $ocup_madre; ?>" />
		<input type="hidden" name="tenencia" value="<?php echo $tipo_vivienda; ?>" />
		<input type="hidden" name="monto_alq" value="<?php echo $monto_alq; ?>" />
		
		<input type="hidden" name="st_social" value="<?php echo $estrato_social; ?>" />
		<input type="hidden" name="ing_f"     value="<?php echo $ingreso_f; ?>" />
		<input type="hidden" name="residen"     value="<?php echo $alq_r; ?>" />
		<input type="hidden" name="tvi"      value="<?php echo $tviv; ?>" />
		<input type="hidden" name="ubicacion"      value="<?php echo $ubic; ?>" />
		<input type="hidden" name="ag"        value="<?php echo $ag; ?>" />
		<input type="hidden" name="elec"     value="<?php echo $ele; ?>" />
		<input type="hidden" name="telefo"   value="<?php echo $tlf; ?>" />
		<input type="hidden" name="intern"   value="<?php echo $intrnet; ?>" />
		<input type="hidden" name="tvca"     value="<?php echo $tvkabl; ?>" />
		<input type="hidden" name="depend"     value="<?php echo $depend; ?>" />
		<input type="hidden" name="mesada"     value="<?php echo $mesada; ?>" />	
		
		<input type="hidden" name="trabajo"     value="<?php echo $trab; ?>">
		<input type="hidden" name="b"        value="<?php echo $bec; ?>" />
		<input type="hidden" name="organismo"        value="<?php echo $organismo; ?>" />	
		<input type="hidden" name="mont"        value="<?php echo $mont; ?>" />	
		
		<input type="hidden" name="ca"       value="<?php echo $cancr; ?>" />
		<input type="hidden" name="respi"       value="<?php echo $resp; ?>" />
		<input type="hidden" name="cere"     value="<?php echo $cerb; ?>" />
		<input type="hidden" name="sida"       value="<?php echo $sid; ?>" />
		<input type="hidden" name="diab"       value="<?php echo $diabe; ?>" />
		<input type="hidden" name="cardia"     value="<?php echo $cardiac; ?>" />
		<input type="hidden" name="alerg"      value="<?php echo $alergi; ?>" />
		<input type="hidden" name="renal"      value="<?php echo $rnal; ?>" />
		<input type="hidden" name="hepat"      value="<?php echo $hepati; ?>" />
		<input type="hidden" name="trsex"       value="<?php echo $transex; ?>" />
		<input type="hidden" name="otra"        value="<?php echo $otr; ?>" />
		<input type="hidden" name="cua"        value="<?php echo $cua; ?>" />
	
		<input type="hidden" name="padc_familia"     value="<?php echo $padc_familia; ?>" />
		<input type="hidden" name="quien"     value="<?php echo $quien; ?>" />
		<input type="hidden" name="cual"     value="<?php echo $cual; ?>" />
		
		<!-- <input type="hidden" name="dis"      value="<?php echo $discap; ?>" /> -->
		<input type="hidden" name="int_quir"    value="<?php echo $int_quirur; ?>">
		<input type="hidden" name="consult"     value="<?php echo $consulta; ?>"/>
		<input type="hidden" name="especialista"     value="<?php echo $especialista; ?>"/>
		
		<input type="hidden" name="prepa"       value="<?php echo $prep; ?>" />
		<input type="hidden" name="alumn"       value="<?php echo $alum; ?>" />
		<input type="hidden" name="lentes"      value="<?php echo $lents; ?>" />
		<input type="hidden" name="odont"       value="<?php echo $odon; ?>" />
		<input type="hidden" name="prob_sal"    value="<?php echo $prob_salud; ?>" />
		<input type="hidden" name="med_gen"      value="<?php echo $med_gene; ?>" />
		<input type="hidden" name="ginec"      value="<?php echo $gineco; ?>" />
		<input type="hidden" name="odonto"      value="<?php echo $odontolo; ?>" />
		<input type="hidden" name="comedor"      value="<?php echo $comed; ?>" />
		<input type="hidden" name="transp"    value="<?php echo $transport; ?>" />
		<input type="hidden" name="ruta"    value="<?php echo $ruta; ?>" />

		<input type="hidden" name="teatro"      value="<?php echo $teat; ?>" />
		<input type="hidden" name="excur"       value="<?php echo $excu; ?>" />
		<input type="hidden" name="danza"      value="<?php echo $danz; ?>" />
		<input type="hidden" name="centroe"       value="<?php echo $cente; ?>" />
		<input type="hidden" name="musica"     value="<?php echo $musik; ?>" />
		<input type="hidden" name="dep"     value="<?php echo $deport; ?>" />
		<input type="hidden" name="particip"     value="<?php echo $particip; ?>" />
		<input type="hidden" name="act"     value="<?php echo $acti; ?>" />
		<input type="hidden" name="fini"     value="<?php echo $finic; ?>" />
		<input type="hidden" name="ffin"     value="<?php echo $ffinal; ?>" />
			
		<!--<input type="hidden" name="part"     value="<?php// echo $participa; ?>" />-->
		<input type="hidden" name="tipo_cta"    value="<?php echo $tipo_cta; ?>" />
		<input type="hidden" name="nro_cta"     value="<?php echo $nro_cta; ?>" />
		
				
		<input type="hidden" name="lapso"     value="<?php echo $lapso; ?>" />
		<input type="hidden" name="beneficioactual"     value="<?php echo $nombre_ayu; ?>" />
		<input type="hidden" name="nrohorasactual"     value="<?php echo $nrohorasactual; ?>" />
		<input type="hidden" name="dependenciactu"     value="<?php echo $dependenciactu; ?>" />
		<input type="hidden" name="uc_actuales"     value="<?php echo $uc_actuales; ?>" />
		
		<input type="hidden" name="LapsoAnterior"     value="<?php echo $LapsoAnterior; ?>" />
		<input type="hidden" name="beneficioanterior"     value="<?php echo $nombre_ayuBA; ?>" />
		<input type="hidden" name="nrohorasanterior"     value="<?php echo $nro_horaBA; ?>" />
		<input type="hidden" name="dependenciante"     value="<?php echo $dependenciaAnte; ?>" />
		<input type="hidden" name="uc_anterior"     value="<?php echo $uc_anterior; ?>" />
		<input type="hidden" name="mostrar"     value="<?php echo $mostrar; ?>" />

		<input type="hidden" name="afro" value="<?php echo $afro; ?>" />
		<input type="hidden" name="disca" value="<?php echo $disca; ?>" />
		<input type="hidden" name="carnet_disca" value="<?php echo $carnet_disca; ?>" />
		<input type="hidden" name="nomb_plantel" value="<?php echo $nomb_plantel; ?>" />
		<input type="hidden" name="tipo_plantel" value="<?php echo $tipo_plantel; ?>" />
		<input type="hidden" name="costo_mensual" value="<?php echo $costo_mensual; ?>" />
		<input type="hidden" name="pais_plantel" value="<?php echo $pais_plantel; ?>" />
		<input type="hidden" name="edo_plantel" value="<?php echo $edo_plantel; ?>" />
		<input type="hidden" name="cd_plantel" value="<?php echo $cd_plantel; ?>" />
		<input type="hidden" name="mpio_plantel" value="<?php echo utf8_encode($mpio_plantel); ?>" />
		<input type="hidden" name="anio_egre_cole" value="<?php echo $anio_egre_cole; ?>" />
		<input type="hidden" name="sistema_estudio" value="<?php echo $sistema_estudio; ?>" />
		<input type="hidden" name="turno_estudio" value="<?php echo $turno_estudio; ?>" />
		<input type="hidden" name="titulo_b" value="<?php echo $titulo_b; ?>" />
		<input type="hidden" name="opcion_cnu" value="<?php echo $opcion_cnu; ?>" />
		<input type="hidden" name="rusnie" value="<?php echo $rusnie; ?>" />
		<input type="hidden" name="promBachill" value="<?php echo $promBachill; ?>" />

		<input type="submit" value="Ver Planilla URDBE" />
		</form>
		
		</div>
    </td>
</tr>
</table>
</body>
</html>

