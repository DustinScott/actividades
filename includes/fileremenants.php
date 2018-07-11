<!--

			<td class="uN_proposito">'.$tems['unidad_proposito'].'</td>
			<td class="uN_desempeno">'.$tems['unidad_desempeno'].'</td>
			<td class="uN_temario">'.$tems['unidad_temario'].'</td>

-->
			<td class="mT_nombre">'.$tems['materia_nombre'].'</td>
<!--

			<td class="uN_num">'.$tems['unidad_num'].'</td>
			<td class="mT_num">'.$tems['modulo_num'].'</td>
			<td class="cT_num">'.$tems['cuatrimestre_num'].'</td>

-->

				This gets all the Materias and asigns the modulo and cuatrimestre to the id and class
 <!-- Materia, Unidad, Cuatrimestre -->
			   <label> 
			   <select id="materia_for_teacher">
			   <option selected="true" disabled="disabled">Select Materia</option>
			   <?php
				 $query = mysqli_query($con,"SELECT *  FROM materias ORDER BY materia_nombre ASC");
				 	
				 							
				 	while($qd = mysqli_fetch_array($query)){
				 	
				 	echo '<option id="'.$qd['modulo_num'].'" class="'.$qd['cuatrimestre_num'].'" value='.$qd['materia_id'].'>
				 	'.$qd['materia_nombre'].'
				 	</option>';
				 	
				 	
				 	
				 	}								   
			   ?>
			   </select>
			   </label>