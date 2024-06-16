<?php
function minimum_absolute_value($numbers) {
    $min_abs_value = PHP_INT_MAX;
    foreach ($numbers as $num) {
        $abs_value = abs($num);
        if ($abs_value < $min_abs_value) {
            $min_abs_value = $abs_value;
        }
    }
    return $min_abs_value;
}


$sample_input_1 = array(10, 12, 15, 189, 22, 2, 34);
$sample_output_1 = minimum_absolute_value($sample_input_1);
echo $sample_output_1 . "\n";  

$sample_input_2 = array(10, -12, 34, 12, -3, 123);
$sample_output_2 = minimum_absolute_value($sample_input_2);
echo $sample_output_2 . "\n";  
?>
