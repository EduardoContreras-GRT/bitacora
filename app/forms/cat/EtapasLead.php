<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Etapas de Lead</h2>
        <p class="lead">Etapas Lead</p>
        <hr class="my-4">
        <form>
        <div class="list-group " id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmAgencias" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
            </div>
            <!-- <input type="hidden" class="form-control" id="idEtapaLead" > -->
            <!-- <div class="form-group">
                <label for="nombreEtapa">Nombre de Etapa</label>
                <input type="text" class="form-control" id="nombreEtapa">
            </div> -->

            <!--
            <div class="form-group">
                <label for="descripcionEtapa">Descripcion</label>
                <input type="text" class="form-control" id="descripcionEtapa" >
            </div>
            <div class="form-group">
                <label for="orden">Orden</label>
                <input type="text" class="form-control" id="orden" >
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
                <!-- <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchEtapasLead()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmEtapasLead" data-dismiss="modal">Agregar</button> -->
            
        <!-- </div> -->
        </form>
        </div>
        <div class="col-lg-8" id="divDataTableEtapasLead">

        </div>
</div>

<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmEtapasLead" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasLead" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Etapas de Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmEtapasLeadModal">
                <input type="hidden" value="" id="idEtapaLead">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreEtapa" class="form-control-label">Nombre de Etapa</label>
                        <input class="form-control" type="text" value="" id="nombreEtapa" required >
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="descripcionEtapa" class="form-control-label">Descripción</label>
                        <input class="form-control" type="text" value="" id="descripcionEtapa">
                    </div>                         
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for=" orden" class="form-control-label">Orden</label>
                    <input class="form-control" type="text" value="" id="orden" maxlength="10">
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="activo" class="form-control-label">Activo</label>
                        <select class="form-control" id="activo">
                            <option value = "">Selecciona</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                </div>                         
            </div>                                                                                                                                                                                     
            </form>           
        </div>
        <div id="divBtnModal" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveEtapasLead()" data-dismiss="modal">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmEtapasLeadEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasLeadEliminar" aria-hidden="true">
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
        <input type="hidden" value="" id="idEtapaLead1">
        <p> <i class="fas fa-exclamation-circle"></i>  El registro que has seleccionado se eliminará permanentemente</p>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" value="Borrar" id="btnBorrar" onclick="deleteEtapasLead()" data-dismiss="modal">Eliminar Registro</button>
      </div>
    </div>
  </div>
</div>

<!--  MODAL FORM  -->


<script>

    getEtapasLead = function(){
        $.ajax({
            method: "POST",
            url: "controller/EtapasLeadController.php",            
            data: { action: "selectTable"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){   
                    //console.log(result.status);                     
                    var html = buildGridEtapasLead(result.data, result.total);
                    $("#divDataTableEtapasLead").html(html);
                    $('#tblEtapasLead').DataTable();                   
                }
            }
        }); 

    }

// ------------------------------>

    buildGridEtapasLead = function (data, total){
        var html = "<table id='tblEtapasLead' class='table table table-hover'>";                 
        var data = data;
        var count = total;     
        html += '<thead class="thead-light">';           
        html += ' <tr>';           
        html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Descripción </th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Orden </th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Activo</th>';                                          
        html += '  <th scope="col"></th>';           
        html += ' </tr>';           
        html += '</thead>';           
        html += '<tbody class="list">';   
 
        for(var i=0; i<count; i++){
            html += '<tr>';     
            html += ' <th scope="row">';     
            html += ' <div class="media-body">';     
            html += '  <span class="name mb-0 text-sm">';                              
            html += data[i].nombreEtapa;
            html += '</span>';  
            html += '</div>';  
            html += ' </td>';     
            html += ' <td>';   
            html += data[i].descripcionEtapa;
            html += ' </td>';     
            html += ' <td>';   
            html += data[i].orden;                        
            html += ' </td>';     
            html += ' <td>';     
            html += data[i].activo;  
            html += ' </td>';     
            html += ' <td>';     
            html+= '<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoEtapasLead(' + data[i].idEtapaLead + ')" data-toggle="modal" data-target="#modalFrmEtapasLead"><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmEtapasLeadEliminar"><i class="fas fa-trash"></i></button>';    
        } 

        return html += "</table>";  
    }

// --------------------------->

    searchEtapasLead = function(){
        var nombreEtapa = $("#nombreEtapa").val();
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val();  
        var activo = $("#activo").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/EtapasLeadController.php",            
            data: { 
                action: "selectCombo", 
                nombreEtapa: nombreEtapa,
                descripcionEtapa: descripcionEtapa,
                orden: orden,
                activo: activo

            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridEtapasLead(result.data, result.total);
                    $("#divDataTableEtapasLead").html(html);
                    $('#tblEtapasLead').DataTable();                                                   
                }else{
                    $("#divDataTableEtapasLead").html("Sin Resultados");
                }
            }else{
                $("#divDataTableEtapasLead").html("Recargar la página");
            }
        });
    }

// ------------------->

saveEtapasLead = function(){
        var nombreEtapa= $("#nombreEtapa").val()
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val(); 
        var activo = $("#activo").val(); 
        $.ajax({
                method: "POST",
                url: "controller/EtapasLeadController.php",            
                data: { 
                     action: "insert",                         
                     nombreEtapa: nombreEtapa,
                     descripcionEtapa: descripcionEtapa,
                     orden: orden,
                     activo: activo                                                                             
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

 // ------------------->
loadInfoEtapasLead = function(idEtapaLead){
        $.ajax({
                method: "POST",
                url: "controller/EtapasLeadController.php",            
                data: { 
                    action: "selectById",
                    idEtapaLead: idEtapaLead                          
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#idEtapaLead").val(data[0].idEtapaLead);
                   $("#nombreEtapa").val(data[0].nombreEtapa);
                   $("#descripcionEtapa").val(data[0].descripcionEtapa);
                   $("#orden").val(data[0].orden);
                   $("#activo").val(data[0].activo);
                 
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="updateEtapasLead()" class="btn btn-primary">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }

// -------------------------->
updateEtapasLead = function(){
        var idEtapaLead = $("#idEtapaLead").val();
        var  nombreEtapa = $("#nombreEtapa").val();
        var  descripcionEtapa = $("#descripcionEtapa").val();
        var  orden = $("#orden").val();
        var  activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/EtapasLeadController.php",            
                data: { 
                    action: "update",
                    idEtapaLead: idEtapaLead,
                    nombreEtapa : nombreEtapa,
                     descripcionEtapa: descripcionEtapa,
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
deleteEtapasLead = function(){
    var idEtapaLead = $("#idEtapaLead1").val();
        var  nombreEtapa = $("#nombreEtapa").val();
        var  descripcionEtapa = $("#descripcionEtapa").val();
        var  orden = $("#orden").val();
        var  activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/EtapasLeadController.php",            
                data: { 
                    action: "delete",
                    idEtapaLead: idEtapaLead,
                    nombreEtapa : nombreEtapa,
                     descripcionEtapa: descripcionEtapa,
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
   
// --------------------------->
    $(document).ready(function () {
            getEtapasLead();
        });

    
</script>