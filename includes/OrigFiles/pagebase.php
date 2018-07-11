</body>
</html>

<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.offcanvas.js"></script>
    
    <script>
      $(document).foundation();
    </script>
    
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    
    <script src="js/dropzone.js"></script>

<script>

			
	
			 tinymce.init({

			  selector: '.fluentTxtEditor',
			  height: 800,
			  theme: 'modern',
			  language: 'es_MX',
			  plugins: [
			    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			    'searchreplace wordcount visualblocks visualchars code fullscreen',
			    'insertdatetime media nonbreaking save table contextmenu directionality',
			    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
			  ],
			  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
			  image_advtab: true,
			  templates: [
			    { title: 'Test template 1', content: 'Test 1' },
			    { title: 'Test template 2', content: 'Test 2' }
			  ],
			  content_css: [
			    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			    '//www.tinymce.com/css/codepen.min.css'
			  ]
			 });
			 
		 </script>



<script>

$(document).ready( function () {
    $('#table_id','#clases_uploaded').DataTable();
} );	
	

$('[data-open-details]').click(function (e) {
  e.preventDefault();
  $(this).next().toggleClass('is-active');
  $(this).toggleClass('is-active');
});

</script>

<script>
	
$(document).ready(function(){
	
	$('#newMateriaArea').load('includes/addNew/newMateria.php');
	$('#listofclases').load('includes/listofclases.php');
	
});


$(document).on('change','#actividad_choice',function(){
	
	var change = $('#actividad_choice option:selected').val();
	var activitiy_chosen = $('#actividad_choice option:selected').text();
	
	
	$.post('includes/getherramientas.php',{change:change},function(data){
		
		$('#herramientas_list').html(data);
		$('#IforH').html(' ');
	
	});
	
	
	//$('textarea#ata').html('texto');
	
	tinymce.remove('textarea');

});



// ******************************************  //
/////////////// Activty & Herramientas //////////
// 	*****************************************  //

$(document).on('change','#herramientas_list',function(){
	
	var activity_change = $('#actividad_choice option:selected').val();
	var herr_chosen = $('#herramientas_list option:selected').val();
	
	var thedata = [];
	
	
	
		$.post('includes/herramientas_Forms.php',{activity_change:activity_change,herr_chosen:herr_chosen},function(data){
		
		$('#IforH').html(data);
		
		
		$.post('includes/getVid.php',{activity_change:activity_change,herr_chosen:herr_chosen},function(vidGET){
		
		$('#IforV').html(vidGET);
		
		});
		
		
		$.post('includes/getTabla.php',{activity_change:activity_change,herr_chosen:herr_chosen},function(datax){
		
		$('#ata').html(datax);
		$('.ataX').parent().prepend('<div class="confirmedTxt"></div><hr / style="border:0px;">');
		$('.ataX').parent().append('<button class="button tiny radius secondary texttomirror right">Confirmar</button>');
		
		
		$('#ira').html('<h4 class="left">Instruciones</h4><hr / style="border:0px solid #fff;">');
		
		
		});

		
	});
	
		
	
	
	
});

$(document).on('click','.addBoxes',function(){

$('#Class').foundation('reveal', 'open');

});	



$('.get_dataUni').click(function(){
	
	var parent = $(this).parent().attr('id');
	
	$('#sendparent').val(parent);
	
	$('#sendparent_withdata').submit();
	
	
	//alert(parent);
});	
	

$('.view_dataUni').click(function(){
	
	var p = $(this).parent().attr('id');
	
	//alert(p);
	
	$('#additional_'+p).foundation('reveal', 'open');
			
	
});

$('.closethismodal').foundation('reveal', 'close');



$(document).on("change", ".chooseunidad",function(){
	
	var parent = $(this).val();
	
	$.post('includes/revealtheunidad.php',{parent:parent},function(data){

		$('#showtemhere').html(data);
		$('#createNewClass').html('<a class="button tiny radius">Crear Clase</a>');
		
		$('#moreClassInfo').html('<i class="fa fa-info-circle fa-lg" aria-hidden="true" data-reveal-id="moreClaseInfo"></i>');

	});
	
});


