<?php
/*
  By Folkibits <https://gist.github.com/folkibits>.
  This code is released in the public domain under GPL 2.0.

  Using Openssl and the Blowfish $2y$ algorytm.
 
 Examples
  Bcrypt::hash('password');                // Output: ashed password to store in database

  Bcrypt::check('password', $storedhash);  //Output: true or false 
  
 */


class Bcrypt {
	 
	
	public static function hash($password,$workload ='12'){ 
        if (version_compare(PHP_VERSION, '5.3') < 0){ echo 'Bcrypt requires PHP 5.3 or above'; }else{
        	if(! function_exists('openssl_random_pseudo_bytes') ){ echo "Bcrypt requires openssl PHP extension"; }else{

	            if($workload < 4 || $workload > 31) $workload = 8;
	          	$salt = sprintf('$2y$%02d$', $workload).strtr(base64_encode( openssl_random_pseudo_bytes(20)), '+', '.');
	        	
	          	return crypt($password, $salt);

        	}
      	}
	}	

	public static function check($password, $storedhash){
        if (version_compare(PHP_VERSION, '5.3') < 0){ echo 'Bcrypt requires PHP 5.3 or above'; }else{
        	if(! function_exists('openssl_random_pseudo_bytes')){ echo "Bcrypt requires openssl PHP extension";}else{

        		return crypt($password, $storedhash) == $storedhash;          

        	}
      	}
	}	

	

}


