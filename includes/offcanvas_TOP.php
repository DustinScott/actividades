<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">

    <!-- Off Canvas Menu -->
    <aside class="right-off-canvas-menu" >
        <!-- whatever you want goes here -->
        <img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png" style="padding:10px;">
        <hr />
        <ul class="no-bullet" style="padding:10px;">
	        
	        

	      <li class="edit_off_fileimg text-center">File img</li> 
	       
          <li class="edit_off_filename text-center"><a href="#">File Name</a></li>
          
		</ul>
		  <hr />
		  <div class="large-12 columns" style="padding:10px;">
		  
			  	  
			  <div id="list_htmlFiles">
				  
				  
			  </div>
	          
	          <button class="button large-12 columns addHTML tiny secondary" style="background:#1d77ef; color:#fff;">NUEVO HTML</button>
	          

		  </div>
          
          <hr />         
          
          <ul class="no-bullet" style="padding:10px;">
          <li class="large-10 columns" style="padding:0px;"><a id="edit_off_fileupload_trigger" href="#" class="large-12 columns button tiny radius secondary">Cambiar</a></li>
          
		  <!--  FORM THAT UPDATES THE CLASS  SENDS THE PLANTILLAS / TEMPLATES-->
          
          <form id="edit_off_form_go" action="updates/classupdate.php" method="POST" enctype="multipart/form-data">
          
          <input id="edit_off_fileupload" type="file" name="updatefile" style="display:none;" >
          
          <input id="wFile" type="hidden" name="wFile" value="">
          
           <input id="edit_off_the_file" type="hidden" name="curFile" value="">
          
          <input id="edit_off_clase_id" type="hidden" name="row" value="">
          

          
          
          </form>
          
		  <!--     END THE FORM THAT UPDATES THE CLASS       -->
          
                    
          <li class="large-2 columns text-center" style="padding:0px 0px 0px 2px;"><a href="#" class="large-12 columns button tiny radius killAct_file"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></li>
          
          
          
        </ul>
    </aside>