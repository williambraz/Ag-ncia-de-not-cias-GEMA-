<div class="navbar navbar-default navbar-static-top">
	<header id="header">
		<div class='navbar-header'>
			<?php echo $this->Html->link("Home", array('controller' => 'posts', 'action' => 'home'),array('class'=>'navbar-brand'));?>
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
						<?php echo 'Usuários'?><span class="caret"></span>
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
			<li><?php echo $this->Html->link('Matérias', array('controller' => 'posts', 'action' => 'index'));?></li>
		</ul>
		<ul class='nav navbar-nav collapse navbar-collapse navbar-right'>
			<li>
				<a href='#' data-target='#' data-toggle='dropdown'>
					<?php echo $this->session->read('Auth.User.username');?><span class="caret"></span>
		        </a>
				<ul class='dropdown-menu'>
					<li>
						<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));?>
					</li>
				</ul>
			</li>
	    </ul>
	</header>
</div>