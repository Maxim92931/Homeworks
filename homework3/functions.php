<?php

function task1()
{
    $xml = simplexml_load_file('data.xml');

    $addresses = $xml->Address;
    $items = $xml->Items;

    echo 'Номер заказа: ' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo 'Дата заказа: ' . $xml->attributes()->OrderDate . '<br>';
    echo 'Описание: ' . $xml->DeliveryNotes . '<br><br>';

    echo '<table border="1px" cellspacing="0">';

    echo '<th>Название</th>';
    echo '<th>Имя</th>';
    echo '<th>Улица</th>';
    echo '<th>Город</th>';
    echo '<th>Штат</th>';
    echo '<th>Индекс</th>';
    echo '<th>Страна</th>';

    echo '<tr>';
    echo '<td>Адресс доставки</td>';
    echo '<td>' . $addresses[0]->Name . '</td>';
    echo '<td>' . $addresses[0]->Street . '</td>';
    echo '<td>' . $addresses[0]->City . '</td>';
    echo '<td>' . $addresses[0]->State . '</td>';
    echo '<td>' . $addresses[0]->Zip . '</td>';
    echo '<td>' . $addresses[0]->Country . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Платежный адрес</td>';
    echo '<td>' . $addresses[1]->Name . '</td>';
    echo '<td>' . $addresses[1]->Street . '</td>';
    echo '<td>' . $addresses[1]->City . '</td>';
    echo '<td>' . $addresses[1]->State . '</td>';
    echo '<td>' . $addresses[1]->Zip . '</td>';
    echo '<td>' . $addresses[1]->Country . '</td>';
    echo '</tr>';

    echo '</table>';

    echo '<br>';
    echo '<table border="1px" cellspacing="0">';
    echo '<th>Номер</th>';
    echo '<th>Название</th>';
    echo '<th>Количество</th>';
    echo '<th>Цена, $</th>';
    echo '<th>Дата доставки</th>';
    echo '<th>Комментарий</th>';

    foreach ($items[0] as $item) {
        echo '<tr>';

        echo '<td>' . $item->attributes()->PartNumber . '</td>';
        echo '<td>' . $item->ProductName . '</td>';
        echo '<td>' . $item->Quantity . '</td>';
        echo '<td>' . $item->USPrice . '</td>';

        if ($item->ShipDate) {
            echo '<td>' . $item->ShipDate . '</td>';
        } else {
            echo '<td>-</td>';
        }

        if ($item->Comment) {
            echo '<td>' . $item->Comment . '</td>';
        } else {
            echo '<td>-</td>';
        }

        echo '</tr>';
    }

    echo '</table>';
}

function task2()
{
    $array = [
        [
            'id' => 1,
            'name' => 'Иван',
            'country' => 'Россия',
            'city' => 'Ярославль',
            'office' => [
                'company' => 'Яндекс',
                'position' => 'Менеджер'
            ]
        ],
        [
            'id' => 2,
            'name' => 'Максим',
            'country' => 'Россия',
            'city' => 'Рыбинск',
            'office' => [
                'company' => 'Яндекс',
                'position' => 'Программист'
            ]
        ]
    ];

    $json = json_encode($array);
    file_put_contents('/home/maxim/output.json', $json);
    $jsonFile = file_get_contents('/home/maxim/output.json');
    $jsonFile = json_decode($jsonFile);

    if (($r = mt_rand(0, 1)) == 1) {
        $jsonFile[0]->{'city'} = 'Москва';
        $jsonFile[1]->{'office'}->{'company'} = 'Гугл';
    }

    $jsonFile = json_encode($jsonFile);
    file_put_contents('/home/maxim/output2.json', $jsonFile);

    $file1 = json_decode(file_get_contents('/home/maxim/output.json'), true);
    $file2 = json_decode(file_get_contents('/home/maxim/output2.json'), true);

    diffArays($file1[0], $file2[0]);
}

function task3()
{
    $array = array();

    for ($i = 0; $i < 50; $i++) {
        $array[$i] = mt_rand(0, 100);
    }

    $csv = fopen('/home/maxim/file.csv', 'w');

    fputcsv($csv, $array);

    fclose($csv);

    $csv = fopen('/home/maxim/file.csv', 'r');

    $data = fgetcsv($csv);

    $sum = 0;

    foreach ($data as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }

    echo 'Сумма = ' . $sum;
}

function task4()
{
    $ch = curl_init("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop" .
        "=revisions&rvprop=content&format=json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = json_decode(curl_exec($ch));


    echo 'title = ' . $result->{'query'}->{'pages'}->{'15580374'}->{'title'} . '<br>';
    echo 'pageid = ' . $result->{'query'}->{'pages'}->{'15580374'}->{'pageid'};

    curl_close($ch);
}

function diffArays($array1, $array2)
{
    foreach (array_keys($array1) as $key) {
        if (is_array($array1[$key])) {
            diffArays($array1[$key], $array2[$key]);
        } else {
            if ($array1[$key] != $array2[$key]) {
                echo $key . ' ' . $array1[$key] . ' != ' . $key . ' ' . $array2[$key];
            }
        }
    }
}
