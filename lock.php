<?php 
  session_start();
  if(isset($_POST['token_acesso']) && isset($_POST['pass'])){

    $pass = $_POST['pass'];
    $stored_hash = $_SESSION['p_hash'];

    $verify = password_verify($pass, $stored_hash);
    if($_POST['token_acesso'] == $_SESSION['token_acesso']){

      if($verify){
        include_once("dbcon.php");
        $_SESSION['token_acesso'] = md5(crypt(date("FjYgia")));
        $_SESSION['start_login'] = time();
        $_SESSION['logout_time'] = $_SESSION['start_login'] + 60 * 60;
        $_SESSION['exp_time'] = $_SESSION['start_login'] + 30 * 60;
        $ultimo_acesso = date('d/m/Y - H:i:s');

        $tipoUser = $_SESSION['tipo_user'];
        $id = $_SESSION['user_id'];

        $sql = "UPDATE usuarios SET ultimo_acesso = '$ultimo_acesso' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){
          if($tipoUser == 'admin'){
            $_SESSION['not-auth'] = false;
            unset($_SESSION['erro_login']);
            header('Location: admin/index.php');
          }
          if ($tipoUser == 'membro'){
            $_SESSION['not-auth'] = false;
            unset($_SESSION['erro_login']);
            header('Location: membro/index.php');
          }
        }
      } else {
        $_SESSION['erro_login'] = 'Senha inválida.';
        $_SESSION['not-auth'] = true;
        header('Location: login/lock.php');
      }
    }
  }
?>