 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="<?php echo $this->webroot;?>">Home</a></li>
		     <li><a href="<?php echo $this->webroot;?>admin/contacts">Contacts</a></li>
		    <li class="active">View</li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">View Contact</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
        <table class="table table-striped table-hover ">
          
          <tbody>
         	<tr>
				<td style="background-color:#E6E6E6"><b>Time Send</b></td>
				
				<td><?php echo $contact['Contact']['created']?></td>

			</tr>
            <tr>
				<td style="background-color:#E6E6E6"><b>Email</b></td>
				
				<td><?php echo $contact['Contact']['email']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Contact Name</b></td>
				
				<td><?php echo $contact['Contact']['name']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Title</b></td>
				
				<td><?php echo $contact['Contact']['title']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Content</b></td>
				
				<td><?php echo $contact['Contact']['content']?></td>

			</tr>
			
			
          </tbody>
        </table> 
        <!-- <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/contacts/edit_profile'">Edit Profile</button>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/contacts/change_password'"> Change Password</button>
            </div>
          </div>
      </div> -->
    </div>

  </div>