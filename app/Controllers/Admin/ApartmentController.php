<?php
namespace App\Controllers\Admin;
use App\Models\ApartmentModel;
use CodeIgniter\Controller;

 class ApartmentController extends Controller{
    protected $apartmentModel;

    public function __construct()
    {
        $this->apartmentModel = new ApartmentModel();
    }
    //in csdl ra bang
    public function index(){
        $model = new ApartmentModel();
        $data['apartment'] = $model->findAll(); 
        return view("Views/admin/page/apartment", $data);
        
    }

    //Search
    public function search()
    {
        $keyword = $this->request->getGet('q');
        $apartmentModel = new ApartmentModel();

        $apartment = $apartmentModel->like('apart_name', $keyword)->findAll();

        if (empty($apartment)) {
            return $this->response->setJSON(['apartment' => []]); 
        }

        return $this->response->setJSON(['apartment' => $apartment]);
    } 
    
    // Create
    public function create()
    {
       if($this-> request-> getMethod() === "POST"){
            $validation = \Config\Services::validation();
            $apartmentModel = new ApartmentModel();
            if(! $this->validate([
                'apart_name'=>[
                    'rules' => 'required|max_length[5]|regex_match[^CH\d{3}$]',
                    'errors'=> [
                        'required'=> 'Tên căn hộ không được để trống.',
                        'max_length'=> 'Tên căn hộ chỉ có 5 ký tự.',
                        'regex_match'=> 'Tên căn hộ phải đúng định dạng. Vd: CH001'
                    ]
                ],

                'area'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Diện tích không được để trống.',
                        'numeric'=> 'Diện tích phải là số'
                    ]
                ],

                'price'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Giá không được để trống.',
                        'numeric'=> 'Giá phải là số'
                    ]
                ],

                'quantity'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Số phòng không được để trống.',
                        'numeric'=> 'Số phòng phải là số'
                    ]
                ],

                'status'=>[
                    'rules'=> 'required|in_list[Trống, Đang sử dụng]',
                    'errors'=> [
                        'required'=> 'Trạng thái không được để trống.',
                        'in_list'=> 'Trạng thái chỉ có thể là Trống hoặc Đang sử dụng'
                    ]
                ],
            ])) {
                // Nếu không hợp lệ, trả về lỗi
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => -1,
                    'messages' => $validation->getErrors()
                ]);
            } 
    
                $data=[
                    'apart_name' => $this->request->getPost('apart_name'),
                    'area' => $this->request->getPost('area'),
                    'price' => $this->request->getPost('price'),
                    'quantity' => $this->request->getPost('quantity'),
                    'status' => $this->request->getPost('status'),
                    'create_at' => date('Y-m-d H:i:s'), 
                    'update_at' => date('Y-m-d H:i:s')

                ];
                if($apartmentModel -> insert($data)){
                    return $this->response->setStatusCode(200)->setJSON([
                        'status' => 1,
                        'messages' =>'Thêm mới thành công!'
                    ]);
                }else{
                    return $this->response->setStatusCode(200)->setJSON([
                        'status' => 0,
                        'messages' =>'Thêm mới không thành công!'
                    ]);
                }
            }
    
            return $this->response->setStatusCode(404);
    }


    //Update 
    public function edit($id)
    {
        $input = $this->request->getJSON(true);
        // $data = $this->request->getRawInput();
        $data = $this->request->getPost();
        log_message('info', 'Dữ liệu nhận được từ client: ' . json_encode($this->request->getRawInput()));
        $apartment = $this->apartmentModel->find($id);


        if (!$apartment) {
            return $this->response->setJSON([
                'status' => 0,
                'message' => 'Căn hộ không tồn tại!'
            ]);
        }


        if ($this->request->getMethod() === "PUT") {
            $validation = \Config\Services::validation();
            $apartmentModel = new ApartmentModel();
            
            if(! $this->validate([
                'apart_name'=>[
                'rules' => 'required|max_length[5]|regex_match[^CH\d{3}$]',
                    'errors'=> [
                        'required'=> 'Tên căn hộ không được để trống.',
                        'max_length'=> 'Tên căn hộ chỉ có 5 ký tự.',
                        'regex_match'=> 'Tên căn hộ phải đúng định dạng. Vd: CH001'
                    ]
                ],

                'area'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Diện tích không được để trống.',
                        'numeric'=> 'Diện tích phải là số'
                    ]
                ],

                'price'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Giá không được để trống.',
                        'numeric'=> 'Giá phải là số'
                    ]
                ],

                'quantity'=>[
                    'rules'=> 'required|numeric',
                    'errors'=> [
                        'required'=> 'Số phòng không được để trống.',
                        'numeric'=> 'Số phòng phải là số'
                    ]
                ],

                'status'=>[
                    'rules'=> 'required|in_list[Trống, Đang sử dụng]',
                    'errors'=> [
                        'required'=> 'Trạng thái không được để trống.',
                        'in_list'=> 'Trạng thái chỉ có thể là Trống hoặc Đang sử dụng'
                    ]
                ],
            ])) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => -1,
                    'messages' => $validation->getErrors()
                ]);
            }

            // Cập nhật dữ liệu
            $data = [
                'apart_name' => $input['edit_apart_name'],
                'area' => $input['edit_area'],
                'price' => $input['edit_price'],
                'quantity' => $input['edit_quantity'],
                'status' => $input['edit_status']
            ];

            if ($this->apartmentModel->update($id, $data)) {
                return $this->response->setStatusCode(200)->setJSON([
                    'status' => 1,
                    'messages' => 'Cập nhật thành công!'
                ]);
            } else {
                return $this->response->setStatusCode(200)->setJSON([
                    'status' => 0,
                    'messages' => 'Cập nhật không thành công!'
                ]);
            }
        }

        return $this->response->setJSON($apartment);
    }

    // Delete
    public function delete($id)
    {
        $apartmentModel = new ApartmentModel();
        if($apartmentModel -> delete($id)){
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
        $this->apartmentModel->delete($id);
        return redirect()->to('/apartment');
    }
    
 }