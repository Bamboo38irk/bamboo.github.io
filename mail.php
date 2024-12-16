<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отправка HTML-писем</title>
</head>
<body>
<h1>Отправка HTML-писем</h1>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $to = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $message = $_POST['htmlContent'];
        $subject = "HTML письмо";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@example.com" . "\r\n";

        if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
            if (mail($to, $subject, $message, $headers)) {
                echo "<p style='color: green;'>Письмо успешно отправлено на $to</p>";
} else {
echo "<p style='color: red;'>Ошибка при отправке письма.</p>";
}
} else {
echo "<p style='color: red;'>Некорректный адрес электронной почты.</p>";
}
}
?>
<form method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="htmlContent">HTML-код письма:</label><br>
    <textarea id="htmlContent" name="htmlContent" rows="10" cols="50" required></textarea><br><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
