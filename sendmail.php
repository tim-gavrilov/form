<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailrel/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->IsHTML(true);

  $mail->setForm('kzn.rf@ya.ru', 'Проверка формы');
  $mail->addAddress('kzn.rf@ya.ru');
  $mail->Subject = 'Привет! Это проверка формы';

  $body = '<h1>Заголовок тестового письма</h1>';

  if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
  }
  if(trim(!empty($_POST['tel']))){
    $body.='<p><strong>tel:</strong> '.$_POST['tel'].'</p>';
  }

  $mail->Body = $body;

  if (!$mail->send()) {
    $message = 'Ошибка';
  }else {
    $message = 'Данные отправлены';
  }

  $response = ['message' => $message];

  header('Content-type: application/json');
  echo json_encode($response);

 ?>
