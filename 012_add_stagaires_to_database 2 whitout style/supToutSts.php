<?php
    include_once "./.connect.php";
    $req_del_st = mysqli_query($db_c,"TRUNCATE TABLE `stagaire`");
    if($req_del_st){
        if (is_dir("./avatars")) {
            shell_exec("rm -r ./avatars");
        }
    if (is_dir("./cvs")) {
        shell_exec("rm -r ./cvs");
    }
header("location:afficheSts.php");}
?>