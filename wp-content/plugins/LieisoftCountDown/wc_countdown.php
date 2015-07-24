
<?php

  global $wpdb;
  $table = $wpdb->prefix . "posts";
  $query = "SELECT ID as 'id' , post_title as 'title' , post_excerpt as 'meta' FROM $table WHERE post_type LIKE 'product' ";
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
<table class="wp-list-table widefat fixed striped posts">
 <thead>
    <tr >
        <th align='center'  class="manage-column column-name sortable desc" >ID</th>
        <th align='center' class="manage-column column-name sortable desc" >Titulo</th>
        <th align='center' class="manage-column column-name sortable desc" >Meta</th>
        <th align='center' class="manage-column column-name sortable desc" >DeadLine</th>
        <th align='center' class="manage-column column-name sortable desc" ></th>
    </tr>
</thead>
<tbody>
    <?php 
    
        foreach($fetch as $values){
            echo "<tr class='iedit author-self level-0 post-183 type-product status-publish has-post-thumbnail hentry'>";
            echo "<td class='thumb column-thumb'>" , $values['id'] , "</td>";
            echo "<td class='thumb column-thumb'>" , $values['title'] , "</td>";
            echo "<td class='thumb column-thumb'>" , $values['meta'] , "</td>";
            echo "<td class='thumb column-thumb'><input class='form-group' id='deadline_" .  $values['id']  ."' type='text' value='' placeholder='Select Deadline' ></td>";
            echo "<td class='thumb column-thumb'><button class='btn btn-primary' onclick='new_deadline(" . $values['id']  . ")' > Save </button></td>";
            echo "</tr>";
        }
    
    ?>
</tbody>
<tfoot>
    <?php
         echo $pagination->Getnavigate();
    ?>
</tfoot>
</table>

<script>
    
    jQuery(document).ready(function($){
        
        $('input[type="text"]').datetimepicker({
                        sideBySide : false
         });
        
        
    });
    
 </script>