$(document).on("change", ".themats",function(){	
	
	var parent = $(this).val();
	
	$.post('includes/allinone.php',{parent:parent},function(data){
	
	$('#unidadesONLY').html(data);	
		
	})
	
});

$(document).on('click','#createNewClass',function(){
	
	
	var cur_maestro = $('input[name=cur_maestro]').val();
	var AFM = $('#selMatGrap option:selected').val();
	var AFU = $('#selUniGrap option:selected').val();
	
	$('#showtemhere').slideUp();
	
	$.post('includes/upclase.php',{cur_maestro:cur_maestro,AFM:AFM,AFU:AFU},function(new_clase){
	
	$('#newMateriaArea').load('includes/addNew/newMateria.php');
	
	$('#listofclases').load('includes/listofclases.php');
	
	});
	
	
	
});

$(document).on('click','#lectura_didact',function(){
	
	$('#lectura_insert').click();
	
});

$(document).on('click','#present_didact',function(){
	
	$('#present_insert').click();
	
});

$(document).on('click','#activity_file_insert',function(){
	
	$('#activity_insert').click();
	
});


$('#send_atividad_form').click(function(){

var F_AFL = new FormData(document.getElementById("lectura_insert"));

	
		var form_data = new FormData($('#lectura_insert')[0]);
		  $.ajax({
		      type:'POST',
		      url:'includes/upclase_recuros.php',
		      processData: false,
		      contentType: false,
		      async: false,
		      cache: false,
		      data : form_data,
		      success: function(response){
		
		      }
		  });
		
});

// PAGE maestros.php

$('#submit_maestro').click(function(){
	
	var nombre = $('#nombre').val();
	var apellido = $('#apellido').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var telefono = $('#telefono').val();
	var materia_for_teacher = $('#materia_for_teacher option:selected').val();
	
	var role = $('#role_for_teacher').children(":selected").attr("id");
	
	
	//	alert(cuatrimestro); 
	
	$.post('includes/addnewmaestro.php',{nombre:nombre,apellido:apellido,email:email,materia_for_teacher:materia_for_teacher,password:password,telefono:telefono,role:role},function(data){
	
	$('#TeacherProfile').html(data);
		
	});
	
	
	
});
	
