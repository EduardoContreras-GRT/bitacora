<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Plantillas- Guiones</h2>
        <p class="lead">Formas</p>
        <hr class="my-4">
        <form id= "guiones">

        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmGuiones" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
     </div>
            <!-- <input type="hidden" class="form-control" id="idPlantillaGuion" > -->
            <!-- <div class="form-group">
                <label for="nombrePlantillaGuion">Nombre de Plantilla - Guión</label>
                <input type="text" class="form-control" id="nombrePlantillaGuion" >
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
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchGuiones()">Buscar</button>
                <button class="btn btn-primary btn-group-lg"  type="reset" >Limpiar</button>  -->
<!--                 
                <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmGuiones">Agregar Registro</button>        
            </div> -->
        </form>
    </div>
        <div class="col-lg-8" id="divDataTableGuiones">
        </div>
</div>

<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmGuiones" tabindex="-1" role="dialog" aria-labelledby="modalFrmGuiones" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Guiones y Plantillas </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmGuionesModal">
                <input type="hidden" value="" id="idPlantillasGuion">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombrePlantillaGuion" class="form-control-label">Nombre</label>
                        <input class="form-control" type="text" value="" id="nombrePlantillaGuion">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="descripcion" class="form-control-label">Descripción</label>
                        <input class="form-control" type="text" value="" id="descripcion">
                    </div>                         
                </div> 
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="orden" class="form-control-label">orden</label>
                        <input class="form-control" type="text" value="" id="orden">
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
        <button type="button" class="btn btn-primary" onclick="saveGuiones()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmGuionesEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmGuionesEliminar" aria-hidden="true">
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
        <input type="hidden" value="" id="idPlantillasGuion1">
        <p> <i class="fas fa-exclamation-circle"></i>  El registro que has seleccionado se eliminará permanentemente</p>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" alue="Borrar" id="btnBorrar" onclick="deleteGuiones()">Eliminar Registro</button>
      </div>
    </div>
  </div>
</div>

<!--  MODAL FORM  -->

<script>

getGuiones = function(){
    $.ajax({
        method: "POST",
        url: "controller/GuionesController.php",            
        data: { action: "selectTable"},
        dataType: "json"
    })
    .done(function( result ) {
        if( result != "" ){               
            if(result.status === "ok"){                       
                var html = buildGridGuiones(result.data, result.total);
                $("#divDataTableGuiones").html(html);
                $('#tblGuiones').DataTable();                   
            }
        }
    }); 

}

// ----------------->

buildGridGuiones= function (data, total){
    var html = "<table id='tblGuiones' class='table table table-hover'>";                 
    var data = data;
    var count = total;     
    html += '<thead class="thead-light">';           
    html += ' <tr>';           
    html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
    html += '  <th scope="col" class="sort" data-sort="name">Descripción </th>'; 
    html += '  <th scope="col" class="sort" data-sort="name">Activo </th>'; 
    html += '  <th scope="col" class="sort" data-sort="name">Tipo </th>'; 
    html += '  <th scope="col" class="sort" data-sort="name">Orden </th>';                                      
    html += '  <th scope="col"></th>';           
    html += ' </tr>';           
    html += '</thead>';           
    html += '<tbody class="list">';   

    for(var i=0; i<count; i++){
        html += '<tr>';     
        html += '<th scope="row">';     
        html += '<div class="media-body">';     
        html += '<span class="name mb-0 text-sm">';                              
        html += data[i].nombrePlantillaGuion;
        html += '</span>';  
        html += '</div>';  
        html += '</td>';     
        html += '<td>';   
        html += data[i].descripcion;  
        html += '</td>';     
        html += '<td>';     
        html += data[i].activo;  
        html += '</td>';     
        html += '<td>';     
        html += data[i].TipoPlantillaGuion;  
        html += '</td>';     
        html += '<td>';  
        html += data[i].orden;  
        html += '</td>';     
        html += '<td>';        
        html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoGuiones(' + data[i].idPlantillaGuion + ')" data-toggle="modal" data-target="#modalFrmGuiones" ><i class="fas fa-edit"></i></button>';
        html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmGuionesEliminar"><i class="fas fa-trash"></i></button>'    
        html += '</td>';  
    } 
    return html += "</table>";  
}

// ---------------->

searchGuiones = function(){
        var nombrePlantillaGuion = $("#nombrePlantillaGuion").val(); 
            $.ajax({
            method: "POST",
            url: "controller/GuionesController.php",            
            data: { 
                action: "selectByName", 
                nombrePlantillaGuion: nombrePlantillaGuion
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridGuiones(result.data, result.total);
                    $("#divDataTableGuiones").html(html);
                    $('#tblGuiones').DataTable();                                                   
                }else{
                    $("#divDataTableGuiones").html("Sin Resultados");
                }
            }else{
                $("#divDataTableGuiones").html("Recargar la página");
            }
        });
    }

// ----------------->

    saveGuiones = function(){
        var nombrePlantillaGuion = $("#nombrePlantillaGuion").val(); 

        $.ajax({
                method: "POST",
                url: "controller/GuionesController.php",            
                data: { 
                    action: "insert",                         
                    nombrePlantillaGuion: nombrePlantillaGuion                                                                           
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

// -------------------->
loadInfoGuiones = function(idPlantillaGuion){
        $.ajax({
                method: "POST",
                url: "controller/GuionesController.php",            
                data: { 
                    action: "selectById",
                    idPlantillaGuion: idPlantillaGuion                         
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idPlantillaGuion").val(data[0].idPlantillaGuion);
                   $("#nombrePlantillaGuion").val(data[0].nombrePlantillaGuion);
                   $("#descripcion").val(data[0].descripcion);
                   $("#orden").val(data[0].orden);
                   $("#activo").val(data[0].activo);
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="saveGuiones()" class="btn btn-primary">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }
// -------------------------->
updateGuiones = function(){
        var idPlantillaGuion = $("#idPlantillaGuion").val();
        var  nombrePlantillaGuion = $("#nombrePlantillaGuion").val();
        var  descripcion = $("#descripcion").val();
        var  orden = $("#orden").val();
        var  activo = $("#activo").val();
       


        $.ajax({
                method: "POST",
                url: "controller/GuionesController.php",            
                data: { 
                    action: "update",
                    idPlantillaGuion: idPlantillaGuion,
                    nombrePlantillaGuion : nombrePlantillaGuion,
                    descripcion: descripcion,
                     orden: orden,
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
deleteGuiones = function(){
        var idPlantillaGuion = $("#idPlantillaGuion").val();
        var  nombrePlantillaGuion = $("#nombrePlantillaGuion").val();
        var  descripcion= $("#descripcion").val();
        var  orden = $("#orden").val();
        var  activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/GuionesController.php",            
                data: { 
                    action: "delete",
                    idPlantillaGuion: idPlantillaGuion,
                    nombrePlantillaGuion : nombrePlantillaGuion,
                    descripcion: descripcion,
                     orden: orden,
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
// ------------------------->

$(document).ready(function () {
        getGuiones();
    });


</script>