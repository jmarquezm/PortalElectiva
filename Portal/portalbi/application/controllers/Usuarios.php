<?php
class Usuarios extends CI_Controller

{

public function __construct(){

parent::__construct();

	//Load the user model
	
$this->load->model('UsuariosModel');
$this->load->helper('url');


}

	public function Login()
		{

		// si se hiso click en el boton del formulario recibimos los valores

		$username = $this->input->post('user');
		$pass = $this->input->post('pass');

		// preguntamos si existe el usuario

		$perfil = $this->UsuariosModel->login($username, $pass);

		// si existe capturamos el id del rol y nombre de usuario

		if ($perfil)
			{
			$rol = $perfil['id_rol'];
			$user = $perfil['usuario'];
			$iduser = $perfil['idUsuario'];

			// creamos la sesion del usuario

			$this->session->set_userdata('iduser', $iduser);
			$this->session->set_userdata('usuario', $user);
			$this->session->set_userdata('idrol', $rol); //capturamos el rol para generar el menu dinamico

			// segun sea el rol asi lo redirecionanos al portal

			/*switch ($rol)
				{
			case 1:

				// seleccionamos las opciones por rol para formar el menu dinamico

				$rol_x_user = $this->user_model->get_rol_x_user($rol);
				$data['menu'] = $rol_x_user; //mandamos el array de menu a la vista para recorrerlo ahi
				$usuario = $this->session->userdata('usuario');
				$data['title'] = '::.Bienvenidos a Deliboquitas.::';
				$data['usuario'] = $usuario;

				// $data['usuarios']=$this->list_user();

				$data['main_content'] = 'welcome_admin'; //mandamos a llamar a la vista que tendra el contenido
				$this->load->view('template/template', $data);
				break;

			case 2:
				$rol_x_user = $this->user_model->get_rol_x_user($rol);
				$data['menu'] = $rol_x_user; //mandamos el array de menu a la vista para recorrerlo ahi
				$usuario = $this->session->userdata('usuario');
				$data['title'] = '::.Cuadro de Mano Integral.::';
				$data['usuario'] = $usuario;

				// obtenemos los valores esperados y actuales de los kpi para recorrerlos en la vista

				$valores1 = $this->cmi_model->get_valor_actual_objetivo1();
				$valores2 = $this->cmi_model->get_valor_actual_objetivo2();
				$valores3 = $this->cmi_model->get_valor_actual_objetivo3();
				$valores4 = $this->cmi_model->get_valor_actual_objetivo4();
				$valores5 = $this->cmi_model->get_valor_actual_objetivo5();
				$data['valores1'] = $valores1; //enviamos los valores a la vista para definir q valor poner segun su porcentaje
				$data['valores2'] = $valores2; //enviamos los valores a
				$data['valores3'] = $valores3; //enviamos los valores a
				$data['valores4'] = $valores4;
				$data['valores5'] = $valores5;

				// obtenemos la info del cmi

				$info_kpi = $this->cmi_model->get_info_kpi();
				$data['cmi'] = $info_kpi; //mandamos el array para recorrerlo en la vista del cmi
				$data['main_content'] = 'cmi'; //mandamos a llamar a la vista que tendra el contenido
				$this->load->view('template/template', $data);
				break;

			case 3:
				$rol_x_user = $this->user_model->get_rol_x_user($rol);
				$data['menu'] = $rol_x_user; //mandamos el array de menu a la vista para recorrerlo ahi
				$usuario = $this->session->userdata('usuario');
				$data['title'] = '::.Bienvenidos a Deliboquitas.::';
				$data['usuario'] = $usuario;
				$data['main_content'] = 'welcome_admin'; //mandamos a llamar a la vista que tendra el contenido
				$this->load->view('template/template', $data);
				break;

			case 4:
				$rol_x_user = $this->user_model->get_rol_x_user($rol);
				$data['menu'] = $rol_x_user; //mandamos el array de menu a la vista para recorrerlo ahi
				$usuario = $this->session->userdata('usuario');
				$data['title'] = '::.Bienvenidos a Deliboquitas.::';
				$data['usuario'] = $usuario;
				$data['main_content'] = 'welcome_admin'; //mandamos a llamar a la vista que tendra el contenido
				$this->load->view('template/template', $data);
				break;

			default:
				$this->load->view('login');
				break;
				} */

				$this->load->view('indexAdmin');
			}
		  else
			{
			    echo "<script type='text/javascript'>alert('acceso denegado intente nuevamente!');</script>";
			    $this->load->view('Welcome/index');
			}
		}
	}
