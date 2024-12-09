<?php
$originalTime = new DateTimeImmutable("now");
$targetTime = new DateTimeImmutable("2024-12-05 00:00:00");
$interval = $originalTime->diff($targetTime);
$interval = $interval->format("%H:%I:%S (FULL days: %a)");

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>PHP voorbeeld</title>
</head>
<body>
    NOGG <?= $interval ?>. tot sinterklaas
</body>
</html>
