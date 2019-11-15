<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $template['title'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>">

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.2.1.min.js');?>"></script>
        
    </head>

    <body>
        <?php echo $template['partials']['header']; ?>
        
        <div class="container">
            <div class="row">
                <?php echo $template['body'];?>  
            </div>
        </div>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </body>
</html>