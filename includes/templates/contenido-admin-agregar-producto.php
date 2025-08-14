<h3 class="mb-4">Agregar producto</h3>
<div class="row">
    <div class="col">
        <form action="includes/functions/enviar_producto_admin.php" method="POST" class="d-flex justify-content-between flex-wrap">
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div>
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" class="form-control" required>
            </div>
            <div>
                <label for="categoria">Categoría</label>
                <select name="categoria" id="categoria" class="form-control" required>
                    <option value="1">Fertilizante</option>
                    <option value="2">Semilla</option>
                    <option value="3">Tóxico</option>
                </select>
            </div>
            <div>
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio" class="form-control" required>
            </div>
            <div>
                <label for="imagen">Imagen</label>
                <input type="text" id="imagen" name="imagen" class="form-control" required>
            </div>
            <div>
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="1">Disponible</option>
                    <option value="2">No disponible</option>
                </select>
            </div>
            <div class="descripcion">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
            <div>
                <input type="submit" class="btn btn-primary mb-5" name="agregar-producto" value="AGREGAR">
            </div>
        </form>
    </div>
</div>