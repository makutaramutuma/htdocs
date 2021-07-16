<?php
ini_set("display_errors", "Off");

$mail=$_POST['mail'];
$pass=$_POST['password'];
$log=$_POST['log'];

try{

  $dsn = 'mysql:dbname=fits;host=localhost;charset=utf8';
  $user = 'root';
  $password='root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM user WHERE mail=? ";
  $stmt = $dbh->prepare($sql);
  $data[]=$mail;
  $stmt->execute($data);
  $dbh = null;

  $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rec as $id)


  if($id['mail']!=$mail){
    print 'メールアドレス若しくはパスワードが間違っています。</br>';
    print '<a href="login_user.php">戻る</a>';

  }elseif(password_verify ($pass, $id['password'])=== false){
    print 'パスワードが間違っています。</br>';
    print '<a href="login_user.php">戻る</a>';

  }
  else
  {
    session_start();
    $_SESSION['mail']=$mail;
    $_SESSION['log']=$log;
    $_SESSION['i']=$id['id'];

    header('Location:top.php');
    exit();
  }
}
  catch(Exception $e){
    print 'エラーです。';
    exit();
  }

?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Signin Template for Bootstrap · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>



  <body class="text-center">


<main class="form-signin">









</main>



  </body>
</html>
