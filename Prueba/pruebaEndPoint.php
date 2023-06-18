<!DOCTYPE html>
<html>
<head>
  <title>Prueba de API de Pedidos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
</head>
<body>
  <div class="container">
    <h1>Crear un nuevo pedido!!</h1>
    <form id="pedidoForm" action="https://cybercore.test/api/pedidosapi_bodega.php" method="POST">
      <div class="form-group">
        <label for="nombreOrigen">Nombre de origen:</label>
        <input type="text" class="form-control" id="nombreOrigen" name="nombre_origen" required>
      </div>
      <div class="form-group">
        <label for="direccionOrigen">direccion origen:</label>
        <input type="text" class="form-control" id="direccionOrigen" name="direccion_origen" required>
      </div>
      <div class="form-group">
        <label for="celularOrigen">Celular de origen:</label>
        <input type="text" class="form-control" id="celularOrigen" name="celular_origen" required>
      </div>
      <div class="form-group">
        <label for="nombreDestino">nombre destino:</label>
        <input type="text" class="form-control" id="nombreDestino" name="nombre_destino" required>
      </div>
      <div class="form-group">
        <label for="direccionDestino">direccion de destino:</label>
        <input type="text" class="form-control" id="direccionDestino" name="direccion_destino" required>
      </div>
      <div class="form-group">
        <label for="celularDestino">celular destino:</label>
        <input type="text" class="form-control" id="celularDestino" name="celular_destino" required>
      </div>
      <div class="form-group">
        <label for="obs">Observaciones:</label>
        <textarea class="form-control" id="obs" name="obs"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Crear Pedido</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function() {
      // Manejar el envío del formulario
      $('#pedidoForm').submit(function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        // Enviar la solicitud AJAX
        $.ajax({
          url: $(this).attr('action'), // Obtener la URL del atributo action del formulario
          type: 'POST', // Elige el método adecuado (GET, POST, PUT, DELETE) según tu API
          dataType: 'json', // Espera una respuesta JSON
          data: formData, // Pasar los datos del formulario
          contentType: 'application/x-www-form-urlencoded', // Establecer el tipo de contenido
          success: function(response) {
            // Maneja la respuesta JSON aquí
            console.log(response);
            Swal.fire({
              icon: 'success',
              title: 'Pedido guardado exitosamente',
              showConfirmButton: false,
              timer: 1500
            });
          },
          error: function(xhr, status, error) {
            // Maneja el error aquí
            console.error(error);
            Swal.fire({
              icon: 'error',
              title: 'Error al guardar el pedido',
              text: 'Por favor, intenta nuevamente',
            });
          }
        });

      });
    });
  </script>
</body>
</html>
