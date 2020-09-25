<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Etapas de Seguimiento</h2>
        <p class="lead">Etapas</p>
        <hr class="my-4">
        <form>
        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmEtapasSeguimiento" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
    </div>
            <!-- <input type="hidden" class="form-control" id="idEtapaSeguimiento"> -->
            <!-- <div class="form-group">
                <label for="nombreEtapaSeguimiento">Nombre de Etapa</label>
                <input type="text" class="form-control" id="nombreEtapaSeguimiento">
            </div> -->
            <!--
            <div class="form-group">
                <label for="activo">Activo</label>
                <select class="form-control" id="activo">
                    <option value="S">Si</option>
                    <option value="N">No</option>              
                </select>
            </div>
-->
            <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchEtapasSeguimientos()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmEtapasSeguimiento">Agregar</button> -->
                         
            <!-- </div> -->
        </form>
        </div>
    <div class="col-lg-8" id="divDataTableEtapasSeguimiento">

    </div>
</div>

<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmEtapasSeguimiento" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasSeguimiento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Etapas de Seguimiento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmEtapasSeguimientoModal">
                <input type="hidden" value="" id="idEtapaSeguimiento">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreEtapaSeguimiento" class="form-control-label">Nombre de Etapa</label>
                        <input type="text" class="form-control" id="nombreEtapaSeguimiento">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="activo" class="form-control-label">Activo</label>
                        <select class="form-control" id="activo">
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                    </div>                         
                </div>                                                                                                                                      
                                            
            </form>           
        </div>
        <div id="divBtnModal" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveEtapasSeguimiento()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmEtapasSeguimientoEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasSeguimientoEliminar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
       <!-- <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAgenciasModal">  
       
        <p> <i class="fas fa-exclamation-circle"></i>  El registro que has seleccionado se eliminará permanentemente</p>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Eliminar Registro</button>
      </div>
    </div>
  </div>
</div>

<!--  MODAL FORM  -->

<script>

    getEtapasSeguimiento = function(){
        $.ajax({
            method: "POST",
            url: "controller/EtapasSeguimientoController.php",            
            data: { action: "selectTable"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){   
                    //console.log(result.status);                     
                    var html = buildGridEtapasSeguimiento(result.data, result.total);
                    $("#divDataTableEtapasSeguimiento").html(html);
                    $('#tblEtapaSeguimiento').DataTable();                   
                }
            }
        }); 

    }
 //----------------------->

    buildGridEtapasSeguimiento = function (data, total){
        var html = "<table id='tblEtapaSeguimiento' class='table table table-hover'>";                 
        var data = data;
        var count = total;     
        html += '<thead class="thead-light">';           
        html += ' <tr>';           
        html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Activo </th>';                                       
        html += '  <th scope="col"></th>';           
        html += ' </tr>';           
        html += '</thead>';           
        html += '<tbody class="list">';   
 
        for(var i=0; i<count; i++){
            html += '<tr>';     
            html += ' <th scope="row">';     
            html += ' <div class="media-body">';     
            html += '  <span class="name mb-0 text-sm">';                              
            html += data[i].nombreEtapaSeguimiento;
            html += '</span>';  
            html += '</div>';  
            html += ' </td>';     
            html += ' <td>';   
            html += data[i].activo;  
            html += ' </td>';     
            html += ' <td>';     
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoEtapasSeguimiento(' + data[i].idEtapaSeguimiento + ')" data-toggle="modal" data-target="#modalFrmEtapasSeguimiento" ><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmEtapasSeguimientoEliminar"><i class="fas fa-trash"></i></button>'    
        } 

        return html += "</table>";  
    }

// ---------------------------------->

    searchEtapasSeguimientos = function(){
        var nombreEtapaSeguimiento = $("#nombreEtapaSeguimiento1").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/EtapasSeguimientoController.php",            
            data: { 
                action: "selectByName", 
                nombreEtapaSeguimiento: nombreEtapaSeguimiento

            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridEtapasSeguimiento(result.data, result.total);
                    $("#divDataTableEtapasSeguimiento").html(html);
                    $('#tblEtapasSeguimiento').DataTable();                                                   
                }else{
                    $("#divDataTableEtapasSeguimiento").html("Sin Resultados");
                }
            }else{
                $("#divDataTableEtapasSeguimiento").html("Recargar la página");
            }
        });
    }
// ------------------------------>

    saveEtapasSeguimiento = function(){
        var nombreEtapaSeguimiento = $("#nombreEtapaSeguimiento").val(); 

        $.ajax({
                method: "POST",
                url: "controller/EtapasSeguimientoController.php",            
                data: { 
                    action: "insert",                         
                    nombreEtapaSeguimiento: nombreEtapaSeguimiento                                                                              
                },
                dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){           
                if(result.status === "ok"){
                   data = result.data;
                   alert("Registro guardado");
                } 
            }
        });
    }
// --------------------->
loadInfoEtapasSeguimiento = function(idEtapaSeguimiento){
        $.ajax({
                method: "POST",
                url: "controller/EtapasSeguimientoController.php",            
                data: { 
                    action: "selectById",
                    idEtapaSeguimiento: idEtapaSeguimiento                          
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idEtapaSeguimiento").val(data[0].idEtapaSeguimiento);
                   $("#nombreEtapaSeguimiento").val(data[0].nombreEtapaSeguimiento);
                   $("#activo").val(data[0].Activo);
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="saveEtapasSeguimiento()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }

// -------------------------->
updateEtapasSeguimiento = function(){
        var idEtapaSeguimiento = $("#idEtapaSeguimiento").val();
        var  nombreEtapaSeguimiento = $("#nombreEtapaSeguimiento").val();
        var  activo = $("#activo").val();
    
        $.ajax({
                method: "POST",
                url: "controller/EtapasSeguimientoController.php",            
                data: { 
                    action: "update",
                    idEtapaSeguimiento:idEtapaSeguimiento,
                    nombreEtapaSeguimiento : nombreEtapaSeguimiento,
                    activo: "S"                            
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                    alert("Registro modificado");  
                }
            }
        });
    }

   // --------------->
deleteEtapasSeguimiento = function(){
        var idEtapaSeguimiento = $("#idEtapaSeguimiento").val();
        var  nombreEtapaSeguimiento = $("#nombreEtapaSeguimiento").val();
        var  activo = $("#activo").val();
    
       
        $.ajax({
                method: "POST",
                url: "controller/EtapasSeguimientoController.php",            
                data: { 
                    action: "delete",
                    idEtapaSeguimiento:idEtapaSeguimiento,
                    nombreEtapaSeguimiento : nombreEtapaSeguimiento,
                    activo: "N"                            
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                    alert("Registro eliminado");  
                }
            }
        });
    }
     
/// ------------------------->
    $(document).ready(function () {
            getEtapasSeguimiento();
        });

    
</script>