<?php
include("partials/cabecera.php");
// Consulta para obtener los proveedores
$sql = "SELECT * FROM proveedores order by id desc";
$result = $conexion->query($sql);
?>
<section>
    <div class="listado">
        <h1>Proveedores</h1>
        <table class="tabla-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Web</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['web'] . "</td>";
                    echo "<td><a href='ver_proveedor.php?id=" . $fila['id'] . "'>Ver</a> | 
                    <a href='editar_proveedor.php?id=" . $fila['id'] . "'>Editar</a> | 
                    <a href='eliminar_proveedor.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <h3>Nuevo Proveedor</h3>
        <form action="nuevo_proveedor.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre del proveedor">
            <label for="web">Web</label>
            <input type="text" name="web" id="web" required placeholder="http://">
            <input type="submit" value="Guardar">
        </form>
        <br>
        <hr>
        <?php if(isset($_GET["id"])){ ?>
        <div class="contacto">
            <div>
                <h3>Nueva dirección</h3>
                <div class="nueva-direccion">
                <form action="nueva_direccion.php" method="post">
                    <input type="hidden" name="idproveedor" value="<?php echo $_GET["id"]; ?>">
                    <label for="calle">Calle</label>
                    <input type="text" name="calle" id="calle" required placeholder="Calle">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" required placeholder="Número">
                    <label for="comuna">Comuna</label>
                    <input type="text" name="comuna" id="comuna" required placeholder="Comuna">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" required placeholder="Ciudad">
                    <input type="submit" value="Guardar">
                    <input type="reset" value="Cancelar">
                </form>
                </div>
            </div>
            <div>
                <h3>Nuevo teléfono</h3>
                <form action="nuevo_telefono" method="post">
                    <input type="hidden" name="idproveedor" value="<?php echo $_GET["id"]; ?>">
                    <label for="numero">Numero</label>
                    <input type="text" name="numero" id="numero" required placeholder="Número">
                    <input type="submit" value="Guardar">
                    <input type="reset" value="Cancelar">
                </form>
            </div>

        </div>
        <a href="proveedores">Volver</a>

        <?php } ?>
    </div>
</section>
<?php
include("partials/footer.php");
?>