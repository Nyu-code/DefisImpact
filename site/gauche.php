<?php
    $file = "src/sdg.txt";
    try {
        $document = file_get_contents($file);
        //chaque ligne est une sdg
        $lignes = explode("\n",$document);
    } catch (Exception $e){
        echo "<h2>Fichier non existant</h2>";
    }

?>

<div id="sdg">

<?php
    
//Si on a choisi des sdg
if (isset($_POST["sdg"])){
    $selection = $_POST["sdg"];
    echo "<h2>Votre selection :</h2>";
    
    //Dans la boucle $v est "l'indice"
    foreach($selection as $v){
        echo "<p>".($v).". ".$lignes[$v-1]."</p>";
    }
    echo "</div>";

} else {
//Sinon affichage de base
?>

        <!-- Début du formulaire -->
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

    <!-- Début du PHP pour afficher toutes les SDG -->
    <?php
    

    $i = 1;
        
    //Pour chaque ODD
    foreach ($lignes as $c){
        echo "<div>";
        echo '<input type="checkbox" id="'.strtolower($c).'" name="sdg[]" value="'.$i.'"/>'."$i. $c".'<br/>';
        echo "</div>";
         $i++;
     }
    ?>
    <!-- Fin du PHP -->

                <!-- Fin du formulaire -->
                <br/>
                <input type="submit" name="select" value="Selectionner">
            </form>
        </div>

    
<?php
    }
?>