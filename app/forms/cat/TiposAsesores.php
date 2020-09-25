<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">TiposAsesores</h2>
        <p class="lead">tipo</p>
        <hr class="my-4">
        <form>
        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmTiposAsesores" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
     </div>
            <!-- <input type="hidden" class="form-control" id="idTipoAsesor " > -->
            <!-- <div class="form-group">
                <label for="nombreTipoAsesor">Nombre</label>
                <input type="text" class="form-control" id="nombreTipoAsesor">
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
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchTiposAsesores()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmTiposAsesores">Agregar</button> -->
                        
            <!-- </div> -->
        </form>
    </div>
    <div class="col-lg-8" id="divDataTiposAsesores">

</div>
</div>
<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmTiposAsesores" tabindex="-1" role="dialog" aria-labelledby="modalFrmTiposAsesores" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TiposAsesores Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmTiposAsesoresModal">
                <input type="hidden" value="" id="idTipoAsesor ">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreTipoAsesor" class="form-control-label">TiposAsesores</label>
                        <input class="form-control" type="text" value="" id="nombreTipoAsesor">
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
        <button type="button" class="btn btn-primary"onclick="saveTiposAsesores()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmTiposAsesoresEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmTiposAsesoresEliminar" aria-hidden="true">
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

getTiposAsesores = function(){
    $.ajax({
        method: "POST",
        url: "controller/TiposAsesoresController.php",            
        data: { action: "selectTable"},
        dataType: "json"
    })
    .done(function( result ) {
        if( result != "" ){               
            if(result.status === "ok"){                       
                var html = buildGridTiposAsesores(result.data, result.total);
                $("#divDataTiposAsesores").html(html);
                $('#tblTiposAsesores').DataTable();                   
            }
        }
    }); 

}

// -------------------->

buildGridTiposAsesores= function (data, total){
    var html = "<table id='tblTiposAsesores' class='table table table-hover'>";                 
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
        html += data[i].nombreTipoAsesor;
        html += '</span>';  
        html += '</div>';  
        html += '</td>';     
        html += '<td>';   
        html += data[i].activo;  
        html += '</td>';     
        html += '<td>';     
        html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoTemperatura(' + data[i].idTipoAsesor  + ')" data-toggle="modal" data-target="#modalFrmTiposAsesores" ><i class="fas fa-edit"></i></button>';
        html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmTiposAsesoresEliminar"><i class="fas fa-trash"></i></button>'    
        html += '</td>';    
    } 
    return html += "</table>";  
}

// ---------------->

searchTiposAsesores = function(){
        var nombreTipoAsesor = $("#nombreTipoAsesor").val(); 
            $.ajax({
            method: "POST",
            url: "controller/TiposAsesoresController.php",            
            data: { 
                action: "selectByName", 
                nombreTipoAsesor: nombreTipoAsesor
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridTiposAsesores(result.data, result.total);
                    $("#divDataTiposAsesores").html(html);
                    $('#tblTiposAsesores').DataTable();                                                   
                }else{
                    $("#divDataTiposAsesores").html("Sin Resultados");
                }
            }else{
                $("#divDataTiposAsesores").html("Recargar la página");
            }
        });
    }

// --------------------->

    saveTiposAsesores = function(){
        var nombreTipoAsesor = $("#nombreTipoAsesor").val(); 
        $.ajax({
                method: "POST",
                url: "controller/TiposAsesoresController.php",            
                data: { 
                    action: "insert",                         
                    nombreTipoAsesor: nombreTipoAsesor                                                                            
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
loadInfoTemperatura = function(idTipoAsesor ){
        $.ajax({
                method: "POST",
                url: "controller/TiposAsesoresController.php",            
                data: { 
                    action: "selectById",
                    idTipoAsesor : idTipoAsesor                       
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idTipoAsesor ").val(data[0].idTipoAsesor );
                   $("#nombreTipoAsesor").val(data[0].nombreTipoAsesor);
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
        var idTipoAsesor  = $("#idTipoAsesor ").val();
        var  nombreTipoAsesor = $("##nombreTipoAsesor").val();
        var  activo = $("#activo").val();
       


        $.ajax({
                method: "POST",
                url: "controller/TiposAsesoresController.php",            
                data: { 
                    action: "update",
                    idTipoAsesor : idTipoAsesor ,
                    nombreTipoAsesor : nombreTipoAsesor,
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
        var idTipoAsesor  = $("#idTipoAsesor 1").val();
        var nombreTipoAsesor = $("#nombreTipoAsesor").val();
        var activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/TiposAsesoresController.php",            
                data: { 
                    action: "delete",
                    idTipoAsesor : idTipoAsesor ,
                    nombreTipoAsesor : nombreTipoAsesor,
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
        getTiposAsesores();
    });


</script>