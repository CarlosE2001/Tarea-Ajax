<?php
$request = json_decode(file_get_contents('php://input'));
switch($request->id) {
    case 1:
        $cantones = array(
            array('id' => 1,'nombre' => 'Central'),
            array('id' => 2,'nombre' => 'Goicochea')
        );
        break;
    case 2:
        $cantones = array(
            array('id' => 3,'nombre' => 'Poas'),
            array('id' => 4,'nombre' => 'Alajuela')
        );
        break;
    default:
        $cantones = array();
        break;
}
echo json_encode($cantones);
?>