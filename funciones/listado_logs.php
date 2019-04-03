<?php

function Listar_logs(){
    $Listado=array();
    //me conecto
    $MiConexion=ConexionBD();
    //si todo es correcto...
    if ($MiConexion!=false){
        //le paso la consulta que necesito
        $SQL = "SELECT L.Id as idLogs, L.FechaLog as fechaLog, L.Id_Evento as eventoLog, L.Email as emailLog,
                       E.ID as idEvento, E.Descripcion as descripEvento, E.Tipo as tipoEvento
                FROM logs L, eventos E  
              
                ORDER BY fechaLog DESC";
        //genera el conjunto de registros que devuelve la consulta
        $rs = mysqli_query($MiConexion, $SQL);
        $i=0;  //armo el listado para devolverlo y usarlo en el otro script
        while ($data = mysqli_fetch_array($rs)) {
           // $Listado[$i]['idLogs'] = $data['idLogs'];
            $Listado[$i]['fechaLog'] = $data['fechaLog'];
            $Listado[$i]['eventoLog'] = $data['eventoLog'];
            $Listado[$i]['emailLog'] = $data['emailLog'];
            $Listado[$i]['descripEvento'] = $data['descripEvento'];
            $Listado[$i]['tipoEvento'] = $data['tipoEvento'];
            $i++;
        }
    }
    return $Listado;
}
    


?>