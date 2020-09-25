<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h1 class="display-4">Asesores</h1>
        <p class="lead">Este es el catálogo de asesores</p>
        <hr class="my-4">
        <form>

            <div class="list-group " id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmAsesores" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
            </div>
            <!-- <input type="hidden" class="form-control" id="idAsesor"> -->
            <!-- <div class="form-group">
                <label for="nombre">Nombre del Asesor</label>
                <input type="text" class="form-control" id="nombre">
            </div> -->
            <!--
            <div class="form-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno">
            </div>
            <div class="form-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno">
            </div>
            <div class="form-group">
                <label for="activo">Activo</label>
                <select class="form-control" id="activo">
                    <option value="S">Si</option>
                    <option value="N">No</option>              
                </select>
            </div>

-->
            <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                <!-- <button type="button" value="Buscar" id="btnBuscar" onclick="searchAsesores()" class="btn btn-dark btn-group-lg">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>      -->
                <!-- <button type="button" value="Guardar" id="btnGuardar"  data-toggle="modal" data-target="C" class="btn btn-dark btn-group-lg"  data-dismiss="modal">Agregar</button> -->
                <!-- </div> -->
            </form>
         </div>
    <div class="col-lg-8" id="divDataTableAsesores">
    </div>
</div>

<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmAsesores" tabindex="-1" role="dialog" aria-labelledby="modalFrmAsesores" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asesores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmAsesoresModal">
                <!-- <input type="hidden" value="" id="idAsesor"> -->
                <input type="text" value="" id="idAsesor">
                <!-- <input type="hidden" value="" id="nombreCompleto"> -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombre" class="form-control-label">Nombre de Asesor</label>
                        <input class="form-control" type="text" value="" id="nombre">
                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                    <label for="apellidoMaterno" class="form-control-label">Apellido Materno</label>
                        <input class="form-control" type="text" value="" id="apellidoMaterno">
                    </div>                         
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="apellidoPaterno" class="form-control-label">Apellido Paterno</label>
                    <input class="form-control" type="text" value="" id="apellidoPaterno">
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="activo" class="form-control-label">Estatus</label>
                    <select class="form-control" id="activo">
                           <option value = "">Selecciona</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                </div>                         
            </div>   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="idTipoAsesor" class="form-control-label">Tipo Asesor</label>
                    <div id="divIdAsesores">
                            <select id="idTipoAsesor" class="form-control">
                                <option value = "">Selecciona</option>
                            </select>
                        </div>
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="IdAgencia" class="form-control-label">Agencia</label>
                    <div id="divIdAgencias">
                            <select id="IdAgencia" class="form-control">
                                <option value = "">Selecciona</option>
                            </select>
                        </div>
                </div>                         
            </div>                                                                                                                                      
                                            
            </form>           
        </div>
        <div id="divBtnModal" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveAsesores()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmAsesoresEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmAsesoresEliminar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
       <!-- <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAsesoresModal">  
        <input type="hidden" value="" id="idAsesor1">
        
        <p> <i class="fas fa-exclamation-circle"></i>  El registro que has seleccionado se eliminará permanentemente</p>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary"  value="Borrar" id="btnBorrar" onclick="deleteAsesores()"  data-dismiss="modal">Eliminar Registro</button>
      </div>
    </div>
  </div>
</div>

<!--  MODAL FORM  -->


<script>
// ----------------------->
    getAsesores = function(){
        $.ajax({
            method: "POST",
            url: "controller/AsesorController.php",            
            data: { action: "selectTable"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){                       
                    var html = buildGridAsesores(result.data, result.total);
                    $("#divDataTableAsesores").html(html);
                    $('#tblAsesores').DataTable();                   
                }
            }
        }); 

    }

// ------------------------>
    buildGridAsesores = function (data, total){
        var html = "<table id='tblAsesores' class='table table table-hover'>";                 
        var data = data;
        var count = total;     
        html += '<thead class="thead-light">';           
        html += ' <tr>';           
        html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Apellido Paterno </th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Apellido Materno </th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Estatus</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Tipo Asesor</th>';                               
        html += '  <th scope="col"></th>';           
        html += ' </tr>';           
        html += '</thead>';           
        html += '<tbody class="list">';   
 
        for(var i=0; i<count; i++){
            html += '<tr>';     
            html += '<th scope="row">';     
            html += '<div class="media-body">';     
            html += '<span class="name mb-0 text-sm">';                              
            html += data[i].nombre;
            html += '</span>';  
            html += '</div>';  
            html += '</td>';     
            html += '<td>';   
            html += data[i].apellidoPaterno;
            html += ' </td>';     
            html += ' <td>';   
            html += data[i].apellidoMaterno;                        
            html += ' </td>';     
            html += ' <td>';     
            html += data[i].activo;  
            html += ' </td>';     
            html += ' <td>';     
            html += data[i].tipoAsesor;  
            html += ' </td>';   
            html += '<td>'; 
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal" onclick="loadInfoAsesores(' + data[i].idAsesor + ')" data-toggle="modal" data-target="#modalFrmAsesores" ><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmAsesoresEliminar"><i class="fas fa-trash"></i></button>'    
        } 
        return html += "</table>";  
    }
