<!-- File: /app/View/products/index.ctp -->

<h1>Products do Blog</h1>

<p><?php echo $this->Html->link('Add Product', array('controller' => 'products', 'action' => 'add')); ?></p>

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
            
                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $product['Product']['id'])
                    );

                ?>
                <?php
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $product['Product']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                ?>

            </td>
            <td><?php echo $product['Product']['created_at']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>