$('.maestrosID').change(function(){
	
	var maestro_id = $(this).val();
	var materia_id = $(this).children(":selected").attr("id");
	
	var maestro_name = $(this).children(":selected").text();
	var materia_name = $(this).children(":selected").attr("class");
	
	//alert(maestro_id +' '+materia_id);
	
	$('#doc_mat_'+materia_id).foundation('reveal', 'open');
	$('#confirm_doc_'+materia_id).html(materia_name);
	$('#confirm_mat_'+materia_id).html(maestro_name);
	
	
	$('#confirm_'+materia_id).click(function(){

	
	
		$.post('includes/docente_materia.php',{maestro_id:maestro_id,materia_id:materia_id},function(data){
		
		//alert('i see you');
		
		//$('#confirm_'+materia_id).append(data);
		
		if(data != 'FAILED'){
		$('#confirm_'+materia_id).css('background','rgb(76,217,100)');	
		$('#confirm_'+materia_id).append(data);	
		$('#cancel_confirm_'+materia_id).fadeOut();
		
		}else if(data == 'FAILED'){
		$('#confirm_'+materia_id).html('FAILED');	
		}
			
		});
	
	});
	
});




	
		$(document).on("change","input[name='F_AFL[]']",function() {
		    var names = [];
		    for (var i = 0; i < $("input[name='F_AFL[]']").get(0).files.length; ++i) {
			    names.push('<li class="panel"> <i class="fa fa-check" aria-hidden="true"></i> ' + $(this).get(0).files[i].name + '</li>') ;
		        
		        
		        
		    }
		    $('#lec_files').append(names);
		    
		});
	//});
    
		$(document).on("change","input[name='F_AFP[]']",function() {
		    var names = [];
		    for (var i = 0; i < $("input[name='F_AFP[]']").get(0).files.length; ++i) {
			    names.push('<li class="panel"> <i class="fa fa-check" aria-hidden="true"></i> ' + $(this).get(0).files[i].name + '</li>') ;
		        
		        
		        
		    }
		    $('#pres_files').append(names);
		    
		});
		
		
		// SUBMIT MULTILOADER FORM
		$(document).on('click','#multi_uploader_go', function(e){
			e.preventDefault();
			$('form#multi_uploader_form').submit();
		});
	
	var clase_id = [];
	
	$(document).on('click','.getclassdata',function(){
		
		clase_id = $(this).attr('id');

		$.post('includes/getClase.php',{clase_id:clase_id},function(data){
		
		$('.classData').html(data);

		$('#get_show_videos').load('includes/GET_SECTIONS/videos.php',{clase_id:clase_id});
		
		$('#active_actividades').load('includes/getActividades.php',{clase_id:clase_id});

		$('#listTheFiles').load('includes/lec_ppt.php',{clase_id:clase_id});
		
					// SET UP DROPZONES
					
					$("div.dropLecPresHere").dropzone({ 
				    
				    url: "includes/uploader_lec_ppt.php",
					paramName : "file",
					init: function() {
							
							this.on("sending", function(file, xhr, formData) {
						      formData.append('clase_id',clase_id);
						      //add another 'formData'..if ya need it bro!! ;)
						    });
						    
						    this.on("queuecomplete", function(){
						    
						     //alert("All files have uploaded ");
						     $('#listTheFiles').load('includes/lec_ppt.php',{clase_id:clase_id});
						     $("div.dropLecPresHere").html('Archivos Arriba! Sube Mas Aqui.');
						     $('#dropfilesarea').slideUp();
							 $('#dropfileCenter').show();
						    });
							
					     }
					
					
					
					});	
					
					
					$("fieldset.dropzone").dropzone({ 
		
					url: "includes/dropzoneUP.php",
					paramName : "file",
					init: function() {
					
					this.on("sending", function(file, xhr, formData) {
			        formData.append('file_type','a');
			        formData.append('clase_id',clase_id);
			        formData.append('random_id',RAND_NUM);
			        });
				
		     		}
		
					});
	

			
		});
		
		
		
		
		$('#edit_off_clase_id').val(clase_id);
		
		
	
	});
	
	
	// load getClass if GET cid_return is present after FILE UPLOAD @ multiUploader.php 
	
	var cidReturn = [];	
	$(document).ready(function(){
	

	    if($('#cid_return').val()) {
		cidReturn = $('#cid_return').val();	          
	          $.post('includes/getClase.php',{clase_id:cidReturn},function(data){
			  
			  $('.classData').html(data);
			  
			  $('#get_show_videos').load('includes/GET_SECTIONS/videos.php',{clase_id:cidReturn});
			  
			  });
		}

	
	});
	
	$(document).on('click', '.del_clases_val', function(){
    
    var claseId = $(this).attr('id');
    
	
		$.post('includes/DELCLASE.php',{claseId:claseId},function(data){
		//alert('Haz Borrado Clase No.'+ claseId + ' & Unidad' + data);
		$('#report_deleted').html();
		$('.classData').html('<div style="color:#333; font-size:20px; padding-top:50px;" class="text-center">Este clase ha sido borrado</div>');
		
		$('#listofclases').load('includes/listofclases.php');
		    
		});
		
		
	
	});
	
	$(document).on('click','.more_choice',function(){
		
		var gcd = $(this).siblings('.getclassdata');
		$(gcd).toggleClass("large-10 large-8" ,2000);
		
		$(this).toggleClass("left",1000);
		$(this).toggleClass("more_choice_alt", 2000);
		
		var delbtn = $(this).parent().siblings('div.remover_btn');
		
		$(delbtn).toggle();
		
		//$(".remover_btn").toggleClass('remover_btn remover_btn_alt');

		
	})
	
	// Edit the button
	
	var thefile = [];
	var fl_id = [];
	var theKillNo = [];
	$(document).on('click', '.a_edots', function(n){
	    // Special stuff to do when this link is clicked...
	    // Establecer Variables
	    var wFile = $(this).parent().attr('id');
	    fl_id = $(this).parent().children('input#file_id').val();
	    var edit = $(this).parent().children('a').attr('alt');
	    var ext = $(this).parent().children().children('img').attr('src');
	    
	    thefile = $(this).parent().find('.thefileName').html();
	    
	    
	    // Actualiza los li´s y inputs
	    $('li.edit_off_fileimg').html('<img src="' + ext + '">');
	    $('li.edit_off_filename').html(edit);
	    $('#wFile').val(wFile);
	    $('#edit_off_the_file').val(thefile);
	    
	    $.post('includes/EditTemplate.php',{clase_id:clase_id,thefile:thefile},function(data){
		
			$('#showPreview_code').html(data);   
		    
	    });

	    theKillNo = fl_id;	    
	    
	    //alert(theKillNo);
	    // Cancel the default action
	    //n.preventDefault();
	});
	
	
	//Trigger to upload files
	$(document).on('click', '#edit_off_fileupload_trigger', function(){
		
	$('#edit_off_fileupload').click();
		
	});
	
	//Upload new file
	$(document).on('change', '#edit_off_fileupload', function(){
	
	$('form#edit_off_form_go').submit();
		
	});
	
	
	//DELETE SOMETHING
	$(document).on('click', '.killAct_file', function(){
	
	$('#edit_off_fileupload').attr({'name':'d_updatefile'});
	
		$.post('includes/del_file_fromClaseFiles.php',{thefile:thefile,clase_id:clase_id,theKillNo:theKillNo},function(data){
		
		$('#listTheFiles').load('includes/lec_ppt.php',{clase_id:clase_id});
		
			//alert(data);
			
			$('.exit-off-canvas').click();
			
			
			
		});
		
	});
	
	
	

	// This Causes the Iframe for the Video to DropDown
	$(document).on('click','.shareiticon',function(){
	var hello = $(this).siblings('textarea.tvt').slideToggle();
	});	

	// This opens the ADD HTML LINK
	// This Causes the Stop the form from send when you click on the addHTML button on the OffCanvas Navigation
	$(document).on('click','.addHTML',function(e){
	
	e.preventDefault();
	
	$('#addhtmlcodehere').foundation('reveal','open');
	
	});
	
	$(document).on('click','.plantilla',function(a){
	
		var plantilla_id = $(this).parent().attr('id');
		var plantilla_name = $(this).parent().children('h6').attr('class');
		
		$.post('templates/'+plantilla_id+'.html',{},function(data){
			
			$('#showPreview_code').html(data);
			$('#template_name').html(plantilla_name);
		});
		
	});
	
	var theplantilla = [];
	
	$(document).on('click','#convert_code',function() {
	theplantilla = $('textarea#showPreview_code').val();
    $('#showPreview_html').html(theplantilla);
    $('#store_code').show();
       
    
	});
	
	$(document).on('click','#store_code',function(){
		
		var texttocopy = $('#showPreview_html').html();
	
	    $.post('updates/updatePlantillas.php',{plantillaX:texttocopy,fl_id:fl_id},function(dataplantilla){
	    
	    $('#PlantillaMsg').show();
	    $('#PlantillaMsg').html(dataplantilla);
	    
    	});
				    
	});
	
	$(document).on('click','#shareSectionShowBtn', function(e){
		
		$('#shareSectionShow').slideToggle();
		e.preventDefault();
		
	});
	
	$(document).on('click','#closePlantillaMsg', function(e){
		
		$('#PlantillaMsg').hide();
		e.preventDefault();
		
	});
	
	
	
	$(document).on('click','.sharefilelink',function(){
	
		var claseFileId = $(this).parent().attr('id');
		
		$('#iframe_code').foundation('reveal','open');
		$('div#iframe_code_snippet').html('<textarea><iframe frameborder="0" width="100%" height="1300px" src="http://leavirtual.com.mx/actividades/ppt.php?id='+claseFileId+'"></textarea>');	
			    
	});
	

	// 	*********************************************  //
	////////////// CLASS VIDEOS UPLOADER    ///////////// 
	// 	*********************************************  // 
    
    
	$(document).on('click','.sendVidIframe',function(e){
	e.preventDefault();
	
	var classVid =  $('textarea#classVidIframe').val();
	var classvideotitle = $('input#classvideotitle').val();
	var material = $('input[name=material_assoc]').val();
	var unidad = $('input[name=unidad_assoc]').val();
	
		$.post('includes/upclase_videos.php',{
		classvideotitle:classvideotitle,	
		classVid:classVid,
		material:material,
		unidad:unidad 
		},function(data){
		
		$('#get_show_videos').load('includes/GET_SECTIONS/videos.php',{clase_id:clase_id});
		
		
		
		});
		
	$('input#classvideotitle').empty();
		
	$('#addVidCntr').slideUp();
	$('#VideoAddCenter').show();	
	
	});
	
	
	
	$(document).on('click','#refreshVideos',function(e){
	e.preventDefault();	
	$('#get_show_videos').load('includes/GET_SECTIONS/videos.php',{clase_id:clase_id});
	
	});
	

