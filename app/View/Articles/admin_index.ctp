<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            
            <li class="active">Articles</li>
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
        <h1 id="tables">News</h1>
      </div>

      <div class="bs-component">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Short Content</th>
              <th>Created</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i =0; foreach ($articles as $article) { 
            $i++;
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $article['Article']['title'] ?></td>
              <td><?php echo $article['Article']['short_content'] ?></td>
              <td><?php echo $article['Article']['created'] ?></td>
              <td><?php if($article['Article']['is_published']) echo "Published"; else echo "Draft"; ?></td>
              <td><a href="delete/<?php echo $article['Article']['id'] ?>">Delete</a> &nbsp; <a href="edit/<?php echo $article['Article']['id'] ?>">Edit</a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
      </div><!-- /example -->
    </div>
  </div>
  <?php echo $this->element('admin/paginate');?>
  <div class="row">
    <div class="col-lg-6">

        <p class="bs-component">
          <a href="<?php echo $this->webroot;?>admin/articles/edit" class="btn btn-primary">Add News</a>
        </p>
    </div>    
  </div>

</div>
