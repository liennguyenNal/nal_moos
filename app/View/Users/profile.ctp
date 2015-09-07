<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="#">Home</a></li>
		    
		    <li class="active">My Profile</li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">My Profile</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
        <table class="table table-striped table-hover ">
          
          <tbody>
         
           
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>First Name</b></td>
				
				<td><?php echo $user['User']['first_name']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Last Name</b></td>
				
				<td><?php echo $user['User']['last_name']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>First Name - Kana</b></td>
				
				<td><?php echo $user['User']['first_name_kana']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Last Name Kana</b></td>
				
				<td><?php echo $user['User']['last_name_kana']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Genre</b></td>
				
				<td><?php echo $user['User']['genre']?></td>

			</tr>
			 <tr>
				<td style="background-color:#E6E6E6"><b>Birthday</b></td>
				
				<td><?php echo $user['User']['year_of_birth'] . "/" . $user['User']['month_of_birth'] . "/ " . $user['User']['day_of_birth']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Marial Status</b></td>
				
				<td><?php echo $user['MarriedStatus']['name'];?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Family</b></td>
				
				<td><?php echo $user['FamilyStructure']['name'];?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Genre</b></td>
				
				<td><?php echo $user['User']['genre']?></td>

			</tr>
			<!-- <tr>
				<td style="background-color:#E6E6E6"><b>Age</b></td>
				
				<td><?php print_r(date("Y") - $user['User']['year_of_birth'])?></td>

			</tr> -->
          </tbody>
        </table> 
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>users/edit_profile'">Edit Profile</button>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>users/change_password'"> Change Password</button>
            </div>
          </div>
      </div><!-- /example -->
    </div>

  </div>
  </div>