// 	***********************************  //
//////////// Table Manipulation /////////// 
// 	***********************************  //


$(document).on('click','.texttomirror',function(){
	
	// nonCT = non confirm text
	var nonCT = $(this).siblings('.ataX').val();
	$(this).siblings('.confirmedTxt').html(nonCT);
	
	
});
	
	
// 	***********************************  //
//////////// Activity Creator ///////////// 
// 	***********************************  //


var RAND_NUM = [];

$(document).on('click','.addBoxes',function(){
	
		$.post("includes/genRandom.php",{clase_id:clase_id},function(r_num){
		RAND_NUM = r_num;
		});
				

	  
});	



$(document).on('click','#createActivity',function(e){
	
	//$('#Class').foundation('reveal', 'close');
	e.preventDefault();	
	
	var AF_IN = $('.slider').css('background-color');

		if(AF_IN == 'rgb(33, 150, 243)'){
		AF_IN_x = '1'; // checked Integradora
		}else{
		AF_IN_x = '0'; // NOT checked Integradora
		}
	
	$('.ataX').remove();
	$('.texttomirror').remove();
	var AIS_A = $('div#ata').html(); // Instructions
	var AF_A = $( ".AFA option:selected" ).val(); // Actividad
	var AF_H = $( ".AFH option:selected" ).val(); // Herramienta
	

	$.post('includes/uploadRecurso.php',{clase_id:clase_id,AF_A:AF_A,AF_H:AF_H,AIS_A:AIS_A,AF_IN_x:AF_IN_x,RAND_NUM:RAND_NUM},function(data){

});
	$('#active_actividades').load('includes/getActividades.php',{clase_id:clase_id});	
	//alert(data);
	
});



