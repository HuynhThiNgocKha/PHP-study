<?= $this-> extend ('admin/layout/master_admin.php')?>

<?= $this ->section('sidebar')?>
    <?= $this -> include('admin/layout/sidebar.php')?>
<?= $this->endSection()?>

<?= $this ->section('header')?>
    <?= $this -> include('admin/layout/header.php')?>
<?= $this->endSection()?>

<?= $this ->section('main-content')?>
    
    <?= $this->section('content')?>
        <div class="content">        
            <div class="title">
                <h3>Phương Tiện</h3>
            </div> 
            <Button class="add" onclick="openCreateForm()" id="btn_test">Thêm mới</Button>
            <div id="createVehicleModal" style="display: none;" class="background">
                <div class="modal">
                    <form id="createVehicleForm" method="POST" class="modal-content">
                        <h3>Thêm Mới Phương Tiện</h3>

                        <label for="resident_name">Tên Chủ Xe</label>
                        <input type="text" name="resident_name" placeholder="Nhập tên chủ xe" required>
                        <span id="resident_name_err" style="color:red" class="msg_err"></span><br>

                        <label for="category">Loại Xe</label>
                        <select name="category" id="category" required>
                            <option value="Xe Máy">Xe Máy</option>
                            <option value="Ôtô">Ôtô</option>
                        </select><br> 
                        <span id="category_err" style="color:red" class="msg_err"></span><br>

                        <label for="brand">Thương Hiệu</label>
                        <input type="text" name="brand" placeholder="Nhập tên thương hiệu xe" required>
                        <span id="brand_err" style="color:red" class="msg_err"></span><br>

                        <label for="license_plate">Biển Số</label>
                        <input type="text" name="license_plate" placeholder="Nhập biển số xe" required>
                        <span id="license_plate_err" style="color:red" class="msg_err"></span><br>

                        <label for="duration">Thời Hạn</label>
                        <input type="number" name="duration" placeholder="Nhập thời hạn gửi xe " required>
                        <span id="duration_err" style="color:red" class="msg_err"></span>
                        
                        <label for="in">Giờ Vào</label>
                        <input type="datetime-local" name="in" placeholder="Nhập giờ vào" required>
                        <span id="in_err" style="color:red" class="msg_err"></span><br>
                        
                        <label for="out">Giờ Ra</label>
                        <input type="datetime-local" name="our" placeholder="Nhập giờ ra" required>
                        <span id="out_err" style="color:red" class="msg_err"></span><br>

                        <div class="modal-buttons">
                            <button type="button" onclick="closeCreateForm()">Đóng</button>
                            <button type="button" onclick="createVehicle()">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        
            <table>
                <thead>
                        <th>STT</th>
                        <th>Tên Chủ Xe</th>
                        <th>Loại Xe</th>
                        <th>Thương Hiệu</th>
                        <th>Biển Số</th>
                        <th>Thời Hạn</th>
                        <th>Giờ Vào</th>             
                        <th>Giờ Ra</th>
                        <th>Ngày tạo</th>
                        <th>Ngày Cập Nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($vehicle) && is_array($vehicle)): ?>
                        <?php foreach ($vehicle as $index => $vehicle): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($vehicle['resident_name']) ?></td>
                                <td><?= esc($vehicle['category']) ?></td>
                                <td><?= esc($vehicle['brand']) ?></td>
                                <td><?= esc($vehicle['license_plate']) ?></td>
                                <td><?= esc($vehicle['duration']) ?></td>
                                <td><?= esc($vehicle['in']) ?></td>
                                <td><?= esc($vehicle['out']) ?></td>
                                <td><?= esc($vehicle['create_at']) ?></td>
                                <td><?= esc($vehicle['update_at']) ?></td>
                                <td>
                                    <Button class="update" onclick="openEditForm(<?= $vehicle['id'] ?>)">Sửa</Button>
                                    <div id="editVehicleModal" style="display: none;" class="background">
                                        <div class="modal">
                                            <form id="editVehicleForm" method="PUT" class="modal-content">
                                                <h3>Cập Nhật Phương Tiện</h3>
                                                <input type="hidden" id="editVehicleId" name="editVehicleId" value="">

                                                <label for="edit_resident_name">Tên Chủ Xe</label>
                                                <input type="text" id="edit_resident_name" name="edit_resident_name" placeholder="Nhập tên chủ xe" required>
                                                <span id="edit_resident_name_err" style="color:red" class="msg_err"></span><br>

                                                <label for="edit_category">Loại Xe</label>
                                                <select name="edit_category" id="edit_category" required>
                                                    <option value="Xe Máy">Xe Máy</option>
                                                    <option value="Ôtô">Ôtô</option>
                                                </select><br> 
                                                <span id="edit_category_err" style="color:red" class="msg_err"></span><br>

                                                <label for="edit_brand">Thương Hiệu</label>
                                                <input type="text" id="edit_brand" name="edit_brand" placeholder="Nhập tên thương hiệu xe" required>
                                                <span id="edit_brand_err" style="color:red" class="msg_err"></span><br>

                                                <label for="edit_license_plate">Biển Số</label>
                                                <input type="text" id="edit_license_plate" name="edit_license_plate" placeholder="Nhập biển số xe" required>
                                                <span id="edit_license_plate_err" style="color:red" class="msg_err"></span><br>

                                                <label for="edit_duration">Thời Hạn</label>
                                                <input type="number" id="edit_duration" name="edit_duration" placeholder="Nhập thời hạn gửi xe" required>
                                                <span id="edit_duration_err" style="color:red" class="msg_err"></span>
                                                
                                                <label for="edit_in">Giờ Vào</label>
                                                <input type="datetime-local" id="edit_in" name="edit_in" placeholder="Nhập giờ vào" required>
                                                <span id="edit_in_err" style="color:red" class="msg_err"></span><br>
                                                
                                                <label for="edit_out">Giờ Ra</label>
                                                <input type="datetime-local" id="edit_out" name="edit_our" placeholder="Nhập giờ ra" required>
                                                <span id="edit_out_err" style="color:red" class="msg_err"></span><br>

                                                <div class="modal-buttons">
                                                    <button type="button" onclick="closeCreateForm()">Đóng</button>
                                                    <button type="button" onclick="createVehicle()">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <Button class="delete" onclick="deleteVehicle(<?= $vehicle['id'] ?>)">Xóa</Button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="11">Không có phương tiện nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
