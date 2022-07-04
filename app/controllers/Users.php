<?php
  class Users extends Controller {
    public function __construct(){
      
      $this->userModel = $this->model('User');
    }

    
    public function index()
  {
    $data = [
      'title' => 'About Us',
      'description' => 'App to share posts with other users'
    ];
    $this->view('users/index', $data);
  }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'status' => 'user',
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('success', 'You are registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function reserve(){
      
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'rsvp' => trim($_POST['rsvp']),
          'name_err' => '',
          'email_err' => '',
          'rsvp_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        } else {
          // Check email
          if($this->userModel->findGuestsByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        // // Validate RSVP
        // if(empty($data['rsvp'])){
        //   $data['rsvp_err'] = 'Pleae enter an Idea';
        // } elseif(strlen($data['rsvp']) < 2){
        //   $data['rsvp_err'] = 'rsvp must be at least 2 characters';
        // }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err'])){
          // Validated
          
          // Register User
          if($this->userModel->reserve($data)){
            
            $cookie_name = "wedding_email";
            $cookie_value = urldecode($data['email']);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            ($data['rsvp'] == '2') ? flash('fail', 'Awww sorry that you can\'t make it') : flash('success', 'You\'ve Successfully RSVP\'d, please choose your prefferences below:');
            ($data['rsvp'] == '1') ? redirect('users/prefferences') : redirect('pages');
            // redirect('pages');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/reserve', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'rsvp' => '',
          'name_err' => '',
          'email_err' => '',
          'rsvp_err' => ''
        ];

        // Load view
        $this->view('users/reserve', $data);
      }
    }

    public function prefferences(){
      
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'prefferences' => serialize($_POST['prefferences'])
        ];

          // Register User
          if($this->userModel->prefferences($data)){
            flash('success', 'Thank you for adding your prefferences, see you at the wedding!');
            redirect('');


        } else {
          // Load view with errors
          $this->view('users/prefferences', $data);
        }

      } else {
        // Init data
        $data =[

          'email' => '',
          'prefferences' => ''

        ];

        // Load view
        $this->view('users/prefferences', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      $_SESSION['user_status'] = $user->status;
      ($user->status == 'admin') ? redirect('') : redirect('posts/index');
      // redirect('posts/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

   
  }