<!-- File: /app/View/Posts/add.ctp -->

<h1>Adicionar matéria</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label'=>'Título'));
echo $this->Form->input('content', array('label'=>'Conteúdo', 'rows' => '3'));
echo $this->Form->input('section', array(
'label'=>'Seção:',
'options' => array('games' => 'Games', 'quadrinhos' => 'Quadrinhos', 'música' => 'Música', 'séries' => 'Séries e TV')
));
echo $this->Form->end('Postar');