<?php

// Функция для определения языка браузера
function getBrowserLanguage() {
  if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    foreach ($languages as $language) {
      $language = trim(substr($language, 0, 2)); // Берем первые два символа (языковой код)
      return $language;
    }
  }
  return 'en'; // Язык по умолчанию - английский
}

// Проверяем, есть ли кука с языком
if (isset($_COOKIE['language'])) {
  $language = $_COOKIE['language'];
} else {
  // Определяем язык браузера
  $language = getBrowserLanguage();

  // Устанавливаем куку на 30 дней
  setcookie('language', $language, time() + (86400 * 30), "/"); // 86400 = 1 день
}

// Определяем, на какой сайт перенаправлять
if ($language == 'ru') {
  $redirectUrl = 'https://nitamaproject.com/ru/'; // Замените на адрес вашего русского сайта
} else {
  $redirectUrl = 'https://nitamaproject.com/en/'; // Замените на адрес вашего английского сайта
}

?>
<!DOCTYPE html>
<html lang="<?php echo ($language == 'ru') ? 'ru' : 'en'; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php echo ($language == 'ru') ? 'Nitama External' : 'Nitama External'; ?>">
  <meta name="keywords" content="<?php echo ($language == 'ru') ? 'nitama external cs2, nitama, nitamaexternal, cs2, cheats, читы, нитама, нитама экстернал' : 'nitama external cs2, nitama, nitamaexternal, cs2, cheats, external, nitama project'; ?>">
  <title><?php echo ($language == 'ru') ? 'Nitama External' : 'Nitama External'; ?></title>

  <meta http-equiv="refresh" content="0; url=<?php echo $redirectUrl; ?>">
  <title>Redirecting...</title>
</head>
<body>
  <p><?php echo ($language == 'ru') ? 'Перенаправление на русскую версию сайта...' : 'Redirecting to the English version of the site...'; ?></p>
  <noscript>
    <p><?php echo ($language == 'ru') ? 'Пожалуйста, включите JavaScript для перенаправления.' : 'Please enable JavaScript to redirect.'; ?></p>
    <a href="<?php echo $redirectUrl; ?>"><?php echo ($language == 'ru') ? 'Перейти по ссылке' : 'Click here to redirect'; ?></a>
  </noscript>
</body>
</html>