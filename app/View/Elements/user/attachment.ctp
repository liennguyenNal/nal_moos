<div class="title-tab">
  <h3>添付書類</h3>
</div>
<div class="table-style table-style-fix">
  <!-- FORM -->
  <?php echo $this->element('flash'); ?>
  <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserAttachForm')); ?>
  <table>
    <tr>
      <td class="color-a">用途</td>
      <td class="color-a">説明</td> 
      <td class="color-a">ファイル添付</td>
    </tr>
    <?php  foreach ($attachment_types as $type) { 
                    $i = $type['AttachmentType']['id'];
                    ?>
    <tr>
      <td class="color-b">  <?php echo $type['AttachmentType']['name']?></br>
      <?php if($type['AttachmentType']['is_required']){?> 
      <span class="style">必須</span></td> 
      <?php }?>
      <td class="text-align"><?php echo nl2br($type['AttachmentType']['description']);?></td>

      <td>

        <!-- <div class="upload-file"><span class="style-a">ファイルを選択する</span><input type="file" name="pic" accept=""></div> -->
           <?php 
                    
                    
                    $file_name = "";
                      foreach($user['UserAttachment'] as $item){
                        //print_r($item);
                        if($item['attachment_type_id'] == $i){
                          $file_name = $item['file_name'];
                          break; 
                        }
                      }
                     
                    ?>
                    <?php  if(!$file_name){ ?>
                      <div class="upload-file">
                      
                         
                         
                         <div id="file-<?php echo $i ?>"></div>
                           <span class="style-a sp-hide" id="spfileupload-<?php echo $i ?>">ファイルを選択する</span>
                           <input class="sp-hide" id="fileupload-<?php echo $i ?>" type="file" name="data[Attachment][file][<?php echo $i ?>]" />
                       </div>
                     <?php } else { ?>  
                      <div class="upload-file">
                           <div id="file-<?php echo $i ?>"><?php echo $file_name;?><a onclick='delete_file(<?php echo $i ?>);' href='javascript:void(0)'> X </a></div>
                           <section id="section-upload-<?php echo $i ?>" style="display:none">
                             <span class="style-a sp-hide" id="spfileupload-<?php echo $i ?>">ファイルを選択する</span>
                           <input class="sp-hide" id="fileupload-<?php echo $i ?>" type="file" name="data[Attachment][file][<?php echo $i ?>]" />
                           </section>
                           
                     </div>
                      <?php } ?>
                      
      </td>
    </tr>
    <?php } ?>
    
    <?php if($user['User']['status_id']!= 2) {?>
      <script type="text/javascript" charset="utf-8">
        $('#UserAttachForm').find(':input').hide();
        $('#UserAttachForm').find('a').hide();
      </script>
    <?php } ?>

    <script type="text/javascript">
      $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = "<?php echo $this->webroot;?>attachments/upload/";
        var reload_url = "<?php echo $this->webroot?>users/reload_dashboard";
        <?php foreach($attachment_types as $type){
          $i = $type['AttachmentType']['id'];

          echo "$('#fileupload-$i').fileupload({
              url: url + '$i',
              dataType: 'json',
              done: function (e, data) {
                if(data.result.error == '0'){
                  $('<p/>').html(data.result.filename + '<a onclick=\'delete_file($i);\' href=\'#\'> X </a>').appendTo('#file-$i');
                  $('#fileupload-$i').parent().find('.sp-hide').hide();

                  $.ajax({
                         url: reload_url,
                          success: function(result){
                            $('#home').html(result);
                          }
                      });
                }
                else {
                  alert(data.result.error_msg);
                }}
            });";
        } ?>
      });

        function delete_file(id){
          $.ajax({url: "<?php echo $this->webroot;?>attachments/remove_file/" + id, success: function(result){
            $("#file-"+id).html("");
            $('#fileupload-'+id).parent().find('.sp-hide').show();
            $("#section-upload-"+ id).show();
            $.ajax({
               url: '<?php echo $this->webroot?>users/reload_dashboard',
                success: function(result){
                  $('#home').html(result);
                }
            });
          }});
        }
      </script>
  </table>
  </form>
  <!-- END FORM -->
</div>