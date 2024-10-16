<?php
namespace App\Controllers\Admin;
use App\Models\VehicleModel;
use CodeIgniter\Controller;

class VehicleController extends Controller{
    public function index(){
        $model = new VehicleModel();
        $data ['vehicle'] = $model->findAll();
        return view('Views/admin/page/vehicle', $data);
    } 

    //lấy dữ liệu từ bảng resident
    // public function getVehiclesWithResidents() {
    //     $this->load->database(); // Tải thư viện database
    
    //     $this->db->select('v.id, v.vehicle_name, r.resident_name');
    //     $this->db->from('vehicle v');
    //     $this->db->join('resident r', 'v.resident_name = r.resident_name');
    
    //     $query = $this->db->get();
    //     return $query->result(); // Trả về kết quả
    // }
    // public function showVehicles() {
    //     $data['vehicles'] = $this->getVehiclesWithResidents(); // Lấy dữ liệu
    //     $this->load->view('vehicles_view', $data); // Truyền dữ liệu đến view
    // }
    
    public function create(){
        if($this->request->getMethod()=== 'POST'){
            $validation = \Config\Services::validation();
            $vehicleModel = new VehicleModel();

            if(!$this -> validate([
                'resident_name' =>[
                    'rules' => 'required|min_length[5]|regex_match[/^[\p{L}\s]+$/u]',
                    'errors'=> [
                        'required'=> 'Tên chủ xe không được để trống',
                        'min_length' => 'Tên chủ xe ít nhất phải 5 ký tự',
                        "regex_match"=> 'Tên chủ xe chỉ được chứa các ký tự chữ cái có dấu và khoảng trắng'
                    ]
                ],
                'category'=> [
                    'rules'=> 'required|in_list[Xe Máy, Ôtô]',
                    'errors'=> [
                        'required'=>'Loại xe không được để trống',
                        'in_list' => 'Loại xe chỉ có thể là Xe Máy hoặc Ôtô'
                    ]
                 ],
                'brand'=> [
                    'rules'=> 'required',
                    'errors'=> [
                        'required'=>'Thương hiệu không được để trống',
                    ]
                ],
                'license_plate'=> [
                    'rules'=> 'required|max_length[10]',
                    'errors'=> [
                        'required'=>'Biển số xe không được để trống',
                        'max_length' => 'Biển số xe tối đa 10 ký tự',
                    ]
                ],
                'duration'=> [
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=>'Thời hạn không được để trống',
                        'numeric'=>'Thời hạn phải là số'
                    ]
                ],
            ])){
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => -1,
                    'messages' => $validation->getErrors()
                ]);
            }

            $data = [
                'resident_name' => $this->request->getPost('resident_name'),
                'category' => $this->request->getPost('category'),
                'brand' => $this->request->getPost('brand'),
                'license_plate' => $this->request->getPost('license_plate'),
                'duration' => $this->request->getPost('duration'),
                'in' => date('Y-m-d H:i:s'),
                'out' => date('Y-m-d H:i:s'),
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];

            if($vehicleModel->insert($data)){
                return $this -> response->setStatusCode (200)->setJSON([
                    'status'=> 1,
                    'messages'=>'Thêm mới thành công!'
                ]);
            }else{
                return $this -> response->setStatusCode (200)->setJSON([
                    'status'=> 0,
                    'messages'=>'Thêm mới không thành công!'
                ]);
            }
        }
        return $this -> response->setStatusCode(404)->setJSON;
    }

    public function delete($id)
    {
        $vehicleModel = new VehicleModel();
        if($vehicleModel -> delete($id)){
            return $this->response->setStatusCode(200)->setJSON([
                'status' => 1,
                'messages' =>'Xóa thành công!'
            ]);
        }else{
            return $this->response->setStatusCode(200)->setJSON([
                'status' => 0,
                'messages' =>'Xóa không thành công!'
            ]);
        }
        $this->$vehicleModel->delete($id);
        return redirect()->to('/vehicle');
    }
}
?>