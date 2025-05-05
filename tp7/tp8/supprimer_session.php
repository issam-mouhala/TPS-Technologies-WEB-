<?php
session_start();
echo "les variables de la session '". session_id()."' est detruites !";
session_destroy();
?>