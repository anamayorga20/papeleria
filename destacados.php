<?php
include 'config.php';
$sql = "SELECT nombre_producto, precio, stock 
        FROM productos 
        WHERE stock > 0 
        LIMIT 8";
$res = $conn->query($sql);

// Mapeo nombre → fichero de imagen
$imgProd = [
  'Marcadores de colores' => 'marcadores.jpg',
  'Engrapadora roja'      => 'engrapadora.jpg',
  'Cinta adhesiva'        => 'cinta.jpg',
  'Bolígrafo de gel'      => 'boligrafo.jpg'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Destacados - Papelería</title>
  <link rel="stylesheet" href="css/styles.css"/>
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
          <li><a href="index.php">Inicio</a></li>
          <li><a href="categorias.php">Categorías</a></li>
          <li><a href="destacados.php" class="active">Destacados</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="destacados container">
    <h2>Productos Destacados</h2>
    <div class="grid-4">
      <?php if($res->num_rows): ?>
        <?php while($p = $res->fetch_assoc()):
          $file = $imgProd[$p['nombre_producto']] ?? 'cinta.jpg';
        ?>
          <div class="producto">
            <!-- <img src="assets/< ?= $file ?>" alt="< ?= htmlspecialchars($p['nombre_producto']) ?>"/>-->
            <p class="nombre"><?= htmlspecialchars($p['nombre_producto']) ?></p>
            <p class="precio">$<?= number_format($p['precio'],2,'.','') ?></p>
            <button class="btn">Añadir</button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No hay productos destacados por ahora.</p>
      <?php endif; ?>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <p>© 2025 Papelería y Miscelánea.</p>
    </div>
  </footer>
</body>
</html>
<?php $conn->close(); ?>