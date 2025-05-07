<?php
header('Content-Type: application/json');
$data = [];
for ($i = 1; $i <= 10; $i++) {
    $data[] = "Valeur $i";
}
echo json_encode($data);
?>