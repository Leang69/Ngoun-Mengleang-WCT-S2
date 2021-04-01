<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$arr = [2, 3, 4, 6, 7, 9, 11, 20];
print_r(array_filter($arr, fn($var) => $var  & 1));
//$var  & 1 mean that if your $var is even a first digit of $var in binary is 0
//2 = 0010 , 4 = 0100 , 8 = 1000 , 1 = 0001
//2 & 1 = 0 <==> 0010 & 0001 = 0000
//0 is flase and another integer is true
//print_r(array_filter($arr, fn($var) => $var % 2));
        
