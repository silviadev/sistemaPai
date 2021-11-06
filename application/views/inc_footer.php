 <!-- /.content-wrapper -->
 <footer class="main-footer">
   <div class="float-right d-none d-sm-block">
     <b>Version</b> 3.1.0
   </div>
   <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jszip/jszip.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-searchbuilder/js/dataTables.searchBuilder.min.js"></script>

 <!-- InputMask -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/moment/moment.min.js"></script>
 <script src="<?php echo base_url(); ?>/adminLte/plugins/inputmask/jquery.inputmask.min.js"></script>

 <!-- date-range-picker -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/daterangepicker/daterangepicker.js"></script>

 <!-- AdminLTE App -->
 <script src="<?php echo base_url(); ?>/adminLte/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>/adminLte/dist/js/demo.js"></script>
 <!-- Page specific script -->

 <!-- Select2 -->
 <script src="<?php echo base_url(); ?>adminLte/plugins/select2/js/select2.full.min.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?php echo base_url(); ?>adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
 <!-- BS-Stepper -->
 <script src="<?php echo base_url(); ?>adminLte/plugins/bs-stepper/js/bs-stepper.min.js"></script>

 <script>
   $(function() {
     var table = $("#example1").DataTable({
       dom: 'Bfrtip',
       buttons: [{
         extend: 'pdfHtml5',
         title: $('#docTitle').text(),
         messageTop: 'Lista de usuarios tutor',
         bom: true
       }],
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "searching": true,
       "language": getLanguaje()
     }).buttons().container().appendTo('#example1_filter .col-sm-6:eq(0)');

     $('#dataTable').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
       "buttons": ["pdf"]
     });


     $('.select2bs4').select2({
       theme: 'bootstrap4'
     });
     //Date picker
     $('.reservationdate').datetimepicker({
       format: 'L'
     });
     
     function getLanguaje () {
       return {
         "processing": "Procesando...",
         "lengthMenu": "Mostrar _MENU_ registros",
         "zeroRecords": "No se encontraron resultados",
         "emptyTable": "Ningún dato disponible en esta tabla",
         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
         "search": "Buscar:",
         "infoThousands": ",",
         "loadingRecords": "Cargando...",
         "paginate": {
           "first": "Primero",
           "last": "Último",
           "next": "Siguiente",
           "previous": "Anterior"
         },
         "aria": {
           "sortAscending": ": Activar para ordenar la columna de manera ascendente",
           "sortDescending": ": Activar para ordenar la columna de manera descendente"
         },
         "buttons": {
           "copy": "Copiar",
           "colvis": "Visibilidad",
           "collection": "Colección",
           "colvisRestore": "Restaurar visibilidad",
           "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
           "copySuccess": {
             "1": "Copiada 1 fila al portapapeles",
             "_": "Copiadas %d fila al portapapeles"
           },
           "copyTitle": "Copiar al portapapeles",
           "csv": "CSV",
           "excel": "Excel",
           "pageLength": {
             "-1": "Mostrar todas las filas",
             "_": "Mostrar %d filas"
           },
           "pdf": "PDF",
           "print": "Imprimir"
         },
         "autoFill": {
           "cancel": "Cancelar",
           "fill": "Rellene todas las celdas con <i>%d<\/i>",
           "fillHorizontal": "Rellenar celdas horizontalmente",
           "fillVertical": "Rellenar celdas verticalmentemente"
         },
         "decimal": ",",
         "searchBuilder": {
           "add": "Añadir condición",
           "button": {
             "0": "Constructor de búsqueda",
             "_": "Constructor de búsqueda (%d)"
           },
           "clearAll": "Borrar todo",
           "condition": "Condición",
           "conditions": {
             "date": {
               "after": "Despues",
               "before": "Antes",
               "between": "Entre",
               "empty": "Vacío",
               "equals": "Igual a",
               "notBetween": "No entre",
               "notEmpty": "No Vacio",
               "not": "Diferente de"
             },
             "number": {
               "between": "Entre",
               "empty": "Vacio",
               "equals": "Igual a",
               "gt": "Mayor a",
               "gte": "Mayor o igual a",
               "lt": "Menor que",
               "lte": "Menor o igual que",
               "notBetween": "No entre",
               "notEmpty": "No vacío",
               "not": "Diferente de"
             },
             "string": {
               "contains": "Contiene",
               "empty": "Vacío",
               "endsWith": "Termina en",
               "equals": "Igual a",
               "notEmpty": "No Vacio",
               "startsWith": "Empieza con",
               "not": "Diferente de"
             },
             "array": {
               "not": "Diferente de",
               "equals": "Igual",
               "empty": "Vacío",
               "contains": "Contiene",
               "notEmpty": "No Vacío",
               "without": "Sin"
             }
           },
           "data": "Data",
           "deleteTitle": "Eliminar regla de filtrado",
           "leftTitle": "Criterios anulados",
           "logicAnd": "Y",
           "logicOr": "O",
           "rightTitle": "Criterios de sangría",
           "title": {
             "0": "Constructor de búsqueda",
             "_": "Constructor de búsqueda (%d)"
           },
           "value": "Valor"
         },
         "searchPanes": {
           "clearMessage": "Borrar todo",
           "collapse": {
             "0": "Paneles de búsqueda",
             "_": "Paneles de búsqueda (%d)"
           },
           "count": "{total}",
           "countFiltered": "{shown} ({total})",
           "emptyPanes": "Sin paneles de búsqueda",
           "loadMessage": "Cargando paneles de búsqueda",
           "title": "Filtros Activos - %d"
         },
         "select": {
           "cells": {
             "1": "1 celda seleccionada",
             "_": "$d celdas seleccionadas"
           },
           "columns": {
             "1": "1 columna seleccionada",
             "_": "%d columnas seleccionadas"
           },
           "rows": {
             "1": "1 fila seleccionada",
             "_": "%d filas seleccionadas"
           }
         },
         "thousands": ".",
         "datetime": {
           "previous": "Anterior",
           "next": "Proximo",
           "hours": "Horas",
           "minutes": "Minutos",
           "seconds": "Segundos",
           "unknown": "-",
           "amPm": [
             "AM",
             "PM"
           ],
           "months": {
             "0": "Enero",
             "1": "Febrero",
             "10": "Noviembre",
             "11": "Diciembre",
             "2": "Marzo",
             "3": "Abril",
             "4": "Mayo",
             "5": "Junio",
             "6": "Julio",
             "7": "Agosto",
             "8": "Septiembre",
             "9": "Octubre"
           },
           "weekdays": [
             "Dom",
             "Lun",
             "Mar",
             "Mie",
             "Jue",
             "Vie",
             "Sab"
           ]
         },
         "editor": {
           "close": "Cerrar",
           "create": {
             "button": "Nuevo",
             "title": "Crear Nuevo Registro",
             "submit": "Crear"
           },
           "edit": {
             "button": "Editar",
             "title": "Editar Registro",
             "submit": "Actualizar"
           },
           "remove": {
             "button": "Eliminar",
             "title": "Eliminar Registro",
             "submit": "Eliminar",
             "confirm": {
               "_": "¿Está seguro que desea eliminar %d filas?",
               "1": "¿Está seguro que desea eliminar 1 fila?"
             }
           },
           "error": {
             "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
           },
           "multi": {
             "title": "Múltiples Valores",
             "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
             "restore": "Deshacer Cambios",
             "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
           }
         },
         "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
       }
     }
   });
 </script>
 </body>

 </html>