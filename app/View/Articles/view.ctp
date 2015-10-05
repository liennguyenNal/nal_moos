
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/swiper.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/common.css" type="text/css" media="screen" />
     
    <section id="content-container">
      <div class="welcome-sup-page">
        <div class="container-fluid">
          <h2>ようこそ<a href="#">MOOS</a>様</h2>
        </div>
      </div>
      <div class="news-detail">
        <div class="container-fluid">
          <div class="content-news-detail">
            <div class="block-title-news">
              <h3 class="title-news"><?php echo $article['Article']['title']?></h3>
              <span class="times-days"><?php echo $article['Article']['created']?></span>
            </div>
            <p><?php echo nl2br($article['Article']['content']); ?></p>
          </div>
          <div class="block-list-news-detail">
            <h3>日本自動車:</h3>
            <ul>
              <?php for($i=0; $i<5; $i++){ 
                    if($articles[$i]['Article']['id']){ ?>
                      
                      <li><span class="times-days"><?php echo $articles[$i]['Article']['created']; ?></span><a  href="<?php echo $this->webroot; ?>articles/view/<?php echo $articles[$i]['Article']['id']; ?>"><?php echo $articles[$i]['Article']['title']; ?></a></li>
                   <?php }}
                  ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

