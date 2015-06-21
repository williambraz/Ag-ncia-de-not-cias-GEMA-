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
		<ul class='nav navbar-nav navbar-right collapse navbar-collapse'>
			<li><?php echo $this->Html->link('Posts', array('controller' => 'posts', 'action' => 'index'));?></li>
			<li>
				<a href='about.html' data-target='#' data-toggle='dropdown'>About<span class="caret"></span></a>
				<ul class='dropdown-menu'>
					<li><a href='williambraz.com.br'>William Braz</a></li>
					<li class='divider'></li>
					<li><a href='www.facebook.com'>Facebook</a></li>
				</ul>
			</li>
			<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'login'));?></li>
		</ul>
	</header>
</div>