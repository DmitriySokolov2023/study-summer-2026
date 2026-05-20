<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Задание 2.10</title>
</head>

<body>
  <?php
date_default_timezone_set("Europe/Moscow");

  $birthDay = 2;
  $birthMonth = 9;
  $birthYear = 2003;
  $birthHour = 10;
  $birthMinute = 25;
  $birthSecond = 40;

  $currentTimestamp = time();

  if ($birthYear >= 1970) {
      $birthTimestamp = mktime($birthHour, $birthMinute, $birthSecond, $birthMonth, $birthDay, $birthYear);
      $ageSeconds = $currentTimestamp - $birthTimestamp;
      $method = "Возраст вычислен через функции mktime() и time().";
  } else {
      $birthDate = new DateTime("$birthYear-$birthMonth-$birthDay $birthHour:$birthMinute:$birthSecond");
      $nowDate = new DateTime();
      $ageSeconds = $nowDate->getTimestamp() - $birthDate->getTimestamp();
      $method = "Для даты до 1970 года удобнее использовать DateTime, так как на Windows могут быть проблемы с отрицательными Unix-метками времени.";
  }

  $ageDays = floor($ageSeconds / 86400);
  $ageMonths = floor($ageDays / (365 / 12));
  $ageYears = floor($ageDays / 365);

  echo "<h3>Возраст по дате рождения</h3>";
  echo "Дата рождения: " . sprintf(
      "%02d.%02d.%04d %02d:%02d:%02d",
      $birthDay,
      $birthMonth,
      $birthYear,
      $birthHour,
      $birthMinute,
      $birthSecond
  ) . "<br><br>";

  echo "Текущая Unix-метка времени: $currentTimestamp<br>";
  echo "Эпоха Unix - это 01.01.1970 00:00:00 GMT.<br>";
  echo $method . "<br><br>";

  echo "Возраст в секундах: $ageSeconds<br>";
  echo "Возраст в днях: $ageDays<br>";
  echo "Возраст в месяцах: $ageMonths<br>";
  echo "Возраст в годах: $ageYears<br>";
  ?>
</body>

</html>