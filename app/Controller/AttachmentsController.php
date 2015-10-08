<?php 
class AttachmentsController extends AppController{
	var $name = "Attachments";
	var $uses = array('AttachmentType', 'UserAttachment');
	var $components = array('Upload','RequestHandler');

	function upload($type){
		$user_id = $this->s_user_id;
		if($user_id){
			if($this->data['Attachment']['file']){
				//print_r($this->data['Attachment']['file']);
				$file_name = $this->uploadFile($this->data['Attachment']['file'][$type], 'files/upload/', $errors);
				$is_error = 0;
				$error_msg = "";
				if($file_name){
					$attach['UserAttachment']['user_id'] = $user_id;
					$attach['UserAttachment']['attachment_type_id'] = $type;
					$attach['UserAttachment']['file_name'] = $file_name;
					$attach['UserAttachment']['full_path'] = 'files/upload/' . $file_name;
					if ($this->UserAttachment->save($attach, false)){
						$is_error = 0;
					}
					else {
						$is_error = 1;
						$error_msg = "Can't save data"; 
					}
				}
				else {
					$is_error = 1;
					$error_msg = $errors[0]; 
				}

				$re = array('error'=>$is_error, 'filename'=>$file_name, 'error_msg'=>$error_msg );
				header('Content-Type: application/json');
				echo json_encode($re); die;

			}
		}
		else {
			echo "0";
		}
		
	}

	function remove_file($type_id){
		$user_id = $this->s_user_id;
		if($user_id){
			$att = $this->UserAttachment->find('first', array('conditions'=>array('UserAttachment.user_id'=>$user_id, 'UserAttachment.attachment_type_id'=>$type_id)));
			if($att){
				$id = $att['UserAttachment']['id'];
				$this->UserAttachment->delete($id);
				echo "1"; die;
			}
			else echo "0"; die;
		}
		echo "0"; die;
	}
}


?>