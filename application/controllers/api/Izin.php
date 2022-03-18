<?php
require_once APPPATH . 'libraries/ApiResponseTrait.php';
class Izin extends CI_Controller {
    use ApiResponseTrait;
    public function __construct() {
		parent::__construct();
        $this->load->model("pegawai/Mizin");
        if(!$this->is_authenticated()){
            return $this->unauthrizedResponse();
        }
	}
    public function index(){
            if($this->authorized){
                $data = $this->Mizin->getIzinByToken($this->token);
                $this->response($data,"Izin berhasil diambil",true);
            }
    }
    public function get($id){
            if($this->authorized){
                $data = $this->Mizin->getIzinById($id);
                $this->response($data,"Izin berhasil diambil",true);
            }
    }
    public function update($id){
        if($this->authorized){
            $this->Mizin->updateIzin($id)?
                $this->response(null,"Izin berhasil diupdate",true):
                $this->response(null,"Izin gagal diupdate",true);
        }
    }
    public function store_location($izin_id){
        if($this->authorized){
            $this->Mizin->storeLocation($izin_id)?
                $this->response(null,"Lokasi berhasil disimpan",true):
                $this->response(null,"Lokasi gagal disimpan",true);
        }
    }
}