<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Order</h1>
<?php
echo $this->Form->create('Order', array('url' => 'edit'));
echo $this->Form->input('status', array(
    'options' => array('approving' => 'Approving', 'in progress' => 'In progress', 'finished' => 'Finished')
));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
