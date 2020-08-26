<?php
//Aqui validar session
?>

<div class="row">
    <div class="jumbotron col-lg-4" id="form">
        <h2 class="display-5">Fuentes de Lead</h2>
        <p class="lead">Fuentes</p>
        <hr class="my-4">
        <form>
            <input type="hidden" class="form-control" id="idFuenteLead" >
            <div class="form-group">
                <label for="nombreFuente">Nombre de Fuente</label>
                <input type="text" class="form-control" id="nombreFuente" >
            </div>
            
            <div class="form-group">
                <label for="activo">Activo</label>
                <select class="form-control" id="activo">
                    <option value="S">Si</option>
                    <option value="N">No</option>              
                </select>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary btn-group-lg" value="Buscar" id="btnBuscar" onclick="searchFuentesLead()">Buscar</button>
                <button type="button" class="btn btn-success btn-group-lg">Guardar</button>
                <button type="button" class="btn btn-primary btn-group-lg">Limpiar</button>        
            </div>
        </form>
    </div>
    <div class="col-lg-8" id="divDataTableFuenteLead">

</div>
</div>

<!--  MODAL FORM  EDITAR-->
<div class="modal fade" id="modalFrmFuenteLead" tabindex="-1" role="dialog" aria-labelledby="modalFrmFuenteLead" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fuentes de Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmFuenteLeadModal">
                <input type="hidden" value="" id="IdAgencia">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label for="Nombre" class="form-control-label">Fuentes</label>
                        <input class="form-control" type="text" value="" id="Nombre">
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
<<div class="modal fade" id="modalFrmFuenteLeadEliminar" tabindex="-1" role="dialog" aria-labelledby="modalFrmFuenteLeadEliminar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminación de Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmFuenteLeadModal">  
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

getFuenteLead = function(){
    $.ajax({
        method: "POST",
        url: "controller/FuenteLeadController.php",            
        data: { action: "selectTable"},
        dataType: "json"
    })
    .done(function( result ) {
        if( result != "" ){               
            if(result.status === "ok"){   
                //console.log(result.status);                     
                var html = buildGridFuenteLead(result.data, result.total);
                $("#divDataTableFuenteLead").html(html);
                $('#tblFuenteLead').DataTable();                   
            }
        }
    }); 

}


buildGridFuenteLead= function (data, total){
    var html = "<table id='tblFuenteLead' class='table table table-hover'>";                 
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
        //Pa.IdParticipante, Pa.PrimerNombre, Pa.SegundoNombre, Pa.ApellidoPaterno, Pa.ApellidoMaterno, Pa.Email, Pa.Telefono, Pa.Referencia, EP.Nombre as Estatus, Em.NombreCorto, EV.Nombre as Evento
        html += '<tr>';     
        html += ' <th scope="row">';     
        html += ' <div class="media-body">';     
        html += '  <span class="name mb-0 text-sm">';                              
        html += data[i].nombreFuente;
        html += '</span>';  
            html += '</div>';  
        html += ' </td>';     
        html += ' <td>';   
        html += data[i].activo;  
        html += ' </td>';     
        html += ' <td>';     
        html+='<button value="Actualizar" title="Actualizar" class="btn btn-primary" data-toggle="modal" data-target="#modalFrmFuenteLead" ><i class="fas fa-edit"></i></button>';
        html+= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        html+='<button value= "Eliminar" title="Eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalFrmFuenteLeadEliminar"><i class="fas fa-trash"></i></button>' ;   

    } 

    return html += "</table>";  
}
searchFuentesLead = function(){
        var nombreFuente = $("#nombreFuente").val(); 
          
            $.ajax({
            method: "POST",
            url: "controller/FuenteLeadController.php",            
            data: { 
                action: "selectByName", 
                nombreFuente: nombreFuente
            },
            dataType: "json"
        })
        .done(function(result) {
            if( result != "" ){               
                if(result.status === "ok"){     
                    
                    var html = buildGridFuenteLead(result.data, result.total);
                    $("#divDataTableFuenteLead").html(html);
                    $('#tblFuenteLead').DataTable();                                                   
                }else{
                    $("#divDataTableFuenteLead").html("Sin Resultados");
                }
            }else{
                $("#divDataTableFuenteLead").html("Recargar la página");
            }
        });
    }




save = function(){
//    var idAgencia = $("#idAgencia").val();
 //   var nombreAgencia = $("#nombreAgencia").val();
 //   var activo = $("#activo").val();

}

eliminar = function(){

}    
$(document).ready(function () {
           // alert("hola");
        getFuenteLead();
    });


</script>