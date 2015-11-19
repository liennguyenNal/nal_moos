    
    <script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
      <div class="welcome-sup-page">
        <div class="container-fluid">
          <h2>ようこそ<a href="#"><?php echo $user['User']['first_name'];?></a>様</h2>
        </div>
      </div>
      <div class="content-tab">
        <div class="container-fluid">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">マイページトップ</a></li>
            <li><a data-toggle="tab"  href="#basic">申込人</a></li>
            <li><a data-toggle="tab" href="#partner">配偶者／同居人</a></li>
            <li><a data-toggle="tab" href="#guarantor">連帯保証人</a></li>
            <?php if($user['User']['need_more_guarantor']){ ?>
            <li><a data-toggle="tab" href="#other_guarantor">連帯保証人 2</a></li>
            <?php } ?>
            <li ><a data-toggle="tab" href="#attachment">添付書類</a></li>
          </ul>

          <div class="tab-content">

            <div id="home" class="tab-pane fade in active">
              <?php echo $this->element('user/dashboard'); ?>
            </div>


            <div id="basic" class="tab-pane fade">
              <?php echo $this->element('user/basic_info'); ?>
            </div>

            <div id="partner" class="tab-pane fade">

              <?php if($user['User']['married_status_id'] == 1) {echo $this->element('/user/partner'); }
                else echo  $this->element('/user/partner_not_married');
              ?>
            </div>

            <div id="guarantor" class="tab-pane fade">
              <?php echo $this->element('user/guarantor'); ?>
            </div>
            <?php if($user['User']['need_more_guarantor']){ ?>
              <div id="other_guarantor" class="tab-pane fade">
              <?php echo $this->element('user/other_guarantor'); ?>
            </div>
            <?php }?>
            <div id="attachment" class="tab-pane fade">
              <?php echo $this->element('user/attachment'); ?>
            </div>

            <!-- <div id="F" class="tab-pane fade">
              <p>Some content in menu 5.</p>
            </div> -->

          </div>
        </div>
      </div>
      <script type="text/javascript">
      var current_tab = "#home";
      var old_tab  = "#home";
      var g_edit;
      var p_edit;
      var edit;
      var og_edit;
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          var target = $(e.target).attr("href"); // activated tab
          //alert(current_tab);
          
          if(current_tab != target){
            //alert(edit);
            if(current_tab == "#basic"){
              if(edit){
                //old_tab = "#basic"; 
                //alert('basic Info is modified, please save or cancle it.');
                                    // initialized with defaults
                //$('#myModal').find('p').html('Basic Data is modified, please save or cancle it.');
                $('#myModal').modal() ;
                $('#myModal').modal('show');
                $('#myModal').on('hidden.bs.modal', function () {
                    $('.nav-tabs a[href="#basic"]').tab('show');
                });
              }
            }
            if(current_tab == "#partner"){
              if(p_edit){
                //alert('Partner Tab is modified, please save or cancle it.');
                 $('#myModal').modal()                      // initialized with defaults
                //old_tab = "#partner"; 
                $('#myModal').modal('show');
                $('#myModal').on('hidden.bs.modal', function () {
                  $('.nav-tabs a[href="#partner"]').tab('show');
                });
              }
            }
            if(current_tab == "#guarantor"){
              if(g_edit){
                //alert('guarantor Tab is modified, please save or cancle it.');
                 $('#myModal').modal()                      // initialized with defaults
                //old_tab = "#guarantor"; 
                $('#myModal').modal('show');
                $('#myModal').on('hidden.bs.modal', function () {
                  $('.nav-tabs a[href="#guarantor"]').tab('show');
                });
              }
            }
            if(current_tab == "#other_guarantor"){
              if(og_edit){
                //alert('Other_guarantor Tab is modified, please save or cancle it.');
                 $('#myModal').modal()                      // initialized with defaults
                //old_tab = "#other_guarantor"; 
                $('#myModal').modal('show');
                $('#myModal').on('hidden.bs.modal', function () {
                  $('.nav-tabs a[href="#other_guarantor"]').tab('show');
                });
              }
            }
            current_tab = target;
          }
          
        });

    

     
       
      </script>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal-header-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">&nbsp;</h4> 
      </div>
      <div class="modal-body">
        <p id="msg">変更内容はまだ保存されておりません。</br>
変更内容を保存するためには、各画面の一番下にある「保存する」ボタンを押してください。</br>
また、保存が必要ない場合は「キャンセル」ボタンを 押してください。</p>
      </div>
      <div class="modal-footer">
        <div class="button-tab">
      <button type="submit" class="link-tab-1a" id='btn-update-info' data-dismiss="modal"><img src="<?php echo $this->webroot; ?>img/front/closeup.png" alt="閉じる"/></button>
      </div>
        
      </div>
    </div>

  </div>
</div>







<style type="text/css">
 
.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #55ad47;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-b  order-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-info .modal-title {
  font-size: 17px;
}
.modal-header-info .close {
  color:#fff;
  opacity: 1;
}
.modal-header-info .close:hover {
  opacity: 0.7;
}
.modal-body p {
  font-size: 16px;
}
.modal-footer {
  text-align: center;
}
.modal-footer {
  margin-top: 0px;
}
.button-style {
  background-color: #ef801a;
    background-image: none !important;
    border: medium none;
    border-radius: 3px;
    box-shadow: 0 6px 0 #c66a19;
    color: #fff;
    display: inline-block;
    font-size: 18px;
    padding: 14px 40px;
    text-align: center;
    transition: all 0.4s linear 0s;
    width: auto;
}
.button-style:hover {
  opacity: 0.7;
}
</style>
    