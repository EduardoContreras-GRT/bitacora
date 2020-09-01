<?php
//Aqui validar session
?>

<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h1 class="display-4">Agencias</h1>
        <p class="lead">Este es el catálogo de agencias</p>
        <hr class="my-4">
        <form id="frmAgencias">
           <!-- <input type="hidden" class="form-control" id="IdAgencia"> -->
            <div class="form-group">
                <label for="Nombre">Nombre de Agencia</label>
                <input type="text" class="form-control" id="Nombre" required>
            </div>
            <!--
            <div class="form-group">
                <label for="Activo">Activo</label>
                <select class="form-control" id="Activo">
                    <option value="S">Si</option>
                    <option value="N">No</option>              
                </select>
            </div>
            -->
            <div class="btn-group" role="group" aria-label="Basic example">  
                <button type="button" class="btn btn-dark btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchAgencia()">Buscar</button>
                <button type="reset" class="btn btn-primary btn-group-lg">Limpiar</button> 
                 <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmAgencias">Agregar</button>      
              <!--  <button type="button" class="btn btn-dark btn-group-lg"  value="Guardar" id="btnGuardar" onclick="saveAgencias()">Guardar</button> -->
            </div>
        </form>
    </div>
    <div class="col-lg-8" id="divDataTableAgencias">

    </div>
</div>


<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmAgencias" tabindex="-1" role="dialog" aria-labelledby="modalFrmAgencias" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agencias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmAgenciasModal">
                <input type="hidden" value="" id="IdAgencia">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <label for="Nombre1">Nombre de Agencia</label>
                        <input type="text" class="form-control" id="Nombre1" >    
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
        <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveAgencias()">Guardar Cambios</button>
        
        </div>
      </div>
    </div>
  </div>

<!--  MODAL FORM  -->

<!--  MODAL FORM  ELIMINAR -->
<div class="modal fade" id="modalFrmAgenciasEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmAgenciasEliminar" aria-hidden="true">
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
//   GET ------------>

//var tabla = $('#tblAgencias').DataTable();
    getAgencias = function(){
        $.ajax({
            method: "POST",
            url: "controller/AgenciasController.php",            
            data: { action: "selectTable"},
            dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){   
                   // console.log(result.status);                     
                    var html = buildGridAgencias(result.data, result.total);
                    $("#divDataTableAgencias").html(html);
                    $('#tblAgencias');                   
                }
            }
        });
    }

//    GRID ------------>
    buildGridAgencias = function (data, total){
        var html = "<table id='tblAgencias' class='table table table-hover'>";                 
        var data = data;
        var count = total;     
        html += '<thead class="thead-light">';                                                 
        html += '<tr>';
       // html += '  <th scope="col" <'button value= "Eliminar" title="Eliminar" class="btn btn-secondary" ><i class="fas fa-sync-alt"></i> </i></button>'</th>'; 
        html += '  <th scope="col" class="sort" data-sort="name">Nombre</th>';           
        html += '  <th scope="col" class="sort" data-sort="name">Activo </th>';                                        
        html += '  <th scope="col"></th>';           
        html += '</tr>';           
        html += '</thead>';           
        html += '<tbody class="list">';   
 
        for(var i=0; i<count; i++){
            html += '<tr>';     
            html += '<th scope="row">'; 
            html += '<div class="media-body">';     
            html += '<span class="name mb-0 text-sm">';      
            html += data[i].Nombre;
            html += '</span>';  
            html += '</div>';  
            html += '</td>';     
            html += '<td>';   
            html += data[i].Activo;
            html += '</td>'; 
            html += '<td>'; 
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal" onclick="loadInfoAgencias1(' + data[i].IdAgencia + ')" data-toggle="modal" data-target="#modalFrmAgencias" ><i class="fas fa-edit"></i></button>';
           // "loadInfoAgencias1(' + data[i].idAgencia + ')" data-toggle="modal" data-target="##modalFrmAgencias"
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoAgencias(' + data[i].IdAgencia + ')" data-toggle="modal" data-target="#modalFrmAgencias" ><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger " data-toggle="modal" data-target="#modalFrmAgenciasEliminar"><i class="fas fa-trash"></i></button>'    
            html += '</div>';
            html += '</div>';
            html += '</td>';
        } 

    return html += "</table>";  
    }
