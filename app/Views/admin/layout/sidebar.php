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