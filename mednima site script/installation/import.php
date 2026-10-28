<?php

$link = mysql_connect(SERVER, DB_USER, DB_PASS);

if($link)
{

$result = mysql_query("CREATE DATABASE IF NOT EXISTS ".DB_NAME."",$link);
$result .= mysql_query("USE ".DB_NAME."",$link);


//Uncomment this below line for larger database to allow script to execute long time
 set_time_limit(0);
// database file path
$filename = "../medniima_school.sql";
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'USERNAME';
// MySQL password
$mysql_password = 'PASSWORD';
// Database name
$mysql_database = 'DB_NAME';

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$fp = fopen($filename, 'r');



// Loop through each line
while (($line = fgets($fp)) !== false) {
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;
	// Add this line to the current segment
	$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';') {
		// Perform the query
		if(!mysql_query($link, $templine)){
			print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		}
		// Reset temp variable to empty
		$templine = '';
	}
}




		

		@mysql_free_result($link);
	 	if (!$result)
		{ echo(" <div align='center' class='errortext'>
				 <p class='errortext'>Unable to create tables.<br>");
		     echo("Your tables might have already be created.</p>");
		    echo(" <div>");
		    //echo(mysql_error());
		}
		else
		{
		   include "school-details-settings.php";
		}
	}
	
else
{
	$vv =false;
}


if($vv === false)
{ ?>


<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">iSt Installation Manager</h3>
          </div>
          <div class="box-body">
<p>
Unable to connect to the database.<br>
Please check your database entries</p>
<form name=setf method=POST action='<?php echo $PHP_SELF;?>' >
<input type=hidden name=type value=changedb>
 <div class="form-group mt-20">
                                        
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Database Entries<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
</form>
</div>
</div>


<? }
?>
