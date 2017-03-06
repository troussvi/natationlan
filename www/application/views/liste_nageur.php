<html>
<body>
<section>
 
    <div id="Liste">
        <?php
        $attributes = array('name' => 'select');
        echo form_open('apprentis/lister',$attributes);?>
            <select id="select_list_promo" onchange="valeur_select(this)">
                <?php
                if($promo != NULL):
                foreach($promo as $r):?>
                 
                <option id="<?php echo $r->IDPromo;?>" selected="">
                    <?php echo $r->Annee_pro;?>
                </option>
                 
                <?php endforeach; endif;?>
            </select>
            <input id="choix" name="select_promo" type="hidden" value="">
        <?php echo form_close();?>
         
        <h1>Liste des apprentis</h1>
        <?php
        $attributes = array('name' => 'form');
        echo form_open('apprentis/delete',$attributes);?>
            <table id="table_list" class="list_apprentis">
                <?php
                if($apprentis != NULL):
                foreach($apprentis as $r):?>
                <tr>
                    <th class="td_apprentis">Nom</th>
                    <th class="td_apprentis">Prenom</th>
                    <th class="td_apprentis">E-mail</th>
                </tr>
                <tr id="<?php echo $r->IDEtudiant;?>" class="defaut" onclick="SelectLigne(this)">
                    <td class="td_apprentis"><?php echo $r->Nom_et;?></td>
                    <td class="td_apprentis"><?php echo $r->prenom_et;?></td>
                    <td class="td_apprentis"><?php echo $r->mail_et;?></td>
                </tr>
                 
                <?php endforeach; endif;?>
            </table>
            <input id="select_suppr" name="select_suppr" type="hidden" value="">
            <input id="del" type="submit" value="supprimer">
        <?php echo form_close();?>
    </div>
     
</section>
</body>
</html>