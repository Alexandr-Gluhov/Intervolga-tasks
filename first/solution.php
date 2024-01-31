<?php
$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

function print_student($student, $subjects)
{
    echo '<tr>';
    echo '<td>' . $student[0] . '</td>';
    foreach ($subjects as $subject) {
        echo '<td>';
        if (isset($student[$subject])) {
            echo $student[$subject];
        }
        echo '</td>';
    }
    echo '</tr>';
}

//Сортируем записи по именам учащихся
usort($data, function ($a, $b) {
    return strcmp($a[0], $b[0]);
});

//Составляем массив предметов и выводим в качестве первой строки таблицы
$subjects = array_unique(array_column($data, '1'));
sort($subjects);
echo '<table border="1">';
echo '<tr><td></td><td>' . implode('</td><td>', $subjects) . '</td></tr>';

//собираем данные по каждому ученику, а затем записываем в таблицу
$row = [$data[0][0]];
foreach ($data as $student) {

    if ($student[0] !== $row[0]) {
        print_student($row, $subjects);
        $row = [$student[0]];
    }

    if (!isset($row[$student[1]])) {
        $row[$student[1]] = $student[2];
    } else {
        $row[$student[1]] += $student[2];
    }
}
print_student($row, $subjects);
echo '</table>';
