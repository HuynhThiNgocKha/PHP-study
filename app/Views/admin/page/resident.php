<?php
var_dump($resident);
?>

<?= $this-> extend ('admin/layout/master_admin.php')?>

<?= $this->section('sidebar')?>  
    
    <div class = "sidebar">
        <!-- <div class="img_logo">
            <a href="/"><img src="assets/Image/logo.png" alt="logo"></a>           
        </div> -->
        <h4>Vinhomes Serenity</h4>
        <ul>
            <li><a href="/">Trang chủ</a></li>
            <li><a href="#">Tài khoản</a></li>
            <li><a href="apartment">Căn hộ</a></li>
            <li><a href="resident">Cư dân</a></li>
            <li><a href="vehicle">Phương tiện</a></li>
        </ul> 
    </div> 
<?= $this->endSection()?>


<?= $this->section('main-content')?>
    <?= $this->section('header')?>
        <span class="menu-toggle" onclick="toggleSidebar()">&#9776;</span>
        <input type="text" placeholder="Nhập thông tin tìm kiếm..." id="searchInput">
        <button class="btn_search" onclick="searchResidents()">Tìm kiếm</button>
        <div class="icons">
            <a href="#">🔔</a>
            <a href="#">👤</a>
            <a href="#">▶️</a>
        </div>
    <?= $this->endSection()?>


    <div class="content">  
        <div class ="title">
             <h3>Cư dân</h3>
        </div>      
       
        <Button class="add" onclick="openCreateForm()" id="btn_add">Thêm mới</Button>
        <div id="createResidentModal" style="display: none;" class="background">
            <div class="modal">
                <form id="createResidentForm" method="POST" class="modal-content">
                    <h3>Thêm Mới Cư Dân</h3>

                    <label for="resident_name">Tên Cư Dân</label>
                    <input type="text" name="resident_name" placeholder="Nhập tên cư dân" required>
                    <span id="resident_name_err" style="color:red" class="msg_err"></span><br>

                    <label for="birth">Ngày Sinh</label>
                    <input type="date" name="birth" placeholder="Nhập ngày" required>
                    <span id="birth_err" style="color:red" class="msg_err"></span><br>

                    <label for="gender">Giới Tính</label>
                    <select name="gender"  required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select><br>
                    <span id="gender_err" style="color:red" class="msg_err"></span><br>

                    <label for="phone">Số Điện Thoại</label>
                    <input type="number" name="phone" placeholder="Nhập số điện thoại" required>
                    <span id="phone_err" style="color:red" class="msg_err"></span><br>

                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Nhập email" required>
                    <span id="email_err" style="color:red" class="msg_err"></span><br>

                    <div class="modal-buttons">
                        <button type="button" onclick="closeCreateForm()">Đóng</button>
                        <button type="button" onclick="createResident()">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    


        <table>
            <thead>
                    <th>STT</th>
                    <th>Tên cư dân</th>
                    <th>Ngày sinh</th>
                    <th>Giớ tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>             
                    <th>Ngày cập nhật</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resident) && is_array($resident)): ?>
                    <?php foreach ($resident as $index => $resident): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($resident['resident_name']) ?></td>
                            <td><?= esc($resident['birth']) ?></td>
                            <td><?= esc($resident['gender']) ?></td>
                            <td><?= esc($resident['phone']) ?></td>
                            <td><?= esc($resident['email']) ?></td>
                            <td><?= esc($resident['create_at']) ?></td>
                            <td><?= esc($resident['update_at']) ?></td>
                            <td>
                                <Button class="update" onclick="openEditForm(<?= $resident['id'] ?>)">Sửa</Button>
                                <div id="editResidentModal" style="display: none;" class="background">
                                    <div class="modal">
                                        <form id="editResidentForm" method="PUT" class="modal-content">
                                            <h3>Cập Nhật Thông Tin Cư Dân</h3>

                                            <label for="edit_resident_name">Tên Cư Dân</label>
                                            <input type="text" id="edit_resident_name" name="edit_resident_name" placeholder="Nhập tên cư dân" required>
                                            <span id="edit_resident_name_err" style="color:red" class="msg_err"></span><br>

                                            <label for="edit_birth">Ngày Sinh</label>
                                            <input type="date" id="edit_birth" name="edit_birth" required>
                                            <span id="edit_birth_err" style="color:red" class="msg_err"></span><br>

                                            <label for="edit_gender">Giới Tính</label>
                                            <select name="edit_gender" id="edit_gender" required>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select><br>
                                            <span id="edit_gender_err" style="color:red" class="msg_err"></span><br>

                                            <label for="edit_phone">Số Điện Thoại</label>
                                            <input type="number" id="edit_phone" name="edit_phone" placeholder="Nhập số điện thoại" required>
                                            <span id="edit_phone_err" style="color:red" class="msg_err"></span><br>

                                            <label for="edit_email">Email</label>
                                            <input type="text" id="edit_email" name="edit_email" placeholder="Nhập email" required>
                                            <span id="edit_email_err" style="color:red" class="msg_err"></span><br>

                                            <div class="modal-buttons">
                                                <button type="button" onclick="closeEditForm()">Đóng</button>
                                                <button type="button" onclick="editResident(<?= $resident['id'] ?>)">Cập Nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                             
                                <Button class="delete" onclick="deleteResident(<?= $resident['id'] ?>)">Xóa</Button>
                             </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="9">Không có cư dân nào.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection()?>