//  Search  ------------>
    searchAgencia = function(){
        var Nombre = $("#Nombre").val(); 
            $.ajax({
            method: "POST",
            url: "controller/AgenciasController.php",            
            data: { 
                action: "selectByName", 
                Nombre: Nombre
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    var html = buildGridAgencias(result.data, result.total);
                    $("#divDataTableAgencias").html(html);
                    $('#tblAgencias').DataTable();                                                   
                }else{
                    $("#divDataTableAgencias").html("Sin Resultados");
                }
            }else{
                $("#divDataTableAgencias").html("Recargar la página");
            }
        });
    }

// Guarda   ------------>
    saveAgencias = function(){
        var IdAgencia = $("#IdAgencia").val();
        var Nombre = $("#Nombre1").val();
        var Activo = $("#Activo").val();
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    action: "insert",                         
                    Nombre: Nombre                                                                                
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
                } 
            }
        });
    }
    
    
//------------->
loadInfoAgencias = function(idAgencia){
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    action: "selectById",
                    idAgencia: idAgencia                          
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                  // $("#IdAgencia").val(data[0].IdAgencia);
                   $("#Nombre1").val(data[0].Nombre);
                   $("#Activo").val(data[0].Activo);
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '';     
                       
      //  <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveAgencias()">Guardar Cambios</button>
                    if($("#idAgencia").val() != ""){
                        btnGuardar = '<button type="button" onclick="saveAgencias()" class="btn btn-primary">Guardar</button>';  
                    } else {
                        alert("intenta nuevamente");  
                    }
                    var html = "";
                    html += btnCerrar + btnGuardar;                   
                    $("#divBtnModal").html(html);
                }
            }
        });
    }
  //   ------------>
  loadInfoAgencias1 = function(idAgencia){
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    action: "selectById",
                   IdAgencia: IdAgencia                         
                },
                dataType: "json"
        })
        .done(function( result ) {
            if( result != "" ){               
                if(result.status === "ok"){
                    data = result.data;
                   $("#nombre1").val(data[0].Nombre);
                   $("#Activo1").val(data[0].Activo);
                   
                    
                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    var btnGuardar = '<button type="button" class="btn btn-primary">Guardar</button>';
                    var btnFactura = '<button type="button" class="btn btn-primary">Factura</button>';
                    var btnPago = '<button type="button" class="btn btn-primary">Pago</button>';

                    var html = "";
                    html += btnCerrar + btnGuardar + btnFactura;

                   

                    $("#divBtnModal").html(html);
                }
            }
        });
    }

  // ----------->
//borra
/*
    deleteAgencia = function(){
        $(document).on('click','btn-delete',function(e){
            e.preventDefault();
           // var row = $(this).parent().parent()[0];
          //  console.log(row);
            var data = tabla.ftGetData(1);
            console.log(data);
       });
    } 

    */
    /*
//refresh
    load = function(){
    //Escuchamos el clic del botón
    $("#btnActualizar").click(function(e) {
        //Esto evita que la página se refresque al enviar el form//
        e.preventDefault();
        //Identificamos el formulario//
        var frm = $("#frmAgencias");
        //Serializamos sus elementos//
        var data = frm.serialize();
        //Preparamos nuestra petición Ajax//
        var request = $.ajax({
             url: "Controller/AgenciasController.php",      //La tomamos de la propiedad action del form
            method: "POST",  //La tomamos de la propiedad method del form
            data: data,  
                action: "update"                //Los datos que construimos más arriba con serialize
             dataType: "json"             //Indicamos que esperamos una respuesta en json
        });

        //En este bloque se manejan las peticiones exitosas//
        request.done(function(res) {
            console.log(res);
           // $("#info").html(res.status);
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Hubo un error: " + textStatus);
         //   $("#info").html("Error en la petición..."+textStatus);
        });
    });
}
    */
    
//   ------------>

    $(document).ready(function () {
    
        getAgencias();
            });





</script>