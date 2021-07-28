<?php
$ftp_server = "200.29.133.222";
$ftp_username = "ma.caep";
$ftp_password = "ma.2021";
$ftp_conexion = ftp_connect($ftp_server);
$ftp_lr = ftp_login($ftp_conexion, $ftp_username, $ftp_password);

$db_host     = '127.0.0.1';
$db_username = 'root';
$db_password = '';
$db_name     = 'caep';

//Create connection and select DB
$db = new mysqli($db_host, $db_username, $db_password, $db_name);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

//if((!$ftp_conexion) or (!$ftp_lr)){
//    echo "no conectado";
//}else{
    echo "conectado";
    $consulta_imponentes = $db->query('select imponentes.rut, users.name, users.email, identificaciones.direccion, regiones.name, comunas.name, sexos.name, estados_civiles.name, identificaciones.fecha_nacimiento, identificaciones.separacion, identificaciones.celular, trabajos.reparticion, trabajos.cargo, trabajos.antiguedad, trabajos.direccion, regiones.name, comunas.name, bancarios.banco, bancarios.numero_cuenta from users, imponentes, identificaciones, regiones, comunas, sexos, estados_civiles, trabajos, bancarios where users.id = imponentes.user_id and identificaciones.identificacionable_id = imponentes.rut and identificaciones.identificacionable_id = trabajos.trabajoable_id and identificaciones.identificacionable_id = bancarios.bancarioable_id and identificaciones.region_id = regiones.id and identificaciones.comuna_id = comunas.id and trabajos.region_id = regiones.id and trabajos.comuna_id = comunas.id and identificaciones.sexo_id = sexos.id and identificaciones.estado_civil_id = estados_civiles.id');
    if($consulta_imponentes->num_rows > 0){
        $delimiter = ";";
        $filename = "Export-imponentes_"."csv";
        $destino = "ftp://ma.caep:ma.2021@ftp.caep.cl/Proveedores/ma/GeneradosSGS/";
        //ftp://usuario:contraseña@ftp.example.com/ruta/al/fichero
        $f = fopen($destino, 'w');
        ftp_pasv($ftp_conexion, true);
        //COLUMNAS
        $fields = array('RUT', 'NOMBRE IMPONENTE', 'CORREO', 'DIRECCION_PERSONAL', 'REGION', 'COMUNA', 'ESTADO_CIVIL', 'FECHA_NACIMIENTO', 'SEPARACION_BIENES', 'CELULAR', 'REPARTICION', 'CARGO', 'ANTIGUEDAD', 'DIRECCION_TRABAJO', 'REGION', 'COMUNA', 'BANCO', 'NUMERO_CUENTA');
        fputcsv($f, $fields, $delimiter);
        //FILAS
        while($row = $query->fetch_assoc()){
            $separacion = ($row['separacion'] == '0')?'Con separación':'Sin separación';
            $lineData = array($row['rut'], $row['name'], $row['email'], $row['direccion'], $row['name'], $row['name'], $row['name'], $row['fecha_nacimiento'], $separacion, $row['celular'], $row['reparticion'], $row['cargo'], $row['antiguedad'], $row['direccion'], $row['name'], $row['name'], $row['banco'], $row['numero_cuenta']);
            fputcsv($f, $fields, $delimiter);
        }
    }    
//}
//include database configuration file
//include 'dbConfig.php';

//get records from database
//$query = $db->query("SELECT * FROM members ORDER BY id DESC");

//if($query->num_rows > 0){
    //$delimiter = ",";
    //$filename = "members_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    //$f = fopen('ftp://ftp.caep.cl/Proveedores/ma/GeneradosSGS', 'w');
    
    //set column headers
    //$fields = array('ID', 'Name', 'Email', 'Phone', 'Created', 'Status');
    //fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    //while($row = $query->fetch_assoc()){
     //   $status = ($row['status'] == '1')?'Active':'Inactive';
      //  $lineData = array($row['id'], $row['name'], $row['email'], $row['phone'], $row['created'], $status);
       // fputcsv($f, $lineData, $delimiter);
    //}
    
    //move back to beginning of file
    //fseek($f, 0);
    
    //set headers to download file rather than displayed
    //header('Content-Type: text/csv');
    //header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    //fpassthru($f);
//}
exit;

?>