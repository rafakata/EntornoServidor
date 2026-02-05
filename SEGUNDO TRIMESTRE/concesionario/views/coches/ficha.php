<?php if ($coche): ?>
    <div class="ficha-vehiculo">
        <h1><?php echo $coche['marca'] . " " . $coche['modelo']; ?></h1>
        <div class="detalle-container">
            <div class="foto-coche">
                <img src="assets/img/<?php echo $coche['imagen']; ?>" alt="Foto Coche">
            </div>
            <div class="info-tecnica">
                <p class="precio-ficha"><?php echo Util::moneda($coche['precio']); ?></p>
                <p><strong>Estado:</strong> <?php echo ($coche['vendido']) ? 'Vendido' : 'Disponible'; ?></p>
                <p><strong>Unidades en almacén:</strong> <?php echo $coche['stock']; ?></p>
                
                <?php if (!$coche['vendido']): ?>
                    <form action="vender_coche.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $coche['id']; ?>">
                        <button type="submit" class="btn-comprar">Marcar como Vendido</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <a href="index.php?page=listado_coches" class="btn-volver">Volver al inventario</a>
    </div>
<?php else: ?>
    <p>El vehículo solicitado no existe.</p>
<?php endif; ?>