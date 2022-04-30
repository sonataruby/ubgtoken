<label>

    <div class="img-fluid img-thumbnail rounded" style="min-height:180px;"><img id="<?php echo $id;?>_output" src="<?php echo $image;?>" style="width:100%;"></div>
    <div style="position: absolute; width: 1px; min-height:1px; top: -1000px;">
    <input name="<?php echo $name;?>_file" type="file" class="form-control" accept="image/*" onchange="loadFile<?php echo $id;?>(event)">
    <input type="hidden" name="form[<?php echo $name;?>]" value="<?php echo $image;?>">
    </div>

</label>

<script>
  var loadFile<?php echo $id;?> = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('<?php echo $id;?>_output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>