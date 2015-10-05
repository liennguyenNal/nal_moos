<div style="margin-top: 20px;" class="title-tab title-tab-fix-mb">
	<h3>同居人情報</h3>
</div>

<div id="relation-area">
<?php 
if(sizeof($user['UserRelation']) >0 )
	$len = sizeof($user['UserRelation']);
else $len = 1;
for($i =0; $i< $len; $i++){?>
	<section id="relation-area-content">
		
	<section id="remove" style="display:none">
	    <div class="link-form style" >
	        <div class="block-link">
	            <a href="javascript:void(0)" class="style-link" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));">- 希望エリアを削除</a>
	        </div>
	    </div>
	</section>
	<div class="content-from-block" >
	  <div class="content-from-how">
	    <table class="from" id="theform">
	      <tbody>
	        <tr>
	        	<td class="label-text"><label><?php echo __('user.partner.name'); ?></label><span><?php echo __('global.require'); ?></span></td>
	          <td>
	            <div class="block-input">
	              <div class="div-style">
	                <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
	                <?php echo $this->Form->input("UserRelation.$i.first_name", array('type'=>'text', 'id'=>"r_first_name_$i", 'label'=>false, 'class'=>'w198' ,'div'=>false, 'data-placement'=>"right"))
	                ?>
	              </div>
	              <div class="div-style">
	                <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
	                <?php echo $this->Form->input("UserRelation.$i.last_name", array('type'=>'text', 'id'=>"r_last_name_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right"))
	                ?>
	              </div>
	            </div>
	            <div class="block-input">
	              <div class="div-style">
	                <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
	                <?php echo $this->Form->input("UserRelation.$i.first_name_kana", array('type'=>'text', 'id'=>"r_first_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right"))
	                ?>
	              </div>
	              <div class="div-style">
	                <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
	                <?php echo $this->Form->input("UserRelation.$i.last_name_kana", array('type'=>'text', 'id'=>"r_last_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right"))
	                ?>
	              </div>
	            </div>
	          </td>
	        </tr>
	        <tr>
	          <td class="label-text"><label><?php echo __('user.register.gender'); ?></label><span><?php echo __('global.require'); ?></span></td>
	          <td>
	            <div class="form-radio">
	              <div class="form-w">
	                <div class="block-input-radio">
	                  <?php 
	                    echo $this->Form->radio("UserRelation.$i.gender", array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'data-placement'=>'right'));
	                  ?>
	                </div>
	              </div>
	            </div>
	          </td>
	        </tr>
	        <tr>
	          <td class="label-text"><label><?php echo __('user.register.birthday'); ?></label><span><?php echo __('global.require'); ?></span></td>
	          <td>
	            <div class="select">
	              <?php 
	                $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
	                echo $this->Form->select("UserRelation.$i.year_of_birth", $years, array('div'=>false, 'label'=>false, 'id'=>'p-year-<?php echo $i?>', 'onchange'=>'calculate_relation_age($(this))', 'data-placement'=>'right'));
	              ?>
	              <span><?php echo __('user.register.year'); ?></span>
	              <?php 
	                $months = array_combine(range(1, 12), range(1, 12));
	                echo $this->Form->select("UserRelation.$i.month_of_birth", $months, array('div'=>false, 'label'=>false, 'id'=>'month', 'data-placement'=>'right'));
	              ?>
	              <span><?php echo __('user.register.month'); ?></span>
	              <?php 
	              $dates = array_combine(range(1, 31), range(1, 31));
	                echo $this->Form->select("UserRelation.$i.day_of_birth", $dates, array('div'=>false, 'label'=>false, 'id'=>'day', 'data-placement'=>'right'));
	              ?>
	              <span><?php echo __('user.register.day'); ?></span>
	              <span class="style" id="p-age-<?php echo $i?>">0</span>
	              <span class="style"><?php echo __('user.register.age'); ?></span>
	              <script type="text/javascript">
	              		var d = new Date();
	                	var n = d.getFullYear();
	               		$("#p-age-<?php echo $i?>").html("<?php echo date('Y') - $user['UserRelation'][$i]['year_of_birth'] ?>");
	              			function calculate_relation_age(obj){
	                	var age = n - obj.val();
	                	obj.parent().parent().find("span[id*='p-age-<?php echo $i?>']").html(age);
	              }
	              </script>
	            </div>
	          </td>
	        </tr>
	        <tr>
	          <td class="label-text"><label><?php echo __('user.my_page.partner.relationship'); ?></label><span><?php echo __('global.require'); ?></span></td>
	          <td>
	            <div class="block-input">
	              <?php echo $this->Form->input("UserRelation.$i.relate", array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right"))
	              ?>
	            </div>
	          </td>
	        </tr>
	        <tr>
	          <td class="label-text"><label><?php echo __('user.partner.phone'); ?></label></td>
	          <td>
	            <div class="block-input fix-padding">
	              <div class="div-style">
	                <?php echo $this->Form->input("UserRelation.$i.phone", array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false,  'required'=>false, 'data-placement'=>"right"))
	                ?>
	              </div>
	            </div>
	          </td>
	        </tr>
	        <tr>
	          <td class="label-text"><label><?php echo __('user.partner.info'); ?></label></td>
	          <td>
	            <div class="block-input">
	              <span class="w108"><?php echo __('user.partner.company'); ?></span>
	              <?php echo $this->Form->input("UserRelation.$i.company", array('type'=>'text', 'id'=>"company", 'class'=>'w198', 'div'=>false, 'required'=>false,'label'=>false, 'data-placement'=>"right"))
	              ?>
	            </div>
	            <div class="block-input">
	              <span class="w108"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
	              <?php echo $this->Form->input("UserRelation.$i.school", array('type'=>'text', 'id'=>"school",  'class'=>'w198', 'div'=>false,'label'=>false, 'required'=>false, 'data-placement'=>"right"))
	              ?>
	            </div>
	          </td>
	        </tr>
	        <?php echo $this->Form->hidden("UserRelation.$i.id");?>
	      </tbody>
	    </table>
	  </div>
	</div>
	</section>
	<?php } ?>
