<div class="create_note">
    <h2>Crea una nota</h2>

    <?php if (isset($_SESSION['succes'])) : ?>
            <div class="verde">
                <?= $_SESSION['succes'] ?>
            </div>
        <?php Helpers::unsetSession("succes") ?>
        <?php header("Refresh: 5; url=" . base_url) ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="rojo">
            <?= $_SESSION['error'] ?>
        </div>
        <?php Helpers::unsetSession("error") ?>
    <?php endif; ?>

    <form action="<?=base_url?>Note/saveNotes" method="post">
        <label for="categoria">Categoría</label>
        <?php $categories = Helpers::showAllCategories()?>

        <select name="categoria" id="">
            <?php while($cat = $categories->fetch_object()): ?>
            <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
            <?php endwhile; ?>
        </select>
        <label for="titulo">Título: </label>
        <input type="text" name="titulo">

        <label for="decripcion">Decripcion</label>
        <textarea name="descripcion"></textarea>

        <input type="submit" value="Crear">
    </form>
</div>