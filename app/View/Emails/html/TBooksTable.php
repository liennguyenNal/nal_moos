<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

class  TBooksTable extends Table {

	public function initialize(array $config)
    {
        $this->table('t_books');
        $this->belongsTo('TUserAuthors', ['foreignKey' => 'author_id']);
    }

     public function validationDefault(Validator $validator)
    {
         $validator
            ->notEmpty('title', 'Name is required')
            ->notEmpty('category_id', 'Select a category')
            ->notEmpty('price', 'Price is required')
            ->notEmpty('publish_date', 'Publish Date is required')
            ->notEmpty('edit_price', 'Edit Price is required')
            ->notEmpty('book_file', 'Please upload file');

          //$validator->add('email', 'valid-email', ['rule' => 'email']);
          // $validator->add('email', 'isUnique', [
          //       'rule' => 'IsUnique',
          //       'message' => "Email is unique"
          //   ]);
          
          return $validator;
    }
}
