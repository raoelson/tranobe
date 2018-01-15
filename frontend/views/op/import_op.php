<style>
label {
	padding-top: 10px;
}
td {
	vertical-align: middle;
}
tr {
	
}
</style>
<section class="container">
  <div class="row">
    <div class="box" >
        <form name="form-op" enctype="multipart/form-data" id="form-op" method="post" action="<?php echo base_url()?>op/doimport/" class="form-inline" style="margin:50px;">
          <label for="fokontany">Fichier excel (*.xls, *.xlsx) </label>
           	<input type="file" class="input-medium" name="userfile" id="userfile"><br>
           	<button class="btn btn-success" href="#">
  <i class="icon-upload-alt icon-large"></i> Télecharger</a> </button>
           	
        </form>
      </div>
      
  </div>
</section>	
