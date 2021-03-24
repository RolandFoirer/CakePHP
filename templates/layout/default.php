<!DOCTYPE html>
<html lang="fr">
<head>
    <?= $this->element('front/header'); ?>
    <title>
        <?= $this->fetch('title') ?> :: Images
    </title>
</head>

<body>
    <section id="container">
    <?= $this->element('front/navbar'); ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('front/footer'); ?>
    </section>

    <?= $this->Flash->render(); ?>
</body>
</html>
