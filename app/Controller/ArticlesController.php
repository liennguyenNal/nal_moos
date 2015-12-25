<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class ArticlesController extends AppController{
		var $uses = array('User', 'Article');
		var $components = array('Login', 'Util', 'Session');
		var $helpers = array('Html');
		 
		public function beforeFilter(){
				parent::beforeFilter();
				$this->set('menu' , 'article');
			}
		function admin_index(){


			$criteria = "1=1 ";
			if($this->params['named']['keyword']){
				$keyword = $this->params['named']['keyword'];
				$criteria .= " AND Article.title LIKE '%$keyword%' " ;
				$this->set('keyword', $keyword);
			}
			if($this->params['named']['is_published'] or $this->params['named']['is_published']=='0'){
				$is_published = $this->params['named']['is_published'];        

				$criteria .= " AND Article.is_published = '$is_published'" ;
				$this->set('is_published', $is_published);
			}
			if($this->params['named']['date_from']){
				$date_from = $this->params['named']['date_from'];
				$criteria .= " AND Article.created >= '$date_from'" ;
				$date_form_1= explode('-',$date_from);
				$from_year_register= $date_form_1[0];
				$from_month_register= $date_form_1[1];
				$from_day_register= $date_form_1[2];

				$this->set('from_year_register', $from_year_register);
				$this->set('from_month_register', $from_month_register);
				$this->set('from_day_register', $from_day_register);
				

			}
			if($this->params['named']['date_to']){
				$date_to = $this->params['named']['date_to'];
				$criteria .= " AND Article.created <= '$date_to' " ;
				$date_to_1= explode('-',$date_to);
				$to_year_register= $date_to_1[0];
				$to_month_register= $date_to_1[1];
				$to_day_register= $date_to_1[2];

				$this->set('to_year_register', $to_year_register);
				$this->set('to_month_register', $to_month_register);
				$this->set('to_day_register', $to_day_register);
			}

				$this->paginate = array(
						'conditions' => array($criteria),
						'limit' => 10,
						'order' => array('id' => 'desc')
				);
				 
				// we are using the 'User' model
				$articles = $this->paginate('Article');
				for($i=0; $i<count($articles); $i++){
					
					$articles[$i]['Article']['created'] = date ('Y-m-d',strtotime($articles[$i]['Article']['created']));
					

				}
				
				// pass the value to our view.ctp
				$this->set('articles', $articles);
		}
		
		function admin_edit($id=null){ 
				
			$article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id), 'contain'=>array('id'))); 
			$article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));

			$this->set( 'article', $article );      
					
			if($id){
				$article = $this->Article->read( null, $id );
				$article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));
				$this->data = $article;
			}

			else {
				//$this->redirect('index');
			}
			

		}
		function admin_multi_delete(){ $ids= $_POST['article_id'];
			if($_POST['article_id']){
				foreach($ids as $id){
					$article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id), 'contain'=>array('id'))); 
					if($article['Article']['small_image']){
						$file = new File("images/upload/news/small/".$article['Article']['small_image']);
						$file->delete();

					}
					if($article['Article']['large_image']){
						$file = new File("images/upload/news/big/".$article['Article']['large_image']);
						$file->delete();
						
					}
					$this->Article->delete($id);
				}


			$this->redirect('index');

			}
			
		}
		
		function admin_delete($id){ 
			$article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id), 'contain'=>array('id'))); 
			if($article['Article']['small_image']){
				$file = new File("images/upload/news/small/".$article['Article']['small_image']);
				$file->delete();

			}
			if($article['Article']['large_image']){
				$file = new File("images/upload/news/big/".$article['Article']['large_image']);
				$file->delete();
				
			}
				if($id){
						$this->Article->delete( $id );

						$this->redirect( 'index' );
				}
		}

		function admin_view($id){

			if($id){
				 $article = $this->Article->read( null, $id );
				 $article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));
				 $this->set( 'article', $article ); 
					
					$this->data= $article;
				 
				 if( $article ){
					$this->set( 'article', $article );
				 }
				 else {
						$this->redirect( "index" );
				 }
			}
			else {
				$this->redirect( "index" );
			}
		}

		function view( $id, $title = null ){
			$this->layout = 'news';

			if($id){
				if($title){ 
					$article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id, 'Article.title'=>$title))); 
				}
				else  $article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id), 'contain'=>array('id'))); 
				if($article){
					 $article['Article']['created']= date('Y-m-d',strtotime($article['Article']['created']));
					 $time= ($article['Article']['created']);
					 $arts = $this->Article->find('all', array('conditions'=>array('Article.is_published'=>1), 'order'=>array('Article.created DESC')));
						$i=0;
						foreach($arts as $art){
							if($i<4){ 
								if(strtotime($article['Article']['created']) >= strtotime($art['Article']['created']) and $art['Article']['id']!=$id){
									$i++;
									$art['Article']['created']= date('Y-m-d',strtotime($art['Article']['created']));
									$articles_new[]= $art;
								}
							}
						}
						$this->set('articles', $articles_new);
					 
					 if( $article['Article']['is_published'] ==1 and $article['Article']['created']<= date("Y-m-d")){
						$this->set( 'article', $article);
					 }
					 else {
							
							$this->redirect("/");
					 }
				}
				else {
					$this->redirect("/");
				}
			}
			else {
				$this->redirect("/");
			}
		}

		function admin_edit_confirm(){ 
		if($_POST['view']==1){ 
			$article = $this->data;
		 	
			if($this->data['Article']['small_image_file']['name']){
											
					$path = "images/upload/news/small/";
					$image = $this->uploadImage($this->data['Article']['small_image_file'], $path, 200, 400, $errors);
					$l_path = "images/upload/news/big/";
					$l_image = $this->uploadFile($this->data['Article']['small_image_file'], $l_path, $errors);
					
					if(!$errors){
							$article['Article']['small_image'] = $image;
							$article['Article']['large_image'] = $l_image;
					}
					
			}
			else {
				$article2 = $this->Article->find('first', array('conditions'=>array('Article.id'=>$article['Article']['id']), 'contain'=>array('id'))); 
				if($article2['Article']['small_image']){
					$article['Article']['small_image'] = $article2['Article']['small_image'];
					$article['Article']['large_image'] = $article2['Article']['large_image'];
				}
			}
									
			$this->set( 'article', $article );
		}
		else{
			if($this->data){
				$article= unserialize($this->data['article_confirm']);
				$article['Article']['created'] = $article['Article']['from_year_register'].'-'.$article['Article']['from_month_register'].'-'.$article['Article']['from_day_register'];

				if($this->Article->save($article, false)){
					$this->redirect( "view/".$article['Article']['id'] );
				}

				$article1 = $this->Article->find('first', array('conditions'=>array('Article.id'=>$article['Article']['id']), 'contain'=>array('id'))); 

				if($article1['Article']['small_image'] and $article['Article']['small_image_file']){
					$file = new File("images/upload/news/small/".$article['Article']['small_image']);
					$file->delete();

				}
				if($article1['Article']['large_image'] and $article['Article']['small_image_file']){
					$file = new File("images/upload/news/big/".$article['Article']['large_image']);
					$file->delete();
					
				}
			}
			else {
				$this->redirect('index');
			}
		}


		}
}
?>