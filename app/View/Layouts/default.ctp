<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Home');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('jquery.dataTables.min.css');
		echo $this->Html->css('dataTables.responsive.css');
		echo $this->Html->css('AdminLTE.min.css');
  		echo $this->Html->css('froala_editor.min.css');
  		echo $this->Html->css('froala_style.min.css');
  		echo $this->Html->css('select2.min.css');
		echo $this->Html->css('estilos.css');

		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery.dataTables.min.js');
		echo $this->Html->script('dataTables.bootstrap.js');
		echo $this->Html->script('dataTables.responsive.js');
		echo $this->Html->script('froala_editor.min.js');
		echo $this->Html->script('select2.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>	
		<?php if ($this->action == 'home' || $this->action == 'section') : ?>
			<?php echo $this->element('menu_home') ?>
			<div class="container">
		<?php elseif ($this->action == 'login') : ?>
			<?php echo $this->element('menu_login') ?>
			<div class="container-fluid">
		<?php else : ?>
			<?php echo $this->element('menu') ?>
			<div class="container-fluid">
		<?php endif; ?>

			<section class='row' id="content">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>

			</section>

		</div>

		<footer class='row' id="footer">
			<span><strong> Projeto GEMA - PUC 2015</strong></span>
		</footer>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
