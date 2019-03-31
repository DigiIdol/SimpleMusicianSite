<?php
$post = (!empty($_POST)) ? true : false;
if($post) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $captcha_code = $_POST['captcha_code'];
  $error = '';
  if(!$name) {$error .= 'Укажите свое имя. ';}
  if(!$email) {$error .= 'Укажите электронную почту. ';}
  if($captcha_code != 12) {$error .= 'Код проверки введен некорректно, либо пуст. ';}
  if(!$message || strlen($message) < 1) {$error .= 'Введите сообщение. ';}
  if(!$error) {
    $address = "i@kayber.ru";
    $sub = "Тема сообщения здесь";
    $mes = "Имя: ".$name."\n\nE-mail: ".$email."\n\nТелефон: ".$mytel."\n\nСообщение: ".$message."\n\n";
    $send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");
    if($send) {echo 'OK';}
  }
  else {echo '<div class="err">'.$error.'</div>';}
}
?>