<?php
//Aqui validar session
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="row">



    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Etapas de Cita</h2>
        <p class="lead">Etapas de las Citas</p>
        <hr class="my-4">
        <form>
                 
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="modal" data-target="#modalFrmEtapasCitas" role="tab" aria-controls="Agregar"> <i class="material-icons">dashboard</i>&nbsp&nbsp Nuevo Registro</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="TAKS 2"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 2</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="TASK 3"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 3</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="TASK 4"><i class="material-icons">dashboard</i>&nbsp&nbsp TASK 4</a>
    </div>

            <!-- <input type="hidden" class="form-control" id="idEtapaCita" > -->
            <!-- <div class="form-group">
                <label for="nombreEtapa">Nombre de Etapa</label>
                <input type="text" class="form-control" id="nombreEtapa" >
            </div> -->
            <!--
            <div class="form-group">
                <label for="descripcionEtapa">Descripción</label>
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
                <!-- <button type="button" value="Buscar" id="btnBuscar" onclick="searchEtapasCitas()" class="btn btn-dark btn-group-lg">Buscar </button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button>  -->
                <!-- <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmEtapasCitas">Agregar Registro Nuevo</button>
                       
            </div> -->

            


        </form>
    </div>

    <div class="col-lg-8" id="divDataTableEtapasCitas">

</div>
</div>



<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmEtapasCitas" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasCitas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Etapas de Citas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmEtapasCitas">
              <input type="hidden" value="" id="idEtapaCita">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombreEtapa" class="form-control-label">Nombre de Etapa</label>
                        <input class="form-control" type="text" value="" id="nombreEtapa">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="descripcionEtapa" class="form-control-label">Descripción</label>
                        <input class="form-control" type="text" value="" id="descripcionEtapa">
                    </div>                         
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="orden" class="form-control-label">Orden</label>
                    <input class="form-control" type="text" value="" id="orden"  maxlength="10" >
                    <!-- oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /><i>(Máximo 10 dígitos)</i> -->
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="Activo" class="form-control-label">Activo</label>
                        <select class="form-control" id="Activo">
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
        <button type="button" class="btn btn-primary"  value="Guardar" id="btnGuardar" onclick="saveEtapasCitas()" data-dismiss="modal">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmEtapasCitasEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmEtapasCitasEliminar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
       <!-- <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frmEtapasCitas">
                <input type="hidden" value="" id="idEtapaCita1">
        <p> <i class="fas fa-exclamation-circle"></i>  El registro que has seleccionado se eliminará permanentemente</p>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" value="Borrar" id="btnBorrar" onclick="deleteEtapasCitas()" class="btn btn-primary" data-dismiss="modal">Eliminar Registro</button>
      </div>
    </div>
  </div>
</div>

<!--  MODAL FORM  -->


<script>
// --------------------->
    getEtapasCitas = function(){
        $.ajax({
            method: "POST",
            url: "controller/EtapasCitasController.php",            
            data: { action: "selectTable"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){   
                   // console.log(result.status);                     
                    var html = buildGridEtapas(result.data, result.total);
                    $("#divDataTableEtapasCitas").html(html);
                    $('#tblEtapasCitas').DataTable();                   
                }
            }
        }); 
    }

    
// ------------------------->
    buildGridEtapas = function (data, total){
        var html = "<table id='tblEtapasCitas' class='table table table-hover'>";                 
        var data = data;
        var count = total;     
        html += '<thead class="thead-light">';           
        html += ' <tr>';           
        html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Descripción </th>';                   
        html += '  <th scope="col" class="sort" data-sort="name">Orden</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Activo</th>';                               
        html += '  <th scope="col"></th>';           
        html += ' </tr>';           
        html += '</thead>';           
        html += '<tbody class="list">';   
 
        for(var i=0; i<count; i++){
            html += '<tr>';     
            html += ' <th scope="row">';     
            html += ' <div class="media-body">';     
            html += ' <span class="name mb-0 text-sm">';                              
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
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoEtapasCitas(' + data[i].idEtapaCita + ')" data-toggle="modal" data-target="#modalFrmEtapasCitas" ><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmEtapasCitasEliminar"><i class="fas fa-trash"></i></button>'    
            
        } 

        return html += "</table>";  
    }


// ---------------------------->
    searchEtapasCitas = function(){
        var nombreEtapa= $("#nombreEtapa").val();
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val(); 
        var activo = $("#activo").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/EtapasCitasController.php",            
            data: { 
                action: "selectByName", 
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
                    
                    var html = buildGridEtapas(result.data, result.total);
                    $("#divDataTableEtapasCitas").html(html);
                    $('#tblEtapasCitas').DataTable();                                                   
                }else{
                    $("#divDataEtapasCitas").html("Sin Resultados");
                }
            }else{
                $("#divDataTableEtapasCitas").html("Recargar la página");
            }
        });
    }

// ---------------------------------->

saveEtapasCitas = function(){
        var nombreEtapa= $("#nombreEtapa").val()
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val(); 
        var activo = $("#activo").val(); 
        $.ajax({
                method: "POST",
                url: "controller/EtapasCitasController.php",            
                data: { 
                    action: "insert",                         
                     nombreEtapa : nombreEtapa,
                     descripcionEtapa: descripcionEtapa,
                     orden: orden,
                     Activo: "S"                                                                                 
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
    
// --------------------------->
updateEtapasCitas = function(){
        var idEtapaCita = $("#idEtapaCita").val();
        var nombreEtapa = $("#nombreEtapa").val();
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val();
      //  var activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/EtapasCitasController.php",            
                data: { 
                    action: "update",
                    idEtapaCita: idEtapaCita,
                    nombreEtapa: nombreEtapa,
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

// ---------------------------->

loadInfoEtapasCitas = function(idEtapaCita){
        $.ajax({
                method: "POST",
                url: "controller/EtapasCitasController.php",            
                data: { 
                    action: "selectById",
                    idEtapaCita: idEtapaCita                          
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                  $("#idEtapaCita").val(data[0].idEtapaCita);
                   $("#nombreEtapa").val(data[0].nombreEtapa);
                   $("#descripcionEtapa").val(data[0].descripcionEtapa);
                   $("#orden").val(data[0].orden);
                   $("#activo").val(data[0].activo);
                 
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" onclick="updateEtapasCitas()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>';                               
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }

// --------------->
deleteEtapasCitas = function(){
    var idEtapaCita = $("#idEtapaCita1").val();
        var  nombreEtapa = $("#nombreEtapa").val();
        var  descripcionEtapa = $("#descripcionEtapa").val();
        var  orden = $("#orden").val();
        var  activo = $("#activo").val();
       
        $.ajax({
                method: "POST",
                url: "controller/EtapasCitasController.php",            
                data: { 
                    action: "delete",
                    idEtapaCita: idEtapaCita,
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


// --------------->
    $(document).ready(function (){
            getEtapasCitas();
        });


</script>