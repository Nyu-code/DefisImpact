<?php

//Vue de la page d'accueil

$this->titre='DEFIS IMPACT';
$this->style='content/css/impact.css';

?>

<form action = "" method="POST">
            <h2>Selectionner un ou des SDG :</h2>

            <script language="JavaScript">
                /*Script et fonction pour selectionner toutes les cases
                source : https://stackoverflow.com/questions/386281/how-to-implement-select-all-check-box-in-html
                remarque -> dans la ligne 14, c'était "foo" de base, juste prendre la valeur de name dans l'input (exemple ligne 37)
                */
                function toggle(source) {
                checkboxes = document.getElementsByName('sdg[]');
                    for(var i=0, n=checkboxes.length;i<n;i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }
            </script>
            <div>
                <input type="checkbox" onClick="toggle(this)">Tout selectionner<br/>
            </div>

    <?php foreach($ODD as $ODD){
    echo "<div>";
    echo '<input type="checkbox" id="'.strtolower($ODD->getName()).'"name = "sdg[]" value="'.$ODD->getID().'"/>'.$ODD->getID().". ".$ODD->getName().'</br>';
    echo "</div>";
    }
    ?>

    <br/>
            <input type="submit" name="select" value="Selectionner">
        


    </form>
</div>

