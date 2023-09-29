<div class="note-gestion">
    <h2>ver notas por categorias</h2>
        <section class="list">
            <?php $categorias = Helpers::showAllCategories()?>
            <?php if($categorias->num_rows >= 1):?>
                <?php while($cat = $categorias->fetch_object()):?>
                    <a  class="bycategory" href="<?=base_url?>Note/getNoteByCAtegoryId?id<?=$cat->id?>"><?=$cat->nombre?></a>
                <?php endwhile; ?>
                <?php else: ?>
                <h2>NO hay categorias Categorias en la lista</h2>
            <?php endif ?>
        </section>
</div>