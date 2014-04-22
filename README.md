Bcrypt-PHP-5.3-
===============

Simple Bcrypt wrapper for PHP 5.3+

There are almost idenitcal bcrypt classes out there. I just wanted to remake it to understand it and improve my understanding of hashing passwords.


 Examples
  Bcrypt::hash('password');                // Output: ashed password to store in database

  Bcrypt::check('password', $storedhash);  //Output: true or false 
