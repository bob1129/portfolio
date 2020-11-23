<?php
session_start();
$_SESSION = [];

require_once('is_mail.php');

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['subject'] = $subject;
$_SESSION['message'] = $message;

//入力チェックエラーとエラーメッセージ
$flg = 0;

if(empty($name)){
    $_SESSION['name_error'] = '<span class="attention">名前を入力してください</span>';
    $flg = 1;
}

if(empty($email)){
    $_SESSION['email_error'] = '<span class="attention">メールアドレスを入力してください</span>';
    $flg = 1;
}else if(!is_mail($email)){
    $_SESSION['email_error'] = '<span class="attention">メールアドレスを確認してください</span>';
    $flg = 1;
}

// if($flg){
//     header('Location: '.$_SERVER['HTTP_REFERER']);
// }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TKNDDPB');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <title>portfolio</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/css/uikit.min.css">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/style.css">
  <!-- <script src="https://kit.fontawesome.com/dbae26921f.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit-icons.min.js"></script>
  <script src="common/js/main.js"></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKNDDPB" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- CONTACT -->
  <section id="contact">
    <div class="inner">
      <h2 class="title">CONTACT FORM</h2>

      <dl>
         <dt>Your Name</dt>
         <dd><?= $name; ?></dd>
      </dl>
      <dl>
         <dt>Your Email</dt>
         <dd><?= $email; ?></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd><?= $subject; ?></dd>
      </dl>
      <dl>
        <dt>Your Message</dt>
        <dd><?= $message; ?></dd>
      </dl>

      <p class="uk-button uk-button-primary"><a href="index.html">戻る</a></p>
      <p class="uk-button uk-button-primary"><a href="send.php">この内容で送信</a></p>

    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="inner">
      <p><small>Copyright&COPY;Toyokazu Mori. All Rights Reserved.</small></p>
    </div>
  </footer>
</body>

</html>