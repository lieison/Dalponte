
<?php

  global $wpdb;
  $table = $wpdb->prefix . "posts";
  $query = "SELECT ID as 'id' , post_title as 'title' , guid as 'guid' FROM $table WHERE post_type LIKE 'product' ";
  $result = $wpdb->get_results($query , ARRAY_A);
  

  $pagination = new BasePagination();
  $pagination->SetPerPage(5);
  $pagination->SetPagArrayData($result);
  
  $fetch = $pagination->GetPagination();
  
 
  

?>

<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

<br><br>
<input type="hidden" id="path_" value="<?php echo ABSPATH;?>" />
<div class="panel panel-default">
     <div class="panel-body">
    <table class="table table-striped">
 <thead>
    <tr >
        <th align='center'  class="manage-column column-name sortable desc" >ID</th>
        <th align='center' class="manage-column column-name sortable desc" >Title</th>
        <th align='center' class="manage-column column-name sortable desc" >Link</th>
        <th align='center' class="manage-column column-name sortable desc" >DeadLine</th>
        <th align='center' class="manage-column column-name sortable desc" ></th>
    </tr>
</thead>
<tbody>
    <?php 
    
        foreach($fetch as $values){
            
            $meta = get_post_meta($values['id'] , "deadline_");
            $date_ = "";
            if(!empty($meta)){
                $date_ = $meta[0];
            }
            
            echo "<tr class='iedit author-self level-0 post-183 type-product status-publish has-post-thumbnail hentry'>";
            echo "<td>" , $values['id'] , "</td>";
            echo "<td>" , $values['title'] , "</td>";
            echo "<td><a target='_blank' href='" . $values['guid'] . "'>" , $values['guid'] , "</a></td>";
            echo "<td><input class='form-group' id='deadline_" .  $values['id']  ."' type='text' value='" . $date_ . "' placeholder='" . $date_ . "' ></td>";
            echo "<td><button  id='save_" .  $values['id']  ."' class='btn btn-primary' onclick='new_deadline(" . $values['id']  . ");' > Save </button></td>";
            echo "</tr>";
        }
    
    ?>
</tbody>

</table>
         <div class="panel-footer">
                <?php
                    echo $pagination->Getnavigate();
                ?>
         </div>
</div></div>


<script>
    
    jQuery(document).ready(function($){
        
        $('input[type="text"]').datetimepicker({
                        sideBySide : false
        });

    });
    
    
    var new_deadline = function(i){
           var date = document.getElementById("deadline_" + i).value;
           var url = "<?php echo plugins_url('/', __FILE__);?>c_response.php";
           var p = document.getElementById("path_").value;
           var b = document.getElementById("save_" + i);
           
           
           if(date === "undefined" || date === "" || date === null)
           {
               alert("sorry we need the deadline ...");
               return;
           }
           
           var ftask = new jtask();
           ftask.url = url;
           
           
           ftask.beforesend = true;
           ftask.data = {"i" : i  , "date" : date , "path" : p };
           ftask.config_before(function(){
                  b.innerHTML = "Saving ...";
                  b.disabled = true;
           });
                
           ftask.success_callback(function(call){
                  b.innerHTML = "Save";
                  b.disabled = false;
           });
                
           ftask.do_task();
           
           
    };
    
 </script>

