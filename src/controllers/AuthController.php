<?php

namespace Homer\CitasMvc\Controllers;

use Homer\CitasMvc\Models\User;
use Homer\CitasMvc\Lib\Controller;

class AuthController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function logout()
	{
		if(isset($_SESSION['userdata'])) {
			unset($_SESSION['userdata']);
			redirect('/login');
		}
	}

	public function loginForm()
	{	
		$this->render('auth/login');
	}

	public function registerForm()
	{	
		$this->render('auth/register');
	}

	public function login()
	{
		$userModel = new User;

		$email = $this->post('email');
		$password = $this->post('password');

		if(!$email || !$password) {
			$this->flash([
        'type' => 'error',
        'message' => 'Todos los campos son requeridos.'
      ]);
      redirect('/login');
      return;
		}

		$user = $userModel->findByEmail($email);

		if(!$user) {
			$this->flash([
        'type' => 'error',
        'message' => 'Correo o contraseña incorrectos.'
      ]);
      redirect('/login');
      return;
		}

		if(!password_verify($password, $user['password'])) {
			$this->flash([
        'type' => 'error',
        'message' => 'Correo o contraseña incorrectos.'
      ]);
      redirect('/login');
      return;
		}

		$_SESSION['userdata'] = $user;

		redirect('/admin/publicaciones');
	}

	public function register()
	{
		$userModel = new User;

		$email = $this->post('email');
		$password = $this->post('password');
		$username = $this->post('username');
		$repeatPassword = $this->post('repeat_password');

		if(!$email || !$password || !$username || !$repeatPassword) {
			$this->flash([
        'type' => 'error',
        'message' => 'Todos los campos son requeridos.'
      ]);
      redirect('/registro');
      return;
		}

		if($password !== $repeatPassword) {
			$this->flash([
        'type' => 'error',
        'message' => 'Las contraseñas no coinciden.'
      ]);
      redirect('/registro');
      return;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$user = $userModel->create(compact('username', 'email', 'password'));

		if(!$user) {
			$this->flash([
        'type' => 'error',
        'message' => 'Error al crear el usuario.'
      ]);
      redirect('/registro');
      return;
		}

		$_SESSION['userdata'] = $user;

		redirect('/admin/publicaciones');
	}
}