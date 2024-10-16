<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home View Of Admin</title>
    <?= $this->renderSection('style')?>
    <?= $this->renderSection('script')?>
    
</head>
<body>
    <?= $this->renderSection('sidebar')?>
    <div class = "main-content">
        <div class = "header">
            <?= $this->renderSection('header')?>
        </div>   
        <?= $this-> renderSection('sidebar')?>

        <?= $this-> renderSection('content')?>
        
        <?= $this->renderSection('script_apartment')?>

        <?= $this->renderSection('script_resident')?>

        <?= $this->renderSection('script_vehicle')?>
        
        <?= $this-> renderSection('main-content')?>
        
    </div>

    
</body>
</html>