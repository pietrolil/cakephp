<!-- File: /app/View/products/index.ctp -->

<h1>Products do Blog</h1>

<p><?php echo $this->Html->link('Add Product', array('controller' => 'products', 'action' => 'add')); ?></p>
<p><?php echo $this->Html->link('See Orders', array('controller' => 'orders', 'action' => 'index')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Quantity</th>
        <th>Action</th>
        <th>Created</th>


    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $products, imprimindo as informações dos products -->
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?php echo $product['Product']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($product['Product']['name'], array('action' => 'view', $product['Product']['id'])); ?>
            </td>
            <td><?php echo $product['Product']['price']; ?></td>
            <td><?php echo $product['Product']['status']; ?></td>
            <td><?php echo $product['Product']['quantity']; ?></td>
            <td>
                <?php
                if ($role == 'client') {
                    echo $this->Html->Link(
                        'Order',
                        array('controller' => 'orders', 'action' => 'add', $product['Product']['id'] . ',' . $product['Product']['quantity']),
                        array('confirm' => 'Are you sure?')
                    );
                }
                ?>
                <?php
                if (in_array($role, array('admin', 'employee'))) {
                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $product['Product']['id'])
                    );
                }
                ?>
                <?php
                if (in_array($role, array('admin', 'employee'))) {
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $product['Product']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                }
                ?>
            </td>
            <td><?php echo $product['Product']['created']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>