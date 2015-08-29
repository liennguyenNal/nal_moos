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
        $this->set('menu' , 'artice');
      }
    function admin_index(){
      // $articles = $this->Article->find('all', array('conditions'=>array(),
      //   'order'=>array('Article.created DESC')
      //   ));
      // $this->set('articles', $articles);

    // we prepare our query, the cakephp way!

      $conditions = array();
      if($this->request->query['keyword']){
        $keyword = $this->request->query['keyword'];
         $conditions = array("Article.title LIKE '%$keyword%'" );
      }
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 1,
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
               
               
               if($this->Article->save($article, false)){
                  $this->Session->setFlash('Thanks you, you have been send email successful to administrator.');
                   $this->redirect("index");
               }
           }
           
    
       }
       else {
          
           if($id){
               $article = $this->Article->read(null, $id);
               $this->data = $article;
           }
       }
    }
    
    function admin_delete($id){
        if($id){
            $this->Article->delete($id);
            $this->redirect('index');
        }
    }
}
?>