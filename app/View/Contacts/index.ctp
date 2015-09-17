
<script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
<style type="text/css">
  .error-message {
    color: red;
    padding-left: 10px;
  }
</style>
<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li class="active">Contact</li>
              
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('flash');?>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("Contact", array('action'=>'index', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>お問い合わせフオ一ム</legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label">お名前<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <table>
                    <tr >
                      <td>

                        <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>'姓', 'class'=>'form-control', "placeholder"=>'山田','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>'名', 'class'=>'form-control', "placeholder"=>'雪','div'=>false))?>
                      </td>
                    </tr>
                    <tr>
                      <td>

                        <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>'セイ', 'class'=>'form-control', "placeholder"=>'ヤマダ','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>'メイ', 'class'=>'form-control', "placeholder"=>'ユキ','div'=>false))?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-group">
                  <label for="title" class="col-lg-2 control-label">問合せ分類<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "一殷のお客様","2"=> "メディア関係","3"=> "建設会社", "4"=> "その他"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
                  ?>  
                  </div>
                </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">会社名(法人の場合)</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">電話番号<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">メールアドレス<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>            
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">メールアドレス(確認)<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">お問い合わせ内容<span style="color:red">*<span></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">個人情報の取り扱い<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <p>
                      <ul>
                        <li>1. ご記入いただきました個人情報は、本お問い合わせに関するお客様へのご連絡、商品の情報提供、糅社が主。</li>
                        <li>2. ご記入いただきました個人情報は、本お問い合わせに関するお客様へのご連絡、商品の情報提供、糅社が主。</li>
                        <li>3. ご記入いただきました個人情報は、本お問い合わせに関するお客様へのご連絡、商品の情報提供、糅社が主。</li>
                    </p>
                   
                    <?php
                      echo $this->Form->input('agree',array('type'=>'checkbox','options'=>array("1"=>"1"),'div'=>false, 'label'=>false));
                      ?>
                      <label class="control-label" style="padding-left:10px">上記内容にします</label>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">キャンセル</button>
                  <button type="submit" class="btn btn-primary">確認する</button>
                </div>
              </div>
            </fieldset>
          </form>
          <script type="text/javascript">
              
                $(this).autoKana('#first_name', '#first_name_kana', {katakana:false, toggle:false});
                $(this).autoKana('#last_name', '#last_name_kana', {katakana:false, toggle:false});
                </script
        </div>
      </div>
      
    </div>
  </div>