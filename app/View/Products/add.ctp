<!-- app/View/Users/add.ctp -->
<div class="products form">
<?php echo $this->Form->create('Product');?>
    <fieldset>
        <legend><?php echo __('Add Product'); ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('price');
        echo $this->Form->input('quantiy');
        echo $this->Form->input('status', array(
            'options' => array('new' => 'New', 'used' => 'Used')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>