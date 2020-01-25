<?php 

 function is_logged_in(){

    $securityAccess = get_instance();
    if (!$securityAccess->session->userdata('email')) {
        redirect('Auth');
    }else {
        $role_id = $securityAccess->session->userdata('role_id');
        $menu = $securityAccess->uri->segment(1);
    
        $queryMenu = $securityAccess->db->get_where('auth_menu',['menu' => $menu])->row_array();
        $menu_id   = $queryMenu['id'];
    
        $userAccess = $securityAccess->db->get_where('auth_access_menu',['role_id' => $role_id, 'menu_id' => $menu_id ]); 
    
        if($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    
    }

}