</div>

	<div class="link-form style">
		<div class="block-link">
		  <a href="javascript:void(0)" class="style-link" id='btn-add-relation'>+ 希望エリアを追加</a>
		</div>
	</div>

	<!-- <section id="remove" style="display: none">
		<div class="link-form style">
			<div class="block-link">
		  		<a href="javascript:void(0)" class="style-link" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));">- 希望エリアを削除</a>
			</div>
		</div>
	</section> -->

	

	<script type="text/javascript">
	 	$(this).autoKana('#r_first_name_<?php echo $i?>', '#r_first_name_kana_<?php echo $i?>', {katakana:true, toggle:false});
	  	$(this).autoKana('#r_last_name_<?php echo $i?>', '#r_last_name_kana_<?php echo $i?>', {katakana:true, toggle:false});
	</script>

	<script type="text/javascript">
	var num_area2 = <?php echo $len; ?>;
    var order_object2 = "<?php echo $len; ?>";



    function replaceAll(find, replace, str) {
      return str.replace(new RegExp(find, 'g'), replace);
    }

    $('#btn-add-relation').on('click', function() {
    	var kana_script = '$(this).autoKana("#r_first_name_'+　order_object2 +'", "#r_first_name_kana_'+　order_object2 +'", {katakana:false, toggle:false});'
    	kana_script += '$(this).autoKana("#r_last_name_'+　order_object2 +'", "#r_last_name_kana_'+　order_object2 +'", {katakana:false, toggle:false});'
    	
      if( num_area2 < 5 ){
       var area = $('#relation-area-content').clone();

        area.html(area.html().replace(/\[0\]/g, '['+ order_object2 + ']' ).replace(/_0/g, '_'+ order_object2));
       	area.find("input").val('');
       	var btn_remove = $('#remove').clone();
       	 btn_remove.find('a').show();
       	area.find("section").show();
       	$('<script>' + kana_script +'</' + 'script>').appendTo(area);    
        $('#relation-area').append(area);
        order_object2++;
        num_area2++;
        if(num_area2 == 5){
        	$('#btn-add-relation').hide();
      	}
      }
      else {
        alert('Cannot add more item');
      }
    });

    function _remove_relation (obj) {
      num_area2--; 
      obj.parent().parent().parent().parent().remove();
      $('#btn-add-relation').show();
    }
	</script>