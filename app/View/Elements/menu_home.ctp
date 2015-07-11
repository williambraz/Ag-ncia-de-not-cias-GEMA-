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
			<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-gamepad')) .' Games', array('controller' => 'posts', 'action' => 'section', 'games'),array('escape'=>false));?></li>
			<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-film')) .' Séries e TV', array('controller' => 'posts', 'action' => 'section', 'series'),array('escape'=>false));?></li>
			<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-file')) .' Quadrinhos', array('controller' => 'posts', 'action' => 'section','quadrinhos'),array('escape'=>false));?></li>
			<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-volume-up')) .' Música', array('controller' => 'posts', 'action' => 'section','musica'),array('escape'=>false));?></li>
		</ul>
	</header>
</div>