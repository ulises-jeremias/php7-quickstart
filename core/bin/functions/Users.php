<?php

function Users() {
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Users ORDER BY _admin, registration_date;");
  if($db->rows($sql) > 0) {
    //make Users matrix to return
    while ($d = $db->fetch_array($sql)) {
      $users[$d['idUser']] = array(
        'idUser' => $d['idUser'],
        'name' => $d['name'],
        'surname' => $d['surname'],
        'email' => $d['email'],
        'state' => ($d['state'] == 1),
        'reg_date' => $d['registration_date'],
        'role' => ($d['_admin'] == 1) ? 'admin' : 'user'
        //put user's info here if there is more in the db
      );
    }
  } else {
    $users = false; //if can not generate the matrix, return false
  }
  $db->close();
  return $users;
}

?>
