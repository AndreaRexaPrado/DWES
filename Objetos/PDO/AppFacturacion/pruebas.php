<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Formulario de Filtros</title>
</head>
<body>

<div class="container mt-5">
  <form>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="codigo">Código:</label>
          <input type="text" class="form-control" id="codigo" name="codigo">
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <label for="nombreProducto">Nombre del Producto:</label>
          <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <label for="precioVenta">Precio de Venta Público:</label>
          <input type="text" class="form-control" id="precioVenta" name="precioVenta">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="codigoProveedor">Código del Proveedor:</label>
          <input type="text" class="form-control" id="codigoProveedor" name="codigoProveedor">
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="form-group">
          <label for="stock">Stock:</label>
          <input type="text" class="form-control" id="stock" name="stock">
        </div>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Filtrar</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
