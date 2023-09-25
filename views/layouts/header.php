<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <title>Notas</title>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./assets/img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
        <title>Notas</title>
    </head>
<body>
    <div id="contenedor">
        <header class="header">
            <h1>Mis notas</h1>
            <div class="logo">
                <img src="<?= base_url ?>assets/img/logo.png" alt="" srcset="">
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="<?= base_url ?>">Inicio</a></li>
                        <?php if(!isset($_SESSION['user'])):?>
                            <li><a href="<?= base_url ?>User/register">Registrar</a></li>
                            <li><a href="<?= base_url ?>User/login">Login</a></li>
                        <?php endif; ?>
                    <li>
                        <a href=""> <?=isset($_SESSION['user']) ? $_SESSION['user']->nombre : "notas"?></a>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <ul>
                                <li><a href="<?=base_url?>Note/myNotes">Mis notas</a></li>
                                <li><a href="<?=base_url?>Category/index">gestion</a></li>
                                <li><a href="<?=base_url?>Note/createNote">Crear</a></li>
                                <li><a href="<?=base_url?>User/logout">Logout</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="clearfix"></div>