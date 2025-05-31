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

// Mapeo nombre → fichero de imagen
$imgCat = [
  'Útiles escolares'     => 'utiles.jpg',
  'Cuadernos'            => 'cuadernos.jpg',
  'Material de oficina'  => 'oficina.jpg',
  'Miscelánea'           => 'miscelanea.jpg'
];
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
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- mision y vision -->
  <section id="mision-vision" class="hero">
    <div class="container hero-content">
      <div class="texto">
        <h2>MISION</h2>
       Ofrecer soluciones prácticas y asequibles en artículos escolares y de oficina, acompañadas de un excelente servicio al cliente, tanto presencial como digital.
      </div>
      <div class="texto">
        <h2>VISION</h2>
         Ser la papelería y tienda miscelánea líder en nuestra comunidad, reconocida por la variedad de productos, innovación y compromiso con la satisfacción del cliente.
      </div>
    </div>
  </section>


  <!-- Hero -->
  <section class="hero">
    <div class="container hero-content">
      <div class="texto">
        <h2>Compras y pedidos de papelería y miscelánea</h2>
        <a href="categorias.php" class="btn">Comprar ahora</a>
      </div>
    </div>
  </section>

  
   <!-- Categorías -->
  <section id="categorias" class="categorias container">
    <h2>proyectos</h2>
    <div class="grid-4">
      <div class="categoria">
        <!--<img src="assets/< ?= $file ?>" alt="< ?= htmlspecialchars($cat['nombre']) ?>"/>-->
        <h3>scratch</h3>
      </div>
      <div class="categoria">
        <!--<img src="assets/< ?= $file ?>" alt="< ?= htmlspecialchars($cat['nombre']) ?>"/>-->
        <h3>app inventor</h3>
      </div>
      <div class="categoria">
        <!--<img src="assets/< ?= $file ?>" alt="< ?= htmlspecialchars($cat['nombre']) ?>"/>-->
        <h3>kahoot</h3>
      </div>
      <div class="categoria">
        <a href="https://tinyurl.com/2czjab27" target="_blank" style="text-decoration:none">
          <img src="assets/voki.jpg" alt="scrash?>"/>
          <h3>voki</h3>
        </a>
      </div>
    </div>
  </section>
  
  <!-- Footer -->
  <footer id="contacto" class="site-footer">
    <div class="container">
      <p>© 2025 Papelería y Miscelánea. Todos los derechos reservados.</p>
      <p>Contacto: ventas@papeleriaymiscelanea.com | +57 300 1234567</p>
    </div>
  </footer>
</body>
</html>
<?php $conn->close(); ?>