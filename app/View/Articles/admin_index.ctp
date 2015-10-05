
<div class="page-header">
<div >
    <div class="bs-component">
       
          <h4 class="active">お知らせ一覧</h4>
        
    </div>
  </div>
<div class="row">
    <div >

        <p class="bs-component">
          <a href="<?php echo $this->webroot;?>admin/articles/edit" class="btn btn-primary"><?php echo __('admin.articles.add_new'); ?></a>
        </p>
    </div>    
  </div>

  <div class="row">
    <div class="col-lg-12">
      
       <?php echo $this->element('flash');?>
      
      <!-- <form class="navbar-form navbar-left" role="search"> -->
      <?php echo $this->Form->create('Article', array('action'=>'index', 'class'=>'navbar-form navbar-left', 'role'=>'search', 'type' => 'get'))?>
          <div class="form-group">
            <!-- <input type="text" name="keyword" class="form-control" placeholder="Search"> -->
            <label style="margin-left:20px;" for="title" >公開状況 </label>
            <?php 
              echo $this->Form->input('is_published', array( 'options' => array(0=> "Draft", 1=>"Published"), 'empty' => '', 'class'=>'form-control', 'div'=>false, 'label'=>false,'style'=>'width:100px; display:inline', 'id'=>'is_published', 'value'=>$is_published));
            ?>
            <label style="margin-left:20px;" for="title" >公開日 </label>
            <input style="width:150px; display:inline" id="date_from" name"date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
            -- <input style="width:150px; display:inline;" id="date_to" name"date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>"><br/>
            <div style="margin-top:20px;">
            <label style="margin-left:20px;" for="title" ><?php echo __('admin.articles.title'); ?></label>
            <?php echo $this->Form->input('keyword', array('type'=>'text', 'id'=>"keyword", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'value'=>$keyword, 'style'=>"width:250px; display:inline; " ))?>
            </div>
          </div>
          <div><button style="float:right" type="button" class="btn btn-primary" id="btn-search" onclick="javascript:search();"><?php echo __('admin.articles.search_button'); ?></button> </div>
          <script type="text/javascript">
            function search(){ //alert($('#is_published').val());
              var url = '<?php echo $this->webroot; ?>admin/articles/index';
              if($('#keyword').val() != '') url = url + '/keyword:' + $('#keyword').val();
              if($('#date_from').val() != '') url = url + '/date_from:' + $('#date_from').val();
              if($('#date_to').val() != '') url = url + '/date_to:' + $('#date_to').val();
              if($('#is_published').val() != '') url = url + '/is_published:' + $('#is_published').val();

              //if($('#is_published').val()==1) url = url + '/is_published:' + $('#is_published').val();
              //else if($('#is_published').val()==0) {url = url + '/is_published:' + 2;}
              //else if($('#is_published').val()=='') {alert($('#is_published').val()); url = url + '/is_published:' + 3;}
              window.location.href = url ;
              
            }
          </script>
        </form>


    </div>
  </div>
    
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">News</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->Form->create('Article',array('id' =>'form','url' => array('controller' => 'articles', 'action' => 'multi_delete'))); ?>
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkAll"  hiddenField = "false"></th>
              <th>番号</th>
              <th>公開日</th>
              <th><?php echo __('admin.articles.title'); ?></th>
              <th>添付ファイル</th>
              <th>公開状況</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php $i =0; foreach ($articles as $article) { 
            $i++;
            ?>
            <tr>
              <td><input class="check_box" type="checkbox" name="article_id[]" value ="<?php echo $article['Article']['id'];?>" hiddenField = "false"></td>
              <td><?php echo $i;?></td>
              <td><?php echo $article['Article']['created']; ?></td>
              <td><?php echo $article['Article']['title'] ?></td>
              <td><?php if ($article['Article']['small_image']) echo 'Yes'; else echo 'No'; ?></td>
              
              <td><?php if($article['Article']['is_published']) echo "Published"; else echo "Draft"; ?></td>
              <td>
                <!--<a href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>">View</a> 
                <a href="<?php echo $this->webroot?>admin/articles/delete/<?php echo $article['Article']['id'] ?>" onclick="return confirm('Do you want delete this news?')">Delete</a> -->
                <a class="btn btn-default" href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>"><?php echo __('admin.articles.view_button'); ?></a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
        <input style="float:right; margin-top:20px;" id="btn-delete" class="btn btn-primary" type="submit" value="<?php echo __('admin.user.delete_button'); ?>">
        
        </form>
      </div><!-- /example -->
    </div>
  </div>
  <div id="dialog-confirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除しますか？</p>
  </div>

  <div id="dialog-confirm-delete1" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除すると2度と復元できません。
お知らせを削除しますか？</p>
  </div>

  <div id="dialog-delete-message" title="Delete Alert">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Select least one user to delete.
  </p>
  </div>
  <?php echo $this->element('admin/paginate');?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
<script type="text/javascript">
$("#checkAll").click(function(){
    $('.check_box').not(this).prop('checked', this.checked);
});


$(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });

        $('#btn-delete').on('click', function(event) {
          if ($("#form").find('input[name="article_id[]"]:checked').length > 0){
             $( "#dialog-confirm-delete" ).dialog("open");
               event.preventDefault(); 

          }
          else {
            $( "#dialog-delete-message" ).dialog('open');
            event.preventDefault();
          }
        });

        $( "#dialog-confirm-delete" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "削除する": function() {
              $( "#dialog-confirm-delete1" ).dialog("open");
              $( this ).dialog( "close" );
              event.preventDefault();
            },
            'キャンセル': function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });
        $( "#dialog-confirm-delete1" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "削除する": function() {
              
              $( this ).dialog( "close" );
              $('#form').submit();
            },
            'キャンセル': function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });
        $( "#dialog-delete-message" ).dialog({
          autoOpen: false,
            modal: true,
            buttons: {
              Ok: function() {
                $( this ).dialog( "close" );
              }
            }
          });
</script>
</div>
