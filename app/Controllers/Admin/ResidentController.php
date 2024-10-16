<?php
namespace App\Controllers\Admin;
use App\Models\ResidentModel;
use CodeIgniter\Controller;

class ResidentController extends Controller {
    protected $residentModel;

    public function __construct()
    {
        $this->residentModel = new ResidentModel();
    }
    public function index(){
    
        $model = new ResidentModel();
        $data['resident'] = $model->findAll();
        return view('Views/admin/page/resident', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');
        $residentModel = new ResidentModel();

        $resident = $residentModel->like('resident_name', $keyword)->findAll();

        if (empty($resident)) {
            return $this->response->setJSON(['resident' => []]); 
        }

        return $this->response->setJSON(['resident' => $resident]);
    } 

    public function create()
    {
        if($this -> request->getMethod()==='POST'){
            $validation = \Config\Services::validation();
            $residentModel = new ResidentModel();

        //     var_dump($_POST);
        // DIE();
           
        if (! $this->validate([
            'resident_name' => [
                'rules' => 'required|min_length[5]|regex_match[/^[\p{L}\s]+$/u]',
                'errors' => [
                    'required' => 'Tên cư dân không được để trống.',
                    'min_length' => 'Tên cư dân phải có ít nhất 5 ký tự.',
                    'regex_match' => 'Tên cư dân chỉ được chứa các ký tự chữ cái có dấu và khoảng trắng.'
                ]
            ],
            'birth' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Ngày sinh không được để trống.',
                    'valid_date' => 'Ngày sinh phải đúng định dạng YYYY-MM-DD.'
                ]
            ],
            'gender' => [
                'rules' => 'required|in_list[Nam,Nữ]',
                'errors' => [
                    'required' => 'Giới tính không được để trống.',
                    'in_list' => 'Giới tính chỉ có thể là Nam hoặc Nữ.'
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[10]|max_length[11]',
                'errors' => [
                    'required' => 'Số điện thoại không được để trống.',
                    'numeric' => 'Số điện thoại phải là số.',
                    'min_length' => 'Số điện thoại phải có ít nhất 10 số.',
                    'max_length' => 'Số điện thoại không được vượt quá 11 số.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email không được để trống.',
                    'valid_email' => 'Email không đúng định dạng.'
                ]
            ]
        ])) {
            // Nếu không hợp lệ, trả về lỗi
            return $this->response->setStatusCode(400)->setJSON([
                'status' => -1,
                'messages' => $validation->getErrors()
            ]);
        } 

            $data=[
                'resident_name' => $this->request->getPost('resident_name'),
                'birth' => $this->request->getPost('birth'),
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'create_at' => date('Y-m-d H:i:s'), 
                'update_at' => date('Y-m-d H:i:s')
            ];
            if($residentModel -> insert($data)){
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

    public function edit($id)
    {
        $resident = $this->residentModel->find($id);

        if (!$resident) {
            return $this->response->setJSON([
                'status' => 0,
                'message' => 'Cư dân không tồn tại!'
            ]);
        }

        if ($this->request->getMethod() === "PUT") {
            $validation = \Config\Services::validation();
            $residentModel = new ResidentModel();

            if (!$this->validate([
                'resident_name' => [
                    'rules' => 'required|min_length[5]|regex_match[/^[\p{L}\s]+$/u]',
                    'errors' => [
                        'required' => 'Tên cư dân không được để trống.',
                        'min_length' => 'Tên cư dân phải có ít nhất 5 ký tự.',
                        'regex_match' => 'Tên cư dân chỉ được chứa các ký tự chữ cái có dấu và khoảng trắng.'
                    ]
                ],
                'birth' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'Ngày sinh không được để trống.',
                        'valid_date' => 'Ngày sinh phải đúng định dạng YYYY-MM-DD.'
                    ]
                ],
                'gender' => [
                    'rules' => 'required|in_list[Nam,Nữ]',
                    'errors' => [
                        'required' => 'Giới tính không được để trống.',
                        'in_list' => 'Giới tính chỉ có thể là Nam hoặc Nữ.'
                    ]
                ],
                'phone' => [
                    'rules' => 'required|numeric|min_length[10]|max_length[11]',
                    'errors' => [
                        'required' => 'Số điện thoại không được để trống.',
                        'numeric' => 'Số điện thoại phải là số.',
                        'min_length' => 'Số điện thoại phải có ít nhất 10 số.',
                        'max_length' => 'Số điện thoại không được vượt quá 11 số.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email không được để trống.',
                        'valid_email' => 'Email không đúng định dạng.'
                    ]
                ]
            ])) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => -1,
                    'messages' => $validation->getErrors()
                ]);
            }

            // Cập nhật dữ liệu
            $data = [
                'resident_name' => $this->request->getPost('resident_name'),
                'birth' => $this->request->getPost('birth'),
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'update_at' => date('Y-m-d H:i:s')
            ];

            if ($this->residentModel->update($id, $data)) {
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

        return $this->response->setJSON($resident);
    }

    public function delete($id)
    {
        $residentModel = new ResidentModel();
        if($residentModel -> delete($id)){
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
        $this->residentModel->delete($id);
        return redirect()->to('/resident');
    }
    
}
