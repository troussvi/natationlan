<html>
<body>
<section>
 
    <div id="Liste">    
        <h1>Liste des nageurs </h1>
        <?php
        $attributes = array('name' => 'form');
            <table id="table_list" class="list_nageurs">
                <?php
                if($_nageurs != NULL):
                foreach($_nageurs as $r):?>
                <tr>
                    <th class="td_nageurs">Nom</th>
                    <th class="td_nageurs">Prenom</th>
                    <th class="td_nageurs">E-mail</th>
                </tr>
                <tr id="<?php echo $r->idnageur;?>" class="defaut">
                    <td class="td_nageurs"><?php echo $r->Nom;?></td>
                    <td class="td_nageurs"><?php echo $r->Prenom;?></td>
                </tr>
                 
                <?php endforeach; endif;?>
            </table>
    </div>
     
</section>
</body>
</html>