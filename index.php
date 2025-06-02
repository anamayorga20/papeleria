<?php
include 'config.php';

// Cargar categorías
$sqlCat  = "SELECT id_categoria, nombre FROM categorias";
$resCat  = $conn->query($sqlCat);

// Cargar productos destacados (ejemplo: primeros 4)
$sqlProd = "SELECT id_producto, nombre_producto, precio, stock
            FROM productos
            WHERE stock > 0
            LIMIT 4";
$resProd = $conn->query($sqlProd);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Papelería y Miscelánea</title>
  <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="container">
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1 style="margin: 0;">Papelería & Miscelánea</h1>
        <img src="assets/logo.png" alt="Papelería" style="height: 20%; width: 20%;" />
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="index.php" class="active">Inicio</a></li>
          <li><a href="categorias.php">Categorías</a></li>
          <li><a href="destacados.php">Destacados</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Misión y Visión -->
  <section id="mision-vision" class="hero">
    <div class="container hero-content">
      <div class="texto">
        <h2>MISIÓN</h2>
        Ofrecer soluciones prácticas y asequibles en artículos escolares y de oficina, acompañadas de un excelente servicio al cliente, tanto presencial como digital.
      </div>
      <div class="texto">
        <h2>VISIÓN</h2>
        Ser la papelería y tienda miscelánea líder en nuestra comunidad, reconocida por la variedad de productos, innovación y compromiso con la satisfacción del cliente.
      </div>
    </div>
  </section>

  <!-- Hero Central -->
  <section class="hero">
    <div class="container hero-content">
      <div class="texto">
        <h2>Compras y pedidos de papelería y miscelánea</h2>
        <a href="categorias.php" class="btn">Comprar ahora</a>
      </div>
    </div>
  </section>

  <!-- Proyectos (íconos en vertical) -->
  <section id="categorias" class="categorias container">
    <h2>Proyectos</h2>
    <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
      <!-- Bloque de Scratch -->
      <div class="categoria" style="text-align: center;">
        <a href="https://scratch.mit.edu/projects/1183210830" target="_blank" style="text-decoration: none; color: inherit;">
          <img src="assets/scrach.jpg" alt="Scratch" style="width: 100px; height: auto;"/>
          <h3 style="margin: 8px 0 0;">Scratch</h3>
        </a>
      </div>

      <!-- Bloque de Voki -->
      <div class="categoria" style="text-align: center;">
        <a href="https://tinyurl.com/2czjab27" target="_blank" style="text-decoration: none; color: inherit;">
          <img src="assets/voki.jpg" alt="Voki" style="width: 100px; height: auto;"/>
          <h3 style="margin: 8px 0 0;">Voki</h3>
        </a>
      </div>

      <!-- Bloque de Kahoot -->
      <div class="categoria" style="text-align: center;">
        <a href="https://kahoot.it/challenge/?quiz-id=3a8fbbeb-d961-4a9b-a89a-638adb462e52&single-player=true" target="_blank" style="text-decoration: none; color: inherit;">
          <img src="assets/kahoot.jpg" alt="Kahoot" style="width: 100px; height: auto;"/>
          <h3 style="margin: 8px 0 0;">Kahoot</h3>
        </a>
      </div>
    </div>
  </section>
  

  <!-- Footer -->
  <footer id="contacto" class="site-footer">
    <div class="container">
      <p>© 2025 Papelería y Miscelánea. Todos los derechos reservados.</p>
      <p>Contacto: jatzellpapeleriaymiscelania@gmail.com | +57 3150459750</p>
    </div>
  </footer>
</body>
</html>
<?php $conn->close(); ?>
