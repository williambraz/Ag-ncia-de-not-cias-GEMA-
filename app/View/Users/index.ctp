<!-- app/View/Users/index.ctp -->

<?php echo $this->element('menu') ?>

<div class="box box-primary">
	  <div class="box-header">
	    <h3 class="box-title">Usuários</h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">

		<table id="table_index" class="display responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="all">Login</th>
                    <th>Nome</th>
                    <th>Papel</th>
                    <th>Seção</th>
                    <th class="all">Editar</th>
                    <th class="all">Deletar</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th class="all">Login</th>
                    <th>Nome</th>
                    <th>Papel</th>
                    <th>Seção</th>
                    <th class="all">Editar</th>
                    <th class="all">Deletar</th>
                </tr>
            </tfoot>

            <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
                 as informações dos posts -->

            <tbody>
                <?php foreach ($users as $user): ?>
	                <tr>
	                    <td><?php echo $user['User']['id']; ?></td>
	                    <td>
	                        <?php echo $this->Html->link($user['User']['username'],array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
	                    </td>
	                    <td><?php echo $user['User']['name']; ?></td>
	                    <td><?php echo $user['User']['role']; ?></td>
	                    <td><?php echo $user['User']['section']; ?></td>
	                    <td><?php echo $this->Html->link('Editar', array('controller' => 'users', 'action' => 'edit', $user['User']['id']));?>
	                    </td>
	                    <td><?php echo $this->Form->postLink('Deletar', array('controller' => 'users', 'action' => 'delete', $user['User']['id']));?></td>

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
});
</script>