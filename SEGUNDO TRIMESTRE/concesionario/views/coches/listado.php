<h1><i class="fa-solid fa-car"></i> Inventario de Vehículos</h1>

<div class="grid-coches">
    <?php foreach ($listaCoches as $coche): ?>
        <div class="card-coche <?php echo ($coche['destacado']) ? 'destacado' : ''; ?>">
            <div class="icon-placeholder">
                <i class="fa-solid fa-car"></i>
            </div>
            
            <div class="card-body">
                <h3><?php echo $coche['marca'] . ' ' . $coche['modelo']; ?></h3>
                
                <p class="precio">
                    <?php echo Util::moneda($coche['precio']); ?>
                </p>
                
                <p class="stock">
                    Stock: <strong style="<?php echo ($coche['stock'] < 3) ? 'color: red;' : ''; ?>">
                        <?php echo $coche['stock']; ?>
                    </strong> u.
                    <?php if($coche['stock'] < 3): ?>
                        <i class="fa-solid fa-triangle-exclamation" style="color: red;"></i> ⚠️
                    <?php endif; ?>
                </p>

                <?php if($coche['destacado']): ?>
                    <span class="badge-vip"><i class="fa-solid fa-star"></i> VIP</span>
                <?php endif; ?>
                
                <a href="index.php?page=ficha_coche&id=<?php echo $coche['id']; ?>" class="btn-detalles">Ver Ficha</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>