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
			<tr>
				<td style="background-color:#E6E6E6"><b>Status</b></td>
				
				<td>
					<?php if($contact['Contact']['status'] == 1) echo "No Processing yet";
						elseif($contact['Contact']['status'] == 2) echo "Processing";
						else if($contact['Contact']['status'] == 3) echo "Completed";
						else echo "Un-define";

					?>
				</td>

			</tr>
			
          </tbody>
        </table> 
         <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
            	<?php if($contact['Contact']['status'] < 2){ ?>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/contacts/change_status/<?php echo $contact['Contact']['id']?>/2'">Processing</button>
              <?php } ?>
              <?php if($contact['Contact']['status'] < 3){ ?>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/contacts/change_status/<?php echo $contact['Contact']['id']?>/3'"> Completed</button>
              <?php }?>
            </div>
          </div>
      </div>
    </div>

  </div>