<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo lang('index_heading');?></title>

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
              <h1><?php echo lang('index_heading');?> <small><?php echo lang('index_subheading');?></small></h1>
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
                    <ul class="nav nav-tabs">
                    <li class="active"><?php echo anchor('auth', lang('index_heading'))?></li>
                    <li><?php echo anchor('auth/create_user', lang('index_create_user_link'))?></li>
                    <li><?php echo anchor('auth/create_group', lang('index_create_group_link'))?></li>
                    </ul>
                </div>
            </div> <!-- ./row -->

            <div class="row">
                <div class="col-md-12">
                    
                    <table class="table table-striped" cellpadding=0 cellspacing=10>
                        <thead>
                        	<tr>
                        		<th><?php echo lang('index_fname_th');?></th>
                        		<th><?php echo lang('index_lname_th');?></th>
                        		<th><?php echo lang('index_email_th');?></th>
                        		<th><?php echo lang('index_groups_th');?></th>
                        		<th><?php echo lang('index_status_th');?></th>
                        		<th><?php echo lang('index_action_th');?></th>
                        	</tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($users as $user):?>
                        		<tr>
                        			<td><?php echo $user->first_name;?></td>
                        			<td><?php echo $user->last_name;?></td>
                        			<td><?php echo $user->email;?></td>
                        			<td>
                        				<?php foreach ($user->groups as $group):?>
                        					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                                        <?php endforeach?>
                        			</td>
                        			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                        			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
                        		</tr>
                        	<?php endforeach;?>
                        </tbody>
                    </table>                    
                    
                    
                    
                    
                    
                </div>
            </div>




        </div> <!-- ./container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>