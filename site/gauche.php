<div id="gauche">
    <div id="sdg">
        <!-- Début du formulaire -->
        <form action = "">
            <p>Selectionner un ou des SDG :</p>

            <script language="JavaScript">
                /*Script et fonction pour selectionner toutes les cases
                source : https://stackoverflow.com/questions/386281/how-to-implement-select-all-check-box-in-html
                remarque -> dans la ligne 14, c'était "foo" de base, juste prendre la valeur de name dans l'input (exemple ligne 37)
                */
                function toggle(source) {
                checkboxes = document.getElementsByName('sdg');
                    for(var i=0, n=checkboxes.length;i<n;i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }
            </script>
            <div>
                <input type="checkbox" onClick="toggle(this)"> Tout selectionner <br/>
            </div>

<!-- Début du PHP pour afficher toutes les SDG -->
<?php
$file = "src/sdg.txt";
$document = file_get_contents($file);

if ($document != null){
    $lignes = explode("\n",$document);

    $i = 1;
    
    //Pour chaque ODD
    foreach ($lignes as $c){
        echo "<div>";
        echo '<input type="checkbox" id="'.strtolower($c).'" name="sdg" value="'.$i.'"/>'."$i. $c".'<br/>';
        echo "</div>";
        $i++;
    }
}
?>
<!-- Fin du PHP -->

            <!-- Fin du formulaire -->
            <br/>
            <input type="submit" value="Selectionner">
        </form>
    </div>
</div>