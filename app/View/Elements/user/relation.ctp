<h4>同居人</h4>

<section id="relation-area">
<?php 
if(sizeof($user['UserRelation']) >0 )
	$len = sizeof($user['UserRelation']);
else $len = 1;
for($i =0; $i< $len; $i++){?>

<div class="well bs-component" id="relation-area-content" >

	<fieldset>

	    <div class="form-group">
	      <table class="table table-striped table-hover ">
	        <tr>
	          <td>
	            <label>申込人氏名<span style="color:red">*</span></label>
	          </td>
	          <td>
	            <div class="form-group">
	              <div class="col-lg-10">
	                <?php echo $this->Form->input("UserRelation.$i.first_name", array('type'=>'text', 'id'=>"r_first_name_$i", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,'div'=>false))?>
	             
	                <?php echo $this->Form->input("UserRelation.$i.last_name", array('type'=>'text', 'id'=>"r_last_name_$i", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false))?>
	              </div>
	            </div>
	            <div class="form-group">
	              
	              <div class="col-lg-10">
	                <?php echo $this->Form->input("UserRelation.$i.first_name_kana", array('type'=>'text', 'id'=>"r_first_name_kana_$i", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false))?>              
	                                 
	                <?php echo $this->Form->input("UserRelation.$i.last_name_kana", array('type'=>'text', 'id'=>"r_last_name_kana_$i", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false))?>
	              </div>
	            </div>
	          </td>
	        </tr>
	        <tr>
	           <td> <label >性的<span style="color:red">*</span></label></td>
	            <td>
	              <div class="form-group">
	              
	                <div class="col-lg-10">
	                  <?php 
	                  echo $this->Form->radio("UserRelation.$i.gender", array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
	                ?>  
	                </div>
	              </div>
	            </td>
	          </tr>
	          <tr>
	            <td> <label >生年月日<span style="color:red">*</span></label></td>
	            <td>
	              <div class="form-group">
	               
	                <div class="col-lg-10">
	                  
	                  年
	                  <?php 
	                  $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
	                  echo $this->Form->select("UserRelation.$i.year_of_birth", $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'p-year-<?php echo $i?>', 'onchange'=>'calculate_relation_age($(this))'));
	                ?>
	                月
	                <?php 
	                  $months = array_combine(range(1, 12), range(1, 12));
	                  echo $this->Form->select("UserRelation.$i.month_of_birth", $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
	                ?>
	                日
	                <?php 
	                $dates = array_combine(range(1, 31), range(1, 31));
	                  echo $this->Form->select("UserRelation.$i.day_of_birth", $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
	                ?>
	                  歳 : <span id="p-age-<?php echo $i?>">0</span>
	                <script type="text/javascript">
	                var d = new Date();
	                  var n = d.getFullYear();
	                 $("#p-age-<?php echo $i?>").html("<?php echo date('Y') - $user['UserRelation'][$i]['year_of_birth'] ?>");
	                function calculate_relation_age(obj){
	                	var age = n - obj.val();
	                	obj.parent().parent().find('span').html(age);
	                }
	                </script>
	                </div>
	              </div>
	            </td>
	          </tr>
	          <tr>
	            <td>Relation</td>
	            <td><?php echo $this->Form->input("UserRelation.$i.relate", array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
	            </td>
	          </tr>
	          <tr>
	            <td><label for="phone">電話番号<span style="color:red">*</span></label></td>
	            <td>
	              <div class="form-group">
	                
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input("UserRelation.$i.phone", array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false,  'required'=>false))?>                           
	                  
	                </div>
	              </div>
	              </td>
	            </tr>
	            <tr>
	            <td><label for="company">Company & School<span style="color:red">*</span></label></td>
	            <td>
	              <div class="form-group">
	                
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input("UserRelation.$i.company", array('type'=>'text', 'id'=>"company", 'label'=>'Company', 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
	                  <?php echo $this->Form->input("UserRelation.$i.school", array('type'=>'text', 'id'=>"school", 'label'=>'School', 'class'=>'form-control', 'div'=>false,  'required'=>false))?>
	                  
	                </div>
	              </div>
	              </td>
	            </tr>
	             <?php echo $this->Form->hidden("UserRelation.$i.id");?>
	      </table>
	    </div>
	    
	</fieldset>
	  
</div>
<script type="text/javascript">
	 
	 $(this).autoKana('#r_first_name_<?php echo $i?>', '#r_first_name_kana_<?php echo $i?>', {katakana:false, toggle:false});
    $(this).autoKana('#r_last_name_<?php echo $i?>', '#r_last_name_kana_<?php echo $i?>', {katakana:false, toggle:false});

</script>

<?php } ?>
</section>

<section id='remove'  style='display:none'>
  <div class='form-group'>
    <div class='col-lg-10 col-lg-offset-2'>
      <button type='button' id='btn-remove-relation'  class='btn btn-primary' style='float:right' onclick="javascript:_remove_relation($(this));"> - Remove</button>
    </div>
  </div>
</section>
     
 <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="button" class="btn btn-primary" style="float:right"  id='btn-add-relation'> + Add More</button>
      </div>
    </div>

  <script type="text/javascript">
  
   


    var num_area = <?php echo $len; ?>;

    var order_object = "<?php echo $len; ?>";
    function replaceAll(find, replace, str) {
      return str.replace(new RegExp(find, 'g'), replace);
    }
    
   
    function _remove_relation (obj) {
      // 
      num--; 
      $('#btn-add-relation').show();
      obj.parent().parent().parent().remove();
    }
     

    $('#btn-add-relation').on('click', function() {
    	var kana_script = '$(this).autoKana("#r_first_name_'+　order_object +'", "#r_first_name_kana_'+　order_object +'", {katakana:false, toggle:false});'
    	kana_script += '$(this).autoKana("#r_last_name_'+　order_object +'", "#r_last_name_kana_'+　order_object +'", {katakana:false, toggle:false});'
    	
      if( num < 5 ){
     	
       var area = $('#relation-area-content').clone(true, true);
        
       area.html(area.html().replace(/\[0\]/g, '['+ order_object + ']' ).replace(/_0/g, '_'+ order_object));
       
       	area.find("input").val('');
      
    
        area.append($('#remove').clone(true, true).html() );
       $('<script>' + kana_script +'</' + 'script>').appendTo(area);
        $('#relation-area').append(area);
        order_object++;
        num++;
        if(num == 5) $('#btn-add-relation').hide();
      }
      else {
        alert('Cannot add more item');
      }
    });
  
 
 
  </script>

  