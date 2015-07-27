<?php

   if(isset($_REQUEST['get_submit']))
   {
       
        $stock_         = $_REQUEST['l1'];
        $out_stock_     = $_REQUEST['l2'];
        $campain        = $_REQUEST['l3'];
        
        update_option("ls_stock_", $stock_);
        update_option("ls_outstock_", $out_stock_);
        update_option("ls_campain_", $campain);

   }

   $in_stock        = get_option("ls_stock_");
   $out_stock       = get_option("ls_outstock_");
   $campain         = get_option("ls_campain_");
   
?>

<br><br>
<div class="panel panel-default">
  <div class="panel-heading">Count Down Options</div>
  <div class="panel-body">
 <form role="form" class="form-horizontal" action="save_options.php"  method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">In Stock Label : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="l1" value="<?php echo $in_stock; ?>">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Out Stock Label : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="l2" value="<?php echo $out_stock; ?>">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">End campain Label : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="l3" value="<?php echo $campain; ?>">
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="get_submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>
  </div>
</div>


