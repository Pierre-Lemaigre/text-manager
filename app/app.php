<?php include 'head.php'; ?>

<body>
  <div class="row">
    <div class="col col-sm-5">
      <div class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Text command panel</h2>
        </div>
        <?php include 'vars.php'; ?>
        <?php include 'analysis.php'; ?>
        <div class="panel-body">
          <form action="app.php" method="post">
            <h2 class="panel-title">Get Text</h2>
            <input type="text" placeholder="Enter url of the text" name="url-text" value="<?= $urlText; ?>" /><br>
            <button type="submit" name="action" value="fetch" class="button-primary align-center">Fetch text</button>
            <h2 class="panel-title">Find Keywords</h2>
            <input type="text" placeholder="Enter keywords" name="search" value="<?= $search; ?>" /><br>
            <button type="submit" name="action" value="search" class="button-primary align-center">Search Keyword</button>
          </form>
        </div>
      </div>
        <?php if ($keywords) : ?>
          <div class="stepper sticker">
          <h2>keywords</h2>
            <?php
            foreach ($positions as $word => $offsets) {
              echo '<div class="step">';
              echo '<p class="step-number">' . count($offsets) . '</p>';
              echo '<p class="step-title">Keyword : ' . $word . '</p>';
              foreach ($offsets as $pos => $offset) {
                $number = $pos + 1;
                echo '<a href="#' . $pos . '-' . $word . '" class="button-primary-outlined">' . $number . '</a> ';
              }
              echo '</div>';
            } ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="col col-sm-7">
      <pre>
        <code>
          <?= $text; ?>
        </code>
      </pre>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>