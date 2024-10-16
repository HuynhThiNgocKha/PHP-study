<?= $this-> extend ('admin/layout/master_admin.php')?>

<?= $this->section('sidebar')?>
    <div class = "sidebar">
        <h4>Vinhomes Serenity</h4>
        <!-- <div class="img_logo">
            <a href="/"><img src="assets/Image/logo.png" alt="logo"></a>
        </div> -->
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
        <input type="text" placeholder="Nhập thông tin tìm kiếm...">
        <div class="icons">
            <a href="#">🔔</a>
            <a href="#">👤</a>
            <a href="#">▶️</a>
        </div>
    <?= $this->endSection()?>

    <div class="notifications">
        <ul>
            <li>
                <h3>Thông báo </h3>        
            </li>
            <li>
                <span>Thông báo mới</span>
                <span>21 giờ trước</span>
            </li>
            <li>
                <span>Thông báo mới</span>
                <span>21 giờ trước</span>
            </li>
            <li>
                <span>Thông báo mới</span>
                <span>21 giờ trước</span>
            </li>
            <li>
                <a href="#">Xem toàn bộ</a>
            </li>
        </ul>
    </div>

    <div class="dashboard-cards">
        <div class="card blue">
            <div>
                <h3>Tổng người dùng</h3>
                <p>114</p>
            </div>
            <div class="icon">👤</div>
        </div>
        <div class="card green">
            <div>
                <h3>Tổng lượt đánh giá</h3>
                <p>25,541</p>
            </div>
            <div class="icon">✍️</div>
        </div>
        <div class="card orange">
            <div>
                <h3>Tổng lần nhận liên hệ</h3>
                <p>5</p>
            </div>
            <div class="icon">📞</div>
        </div>
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

        .sidebar.hide {
            left: -250px;
        }

        .sidebar h4{
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

        .img_logo{
            width: 100px;
            height: 100px; 
            margin-left: 30px;      
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

        .notifications {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .notifications ul {
            list-style: none;
        }

        .notifications ul li {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .notifications ul li:last-child {
            border-bottom: none;
        }

        .notifications a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .dashboard-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            width: 32%;
            padding: 20px;
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .blue {
            background-color: #2f80ed;
        }

        .green {
            background-color: #27ae60;
        }

        .orange {
            background-color: #f2994a;
        }

        .card .icon {
            font-size: 50px;
            opacity: 0.7;
        }

        .card h3 {
            font-size: 16px;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
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


