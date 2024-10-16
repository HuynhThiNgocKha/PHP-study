<?= $this->extend('user/layout/master_user') ?>

<?= $this->section('header')?>
    <div class="header">
        <h1>Appfast</h1>
        <nav>
            <ul class="menu">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Tính năng</a></li>
                <li><a href="#">Giao diện</a></li>
                <li><a href="#">Dịch vụ</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
    </div>
<?= $this->endSection()?>

<?= $this->section('main')?>
    <div class="main">
        <h2>Appfast <br> App Dùng Để Làm Gi?</h2>
        <p>
            Appfast Mobile App hỗ trợ xem trước thời gian thực ứng dụng ngay khi bạn đang chỉnh sửa ứng dụng trên Bảng điều khiển (Dashboard). Bằng cách này, bạn có thể hình dung rõ ràng nhất ứng dụng của bạn khi hoạt động trên thiết bị sẽ như thế nào.
        </p>
        <div class="button-container">
            <a href="#" class="btn googleplay">Google Play</a>
            <a href="#" class="btn appstore">App Store</a>
        </div>
       
    </div>
<?= $this->endSection()?>

<?= $this->section('footer')?>
    <div class="footer">
        <p class="text_footer">@NgocKha</p>
    </div>
<?= $this->endSection()?>

<?= $this->section('style-home-view-user')?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
        }

        .header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-top: 30px;
            margin-right: 200px;
            margin-bottom: 10px;
            padding: 0 20px;
           
        }

        .header h1 {
            color: #d5006d;
            font-size: 36px;
            margin-bottom: 20px;          
            margin-left: 350px;
        }

        nav {
            margin-bottom: 20px;
        }

        .menu {
            margin-top: 30px;
            list-style-type: none;
            margin: 0; 
        }

        .menu li {
            margin-top: 20px;
            display: inline; 
            margin: 0 15px; /* Space between menu items */
        }

        .menu a {
            margin-top: 20px;
            color: black; 
            text-decoration: none; 
            font-size: 18px;
            font-weight: 600; 
            padding: 10px 15px;
            border-radius: 1px; 
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #d5006d; 
            color: white; 
        }

        .main {
            text-align: center;
            background-color: #d5006d;
            padding: 100px 0px;
            position: relative;
        }

        h2 {
            color: #ffffff;
            font-size: 28px;
            margin: 20px 0px;
           
        }

        p {
            color: #ffffff;
            font-size: 18px;
            margin: 20px auto;
            max-width: 600px;
            line-height: 1.5;
        }

        .button-container {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 5px;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .googleplay {
            background-color: #333;
            color: white;
        }

        .appstore {
            background-color: #333;
            color: white;
        }

        .googleplay:hover {
            background-color: darkgrey;
        }

        .appstore:hover {
            background-color: darkgrey;
        }


        .footer{
            background-color: #d5006d;
            color: white;
            height: 100px;
            width: 100%;
            margin-top: 20px;
          
            /* border-radius: 30px 30px 0 0; */
            position: absolute;
            /* left: 0;
            right: 0;
            bottom: -20px; */
        }

        .text_footer{
            font-size: 18px;
            font-weight: bold;
            color: #f8f8f8;
            margin-left: 700px;
            margin-top: 40px;
        }

        
    </style>
<?= $this->endSection()?>

