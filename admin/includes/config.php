<?php $connection = new mysqli('localhost','root','','db_criminal_record');
	///check database connection
    if($connection->connect_errno!= 0 )
    {
        die('Database connection error' .$connection ->connect_error);
    } ?>