<?php

class Product extends AppModel
{
    public $name = 'Product';

    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'price' => array(
            'rule' => 'notBlank'
        ),
        'quantity' => array(
            'rule' => 'notBlank'
        ),
        'status' => array(
            'valid' => array(
                'rule' => array('inList', array('new', 'used')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
        ),

    );
}
