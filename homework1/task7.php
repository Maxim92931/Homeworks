<?php
echo '<table border="1" cellspacing="0">';

for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 10; $j++) {
        echo '<td align="center" width="30px" height="30px">';

        if ($i % 2 == 0 && $j % 2 == 0) {
            echo '(' . $i * $j . ')';
        } else if ($i % 2 != 0 && $j % 2 != 0) {
            echo '[' . $i * $j . ']';
        } else {
            echo $i * $j;
        }

        echo '</td>';
    }
    echo '</tr>';
}

echo '</table>';
