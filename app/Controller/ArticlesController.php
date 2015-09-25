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
      // $articles = $this->Article->find('all', array('conditions'=>array(),
      //   'order'=>array('Article.created DESC')
      //   ));
      // $this->set('articles', $articles);

    // we prepare our query, the cakephp way!

      $conditions = array();
      if($this->params['named']['keyword']){
        $keyword = $this->request->params['named']['keyword'];
         $conditions = array("Article.title LIKE '%$keyword%'" );
         $this->set('keyword', $keyword);
      }
      //$this->Paginator->settings['paramType'] = 'querystring';
      //print_r($this->params['named']['keyword']); die;
      // $urls = $this->request->query; $getv = "";
      // foreach($urls as $key=>$value)
      // {
      // if($key == 'url') continue; // we need to ignor the url field
      // $getv .= urlencode($key)."=".urlencode($value)."&"; // making the passing parameters
      // }
      // $getv = substr_replace($getv ,"",-1); 
      //  $this->set('getv', $getv);
      // echo $getv; die;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $articles = $this->paginate('Article');
         
        // pass the value to our view.ctp
        $this->set('articles', $articles);
    }
    
    function admin_edit($id=null){
        
       
      if($this->data){
           
           $this->Article->set($this->data);
           $valid = $this->Article->validates();
           if($valid){
               
               $article = $this->data;
               //print_r($this->data);die;
               if($this->data['Article']['small_image_file']){
                    
                    $path = "images/upload/news/small/";
                    $image = $this->uploadImage($this->data['Article']['small_image_file'], $path, 200, 400, $errors);
                    $l_path = "images/upload/news/big/";
                    $l_image = $this->uploadFile($this->data['Article']['large_image_file'], $l_path, $errors);
                    //echo $image; die;
                    if(!$errors){
                        $article['Article']['small_image'] = $image;
                    }
                    else {
                      //print_r($errors); die;

                    }
                }
                // if($this->data['Article']['large_image_file']){
                    
                //     $path = "images/upload/news/big/";
                //     $l_image = $this->uploadFile($this->data['Article']['large_image_file'], $path, $errors);
                //     //echo $image; die;
                //     if(!$errors){
                //         $article['Article']['large_image'] = $l_image;
                //     }
                //     else {
                //       print_r($errors); die;

                //     }
                // }
               if($this->Article->save($article, false)){
                  $this->Session->setFlash( 'Thanks you, you have been send email successful to administrator.','default', array('class' => 'alert alert-dismissible alert-success' ) );
                   $this->redirect( "index" );
               }
           }
           
    
       }
       else {
          
           if($id){
               $article = $this->Article->read( null, $id );
               $this->data = $article;
           }
       }
    }
    
    function admin_delete($id){
        if($id){
            $this->Article->delete( $id );
            $this->redirect( 'index' );
        }
    }

    function admin_view($id){
      if($id){
         $article = $this->Article->read( null, $id );
         
         if( $article ){
          $this->set( 'article', $article );
         }
         else {
            $this->Session->setFlash( 'Not found news', 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
            $this->redirect( "index" );
         }
      }
      else {
        $this->Session->setFlash( 'Not found news', 'default', array( 'class' => 'alert alert-dismissible alert-info"' ) );
        $this->redirect( "index" );
      }
    }

    function view( $id ){
      if($id){
         $article = $this->Article->read( null, $id );
         
         if( $article ){
          $this->set( 'article', $article);
         }
         else {
            $this->Session->setFlash('Not found news', 'default',array('class' => 'alert alert-dismissible alert-info"'));
            $this->redirect("index");
         }
      }
      else {
        $this->Session->setFlash('Not found news', 'default',array('class' => 'alert alert-dismissible alert-info"'));
        $this->redirect("index");
      }
    }

    function index(){
      
      $conditions = array();
      if($this->request->query['keyword']){
        $keyword = $this->request->query['keyword'];
         $conditions = array("Article.title LIKE '%$keyword%' AND Article.is_published = 1" );
      }
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 20,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $articles = $this->paginate('Article');
         
        // pass the value to our view.ctp
        $this->set('articles', $articles);
    }
}
?>