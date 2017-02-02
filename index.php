    <?php
      echo '<h2>Datasets</h2>';

      $dir = __DIR__ . '/data/'; //get the directory that we want to scan
      $datasetNames = scandir($dir);
      $length = count($datasetNames);

      for ($i=0; $i < $length ; $i++) {
        if ($datasetNames[$i] !== '.' && $datasetNames[$i] !== '..') { //don't need link for directory . and ..
          echo '<a target="_blank" href="../graph.php?ds_id=' . $datasetNames[$i] . '">' . $datasetNames[$i] . '</a>';
          echo '<br>';
        }
      }
    ?>
