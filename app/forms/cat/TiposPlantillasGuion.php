<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Tipos Plantillas</h2>
        <p class="lead">tipo</p>
        <hr class="my-4">
        <form>
        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmTiposPlantillasGuion" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
     </div>
            <!-- <input type="hidden" class="form-control" id="idTipoPlantillaGuion " > -->
            <!-- <div class="form-group">
                <label for="nombreTiposPlantillaGuion">Nombre</label>
                <input type="text" class="form-control" id="nombreTiposPlantillaGuion">
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
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchTiposPlantillasGuion()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmTiposPlantillasGuion">Agregar</button> -->
                        
            <!-- </div> -->
        </form>
    </div>
    <div class="col-lg-8" id="divDataTiposPlantillasGuion">

</div>
</div>
<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmTiposPlantillasGuion" tabindex="-1" role="dialog" aria-labelledby="modalFrmTiposPlantillasGuion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TiposPlantillasGuion Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmTiposPlantillasGuionModal">
                <input type="hidden" value="" id="idTipoPlantillaGuion ">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreTiposPlantillaGuion" class="form-control-label">TiposPlantillasGuion</label>
                        <input class="form-control" type="text" value="" id="nombreTiposPlantillaGuion">
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
        <button type="button" class="btn btn-primary"onclick="saveTiposPlantillasGuion()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmTiposPlantillasGuionEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmTiposPlantillasGuionEliminar" aria-hidden="true">
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

getTiposPlantillasGuion = function(){
    $.ajax({
        method: "POST",
        url: "controller/TipoPlantillasGuionesController.php",            
        data: { action: "selectTable"},
        dataType: "json"
    })
    .done(function( result ) {
        if( result != "" ){               
            if(result.status === "ok"){                       
                var html = buildGridTiposPlantillasGuion(result.data, result.total);
                $("#divDataTiposPlantillasGuion").html(html);
                $('#tblTiposPlantillasGuion').DataTable();                   
            }
        }
    }); 

}

// -------------------->

buildGridTiposPlantillasGuion= function (data, total){
    var html = "<table id='tblTiposPlantillasGuion' class='table table table-hover'>";                 
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
        html += '<th scope="row">';     
        html += '<div class="media-body">';     
        html += '<span class="name mb-0 text-sm">';                              
        html += data[i].nombreTiposPlantillaGuion;
        html += '</span>';  
        html += '</div>';  
        html += '</td>';     
        html += '<td>';   
        html += data[i].activo;  
        html += '</td>';     
        html += '<td>';     
        html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoTemperatura(' + data[i].idTipoPlantillaGuion  + ')" data-toggle="modal" data-target="#modalFrmTiposPlantillasGuion" ><i class="fas fa-edit"></i></button>';
        html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmTiposPlantillasGuionEliminar"><i class="fas fa-trash"></i></button>'    
        html += '</td>';    
    } 
    return html += "</table>";  
}

// ---------------->

searchTiposPlantillasGuion = function(){
        var nombreTiposPlantillaGuion = $("#nombreTiposPlantillaGuion").val(); 
            $.ajax({
            method: "POST",
            url: "controller/TipoPlantillasGuionesController.php",            
            data: { 
                action: "selectByName", 
                nombreTiposPlantillaGuion: nombreTiposPlantillaGuion
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridTiposPlantillasGuion(result.data, result.total);
                    $("#divDataTiposPlantillasGuion").html(html);
                    $('#tblTiposPlantillasGuion').DataTable();                                                   
                }else{
                    $("#divDataTiposPlantillasGuion").html("Sin Resultados");
                }
            }else{
                $("#divDataTiposPlantillasGuion").html("Recargar la página");
            }
        });
    }

// --------------------->

    saveTiposPlantillasGuion = function(){
        var nombreTiposPlantillaGuion = $("#nombreTiposPlantillaGuion").val(); 
        $.ajax({
                method: "POST",
                url: "controller/TipoPlantillasGuionesController.php",            
                data: { 
                    action: "insert",                         
                    nombreTiposPlantillaGuion: nombreTiposPlantillaGuion                                                                            
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

// -------------------------------->
loadInfoTemperatura = function(idTipoPlantillaGuion ){
        $.ajax({
                method: "POST",
                url: "controller/TipoPlantillasGuionesController.php",            
                data: { 
                    action: "selectById",
                    idTipoPlantillaGuion : idTipoPlantillaGuion                       
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idTipoPlantillaGuion ").val(data[0].idTipoPlantillaGuion );
                   $("#nombreTiposPlantillaGuion").val(data[0].nombreTiposPlantillaGuion);
                   $("#activo").val(data[0].activo);
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="updateTemperatura()" class="btn btn-primary">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }
// -------------------------->
updateTemperatura = function(){
        var idTipoPlantillaGuion  = $("#idTipoPlantillaGuion ").val();
        var  nombreTiposPlantillaGuion = $("##nombreTiposPlantillaGuion").val();
        var  activo = $("#activo").val();
       


        $.ajax({
                method: "POST",
                url: "controller/TipoPlantillasGuionesController.php",            
                data: { 
                    action: "update",
                    idTipoPlantillaGuion : idTipoPlantillaGuion ,
                    nombreTiposPlantillaGuion : nombreTiposPlantillaGuion,
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
deleteTemperatura = function(){
        var idTipoPlantillaGuion  = $("#idTipoPlantillaGuion 1").val();
        var nombreTiposPlantillaGuion = $("#nombreTiposPlantillaGuion").val();
        var activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/TipoPlantillasGuionesController.php",            
                data: { 
                    action: "delete",
                    idTipoPlantillaGuion : idTipoPlantillaGuion ,
                    nombreTiposPlantillaGuion : nombreTiposPlantillaGuion,
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

// --------------------------------->

$(document).ready(function () {
        getTiposPlantillasGuion();
    });


</script>