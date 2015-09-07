
<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            
            <li class="active">News</li>
          </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      
       <?php echo $this->element('flash');?>
      
      <!-- <form class="navbar-form navbar-left" role="search"> -->
      <?php echo $this->Form->create('Article', array('action'=>'index', 'class'=>'navbar-form navbar-left', 'role'=>'search', 'type' => 'get'))?>
          <div class="form-group">
            <!-- <input type="text" name="keyword" class="form-control" placeholder="Search"> -->
            <?php echo $this->Form->input('keyword', array('type'=>'text', 'id'=>"keyword", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Keyword','div'=>false, 'value'=>$keyword ))?>
          </div>
          <button type="button" class="btn btn-default" onclick="javascript:search();">検索</button>
          <script type="text/javascript">
            function search(){
              
              var url = '<?php echo $this->webroot; ?>admin/articles/index';
              window.location.href = url + '/keyword:' + $('#keyword').val();
            }
          </script>
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
              <th>Image</th>
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
              <td><img  style="height:100px;width:70px"  src="<?php echo $this->webroot?>images/upload/news/small/<?php echo $article['Article']['small_image'];?>"></td>
              <td><a href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>"><?php echo $article['Article']['title'] ?></a></td>
              <td><?php echo $article['Article']['short_content'] ?></td>
              <td><?php echo $article['Article']['created'] ?></td>
              <td><?php if($article['Article']['is_published']) echo "Published"; else echo "Draft"; ?></td>
              <td>
                <a href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>">View</a> 
                <a href="<?php echo $this->webroot?>admin/articles/delete/<?php echo $article['Article']['id'] ?>" onclick="return confirm('Do you want delete this news?')">Delete</a> 
                <a href="<?php echo $this->webroot?>admin/articles/edit/<?php echo $article['Article']['id'] ?>">Edit</a> </td>
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
