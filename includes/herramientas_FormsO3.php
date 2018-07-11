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
		echo'Participaciónreguntas cuya respuesta debe seleccionarse de una serie de opciones. <br>';
	    echo '<br>Incluir : '; 
		echo '<br>1.Instrucciones de llenado para el alumno. ';
		echo '<br>2.Contenido de Cuestionario.';
		echo '<br>3.Número de pregunta.';
		echo '<br>4.Dos respuestas incorrectas.';
		echo '<br>5.Una respuesta correcta.';
		echo '<br>6.Comentarios de retroalimentación para el alumno.';
		}
		
		elseif($her ==10){//op falso verdadero
		echo'<h5>Descripción<h5/>';
		echo 'Preguntas  cuya respuesta correcta puede ser falsa o verdadera. <br>';
		echo '<br> Incluir :';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta correcta indicando verdadero o falso.';
		echo '<br>5.Agrega una retroalimentación de cada respuesta,permite hacer hincapié en el tema.';
		}
		elseif($her == 13){//respuesta corta 
		echo'<h5>Descripción<h5/>';
		echo'Preguntas donde la respuesta específica debe ser una sola  palabra.<br>';
		echo'<br> Incluir :';
		echo'<br>1.Contenido de cuestionario.';
		echo'<br>2.Número de pregunta. ';
		echo'<br>3.Texto de la pregunta.';
		echo'<br>4.Respuesta correcta en una palabra.';	
		}
		elseif($her == 14){//relacionar columnas
		echo'<h5>Descripción<h5/>';	
        echo 'Serie de  preguntas vinculadas a una lista  de respuestas correctas.<br>';	
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
	echo'Espacio para intercambiar ideas, crear debates o discutir un tema entre  profesores y los alumnos.<br>';
	echo '<br>Incluir ' ;
    echo '<br>1.Instrucciones de participación para el alumno.';
	echo '<br>2.Tema a discutir.';
	echo'<br>3.Número de plalabras del comentario del alumno (opcional).';
     }
  }
	
	
	if($activity == 4){
		if($her == 4){//wiki
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos, organizados en equipo, desarrollan, integran y anexan información sobre un tema. <br>';
		echo '<br>Incluir : ';
		echo '<br>1.Instrucciones de Participación para Alumno.';
		echo '<br>2.Tema a desarrollar . ';
		
	    }
	}
	
	if($activity == 5){
	if($her == 5){//Glosario
	echo'<h5>Descripción<h5/>';
	echo'Espacio para crear un banco de palabras y su significado.<br>';
    echo '<br>Incluir : ';
	echo '<br>1.Instrucciones de Participación para Alumno (El alumno puede adjuntar archivos de cualquier tipo).';	
	  }
   }
	
	if($activity == 6){ //reseña//
		if($her == 3){ 
		echo'<h5>Descripción<h5/>';
		echo'El alumno puede redactar su reseña en un procesador de texto dentro de la plataforma o adjuntar un archivo en cualquier formato. <br>';
		echo '<br>Incluir : ';	
	    echo '<br>1.Instrucciones de participación para el Alumno.';
		echo '<br>2.Retroalimentación general para alumnos.';	
		
		}
	}
	
    if($activity ==7){//resumen 
	    if($her == 3){ 
		echo'<h5>Descripción<h5/>';
		echo'El alumno puede redactar su Resumen en un procesador de texto dentro de la plataforma o adjuntar un archivo en cualquier formato.<br>';
		echo '<br>Incluir : ';	
	    echo '<br>1.Instrucciones de participación para el Alumno.';
		echo '<br>2.Retroalimentación general para alumnos.';	
		//echo '<input type="file" name="F_AFH_IX">'; //F_AFH_IX(F=FILE) (AFH=ActivityForm herramienta)(IX=Arrastrar marcadores)
		}
    }
	
  if($activity == 9){//Infografía
			 
			 if($her == 2){
			 echo'<h5>Descripción<h5/>';
		     echo'Esta herramienta virtual permite a los alumnos compartir infografías de manera creativa y así mismo comentar opiniones a sus demás compañeros.<br>';
			 echo'<br>1.Instrucciones de participación para el alumno.';
			 echo'<br>2.Tema de infografía discutir.';
			
            }
			 
			elseif($her == 3){//tarea
			echo'<h5>Descripción<h5/>';
		    echo'Espacio donde el alumno sube una infografía, ya sea como imagen o en el formato de origen .<br>';
			echo'<br>Incluir:';
			echo'<br>2.Instrucciones de participación para el alumno.';
			echo'<br>3.Retroalimentación general para los alumnos.';
			}
		
	
			elseif($her == 8){//arrastrar y soltar imagen 
			echo'<h5>Descripción<h5/>';
			echo'Medio virtual en donde el profesor coloca una infografía, y el alumno arrastra y suelta la imagen según corresponda. <br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el Alumno.';
			echo'<br>2.Retroalimentación para los alumnos.';
			echo'<br>3.Imagen de como debe verse la actividad';
			echo'<br>4.Imagen con áreas de corte en poligonos de cuatro lados tamaño mínimo 720x480 px tamaño máximo 1080x600.';
			echo'<br>Ejemplo :';
			echo '<a href="http://leavirtual.com.mx/actividades/img/infographia.png" alt="infographia"><img src="img/infographia.png" alt="infographia" width="" height="" /></a>';
			}
			
	}
	
	//Empieza mapa mental//
	    if($activity == 10){
			if($her == 2){//Foro//
			echo '<h5>Descripción</h5>';
			echo'Herramienta virtual en donde el alumno comparte su Mapa Mental en formato de imagen y puede escribir opiniones a los mapas de sus compañeros y recibir comentarios<br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones de participacion para el alumno';
			echo'<br>2.Tema a discutir';
			 }
			 
			elseif($her == 3){ //tarea 
			echo '<h5>Descripción</h5>';
			echo'En este medio el alumno adjunta su mapa mental de dos maneras, ya sea convertido en imagen y/o archivo original.<br>';
			echo'<br>Incluir:';
			echo'<br>Instrucciones de participación para el Alumno.';
			echo'<br>Retroalimentación general para los alumnos';
			 }
			elseif($her ==8){//arrastrar imagen
			echo '<h5>Descripción</h5>';
			echo'En este medio se coloca un mapa mental con algunos espacios en blanco, para que el alumno acomode la imagen correcta de acuerdo al tema.<br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el Alumno';
			echo'<br>2.Retroalimentación para los alumnos';
			echo'<br>3.Imagen de como debe verse la actividad';
			echo'<br>4.Imagen con áreas de corte en poligonos de cuatro lados tamaño mínimo 720x480 px tamaño máximo 1080x600.';
			echo'<br>Ejemplo :';
			echo '<a href="http://leavirtual.com.mx/actividades/img/mapamentales.png" alt="mapamentales"><img src="img/mapamentales.png" alt="mapamentales" width="" height="" /></a>';
			 }
			elseif($her ==9){//arrastrar texto sobre imagen 
			echo '<h5>Descripción</h5>';
			echo'Medio virtual en donde se coloca un mapa mental con algunos espacios en blanco, para que el alumno coloque el texto sobre una imagen según corresponda.<br>';
			echo'<br>Incluir:';
			echo'<br>1.Instrucciones para el alumno.';
			echo'<br>2.Retroalimentación general para alumnos.';
			echo'<br>3.imagen de como debe verse la actividad ';
			echo'<br>4.Imagen de fondo tamaño mínimo 720x480 px  tamaño máximo 1090 x 1080';
			echo'<br>5.Contenido de la actividad';
			echo'<br>Ejemplo';
			echo '<a href="http://leavirtual.com.mx/actividades/img/mapamentales.png" alt="mapamentales"><img src="img/mapamentales.png" alt="mapamentales" width="" height="" /></a>';
			 }
			
}
         //Empieza Mapa conceptual
	 if($activity ==11){
		 if($her ==2){//foro
		 echo'<h5>Descripción<h5/>';
		 echo'Espacio donde el alumno comparte un mapa conceptual, en formato de imagen, y sus compañeros la pueden comentar.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';
		   }
		 elseif($her ==3){//tarea
		 echo'<h5>Descripción<h5/>';
		 echo'En esta herramienta el alumno adjunta su archivo en cualquier formato y al profesor le llega a través de la plataforma.<br>';
		 echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el Alumno.';
		 echo'<br>2.Retroalimentación general para los alumnos.';
		    }
	    elseif($her ==8){//arrastrar imagen
		echo'<h5>Descripción<h5/>';
    	echo'Herramienta donde se coloca un mapa conceptual con algunos espacios en blanco, para que el alumno acomode las imágenes según corresponda.<br>';
	    echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno.';
	    echo'<br>2.Retroalimentación general para el alumno.';
		echo'<br>3.Imagen de como debe verse la actividad';
		echo'<br>4.Imagen con áreas de corte en poligonos de cuatro lados tamaño mínimo 720x480 px tamaño máximo 1080x600.';
		echo'<br>Ejemplo :';
	       }
	 
		elseif($her==9){//arrastrar texto sobre imagen
		echo'<h5>Descripción<h5/>';	
		echo'Actividad donde el alumno arrastra y suelta el texto faltante de un mapa conceptual.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.imagen de como debe verse la actividad ';
		echo'<br>4.Imagen de fondo tamaño mínimo 720x480 px  tamaño máximo 1090 x 1080';
		echo'<br>5.Contenido de la actividad';
		echo'<br>Ejemplo:';
		   }
		
	 }
	                   //Linea del tiempo
 if($activity ==12){
	 if($her == 2){//foro
	     echo'<h5>Descripción<h5/>';
		 echo'Esta herramienta permite a los alumnos subir infografás y hacer comentarios sobre las infografías de sus compañeros de acuerdo a las instrucciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';	
	        }
        elseif($her == 3){
        echo'<h5>Descripción<h5/>';
		 echo'Con esta herramienta el alumno adjunta su línea del tiempo en el formato que sea y puede agregar un comentario para el docente.<br>';
		 echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el Alumno.';
		 echo'<br>2.Retroalimentación general para los alumnos.';	
		    }
		elseif($her ==8){ //arrastrar imagen
		echo'<h5>Descripción<h5/>';
    	echo'Medio virtual en donde el Profesor coloca una línea del tiempo para que el alumno coloque las imágenes faltantes según corresponda.<br>';
	    echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno.';
	    echo'<br>2.Retroalimentación general para el alumno.';
		echo'<br>3.Imagen de como debe verse la actividad';
		echo'<br>4.Imagen con áreas de corte en poligonos de cuatro lados tamaño mínimo 720x480 px tamaño máximo 1080x600.';
		echo'<br>Ejemplo :';
		echo '<a href="http://leavirtual.com.mx/actividades/img/lineadetiempo.png" alt="lineadetiempo"><img src="img/lineadetiempo.png" alt="lineadetiempo" width="" height="" /></a>';
		   }
       elseif($her == 9){
	    echo'<h5>Descripción<h5/>';	
		echo'Medio virtual en donde el Profesor coloca una línea del tiempo con espacios en blanco para que el alumno arrastre y suelte el texto en el lugar correcto de acuerdo al tema.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.imagen de como debe verse la actividad ';
		echo'<br>4.Imagen de fondo tamaño mínimo 720x480 px  tamaño máximo 1090 x 1080';
		echo'<br>5.Contenido de la actividad';
		echo'<br>Ejemplo:';
		echo '<a href="http://leavirtual.com.mx/actividades/img/lineadetiempo.png" alt="lineadetiempo"><img src="img/lineadetiempo.png" alt="lineadetiempo" width="" height="" /></a>';
	      }
	
 }
                    //tripticos  
     if($activity == 13){
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		 echo'Espacio virtual en donde el alumno, en forma de imagen comparte su tríptico y puede comentar y recibir opiniones de sus compañeros.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';
		  }
		elseif($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en donde el alumno adjunta tripticos de dos maneras, ya sea convertido en una ímagen o como archivo original y solo lo ve el profesor.<br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		  }
        
	}
	                       //Dipticos
	if($activity == 14){
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en donde el alumno en forma de imagen publica su díptico y puede comentar los trabajos de sus compañeros y recibir comentarios.<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		   }
		elseif($her == 3){//tarea
		echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno anexa su díptico como un archivo en cualquier formato para que el profesor lo revise.<br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		   }
		
	}
	                  //AUDIO
	if($activity == 15){
		if($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno adjunta audios en formato MP3 y puede agregar un comentario para su profesor. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Espacio  donde el alumno comparte un audio en MP3 elaborado con las especificaciones del docente, todos sus compañeros del grupo lo pueden escuchar y comentar .<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		}
		
	}	
	                //Video
	if($activity ==16){
     if($her == 3){		
	echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno adjunta un video, elaborado de acuerdo a las especificaciones del docente. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
	 }
     if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'En esta actividad el alumno comparte un video elaborado con las especificaciones del docente y todos sus compañeros del grupo lo pueden ver y comentar .<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		}
	}
	
	if($activity == 17){//exposicion virtual
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que el alumno publica sus imágenes y una explicación de un tema, para interactuar con sus compañeros por medio de réplicas.<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';	
		}
			
	}
	                           //Presentaciones
	if($activity == 18){
		if($her == 3){
		echo'<h5>Descripción<h5/>';
		echo'Espacio donde el alumno adjunta su actividad elaborada en Power Point. <br>';
		echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para los alumnos.';
		}
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'En este foro el alumno comparte el link de la presentación realizada en cualquier aplicación como Prezi entre otras .<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';
	      }
	}
		       //Graficas 
			   
	if($activity == 19){
		if($her == 3){//tarea
		echo'<h5>Descripción<h5/>';	
		echo'<br>Herramienta en la que el alumno puede adjuntar una gráfica en cualquier formato u hoja de cálculo. <br>';
		echo'<br>Incluir : ';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';	
		  }
		if($her == 2){
		echo'<h5>Descripción<h5/>';
		echo'Herramientas en la que el alumno puede publicar imágenes de gráficas elaboradas en cualquier formato u hoja de cálculo, y sus compañeros pueden comentarla.<br>';
        echo'<br>Incluir:';
		echo'<br>1.Instrucciones de participación para el alumno';
		echo'<br>2.Tema a discutir';
	      }
	}		
	                  
					 //Tablas 
					 
	if($activity == 20){
		if($her ==3){
		echo'<h5>Descripción:<h5/>';
		echo'El alumno puede crear Tablas en un procesador de texto dentro de la plataforma o adjuntar un archivo en cualquier formato. <br>';
		echo'<br>Incluir : ';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
	      }
	}		
                       //completar textos
					   
	if($activity == 21){
		if($her == 16){//arrastrar texto
		echo'<h5>Descripción<h5/>';	
		echo'Herramienta en donde el alumno arrastra la palabra faltante dentro de un texto.<br>';
		echo'<br>Incluir:';
        echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Párrafo con palabras que se ocultaran al alumno resaltadas en color rojo.';
		echo'<br>Ejemplo:';
		}
		elseif($her == 12){
		echo'<h5>Descripción<h5/>';		
		echo'Espacio donde el alumno debe seleccionar la palabra faltante dentro de un texto.<br>';
		echo'<br>Incluir:';	
		echo'<br>1.Instrucciones para el alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';
		echo'<br>3.Párrafo con palabras que se ocultaran al alumno resaltadas en color rojo.';
	       }
	}
	                    //cuadro comparativo
						
	if($activity ==22){
		if($her ==3){
		echo'<h5>Descripción:</h5>';
		echo'Espacio en donde el alumno comparte su cuadro comparativo mediante una imagen, con la finalidad de que sus compañeros la comenten de acuerdo a las indicaciones del docente. <br>';
		echo'<br>Incluir:';	
	    echo'<br>1.Instrucciones de participación para el Alumno.';
		echo'<br>2.Retroalimentación general para alumnos.';	
		  }
		elseif($her ==2){
		echo'<h5>Descripción<h5/>';
		 echo'Espacio en el que el alumno comparte su cuadro comparativo mediante una imagen, con la finalidad de que sus compañeros la comenten de acuerdo a las indicaciones del docente.<br>';
         echo'<br>Incluir:';
		 echo'<br>1.Instrucciones de participación para el alumno';
		 echo'<br>2.Tema a discutir';	
		   }		
			
	}
	     //Examen
		 
	if($activity == 23){
		if($her ==1){
		echo'<h5>Descripción</h5>';
		echo'Examen cronometrado con preguntas cuya respuesta correcta debe seleccionarse de una serie de opciones. <br>';
	    echo '<br>Incluir : '; 
		echo '<br>1.Instrucciones de llenado para el alumno. ';
		echo '<br>2.Contenido de Cuestionario.';
		echo '<br>3.Número de pregunta.';
		echo '<br>4.Dos respuestas incorrectas.';
		echo '<br>5.Una respuesta correcta.';
		echo '<br>6.Comentarios de retroalimentación para el alumno.';
		  }
        elseif($her ==10){
		echo '<h5>Descripción</h5>';
		echo 'Examen con preguntas cuya respuesta puede ser falsa o verdadera con un tiempo específico. <br>';
		echo '<br> Incluir :';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta correcta indicando verdadero o falso.';
		   }
		          
        elseif($her== 14){//relacionar columnas
	    echo '<h5>Descripción</h5>';
		echo'Examen con una serie de preguntas vinculadas a una lista de respuestas correctas (Todos los exámenes llevan un tiempo específico para su solución).<br>';	
		echo '<br>Incluir:';
		echo '<br>1.Contenido de cuestionario.';
		echo '<br>2.Número de pregunta. ';
		echo '<br>3.Texto de la pregunta.';
		echo '<br>4.Respuesta de la pregunta.';	
		  }
		elseif($her == 13){//respuesta corta 
		echo'<h5>Descripción<h5/>';
		echo'Examen con preguntas donde la respuesta específica debe ser una sola palabra con un tiempo en específico.<br>';
		echo'<br> Incluir :';
		echo'<br>1.Contenido de cuestionario.';
		echo'<br>2.Número de pregunta. ';
		echo'<br>3.Texto de la pregunta.';
		echo'<br>4.Respuesta correcta en una palabra.';
	      }
		}
		
		if($activity == 24){
		 if($her ==15){
		echo'<h5>Descripción<h5/>';
		echo'Espacio en el que los alumnos explican un tema de manera virtual  para que sus compañeros lo vean y puedan hacer comentarios<br>';
		echo'<br>Incluir:';
	    echo'<br>1.Instrucciones de participación para el alumno';
	    echo'<br>2.El profesor puede adjuntar un ejemplo de la actividad mediante los siguiengtes formatos(word,power point,jpg,png) maximo 1000 MB';
        echo'<br>3.Indicar aspectos a evaluar y valor de cada uno.';
		echo'<br>4.Objetivo del Taller.'; 
		  }
	}
		
		if($activity ==25){//ensayo
			if($her == 3){
			echo'<h5>Descripción</h5>';
			echo'El alumno puede redactar su Ensayo en un procesador de texto dentro de la plataforma o adjuntar un archivo en cualquier formato. <br>';
		    echo '<br>Incluir : ';	
	        echo '<br>1.Instrucciones de participación para el Alumno.';
		    echo '<br>2.Retroalimentación general para alumnos.';
		      }
		}			

	
	
	
		   
	

		
   
   