<?php include 'conexionPDO.php'; ?>
<?php 
#CONEXIONES ALA BASE DE DATOS
$identificador = $_GET['id'];
$consulta =$base->query("SELECT * FROM alumnos WHERE id='$identificador'")->fetchAll(PDO:: FETCH_OBJ);
 ?>
<?php
    include_once('tbs_class.php'); 
    include_once('plugins/tbs_plugin_opentbs.php'); 



foreach ($consulta as $aa){
    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    //Parametros
    $nombreAlumno = $aa->nombre.','.$aa->apellido;
    $fechaNacimiento = $aa->fecha;
    $firmaDirector = 'firma.png';
    //Cargando template
    $template = 'plantilla_diploma.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('NOM.ALUMNO', $nombreAlumno);
    $TBS->MergeField('NOM.FECHA', $fechaNacimiento);
    $TBS->VarRef['x'] = $firmaDirector;

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.date('Y-m-d-s').$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }

}
?>