$(document).on('click','.archivosBtn', function(){

	$(this).parent().children('.whereFilesLive').slideToggle();
		
	
});

$(document).on('click','.closeActivityCreator', function(){

	//alert('hello');
	$('#hiddencloser_haha_te_cerre').click();
		
	
});

$(document).on('click','#cancelActivityCreation', function(){

	//alert('hello');
	$('#hiddencloser_haha_te_cerre').click();
		
	
});


	
	





// 	*********************************************  //
///////// ACTIVITY Files & Instrucions LOADER /////// 
// 	*********************************************  //

$(document).on('click','.classrowdata',function(){
	
	var activity_id = $(this).attr('id');
	var td_activityName = $(this).children('td#td_activityName').text(); 
	var td_herramientaName = $(this).children('td#td_herramientaName').text();
	var td_ejercicioName = $(this).children('td#td_ejercicioName').text();
	var input_randomId = $(this).children('#input_randomId').val(); 
	
	//alert(input_randomId);
	
	$('#HeaderDataActivity').html('<h1>'+ td_ejercicioName +'</h1>' + td_activityName +' / '+ td_herramientaName + '<hr />' );
	
	
	
	
	$.post('includes/getActividades_files.php',{activity_id:activity_id},function(data){
	
	$('#showdatafromclassrowdata').html(data);
		
	});
	
	$('#deleteActivity').attr('id',input_randomId);
	
		$(document).on('click','#deleteActivityXX',function(e){
		$('#confirmActivityDeletSection').slideDown();
		$('#ActivitDataSection').slideUp();
		e.preventDefault();
		});
	
		$(document).on('click','#cancel_deleteActivity',function(e){
		$('#confirmActivityDeletSection').slideUp();
		$('#ActivitDataSection').slideDown();
		e.preventDefault();
		});
		
		$(document).on('click','#confirm_deleteActivity',function(e){
		$('#confirmActivityDeletSection').slideUp();
		$('#ActivitDataSection').slideDown();	
		$.post('includes/delActivity.php',{delActivity:input_randomId},function(data){
		$('#ActivitDataSection').html(data);
		});
		
		$('#active_actividades').load('includes/getActividades.php',{clase_id:clase_id});
		e.preventDefault();
		});
	
	
});

