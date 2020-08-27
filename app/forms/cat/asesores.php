<?php
//Aqui validar session
?>

<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h1 class="display-4">Asesores</h1>
        <p class="lead">Este es el catálogo de asesores</p>
        <hr class="my-4">
        <form>
            <input type="hidden" class="form-control" id="idAsesor">
            <div class="form-group">
                <label for="nombre">Nombre del Asesor</label>
                <input type="text" class="form-control" id="nombre">
            </div>
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
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" value="Buscar" id="btnBuscar" onclick="searchAsesores()" class="btn btn-dark btn-group-lg">Buscar</button>
                <button type="button" class="btn btn-primary btn-group-lg">Limpiar</button>     
                <button type="button" value="Guardar" id="btnGuardar"  data-toggle="modal" data-target="#modalFrmAsesores" class="btn btn-dark btn-group-lg">Agregar</button>
                   
            </div>
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
                <input type="hidden" value="" id="IdAgencia">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombre1" class="form-control-label">Nombre de Asesor</label>
                        <input class="form-control" type="text" value="" id="nombre1">
                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                    <label for="apellidoMaterno1" class="form-control-label">Apellido Materno</label>
                        <input class="form-control" type="text" value="" id="apellidoMaterno1">
                    </div>                         
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="apellidoPaterno1" class="form-control-label">apellido Paterno</label>
                    <input class="form-control" type="text" value="" id="apellidoPaterno1">
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="activo" class="form-control-label">Estatus</label>
                    <select class="form-control" id="activo">
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                </div>                         
            </div>   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="tipoAsesor1" class="form-control-label">Tipo Asesor</label>
                    <select class="form-control" id="tipoAsesor1">
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="Agencias_idAgencia1" class="form-control-label">Agencia</label>
                    <select class="form-control" id="Agencias_idAgencia1">
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAsesoresModal">  
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
                    //console.log(result.status);                     
                    var html = buildGridAsesores(result.data, result.total);
                    $("#divDataTableAsesores").html(html);
                    $('#tblAsesores').DataTable();                   
                }
            }
        }); 

    }


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
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal" data-target="#modalFrmAsesores" ><i class="fas fa-edit"></i></button>'
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmAsesoresEliminar"><i class="fas fa-trash"></i></button>'    
            
        } 
        return html += "</table>";  
    }

    searchAsesores = function(){
        var nombreCompleto = $("#nombreCompleto").val();
        var nombre = $("#nombre1").val();
        var apellidoPaterno = $("#apellidoPaterno").val();  
        var apellidoMaterno = $("#apellidoMaterno").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/AsesorController.php",            
            data: { 
                action: "selectByName", 
                nombre: nombre
              //  apellidoPaterno: apellidoPaterno,
               // apellidoMaterno: apellidoMaterno

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


    saveAsesores = function(){
       // var idAsesor = $("idAsesor").val();
        var nombreCompleto = $("nombreCompleto1").val();
        var nombre = $("#nombre1").val();
        var apellidoPaterno = $("#apellidoPaterno1").val();
        var apellidoMaterno = $("#apellidoMaterno1").val();
        var Activo= $("#Activo1").val();
        var tipoAsesor = $("#tipoAsesor1").val();
        var Agencias_idAgencias = $("#Agencias_idAgencias1").val();

        $.ajax({
                method: "POST",
                url: "controller/AsesorController.php",            
                data: { 
                    action: "insert",                         
                    nombre: nombre,
                    apellidoPaterno: apellidoPaterno,
                    apellidoMaterno: apellidoMaterno,
                    activo: activo,
                    tipoAsesor: tipoAsesor,
                    Agencias_idAgencias: Agencias_idAgencias                                                                              
                },
                dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){   
              //  alert("primer if");            
                if(result.status === "ok"){
                //   alert("sgundo if");
                 // console.log(result.status);  
                   // data = result.data;
                   data = result.data
                   alert("Registro guardado");
                  // $("#IdAgencia").val(data[0].IdAgencia);  
                } 
            }
        });
    }


    eliminar = function(){

    }   

    $(document).ready(function () {
               // alert("hola");
            getAsesores();
        });

    
</script>