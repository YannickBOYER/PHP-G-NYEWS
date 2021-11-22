<?php
if(isset($TMessage)) {
    foreach ($TMessage as $value) {
        echo $value."<br/>";
    }
}
else{
    echo "pas d'erreur <br/>";
}