<?= $this -> endSection()?>
<?= $this -> endSection()?>

<?= $this->section('style')?>
    <style type="text/css">
        form{
            width: 450px;
            height: 350px;
            box-shadow: 2px 2px 2px grey;
            background-color: white;
            padding: 20px;
        }
        label{
            flex: 1;
            margin-left: 30px;
            text-align: left;
        }

        input{
            flex:1;
            width: 90%;  
            padding: 5px;
            margin-left: 10px
        }

        .main-content {
            margin-left: 230px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.collapsed {
            margin-left: 0;
        }

        .content {
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content .title {
            background-color: white; 
            height: 40px;
        }
        .content .title h3{
            margin-top: 10px;
            font-size: 24px;
            margin-left: 10px;
            padding: 5px 5px;
            
        }

        .add{
            background-color: blue;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 5px; 
            color: white;
            float: right;
            margin-top: 20px;
            margin-bottom: 10px;
            margin-right: 10px;
        }

        .add:hover{
            background-color: #4a8eff;
        }

        .add a{
            color: white;
            text-decoration: none;
        }

        .background{
            top: 0;
            left: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            margin-left: 0px;
            z-index: 1001;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-50px);
            }
        }

        .modal-content {
            animation: slideDown 0.4s ease forwards;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1002;
            margin: auto;
            z-index: 1002;
        }

        .modal-content.fade-out {
            animation: fadeOut 0.4s ease forwards;
        }

        .modal-content h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content label {
            margin-bottom: 5px;
            margin-left: 10px;
            display: block;
        }

        .modal-content input,
        .modal-content select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .modal-content select{
            margin-left: 10px;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
        }

        .modal-buttons button {
            padding: 8px 16px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .modal-buttons button:first-child {
            background-color: #ccc;
        }

        .modal-buttons button:last-child {
            background-color: #007bff;
            color: #fff;
        }

        .modal .msg_err{
            font-size: 15px; 
            margin-top: -5px; 
            margin-left: 15px;
            display: block;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            margin-top: 20px;
            border: 2px solid #f2f0f0;
        }

        thead th {
            background-color: white;
            color: black;
            padding: 12px 15px;
            text-align: left;
            font-weight: bold;
            border-right-width: 1px black;
            border: 2px solid #f2f0f0;

        }

        tbody td {
            background-color: white;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            border: 2px solid #f2f0f0;
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }

        tbody tr:hover {
            background-color: #f1f1f8;
            cursor: pointer;
        }
        
        tbody td .delete{
            background-color: darkorange;
            width: 50px;
            height: 30px;
            border: none;
            color: white;
            border-radius: 5px;
        }

        tbody td .delete:hover{
            background-color: burlywood;
        }

        tbody td .delete a{
            color: white;
            text-decoration: none;
        }

        tbody td .update{
            background-color: blue;
            width: 50px;
            height: 30px;
            border: none;
            border-radius: 5px;
            color: white;
        }

        tbody td .update:hover{
            background-color: #4a8eff;
        }

        
        tbody td .update a{
            text-decoration: none;
            color: white;
        }


        table th,
        table td {
            text-align: center;
        }

        .content table {
            overflow: hidden;
        }
    </style>
<?= $this->endSection()?>

<?= $this->section('script_vehicle')?>
    <script>
        function openCreateForm() {

            document.getElementById('createVehicleModal').style.display = 'block';
        }

        function closeCreateForm() {
            var modalContent = document.querySelector('.modal-content');
            
            modalContent.classList.add('fade-out');

            setTimeout(function() {
                document.getElementById('createVehicleForm').reset();

                document.querySelectorAll('.msg_err').forEach(function(errMsg) {
                    errMsg.innerHTML = "";
                });

                document.getElementById('createVehicleModal').style.display = 'none';

                modalContent.classList.remove('fade-out');
            }, 500); 
        }


        function createVehicle() {
            var formData = new FormData(document.getElementById('createVehicleForm'));

            //reset thông báo lỗi trước khi gửi dữ liệu
            document.querySelectorAll('.msg_err').forEach(function(errMsg) {
                errMsg.innerHTML= "";
            });

            fetch('/vehicle/create', {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === -1) { 
                    if (data.messages.resident_name) {
                        document.querySelector("#resident_name_err").innerHTML = data.messages.resident_name;
                    }
                    if (data.messages.category) {
                        document.querySelector("#category_err").innerHTML = data.messages.category;
                    }
                    if (data.messages.brand) {
                        document.querySelector("#brand_err").innerHTML = data.messages.brand;
                    }
                    if (data.messages.license_plate) {
                        document.querySelector("#license_plate_err").innerHTML = data.messages.license_plate;
                    }
                    if (data.messages.duration) {
                        document.querySelector("#duration_err").innerHTML = data.messages.duration;
                    }
                    if (data.messages.in) {
                        document.querySelector("#in_err").innerHTML = data.messages.in;
                    }
                    if (data.messages.out) {
                        document.querySelector("#out_err").innerHTML = data.messages.out;
                    }
                } else if (data.status === 1) {
                    alert(data.messages); 
                    document.getElementById('createVehicleForm').reset();                 
                    document.getElementById('createVehicleModal').style.display = 'block';
                    window.location.reload();

                }
            })
                .catch(error => console.error('Lỗi:', error));
        }
        // function openEditForm(id) {
        //     // console.log('Hàm openEditForm đã được gọi với ID:', id);
        //     fetch(`/resident/edit/${id}`)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Lỗi khi tải dữ liệu cư dân.');
        //             }
        //             return response.json();
        //         })
        //         .then(resident => {
        //             const residentNameInput = document.getElementById('edit_resident_name');
        //             const genderInput = document.getElementById('edit_gender');
        //             const birthInput = document.getElementById('edit_birth');
        //             const phoneInput = document.getElementById('edit_phone');
        //             const emailInput = document.getElementById('edit_email');
                    
        //             if (residentNameInput) residentNameInput.value = resident.resident_name || '';
        //             if (genderInput) genderInput.value = resident.gender || '';
        //             if (birthInput) birthInput.value = resident.birth || '';
        //             if (phoneInput) phoneInput.value = resident.phone || '';
        //             if (emailInput) emailInput.value = resident.email || '';

        //             document.getElementById('editResidentModal').style.display = 'block';
        //         })
        //         .catch(error => console.error('Lỗi:', error));
            
        // }

        // function closeEditForm() {
        //     var modalContent = document.querySelector('.modal-content');
            
        //     modalContent.classList.add('fade-out');
            
        //     setTimeout(function() {
        //         document.querySelectorAll('.msg_err').forEach(function(errMsg) {
        //             errMsg.innerHTML = "";
        //         });

        //         document.getElementById('editResidentModal').style.display = 'none';
                
        //         modalContent.classList.remove('fade-out');
        //     }, 500);
        // }


        // function editResident() {
        //     var formData = new FormData(document.getElementById('editResidentForm'));
        //     var id = document.getElementById('editResidentId').value;

        //     document.querySelectorAll('.msg_err').forEach(function(errMsg){
        //         errMsg.innerHTML = "";
        //     });

        //     fetch(`/resident/edit/${id}`, {
        //         method: "PUT",
        //         body: formData,
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.status === -1) {
        //             if (data.messages.resident_name) {
        //                 document.querySelector("#edit_resident_name_err").innerHTML = data.messages.resident_name;
        //             }
        //             if (data.messages.birth) {
        //                 document.querySelector("#edit_birth_err").innerHTML = data.messages.birth;
        //             }
        //             if (data.messages.gender) {
        //                 document.querySelector("#edit_gender_err").innerHTML = data.messages.gender;
        //             }
        //             if (data.messages.phone) {
        //                 document.querySelector("#edit_phone_err").innerHTML = data.messages.phone;
        //             }
        //             if (data.messages.email) {
        //                 document.querySelector("#edit_email_err").innerHTML = data.messages.email;
        //             }
        //         } else if (data.status === 1) {
        //             document.getElementById('editResidentForm').reset();
        //             alert(data.messages);
        //             closeEditForm();
        //             window.location.reload();
        //         }
        //     })
        //     .catch(error => console.error('Lỗi:', error));
        // }


        function deleteVehicle(id) {
            if (confirm('Bạn có chắc chắn muốn xóa phương tiện này?')) {
                fetch(`/vehicle/delete/${id}`, {
                    method: 'DELETE',
                })
                .then(response => response.json())
                .then(data => {
                    if(data.status === 1){
                    alert(data.messages);   
                    window.location.reload();                 
                    
                }
                })
                .catch(error => console.error('Lỗi:', error));
            }
        }

    </script>
<?= $this->endSection()?>