
   
<?php
$request = json_decode(file_get_contents('php://input'));
switch($request->id) {
case 1:
$distritos = array(
array('id' => 1, 'nombre' => 'La Uruca'),
array('id' => 2, 'nombre' => 'Mata Redonda')
);
break;
case 2:
$distritos = array(
array('id' => 1, 'nombre' => 'San Pedro'),
array('id' => 2, 'nombre' => 'Calle Blancos')
);
break;
case 3:
$distritos = array(
array('id' => 1, 'nombre' => 'San Pedro de Poas'),
array('id' => 2, 'nombre' => 'San Rafael de Poas')
);
break;
case 4:
$distritos = array(
array('id' => 1, 'nombre' => 'Guacima'),
array('id' => 2, 'nombre' => 'La Garita')
);
break;
default:
$distritos = array();
break;
}
echo json_encode($distritos);
?>