<div id="content">

        <?php if(isset($_SESSION['user'])): ?>
            <?php $url = base_url."Note/createNote"?>
            <?php else: ?>
                <?php $url = base_url."User/register" ?>
        <?php endif ?>
                
        <a href="<?=$url?>">!! Empieza a crear tus notas ¡¡</a>
        <div class="imagen-content">
            <img src="assets//img/descarga.png" alt="">
        </div>
</div>
<div class="clearfix"></div>
