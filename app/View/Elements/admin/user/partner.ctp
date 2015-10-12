<style type="text/css">
  .error-message {
    color: red;
    padding-left: 10px;
  }
</style>
<div class="page-header">
    <?php echo $this->element('flash');?>

    <div class="row">
      <div class="col-lg-12">
        <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserPartnerEdit' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after' ) ) ) ) ?>
        <div class="well bs-component">
       
         <!--  <form class="form-horizontal"> -->
           
            <fieldset>
              <legend>配偶者基本情報</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label><?php echo __('user.register.username'); ?></span></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('UserPartner.first_name', array('type'=>'text', 'id'=>"p_first_name", 'label'=>__('user.register.firstname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; ' , 'div'=>false, 'required' => false))?>
                   
                      <?php echo $this->Form->input('UserPartner.last_name', array('type'=>'text', 'id'=>"p_last_name", 'label'=>__('user.register.lastname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; ', 'div'=>false, 'required' => false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('UserPartner.first_name_kana', array('type'=>'text', 'id'=>"p_first_name_kana", 'label'=>__('user.register.firstnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; ', 'div'=>false, 'required' => false))?>              
                                       
                      <?php echo $this->Form->input('UserPartner.last_name_kana', array('type'=>'text', 'id'=>"p_last_name_kana", 'label'=>__('user.register.lastnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; ', 'div'=>false, 'required' => false))?>
                    </div>
                  </div>
                </td>
                <script type="text/javascript">
                    $(this).autoKana('#p_first_name', '#p_first_name_kana', {katakana:false, toggle:false});
                    $(this).autoKana('#p_last_name', '#p_last_name_kana', {katakana:false, toggle:false});
                  </script>
              </tr>
             <tr>
               <td> <label ><?php echo __('user.register.gender') ?></span></label></td>
                <td>
                  <div class="form-group">
                  
                    <div class="col-lg-10">
                      <?php 
                      echo $this->Form->radio('UserPartner.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin-right:10px; margin-left:20px;', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required' => false));
                    ?>  
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> <label ><?php echo __('user.register.birthday'); ?></span></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                      
                      
                      <?php 
                      $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
                      echo $this->Form->select('UserPartner.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'p-year',  'required' => false));
                    ?>
                    <?php echo __('user.register.year'); ?>
                    
                    <?php 
                      $months = array_combine(range(1, 12), range(1, 12));
                      echo $this->Form->select('UserPartner.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month', 'required' => false));
                    ?>
                    <?php echo __('user.register.month'); ?>
                    
                    <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('UserPartner.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day', 'required' => false));
                    ?>
                    <?php echo __('user.register.day'); ?>
                      &nbsp;&nbsp; <span id="p-age">0</span> &nbsp;歳 
                    <script type="text/javascript">
                    var d = new Date();
                      var n = d.getFullYear();
                      $("#p-age").html(n - $("#p-year").val());
                    
                    </script>
                    </div>
                  </div>
                </td>
              </tr>
              
               </table>
            </fieldset>
       </div>
       
        <div class="well bs-component">
           
            <fieldset>
              <legend>配偶者勤務先情報</legend>
              <table class="table table-striped table-hover ">
               
                 
                <tr>
                  <td><label for="phone"><?php echo __('user.partner.phone'); ?></span></label></td>
                  <td>
                    <div class="form-group">
                      
                      <div class="col-lg-10">
                        <?php echo $this->Form->input('UserPartner.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
                     
                        
                      </div>
                    </div>
                    </td>
                  </tr>
                  
              </table>
            </fieldset>
        </div>
              

             

        <div class="well bs-component">


             <legend>配偶者連絡先情報</legend>
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.work'); ?><span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserPartner.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.partner.company'); ?></label>
                  <div class="col-lg-10">
                  <?php echo __('user.my_page.basic_info.company_name'); ?>
                    <?php echo $this->Form->input('UserPartner.company', array('type'=>'text', 'id'=>"p-company-name", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false, 'required' => false, 'required' => false))?>
                    <?php echo __('user.my_page.basic_info.company_name_kana'); ?>
                    <?php echo $this->Form->input('UserPartner.company_kana', array('type'=>'text', 'id'=>"p-company-name-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false, 'required' => false))?>
                  </div>
                </div>
                
                
                    
            <table class="table table-striped table-hover ">
              <tr>
                <td><label for="inputEmail" ><?php echo __('user.register.address'); ?></span></td>
                <td>
                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.post'); ?></label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('UserPartner.company_post_num_1', array('type'=>'text', 'id'=>"p_company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'required' => false))?>
                    <?php echo $this->Form->input('UserPartner.company_post_num_2', array('type'=>'text', 'id'=>"p_company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'required' => false))?>
                    

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.pref'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('UserPartner.company_pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'p_company_pref_id', 'empty'=>'--------', 'required' => false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.city'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                      echo $this->Form->input('UserPartner.company_city', array('type'=>'text', 'id'=>"p_company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required' => false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.street'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_address', array('type'=>'text', 'id'=>"p_company_address", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.house'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_house_name', array('type'=>'text', 'id'=>"p_company_house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'required' => false))?>
                  </div>
                </div>
                </td>
              </tr>
              </table>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.contact.company-phone'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.fax'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.career'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->select('UserPartner.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'p_carrer_id', 'empty'=>'--------', 'required' => false));?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.description'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.department'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>

               <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.position'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.experience'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required' => false))?><?php echo __('user.register.year') ?>
                    <?php echo $this->Form->input('UserPartner.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required' => false))?>ヶ月
                  </div>
                </div>
               
               
                <div class="form-group">
                   <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.contact_type'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('UserPartner.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin-right:10px; margin-left:20px;', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'onchange'=>'p_change_type($(this))', 'required' => false));
                    echo $this->Form->input('UserPartner.salary_type_other', array('type'=>'text', 'id'=>"p_salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true, 'style'=>'width:150px; display:inline' , 'required' => false))
                  ?>  
                  </div>
                 
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">税込月収</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false,'style'=>'width:150px; display:inline;' , 'required' => false))?><?php echo __('user.register.yen'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_year'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false,'style'=>'width:150px; display:inline;' , 'required' => false))?><?php echo __('user.my_page.basic_info.salary_man'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_receive'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                      echo $this->Form->radio('UserPartner.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=>__('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin-right:10px; margin-left:20px;', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required' => false));
                      echo $this->Form->input('UserPartner.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>__('global.date'), 'class'=>'form-control','div'=>false, 'style'=>'width:150px; display:inline', 'required' => false ))
                    ?>  
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.insurances'); ?></span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserPartner.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'------'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.note'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  </div>
                </div>
              </fieldset>
          </div>
           
            <?php echo $this->element('/admin/user/relation');?>
           
        
          
             
                <script type="text/javascript" >
               
                  $('#UserPartnerEdit').find(':input').prop('disabled',true);
                
                </script>
                 
           

        </form>

       
        
      </div>
      
    </div>
  </div>
