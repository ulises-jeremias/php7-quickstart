<?php

  if(!empty($_POST['email']) and !empty($_POST['pass'])) {
    $db = new Connection();
    //prepare login data for query
    $email = $db->real_escape_string($_POST['email']);
    $pass = Func::encrypt($_POST['pass']);
    $sql = $db->query("SELECT idUser FROM Users WHERE (email='$email' AND password='$pass') LIMIT 1;");
    if($db->rows($sql) > 0) {
      if($_POST['session']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
      $data = $db->fetch_array($sql);
      (new Sessions)->generate_session($data['idUser']);
      echo 1;
    } else {
      echo 'Credentials are incorrect.';
    }
    $db->close();
  } else {
    echo 'All data must be full.';
  }

?>
