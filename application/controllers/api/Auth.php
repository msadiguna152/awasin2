<?php 
require_once APPPATH . 'libraries/ApiResponseTrait.php';
class Auth extends CI_Controller{
    use ApiResponseTrait;
    public function __construct(){
        parent::__construct();
        $this->load->model('pegawai/Mpengguna');
    }
    public function login(){
        $request = $this->decodePost();
        $currentUser = $this->Mpengguna->getUserByUsernameAndPassword($request->username, $request->password);
        if($currentUser){
            $this->Mpengguna->updateToken($currentUser->id_pengguna,md5($currentUser->id_pengguna.$currentUser->nama_pengguna.$currentUser->username));
            return $this->response(md5($currentUser->id_pengguna.$currentUser->nama_pengguna.$currentUser->username),"Login berhasil",true);
        }
        return $this->response(null,"Login gagal",false);
    }
    public function current_user(){
        if(!$this->is_authenticated()){
            return $this->unauthrizedResponse();
        }
        $result = $this->Mpengguna->getUserByToken($this->token);
        return $this->response($result,"Data berhasil diambil",true);
    }
    public function change_password(){
        if(!$this->is_authenticated()){
            return $this->unauthrizedResponse();
        }
        $result = $this->Mpengguna->updatePassword($this->token);
        $this->response(null,$result,$result === "Success");
    }
}