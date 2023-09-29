<div class="notes-user">
    <?php if(isset($notas) && $notas->num_rows >= 1): ?>
        <h2>Notas</h2> 
            <?php while($not = $notas->fetch_object()):?>
                <article class="main-notes">
                
                        <h3><?=$not->titulo?></h3> 
                        <span><?=$not->fecha?></span>
                        <p>
                            <?=$not->descripcion?>
                        </p>
                        <div class="options-notes">
                            <a class="option1" href="<?=base_url?>Note/createNote?id=<?=$not->id?>">Editar</a>
                            <a class="option2" href="<?=base_url?>Note/delete?id=<?=$not->id?>">Eiminar</a>
                        </div>
                </article>
                
            <?php endwhile; ?>
    <?php else: ?>
        <h2>No hay notas agregadas</h2>
    <?php endif; ?>
</div>