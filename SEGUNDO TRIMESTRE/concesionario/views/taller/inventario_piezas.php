<h2>Inventario de Recambios</h2>
<table class="tabla-gestion">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Ubicación</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaPiezas as $pieza): ?>
        <tr>
            <td><?php echo $pieza['nombre']; ?></td>
            <td><?php echo $pieza['referencia']; ?></td>
            <td><?php echo $pieza['ubicacion']; ?></td>
            <td style="<?php echo ($pieza['stock'] < 3) ? 'color: red; font-weight: bold;' : ''; ?>">
                <?php echo $pieza['stock']; ?>
                <?php if ($pieza['stock'] < 3): ?>
                    <i class="fa-solid fa-triangle-exclamation"></i> ⚠️
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>