<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function csv_to_array($filename='', $delimiter=',')
{
	// echo "in function<br>";

    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
    	// echo "hit if";
        while (($row = fgetcsv($handle, 30000, $delimiter)) !== FALSE)
        {
        	// echo "row[0] = ".$row[0]."<br>";
        	// echo "row[1] = ".$row[1]."<br>";
            $data[$row[0]] = $row[1];
        }
        fclose($handle);
    }
    else {
    	// echo "hit else";
    }
    return $data;
}

$zip = $_GET['zip']; 

$zip_to_state = csv_to_array("../zip_codes.csv",',');

// echo "calling function<br>";
echo $zip_to_state[$zip];

?>
