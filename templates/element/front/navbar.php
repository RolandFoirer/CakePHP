<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="/">My Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?= $this->Html->link(
                        'Afficher les images',
                        ['controller'=> 'Pictures', 'action' => 'view'],
                        [
                            'class' => 'nav-link',
                            'title' => 'Afficher les images',
                        ]
                    );?>
                </li>
                <li class="nav-item2">
                    <?= $this->Html->link(
                    'Ajouter une image',
                    ['controller'=> 'Pictures', 'action' => 'add'],
                    [
                    'class' => 'nav-link',
                    'title' => 'Ajouter une image',
                    ]
                    ); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
