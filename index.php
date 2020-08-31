<?php include_once "includes/templates/header.php"; ?>

<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web en español</h2>
  <p>
    Praesent rutrum efficitur pharetra. Vivamus scelersque pretium vellit, id tempor turpis pulvinar et. Ut bibendum
    finibus massa non molestie.
    curabitur urna metus, placerat gravida lacus ut, lacinia cangue orci. Maecenas luctus mi at ex blandit vehicula.
    Morbi porttitor tempus euismod.
  </p>
</section>

<section class="programa">
  <div class="contenedor-video">
    <video autoplay loop poster="bg-talleres.jpg" muted>
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">
    </video>
  </div>
  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del Evento</h2>

        <?php
        try {
          require_once("includes/funciones/bd_conexion.php");
          $sql = " SELECT * FROM `categoria_evento` ";
          $resultado = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>

        <nav class="menu-programa">
          <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat["cat_evento"]; ?>
            <a href="#<?php echo strtolower($categoria) ?>">
              <i class="fas <?php echo $cat["icono"] ?> "></i> <?php echo $categoria ?>
            </a>
          <?php } ?>
        </nav>

        <?php
        try {
          require_once("includes/funciones/bd_conexion.php");
          $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id ";
          $sql .= " AND eventos.id_cat_evento = 1 ";
          $sql .= " ORDER BY `evento_id` LIMIT 2;";
          $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id ";
          $sql .= " AND eventos.id_cat_evento = 2 ";
          $sql .= " ORDER BY `evento_id` LIMIT 2;";
          $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " INNER JOIN invitados ";
          $sql .= " ON eventos.id_inv = invitados.invitado_id ";
          $sql .= " AND eventos.id_cat_evento = 3 ";
          $sql .= " ORDER BY `evento_id` LIMIT 2;";
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
        ?>
        <?php $conn->multi_query($sql); ?>
        <?php
        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?>
          <?php foreach ($row as $evento) : ?>
            <?php if($i % 2==0) { ?>
            <div id="<?php echo strtolower($evento["cat_evento"]) ?>" class="info-curso ocultar clearfix">
            <?php } ?>
              <div class="detalle-evento">
                <h3><?php echo utf8_encode($evento["nombre_evento"])?></h3>
                <p><i class="fas fa-clock-o"></i> <?php echo $evento["hora_evento"];?></p>
                <p><i class="fas fa-calendar"></i> <?php echo $evento["fecha_evento"];?></p>
                <p><i class="fas fa-user"></i> <?php echo $evento["nombre_invitado"]. " " . $evento["apellido_invitado"];?></p>
              </div>

              <?php if($i % 2 ==1): ?>
                <a href="calendario.php" class="button float-right">Ver todos</a>
            </div>
            <!--talleres-->
              <?php endif; ?>
            <?php $i++ ?>
          <?php endforeach; ?>
            <?php $resultado->free(); ?>    
        <?php } while ($conn->more_results() && $conn->next_result());

        ?>


      </div>
      <!--programa evento-->
    </div>
    <!--contenedor-->
  </div>
  <!--contenido programa-->
</section>
<!--programa-->

<section class="invitados contenedor seccion">
  <h2>Nuestros Invitados</h2>
  <ul class="lista-invitados clearfix">
    <li>
      <div class="invitado">
        <img src="img/invitado1.jpg">
        <p>Rafael Bautista</p>
      </div>
    </li>
    <li>
      <div class="invitado">
        <img src="img/invitado2.jpg">
        <p>Diana Herrera</p>
      </div>
    </li>
    <li>
      <div class="invitado">
        <img src="img/invitado3.jpg">
        <p>Mario Sanchez</p>
      </div>
    </li>
    <li>
      <div class="invitado">
        <img src="img/invitado4.jpg">
        <p>Daniela Rivera</p>
      </div>
    </li>
    <li>
      <div class="invitado">
        <img src="img/invitado5.jpg">
        <p>Harold Garcia</p>
      </div>
    </li>
    <li>
      <div class="invitado">
        <img src="img/invitado6.jpg">
        <p>Paola Sanchez</p>
      </div>
    </li>
  </ul>
</section>

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento clearfix">
      <li>
        <p class="numero"></p>Invitados
      </li>
      <li>
        <p class="numero"></p>Talleres
      </li>
      <li>
        <p class="numero"></p>Dias
      </li>
      <li>
        <p class="numero"></p>Conferencias
      </li>
    </ul>
  </div>
</div>

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <div class="lista_precios clearfix">
      <div class="tabla_precio">
        <h3>Pase por día</h3>
        <p class="numero">$30.000</p>
        <ul>
          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
          <li><i class="fas fa-check"></i>Todas las conferencias</li>
          <li><i class="fas fa-check"></i>Todos los talleres</li>
        </ul>
        <a href="#" class="button hollow">Comprar</a>
      </div>

      <div class="tabla_precio">
        <h3>Todos los Días</h3>
        <p class="numero">$50.000</p>
        <ul>
          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
          <li><i class="fas fa-check"></i>Todas las conferencias</li>
          <li><i class="fas fa-check"></i>Todos los talleres</li>
        </ul>
        <a href="#" class="button">Comprar</a>
      </div>

      <div class="tabla_precio">
        <h3>Pase por 2 días</h3>
        <p class="numero">$45.000</p>
        <ul>
          <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
          <li><i class="fas fa-check"></i>Todas las conferencias</li>
          <li><i class="fas fa-check"></i>Todos los talleres</li>
        </ul>
        <a href="#" class="button hollow">Comprar</a>
      </div>
    </div>
  </div>
</section> <!-- precios-seccion -->

<div id="mapa" class="mapa"></div>

<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor clearfix">
    <div class="testimonial">
      <blockquote>
        <i class="fas fa-quote-left"></i>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos sequi soluta amet laboriosam enim
          quidem
          dignissimos nulla quia voluptates esse.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Carlos Prieto Cifuentes <span>Diseñador en @SmartTv</span> </cite>
        </footer>
      </blockquote>
    </div> <!-- testimonial -->
    <div class="testimonial">
      <blockquote>
        <i class="fas fa-quote-left"></i>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos sequi soluta amet laboriosam enim
          quidem
          dignissimos nulla quia voluptates esse.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Carlos Prieto Cifuentes <span>Diseñador en @SmartTv</span> </cite>
        </footer>
      </blockquote>
    </div> <!-- testimonial -->
    <div class="testimonial">
      <blockquote>
        <i class="fas fa-quote-left"></i>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos sequi soluta amet laboriosam enim
          quidem
          dignissimos nulla quia voluptates esse.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="imagen testimonial">
          <cite>Carlos Prieto Cifuentes <span>Diseñador en @SmartTv</span> </cite>
        </footer>
      </blockquote>
    </div> <!-- testimonial -->
  </div>
</section>

<div class="newsletter parallax">
  <div class="contenido contenedor">.
    <p>regístrate al newsletter</p>
    <h3>webcam-site</h3>
    <a href="" class="button transparente">Registro</a>
  </div> <!-- contenido -->
</div> <!-- newsletter -->

<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li>
        <p id="dias" class="numero minutes"></p>Días
      </li>
      <li>
        <p id="horas" class="numero minutes"></p>Horas
      </li>
      <li>
        <p id="minutos" class="numero minutes"></p>Minutos
      </li>
      <li>
        <p id="segundos" class="numero minutes"></p>Segundos
      </li>
    </ul>
  </div>
</section> <!-- seccion -->
<?php include_once "includes/templates/footer.php"; ?>