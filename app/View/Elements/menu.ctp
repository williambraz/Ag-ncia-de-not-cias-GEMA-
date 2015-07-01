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
			<li><?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index'));?></li>
			<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'login'));?></li>
		</ul>
		<ul class='nav navbar-nav collapse navbar-collapse navbar-right'>
			<li>
				<a href='about.html' data-target='#' data-toggle='dropdown'>
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