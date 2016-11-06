<!DOCTYPE html>
<?php
?>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
		   
	<script language="javascript">
	
		function verificar(){
			var pregunta=document.getElementById("pregunta");
			var respuesta=document.getElementById("respuesta");
			var complejidad=document.getElementById("complejidad");
            var tema=document.getElementById("tema");

			//Pregunta
			if(pregunta.value==""){
				alert("Introduce una pregunta");
				return false;
			}
			//Respuesta
			if(respuesta.value==""){
				alert("Introduce una respuesta a la pregunta");
				return false;
			}
			//Complejidad
			if((complejidad.value!="1"&&complejidad.value!="2"&&complejidad.value!="3"&&complejidad.value!="4"&&complejidad.value!="5") || (complejidad.value=="")){
				alert("Introduce un valor de complejidad válido (entre 1 y 5)");
				return false;
			}
            //Tema
			if(tema.value==""){
				alert("Introduce el tema de la pregunta");
				return false;
			}
			return true;
		}
		
		
		function insertarPregunta(){
			// Verificar datos en el cliente
			if(verificar()){
				document.getElementById("div1").style.display = 'block';
				document.getElementById("div2").style.display = 'none';
				var elCorreo= "<?php $correo=$_GET[var1]; echo $correo;?>";
				var pregunta=document.getElementById("pregunta");
				var respuesta=document.getElementById("respuesta");
				var complejidad=document.getElementById("complejidad");
				var tema=document.getElementById("tema");
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("div1").innerHTML=xmlhttp.responseText; 
					}
				}
				xmlhttp.open("POST","InsertarPregunta.php?var1="+elCorreo,true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				var post='pregunta='+pregunta.value+'&respuesta='+respuesta.value+'&complejidad='+complejidad.value+'&tema='+tema.value;
				xmlhttp.send(post);
			}
		}
		
		function verPreguntas(){
			document.getElementById("div2").style.display = 'block';
			document.getElementById("div1").style.display = 'none';
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("div2").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","VerPreguntasXML.php");
			xmlhttp.send(null);
		}

  </script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
			<?php
				$usuario=$_GET[var1];
				echo "<span class='right'>Hola, <font color='red'>".$usuario."</font></span>";
			?>
      		<span class="right"><a href="Layout.html">Logout </a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
            <?php
				$usuario=$_GET[var1];
				echo "<span><a href='itzAlumno.php?var1=".$usuario."'>Inicio</a></spam>";
				echo "<span><a href='GestionPreguntas.php?var1=".$usuario."'>Insertar Pregunta</a></spam>";
				#echo "<span><a href='VerPreguntasUsuarios.php?var1=".$usuario."'> Preguntas</a></spam>";
		?>
	</nav>
    <section class="main" id="s1">
    
	<div>
      <form>
        <p align='left'> Pregunta: <input type="text" name="pregunta" size="42" id="pregunta"/>
		<p align='left'> Respuesta: <input type="text" name="respuesta" size="21"  id="respuesta"/>
		<p align='left'> Complejidad: <input type="text" name="complejidad" size="1"  id="complejidad"/>
        <p align='left'> Tema: <input type="text" name="tema" size="17"  id="tema"/>
		<br>
		<p align='left'> <input type="button" value="Guardar Pregunta" id="GP" onclick="insertarPregunta()"/>
		<p align='left'> <input type="button" value="Ver Preguntas" id="VP" onclick="verPreguntas()"/>
      </form>
	  <div id="div1">
	  </div>
	  <div id="div2">
	  </div>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>