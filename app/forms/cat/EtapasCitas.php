<?php
//Aqui validar session
?>

<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Etapas de Cita</h2>
        <p class="lead">Etapas de las Citas</p>
        <hr class="my-4">
        <form>
            <input type="hidden" class="form-control" id="idEtapaCita" >
            <div class="form-group">
                <label for="nombreEtapa">Nombre de Etapa</label>
                <input type="text" class="form-control" id="nombreEtapa" >
            </div>
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
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" value="Buscar" id="btnBuscar" onclick="searchEtapasCitas()" class="btn btn-dark btn-group-lg">Buscar</button>
                <button type="button" class="btn btn-primary btn-group-lg">Limpiar</button> 
                <button type="button" class="btn btn-dark btn-group-lg" data-toggle="modal" data-target="#modalFrmEtapasCitas">Agregar</button>
                       
            </div>
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
            <form id="frmEtapasCitasModal">
                <input type="hidden" value="" id="IdAgencia">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="nombre" class="form-control-label">Nombre de Etapa</label>
                        <input class="form-control" type="text" value="" id="nombre">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="apellidoMaterno" class="form-control-label">Descripción</label>
                        <input class="form-control" type="text" value="" id="nombre">
                    </div>                         
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="apellidoPaterno" class="form-control-label">Orden</label>
                    <input class="form-control" type="text" value="" id="PrimerNombre">
                </div>                         
                <div class="col-lg-6 col-md-6">
                    <label for="Activo" class="form-control-label">Activo</label>
                        <select class="form-control" id="Activo">
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                </div>                         
            </div>                                                                                                                                     
                                            
            </form>           
        </div>
        <div id="divBtnModal" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
        
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
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEtapasCitasModal">  
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
            //Pa.IdParticipante, Pa.PrimerNombre, Pa.SegundoNombre, Pa.ApellidoPaterno, Pa.ApellidoMaterno, Pa.Email, Pa.Telefono, Pa.Referencia, EP.Nombre as Estatus, Em.NombreCorto, EV.Nombre as Evento
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
            html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal" data-target="#modalFrmEtapasCitas" ><i class="fas fa-edit"></i></button>'
            html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmEtapasCitasEliminar"><i class="fas fa-trash"></i></button>'    
            
        } 

        return html += "</table>";  
    }



    searchEtapasCitas = function(){
        var nombreEtapa= $("#nombreEtapa").val();
        var descripcionEtapa = $("#descripcionEtapa").val();
        var orden = $("#orden").val(); 
        var activo = $("#activo").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/EtapasCitasController.php",            
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

    eliminar = function(){
    }  

    $(document).ready(function (){
               // alert("hola");
            getEtapasCitas();
        });


</script>