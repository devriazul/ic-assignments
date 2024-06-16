<?php
function count_words_in_file($filename) {
    $file_contents = file_get_contents($filename);
    $words = str_word_count($file_contents, 1);
    return count($words);
}

// Usage example:
$word_count = count_words_in_file('sample.txt');
echo $word_count . "\n"; 
?>