// ----------------------->
    searchAsesores = function(){
        var nombreCompleto = $("#nombreCompleto").val();
        var nombre = $("#nombre").val();
        var apellidoPaterno = $("#apellidoPaterno").val();  
        var apellidoMaterno = $("#apellidoMaterno").val(); 
        var tipoAsesor = $("#tipoAsesor").val();
          
            $.ajax({
            method: "POST",
            url: "controller/AsesorController.php",            
            data: { 
                action: "selectByName", 
                nombre: nombre

            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridAsesores(result.data, result.total);
                    $("#divDataTableAsesores").html(html);
                    $('#tblAsesores').DataTable();                                                   
                }else{
                    $("#divDataTableAsesores").html("Sin Resultados");
                }
            }else{
                $("#divDataTableAsesores").html("Recargar la página");
            }
        });
    }

// -------------------->
updateAsesores = function(){
        var idAsesor = $("#idAsesor").val();
        var nombre = $("#nombre").val();
        var apellidoMaterno = $("#apellidoMaterno").val();
        var apellidoPaterno = $("#apellidoPaterno").val();
        var Activo = $("#Activo").val();
        var tipoAsesor = $("#idTipoAsesor").val();
        var Agencias_idAgencias = $("#IdAgencia").val();

        $.ajax({
                method: "POST",
                url: "controller/AseoresController.php",            
                data: { 
                    action: "update",
                    idAsesor : idAsesor,                           
                    nombre: nombre, 
                    apellidoMaterno: apellidoMaterno,  
                    apellidoPaterno : apellidoPaterno ,                                                  
                    Activo: "S",
                    tipoAsesor: tipoAsesor,
                    Agencias_idAgencias: Agencias_idAgencias

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
// -------------------->
loadAsesores = function(idDiv, idCampo){
        $.ajax({
            method: "POST",
            url: "controller/TiposAsesoresController.php",            
            data: { action: "selectCombo"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){                     
                    var html = "";
                    html = "<select id='" + idCampo + "' name='" + idCampo + "' class='form-control'>";
                    html += "<option value=''>Seleccione tipo de Asesor</option>";
                    $.each(result.data, function (key, val) {
                        html += "<option value='" + val.idTipoAsesor  + "'>" + val.nombreTipoAsesor  + "</option>";
                    });
                    html += "</select>";
                    $("#"+idDiv).html(html);                         
                }
            }
        });
    };

 //------------>
 loadAgencia = function(idDiv, idCampo){
         $.ajax({
             method: "POST",
             url: "controller/AgenciasController.php",            
             data: { action: "selectCombo"},
            dataType: "json"
         })
         .done(function( result ) {
             if( result != "" ){               
                 if(result.status === "ok"){                     
                     var html = "";
                     html = "<select id='" + idCampo + "' name='" + idCampo + "' class='form-control'>";
                     html += "<option value=''>Seleccione Agencia</option>";
                     $.each(result.data, function (key, val) {
                        html += "<option value='" + val.IdAgencia  + "'>" + val.NombreAgencia + "</option>";
                     });
                    html += "</select>";
                     $("#"+idDiv).html(html);                         
                }
             }
       });
     }


// ---------------->
    saveAsesores = function(){
       // var idAsesor = $("idAsesor").val();
        var nombreCompleto = $("nombreCompleto1").val();
        var nombre = $("#nombre").val();
        var apellidoPaterno = $("#apellidoPaterno").val();
        var apellidoMaterno = $("#apellidoMaterno").val();
        var Activo= $("#Activo").val();
        var idTipoAsesor = $("#idTipoAsesor").val();
        var Agencias_idAgencias = $("#IdAgencia").val();

        $.ajax({
                method: "POST",
                url: "controller/AsesorController.php",            
                data: { 
                    action: "insert",                         
                    nombre: nombre,
                    apellidoPaterno: apellidoPaterno,
                    apellidoMaterno: apellidoMaterno,
                    activo: activo,
                    tipoAsesor: idTipoAsesor,
                    Agencias_idAgencias: IdAgencia                                                                            
                },
                dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){             
                if(result.status === "ok"){
                   data = result.data
                   alert("Registro guardado");
                } 
            }
        });
    }

// ---------------->

loadInfoAsesores = function(idAsesor){
        $.ajax({
                method: "POST",
                url: "controller/AsesorController.php",            
                data: { 
                    action: "selectById",
                   idAsesor: idAsesor                         
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idAsesor").val(data[0].idAsesor);
                   $("#nombre").val(data[0].nombre);
                   $("#apellidoMaterno").val(data[0].apellidoMaterno);
                   $("#apellidoPaterno").val(data[0].apellidoPaterno);
                   $("#Activo").val(data[0].Activo);
                   $("#idTipoAsesor").val(data[0].tipoAsesor);
                   $("#IdAgencia").val(data[0].Agencias_idAgencias);
                   
                    
                   var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="updateAsesores()" class="btn btn-primary">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);

                }
            }
        });
    }
// -------------->


deleteAgencias = function(){
        var idAsesor = $("#idAsesor").val();
        var nombre = $("#nombre").val();
        var apellidoMaterno = $("#apellidoMaterno").val();
        var apellidoPaterno = $("#apellidoPaterno").val();
        var Activo = $("#Activo").val();
        var tipoAsesor = $("#idTipoAsesor").val();
        var Agencias_idAgencias = $("#IdAgencia").val();
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    idAsesor : idAsesor,                                                                             
                    Activo: "N"                           
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

 
//   ------------>
    $(document).ready(function () {
            getAsesores();
            loadAsesores("divIdAsesores", "idAsesor");   
            loadAgencia("divIdAgencias", "IdAgencia");
            
        });

    
</script>