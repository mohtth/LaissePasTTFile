<body>

    <div class="container">
        <div class="row">
            <?php
                $dir = 'upload/';
                $files = scandir($dir,1);
                $max = count($files);
                for($i=0;$i<$max-2;$i++){
                   echo'
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="'.$dir.$files[$i].'" alt="Card image cap"/>
                    <div class="card-body">
                        <h5 class="card-title">'.$files[$i].'</h5>
                        <a href="delete.php?id='.$files[$i].'" class="btn btn-danger btn-block">Delete</a>
                    </div>
                </div>';
                }
            ?>
        </div>
    </div>

</body>

