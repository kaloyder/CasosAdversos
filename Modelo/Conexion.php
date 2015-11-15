<?php 
		header('Content-Type: text/html; charset=ISO-8859-1');
	
			
	
	class Conexion
	{
		var $link=null;
		
	 	function __construct()
	 	{
	 		
	 	}
		public function conectar()
		{
			//$this->link = mysql_connect('mysql.webcindario.com', 'casosadversos', 'o6wdp0@~W6If') or die ('Error de conexion');
			//smysql_select_db('casosadversos') or die ('Error de Seleccion');
			$this->link = mysql_connect('localhost', 'root', '') or die ('Error de conexion');
			mysql_select_db('mydb') or die ('Error de Seleccion');
			
			
			
		}

		public function Desconectar()
		{
			mysql_close($this->link);
		
		}
		public function obtener_ultimo_id()
		{
			$id=mysql_insert_id();
			return $id;
		}
		//Inicio de Metodo Agregar_administrador
		public function Agregar_administrador($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "insert into administrador (nombre,usuario,password,n_identificacion) VALUES ('".$Objeto_deserializado->Get_nombre()."','".$Objeto_deserializado->Get_usuario()."','".$Objeto_deserializado->Get_password()."','".$Objeto_deserializado->Get_n_identificacion()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_administrador.php !!!!!!!!!!!!!!!!!!

		public function Cargar_Regimen()
		{
			$query = 'SELECT regimen FROM regimen_afiliacion order by regimen asc';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado= "";

			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option >";
			    
			        $resultado.=$line['regimen']."";
			    
			    $resultado.="</option>";
			}
			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}
			
			// Liberar resultados
			mysql_free_result($result);
		}
		public function Cargar_Tipo_Identificacion()
		{
				$query = 'SELECT tipo FROM tipo_identificacion order by tipo asc';
				$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

				// Imprimir los resultados en HTML
				$resultado= "";

				while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				   $resultado.="<option >";
				    
				        $resultado.=$line['tipo']."";
				    
				    $resultado.="</option>";
				}
				if($resultado==""){
					return "ERROR: ".$result;

				}else{
					return $resultado;
				}
				
				// Liberar resultados
				mysql_free_result($result);
		}
		public function Cargar_Servicio_Ocurrencia()
		{
			$query = 'SELECT servicio FROM servicio_ocurrencia order by servicio asc';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado= "";

			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option >";
			    
			        $resultado.=$line['servicio']."";
			    
			    $resultado.="</option>";
			}
		if($resultado==""){
			return "ERROR: ".$result;

		}else{
			return $resultado;
		}
		
		// Liberar resultados
		mysql_free_result($result);
		}
		public function Cargar_Municipios($id)
		{
			$query = 'SELECT * FROM municipio WHERE departamento_iddepartamento="'.$id.'" order by nombreMunicipio asc';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado= "";

			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option >";
			    
			        $resultado.=$line['nombreMunicipio']."";
			    
			    $resultado.="</option>";
			}
	
		if($resultado==""){
			return "ERROR: ".$result;

		}else{
			return $resultado;
		}
		// Liberar resultados
		mysql_free_result($result);

		}


		//Inicio de Metodo Agregar_paciente
		public function Agregar_paciente($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into paciente (idpaciente,nombre,edad,sexo,eps) VALUES ('".$Objeto_deserializado->Get_idpaciente()."','".$Objeto_deserializado->Get_nombre()."','".$Objeto_deserializado->Get_edad()."','".$Objeto_deserializado->Get_sexo()."','".$Objeto_deserializado->Get_eps()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_paciente.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_paciente
		public function Seleccionar_paciente($id_user) 
		{ 
		$query= "SELECT * From paciente Where idpaciente=$id_user";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		// Final del metodo Select_paciente.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Agregar_friea
		public function Agregar_friea($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into friea (fecha_suceso,hora_suceso,fecha_reporte,hora_reporte,servicio_ocurrencia,evento_adverso,descripcion_evento,tipo_lesion,funcionario_reporta,clasificacion_suceso,paciente_idpaciente) VALUES ('".$Objeto_deserializado->Get_fecha_suceso()."','".$Objeto_deserializado->Get_hora_suceso()."','".$Objeto_deserializado->Get_fecha_reporte()."','".$Objeto_deserializado->Get_hora_reporte()."','".$Objeto_deserializado->Get_servicio_ocurrencia()."','".$Objeto_deserializado->Get_evento_adverso()."','".$Objeto_deserializado->Get_descripcion_evento()."','".$Objeto_deserializado->Get_tipo_lesion()."','".$Objeto_deserializado->Get_funcionario_reporta()."','".$Objeto_deserializado->Get_clasificacion_suceso()."','".$Objeto_deserializado->Get_paciente_idpaciente()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_friea.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_friea
		public function Seleccionar_friea($id) 
		{ 
		$query= "SELECT * From friea Where idFriea=$id";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		public function Seleccionar_friea_by_userid($id_user) 
		{ 
		$query= "SELECT * From friea Where paciente_idpaciente=$id_user";
		$result = mysql_query($query); 
		$evento="";
				while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$evento=$line['evento_adverso'];
				}
			
		return $evento; 
		} 
		// Final del metodo Select_friea.php !!!!!!!!!!!!!!!!!!
		public function ultimo_id ()
		{
			# code...
		}
		public function Cargar_Genero()
		{
			$query = 'SELECT genero FROM genero';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado="";
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option value='".$line['genero']."'>".$line['genero'];
			    
			     $resultado.="</option>";
			}


			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}

			// Liberar resultados
			mysql_free_result($result);
		}
		public function Cargar_Medicamentos()
		{
			


			$query = 'SELECT nombre FROM lista_medicamentos order by nombre ';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado="";
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option value='".$line['nombre']."'></option>";
			}
			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}

			// Liberar resultados
			mysql_free_result($result);
		}
		public function Cargar_EPS()
		{
			


			$query = 'SELECT nombre FROM lista_eps order by nombre ';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado="";
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option value='".$line['nombre']."'>".$line['nombre']."</option>";
			}
			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}

			// Liberar resultados
			mysql_free_result($result);
		}

		public function Cargar_IPS()
		{
			


			$query = 'SELECT nombre FROM lista_ips order by nombre ';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado="";
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option value='".$line['nombre']."'>".$line['nombre']."</option>";
			}
			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}

			// Liberar resultados
			mysql_free_result($result);
		}
		public function Cargar_Eventos()
		{
			


			$query = 'SELECT evento FROM evento_adverso order by evento asc';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

			// Imprimir los resultados en HTML
			$resultado="";
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.="<option value='".$line['evento']."'>".$line['evento'];
			    
			     $resultado.="</option>";
			}


			if($resultado==""){
				return "ERROR: ".$result;

			}else{
				return $resultado;
			}

			// Liberar resultados
			mysql_free_result($result);
		}
		//Inicio de Metodo Agregar_foram
		public function Agregar_foram($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into foram (fecha_notificacion,departamento,municipio,institucion,servicio,codigo_habilitacion,paciente_idpaciente,informacion_paciente_idinformacion_paciente,descripcion_reaccion_iddescripcion_reaccion,manejo_evento_desenlace_idmanejo_evento_desenlace,notificante_primaria_idnotificante_primaria) VALUES ('".$Objeto_deserializado->Get_fecha_notificacion()."','".$Objeto_deserializado->Get_departamento()."','".$Objeto_deserializado->Get_municipio()."','".$Objeto_deserializado->Get_institucion()."','".$Objeto_deserializado->Get_servicio()."','".$Objeto_deserializado->Get_codigo_habilitacion()."','".$Objeto_deserializado->Get_paciente_idpaciente()."','".$Objeto_deserializado->Get_informacion_paciente_idinformacion_paciente()."','".$Objeto_deserializado->Get_descripcion_reaccion_iddescripcion_reaccion()."','".$Objeto_deserializado->Get_manejo_evento_desenlace_idmanejo_evento_desenlace()."','".$Objeto_deserializado->Get_notificante_primaria_idnotificante_primaria()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		return $result;
		} 
		// Final del metodo Agregar_foram.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_foram
		public function Seleccionar_foram($Key,$Valor,$Tabla) 
		{ 
		$query= "SELECT * From $Tabla Where $Key=$Valor";
		$result = mysql_query($query); 
		$obj =serialize(mysql_fetch_object($result)); 
		return $obj; 
		} 
		// Final del metodo Select_foram.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Agregar_descripcion_reaccion
		public function Agregar_descripcion_reaccion($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into descripcion_reaccion (fecha_reaccion,descripcion_reaccion,evolucion_reaccion,severidad_reaccion,fecha_muerte,otra_severidad) VALUES ('".$Objeto_deserializado->Get_fecha_reaccion()."','".$Objeto_deserializado->Get_descripcion_reaccion()."','".$Objeto_deserializado->Get_evolucion_reaccion()."','".$Objeto_deserializado->Get_severidad_reaccion()."','".$Objeto_deserializado->Get_fecha_muerte()."','".$Objeto_deserializado->Get_otra_severidad()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_descripcion_reaccion.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_descripcion_reaccion
		public function Seleccionar_descripcion_reaccion($id) 
		{ 
		$query= "SELECT * From descripcion_reaccion Where iddescripcion_reaccion=$id";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		// Final del metodo Select_descripcion_reaccion.php !!!!!!!!!!!!!!!!!!

		//Inicio de Metodo Agregar_informacion_paciente
		public function Agregar_informacion_paciente($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into informacion_paciente (regimen_afiliacion,eps,etnia,iniciales,fecha_nacimiento,identificacion,n_identificacion,sexo,peso,estatura,diagnostico_principal) VALUES ('".$Objeto_deserializado->Get_regimen_afiliacion()."','".$Objeto_deserializado->Get_eps()."','".$Objeto_deserializado->Get_etnia()."','".$Objeto_deserializado->Get_iniciales()."','".$Objeto_deserializado->Get_fecha_nacimiento()."','".$Objeto_deserializado->Get_identificacion()."','".$Objeto_deserializado->Get_n_identificacion()."','".$Objeto_deserializado->Get_sexo()."','".$Objeto_deserializado->Get_peso()."','".$Objeto_deserializado->Get_estatura()."','".$Objeto_deserializado->Get_diagnostico_principal()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_informacion_paciente.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_informacion_paciente
		public function Seleccionar_informacion_paciente($id) 
		{ 
		$query= "SELECT * From informacion_paciente Where idinformacion_paciente=$id";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		public function Cargar_Departamentos()
		{
			
			$query = 'SELECT * FROM departamento order by nombre asc';
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
			$resultado="";	
			// Imprimir los resultados en HTML
			$resultado.= "<option>-Desplegar-</option>";
		
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			   $resultado.=  "<option>";
			       $resultado.= $line['nombre']."";
			    
			    $resultado.= "</option>";
			}
			
			return $resultado;

			// Liberar resultados
			mysql_free_result($result);
		}
		// Final del metodo Select_informacion_paciente.php !!!!!!!!!!!!!!!!!!
		public function proximo_id_foram()
		{
			$result = mysql_query("SHOW TABLE STATUS LIKE 'foram'") or die('Consulta fallida: ' . mysql_error());
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$proximo_id = $line['Auto_increment'];
			}
			
			
			if ($proximo_id=="") {
				return "Error: ".mysql_error();
			}else{
				return $proximo_id;

			}
			
			mysql_free_result($result);
		}
		//Inicio de Metodo Agregar_medicamentos
		public function Agregar_medicamentos($Objeto_Serializado) 
		{ 
			$Objeto_deserializado=unserialize($Objeto_Serializado);
			$query= "INSERT into medicamentos (sospechoso,medicamento,cantidad,unidad,frecuencia,via_administracion,velocidad_infusion,motivo_prescripcion,fecha_inicio,fecha_finalizacion,fabricante,nombre_marca,registro_sanitario,lote,fecha_vencimiento,foram_idforam) VALUES ('".$Objeto_deserializado->Get_sospechoso()."','".$Objeto_deserializado->Get_medicamento()."','".$Objeto_deserializado->Get_cantidad()."','".$Objeto_deserializado->Get_unidad()."','".$Objeto_deserializado->Get_frecuencia()."','".$Objeto_deserializado->Get_via_administracion()."','".$Objeto_deserializado->Get_velocidad_infusion()."','".$Objeto_deserializado->Get_motivo_prescripcion()."','".$Objeto_deserializado->Get_fecha_inicio()."','".$Objeto_deserializado->Get_fecha_finalizacion()."','".$Objeto_deserializado->Get_fabricante()."','".$Objeto_deserializado->Get_nombre_marca()."','".$Objeto_deserializado->Get_registro_sanitario()."','".$Objeto_deserializado->Get_lote()."','".$Objeto_deserializado->Get_fecha_vencimiento()."','".$Objeto_deserializado->Get_foram_idforam()."')"; 
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
			return $result;
		} 
		// Final del metodo Agregar_medicamentos.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_medicamentos
		public function Seleccionar_medicamentos($id_foram) 
		{ 
		$query= "SELECT * From medicamentos Where foram_idforam=$id_foram ORDER BY idmedicamentos DESC";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		// Final del metodo Select_medicamentos.php !!!!!!!!!!!!!!!!!!
		//Inicio de Metodo Agregar_notificante_primaria
		public function Agregar_notificante_primaria($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into notificante_primaria (nombre,profesion,direccion,telefono,correo) VALUES ('".$Objeto_deserializado->Get_nombre()."','".$Objeto_deserializado->Get_profesion()."','".$Objeto_deserializado->Get_direccion()."','".$Objeto_deserializado->Get_telefono()."','".$Objeto_deserializado->Get_correo()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_notificante_primaria.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_notificante_primaria
		public function Seleccionar_notificante_primaria($id) 
		{ 
		$query= "SELECT * From notificante_primaria Where idnotificante_primaria=$id";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		// Final del metodo Select_notificante_primaria.php !!!!!!!!!!!!!!!!!!
		//Inicio de Metodo Agregar_manejo_evento_desenlace
		public function Agregar_manejo_evento_desenlace($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into manejo_evento_desenlace (desaparecio_suspender,desparecio_reducir,reaparecio_readministrar,anterior_reaccion,desaparecio_tratamiento,tratamienti_farmaco) VALUES ('".$Objeto_deserializado->Get_desaparecio_suspender()."','".$Objeto_deserializado->Get_desparecio_reducir()."','".$Objeto_deserializado->Get_reaparecio_readministrar()."','".$Objeto_deserializado->Get_anterior_reaccion()."','".$Objeto_deserializado->Get_desaparecio_tratamiento()."','".$Objeto_deserializado->Get_tratamienti_farmaco()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		} 
		// Final del metodo Agregar_manejo_evento_desenlace.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_manejo_evento_desenlace
		public function Seleccionar_manejo_evento_desenlace($id) 
		{ 
		$query= "SELECT * From manejo_evento_desenlace Where idmanejo_evento_desenlace=$id";
		$result = mysql_query($query); 
	
		return $result; 
		} 
		// Final del metodo Select_manejo_evento_desenlace.php !!!!!!!!!!!!!!!!!!
		public function Consultar_Usuario($id)
		{
			$_SESSION['nombre_usuario_londres']="";
 			$_SESSION['id_usuario_londres']="";
			$existencia=false;
			$query= "SELECT * From paciente Where idpaciente=$id";
			$result = mysql_query($query); 
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			 
			      $_SESSION['nombre_usuario_londres']= $line['nombre'];
			      $_SESSION['id_usuario_londres']=$line['idpaciente'];
			    
			  	$existencia=true;
			}
			if($_SESSION['id_usuario_londres']=="null"){
				$existencia=false;
			}
			return $existencia; 
		}
			public function Consultar_Admin($id,$password)
		{
			$_SESSION['nombre']=null;
			$existencia=false;
			$query= "SELECT * From administrador Where usuario='$id' and password='$password'";
			$result = mysql_query($query); 
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$_SESSION['nombre']=$line['nombre'];
			}
			if ($_SESSION['nombre']==null) {
				$existencia=false;
			}else{
				$existencia=true;
			}
			return $existencia; 
		}

		//Inicio de Metodo Agregar_londres
		public function Agregar_londres($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into londres (paciente_idpaciente,fecha,hora_inicio,lugar,hora_fin,tipo_evento,nombre_usuario,id_usuario,nombre_ips,fecha_evento) VALUES ('".$Objeto_deserializado->Get_paciente_idpaciente()."','".$Objeto_deserializado->Get_fecha()."','".$Objeto_deserializado->Get_hora_inicio()."','".$Objeto_deserializado->Get_lugar()."','".$Objeto_deserializado->Get_hora_fin()."','".$Objeto_deserializado->Get_tipo_evento()."','".$Objeto_deserializado->Get_nombre_usuario()."','".$Objeto_deserializado->Get_id_usuario()."','".$Objeto_deserializado->Get_nombre_ips()."','".$Objeto_deserializado->Get_fecha_evento()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		return $result;
		} 
		// Final del metodo Agregar_londres.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_londres
		public function Seleccionar_londres($id) 
		{ 
		$query= "SELECT * From londres Where paciente_idpaciente=$id ORDER BY idlondres DESC LIMIT 1";
		$result = mysql_query($query); 
		
		return $result; 
		} 
		// Final del metodo Select_londres.php !!!!!!!!!!!!!!!!!!
		public function obtener_id_londres_by_user($id_user)
		{
				$query= "SELECT * From londres Where paciente_idpaciente=$id_user ORDER BY idlondres DESC LIMIT 1";
				$result = mysql_query($query); 
				$id_londres="";
				while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			 
			     $id_londres=$line['idlondres'];
			      
				}
				return $id_londres;
		}

		//Inicio de Metodo Agregar_cronologia_evento
		public function Agregar_cronologia_evento($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "insert into cronologia_evento (londres_idlondres,fecha_hora,descripcion) VALUES ('".$Objeto_deserializado->Get_londres_idlondres()."','".$Objeto_deserializado->Get_fecha_hora()."','".$Objeto_deserializado->Get_descripcion()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		return $result;
		} 
		// Final del metodo Agregar_cronologia_evento.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_cronologia_evento
		public function Seleccionar_cronologia_evento($id_londres) 
		{ 
		$query= "SELECT * From cronologia_evento Where londres_idlondres=$id_londres ORDER BY fecha_hora";
		$result = mysql_query($query); 
		 
		return $result; 
		} 
		public function Cargar_Accion_Mejora($id_londres) 
		{ 
		$query= "SELECT * From accion_mejora Where londres_idlondres=$id_londres ORDER BY idaccion_mejora DESC";
		$result = mysql_query($query); 
		 
		return $result; 
		} 
		// Final del metodo Select_cronologia_evento.php !!!!!!!!!!!!!!!!!!

		//Inicio de Metodo Agregar_accion_mejora
		public function Agregar_accion_mejora($Objeto_Serializado) 
		{ 
		$Objeto_deserializado=unserialize($Objeto_Serializado);
		$query= "INSERT into accion_mejora (londres_idlondres,accion_mejora,responsable,fecha_lim_ejecucion) VALUES ('".$Objeto_deserializado->Get_londres_idlondres()."','".$Objeto_deserializado->Get_accion_mejora()."','".$Objeto_deserializado->Get_responsable()."','".$Objeto_deserializado->Get_fecha_lim_ejecucion()."')"; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
		return $result;
		} 
		// Final del metodo Agregar_accion_mejora.php !!!!!!!!!!!!!!!!!!


		//Inicio de Metodo Seleccionar_accion_mejora
		public function Seleccionar_accion_mejora($Key,$Valor,$Tabla) 
		{ 
		$query= "SELECT * From $Tabla Where $Key=$Valor";
		$result = mysql_query($query); 
		$obj =serialize(mysql_fetch_object($result)); 
		return $obj; 
		} 
		// Final del metodo Select_accion_mejora.php !!!!!!!!!!!!!!!!!
		public function Contar_Londres()
		{
			$sql = "SELECT * FROM londres";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			return $numero;

		}
		public function Contar_Foram()
		{
			$sql = "SELECT * FROM foram";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			return $numero;

		}
		public function Contar_Friea()
		{
			$sql = "SELECT * FROM friea";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			return $numero;

		}
		public function Contar_Friea_by($servicio)
		{
			$sql = "SELECT * FROM friea WHERE servicio_ocurrencia='$servicio'";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			
			return $numero;

		}
		public function Contar_Friea_suceso($c_suceso)
		{
			$sql = "SELECT * FROM friea WHERE clasificacion_suceso='$c_suceso'";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			
			return $numero;

		}
		public function Contar_Foram_by($servicio)
		{
			$sql = "SELECT * FROM foram WHERE servicio='$servicio'";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			
			return $numero;

		}
		public function Contar_Paciente()
		{
			$sql = "SELECT * FROM paciente";  // sentencia sql
			$result = mysql_query($sql);
			$numero = mysql_num_rows($result);
			return $numero;

		}
		public function obtener_friea_min() 
		{ 
		$query= "SELECT * From friea ORDER BY fecha_reporte DESC";
		$result = mysql_query($query); 
	
		return $result; 
		} 
		public function obtener_foram_min() 
		{ 
		$query= "SELECT * From foram ORDER BY fecha_notificacion";
		$result = mysql_query($query); 
	
		return $result; 
		} 
	
	}
?>