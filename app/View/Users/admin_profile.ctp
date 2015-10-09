
<div class="page-header">

<div class="row">

    <div class="col-lg-12">
      <div class="bs-component">
			 
			    <h4 class="active">管理者プロファイル</h4>
			  
		</div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
        <table class="table table-striped table-hover ">
          
          <tbody>
         
            <tr>
				<td style="background-color:#E6E6E6"><b>Email</b></td>
				
				<td><?php echo $user['Administrator']['email']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6;width:200px"><b>姓</b></td>
				
				<td><?php echo $user['Administrator']['first_name']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>名</b></td>
				
				<td><?php echo $user['Administrator']['last_name']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>セイ</b></td>
				
				<td><?php echo $user['Administrator']['first_name_kana']?></td>

			</tr>
			<tr>
				<td style="background-color:#E6E6E6"><b>メイ</b></td>
				
				<td><?php echo $user['Administrator']['last_name_kana']?></td>

			</tr>
			
          </tbody>
        </table> 
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/users/edit_profile'">変更する</button>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $this->webroot;?>admin/users/change_password'">パスワード変更</button>
            </div>
          </div>
      </div>
    </div>

  </div>