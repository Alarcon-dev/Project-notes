<section class="login">
    <?php if (!isset($_SESSION['user'])) : ?>
        <h2>iniciar sesión</h2>
    <?php endif; ?>

    <?php if (isset($_SESSION['user'])) : ?>
       <?php header("Location: ".base_url."Note/myNotes")?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="rojo">
            <?= $_SESSION['error'] ?>
        </div>
        <?php Helpers::unsetSession("error") ?>
    <?php endif; ?>
    <div class="login_form">
        <?php if(!isset($_SESSION['user'])): ?>
            <form action="<?= base_url ?>User/loginUser" method="post">
                <label for="email">Correo: </label>
                <input type="email" name="email">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="">

                <input type="submit" value="Iniciar">
            </form>
        <?php endif; ?>
    </div>
</section>