<div class="create_note">
    <?php if(isset($_GET['id'])):?>
        <h2>Edita tu nota</h2>
                <?php $id_note = $_GET['id']?>
                <?php $url = base_url."Note/saveNotes?id=".$id_note ?>
            <?php else: ?>
        <h2>Crea una nota</h2>
            <?php $url = base_url."Note/saveNotes" ?>
    <?php endif?>

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

    <form action="<?=$url?>" method="post">
        <label for="categoria">Categoría</label>
        <?php $categories = Helpers::showAllCategories()?>
        <select name="categoria" id="">
             <?php  $not = Helpers::getNotasById($id_note);  ?>
            <?php while($cat = $categories->fetch_object()): ?>
            <option value="<?=$cat->id?>" <?=isset($not) && is_object($not) && $not->category_id == $cat->id ? "selected" : ''?>><?=$cat->nombre?></option>
            <?php endwhile; ?>
        </select>
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" value="<?=isset($not) && is_object($not) ? $not->titulo : ''?>">

        <label for="decripcion">Decripcion</label>
        <textarea name="descripcion"><?=isset($not) && is_object($not) ? $not->descripcion : ''?></textarea>

        <?php if(isset($_GET['id'])): ?>
               <input type="submit" value="Editar">
           <?php else: ?> 
                <input type="submit" value="Crear">
        <?php endif?>
    </form>
</div>