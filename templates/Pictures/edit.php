<?php
$this->assign('title',"Question");
?>
<!doctype html>
<html lang="fr">
<body>
<main role="main">
    <div class="formulaire">
        <div class="form-formulaire">
            <?= /** @var \App\Model\Entity\Picture $questionEntity */
            $this->Form->create($questionEntity,[
                 'type' => 'file',
                 'action' => 'add',
            ]); ?>
            <?= $this->Form->control('title', [
                'label' => 'Titre de la question',
                'class' => 'form-control',
            ]); ?>
            <?= $this->Form->control('content', [
                'label' => 'La réponse à afficher',
                'class' => 'form-control',
            ]); ?>
            <?= $this->Form->control('online', [
                'label' => 'Afficher publiquement',
                'class' => 'form-control',
            ]); ?>
            <?= $this->Form->button('Valider', [
                'class' => 'btn btn-primary',
                'type' => 'submit',
            ]);?>
            <?= $this->Form->end();?>
        </div>
    </div>
</main>
</body>
</html>
