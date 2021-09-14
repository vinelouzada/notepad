<?php include __DIR__ . '/../header-html.php'; include __DIR__.'/../menu-html.php';?>

 <section class="notes">
     <div class="container-new">
         <h1 class="titleg">Add New Note</h1>
        <form action="/new-note" class="container-form" method="post">
            <label for="title">Title</label>
            <input name="title" type="text" id="title" class="title-input" maxlength="50">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" maxlength="300"></textarea>
            <div>
                <button type="submit" class="button edit">Salvar</button>
            </div>
        </form>
     </div>
    <script type="text/javascript" src="assets/js/index.js"></script>
</section>

<?php include __DIR__.'/../footer-html.php'; ?>