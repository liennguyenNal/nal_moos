<!-- Swiper -->
<div class="swiper-container">
  <!-- slider -->
  <div class="swiper-wrapper">   
    <div class="swiper-slide slider-4"><div class="container-fluid"><img src="<?php echo $this->webroot; ?>img/images/img-slider-4.png" alt="silder1"/></div></div>    
    <div class="swiper-slide slider-4"><div class="container-fluid"><img src="<?php echo $this->webroot; ?>img/images/img-slider-5.png" alt="silder1"/></div></div>    
    <div class="swiper-slide slider-4"><div class="container-fluid"><img src="<?php echo $this->webroot; ?>img/images/img-slider-6.png" alt="silder1"/></div></div>    
  </div>
  <!-- Add Pagination -->
  <div class="swiper-button">
    <div class="container-fluid">
      <div class="swiper-button-prev swiper-button-white"></div>
      <div class="swiper-button-next swiper-button-white"></div>
    </div>
  </div>
</div>
<div class="title-page"></div>
  <div class="block-video">
    <div class="container-fluid">
      <p class="caption">「家賃でもらえる家」は、賃貸で住み続けると</br>そのまま取得費になるという新しいマイホーム取得システムです。</br>金融機関の住宅ローン審査がないので、住宅ローン審査が通らなかった方でも申込みできます。</br>間取はもちろん、内装・外壁から水回り設備まで</br>ウェブサイト内でお好きなデザインにオーダーメイドできます</p>
      <div class="title-video">
        <span class="icon"></span>
        <h3>1分で分かる。「家賃でもらえる家」のしくみ</h3>
      </div>
      <div class="content-video">
        <div class="content-video-how">
          <iframe width="550" height="266" src="https://www.youtube-nocookie.com/embed/chwADnoFDng" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="block-list-event">
    <div class="container-fluid">
      <ul>
        <li>
          <div class="block-news">
            <a href="<?php echo $this->webroot; ?>introduction" class="img"><img src="<?php echo $this->webroot; ?>img/images/img-news-1.png" alt="news"/></a>
            <h3><a href="<?php echo $this->webroot; ?>introduction">「家賃でもらえる家。」とは</a></h3>
            <span class="icon"></span>
          </div>
        </li>
        <li>
          <div class="block-news">
            <a href="<?php echo $this->webroot; ?>work_flow" class="img"><img src="<?php echo $this->webroot; ?>img/images/img-news-2.png" alt="news"/></a>
            <h3><a href="<?php echo $this->webroot; ?>work_flow">お申し込みまでの流れ</a></h3>
            <span class="icon"></span>
          </div>
        </li>
        <li>
          <div class="block-news">
            <a href="<?php echo $this->webroot; ?>faq" class="img"><img src="<?php echo $this->webroot; ?>img/images/img-news-3.png" alt="news"/></a>
            <h3><a href="<?php echo $this->webroot; ?>faq">よくある質問</a></h3>
            <span class="icon"></span>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="block-list-news">
    <div class="container-fluid">
      <div class="title-news">
        <span class="icon"></span>
        <h3>最新のお知らせ</h3>
      </div> 
      <ul>
      <?php
      $i=0;
       foreach($articles as $article){ 
        if($i<3){ $i++;
        $article['Article']['created']= date("Y.m.d", strtotime($article['Article']['created']));//var_dump($articles); die; ?>
        <li><span style="width:50%; text-align:right;"><?php echo $article['Article']['created']; ?></span><a style="text-align:left; width:50%;" href="<?php echo $this->webroot; ?>articles/view/<?php echo $article['Article']['id']; ?>"><?php echo $article['Article']['title']; ?></a></li>

      <?php }} ?>
      </ul>
    </div>
  </div>
  <div class="block-link-page">
    <a href="<?php echo $this->webroot; ?>register"><img src="<?php echo $this->webroot; ?>img/front/button-home.png" alt="無料会員登録"/></a>
  </div>