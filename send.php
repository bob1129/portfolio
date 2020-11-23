<?php
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$subject = $_SESSION['subject'];
$message = $_SESSION['message'];

$_SESSION = [];

$agent = $_SERVER['HTTP_USER_AGENT'];

//自動返信メール
$email_title = 'お問い合わせありがとうございます';
$mail_from = 'From:info@toyokazu-mori.com';
$email_body = <<<mail
{$name}様

※こちらのメールは、自動返信メールです。

この度は、お問い合わせいただき、ありがとうございます。
以下の内容で承りました。

お名前
{$name}様

メールアドレス
{$email}

題名
{$subject}

メッセージ
{$message}

mail;

mb_internal_encoding('UTF-8');
mb_language('japanese');
mb_send_mail($email,$email_title,$mail_body,$mail_from);

//管理人にメール
$kanri_email = 'info@toyokazu-mori.com';
$kanri_title = 'ホームページよりお問い合わせがありました';

$kanri_body = <<<kanri
ホームページよりお問い合わせがありました

お名前
{$name}様

メールアドレス
{$email}

題名
{$subject}

メッセージ
{$message}

============
<ユーザーエージェント>
$agent

kanri;


mb_internal_encoding('UTF-8');
mb_language('japanese');
mb_send_mail($kanri_email,$kanri_title,$kanri_body,$mail_from);

header('Location:https://toyokazu-mori.com/portfolio/thanks.html')

?>