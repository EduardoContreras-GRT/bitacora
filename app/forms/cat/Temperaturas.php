<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Temperaturas</h2>
        <p class="lead">tipo</p>
        <hr class="my-4">
        <form>
        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmTemperaturas" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
     </div>
            <!-- <input type="hidden" class="form-control" id="idTemperaturaLead" > -->
            <!-- <div class="form-group">
                <label for="nombreTemperatura">Nombre</label>
                <input type="text" class="form-control" id="nombreTemperatura">
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
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchTemperaturas()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmTemperaturas">Agregar</button> -->
                        
            <!-- </div> -->
        </form>
    </div>
    <div class="col-lg-8" id="divDataTemperaturas">

</div>
</div>
<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmTemperaturas" tabindex="-1" role="dialog" aria-labelledby="modalFrmTemperaturas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Temperaturas Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmTemperaturasModal">
                <input type="hidden" value="" id="idTemperaturaLead">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreTemperatura" class="form-control-label">Temperaturas</label>
                        <input class="form-control" type="text" value="" id="nombreTemperatura">
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
        <button type="button" class="btn btn-primary"onclick="saveTemperaturas()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmTemperaturasEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmTemperaturasEliminar" aria-hidden="true">
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

getTemperaturas = function(){
    $.ajax({
        method: "POST",
        url: "controller/TemperaturaController.php",            
        data: { action: "selectTable"},
        dataType: "json"
    })
    .done(function( result ) {
        if( result != "" ){               
            if(result.status === "ok"){                       
                var html = buildGridTemperaturas(result.data, result.total);
                $("#divDataTemperaturas").html(html);
                $('#tblTemperaturas').DataTable();                   
            }
        }
    }); 

}

// -------------------->

buildGridTemperaturas= function (data, total){
    var html = "<table id='tblTemperaturas' class='table table table-hover'>";                 
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
        html += data[i].nombreTemperatura;
        html += '</span>';  
        html += '</div>';  
        html += '</td>';     
        html += '<td>';   
        html += data[i].activo;  
        html += '</td>';     
        html += '<td>';     
        html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoTemperatura(' + data[i].idTemperaturaLead + ')" data-toggle="modal" data-target="#modalFrmTemperaturas" ><i class="fas fa-edit"></i></button>';
        html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmTemperaturasEliminar"><i class="fas fa-trash"></i></button>'    
        html += '</td>';    
    } 
    return html += "</table>";  
}

// ---------------->

searchTemperaturas = function(){
        var nombreTemperatura = $("#nombreTemperatura").val(); 
            $.ajax({
            method: "POST",
            url: "controller/TemperaturaController.php",            
            data: { 
                action: "selectByName", 
                nombreTemperatura: nombreTemperatura
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridTemperaturas(result.data, result.total);
                    $("#divDataTemperaturas").html(html);
                    $('#tblTemperaturas').DataTable();                                                   
                }else{
                    $("#divDataTemperaturas").html("Sin Resultados");
                }
            }else{
                $("#divDataTemperaturas").html("Recargar la página");
            }
        });
    }

// --------------------->

    saveTemperaturas = function(){
        var nombreTemperatura = $("#nombreTemperatura").val(); 
        $.ajax({
                method: "POST",
                url: "controller/TemperaturaController.php",            
                data: { 
                    action: "insert",                         
                    nombreTemperatura: nombreTemperatura                                                                            
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
loadInfoTemperatura = function(idTemperaturaLead){
        $.ajax({
                method: "POST",
                url: "controller/TemperaturaController.php",            
                data: { 
                    action: "selectById",
                    idTemperaturaLead: idTemperaturaLead                      
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idTemperaturaLead").val(data[0].idTemperaturaLead);
                   $("#nombreTemperatura").val(data[0].nombreTemperatura);
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
        var idTemperaturaLead = $("#idTemperaturaLead").val();
        var  nombreTemperatura = $("##nombreTemperatura").val();
        var  activo = $("#activo").val();
       


        $.ajax({
                method: "POST",
                url: "controller/TemperaturaController.php",            
                data: { 
                    action: "update",
                    idTemperaturaLead: idTemperaturaLead,
                    nombreTemperatura : nombreTemperatura,
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
        var idTemperaturaLead = $("#idTemperaturaLead1").val();
        var nombreTemperatura = $("#nombreTemperatura").val();
        var activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/TemperaturaController.php",            
                data: { 
                    action: "delete",
                    idTemperaturaLead: idTemperaturaLead,
                    nombreTemperatura : nombreTemperatura,
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
        getTemperaturas();
    });


</script>