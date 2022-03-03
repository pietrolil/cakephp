<?php

class Order extends AppModel {
    public $name = 'Order';
    public $belongsTo = array(
        'Product'
    );
    public $validate = array(
        'quantity' => array(
            'rule' => 'notBlank'
        ),
        'status' => array(
            'valid' => array(
                'rule' => array('inList', array('approving', 'in progress', 'finished')),
                'message' => 'Please enter a valid status',
                'allowEmpty' => false
            )
        ),
        
    );

}
