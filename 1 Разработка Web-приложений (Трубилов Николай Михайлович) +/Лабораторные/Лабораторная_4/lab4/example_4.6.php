<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.6</title>
</head>
<body>
<?php
function vectorStartPoint($vector, $endPoint)
{
    $start = [];
    for ($i = 0; $i < count($vector); $i++) {
        $start[$i] = $endPoint[$i] - $vector[$i];
    }
    return $start;
}

function scalarProjections($a, $b)
{
    $ab = 0;
    $lenA = 0;
    $lenB = 0;

    for ($i = 0; $i < count($a); $i++) {
        $ab += $a[$i] * $b[$i];
        $lenA += $a[$i] * $a[$i];
        $lenB += $b[$i] * $b[$i];
    }

    $lenA = sqrt($lenA);
    $lenB = sqrt($lenB);

    return [
        'pr_a_b' => $ab / $lenA,
        'pr_b_a' => $ab / $lenB
    ];
}

function transposeMatrix($matrix)
{
    $result = [];
    for ($j = 0; $j < count($matrix[0]); $j++) {
        for ($i = 0; $i < count($matrix); $i++) {
            $result[$j][$i] = $matrix[$i][$j];
        }
    }
    return $result;
}

function matrixCharacteristics($matrix)
{
    $n = count($matrix);
    $product = 1;
    $hasNonZero = false;
    $maxDiagonal = $matrix[0][0];

    for ($i = 0; $i < $n; $i++) {
        if ($matrix[$i][$i] > $maxDiagonal) {
            $maxDiagonal = $matrix[$i][$i];
        }

        for ($j = 0; $j < $n; $j++) {
            if ($i > $j && $matrix[$i][$j] != 0) {
                $product *= $matrix[$i][$j];
                $hasNonZero = true;
            }
        }
    }

    return [
        'product' => $hasNonZero ? $product : 0,
        'maxDiagonal' => $maxDiagonal
    ];
}

function normalizeRows(&$matrix, $rows)
{
    foreach ($rows as $rowNumber) {
        $rowIndex = $rowNumber - 1;
        if ($rowIndex >= 0 && $rowIndex < count($matrix)) {
            for ($j = 0; $j < count($matrix[$rowIndex]); $j++) {
                if ($matrix[$rowIndex][$j] < 0) {
                    $matrix[$rowIndex][$j] = -1;
                } elseif ($matrix[$rowIndex][$j] > 0) {
                    $matrix[$rowIndex][$j] = 1;
                }
            }
        }
    }
}

$vector = [2, -1, 3];
$pointB = [5, 4, 1];
$a = [2, 1, -1];
$b = [1, 2, 3];
$matrix = [
    [5, 2, 3],
    [4, 8, 1],
    [6, 7, 9]
];
$matrix2 = [
    [2, -3, 0, 4],
    [-1, 5, -6, 7],
    [0, -2, 8, -9],
    [3, 0, -4, 1]
];

$startPoint = vectorStartPoint($vector, $pointB);
$projections = scalarProjections($a, $b);
$transposed = transposeMatrix($matrix);
$chars = matrixCharacteristics($matrix);
normalizeRows($matrix2, [1, 3]);

echo "<h3>Пять функций по задачам на массивы</h3>";
echo "1. Начало вектора: (" . implode(', ', $startPoint) . ")<br>";
echo "2. Проекции: pr_a b = " . round($projections['pr_a_b'], 4) . ", pr_b a = " . round($projections['pr_b_a'], 4) . "<br>";
echo "3. Транспонированная матрица:<br>";
for ($i = 0; $i < count($transposed); $i++) {
    echo implode(' ', $transposed[$i]) . "<br>";
}
echo "<br>4. Произведение ниже диагонали = " . $chars['product'] . ", max диагонали = " . $chars['maxDiagonal'] . "<br>";
echo "<br>5. Нормализация строк матрицы:<br>";
for ($i = 0; $i < count($matrix2); $i++) {
    echo implode(' ', $matrix2[$i]) . "<br>";
}
?>
</body>
</html>
