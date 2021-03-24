<?php
$this->assign('title',"Affichage image");
?>
<!doctype html>
<html lang="fr">
<body>
    <main role="main">
        <div class="pictures">
            <table>
            <?php
            $files =glob("img/*.*");
            $compteur=count($files);
            for($i=0; $i<$compteur;$i++){
                echo '<tr>';
                echo '<td>'.'<img src="'.$files[$i].'" alt=""/>'.'</td>';
                echo '</tr>';
            }
            ?>
            </table>
<!--            <div class="paginator">-->
<!--                 <ul class="pagination">-->
<!--                    --><?//=$this->Paginator->first('<< ' . __('first'), ['model' => 'Lgas', 'tab' => 'lga'])?>
<!--                    --><?//=$this->Paginator->prev('< ' . __('previous'), ['model' => 'Lgas', 'tab' => 'lga'])?>
<!--                    --><?//=$this->Paginator->numbers(['model' => 'Lgas', 'tab' => 'lga'])?>
<!--                    --><?//=$this->Paginator->next(__('next') . ' >', ['model' => 'Lgas', 'tab' => 'lga'])?>
<!--                    --><?//=$this->Paginator->last(__('last') . ' >>', ['model' => 'Lgas', 'tab' => 'lga'])?>
<!--                </ul>-->
<!--                <p>--><?//=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Lgas', 'tab' => 'lga'])?><!--</p>-->
<!--            </div>-->
        </div>
    </main>
</body>
</html>
