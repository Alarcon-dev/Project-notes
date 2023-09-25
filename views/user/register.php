<section class="register">
    <h2>Regístro de usuario</h2>

    <?php if (isset($_SESSION['succes'])) : ?>
        <div class="verde">
            <?= $_SESSION['succes'] ?>
        </div>
        <?php Helpers::unsetSession("succes") ?>
        <?php header("Refresh: 5; url="."User/login") ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="rojo">
            <?= $_SESSION['error'] ?>
        </div>
        <?php Helpers::unsetSession("error") ?>
    <?php endif; ?>

    <div class="register-form">
        <form action="<?= base_url ?>User/validateRegister" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="">

            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" id="">

            <label for="email">Correo: </label>
            <input type="email" name="email" id="">

            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="">

            <input type="submit" value="Registrar">
        </form>
    </div>

</section>