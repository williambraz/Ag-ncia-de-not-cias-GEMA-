<div class="navbar navbar-default navbar-static-top">
	<header id="header">
		<div class='navbar-header'>
			<?php echo $this->Html->link("GEMA", array('controller' => 'posts', 'action' => 'home'),array('class'=>'navbar-brand'));?>
			<button class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
				<span class='sr-only'>Toggle Navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
		</div>
		<ul class='nav navbar-nav collapse navbar-collapse'>
			<?php if ($this->session->read('Auth.User.role') == "admin") : ?>
				<li>
					<a href='#' data-target='#' data-toggle='dropdown'>
						<i class="fa fa-users"></i><?php echo ' Usuários'?><span class="caret"></span>
			        </a>
					<ul class='dropdown-menu'>
						<li>
							<?php echo $this->Html->link('Listar', array('controller' => 'users', 'action' => 'index'));?>
						</li>
						<li>
							<?php echo $this->Html->link('Adicionar', array('controller' => 'users', 'action' => 'add'));?>
						</li>
					</ul>
				</li>
			<?php endif ?>
			<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-files-o')).' Matérias', array('controller' => 'posts', 'action' => 'index'),array('escape'=>false));?></li>
		</ul>
		<ul class='nav navbar-nav collapse navbar-collapse navbar-right'>
			<li>
				<a href='#' data-target='#' data-toggle='dropdown'>
					 <i class="fa fa-gears"></i><?php echo ' ' . $this->session->read('Auth.User.username');?><span class="caret"></span>
		        </a>
				<ul class='dropdown-menu'>
					<li>
						<?php echo $this->Html->link('Meus Dados', array('controller' => 'users', 'action' => 'edit', $this->session->read('Auth.User.id')));?>
					</li>
					<li>
						<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));?>
					</li>
				</ul>
			</li>
	    </ul>
	</header>
</div>