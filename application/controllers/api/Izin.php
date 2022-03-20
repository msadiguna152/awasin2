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
                $changedData = array_map(function($item){
                    $item->waktu_pengajuan = format_indo2($item->waktu_pengajuan);
                    $item->tanggal = format_indo2($item->tanggal);
                    return $item;
                },$data);
                $this->response($changedData,"Izin berhasil diambil",true);
            }
    }
    public function get($id){
            if($this->authorized){
                $data = $this->Mizin->getIzinById($id);
                if($this->input->get("with") && $this->input->get("with") == "lokasi"){
                    $data->lokasi = $this->Mizin->getLokasiById($id);
                }
                $data->waktu_pengajuan = format_indo2($data->waktu_pengajuan);
                $data->tanggal = format_indo2($data->tanggal);
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