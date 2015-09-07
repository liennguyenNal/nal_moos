<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="<?php echo $this->webroot;?>">Home</a></li>
		   
		    <li class="active">My Page </li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">My Page</h1>
      </div>
      <?php echo $this->element('flash');?>
      <div class="bs-component">
      	<ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Account Information</a></li>
            <!-- <li><a href="#profile" data-toggle="tab">愚見数則</a></li> -->
            <li class="disabled"><a>Others</a></li>
            
    	</ul>

    	<div id="myTabContent" class="tab-content">
          	<div class="tab-pane fade active in" id="profile">
		        <table class="table table-striped table-hover "
		          
		          <tbody>
		         
		            <tr>
						
					
						<td style="background-color:#E6E6E6;width:200px"><b>First Name</b></td>
						
						<td><?php echo $user['User']['first_name']?></td>

					
						<td style="background-color:#E6E6E6;width:200px"><b>Last Name</b></td>
						
						<td><?php echo $user['User']['last_name']?></td>
					</tr>
					<tr>
					
						<td style="background-color:#E6E6E6"><b>First Name - Kana</b></td>
						
						<td><?php echo $user['User']['first_name_kana']?></td>

					
						<td style="background-color:#E6E6E6"><b>Last Name Kana</b></td>
						
						<td><?php echo $user['User']['last_name_kana']?></td>
					</tr>
					<tr>
						<td style="background-color:#E6E6E6"><b>Marial Status</b></td>
						
						<td><?php echo $user['MarriedStatus']['name']?></td>

					
						<td style="background-color:#E6E6E6"><b>Family Structure</b></td>
						
						<td><?php echo $user['FamilyStructure']['name']?></td>
					</tr>
					<tr>
						<td style="background-color:#E6E6E6"><b>Birthday</b></td>
						
						<td>Age: <?php echo $user['User']['age_of_birth']?> &nbsp;&nbsp; <?php echo $user['User']['year_of_birth'] . "/" .  $user['User']['month_of_birth'] . "/ " . $user['User']['day_of_birth']?> </td>

					
						<td style="background-color:#E6E6E6"><b>Genre</b></td>
						
						<td><?php echo $user['User']['genre']?></td>
					</tr>
					<tr>
							<td colspan="4"> <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /></td>
						
					</tr>
					<tr>
						
					
						<td style="background-color:#E6E6E6;width:200px"><b>Email</b></td>
						
						<td colspan="3"><?php echo $user['UserAddress']['email']?></td>

						
						
					</tr>
					<tr>
						
					
						<td style="background-color:#E6E6E6;width:200px"><b>Post Number</b></td>
						
						<td><?php echo $user['UserAddress']['post_num']?></td>

					
						<td style="background-color:#E6E6E6;width:200px"><b>City</b></td>
						
						<td><?php echo $user['UserAddress']['city']?></td>
					</tr>
					<tr>
					
						<td style="background-color:#E6E6E6"><b>Address</b></td>
						
						<td><?php echo $user['UserAddress']['address']?></td>

					
						<td style="background-color:#E6E6E6"><b>Address Kana</b></td>
						
						<td><?php echo $user['UserAddress']['address_kana']?></td>
					</tr>
					<tr>
					
						<td style="background-color:#E6E6E6"><b>Phone</b></td>
						
						<td><?php echo $user['UserAddress']['phone']?></td>

					
						<td style="background-color:#E6E6E6"><b>Home Phone</b></td>
						
						<td><?php echo $user['UserAddress']['home_phone']?></td>
					</tr>
					<tr>
							<td colspan="4"> <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /></td>
						
					</tr>
					<tr>
						
					
						<td style="background-color:#E6E6E6;width:200px"><b>Year Worked</b></td>
						
						<td><?php echo $user['UserCompany']['year_worked']?></td>

					
						<td style="background-color:#E6E6E6;width:200px"><b>Month Worked</b></td>
						
						<td><?php echo $user['UserCompany']['month_worked']?></td>
					</tr>
					<tr>
					
						<td style="background-color:#E6E6E6"><b>Tax Of Month</b></td>
						
						<td><?php echo $user['UserCompany']['tax_of_month']?></td>

					
						<td style="background-color:#E6E6E6"><b>Working Status</b></td>
						
						<td><?php echo $user['UserCompany']['working_status']?></td>
					</tr>
		          </tbody>
		        </table> 
		        
		        <div class="form-group">
		            <div class="col-lg-10 col-lg-offset-2">
		              <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo $this->webroot;?>users/edit_register_info';">Edit Information</button>
		             
		            </div>
		          </div>
		      </div>
		      
		    
	        </div>
        </div>
        
    </div>

  </div>
  </div>