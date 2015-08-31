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
            <input type="text" name="keyword" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">検索</button>
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
               <th>Name</th>
              <th>Title</th>
              <th>Created</th>
              
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
              <td><?php echo $contact['Contact']['name'] ?></td>
              <td><?php echo $contact['Contact']['title'] ?></td>
              
              <td><?php echo $contact['Contact']['created'] ?></td>
              
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
