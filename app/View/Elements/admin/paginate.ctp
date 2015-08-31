
<div class="col-lg-4">
  <div class="bs-component">
    <ul class="pagination">
      <!-- <li class="disabled"><a href="#">&laquo;</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>current
       -->
       <?php
       // the 'first' page button
        echo $this->Paginator->first( "First", array( 'tag' => 'li' ) );
         
        // 'prev' page button, 
        // we can check using the paginator hasPrev() method if there's a previous page
        // save with the 'next' page button
        if($this->Paginator->hasPrev()){
            echo $this->Paginator->prev( "Prev", array( 'tag' => 'li' ) );
        }
         
        // the 'number' page buttons
        echo $this->MyPaginator->numbers( array( 'modulus' => 5 , 'tag'=>'li') );
         
        // for the 'next' button
        if($this->Paginator->hasNext()){
            echo $this->Paginator->next( "Next", array( 'tag' => 'li' ));
        }
         
        // the 'last' page button
        echo $this->Paginator->last( "Last", array( 'tag' => 'li' ) );
        ?>
    </ul>

    
  </div>
</div>