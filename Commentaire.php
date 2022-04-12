<?php

class Commentaire extends  Config
{
    public $_id;
    public $_nom;
    public $_prix;
    public $_img;
    public $_description;
    public $_quantite;
    private $_Malert;
    private $_Talert;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function getCommentaires()
    {

        $check = $this->bdd->prepare("SELECT * FROM `commentaires`,`produits`,`utilisateurs`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <tr>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['nom']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['prenom']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['mail']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['blaze']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['commentaire']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['date']; ?></td>
            </tr>
<?php
        }
    }
}
