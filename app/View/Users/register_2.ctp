<script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
              <li><a href="<?php echo $this->webroot;?>">Home</a></li>
              
              <li class="active">Register</li>
              
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
         <?php echo $this->element('flash');?>
        <?php echo $this->Form->create("User", array('action'=>'register','id'=>'form' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
        <div class="well bs-component">
       
         <!--  <form class="form-horizontal"> -->
           
            <fieldset>
              <legend>Register Account</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label for="inputEmail" class="col-lg-2 control-label">Name<span style="color:red">*</span></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>"First", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,"placeholder"=>'First Name','div'=>false))?>
                   
                      <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>"Last", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', "placeholder"=>'Last Name','div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>"First Kana", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', "placeholder"=>'First Name Kana','div'=>false))?>              
                                       
                      <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>"Last Kana", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px',"placeholder"=>'Last Name Kana','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
             <td> <label for="inputEmail" >Genre<span style="color:red">*</span></label></td>
              <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                    <?php 
                		echo $this->Form->radio('genre', array('male'=>"Male",'Female'=> "Female"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
              		?>	
                  </div>
                </div>
              </td>
              </tr>
              <tr>
                <td> <label for="inputEmail" >Birthday<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                    	
                      Year
                      <?php 
                      $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
                  		echo $this->Form->select('year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()'));
                		?>
    	              Month
    	              <?php 
    	              	$months = array_combine(range(1, 12), range(1, 12));
                  		echo $this->Form->select('month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
                		?>
    	              Day
    	              <?php 
    	              $dates = array_combine(range(1, 31), range(1, 31));
                  		echo $this->Form->select('day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
                		?>
                      Age : <span id="age">0</span>
                    <script type="text/javascript">

                    function calculate_age(){
                      var d = new Date();
                      var n = d.getFullYear();
                      $("#age").html(n - $("#year").val());
                    }
                    </script>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >Married Status<span style="color:red">*</span></label></td>
                <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                   
                    <?php 
                		//echo $this->Form->select('married_status_id', $married_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'empty'=>'-- Select One --'));
              		?>
                   <?php 
                    echo $this->Form->radio('married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >Address<span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Post Number<span style="color:red">*<span></label>
                <div class="col-lg-10" >
                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'Post Number 1','div'=>false))?>
                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'Post Number 2','div'=>false))?>
                  <button type="button" class="btn btn-primary" id="btn-find-address">Find Address</button>
                  <img id="loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
                  <script type="text/javascript">
                    $('#btn-find-address').on('click', function() {
                         var loader = $('#loader');
                        
                          loader.show();
                         // alert($('#post_num_1').val().trim() + $('#post_num_2').val().trim());
                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#post_num_1').val().trim() + $('#post_num_2').val().trim()}, 
                          function(json) {
                            loader.hide();
                            $("#pref_id").val(json.pref_id);
                            $("#city").val(json.ward);
                            $("#address").val(json.addr1);
                        });
                    });
                  </script>

                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Pref<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'-- Select --'));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">City/Ward<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
                    echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control', "placeholder"=>'2 - 5 - 1','div'=>false));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Address<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control', "placeholder"=>'2 - 5 - 1','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">House Name</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                </div>
              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail">Email<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               <tr>
                <td><label for="inputEmail">Email(confirm)<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" class="col-lg-2 control-label">Phone<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'Hand Phone', 'class'=>'form-control', "placeholder"=>'Hand Phone','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
                   
                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'Home Phone', 'class'=>'form-control', "placeholder"=>'Home Phone','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                    </div>
                  </div>
                  </td>
                </tr>
            </table>
            </fieldset>
            </div>
              

             

            <div class="well bs-component">


              <!-- <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /> -->
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Job Type<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.working_status_id', $working_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'-- Select One --'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Time Worked<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' Year&nbsp;' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                    <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' Month&nbsp;', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                  </div>
                </div>

               
                    
                 
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Tax of Month<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  </div>
                </div>
                

               
              </fieldset>
          
            </div>
            <h4>Expect area</h4>
            <section id="expect-area">
            <div class="well bs-component" id='expect-area-content' >
              <fieldset>

                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Post Number<span style="color:red">*</span></label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'Post Number 1','div'=>false))?>
                    <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'Post Number 2','div'=>false))?>
                    <button type="button" class="btn btn-primary" style="float:right" id="btn-find-expect-address" onclick="javascript:find_address($(this));">Find Address</button>
                    <img id="loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Prefectures<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('ExpectArea.1.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'-- Select --'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Ward/Town<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                     <?php echo $this->Form->input('ExpectArea.1.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Address<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('ExpectArea.1.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                  </div>
                </div>
              </fieldset>
              
            </div>
            
            </section>
            <div >
            <section id='remove'  style='display:none'>
              <div class='form-group'>
                <div class='col-lg-10 col-lg-offset-2'>
                  <button type='button' id='btn-remove'  class='btn btn-primary' style='float:right' onclick="javascript:_remove($(this));"> - Remove</button>
                </div>
              </div>
            </section>
             <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    
                    <button type="button" class="btn btn-primary" style="float:right"  id='btn-add'> + Add more</button>
                  </div>
                </div>

              <script type="text/javascript">
              
                $(this).autoKana('#first_name', '#first_name_kana', {katakana:false, toggle:false});
                $(this).autoKana('#last_name', '#last_name_kana', {katakana:false, toggle:false});


                var num_area = 1;

                var order_object = 2;
                function replaceAll(find, replace, str) {
                  return str.replace(new RegExp(find, 'g'), replace);
                }
                
                function find_address(obj){
                   var p =  obj.parent().parent().parent();
                   var zip_code = p.find("input[id*='post_num_1']").val().trim() + p.find("input[id*='post_num_2']").val().trim();
                   var loader = p.find("div[id*='loader']");
                        
                      loader.show();
                      
                    $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: zip_code}, 
                      function(json) {
                        loader.hide();
                        //alert(p.find("select[id*='pref_id']").val());
                        p.find("select[id*='pref_id']").val(json.pref_id);
                        p.find("input[id*='city']").val(json.ward);
                        p.find("input[id*='address']").val(json.addr1);
                    });
                }

                function _remove (obj) {
                  // body...
                  num_area--; 
                  //alert(obj.parent().parent().html());
                  obj.parent().parent().parent().remove();
                }

                $('#btn-add').on('click', function() {
                  if( num_area < 5 ){
                   var area = $('#expect-area-content').clone(true, true);
                   

                   area.html(area.html().replace(/\[1\]/g, '['+ order_object + ']' ));
                   order_object++;
                   
                    area.append($('#remove').clone(true, true).html());
                   
                    $('#expect-area').append(area);
                    num_area++;
                  }
                  else {
                    alert('Cannot add more item');
                  }
                });
              $(function() {
                $( "#dialog-message" ).dialog({
                  autoOpen : false,
                  modal: true,
                  buttons: {
                    Ok: function() {
                      $( this ).dialog( "close" );
                    }
                  }
                });

                $( "#form" ).submit(function( event ) {
                  if( $( "#agree" ).is(':checked') ){
                    

                  }
                  else {
                   
                    $( "#dialog-message" ).dialog("open");
                    event.preventDefault();
                  }
                });
              });
             
              </script>
             
              <div class="well bs-component">


              <!-- <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /> -->
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Term of use<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <p>
                      <ul>
                        <li>1. term of use 1</li>
                        <li>2. term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test term of use 2 test </li>
                        <li>3. term of use 3 test test</li>
                    </p>
                    <!-- <input type="checkbox" name="data[User][agree]" value="1" id="chk-agree" /> <label class="control-label" style="padding-left:10px">Agree with all terms </label> -->
                    <?php
                      echo $this->Form->input('User.agree',array('type'=>'checkbox','options'=>array(1),'div'=>false, 'id'=>'agree','label'=>false));
                      ?>
                      <label class="control-label" style="padding-left:10px">Agree with all terms </label>
                  </div>
                </div>
               
               
              </fieldset>
          
            </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="button" onclick="window.location.href='<?php echo $this->webroot;?>'" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </div>
             
          
           

        </form>
      </div>
      
    </div>
  </div>

  <div id="dialog-message" title="Warning">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    You must accept terms of use.
  </p>
  
</div>