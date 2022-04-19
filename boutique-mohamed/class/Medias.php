<?php

class Medias extends Config
{

    public function getMedias(){
        $check = $this->bdd->prepare("SELECT img FROM `produits`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <option value=" <?php echo $data['id']; ?>"> <?php echo $data['titre']; ?></option>
<?php
        }
    }

}