<?php $paginator = $this->Paginator; ?>
<div class="page-header">

	<div class="col-lg-4">
		<div class="bs-component">
			 <ul class="breadcrumb">
			    <li><a href="#">Home</a></li>
			    
			    <li class="active">Users</li>
			  </ul>
		</div>
	</div>

    <div class="col-lg-12">
      
       
      
          <h4 id="tables">Search</h1>
       
     <table>
        <tbody>
          <tr>
            <td style="width:60px;">
              Select
            </td>
            <td style="width:200px">
               <select class="form-control" id="select" style="width:120px">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <br>
            </td>
            <td style="width:60px">
              From
            </td>
            <td style="display:inline-block">
              <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
            </td>
          </tr>
          <tr>
             <td style="width:60px">
              From
            </td>
            <td  colspan="5">
              <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <button type="submit" style="float:right" class="btn btn-primary" >Search</button>
            </td>
          </tr>
        </tbody>
     </table>


    </div>

    <div class="row">
      <div class="col-lg-12">
      

        <div class="page-header">
          <h1 id="tables">Customers</h1>
        </div>

        <div class="bs-component">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Email(ID)</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
              <tr>
                <td>1</td>
                <td><?php echo $user['User']['email'] ?></td>
                <td><?php echo $user['User']['first_name'] ?></td>
                <td><?php echo $user['User']['last_name'] ?></td>
                <td><?php echo date('Y') - $user['User']['year_of_birth'] ?></td>
                <td><?php echo $user['User']['status'] ?></td>
                <td><a href="#">View</a> &nbsp; &nbsp; </td>
              </tr>
            <?php } ?>
            </tbody>
          </table> 
        </div><!-- /example -->
      </div>
    </div>
    <?php echo $this->element('admin/paginate');?>
  </div>
