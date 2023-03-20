<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная работа №3</title>
</head>
<body>
  <?php
  session_start(); // Начинаем сессию
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { // Проверяем, авторизован ли пользователь
    include ("Php_main.PHP");
    echo '<a href="logout.php">Выход</a>'; // Кнопка выхода из сессии
  } else { // Если не авторизован
    if(isset($_POST['login']) && isset($_POST['password'])){ // Проверяем, были ли отправлены логин и пароль
        $login = $_POST['login'];
        $password = $_POST['password'];
        include("Php_connect.PHP"); // Подключаемся к БД
        $result = mysqli_query($conn, "SELECT password FROM users WHERE login='$login'"); // Делаем запрос на поиск пользователя по логину
        $user = mysqli_fetch_assoc($result);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true; // Устанавливаем статус авторизации в true
            include ("Php_main.PHP"); // Загружаем основной контент
            echo '<a href="logout.php">Выход</a>'; // Кнопка выхода из сессии
        } else {
            echo "Извините, но вы ввели неправильный логин или пароль.";
        }
    } else { // Если логин и пароль не были отправлены, то выводим форму авторизации
        echo '<form method="POST">
            <label>Логин:</label>
            <input type="text" name="login">
            <br>
            <label>Пароль:</label>
            <input type="password" name="password">
            <br>
            <input type="submit" value="Войти">
        </form>';
    }
  }
  ?>
  <h1 style="text-align: center;">
    <?php ContentLoad("name", 1);?>
  </h1>
  <br>
  <div style="max-width: 50%; align-content: center; margin-left: 24%; margin-right: 24%;">
    <?php ContentLoad("text", 1);?>
  </div>
</body>
</html>