<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="<?php echo $this->webroot;?>">Home</a></li>
		    
		    <li class="active">Register</li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Register Confirmation</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
      <?php echo $this->Form->create("User", array('action'=>'register_confirmation', 'class'=>'form-horizontal')) ?>
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
				<td style="background-color:#E6E6E6"><b>Birthday</b></td>
				
				<td>Age: <?php echo $user['User']['age_of_birth']?> &nbsp;&nbsp; <?php echo $user['User']['year_of_birth'] . "/" .  $user['User']['month_of_birth'] . "/ " . $user['User']['day_of_birth']?> </td>

			</tr>
			
			<tr>
				<td style="background-color:#E6E6E6"><b>Genre</b></td>
				
				<td><?php echo strtoupper( $user['User']['genre'])?></td>

			</tr>
			
			<tr>
				<td style="background-color:#E6E6E6"><b>Married Status</b></td>
				
				<td><?php echo  $user['User']['married_status']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Family Structure</b></td>
				
				<td><?php echo $user['User']['family_structure']?></td>

			</tr>
			<tr>
				<td colspan="2">  <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /></td>
			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Post Number</b></td>
				
				<td><?php echo $user['UserAddress']['post_num']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Email</b></td>
				
				<td><?php echo $user['UserAddress']['email']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Address</b></td>
				
				<td><?php echo $user['UserAddress']['address']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Address Kana</b></td>
				
				<td><?php echo $user['UserAddress']['address_kana']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>City</b></td>
				
				<td><?php echo $user['UserAddress']['city']?></td>

			</tr>
			<tr>
				<td colspan="2">  <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /></td>
			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>Year Worked</b></td>
				
				<td><?php echo $user['UserCompany']['year_worked']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Month Worked</b></td>
				
					<td><?php echo $user['UserCompany']['month_worked']?></td>
			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Tax of Month</b></td>
				
				<td><?php echo $user['UserCompany']['tax_of_month']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>Working Status</b></td>
				
				<td><?php echo $user['UserCompany']['working_status']?></td>

			</tr>


          </tbody>
        </table> 
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <input type="hidden" name="data[User][confirm]" value="1" />
              <button type="button" class="btn btn-default" onclick="window.history.back();">Cancel</button>
              <button type="submit" class="btn btn-primary" > Confirm</button>
            </div>
          </div>
      	</div>
      	</form>

    </div>

  </div>
  </div>