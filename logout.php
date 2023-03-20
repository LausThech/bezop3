<?php
session_start(); // Начинаем сессию
session_destroy(); // Разрушаем все сессии
header("Location: index.php"); // Перенаправляем на страницу авторизации
exit; // Прерываем скрипт
?>