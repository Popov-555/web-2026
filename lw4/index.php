<?php
function chekYear($year): string 
{
    if ($year >= 1 && $year <= 30000)
        if (($year % 4 == 0 && $year % 100 != 0 ) || ($year % 400 == 0 )) {
            return "YES";
        }
        else {
            return "NO";
        }
    else{
        echo "Число не должно превышать 30000";
    }
}

function digitToWord(int $digit): string
{
    $words = [
        0 => 'Ноль',
        1 => 'Один',
        2 => 'Два',
        3 => 'Три',
        4 => 'Четыре',
        5 => 'Пять',
        6 => 'Шесть',
        7 => 'Семь',
        8 => 'Восемь',
        9 => 'Девять'
    ];
    if ($digit >= 0 && $digit <= 9) {
        return $words[$digit];
    }
    else {
        return 'Ошибка: введите цифру от 0 до 9';
    }
}
function checkTicket(int $tickerNumber): bool {
    $digits = [0, 0, 0, 0, 0, 0];
    for ($i = 5; $i >=0; --$i) {
        $digits[$i] = $tickerNumber % 10;
        $tickerNumber = intdiv($tickerNumber, 10);
    }
    $sum1 = $digits[0] + $digits[1] + $digits [2];
    $sum2 = $digits[3] + $digits[4] + $digits [5];
    return $sum1 === $sum2;
}
function factorial(int $number): int
{
    if ($number <= 1) {
        return 1;
    }

    return $number * factorial($number - 1);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programs</title>
</head>
<body>
    <h2>Проверка високосного года</h2>
    <form method="post">
        <input type="number" name="year" required>
        <button type="submit">Проверить</button>
    </form>
    <p>
        <?php
        if (isset($_POST['year'])){
           echo chekYear((int)$_POST['year']);
        }
        ?>
    </p>

    <h2>Введите цифру от 0 до 9</h2>
    <form method="post">
        <input type="number" name="digit" required>
        <button type="submit">Показать слово</button>
    </form>
    <p>
        <?php
        if (isset($_POST['digit'])) {
            echo digitToWord((int)$_POST['digit']);
        }
        ?>
    </p>
    <h2>Найти все счастливые билеты</h2>

    <form method="post">
        <label>Начальный номер:</label>
        <input type="number" name="start" required>

        <label>Конечный номер:</label>
        <input type="number" name="end"  required>

        <button type="submit" name="submitTickets">Показать билеты</button>
    </form>

    <p>
        <?php
        if (isset($_POST['submitTickets']) && isset($_POST['start']) && isset($_POST['end'])) {
            $start = (int)$_POST['start'];
            $end = (int)$_POST['end'];

            for ($ticket = $start; $ticket <= $end; ++$ticket) {
                if (checkTicket($ticket)) {
                    echo $ticket . '<br>';
                }
            }
        }
        ?>
    </p>

    <h2>Вычислить факториал</h2>

    <form method="post">
        <input type="number" name="number" min="0" required>
        <button type="submit">Посчитать</button>
    </form>

    <p>
    <?php
    if (isset($_POST['number'])) {
        echo factorial((int)$_POST['number']);
    }
?>
</p>
</body>
</html>
