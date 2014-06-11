<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo lang('create_group_heading');?></title>

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
              <h1><?php echo lang('create_group_heading');?> <small><?php echo lang('create_group_subheading');?></small></h1>
            </div>
        
        
            <div class="row">
                <div class="col-md-12">
                    <?php if($message !== false):?>
                    <div class="alert alert-danger"><?php echo $message;?></div>
                    <?php endif; ?>
                </div>
            </div> <!-- ./row -->

            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><?php echo anchor('auth', lang('index_heading'))?></li>
                        <li class="active"><?php echo lang('index_create_group_link')?></li>
                    </ol>
                </div>
            </div> <!-- ./row -->
            
            <div class="row">
                <div class="col-md-12">
                    
                    <?php echo form_open("auth/create_group");?>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('create_group_name_label', 'group_name');?></label>
                            <?php echo form_input(array_merge($group_name, array('class' => 'form-control')));?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('create_group_desc_label', 'description');?></label>
                            <?php echo form_input(array_merge($description, array('class' => 'form-control')));?>
                        </div>
                        
                        <p>
                            <?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-default"');?>
                        </p>
                    
                    
                    <?php echo form_close();?>

                </div>
            </div>

        </div> <!-- ./container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>