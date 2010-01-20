<div class='mainInfo'>

	<h1>Edit User</h1>
	<p>Please enter the users information below.</p>
	
	<div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>
	
    <?php echo form_open("admin/edit_user/".$this->uri->segment(3));?>

      
    <?php echo form_close();?>

</div>
