<?php

namespace Homer\CitasMvc\Middlewares;

class Auth
{
  public static function private()
  {
    if(!isset($_SESSION['userdata'])){
      header('Location: /login');
    }
  }  
}
