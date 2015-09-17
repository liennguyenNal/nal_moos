
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
              <legend>Contact Us</legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <table>
                    <tr >
                      <td>

                        <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>'First name', 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>'Last name', 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                      </td>
                    </tr>
                    <tr>
                      <td>

                        <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>'First name kana', 'class'=>'form-control', "placeholder"=>'First Name kana','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>'Last name kana', 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-group">
                  <label for="title" class="col-lg-2 control-label">Contact Type<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "Normal","2"=> "Media","3"=> "Construction Company", "4"=> "Other"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
                  ?>  
                  </div>
                </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Company Name</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Company Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Name','div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Email','div'=>false))?>
                </div>
              </div>            
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email(confirmation)<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Confirm Email','div'=>false))?>
                </div>
              </div>
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content<span style="color:red">*<span></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Term of use<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <p>
                      <ul>
                        <li>1. term of use 1</li>
                        <li>2. term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test </li>
                        <li>3. term of use 3 test test</li>
                    </p>
                   
                    <?php
                      echo $this->Form->input('agree',array('type'=>'checkbox','options'=>array("1"=>"1"),'div'=>false, 'label'=>false));
                      ?>
                      <label class="control-label" style="padding-left:10px">Agree with all terms </label>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Send</button>
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