<!-- app/View/Users/add.ctp -->
<div class="orders form">
    <?php echo $this->Form->create('Order'); ?>
    <fieldset>
        <legend><?php echo __('Add Order'); ?></legend>
        <?php echo $this->Form->input('quantity');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>