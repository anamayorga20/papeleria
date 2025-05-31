<?php
include 'config.php';
$sql = "SELECT nombre FROM categorias";
$res = $conn->query($sql);

// Mapeo nombre → fichero de imagen
$imgCat = [
  'Útiles escolares'     => 'utiles.jpg',
  'Cuadernos'            => 'cuadernos.jpg',
  'Material de oficina'  => 'oficina.jpg',
  'Miscelánea'           => 'miscelanea.jpg'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Categorías - Papelería</title>
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
          <li><a href="categorias.php" class="active">Categorías</a></li>
          <li><a href="destacados.php">Destacados</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="categorias container">
    <h2>Categorías Disponibles</h2>
    <div class="grid-4">
      <?php if($res->num_rows): ?>
        <?php while($c = $res->fetch_assoc()):
          $file = $imgCat[$c['nombre']] ?? 'utiles.jpg';
        ?>
          <div class="categoria">
            <!-- <img src="assets/< ?= $file ?>" alt="< ?= htmlspecialchars($c['nombre']) ?>"/> -->
            <h3><?= htmlspecialchars($c['nombre']) ?></h3>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No hay categorías registradas.</p>
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