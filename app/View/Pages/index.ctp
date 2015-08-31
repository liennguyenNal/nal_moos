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
      <div class="page-header">
        <h1 id="tables">News</h1>
      </div>

      <div class="bs-component">
        <table class="table table-striped table-hover ">
          
          <tbody>
          <?php foreach ($articles as $article) { 
            ?>
            <tr>
             
              <td width="200px" style="padding:8px" >
              	<a href="<?php echo $this->webroot;?>articles/view/<?php echo $article['Article']['id']?>">
              		<img  style="height:200px;width:150px"  src="<?php echo $this->webroot?>images/upload/news/small/<?php echo $article['Article']['small_image'];?>">
              	</a>
              </td>

              <td> <b><a href="<?php echo $this->webroot;?>articles/view/<?php echo $article['Article']['id']?>"><?php echo $article['Article']['title'] ?> </a> </b> <small style="padding-left:20px"><?php echo substr($article['Article']['created'], 0, 10) ?> </small>

              	<p><?php echo $article['Article']['short_content'] ?></p>
              </td>
              
            </tr>
          <?php } ?>
          </tbody>
        </table> 
      </div><!-- /example -->
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-6">

        <p class="bs-component">
          <a href="<?php echo $this->webroot;?>articles/" class="btn btn-primary">All News</a>
        </p>
    </div>    
  </div>

</div>
