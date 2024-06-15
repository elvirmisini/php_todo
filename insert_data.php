<?php

if(isset($_POST['add_students'])){


        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $age=$_POST['age'];


        if($f_name==""||empty($f_name)){
            header('location:index.php?message=You need to fill in the first name!');
        }
}
?>