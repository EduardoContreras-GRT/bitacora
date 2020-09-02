<?php
//Aqui validar session
?>

<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Etapas de Seguimiento</h2>
        <p class="lead">Etapas</p>
        <hr class="my-4">
        <form>
            <!-- <input type="hidden" class="form-control" id="idEtapaSeguimiento"> -->
            <div class="form-group">
                <label for="nombreEtapaSeguimiento">Nombre de Etapa</label>
                <input type="text" class="form-control" id="nombreEtapaSeguimiento">
            </div>
            <!--
            <div class="form-group">
                <label for="activo">Activo</label>
                <select class="form-control" id="activo">
                    <option value="S">Si</option>
                    <option value="N">No</option>              
                </select>
            </div>
-->
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchEtapasSeguimientos()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button> 
                <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmEtapasSeguimiento">Agregar</button>
                         
            </div>
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
                        <label for="nombreEtapaSeguimiento1" class="form-control-label">Nombre de Etapa</label>
                        <input type="text" class="form-control" id="nombreEtapaSeguimiento1">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEtapasSeguimientoModal">  
        <p>El registro que has seleccionado se eliminará permanentemente</p>
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
                   $("#nombreEtapaSeguimiento1").val(data[0].nombreEtapaSeguimiento);
                   $("#activo").val(data[0].Activo);
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="saveEtapasSeguimiento()" class="btn btn-primary">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }
// -------------------------->

    eliminar = function(){

    }    
/// ------------------------->
    $(document).ready(function () {
            getEtapasSeguimiento();
        });

    
</script>