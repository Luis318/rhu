@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>

   <!-- Meta -->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">

   <!-- CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" >

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>

</head>
<body>
   <div class='container'>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('create') }}"> Crear Nueva Cuenta</a>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="empModal" >
         <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Detalles Cuenta</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                   <table class="w-100" id="tblempinfo">
                      <tbody></tbody>
                   </table>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Employees List -->
      <table class="table mt-5" border='1' id='empTable' style='border-collapse: collapse;'>
         <thead>
            <tr>
               <th>N°</th>
               <th>Nombre</th>
               <th>Nomenclatura</th>
               <th>Tipo de Cuentas</th>
            </tr>
         </thead>
         <tbody>
         @php
         $sno = 0;
         @endphp
         @foreach($cuentas as $cuenta)
            <tr>
              <td>{{ ++$sno }}</td>
              <td>{{ $cuenta->nombre }}</td>
              <td>{{ $cuenta->nomenclatura }}</td>
              <td>{{ $cuenta->tipocuentas_id }}</td>
              <td><button class='btn btn-info viewdetails' data-id='{{ $cuenta->id }}' >Detalles</button></td>
            </tr>
         @endforeach
         </tbody>
      </table>

   </div>

   <!-- Script -->
   <script type='text/javascript'>
   $(document).ready(function(){

      $('#empTable').on('click','.viewdetails',function(){
          var empid = $(this).attr('data-id');

          if(empid > 0){

             // AJAX request
             var url = "{{ route('getCuentaDetails',[':empid']) }}";
             url = url.replace(':empid',empid);

             // Empty modal data
             $('#tblempinfo tbody').empty();

             $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                     // Display Modal
                     $('#empModal').modal('show');
                 }
             });
          }
      });

   });
   </script>
</body>
</html>

@endsection
