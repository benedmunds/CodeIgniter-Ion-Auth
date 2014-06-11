<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo lang('deactivate_heading');?></title>

        <!-- Bootstrap -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        
        <div class="container">
        
            <div class="page-header">
              <h1><?php echo lang('deactivate_heading');?> <small>&nbsp;</small></h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('auth') ?>">Home</a></li>
                        <li class="active" ><?php echo lang('deactivate_heading');?></li>
                    </ol>
                </div>
            </div> <!-- ./row -->

            <div class="row">
                <div class="col-md-12">
                    <?php echo form_open("auth/deactivate/".$user->id);?>
                        <?php echo form_hidden($csrf); ?>
                        <?php echo form_hidden(array('id'=>$user->id)); ?>
                        <?php echo form_hidden(array('confirm'=>'yes')); ?>
                        <div class="alert alert-danger"><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></div>
                        <p class="text-center">
                            <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-default"');?>
                            <a class="btn btn-danger" href="<?php echo site_url('auth') ?>"><?php echo lang('deactivate_cancel_btn')?></a>
                        </p>
                    <?php echo form_close();?>
                </div>
            </div> <!-- ./row -->

        </div> <!-- ./container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>