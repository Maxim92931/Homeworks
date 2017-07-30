<?php
function task1($ArrayOfStrings)
{
    if (func_get_arg(1) == true) {
        return implode('', $ArrayOfStrings);
    }

    foreach ($ArrayOfStrings as $value) {
        echo '<p>';
        echo $value;
        echo '</p>';
    }

    return null;
}

function task2($arrayOfNumbers, $sign)
{
    $result = $arrayOfNumbers[0];

    if (!($sign == '+' || $sign == '-' || $sign == '*' || $sign == '/')) {
        echo 'Передан некоректный знак';
        return;
    }

    for ($i = 1; $i < count($arrayOfNumbers); $i++) {
        if (!(gettype($arrayOfNumbers[$i]) == 'integer' || gettype($arrayOfNumbers[$i]) == 'double')) {
            echo 'В функцию должны быть переданы только числа';
            return;
        }

        switch ($sign) {
            case '+':
                $result += $arrayOfNumbers[$i];
                break;
            case '-':
                $result -= $arrayOfNumbers[$i];
                break;
            case '*':
                $result *= $arrayOfNumbers[$i];
                break;
            case '/':
                if ($arrayOfNumbers[$i] == 0) {
                    echo 'На ноль делить нельзя';
                    return;
                }
                $result /= $arrayOfNumbers[$i];
        }
    }

    echo $result;
}

function task3()
{
    $parameters = func_get_args();

    if (array_search('0', $parameters)) {
        echo 'На ноль делить нельзя';
        return;
    }

    $result = $parameters[1];

    echo $result;

    for ($i = 2; $i < count($parameters); $i++) {
        switch ($parameters[0]) {
            case '+':
                $result += $parameters[$i];
                echo ' + ' . $parameters[$i];
                break;
            case '-':
                $result -= $parameters[$i];
                echo ' - ' . $parameters[$i];
                break;
            case '*':
                $result *= $parameters[$i];
                echo ' * ' . $parameters[$i];
                break;
            case '/':
                $result /= $parameters[$i];
                echo ' / ' . $parameters[$i];
        }
    }

    echo ' = ' . $result;
}

function task4($number1, $number2)
{
    if (gettype($number1) == 'integer' && gettype($number2) == 'integer' && $number1 > 0 && $number2 > 0) {
        echo '<table border="1px" cellspacing="0">';

        for ($i = 1; $i <= $number1; $i++) {
            echo '<tr>';

            for ($j = 1; $j <= $number2; $j++) {
                echo '<td  align="center" width="30px" height="30px">' . $i * $j;
                echo '</td>';
            }

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Должны быть переданы только целые положительные числа';
    }
}

function task5($palindrome)
{
    $isPalindrome = true;
    $palindrome = mb_strtolower(str_replace(' ', '', $palindrome));

    for ($i = 0; $i < intdiv(mb_strlen($palindrome) - 1, 2); $i++) {
        if (mb_substr($palindrome, $i, 1)
            != mb_substr($palindrome, mb_strlen($palindrome) - $i - 1, 1)) {
            $isPalindrome = false;
        }
    }

    return $isPalindrome;
}

function task6()
{
    echo 'Текущая дата: ' . date('d.m.y H:i', time());

    $mt = mktime(0, 0, 0, 2, 24, 16);
    echo '<br> unixtime время соответствующее 24.02.2016 00:00:00: ' . $mt;
}

function task7()
{
    $str1 = 'Карл у Клары украл Кораллы';
    echo 'Исходная строка: ' . $str1 . '<br>';

    $str1 = str_replace('К', '', $str1);
    echo 'Результат: ' . $str1 . '<br><br>';

    $str2 = 'Две бутылки лимонада';
    echo 'Исходная строка: ' . $str2 . '<br>';

    $str2 = str_replace('Две', 'Три', $str2);
    echo 'Результат: ' . $str2;
}

function task8($str)
{
    if (preg_match('|:\)|', $str)) {
        smile();
    } else {
        preg_match('|packets:(\d*)|', $str, $matches);

        if ($matches[1] > 1000) {
            echo 'Сеть есть';
        }
    }
}

function task9($fileName)
{
    $handle = fopen($fileName, 'r');
    echo fread($handle, filesize($fileName));
    fclose($handle);
}

function task10()
{
    $handle = fopen('/home/maxim/anothertest.txt', 'w');

    if ($handle) {
        fwrite($handle, 'Hello again!');
        fclose($handle);
    }
}

function smile()
{
    echo '<pre style="line-height: 0.5">';
    echo nl2br('
                              oooo$$$$$$$$$$$$oooo
                          oo$$$$$$$$$$$$$$$$$$$$$$$$o
                       oo$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o         o$   $$ o$
       o $ oo        o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o       $$ $$ $$o$
    oo $ $ "$      o$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$o       $$$o$$o$
    "$$$$$$o$     o$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$o    $$$$$$$$
      $$$$$$$    $$$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$$$$$$$$$$$$$$
      $$$$$$$$$$$$$$$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$$$$$$  """$$$
       "$$$""""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$
        $$$   o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$o
       o$$"   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$       $$$o
       $$$    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$" "$$$$$$ooooo$$$$o
      o$$$oooo$$$$$  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$   o$$$$$$$$$$$$$$$$$
      $$$$$$$$"$$$$   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     $$$$""""""""
     """"       $$$$    "$$$$$$$$$$$$$$$$$$$$$$$$$$$$"      o$$$
                "$$$o     """$$$$$$$$$$$$$$$$$$"$$"         $$$
                  $$$o          "$$""$$$$$$""""           o$$$
                   $$$$o                                o$$$"
                    "$$$$o      o$$$$$$o"$$$$o        o$$$$
                      "$$$$$oo     ""$$$$o$$$$$o   o$$$$""
                         ""$$$$$oooo  "$$$o$$$$$$$$$"""
                            ""$$$$$$$oo $$$$$$$$$$
                                    """"$$$$$$$$$$$
                                        $$$$$$$$$$$$
                                         $$$$$$$$$$"
                                          "$$$""""');
    echo '</pre>';
}

function isPalindrome($isPalindrome, $palindrome)
{
    if ($isPalindrome) {
        echo 'Строка: "' . $palindrome . '" является палиндромом';
    } else {
        echo 'Строка: "' . $palindrome . '" не является палиндромом';
    }
}
