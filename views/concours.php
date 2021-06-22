<?php

    echo "
    <div>
        <h2>".$content['titre']."</h2>
        <div>";
    foreach ($variables as $key=>$value){
        if($key!='id_concours')  echo '<li>'.$key.'</li>';
    }
    echo "
        </div>
    </div>";