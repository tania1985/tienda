<?php
include("partials/cabecera.php");
// Consulta para obtener las categorías desde la base de datos
$sql = "SELECT id, nombre, descripcion FROM tienda.categorias ORDER BY id DESC";
$stm = $conexion->prepare($sql);
$stm->execute();
$categorias = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<section>
    <div class="listado">
        <h1>Categorías</h1>

        <!-- Tabla de categorías -->
        <table class="tabla-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($categoria['id']); ?></td>
                        <td><?php echo htmlspecialchars($categoria['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($categoria['descripcion']); ?></td>
                        <td>
                            <a href="ver_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn-ver">Ver</a>
                            <a href="editar_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn-editar">Editar</a>
                            <a href="eliminar_categoria.php?id=<?php echo $categoria['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta categoría?')">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>

        <!-- Formulario para agregar nueva categoría -->
        <h3>Nueva Categoría</h3>
        <form action="nueva_categoria.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre de la categoría">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required placeholder="Descripción de la categoría"></textarea>
            <input type="submit" value="Guardar" class="btn-anadir">
        </form>

        <br>
        <a href="index.php" class="volver">Volver</a>
    </div>
</section>

<?php include("partials/footer.php"); ?>
