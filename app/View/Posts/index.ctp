<!-- File: /app/View/Posts/index.ctp -->

<?php echo $this->element('menu') ?>

<div class="col-xs-12">
    <p>Logado como: 
        <?php if ($this->session->read('Auth.User.username') == ""){
                echo "Visitante - ";
                echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
            } else {
                echo $this->session->read('Auth.User.username').' - ';
                echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
            }
        ;?>
    </p>
</div>

<div class="titulo text-center col-xs-12">
    <h2>Matérias</h2>
</div>

<div class="col-xs-12 well">
    <table>
        <tr>
            <th class="hidden-xs">Id</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Seção</th>
            <th>Estado</th>
            <th class="hidden-xs">Data de Criação</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>

        <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
             as informações dos posts -->

        <?php foreach ($posts as $post): ?>
        <tr>
            <td class="hidden-xs"><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td><?php echo $post['User']['name']; ?></td>
            <td><?php echo $post['Post']['section']; ?></td>
            <td><?php echo $post['Post']['state']; ?></td>
            <td class="hidden-xs"><?php echo $post['Post']['created']; ?></td>
            <td><?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));?>
            </td>
            <td><?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']));?></td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

<div class="text-center col-xs-12">
    <?php echo $this->Html->link('Adicionar matéria', array('controller' => 'posts', 'action' => 'add'),array('class'=>'btn btn-primary'));?>
</div>