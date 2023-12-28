<?php 

session_set_cookie_params(0 , '/' , 'localhost' , true , true);

session_start();

$_SESSION['user'] = true;