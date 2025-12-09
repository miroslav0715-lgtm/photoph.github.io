<?php
// Проверяем, что запрос пришел методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : 'Не указано';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : 'Не указано';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : 'Не указано';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : 'Нет сообщения';

    // *** ЗАМЕНИТЕ ЭТОТ АДРЕС НА ВАШ АДРЕС ПОЧТЫ ***
    $to = "your-receiving-email@example.com"; 
    
    $subject = "Новая заявка с сайта от: " . $name;

    // Содержание письма
    $body = "Получена новая заявка:\n\n";
    $body .= "Имя: " . $name . "\n";
    $body .= "Телефон: " . $phone . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Сообщение/Запрос: " . $message . "\n";

    // Заголовки письма
    $headers = "From: webmaster@yourdomain.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        // Успешная отправка: перенаправляем пользователя на главную страницу или страницу успеха
        header('Location: /'); 
        exit;
    } else {
        // Ошибка отправки
        echo "Ошибка при отправке сообщения. Пожалуйста, проверьте настройки почты на сервере.";
    }
} else {
    // Если запрос не POST
    header('Location: /');
    exit;
}
?>
