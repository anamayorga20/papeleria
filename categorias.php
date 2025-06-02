<?php
include 'config.php';

// 1) Consulta para obtener productos junto con su categoría
$sql = "
  SELECT 
    c.id_categoria,
    c.nombre AS nombre_categoria,
    p.nombre_producto,
    p.precio,
    p.urlimage,
    p.stock
  FROM productos p
  JOIN categorias c ON p.id_categoria = c.id_categoria
  WHERE p.stock > 0
  ORDER BY c.nombre, p.nombre_producto
";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Catálogo de Productos - Papelería</title>
  <link rel="stylesheet" href="css/styles.css"/>
  <style>
    /* Estilos mínimos para separar banners y productos */
    .banner-categoria {
      background-color: #f0f0f0;
      padding: 10px 20px;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 1.4rem;
      font-weight: bold;
      color: #1a3d6d;
    }
    .catalogo-productos {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }
    .producto-item {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 15px;
      background-color: #fff;
    }
    .producto-item h4 {
      margin: 0 0 8px;
      font-size: 1rem;
      color: #333;
    }
    .producto-item p {
      margin: 4px 0;
      font-size: 0. ninefive rem;
      color: #555;
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="container">
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Papelería & Miscelánea</h1>
        <img src="assets/logo.png" alt="Papelería" style="height: 20%; width: 20%;" />
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="index.php" >Inicio</a></li>
          <li><a href="categorias.php" class="active">Categorías</a></li>
          <li><a href="destacados.php">Destacados</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container">
    <h2>Catálogo de Productos</h2>

    <?php
    if ($res && $res->num_rows) {
        $currentCategory = null;
        echo '<div class="catalogo">';
        while ($row = $res->fetch_assoc()) {
            $categoria = $row['nombre_categoria'];
            // Si cambió la categoría, imprimimos un banner y abrimos nuevo contenedor de productos
            if ($currentCategory !== $categoria) {
                // Cerrar catálogo de productos anterior (salvo la primera vez)
                if ($currentCategory !== null) {
                    echo '</div>'; // cierra .catalogo-productos
                }
                // Nuevo banner de categoría
                echo '<div class="banner-categoria">' . htmlspecialchars($categoria) . '</div>';
                // Nueva sección de productos para esta categoría
                echo '<div class="catalogo-productos">';
                $currentCategory = $categoria;
            }
            // Para cada producto, mostramos nombre_producto, precio y stock
            ?>
            <div class="producto-item">
              <h4><?= htmlspecialchars($row['nombre_producto']) ?></h4>
              <img src="<?= $row["urlimage"] ?>" width="100" height="100">
              <p>Precio: $<?= number_format($row['precio'], 2, '.', '') ?></p>
              <p>Stock: <?= intval($row['stock']) ?></p>
            </div>
            <?php
        }
        // Cerrar el último contenedor de productos
        echo '</div>'; // cierra .catalogo-productos
        echo '</div>'; // cierra .catalogo
    } else {
        echo '<p>No hay productos disponibles.</p>';
    }
    ?>
  </main>

  <footer id="contacto" class="site-footer" style="margin-top: 40px;">
    <div class="container" style="text-align: center;">
      <p>© 2025 Papelería y Miscelánea. Todos los derechos reservados.</p>
      <p>Contacto: jatzellpapeleriaymiscelania@gmail.com | +57 3150459750</p>
    </div>
  </footer>
</body>
</html>
<?php $conn->close(); ?>