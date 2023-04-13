<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itsm";


$con = mysqli_connect($servername, $username, $password, $dbname);


    $sql = "select * from prodmoved where prodorder ='".$prodorder."'";
    $output = '';
    $result=mysqli_query($con,$sql);

    $output .= '<div class="row">';
    $counter = 0;

    while ($row = mysqli_fetch_array($result)){
        $counter = $counter +1;
        $output .='<div class="col"><table class="table table-primary" style="width: 30%"><thead class="thead-dark"><tr><td class="opr">'.$row['operation'].'<span class="label label-danger mr-2" style="float: right">'.$counter.'</span></td></tr></thead><tbody><tr><td><input class="input Inputopr" disabled type="text" value="'.$row['workcenter'].'" /></td></tr><tr><td>
        <input class="input Inputopr" type="text" disabled value="'.$row['labgrp'].'" /></td></tr></tbody></table></div>';
    }
    $output .= "</div>";
    echo $output;

