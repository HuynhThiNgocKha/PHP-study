<?= $this-> extend ('admin/layout/master_admin.php')?>

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
<?= $this->endSection()?>

<?= $this->section('style')?>
    <style type="text/css">

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
            width: 270px;
            
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