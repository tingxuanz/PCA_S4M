    <?php
      echo '<h2>PCA Demos</h2>';

      $dir = __DIR__ . '/data/'; //get the directory that we want to scan
      $datasetNames = scandir($dir);
      $length = count($datasetNames);

      function checkFiles($dataSetName) {
        //following are the file names that we expect
        $metadataFile = $dataSetName . '_metadata.tsv';
        $pcaFile = $dataSetName . '_pca.tsv';
        $screetableFile = $dataSetName . '_screetable.tsv';

        //directory for each dataset
        $directory = __DIR__ . '/data/' . $dataSetName . '/';
        $pass = false;

        if (is_dir($directory)) {
          $files = scandir($directory);

          //The expected files must all exist, otherwise a link won't be created
          if (in_array($metadataFile, $files, true)) {
            if (in_array($pcaFile, $files, true)) {
              if (in_array($screetableFile, $files, true)) {
                $pass = true;
              }
            }
          }
        }

        return $pass;

      }

      for ($i=0; $i < $length ; $i++) {
        if ($datasetNames[$i] !== '.' && $datasetNames[$i] !== '..') { //don't need link for directory . and ..
          if (checkFiles($datasetNames[$i])) {
            echo '<a target="_blank" href="../graph.php?ds_id=' . $datasetNames[$i] . '">' . $datasetNames[$i] . '</a>';
            echo '<br>';
          }
        }
      }

      echo '<h2>Hierarchical Cluster Demos</h2>';
      echo '<a target="_blank" href="../6105.html">6105</a>';
      echo '<br>';
      echo '<a target="_blank" href="../6108.html">6108 compressed</a>';
    ?>
