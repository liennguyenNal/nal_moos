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

      // $conditions = array();
      // if($this->params['named']['keyword']){
      //   $keyword = $this->request->params['named']['keyword'];
      //    $conditions = array("Article.title LIKE '%$keyword%'" );
      //    $this->set('keyword', $keyword);
      // }

      $criteria = "1=1 ";
      if($this->params['named']['keyword']){
        $keyword = $this->params['named']['keyword'];
        $criteria .= " AND Article.title LIKE '%$keyword%' " ;
        $this->set('keyword', $keyword);
      }
      if($this->params['named']['is_published'] or $this->params['named']['is_published']=='0'){
        $is_published = $this->params['named']['is_published'];
        //var_dump($is_published); die;

        $criteria .= " AND Article.is_published = '$is_published'" ;
        $this->set('is_published', $is_published);
      }
      if($this->params['named']['date_from']){
        $date_from = $this->params['named']['date_from'];
        $criteria .= " AND Article.created >= '$date_from'" ;
        $this->set('date_from', $date_from);
      }
      if($this->params['named']['date_to']){
        $date_to = $this->params['named']['date_to'];
        $criteria .= " AND Article.created <= '$date_to' " ;
        $this->set('date_to', $date_to);
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
            'conditions' => array($criteria),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $articles = $this->paginate('Article');
        for($i=0; $i<count($articles); $i++){
          
          $articles[$i]['Article']['created'] = date ('Y-m-d',strtotime($articles[$i]['Article']['created']));
          

        }
        
        //var_dump($articles); die;
         
        // pass the value to our view.ctp
        $this->set('articles', $articles);
    }
    
    function admin_edit($id=null){ //die('s');
        
      $article = $this->Article->find('first', array('conditions'=>array('Article.id'=>$id), 'contain'=>array('id'))); 
      $article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));

      $this->set( 'article', $article );
      
      

       
      
          
           if($id){
               $article = $this->Article->read( null, $id );
               $article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));
               $this->data = $article;
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

      $this->Session->setFlash('Selected News are deleted','default', array('class' => 'alert alert-dismissible alert-success'));

      $this->redirect('index');

      }
      
    }
    
    function admin_delete($id){ //die('ss');
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
            $this->Session->setFlash('News are deleted','default', array('class' => 'alert alert-dismissible alert-success'));

            $this->redirect( 'index' );
        }
    }

    function admin_view($id){
      if($id){
         $article = $this->Article->read( null, $id );
         $article['Article']['created'] = date ('Y-m-d',strtotime($article['Article']['created']));
         $this->set( 'article', $article ); 
          //var_dump($contact); die;
          $this->data= $article;
         
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
    function admin_edit_confirm(){ 
    if($_POST['view']==1){
    $article = $this->data;
    //var_dump($this->data); die;

    if($this->data['Article']['small_image_file']['name']){
                    
                    $path = "images/upload/news/small/";
                    $image = $this->uploadImage($this->data['Article']['small_image_file'], $path, 200, 400, $errors);
                    $l_path = "images/upload/news/big/";
                    $l_image = $this->uploadFile($this->data['Article']['small_image_file'], $l_path, $errors);
                    //var_dump($image); var_dump($l_image); die;
                    if(!$errors){
                        $article['Article']['small_image'] = $image;
                        $article['Article']['large_image'] = $l_image;
                    }
                    
                }
    else{
      $article2 = $this->Article->find('first', array('conditions'=>array('Article.id'=>$article['Article']['id']), 'contain'=>array('id'))); 
      //var_dump($article2); die;
      if($article2['Article']['small_image']){
        $article['Article']['small_image'] = $article2['Article']['small_image'];
        $article['Article']['large_image'] = $article2['Article']['large_image'];
      }
    }
                
    //var_dump($article); die('s');
    //$article['Article']['small_image_file'] = $this->data['Article']['small_image_file']['name'];
    $this->set( 'article', $article );
    }
    else{
      $article= unserialize($this->data['article_confirm']);
      if($this->Article->save($article, false)){
                  $this->Session->setFlash( 'Thanks you, you have been send email successful to administrator.','default', array('class' => 'alert alert-dismissible alert-success' ) );
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
      //var_dump(unserialize($this->data['article_confirm'])); die;

    }


    }
}
?>