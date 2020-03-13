<?php
$titlePage ="Formulaire de contact";
require('env.php');
ob_start();
?>
    <script src="https://cdn.tiny.cloud/1/<?= $TOKEN?>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mymessage',
            height : 500
        });
    </script>
<?php
$script = ob_get_clean();

ob_start();
?>
    <div class="col-lg-12 p-0 mb-3">
        <h4>Formulaire de contact</h4>
    </div>

    <form id="contact-form" name="contact-form" action="index.php?type=user&action=contact" method="POST">
        <div class="row mt-4">
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control" required>
                        <label for="name" class="">Your name</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="email" id="email" name="email" class="form-control" required>
                        <label for="email" class="">Your email</label>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form mb-0">
                    <input type="text" id="subject" name="subject" class="form-control" required>
                    <label for="subject" class="">Subject</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="md-form">
                    <textarea type="text" id="test" name="message" rows="2" class="form-control md-textarea"></textarea>
                    <label for="message">Your message</label>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit">Envoyer le formulaire</button>
            </div>
        </div>
    </form>

<?php
$content = ob_get_clean();

require('template.php');
