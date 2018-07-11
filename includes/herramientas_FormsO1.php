<?php include 'ewp.php';
	
	$activity = $_POST['activity_change'];
	$her = $_POST['herr_chosen'];
	
	$activtyName = '';
	$herrname = '';
	
	mysqli_set_charset( $con, 'utf8');
	$query = mysqli_query($con,"SELECT * FROM actividades WHERE actividad_id = ".$activity."");
		while($a = mysqli_fetch_array($query)){
		
		$activtyName .= $a['actividad_name'];
			
		}
	
	$queryHerr = mysqli_query($con,"SELECT * FROM herramientas WHERE 	
herramientas_id = ".$her."");
		while($h = mysqli_fetch_array($queryHerr)){
		
		$herrname .= $h['actividad_name'];
			
		}
	
	function label($size,$textInput,$nameInput,$placeholder){
		echo '<div class="large-4 columns">
		<label style="font-size:'.$size.'px;">'.$textInput.'</label>
		<input type="text" name="'.$nameInput.'" placeholder="'.$placeholder.'">
		</div>';
	}
	
	
	
	if($activity == 1){	
		
		if($her == 1){//opcion multiple
		echo'<h5>Descripción<h5/>';
		echo'Grupo de preguntas cuya respuesta debe seleccionarse de una lista de opciones. <br>';
	    echo '<br>Incluir : '; 
		echo '<br>1.Instrucciones de llenado para el alumno. ';
		echo '<br>2.Contenido de Cuestionario.';
		echo '<br>3.Número de pregunta.';
		echo '<br>4.Dos respuestas incorrectas.';
		echo '<br>5.Una respuesta correcta.';
		echo '<br>6.Comentarios de retroalimentación para el alumno.';
		
		}elseif($her ==10){//op falso verdadero
		echo'<h5>Descripción<h5/>';
		echo 'Preguntas de decisión cuya respuesta puede ser falsa o verdadera. <br>';
		echo '<br> Incluir :';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta correcta indicando verdadero o falso.';
		
	
		
		}elseif($her == 13){//respuesta corta 
		echo'<h5>Descripción<h5/>';
		echo'Preguntas cuya respuesta debe ser una sola y única palabra.<br>';
		echo'<br> Incluir :';
		echo'<br>1.Contenido de cuestionario.';
		echo'<br>2.Número de pregunta. ';
		echo'<br>3.Texto de la pregunta.';
		echo'<br>4.Respuesta correcta en una palabra.';
			
		}elseif($her == 14){//relacionar columnas
		echo'<h5>Descripción<h5/>';	
        echo 'Serie de  preguntas vinculada a una lista  de respuestas correctas.<br>';	
		echo '<br>Incluir:';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta de la pregunta.';
	}
	
	}
	if($activity == 2){
		
	if($her == 2){//Foro
	echo'<h5>Descripción<h5/>';	
	echo'Espacio para intercambiar ideas ,crear debates o discutir un tema,entre el profesor y los alumnos .<br>';
	echo '<br>Incluir ' ;
    echo ' <br>1.Instrucciones de participación para el alumno.';
	echo ' <br>2.Tema a discutir.';
	}
	}
	
	if($activity == 4){
		if($her == 4){//wiki
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos en equipo desarrollan,integran y anexan información de un tema. <br>';
		echo '<br>Incluir : ';
		echo '<br>1.Instrucciones de Participación para Alumno.';
		echo '<br>2.Tema a desarrollar . ';
		
	}
	}
	
	if($activity == 5){
	if($her == 5){//Glosario
	echo'<h5>Descripción<h5/>';
	echo'Descripción:Espacio para crear un banco de palabras y su significado con la colaboración de los alumnos.<br>';
    echo '<br>Incluir : ';
	echo '<br>1.Especificaciones de como desea que se muestre el glosario (Diccionario,Enciclopedia o Pregunta/Respuesta).';	
	echo '<br>2.Instrucciones de Participación para Alumno (El alumno puede adjuntar archivos de cualquier tipo).';	
	}
	}
	
	if($activity == 6){ //reseña//
		if($her == 3){ 
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que el alumno puede redactar su reseña,resumen o ensayo en un procesador de texto dentro de la plataforma.Tambien se utiliza para que el alumno adjunte un archivo en cualquier formato. <br>';
		echo '<br>Incluir : ';	
	    echo '<br>1.Instrucciones de participación para el Alumno.';
		echo '<br>2.Retroalimentación general para alumnos.';	
		
		}
	}
	
    if($activity ==7){//resumen 
	    if($her == 3){ 
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que el alumno puede redactar su reseña,resumen o ensayo en un procesador de texto dentro de la plataforma.Tambien se utiliza para que el alumno adjunte un archivo en cualquier formato.<br>';
		echo '<br>Incluir : ';	
	    echo '<br>1.Instrucciones de participación para el Alumno.';
		echo '<br>2.Retroalimentación general para alumnos.';	
		//echo '<a href="leavirtual.com.mx/img/TeaBag.png" alt="TeaBag"><img src="img/TeaBag.png" alt="TeaBag" width="" height="" /></a>';
		//echo '<input type="file" name="F_AFH_IX">'; //F_AFH_IX(F=FILE) (AFH=ActivityForm herramienta)(IX=Arrastrar marcadores)
		}
    }
  if($activity == 9){//Infografía
			 
			 if($her == 2){
			 echo'<h5>Descripción<h5/>';
		     echo'Espacio donde el alumno comparte una infografía en formato de imagen,con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
			 echo'<br>1.Instrucciones de participación para el alumno.';
			 echo'<br>2.Tema a discutir.';
			
            }
			 
			elseif($her == 3){//tarea
			echo'<h5>Descripción<h5/>';
		    echo'Espacio donde el alumno adjunta un archivo en cualquier formato.<br>';
			echo'<br>1.Incluir:';
			echo'<br>2.Instrucciones de participación para el alumno.';
			echo'<br>3.Retroalimentación general para los alumnos.';
			}
		
	
			elseif($her == 8){//arrastrar y soltar imagen 
			echo'<h5>Descripción<h5/>';
			echo'Actividad en la que el alumno demuestra su conocimiento al colocar las imagenes en la posición correcta <br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el Alumno.';
			echo'<br>2.Retroalimentación para los alumnos.';
			echo'<br>3.Imagen muestra tamaño 1920x1080.';
			echo'<br>Ejemplo :';
			}
			
	}
	
	//Empieza mapa mental//
	    if($activity == 10){
			if($her == 2){//Foro//
			echo '<h5>Descripción</h5>';
			echo'Espacio en el que el alumno comparte un Mapa mental en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente<br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones de participacion para el alumno';
			echo'<br>2.Tema a discutir';
			}
			elseif($her == 3){ //tarea 
			echo '<h5>Descripción</h5>';
			echo'Espacio donde el alumno adujunta un archivo en cualquier formato.';
			echo'<br>Incluir:';
			echo'<br>Instrucciones de participación para el Alumno.';
			echo'<br>Retroalimentación general para los alumnos';
			}
			elseif($her ==8){
			echo '<h5>Descripción</h5>';
			echo'Actividad en la que el alumno demuestra sus conocimentos al colocar las imagenes en la posición correcta.';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el Alumno';
			echo'<br>2.Retroalimentación para los alumnos<br>';
			}
			elseif($her ==9){
			echo '<h5>Descripción</h5>';
			echo'Texto donde el alumno coloca la respuesta correcta dentro de un cuadro blanco.<br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el alumno.';
			echo'<br>2.Retroalimentación general para alumnos.';
			echo'<br>3.Imagen muestra tamaño maximo 1090 x 1080';
			echo'<br>Ejemplo';
			}
			elseif($her ==11){
			echo'<h5>Descripción<h5/>';
			echo'<br>Herramienta en la cual el alumno debe colocar un texto enel lugar preciso dentro de una imagen. <br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el alumno';
			echo'<br>2.Retroalimentación general para alumnos';
			echo'<br>3.Adjuntar imagen muestra con marcadores exactos';
			echo'<br>4.listado de palabras que iran sobre la imagen';
			echo'<br>Ejemplo:';
	}}
     //Empieza Mapa conceptual
	 if($activity ==11){
		 if($her ==2){
		 echo'<h5>Descripción<h5/>';
		 echo'Espacio en el que el alumno comparte un Mapa conceptual en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';
		 }
		 elseif($her ==3){
		 echo'<h5>Descripción<h5/>';
		 echo'Espacio donde el alumno adjunta un archivo en cualquier formato.<br>';
		 echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el Alumno.';
		 echo'<br>2.Retroalimentación general para los alumnos.';
		 }
	    elseif($her ==8){
		echo'<h5>Descripción<h5/>';
    	echo'Actividad en la que el alumno demuestra sus conocimentos al colocar las imagenes en la posición correcta.<br>';
	    echo'<br>Incluir:';
	    echo'<br>Instrucciones de participación para el alumno.';
	    echo'<br>Retroalimentación general para el alumno.';
	 }
	 
		elseif($her==9){
		echo'<h5>Descripción<h5/>';	
		echo'Actividad en la que el alumno demuestra sus conocimentos al colocar las imagenes en la posición correcta.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Imagen muestra tamaño maximo 1090 x 1080.';
		echo'<br>Ejemplo:';
		}
		elseif($her ==11){
		echo'<h5>Descripción<h5/>';	
		echo'Herramienta en la cual el alumno debe colocar un texto en el lugar preciso dentro de una imagen.<br>.';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Adjuntar imagen muestra con marcadores exactos.';
		echo'<br>4.Listado de palabras que iran sobre la imagen.';
	 }}
	                   //Linea del tiempo
 if($activity ==12){
	 if($her == 2){
	     echo'<h5>Descripción<h5/>';
		 echo'Espacio en el que el alumno comparte una Linea de tiempo en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';	
	 }
        elseif($her == 3){
        echo'<h5>Descripción<h5/>';
		 echo'Espacio donde el alumno adjunta un archivo en cualquier formato.<br>';
		 echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el Alumno.';
		 echo'<br>2.Retroalimentación general para los alumnos.';	
		}
		elseif($her ==8){
		echo'<h5>Descripción<h5/>';
    	echo'Actividad en la que el alumno demuestra sus conocimentos al colocar las imagenes en la posición correcta.<br>';
	    echo'<br>Incluir:';
	    echo'<br>Instrucciones de participación para el alumno.';
	    echo'<br>Retroalimentación general para el alumno.';
		}
       elseif($her == 9){
	    echo'<h5>Descripción<h5/>';	
		echo'Actividad en la que el alumno demuestra sus conocimentos al colocar las imagenes en la posición correcta.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Imagen muestra tamaño maximo 1090 x 1080.';
		echo'<br>Ejemplo:';
	   }
	   elseif($her ==11){
		echo'<h5>Descripción<h5/>';	
		echo'Herramienta en la cual el alumno debe colocar un texto en el lugar preciso dentro de una imagen.<br>.';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Adjuntar imagen muestra con marcadores exactos.';
		echo'<br>4.Listado de palabras que iran sobre la imagen.';
 }}
                    //tripticos  
     if($activity == 13){
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		 echo'Espacio en el que el alumno comparte una Linea de tiempo en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';
		}
		elseif($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno adjunta un archivo en cualquier formato.<br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
        elseif($her	== 15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';
	}}
	                       //Dipticos
	if($activity == 14){
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que el alumno comparte una Linea de tiempo en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		}
		elseif($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno adjunta un archivo en cualquier formato.<br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
		elseif($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';
		}
	}
	                  //AUDIO
	if($activity == 15){
		if($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Los alumnos adjuntan su actividad en cualquier formato referente a audio o video y se le envía al profesor. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
		elseif($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';
	}}
	                //Video
	if($activity ==16){
     if($her == 3){		
	echo'<h5>Descripción<h5/>';
		echo'Los alumnos adjuntan su actividad en cualquier formato referente a audio o video y se le envía al profesor. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
	 }
     elseif($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';
	}}
	
	if($activity == 17){
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que el alumno comparte sus trabajos en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		}
		elseif($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';	
	}}
	                           //Presentaciones
	if($activity == 18){
		if($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Los alumnos adjuntan su actividad en cualquier formato referente a presentación  y se le envía al profesor. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
		elseif($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';	
	}}
		       //Graficas 
	if($activity == 19){
		if($her == 3){
		echo'<h5>Descripción<h5/>';	
		echo'<br>Espacio en el que el alumno puede crear gráficas en un procesador de texto dentro de la plataforma.Tambien se utiliza para que el alumno adjunte un archivo en cualquier formato. <br>';
		echo'<br>Incluir : ';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';	
		}
		elseif($her == 15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.';
	}}		
	                    //Tablas 
	if($activity == 20){
		if($her ==3){
		echo'Descripción:Espacio en el que el alumno puede insertar una tabla realizar su actividad dentro de la plataforma mediante el procesador de texto.Tambien se utiliza para que el alumno adjunte un archivo en cualquier formato. <br>';
		echo'<br>Incluir : ';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
	}}		
                       //palabra faltante
	if($activity == 21){
		if($her == 9){
		echo'<h5>Descripción<h5/>';	
		echo'Texto donde el alumno coloca la palabra correcta dentro de un cuadro blanco.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Imagen muestra tamaño maximo 1090 x 1080.';
		echo'<br>Ejemplo:';
		}
		elseif($her == 12){
		echo'<h5>Descripción<h5/>';		
		echo'Dentro de un texto el alumno elige la palabra correcta.<br>';
		echo'<br>Incluir:';	
		echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Párrafo con palabras que se ocultaran al alumno resaltadas en negritas.';
	}}
	                    //cuadro comparativo
	if($activity == 22){
		if($her ==3){
		echo'<h5>Descripción';
		echo'Se utiliza para que el alumno adjunte un archivo en cualquier formato. <br>';
		echo'<br>Incluir : ';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';	
		}
		elseif($her ==2){
		echo'<h5>Descripción<h5/>';
		 echo'Espacio en el que el alumno comparte en formato de imagen, con la finalidad de que sus compañeros la comenten o califiquen de acuerdo a las indicaciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';
		
			
	}}
	if($activity == 23){
		if($her ==1){
		echo'Descripción:Grupo de preguntas cuya respuesta debe seleccionarse de una lista de opciones. <br>';
	    echo '<br>Incluir : '; 
		echo '<br>1.Instrucciones de llenado para el alumno. ';
		echo '<br>2.Contenido de Cuestionario.';
		echo '<br>3.Número de pregunta.';
		echo '<br>4.Dos respuestas incorrectas.';
		echo '<br>5.Una respuesta correcta.';
		echo '<br>6.Comentarios de retroalimentación para el alumno.';
		}
        elseif($her ==10){
		echo 'Descripción: Preguntas de decisión cuya respuesta puede ser falsa o verdadera. <br>';
		echo '<br> Incluir :';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta correcta indicando verdadero o falso.';
		}
		          
        elseif($her== 14){
	    echo 'Descripción: Serie de  preguntas vinculada a una lista  de respuestas correctas.<br>';	
		echo '<br>Incluir:';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta de la pregunta.';	
	    }}
		
		if($activity == 24){
		 if($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.'; 
		}}
		if($activity ==25){
			if($her == 3){
			echo'Descripción:Espacio en el que el alumno puede redactar su reseña,resumen o ensayo en un procesador de texto dentro de la plataforma.Tambien se utiliza para que el alumno adjunte un archivo en cualquier formato. <br>';
		    echo '<br>Incluir : ';	
	        echo '<br>1.Instrucciones de participación para el Alumno.';
		    echo '<br>2.Retroalimentación general para alumnos.';
		}}			

	
	
		   
	

		
   
   