<?php
include 'header.php';

if(isset($_POST['add'])) {
        if(count($_FILES['upload']['name'])>0) {
            for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                    if ($tmpFilePath != "") {
                        $imgFile = $_FILES['upload']['name'][$i];
                        $imgSize = $_FILES['upload']['size'][$i];
                        $uploaddir = 'upload/';
                        $uploadfile = $uploaddir . basename($_FILES['upload']['name'][$i]);
                        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                        $userpic = "image" . rand(1000, 1000000) . "." . $imgExt;
                        if (in_array($imgExt, $valid_extensions)) {
                            if ($imgSize < 1000000) {
                                move_uploaded_file($tmpFilePath, $uploaddir . $userpic);
                            }
                        }
                    }
            }
        }
}

else {
    ?>
    <html>
        <div class="row justify-content-center pt-3">
            <div class="card" style="width: 25rem;">
                <h5 class="card-header">Ajouter un fichier</h5>
                <div class="row justify-content-center pt-3">
                    <div class="col-md-auto">
                        <form action="upload.php" method="post" name="add" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" multiple="multiple" name="upload[]" id="upload"/>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                            </div>
                            <button type="submit" name="add" class="btn btn-success btn-block mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </html>
    <?php
}