// 	*********************************************  //
////////////// TABLE PREVIEWER AND FORM ///////////// 
// 	*********************************************  //


// HTML RUN CODE
    var text = [];
    
    
    $(document).on('click','#runit',function(){
	   
	   //alert('test');
	   
	   text = $('textarea#textareaTabla').val();
	   
	   //alert(text);
	   
	   $('.PreviewTable').html(text);
	    
    });
	
	
	
    $(document).on('click', '#uploadTabla', function(){
	   
	   		var varA = $('#sel_A option:selected').val(); 
	   		var varH = $('#sel_H option:selected').val();
	   	 
			$.post("includes/uploadTable.php",{tableA:varA,tableH:varH,tableContent:text},function(data){
				
				$('#AjaxResult').html(data);
				
			});
	    
    });
    
// 	*********************************************  //
////////////// CAPITVATE VIDEOS UPLOADER ///////////// 
// 	*********************************************  // 
    
    $("fieldset.dropVids").dropzone({ 
	    
		url: "includes/dropzoneVids.php",
		paramName : "vid"

		
		});
		

// 	*********************************************  //
////////////// ADD NEW VIDEOS FORM      ///////////// 
// 	*********************************************  // 
    
    $(document).on('click','#VideoAddCenter',function(){ 
	
	$('#addVidCntr').slideDown();
	$('#VideoAddCenter').hide();
	
	e.preventDefualt();
		
	});	
		
// 	*********************************************  //
////////////// 	    DELETE A VIDEO      ///////////// 
// 	*********************************************  //  

	$(document).on('click','.delVid', function(){
		
		
		var delVidEmbed = $(this).parent().children('input#delVidEmbed').val();
		
		//alert(delVidEmbed);
		
		$('#DelVideo').foundation('reveal', 'close');
		
		
		$.post('includes/GET_SECTIONS/delVideos.php',{delVidEmbed:delVidEmbed},function(data){
			
		//alert(data);
			
		$('#get_show_videos').load('includes/GET_SECTIONS/videos.php',{clase_id:clase_id});
		

		
		});
	
	}); 
	
		
// 	****************************************************************  //
////////////// Lecturas y Presentaciones DropZone Uploader ///////////// 
// 	****************************************************************  // 
    
    $(document).on('click','#dropfileCenter',function(e){
	    
	    $('#dropfilesarea').slideDown();
	    $('#dropfileCenter').hide();
	    
	    e.preventDefault();
	    
    });
    

		

</script>



    

  


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a259b785d3202175d9b64d9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



