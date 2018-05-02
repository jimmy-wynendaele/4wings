<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des projets</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body class="container">
  <h2>
    Projets
    <a type="button" href="new" class="btn btn-success">Nouveau projet</a>
  </h2>
  <include href="admin_views/breadcrumb.php"/>

    <div class="list-group">
      <repeat group="{{ @all_projects }}" value="{{ @project }}">
          <a class="list-group-item" href="/4wing-website/admin/projet/{{ @project.id}}/trad/fr"> {{ @project.title}} </a>
      </repeat>
    </div>
  </body>
</html>
