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
                    Stock: <strong><?php echo $coche['stock']; ?></strong> u.
                </p>

                <?php if($coche['destacado']): ?>
                    <span class="badge-vip"><i class="fa-solid fa-star"></i> VIP</span>
                <?php endif; ?>
                
                <button class="btn-detalles">Ver Ficha</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>