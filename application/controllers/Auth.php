<?php 

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // untuk login
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'valid_email' => 'Check Your Email, email Not Valid',
            'required'    => 'Please insert your email!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',[
            'required'    => 'Please insert your password!',
            'min_length'  => 'password to short!'
        ]);
            if($this->form_validation->run() == false) {
                $this->load->view('Auth/login');
            }else {
                // membuat private method untuk handle login
                    $this->_login();
            }
    }

    // private login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('auth', ['email' => $email ])->row_array();

        if($user){
            // user sudah mendaftar
            if($user['is_active'] == 1){
                // user sudah aktif
                if(password_verify($password, $user['password'])){
                    // password sudah verifikasi
                    $data = [
                        'email'   => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // jika admin masuk ke dasboard admin
                    if($user['role_id']==1) {
                        redirect('admin');
                    }else{
                        redirect('user');
                    }

                }else{
                        // belom verify
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Wrong Password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('Auth');
        
                }
            }else {
                // user belom aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                This Email has Not Been Actived! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('Auth');

    
            }
        }else {
            // jika tidak lolos
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email Not Registred! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Auth');


        }


    }
    
        // untuk logout
        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        You have been logout!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('auth');

        }
    
    // untuk pendaftaran
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Username', 'required|trim',[
            'required' => 'Username Must Be Insert!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches'       => 'password dont match',
            'min_length'    => 'password too short!',
            'required'      => 'Insert Password!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if($this->form_validation->run() == false) {

            $this->load->view('Auth/register');
        }else {
            $data = [
                'nama'          =>htmlspecialchars( $this->input->post('nama',true)),
                'email'         =>htmlspecialchars($this->input->post('email',true)) ,
                'image'         =>'default.jpg',
                'password'      =>password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 0,
                'date_created'  => time()

            ];
            // $this->db->insert('auth',$data);

            $this-> kirimEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Congratulation! your account has been created. Please Login 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('auth');


        }

    }

    private function kirimEmail()
    {
        //send email with smtp 
        //     $config = Array(
        //         'mailtype'  => 'html',
        //         'charset'   => 'utf-8',
        //         'protocol'  => 'smtp',
        //         'smtp_host' => 'smtp.gmail.com',
        //         'smtp_user' => 'avifiqriy@gmail.com',
        //         'smtp_pass' => '@Yusuf123',
        //         'smtp_crypto' => 'ssl',
        //         'smtp_port' => 465,
        //         'crlf'      => "\r\n",
        //         'newline'   => "\r\n"
        //     );

        //     $this->load->library('email',$config);
        //     $this->email->initialize($config);

        //     $this->email->from('avifiqriy@gmail.com', 'Yusuf Avifiqri');
        //     $this->email->to('myusufavifiqri@gmail.com');

        //     $this->email->subject('test aplikasi');
        //     $this->email->message('hello world');


        // if($this->email->send()){
        //     return true;
        // }else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
        $this->load->library('email');

        $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.sendgrid.net',
          'smtp_user' => 'apikey',
          'smtp_pass' => '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',
          'smtp_port' => 587,
          'crlf' => "\r\n",
          'newline' => "\r\n"
        ));
        
        $this->email->from('avifiqriy@gmail.com', 'Yusuf avifiqri');
        $this->email->to('myusufavifiqri@gmail.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        
        echo $this->email->print_debugger();



    }


    // untuk konfirmasi lupa password
    public function forgotpassword()
    {
        $this->load->view('Auth/forgotpassword');
    }

    // pengaman untuk useraccess
    public function blocked() {
        
        echo "access blocked!"; 
    }
}