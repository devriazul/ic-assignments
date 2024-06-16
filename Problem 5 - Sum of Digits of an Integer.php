<?php
function sum_of_digits($n) {
    $sum = 0;
    $digits = str_split($n);
    foreach ($digits as $digit) {
        $sum += intval($digit);
    }
    return $sum;
}

$sample_input_1 = 62343;
$sample_output_1 = sum_of_digits($sample_input_1);
echo $sample_output_1 . "\n";  

$sample_input_2 = 1000;
$sample_output_2 = sum_of_digits($sample_input_2);
echo $sample_output_2 . "\n";  
?>
