<?php 
class Users extends Controller { 
    public function __construct() 
    { 

    } 
    public function register(){
        // Verificar POST 
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        { //Procesa el formulario 
            //sanitizamos los datos que vienen por POST
            $POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
            $data=[
                'name'=>trim($_POST['name']),
                'email'=>trim($POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($POST['confirm_password']),
                'name_error'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];

                //validamos el nombre completo
                if(empty($data['name'])){
                    $data['name_err']= 'Por favor ingrese el nombre completo';
                }
                if(empty($data['email'])){
                    $data['email_err']='Por favor ingrese un email válido';
                }
                //validamos la contraseña
                if(empty($data['password'])){
                    $data['password_err']='Por favor ingrese la contraseña';
                }elseif(strlen($data['password'])<6){
                    $data['password_err']='La contraseña debe tener por lo menos 6 caracteres';
                }
                //validamos el confirm password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err']='Por favor ingrese la contraseña de confirmación';
                }else{
                    if ($data['password']!=$data['confirm_password']){
                        $data['confirm_password_err']='las contraseñas no son iguales, no coinciden';
                    }
                }

                //asegurarse que los errores estén vacíos
                if(empty($data['name_err'])&& empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])){
                    //validando
                    die('Exitoso');
                }else{
                    //carga register con el array de errores y se imprimen en el formulario
                    $this->view('users/register',$data);
                }

        }else{ 
            //Iniciar data 
            $data = [
                'name'=> '', 
                'email'=> '' , 
                'password' => '', 
                'confirm_password' => '', 
                'name_err' => '', 
                'email_err' => '' , 
                'password_err' => '', 
                'confirm_password_err' => '' 
                ]; 
                
                // Cargar vista

                $this->view('users/register', $data); 
            } 
        }
    
    public function login(){
        //verificar post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //procesa el formulario
        }else{
            //inicia data
            $data=[
                'email'=>'',
                'password'=>'',
                'email_err'=>'',
                'password_err'=>''
            ];
            //hay que cargar la vista
            $this->view('users/login', $data);
        }
    }
}
