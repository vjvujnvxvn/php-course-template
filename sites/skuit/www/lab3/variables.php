<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лаб 3 - Основы PHP</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        .section { margin: 20px 0; padding: 15px; background: #f9f9f9; }
        form { margin: 15px 0; }
        input, button { padding: 8px; margin: 5px; }
        .result { color: green; font-weight: bold; }
        .variable { color: blue; }
        .hint { color: #666; font-size: 0.9em; font-style: italic; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Лабораторная работа 3</h1>

<?php
// 1. Базовые переменные
$name = 'Вадим';
$age = 18;
$heightCm = 177; 
$isStudent = true;
$grades = [4, 5, 3, 5, 3];
?>
<div class='container'>
    <h1>Лабараторная работа 3</h1>
    <?php
    $name = 'Иван Петров';
    $age = 20;
    $heightCm = 175;
    $isStudent = true;
    $grades = [4, 5, 3, 5, 4];
    ?>
    <div class='selection'>
        <h2>1. Базовые переменные</h2>
        <p> Имя: <span class='variable'><?= $name ?> </span><p>
        <p>Возраст: <span class="variable"><?= $age ?></span></p>
        <p>Рост: <span class="variable"><?= $heightCm ?></span> см</p>
        <p>Студент: <span class="variable"><?= $isStudent ? 'да' : 'нет' ?></span></p>
        <p>Оценки: <span class="variable"><?= implode(', ', $grades) ?></span></p>
</div>
<div class='selection'>
    <h2>2. Математические операции</h2>
    <?php
    $birthyear = 2025 - $age;
    $futureAge = $age +5;
    $heightInches = $heightCm / 2.54;
    $heightMeters = $heightCm / 100;
    $averageGrade = array_sum($grades) / count($grades);
    ?>
    <p>Год рождения: <span class='result'><?= $birthYear ?></span></p>
    <div class="hint">// 2024 - возраст = <?= $birthYear ?></div>
    <p>Возраст через 5 лет: <span class="result"><?= $futureAge ?></span></p>
    <div class="hint">// возраст + 5 = <?= $futureAge ?></div>
    <p>Рост в дюймах: <span class="result"><?= round($heightInches, 2) ?></span></p>
    <div class="hint">// рост в см / 2.54 = <?= round($heightInches, 2) ?></div>
    <p>Рост в метрах: <span class="result"><?= round($heightMeters, 2) ?></span></p>
<div class="hint">// рост в см / 100 = <?= round($heightMeters, 2) ?></div>
<p>Средний балл: <span class="result"><?= round($averageGrade, 2) ?></span></p>
<div class="hint">// array_sum($grades) / count(Sgrades) = <?= round($averageGrade, 2) ?></div>
</div>
<div class="section">
<h2>3. Операции со строками</h2>
<div class='selection'>
    <h2>3. Операции со строками</h2>
    <?php
    $greeting = "Привет," . $name . "!";
    $ageinfo = "Тебе $age лет";
    $uppername = strtoupper($name);
    $nameLength = strlen($name);
    ?>
    <p>Приветствие: <span class="result"><?= $greeting ?></span></p>
    <div class="hint">//"Привет, " . $name . "!"</div>
    <p>Информация: <span class="result"><?= $ageInfo ?></span></p>
<div class="hint">// интерполяция строк: "Тебе $age лет"</div>
<p>Имя в верхнем pеrистре: <span class="result"><?= $upperName ?></span></p>
<div class="hint">// strtoupper($name) - преобразует строку в верхний регистр</div>
<p>Длина имени: <span class="result"><?= $nameLength ?></span> символов</p>
<div class="hint">// strlen($name) - возвращает длину строки</div>
</div>
<div class="section">
    <h2>4. Операции с массивом</h2>
    <?php
    $gradesCount = count($grades);
    $maxGrade = max($grades);
    $minGrade = min($grades);
    ?>
    <p>Количество оценок: <span class="result"><?= $gradesCount ?></span></p>
    <div class="hint">// count($grades) - количество элементов массива</div>
    <p>Максимальная оценка: <span class="result"><?= $maxGrade ?></span></p>
    <div class="hint">// max($grades) - максимальное значение в массиве</div>
    <p>Минимальная оценка: <span class="result"><?= $minGrade ?></span></p>
    <div class="hint">// min($grades) - минимальное значение в массиве</div>
</div>
<div class="section">
    <h2>5. Случайные числа</h2>
    <?php
    $randomInt = rand(1, 100);
    $randomFloat = round(rand(0,100) / 100, 2);
    ?>
    <p>Случайное целое: <span class="result"><?= $randomInt ?></span></p>
    <div class="hint">//rand(1, 100) - случайное число от 1 до 100</div>
    <p>Случайное дробное: <span class="result"><?=$randomFloat ?></span></p>
    <div class="hint">// rand(0, 100) / 100 - случайное число от 0 до 1</div>
</div>
<!-- Форма для расчетов -->
        <div class="section">
            <h2>Калькулятор преобразований</h2>
            <form method="POST">
                <label>Введите рост в см:</label>
                <input type="number" name="heightCm" value="<?= $_POST['heightCm'] ?? '' ?>" required>
                
                <label>Введите возраст:</label>
                <input type="number" name="age" value="<?= $_POST['age'] ?? '' ?>" required>
                
                <button type="submit" name="calculate">Рассчитать</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calculate'])) {
                $inputHeight = $_POST['heightCm'];
                $inputAge = $_POST['age'];
                
                $heightInches = $inputHeight / 2.54;
                $heightMeters = $inputHeight / 100;
                $birthYear = 2024 - $inputAge;
                $randomNumber = rand(1, 100);
                
                echo "<div class='result'>";
                echo "<p>Рост в дюймах: " . round($heightInches, 2) . "</p>";
                echo "<p>Рост в метрах: " . round($heightMeters, 2) . "</p>";
                echo "<p>Год рождения: " . $birthYear . "</p>";
                echo "<p>Случайное число: " . $randomNumber . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
