<?php
#$row = 1;
//exist csv file??
$macad = array(); // MacAddress array

//Read csvfile and push
if (($handle = fopen("MacDataTable1.csv", "r")) !== FALSE){
    while (($data = fgetcsv($handle))) {
        #$row++;
        #echo "${row}: \n"
        array_push($macad, $data);
    }
}
echo $macad;

//get vector
for($i = 1; $macad; $i++){
    $url = "https://api.macvendors.com" . urlendode($macad[i]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    if ($result) {
        echo "Vector: $result";
    } else {
        echo "Not Found";
    }
}
?>