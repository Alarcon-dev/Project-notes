<div class="create-category">

    <?php if(isset($_GET['id'])) :?>
        <h2>Editar Categoria</h2>
        <?php $id = $_GET['id']?>
        <?php $cat = Helpers::getCategoryById($id) ?>
        <?php $direction = base_url."Category/saveCategory?id=".$id ?>
        <?php else: ?>
        <h2>Crear Categoría</h2>
        <?php $direction = base_url."Category/saveCategory" ?>
    <?php endif ?>

        <?php if (isset($_SESSION['succes'])) : ?>
            <div class="verde">
                <?= $_SESSION['succes'] ?>
            </div>
            <?php Helpers::unsetSession("succes") ?>
            <?php header("Refresh: 5; url=" . "User/login") ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="rojo">
                <?= $_SESSION['error'] ?>
            </div>
            <?php Helpers::unsetSession("error") ?>
        <?php endif; ?>

       
        <form action="<?= $direction ?>" method="post">
            <label for="nombre">Nombre: </label>

            <input type="text" name="nombre" value="<?=isset($cat) && is_object($cat) ? $cat->nombre : ''?>">

            

            <?php if(isset($_GET['id'])):?>
                <input class="" type="submit" value="editar">
                <?php else: ?>
                    <input class="" type="submit" value="Crear">
            <?php endif; ?>
            <a class="options" href="<?= base_url ?>Category/showAllCategories">Ver Categorias</a>
        </form>
    
</div>