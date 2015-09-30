<?php $this->Paginator->options(array('url' => $this->passedArgs));?>
<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            
            <li class="active">Contacts</li>
          </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      
       
      
      <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" id="keyword" class="form-control" placeholder="Search" value="<?php echo $keyword;?>">
            <!-- <select class="form-control" id="select" name="status">
                    <option value=""><font><font>All </font></font></option>
                    <option value="1"><font><font>No process yet</font></font></option>
                    <option value="2"><font><font>Processing</font></font></option>
                    <option value="3"><font><font>Completed</font></font></option>
                    
            </select> -->
            <?php 
              echo $this->Form->input('status', array('options' => array(1=>"No Processing",2=> "Processing",3=>"Completed"), 'empty' => '-- All --', 'class'=>'form-control', 'div'=>false, 'label'=>false, 'id'=>'status', 'value'=>$status));
            ?>
          </div>
          <button type="button" class="btn btn-default" onclick="search()">検索</button>
          <script type="text/javascript">
            function search(){
              
              var url = '<?php echo $this->webroot; ?>admin/contacts/index';
              if($('#keyword').val() != '') url = url + '/keyword:' + $('#keyword').val();
              if($('#status').val() != '') url = url + '/status:' + $('#status').val();
              window.location.href = url ;
            }
          </script>
        </form>


    </div>  
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Contacts</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>#</th>
              <th>Email</th>
              <th>Full Name</th>
              <th>Company</th>
              <th>Created</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0;
            foreach ($contacts as $contact) { 
            $i++;
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $contact['Contact']['email'] ?></td>
              <td><?php echo $contact['Contact']['first_name'].' '.$contact['Contact']['last_name']?></td>
              <td><?php echo $contact['Contact']['company'] ?></td>
              
              <td><?php echo $contact['Contact']['created'] ?></td>
              <td><?php if($contact['Contact']['status']==1){echo 'No Processing';} if($contact['Contact']['status']==2){echo 'Processing';} if($contact['Contact']['status']==3){echo 'Completed';} ?></td>
              <td><a href="<?php echo $this->webroot;?>admin/contacts/delete/<?php echo $contact['Contact']['id'] ?>" onclick="return confirm('Do you want to delete this contact')">Delete</a> &nbsp; <a href="<?php echo $this->webroot;?>admin/contacts/view/<?php echo $contact['Contact']['id'] ?>">View</a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
      </div><!-- /example -->
    </div>
  </div>
  <?php echo $this->element('admin/paginate');?>

</div>
