<?php include __DIR__ . '/../header-html.php'; include __DIR__.'/../menu-html.php';?>
    <section class = "notes">
        <?php ?>
        <div class="add-note">
            <a href="/new-note">
                <button class="button  add">Nova nota</button>
            </a>
            <a href="/logout">
                <button class="button add">Logout</button>
            </a>
        </div>

        <ul class="container-notes">
            <?php if (isset($_SESSION['type'])){ ?>
                    <div class="message notes-box <?= $_SESSION['type']; ?>">
                        <?= $_SESSION['message']; ?>
                    </div>
            <?php } unset($_SESSION['type']);
            foreach($result as $notes) {
                ?>
                <li class="container-note">
                    <h3><?= $notes['title']; ?></h3>
                    <div>
                        <button class="button edit">Editar</button>
                        <a href="delete?id=<?= $notes['id']; ?>">
                            <button class="button delete">Excluir</button>
                        </a>
                    </div>
                </li>
            <?php } ?>
        </ul>


    </section>
<?php include __DIR__.'/../footer-html.php';?>