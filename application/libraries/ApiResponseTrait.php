<?php 
trait ApiResponseTrait{
    public $authorized = true;
    public $token = null;
    function response($data = null,$message = "Successfully",$success = true){
        $this->output->set_header('Content-Type: application/json');
        $this->output->set_status_header($success?200:400);
        $this->output->set_output(json_encode(array(
            "success" => $success,
            "message" => $message,
            "data" => $data
        )));
    }
    function unauthrizedResponse(){
        $this->output->set_header('Content-Type: application/json');
        $this->output->set_status_header(401);
        echo json_encode(array(
            "success" => false,
            "message" => "Unathorized",
            "data" => null
        ));
        return;
    }
    function is_authenticated(){
        $this->authorized = $this->input->get("token") != null;
        if($this->input->get("token")){
            // TODO: check token is matched with database or not
            $result = $this->db->where("token",$this->input->get("token"))->get('pengguna')->row();
            if($result){
                $this->token = $this->input->get("token");
                return true;
            }else{
                $this->authorized = false;
            }
        }
        // TODO: validate token access
        return $this->authorized;
    }
    function decodePost(){
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
		return json_decode($stream_clean);
    }
}