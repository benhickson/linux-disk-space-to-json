<?php

// columns desired from the result of `df`
$desired_columns = [1, 2, 3, 4, 5, 6];

// will be an array of associative arrays
$disk_data = array();

foreach ($desired_columns as $column) {
	
	// run the command.
	// double $$ because the second $ is for interpolating the variable $column into the string, and the first $ is part of the `print` command's syntax.
	$shell_response = shell_exec("df | awk '{ print $$column}'");
	
	// remove the trailing line break (and any other whitespace at the end) from the response
	$rtrimmed_response = rtrim($shell_response);
	
	// split response into array, on line breaks
	$response_array = explode("\n", $rtrimmed_response);
	
	// shift off the first item in the array, the column header.
	$key = array_shift($response_array);
	
	// modify the associative arrays within each specifically targeted array
	// this is the actual re-mapping of columns to our desired format
	foreach ($response_array as $row => $value) {
		$disk_data[$row][$key] = $value;
	}
}

// different options for responses
if (isset($_GET['format'])) {

	if ($_GET['format'] == 'human') {
		echo '<pre>'."\n";
		print_r($disk_data);
	} else if ($_GET['format'] == 'json') {
		echo json_encode($disk_data);
	} else {
		echo 'Requested format "'.$_GET['format'].'" not allowed. Formats allowed: human, json.';
	}

} else {
	echo 'Please specify a format as a GET parameter. Append "?format=desired_format" to the URL.';
}


