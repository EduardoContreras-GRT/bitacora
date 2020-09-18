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
                <label for="NombreAgencia1">Nombre de Agencia</label>
                <input type="text" class="form-control" id="NombreAgencia1" required>
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
                    <label for="NombreAgencia">Nombre de Agencia</label>
                        <input type="text" class="form-control" id="NombreAgencia">    
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
        <button type="button" class="btn btn-primary" value="Guardar" id="btnGuardar" onclick="saveAgencias()"  data-dismiss="modal">Guardar Cambios</button>
        
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
        <form id="frmAgenciasModal1">  
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
                    $('#tblAgencias').DataTable();   
                }
            }
        });
    }

//    GRID ------------>
    buildGridAgencias = function (data, total){
        var html = "<table id='tblAgencias' class='table table-hover'>";                 
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
            html += data[i].NombreAgencia;
            html += '</span>';  
            html += '</div>';  
            html += '</td>';     
            html += '<td>';   
            html += data[i].Activo;
            html += '</td>'; 
            html += '<td>'; 
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal"  onclick="loadInfoAgencias(' + data[i].IdAgencia + ')" data-toggle="modal" data-target="#modalFrmAgencias" ><i class="fas fa-edit"></i></button>';
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger " data-toggle="modal" onclick="deleteAgencias()" data-target="#modalFrmAgenciasEliminar"><i class="fas fa-trash"></i></button>'    
            html += '</div>';
            html += '</div>';
            html += '</td>';
        } 

    return html += "</table>";  
    }

//  Search  ------------>
    searchAgencia = function(){
        var NombreAgencia = $("#NombreAgencia1").val(); 
            $.ajax({
            method: "POST",
            url: "controller/AgenciasController.php",            
            data: { 
                action: "selectByName", 
                NombreAgencia: NombreAgencia
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    var html = buildGridAgencias(result.data, result.total);
                    $("#divDataTableAgencias").html(html);
                    $('#tblAgencias');                                                   
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
        var NombreAgencia = $("#NombreAgencia").val();
        var Activo = $("#Activo").val();
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    action: "insert",                         
                    NombreAgencia: NombreAgencia                                                                                
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

    // ------------------>
    // saveAgencias = function(){
    //     var IdAgencia = $("#IdAgencia").val();
    //     var Nombre = $("#Nombre1").val();
    //     var Activo = $("#Activo").val();
    //     $.ajax({
    //             method: "POST",
    //             url: "controller/AgenciasController.php",            
    //             data: { 
    //                 action: "insert",                         
    //                 Nombre: Nombre,
    //                 Activo: Activo                                                                                
    //             },
    //             dataType: "json"
    //     })
    //     .done(function(result) {
    //         if( result != "" ){   
    //           //  alert("primer if");            
    //             if(result.status === "ok"){
    //             //   alert("sgundo if");
    //              // console.log(result.status);  
    //                // data = result.data;
    //                data = result.data
    //                alert("Registro guardado");
    //             } 
    //         }
    //     });
    // }
    // //

   // -------------->
   updateAgencias=function(){
       alert("inicio de funcion");
        var IdAgencia = $("#IdAgencia").val();
        var NombreAgencia = $("#NombreAgencia").val();
        var Activo = $("#Activo").val();

         $.ajax({
           
                 method: "POST",
                 url: "controller/AgenciasController.php",             
                 data: { 
                     action: "update",                         
                     IdAgencia: IdAgencia,
                     NombreAgencia: NombreAgencia,   
                     Activo: "S"
                                                                                           
                 },
                 dataType: "json"
         })
         .done(function( result ) {
          //  alert("entra antes del if 1");
            if( result != "" ){   
                alert("entra despues del done");  
             //   console.log(result);          
                if(result.status === "ok"){
                    alert("entra if 2");
                //  console.log(result);
                    data = result.data;
                  //  $("#IdAgencia").val(data[0].IdAgencia);                                 
                  //  var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                //    var btnGuardar = '<button type="button" onclick="updateAgencias()" class="btn btn-primary">Guardar</button>';                                    
                    
                //    var html = "";
               ///     html += btnCerrar + btnGuardar;                   
                //    $("#divBtnModal").html(html);
                    alert("Registro guardado");
                }
            }
        });
    }



//    updateAgencias = function(){
//         var IdAgencia = $("#IdAgencia").val();
//         var Nombre = $("#Nombre1").val();
//         var Activo = $("#Activo").val();
//         $.ajax({
//                 method: "POST",
//                 url: "controller/AgenciasController.php",            
//                 data: { 
//                     action: "update",                         
//                     IdAgencia: IdAgencia,
//                     Nombre: Nombre1,   
//                     Activo: "S"
                                                                                           
//                 },
//                 dataType: "json"
//         })
//         .done(function(result) {
//          //   if( result != "" ){   
//                 alert("primer if");            
//               //  if(result.status === "ok"){
//               //    alert("segundo if");
//                  // console.log(result.status);  
//                    // data = result.data;
//                 //   data = result.data
//                 //   $("#IdAgencia").val(data[0].IdAgencia); 
//                 //    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
//                 //     var btnGuardar = '<button type="button" onclick="updateAgencias()" class="btn btn-primary">Actualizar</button>';                                
//                 //     var html = "";
//                 //     html += btnCerrar + btnGuardar;                   

//                 //     $("#divBtnModal").html(html);
//                //     alert("Registro modificado correctamente");
//                // } 
//            // }
//         });
//     }
//------------->
loadInfoAgencias = function(IdAgencia){
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
                   $("#NombreAgencia").val(data[0].NombreAgencia);
                   $("#Activo").val(data[0].Activo);

                    var btnCerrar  = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                   
                    // var btnGuardar = '<button type="button" onclick="updateAgencias()" class="btn btn-primary">Actualizar</button>';                               
                    var btnGuardar= '';
                      
                    if($("#IdAgencia").val() != ""){
                        btnGuardar = '<button type="button" onclick="saveAgencias()" class="btn btn-primary">Guardar</button>';  
                    } else {
                        btnGuardar = '<button type="button" onclick="saveAgencias()" class="btn btn-primary">Actualizar</button>';  
                    }
                   
                   
                    var html = "";
                    html += btnCerrar + btnGuardar;  
                    $("#divBtnModal").html(html);
                }
            }
        });
    }
  //   ------------>
  /* loadInfoAgencias1 = function(IdAgencia){
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
                   

                  $("#divBtnModal").html();
                }
            }
        });
    }
 */
  // ----------->


deleteAgencias = function(IdAgencia){
        var IdAgencia = $("#IdAgencia").val();
        var Nombre = $("#Nombre").val();
        var Activo = $("#Activo").val();
        $.ajax({
                method: "POST",
                url: "controller/AgenciasController.php",            
                data: { 
                    action: "delete",                         
                    IdAgencia: IdAgencia                                                                                
                },
                dataType: "json"


        })
        // .done(function( result ) {
        //     if( result != "" ){               
        //         if(result.status === "ok"){
        //             data = result.data;
        //            $("#Nombre1").val(data[0].Nombre);
        //            $("#Activo").val(data[0].Activo);
        //            data = result.data
        //            alert("Registro eliminado");
        //         } 
        //     }
        // });
    }
    

    
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
<!-- <script>
    $(document).ready( function () {
    $('#tblAgencias').DataTable();
} );

</script> -->

