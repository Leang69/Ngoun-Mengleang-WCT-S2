<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sum = fn($var) => array_sum(func_get_args( ));
echo $sum(1,2,3,4);
