
<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            
            <li class="active">News</li>
          </ul>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      
       <?php echo $this->element('flash');?>
      
      <!-- <form class="navbar-form navbar-left" role="search"> -->
      <?php echo $this->Form->create('Article', array('action'=>'index', 'class'=>'navbar-form navbar-left', 'role'=>'search', 'type' => 'get'))?>
          <div class="form-group">
            <!-- <input type="text" name="keyword" class="form-control" placeholder="Search"> -->
            
            <?php 
              echo $this->Form->input('is_published', array( 'options' => array(0=> "Draft", 1=>"Published"), 'empty' => '-- All --', 'class'=>'form-control', 'div'=>false, 'label'=>false,'style'=>'width:250px; display:inline', 'id'=>'is_published', 'value'=>$is_published));
            ?>
            From: <input style="width:250px; display:inline" id="date_from" name"date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
            To: <input style="width:250px; display:inline;" id="date_to" name"date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>"><br/>
            <div style="margin-top:20px;"><?php echo $this->Form->input('keyword', array('type'=>'text', 'id'=>"keyword", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Keyword','div'=>false, 'value'=>$keyword, 'style'=>"width:250px; display:inline; " ))?></div>
          </div>
          <div><button style="float:right" type="button" class="btn btn-primary" id="btn-search" onclick="javascript:search();">Search</button> </div>
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
    <div class="col-lg-6">

        <p class="bs-component">
          <a href="<?php echo $this->webroot;?>admin/articles/edit" class="btn btn-primary">Add New</a>
        </p>
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
              <th>#No</th>
              <th>Created</th>
              <th>Title</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
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
              <td><?php echo $article['Article']['small_image'] ?></td>
              
              <td><?php if($article['Article']['is_published']) echo "Published"; else echo "Draft"; ?></td>
              <td>
                <!--<a href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>">View</a> 
                <a href="<?php echo $this->webroot?>admin/articles/delete/<?php echo $article['Article']['id'] ?>" onclick="return confirm('Do you want delete this news?')">Delete</a> -->
                <a href="<?php echo $this->webroot?>admin/articles/view/<?php echo $article['Article']['id'] ?>">View</a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
        <input id="btn-delete" type="submit" value="Delete">
        </form>
      </div><!-- /example -->
    </div>
  </div>
  <div id="dialog-confirm-delete" title="Delete this users?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>All selected user will be deleted. Are you sure?</p>
  </div>

  <div id="dialog-confirm-delete1" title="Confirm delete this users?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure?</p>
  </div>

  <div id="dialog-delete-message" title="Download complete">
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
            "Delete": function() {
              $( "#dialog-confirm-delete1" ).dialog("open");
              $( this ).dialog( "close" );
              event.preventDefault();
            },
            Cancel: function() {
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
            "Delete": function() {
              
              $( this ).dialog( "close" );
              $('#form').submit();
            },
            Cancel: function() {
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
