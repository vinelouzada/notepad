<?php include __DIR__.'/header-html.php'; ?>

<section class="body">
    <div class="container-login">

        <div class="div-form">
            <?php if (isset($_SESSION['type'])){ ?>
                <div class="message <?= $_SESSION['type'];?>">
                    <?= $_SESSION['message']; ?>
                </div>
            <?php } unset($_SESSION['type'])?>
            <h1 class="title-login"><?= $title ?></h1>
            <form name="login" method="post" action="<?= $linkAction ?>">

                <?= $inputName?>

                <div class="input-login">
                   <input class="effect" name="email" type="email" id="email" placeholder="Insert your E-mail" autocomplete="off">
                    <span class="input-border"></span>
                </div>
                <div class="input-login">
                    <input class="effect" name="password" type="password" id="password" placeholder="Insert your Password" autocomplete="off">
                    <span class="input-border"></span>
                </div>
                <button type="submit" class="button add botao-login first"><?= $titleButton1 ?></button>
            </form>
        </div>
        <div class="options">
            <a href="<?= $linkButton2 ?>">
            <button class="button add botao-login"><?= $titleButton2 ?></button>
            </a>
        </div>
    </div>

<?php include __DIR__.'/footer-html.php';