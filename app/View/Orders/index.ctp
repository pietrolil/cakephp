<!-- File: /app/View/orders/index.ctp -->

<h1>Orders do Blog</h1>

<p><?php echo $this->Html->link('Back to Products', array('controller' => 'products', 'action' => 'index')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Status</th>
        <th>Quantity</th>
        <th>Action</th>
        <th>Created</th>


    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $orders, imprimindo as informações dos orders -->
    <?php foreach ($orders as $order) : ?>
        <tr>
            <td><?php echo $order['Order']['id']; ?></td>
            <td><?php echo $order['Order']['status']; ?></td>
            <td><?php echo $order['Order']['quantity']; ?></td>
            <td>
                <?php

                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $order['Order']['id'])
                );

                ?>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $order['Order']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?>
            </td>
            <td><?php echo $order['Order']['created']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>