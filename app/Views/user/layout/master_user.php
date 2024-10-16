<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home View Of User</title>
    <?= $this -> renderSection('style-home-view-user') ?>
</head>
<body>
    <?= $this->renderSection('header')?>

    <div class="main">
        <?= $this->renderSection('main')?>
    </div>

    <div class="footer">
         <?= $this-> renderSection('footer')?>
    </div>
   

</body>
</html>