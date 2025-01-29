<?php
include("partials/cabecera.php");
include("conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL para insertar una nueva categoría
    $sql = "INSERT INTO tienda.categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
    $stm = $conexion->prepare($sql);

    // Ejecutar la consulta
    $stm->bindParam(':nombre', $nombre);
    $stm->bindParam(':descripcion', $descripcion);
    
    if ($stm->execute()) {
        // Redirigir al listado de categorías después de guardar
        header("Location: categorias.php");
        exit();
    } else {
        echo "<p>Error al agregar la categoría.</p>";
    }
}
?>

<section>
    <div class="formulario">
        <h1>Añadir Nueva Categoría</h1>
        <form action="nueva_categoria.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre de la categoría">
            
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required placeholder="Descripción de la categoría"></textarea>
            
            <input type="submit" value="Guardar">
            <a href="categorias.php" class="volver">Cancelar</a>
        </form>
    </div>
</section>

<?php include("partials/footer.php"); ?>
