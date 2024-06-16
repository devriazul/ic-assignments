<?php
function reverse_characters_of_words($sentence) {
    $words = explode(" ", $sentence);
    $reversed_words = array_map(function($word) {
        return strrev($word);
    }, $words);
    return implode(" ", $reversed_words);
}


$sample_input = 'I love programming';
$sample_output = reverse_characters_of_words($sample_input);
echo $sample_output . "\n";  
?>