<?= $this->section('style')?>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
        }

        .sidebar {
            position: fixed;
            width: 230px;
            height: 100vh;
            background-color: #2b2d3a;
            color: white;
            padding: 20px;
            left: 0;
            top: 0;
            transition: left 0.3s ease;
            z-index: 1000;
        }

        .img_logo{
            width: 100px;
            height: 100px; 
            margin-left: 30px;      
        }

        .sidebar.hide {
            left: -250px;
        }

        .sidebar h4 {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: normal;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a:hover {
            color: #4a8eff;
        }

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
            width: 100%;  
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

        .header {
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .header input {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            
        }
        

        .header .icons {
            display: flex;
            align-items: center;
        }

        .header .icons a {
            font-size: 20px;
            margin-left: 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .header .btn_search {
            background-color: #4CAF50; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            padding: 5px 10px; 
            cursor: pointer; 
            font-size: 15px; 
            transition: background-color 0.3s;
            margin-left: 5px;
        }

        .header .btn_search:hover {
            background-color: #45a049; 
        }

        .header .btn_search:active {
            background-color: #3e8e41; 
        }

        @media (max-width: 600px) {
            .header .btn_search{
                width: 100%;
                font-size: 14px; 
            }
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
            margin-top: 50px;
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
            animation: fadeOut 0.3s ease forwards;
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
  
        .menu-toggle {
            font-size: 30px;
            cursor: pointer;
            margin-right: 20px;
        }

        .toggle-sidebar {
            cursor: pointer;
            background-color: #f2994a;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            .main-content.collapsed {
                margin-left: 0;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.open {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .dashboard-cards {
                flex-direction: column;
            }

            .card {
                width: 100%;
            }

            .toggle-sidebar {
                display: block;
            }
        }
    </style>
<?= $this->endSection()?>

<?= $this->section('script_resident')?>
    <script>
        function searchResidents(){
            const query =document.getElementById('searchInput').value;

            fetch(`/resident/search?q=${encodeURIComponent(query)}`)
                .then(response=>{
                    if(!response.ok){
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then (data =>{
                    console.log(data);
                    const tbody =document.querySelector('tbody');
                    tbody.innerHTML = '';

                    if(data.resident && Array(data.resident)){
                        data.resident.forEach((resident, index)=>{
                            const row = `
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${resident.resident_name}</td>
                                    <td>${resident.gender}</td>
                                    <td>${resident.birth}</td>
                                    <td>${resident.phone}</td>
                                    <td>${resident.email}</td>
                                    <td>${resident.create_at}</td>
                                    <td>${resident.update_at}</td>

                                    <td>
                                        <button class="update" onclick="openEditForm(${resident.id})" >Sửa</button>
                                        <button class="delete" onclick="deleteResident(${resident.id})" >Xóa</button>

                                    </td>
                                </tr>
                            `;
                            tbody.insertAdjacentHTML('beforeend', row);
                        });                
                    }else {
                            console.error('Không tìm thấy danh sách căn hộ trong phản hồi:', data);
                            tbody.innerHTML = '<tr><td colspan="9">Không có căn hộ nào.</td></tr>';
                    }
                })
                .catch(error=>console.error('Lỗi:', error));
        }

        function openCreateForm() {

            document.getElementById('createResidentModal').style.display = 'block';
        }

        function closeCreateForm() {
            var modalContent = document.querySelector('.modal-content');
            
            modalContent.classList.add('fade-out');

            setTimeout(function() {
                document.getElementById('createResidentForm').reset();

                document.querySelectorAll('.msg_err').forEach(function(errMsg) {
                    errMsg.innerHTML = "";
                });

                document.getElementById('createResidentModal').style.display = 'none';

                modalContent.classList.remove('fade-out');
            }, 500); 
        }


        function createResident() {
            var formData = new FormData(document.getElementById('createResidentForm'));

            //reset thông báo lỗi trước khi gửi dữ liệu
            document.querySelectorAll('.msg_err').forEach(function(errMsg) {
                errMsg.innerHTML= "";
            });

            fetch('/resident/create', {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === -1) { 
                    if (data.messages.resident_name) {
                        document.querySelector("#resident_name_err").innerHTML = data.messages.resident_name;
                    }
                    if (data.messages.birth) {
                        document.querySelector("#birth_err").innerHTML = data.messages.birth;
                    }
                    if (data.messages.gender) {
                        document.querySelector("#gender_err").innerHTML = data.messages.gender;
                    }
                    if (data.messages.phone) {
                        document.querySelector("#phone_err").innerHTML = data.messages.phone;
                    }
                    if (data.messages.email) {
                        document.querySelector("#email_err").innerHTML = data.messages.email;
                    }
                } else if (data.status === 1) {
                    alert(data.messages); 
                    document.getElementById('createResidentForm').reset();                 
                    document.getElementById('createResidentModal').style.display = 'block';
                    window.location.reload();

                }
            })
                .catch(error => console.error('Lỗi:', error));
        }
        function openEditForm(id) {
            // console.log('Hàm openEditForm đã được gọi với ID:', id);
            fetch(`/resident/edit/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Lỗi khi tải dữ liệu cư dân.');
                    }
                    return response.json();
                })
                .then(resident => {
                    const residentNameInput = document.getElementById('edit_resident_name');
                    const genderInput = document.getElementById('edit_gender');
                    const birthInput = document.getElementById('edit_birth');
                    const phoneInput = document.getElementById('edit_phone');
                    const emailInput = document.getElementById('edit_email');
                    
                    if (residentNameInput) residentNameInput.value = resident.resident_name || '';
                    if (genderInput) genderInput.value = resident.gender || '';
                    if (birthInput) birthInput.value = resident.birth || '';
                    if (phoneInput) phoneInput.value = resident.phone || '';
                    if (emailInput) emailInput.value = resident.email || '';

                    document.getElementById('editResidentModal').style.display = 'block';
                })
                .catch(error => console.error('Lỗi:', error));
            
        }

        function closeEditForm() {
            var modalContent = document.querySelector('.modal-content');
            
            modalContent.classList.add('fade-out');
            
            setTimeout(function() {
                document.querySelectorAll('.msg_err').forEach(function(errMsg) {
                    errMsg.innerHTML = "";
                });

                document.getElementById('editResidentModal').style.display = 'none';
                
                modalContent.classList.remove('fade-out');
            }, 500);
        }


        function editResident() {
            var formData = new FormData(document.getElementById('editResidentForm'));
            var id = document.getElementById('editResidentId').value;

            document.querySelectorAll('.msg_err').forEach(function(errMsg){
                errMsg.innerHTML = "";
            });

            fetch(`/resident/edit/${id}`, {
                method: "PUT",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === -1) {
                    if (data.messages.resident_name) {
                        document.querySelector("#edit_resident_name_err").innerHTML = data.messages.resident_name;
                    }
                    if (data.messages.birth) {
                        document.querySelector("#edit_birth_err").innerHTML = data.messages.birth;
                    }
                    if (data.messages.gender) {
                        document.querySelector("#edit_gender_err").innerHTML = data.messages.gender;
                    }
                    if (data.messages.phone) {
                        document.querySelector("#edit_phone_err").innerHTML = data.messages.phone;
                    }
                    if (data.messages.email) {
                        document.querySelector("#edit_email_err").innerHTML = data.messages.email;
                    }
                } else if (data.status === 1) {
                    document.getElementById('editResidentForm').reset();
                    alert(data.messages);
                    closeEditForm();
                    window.location.reload();
                }
            })
            .catch(error => console.error('Lỗi:', error));
        }


        function deleteResident(id) {
            if (confirm('Bạn có chắc chắn muốn xóa cư dân này?')) {
                fetch(`/resident/delete/${id}`, {
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

<?= $this->section('script')?>
    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector(".sidebar"); 
            var mainContent = document.querySelector(".main-content");
            
            sidebar.classList.toggle("hide");
            mainContent.classList.toggle("collapsed");
        }
    </script>
<?= $this->endSection()?>

