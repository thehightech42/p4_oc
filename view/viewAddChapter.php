<?php
ob_start();
?>
    <script src="https://cdn.tiny.cloud/1/xan0xqgn36elll0x9xwtm3pzch1knjm4m9byc6zt3iu7ogzn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
<?php
$script = ob_get_clean();
$titlePage = "Ajout d'un chapitre";

ob_start();
?>
<h4>Bienvenue sur la page d'ajout de chapitre</h4>

<p>Pour ajouter un chapitre, il suffit :</p>
<ol>
    <li>Donner un nom au chapitre.</li>
    <li>Donner une numéro au chapitre.</li>
    <li>Remplir le contenu du chapitre dans l'interface prevu à cette effet.</li>
</ol>

    <form action="indexPost.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Nom du Chapitre :</label>
        <input type="text" class="form-control" id="chapterName" name="chapter_name" placeholder="Nom du Chapitre" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Numéro du Chapitre :</label>
        <input type="number" class="form-control" id="chapterNumber" name="chapter_number" required min="1" placeholder="3">
      </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Contenu :</label>
            <textarea class="form-control" id="mytextarea" name="chapter_content" rows="10">
            </textarea>
        </div>

      <button type="submit" class="btn btn-primary">Publier</button>
    </form>

<?php
$content = ob_get_clean();

require('template.php');