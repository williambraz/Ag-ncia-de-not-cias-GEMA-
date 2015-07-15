<div class="navbar navbar-default navbar-static-top">
	<header id="header">
		<div class='navbar-header'>
			<?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'Unpipeds', 'class'=>'navbar-brand')), array('controller' => 'posts', 'action' => 'home'),array('escape'=>false));?>
			<button class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
				<span class='sr-only'>Toggle Navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
		</div>
	</header>
</div>