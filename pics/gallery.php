<html>
  <head>
    <style>
      .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }

  .gallery img {
    width: 300px;
    height: 200px;
    margin: 10px;
    object-fit: cover;
  }

  .caption {
    text-align: center;
    font-size: 18px;
    margin-top: 10px;
  }
</style>
</head>
  <body>
    <h1>The gallery</h1>
    <div class="gallery">
      <?php
        $dir = ".";
        $dh  = opendir($dir);
        while (false !== ($filename = readdir($dh))) {
            $files[] = $filename;
        }
        sort($files);
        foreach ($files as $file) {
            if (preg_match('/^.*\.(jpg|jpeg|png|gif)$/i', $file)) {
                echo "<div><img src='$file'><br><div class='caption'>$file</div></div>";
            }
        }
      ?>
    </div>
  </body>
</html>