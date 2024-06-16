<?php
function print_pattern($n) {
    for ($i = 0; $i < $n; $i++) {
        echo str_repeat(' ', $n - $i - 1);
        echo str_repeat('*', 2 * $i + 1);
        echo "\n";
    }
}

print_pattern(5);
// Output:
//       *
//     ***
//   *****
// *******
//*********
?>
