<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
  </head>
  <body class="container">
    <h2>Traduction page: <?= $pagename ?></h2>
    <?php echo $this->render('admin_views/breadcrumb.php',NULL,get_defined_vars(),0); ?>
    <a class="" href="<?= $subrootpath ?>/<?= $lg ?>/<?= $pagename ?>">Lien vers la page <?= $pagename ?> </a>
    <!-- onglets -->

    <ul class="nav nav-tabs">
      <li role="presentation" class="<?= $lg == 'fr' ? 'active': '' ?>"><a href="<?= $subrootpath ?>/admin/tradpage/<?= $pagename ?>/fr">FR</a></li>
      <li role="presentation" class="<?= $lg == 'nl' ? 'active': '' ?>"><a href="<?= $subrootpath ?>/admin/tradpage/<?= $pagename ?>/nl">NL</a></li>
      <li role="presentation" class="<?= $lg == 'en' ? 'active': '' ?>"><a href="<?= $subrootpath ?>/admin/tradpage/<?= $pagename ?>/en">EN</a></li>
    </ul>
    <div class="container">
    <form class="" action="http://localhost/4wing-website/admin/page_trad_changes/<?= $pagename ?>/<?= $lg ?>" method="post">

      <?php $ctr=0; foreach (($all_trad?:[]) as $trad): $ctr++; ?>
          <!-- <input type="text" value="<?= $trad['string_origin'] ?>" disabled>
          <input type="text" value="<?= $trad['string_trad'] ?>" name="<?= $trad['id'] ?>" > -->
          <label for="<?= $ctr ?>" ><?= $trad['string_origin'] ?></label>
          <textarea class="form-control" id="<?= $ctr ?>"  name="<?= $trad['id'] ?>"><?= $this->raw($trad['string_trad']) ?></textarea>
          <br/>
      <?php endforeach; ?>
      <input type="submit" class="btn btn-default">
    </form>
    </div>

    <script>
      $('textarea').summernote({
        toolbar: [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']]
                ]
      });
    </script>
  </body>
</html>
