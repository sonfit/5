<option>--Select options--</option>
<?php
    foreach ($data as $key=>$value){
        echo  '<option value="'.$value['maqh'].'">'.$value['name'].'</option>';
    }
?>
