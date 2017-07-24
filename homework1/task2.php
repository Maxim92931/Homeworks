<?php
$drawings = 80;
$drawingsByMarkers = 23;
$drawingsByPencil = 40;
$drawingsByPaints = $drawings - ($drawingsByMarkers + $drawingsByPencil);

echo 'Условие: <br><br>';
echo 'На школьной выставке ' . $drawings . ' рисунков. ' . $drawingsByMarkers . ' из них выполнены фломастерами, ' .
    $drawingsByPencil . ' карандашами, а остальные - красками. <br>Сколько рисунков, выполненные красками, на ' .
    ' школьной выставке?<br><br>';
echo 'Решение: <br><br>';
echo $drawings . ' - ' . '(' . $drawingsByPencil . ' + ' . $drawingsByMarkers . ') = ' . $drawingsByPaints .
    '<br><br>';
echo 'Ответ: ' . $drawingsByPaints . ' рисунков выполненно красками.';
