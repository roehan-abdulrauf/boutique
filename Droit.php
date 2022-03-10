<?php

class Droits extends Config
{

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function getDroits()
    {

        $check = $this->bdd->query("SELECT * FROM `droits`");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <option value=" <?php echo $data['id']; ?>"> <?php echo $data['droit']; ?></option>
<?php
        }

    }
}