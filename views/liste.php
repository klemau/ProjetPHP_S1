<?php 
if($content!=null){
    echo '<table>';

    // Création du Header
    $object = $content[0];
    echo '<thead><tr>';
    $variables = get_object_vars($object);

    //Get class name without namespace
    $classname = end(explode('\\',get_class($object)));

    foreach ($variables as $key=>$value){
        if($key!='id')  echo '<td>'.$key.'</td>';
    }
    echo '</tr></thead><tbody>';

    // Ajout des entités
    foreach ($content as $object){
        $variables = get_object_vars($object);
        $id=null;
        echo '<tr>';
        foreach ($variables as $key=>$value){
            if($key=='id') {
                $id=$value;
            }
            else { 
                echo '<td>'.$value.'</td>';
            }
        }
        echo '<td> <a class="nav-link" href="/'.$classname.'/delete/'.$id.'">Supprimer</a> </td>';    
        echo '<td> <a class="nav-link" href="/'.$classname.'/update/'.$id.'">Modifier</a> </td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}
?>
