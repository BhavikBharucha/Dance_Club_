<?php
    $con = mysqli_connect("localhost", "root", "", "dcms");
    if(!$con)
    {
        throw new Exception('MySQL Connection Database Error: ');
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

