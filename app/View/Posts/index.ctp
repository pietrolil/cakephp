<!-- File: /app/View/Posts/index.ctp -->

<h1>Posts do Blog</h1>
<p><?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));?></p>
<p><?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add'));?></p>
<p><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));?></p>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Action</th>
        <th>Data de Criação</th>
    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo as informações dos posts -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
        </td>
        <td>   
            <?php echo $this->Html->link(
					'Edit', array('action' => 'edit', $post['Post']['id']));?>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?')
            )?>
            
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
<?php endforeach; ?>

</table>