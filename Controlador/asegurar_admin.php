<?php 
	session_start(); 
	header('Access-Control-Allow-Origin: *');
		if (@$_SESSION['nombre']=="") {
			$_SESSION['nombre']="Administrador";
		}
	if (@$_SESSION['login']==true) {
		echo "
				<section name='formularios_administrativos' class='content-1 extended dark left' id='msg-box4-9' style='background-image: none; background-color: rgb(226, 80, 65);'>
    
				    <div class='container'>
				        <div class='row'>
				            <div class='col-sm-6 img'>
				                <img alt='' src='assets/images/Londres.PNG' class='img-thumbnail'>
				            </div>

				            <div class='col-sm-6'>
				                <div>
				                    <h2>ACTA DE COMITÉ DE SEGURIDAD DEL PACIENTE- PROTOCOLO DE LONDRES</h2>
				                    
				                </div>
				                <div class='group'><a class='btn btn-lg btn-default' href='http://casosadversos.webcindario.com/Vista/Londres/'>IR AL FORMUALRIO</a></div>
				            </div>

				            
				        </div>
				    </div>
				</section>

				<section class='content-1 extended dark left' id='msg-box4-10' style='background-image: none;   background-color: rgb(39, 170, 224);'>
				    
				    <div class='container'>
				        <div class='row'>
				            <div class='col-sm-6 img'>
				                <img alt='' src='assets/images/Londres2.PNG' class='img-thumbnail'>
				            </div>

				            <div class='col-sm-6'>
				                <div>
				                    <h2>ACTA DE COMITÉ DE SEGURIDAD DEL PACIENTE-PROTOCOLO DE LONDRES</h2>
				                    <div><p>Estrategia de mejoramiento - intervencion del riesgo&nbsp;</p></div>
				                </div>
				                <div class='group'><a class='btn btn-lg btn-default' href='http://casosadversos.webcindario.com/Vista/Londres/Accion%20de%20Mejora'>IR AL FORMULARIO</a></div>
				            </div>

				            
				        </div>
				    </div>
				</section>";
	}
 ?>