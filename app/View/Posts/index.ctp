<!-- File: /app/View/Posts/index.ctp -->

<?php echo $this->element('menu') ?>

<div class='btn-adicionar-materia'>
    <?php if ($this->session->read('Auth.User.role') == "jornalista")
            echo $this->Html->link('Adicionar matéria', array('controller' => 'posts', 'action' => 'add'),array('class'=>'btn btn-primary'));
    ?>
</div>

<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Matérias</h3>
    <div class="filtros center">
        <button id="btn-games" class="btn btn-primary">Games</button>
        <button id="btn-filmes" class="btn btn-primary">Séries</button>
        <button id="btn-hq" class="btn btn-primary">Quadrinhos</button>
        <button id="btn-geral" class="btn btn-primary">Geral</button>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
        <table id="table_index" class="display responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="all">Título</th>
                    <th>Autor</th>
                    <th>Revisor</th>
                    <th>Publicador</th>
                    <th>Seção</th>
                    <th>Estado</th>
                    <th>Data de Criação</th>
                    <th class="all">Editar</th>
                    <th class="all">Deletar</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Revisor</th>
                    <th>Publicador</th>
                    <th>Seção</th>
                    <th>Estado</th>
                    <th>Data de Criação</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </tfoot>

            <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
                 as informações dos posts -->

            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post['Post']['id']; ?></td>
                    <td>
                        <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
                    </td>
                    <td><?php echo $post['Journalist']['name']; ?></td>
                    <td><?php 
                        if (empty($post['Reviser']['name']) && $this->session->read('Auth.User.role') == "revisor") 
                            echo $this->Html->link('Escolher',array('controller' => 'posts', 'action' => 'select_reviser', '?' => array('id' => $post['Post']['id'], 'reviser_id' => $this->session->read('Auth.User.id')))); 
                        else 
                            echo $post['Reviser']['name'];?>
                    </td>
                    <td><?php 
                        if (empty($post['Publisher']['name']) && $this->session->read('Auth.User.role') == "publicador") 
                            echo $this->Html->link('Escolher',array('controller' => 'posts', 'action' => 'select_publisher', '?' => array('id' => $post['Post']['id'], 'publisher_id' => $this->session->read('Auth.User.id'))));
                        else 
                            echo $post['Publisher']['name'];?>
                    </td>
                    <td><?php echo $post['Post']['section']; ?></td>
                    <td><?php echo $post['Post']['state']; ?></td>
                    <td><?php echo $post['Post']['created']; ?></td>
                    <td><?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));?>
                    </td>
                    <td><?php echo $this->Form->postLink('Deletar', array('action' => 'delete', $post['Post']['id']));?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
  </div><!-- /.box-body -->
  <div class="box-footer">
  </div><!-- box-footer -->
</div><!-- /.box -->

<script>
$(document).ready(function(){
    var tabela = $('#table_index').dataTable({
        responsive: true,
        'oLanguage':{
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
    
    $('#btn-games').click(function(event) {
        tabela.fnFilter( 'games',5 );
    });

    $('#btn-filmes').click(function(event) {
        tabela.fnFilter( 'séries',5 );
    });

    $('#btn-hq').click(function(event) {
        tabela.fnFilter( 'quadrinhos',5 );
    });

    $('#btn-geral').click(function(event) {
        tabela.fnFilter( '',5 );
    });
});
</script>