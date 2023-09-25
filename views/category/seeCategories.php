<div class="see-categories">
    <?php if (isset($categories) && $categories->num_rows >= 1) : ?>
        <h2>Lista de categorias </h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
            <?php while ($cat = $categories->fetch_object()) : ?>
                <tr>
                    <td><?= $cat->id ?></td>
                    <td><?= $cat->nombre ?></td>
                    <td><?= $cat->fecha ?></td>
                    <td>
                        <a class="category-crud1" href="<?=base_url?>Category/delete?id=<?= $cat->id ?>">Eliminar</a>
                        <a class="category-crud2" href="<?=base_url?>Category/createCategory?id=<?= $cat->id ?>">Editar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </th>
        </table>
    <?php else : ?>
        <h2>No hay categorías para mostrar </h2>
    <?php endif; ?>
</div>