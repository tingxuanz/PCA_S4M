    <?php
      echo '<h2>Datasets</h2>';

      $dir = __DIR__ . '/data/'; //get the directory that we want to scan
      $datasetNames = scandir($dir);
      $length = count($datasetNames);

      for ($i=0; $i < $length ; $i++) {
        if ($datasetNames[$i] !== '.' && $datasetNames[$i] !== '..') { //don't need link for directory . and ..

          //following are the file names that we expect
          $metadataFile = $datasetNames[$i] . '_metadata.tsv';
          $pcaFile = $datasetNames[$i] . '_pca.tsv';
          $screetableFile = $datasetNames[$i] . '_screetable.tsv';

          //directory for each dataset
          $directory = __DIR__ . '/data/' . $datasetNames[$i] . '/';

          if (is_dir($directory)) {
            $files = scandir($directory);

            //The expected files must all exist, otherwise a link won't be created
            if (in_array($metadataFile, $files, true)) {
              if (in_array($pcaFile, $files, true)) {
                if (in_array($screetableFile, $files, true)) {
                  echo '<a target="_blank" href="../graph.php?ds_id=' . $datasetNames[$i] . '">' . $datasetNames[$i] . '</a>';
                  echo '<br>';
                }
              }
            }
          }
        }
      }
    ?>
