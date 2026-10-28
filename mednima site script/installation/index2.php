<? 
$filename = "../medniima_school.sql";
define("SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "ist_school");
	
	$link = mysql_connect(SERVER, DB_USER, DB_PASS);

if(!is_readable($filename) or !is_writeable($filename))
{
    echo "file not found";
}else{

$result = mysql_query("CREATE DATABASE IF NOT EXISTS ".DB_NAME."",$link);
$result .= mysql_query("USE ".DB_NAME."",$link);
	


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
		if(!mysql_query($templine, $link)){
			print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		}else{
			
		echo "successfull";	
		}
		// Reset temp variable to empty
		$templine = '';
	}
}



}

?>