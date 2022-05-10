<?php
$user = 'u41028';
$pass = '2356452';
$db = new PDO('mysql:host=localhost;dbname=u41028', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
$pass_hash=array();
try{
  $get=$db->prepare("select pass from admin where user=?");
  $get->execute(array('admin'));
  $pass_hash=$get->fetchAll()[0][0];
}
catch(PDOException $e){
  print('Error: '.$e->getMessage());
}
if (empty($_SERVER['PHP_AUTH_USER']) ||
      empty($_SERVER['PHP_AUTH_PW']) ||
      $_SERVER['PHP_AUTH_USER'] != 'admin' ||
      md5($_SERVER['PHP_AUTH_PW']) != $pass_hash) {
    header('HTTP/1.1 401 Unanthorized');
    header('WWW-Authenticate: Basic realm="My site"');
    print('<h1>401 Unauthorized (Требуется авторизация)</h1>');
    exit();
}
if(empty($_GET['edit_id'])){
  header('Location: admin.php');
}
