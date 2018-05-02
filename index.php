<?php
session_start();
include 'variables.php';
include 'model/db_init.php';
include 'model/user.php';
include "model/page.php";
include 'model/project.php';
include 'model/citation.php';
include 'model/db_faq.php';
include 'model/Upload_Image.php';
include 'model/formulaire.php';
include 'model/equipes.php';
include "traduction_function.php";

function traduction() {
  return ["title"=>"The TITLE","message"=>"The mésséidge"];
}
$f3 = require('fatfree/lib/base.php');
$f3->set('ESCAPE',FALSE);
$f3->set("subrootpath",""); //$GLOBALS["subrootpath"]

//$f3->set('UI',"Views/");

$f3->route('GET /',
    function() {
        $template=new Template;


        echo $template->render('partials/header.php');
        echo $template->render('Views/index_lucile.php');
        echo $template->render('partials/footer.php');


    }
);

//Les vraies pages ... justement

$f3->route('GET /@lg/missions',function ($f3,$params) {
//  echo $params['lg'];
  $page_name="missions";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  $template=new Template;
  echo $template->render('Views/missions.php');
});
$f3->route('GET /@lg/valeurs',function ($f3,$params) {
  $page_name="valeurs";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo Template::instance()->render('Views/valeurs.php');
});
$f3->route('GET /@lg/selection_projets',function ($f3,$params) {
  //  echo $params['lg'];
  $page_name="selection_projets";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);

  echo Template::instance()->render('Views/selection_projets.php');
});
$f3->route('GET /@lg/equipes',function($f3, $params) {
  //echo $params['lg']
  //$equipes=displayTitles();
  $page_name="equipes";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);

  $f3->set('equipes',$equipes);
  echo Template::instance()->render('Views/equipes.php');
});
$f3->route('GET /@lg/conseil',function ($f3,$params) {
  //  echo $params['lg'];
  $page_name="conseil";
  $f3->set('page_name',$page_name);
  echo Template::instance()->render('Views/conseil.php');
});
$f3->route('GET /@lg/faq',function ($f3,$params) {
  //  echo $params['lg'];
  $page_name="faq";
  $f3->set('page_name',$page_name);
  $f3->set('paf',get_faq());
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo Template::instance()->render('Views/faq_new.php');
});

$f3->route('GET /@lg/reseaux_partenaires',function ($f3,$params) {
  $page_name="reseaux_partenaires";
  $f3->set('page_name',$page_name);
  //echo hazard_citation($params['lg'],'techEducation');
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo Template::instance()->render('Views/reseaux_partenaires.php');
});

$f3->route('GET /@lg/logement',function ($f3,$params) {
  $page_name="logement";
  $template=new Template;
  //echo hazard_citation($params['lg'],'techEducation');
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  $f3->set("citation",hazard_citation($params['lg'],'logement'));

  $f3->set("projets",Project::get_all_projects_description_lg_cat($params['lg'],"logement"));
  var_dump(Project::get_all_projects_description_lg_cat($params['lg'],"logement"));
  echo $template->render('Views/logementtris.php');
});
$f3->route('GET /@lg/techEducation',function ($f3,$params) {
  $page_name="techEducation";
  $template=new Template;
  //echo hazard_citation($params['lg'],'techEducation');
  $f3->set('page_name',$page_name);
  $f3->set("citation",hazard_citation($params['lg'],'techEducation'));
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo $template->render('Views/tech_education.php');
});
$f3->route('GET /@lg/santeNutrition',function ($f3,$params) {
//  echo $params['lg'];
  $page_name="santeNutrition";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);

  $f3->set("citation",hazard_citation($params['lg'],'sante'));
  echo Template::instance()->render('Views/sante_nutrition.php');
});
$f3->route('GET /@lg/contact',function ($f3,$params) {
  $page_name="contact";
  $f3->set('page_name',$page_name);
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo Template::instance()->render('Views/contact.php');
});
$f3->route('POST /@lg/contact',function ($f3,$params) {
  $page_name="contact";
  $f3->set('page_name',$page_name);
  $f3->set('sent',true);
  traduction_page_header_footer($page_name,$params['lg'],$f3);
  echo Template::instance()->render('Views/contact.php');
});

$f3->route('GET /@lg/projet/logement/@id',function ($f3,$params) {
  $page_name="contact";
  $f3->set('page_name',$page_name);
  $f3->set('sent',true);
  traduction_page_header_footer($page_name,$params['lg'],$f3);

  echo Template::instance()->render('Views/projet_logement.php');
});


include 'routes/admin_routes.php';
include 'routes/projet_routes.php';
include 'routes/user_routes.php';
include 'routes/faq_routes.php';
include 'routes/equipes_routes.php';
//on va bientot voir le bout du tunel !!!

$f3->run();





?>
