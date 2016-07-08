<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>

<?php
require "Brewerydb.php";
$bdb = new Pintlabs_Service_Brewerydb('e2d1ed1992dff5929a3b6ecd8bf8ca4f');
$bdb->setFormat('json'); 

#only returns records where region eq South Carolina
$params = [
  'region' => 'South Carolina',
];

try {
    $results = $bdb->request('locations', $params, 'GET'); 
} catch (Exception $e) {
    $results = array('error' => $e->getMessage());
}

print_r($results); // shows the data is there for debugging purposes
echo json_last_error(); // shows no error
		
?>		


<script>
//takes the above JSON Array and creates a Javascript Object
	var data= <?php echo json_encode($results); ?>;

//loops thru the javascript object pulling out the name of each brewery
	for (var i=0; i<data.data.length; i++){
		console.log(data.data[i].name);
		console.log(i);
	}
</script>
</body>



</html>