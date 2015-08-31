<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="<?php echo $this->webroot;?>/admin/articles/">Home</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/articles/">News</a></li>
            <li class="active">View ID: <?php echo $article['Article']['id'] ?></li>
          </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Headings -->

    <div class="row">
      

    <!-- Blockquotes -->

    <div class="row">
      <div class="col-lg-12">
        <h2 id="type-blockquotes"><?php echo $article['Article']['title']?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="bs-component">
          <blockquote>
            <p>
              <?php echo $article['Article']['short_content']?>
            </p>
            <small><?php echo $article['Article']['author']?></small>
          </blockquote>
          <?php if($article['Article']['large_image']){?>
          <div style="margin: auto; padding: 10px;">
            <img width="600px" src="<?php echo $this->webroot?>images/upload/news/big/<?php echo $article['Article']['large_image']?>"/>
          </div>
          <?php } ?>
           
            <p style="padding:10"> <?php echo nl2br($article['Article']['content']); ?> </p>
          
        </div>
      </div>
      
    </div>
    
  </div>
</div>