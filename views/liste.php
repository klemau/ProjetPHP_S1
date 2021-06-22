<?php 
if($content!=null){
    echo '<table class="table table-hover">';

    // Cr�ation du Header
    $object = $content[0];
    echo '<thead><tr>';
    $variables = get_object_vars($object);

    //Get class name without namespace
    $slash = "/";
    $explode = explode("\\",get_class($object));
    $classname = end($explode);

    foreach ($variables as $key=>$value){
        if($key!='id_juge')  echo '<td>'.$key.'</td>';
    }

    echo "<td>Supprimer</td>";
    echo "<td>Modifier</td>";
    echo '</tr></thead><tbody>';

    // Ajout des entit�s
    foreach ($content as $object){
        $variables = get_object_vars($object);
        $id=null;
        echo '<tr>';
        foreach ($variables as $key=>$value){
            if($key=='id_juge') {
                $id=$value;
            }
            else { 
                echo '<td>'.$value.'</td>';
            }
        }
        echo '<td> <a class="nav-link" href="/'.$classname.'/delete/'.$id.'"><span style="color: Tomato;"><i class="fas fa-trash"></i></span></a> </td>';    
        echo '<td> <a class="nav-link" href="/'.$classname.'/update/'.$id.'"><i class="fas fa-edit"></i></a> </td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}
?>
