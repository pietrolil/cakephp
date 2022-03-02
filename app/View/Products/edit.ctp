<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Product</h1>
<?php
    echo $this->Form->create('Product', array('url' => 'edit'));
    echo $this->Form->input('name');
    echo $this->Form->input('price');
    echo $this->Form->input('quantity');
    echo $this->Form->input('status', array(
        'options' => array('new' => 'New', 'used' => 'Used')
    ));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Post');