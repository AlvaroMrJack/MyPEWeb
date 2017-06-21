<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Titulo</title>

    <link href="<?= base_url('resources/min/plugin-min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?= base_url('resources/min/custom-min.css') ?>" type="text/css" rel="stylesheet" >
    <link href="<?= base_url('resources/js/pnotify.custom.min.css') ?>" type="text/css" rel="stylesheet" >
    <link href="<?= base_url('resources/css/style.css') ?>" type="text/css" rel="stylesheet" >
</head>

<body id="top" class="scrollspy">

<!--  Pre Loader  -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!-- Navigation -->
 <div class="navbar-fixed">
  <!--  Dropdown Structure  -->

  <ul id='' class=''>
    <li><a class="dropdown-button {{ navbarColor }}" style="color: #{{ colorNavbar }};" data-activates="secondDRP1">Categorias</a></li>
  </ul>

  <ul id='dropdown1' class='dropdown-content {{ navbarColor }}'>
  <?php foreach ($categoryParent as $key): ?>
    <li><a class="truncate {{ navbarColor }}" style="color: #{{ colorNavbar }};" style="color: #{{ colorNavbar }};"><?=$key->get('cat_name')?></a></li>
      
<?php foreach ($subCat as $key2):?>

      <ul id='secondDRP1' class='dropdown-content secondDropDown'>
<?php if ($key2->get('cat_parent')==$key->get('cat_id')): ?>
    
    <li><a href="<?=site_url('/Frontend/categoria/'.$key2->get('cat_id'))?>" style="color: #{{ colorNavbar }};"><?=$key2->get('cat_name')?></a></li>

<?php endif ?>
  </ul>
    
<?php endforeach ?>

  <?php endforeach ?>
  </ul>


  <ul id='secondDRP2' class='dropdown-content secondDropDown'>
    <li><a class="truncate" href="#!" style="color: #{{ colorNavbar }};">drop 1</a></li>
    <li><a class="truncate" href="#!" style="color: #{{ colorNavbar }};">drop 2</a></li>
    <li><a class="truncate" href="#!" style="color: #{{ colorNavbar }};">drop 3</a></li>
  </ul>

    <nav id="nav_f" class="{{ navbarColor }}" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="<?= base_url(); ?>" id="logo-container" class="brand-logo" style="color: #{{ colorLogo }};">{{ logo|title }}</a>
                <ul class="right hide-on-med-and-down">
                    {% for navbar in categories_navbar %}
                    <li><a href="#{{ navbar }}" style="color: #{{ colorNavbar }};">{{ navbar|title }}</a></li>
                    {% endfor %}
                    <li>
                        <a class='dropdown-button' href='#' data-activates='dropdown1' style="color: #{{ colorNavbar }};">Categorias</a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    {% for navbar in categories_navbar %}
                    <li><a href="#{{ navbar }}">{{ navbar|title }}</a></li>
                    {% endfor %}
                    <li>
                        <a class='dropdown-button' href='#' data-activates='dropdown2'>Drop Me!</a>
                    </li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!-- Hero -->
<div class="section no-pad-bot" id="index-banner" style="background: #{{ indexBanner }};">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Nombre empresa</span> 
           <span class="cd-words-wrapper waiting">
                <b class="is-visible">palabra 1</b>
                <b>palabra 2</b>
                <b>palabra 3</b>
            </span> 
        </h1>
    </div>
</div>
[
<!-- inicio and service -->
<div id="inicio" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eos suscipit laudantium incidunt blanditiis, ea est vitae tenetur natus laboriosam, amet labore molestiae debitis nam mollitia. Magni cum, nisi recusandae!
                </h2>
            </div>
            <div  class="col s12 m4 l4 hoverable">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Misión</h5><!--mision,vision,objetivo-->
                    <p class="light center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nisi, nulla magni, accusamus beatae molestiae atque delectus autem ipsa sequi. Sapiente deserunt beatae asperiores totam nulla iure facilis pariatur numquam.</p>
                </div>
            </div>
            <div  class="col s12 m4 l4 hoverable">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Visión</h5><!--mision,vision,objetivo-->
                    <p class="light center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut perferendis iste eius perspiciatis unde maxime fugiat itaque, nisi iusto cumque. Consectetur amet natus dolor saepe dolores, inventore laborum libero animi.</p>
                </div>
            </div>
            <div  class="col s12 m4 l4 hoverable">
                <div class="center promo promo-example">
                    <i class="mdi-hardware-desktop-windows"></i>
                    <h5 class="promo-caption">Objetivo</h5><!--mision,vision,objetivo-->
                    <p class="light center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam illum aspernatur veritatis, in omnis eligendi consequatur, recusandae praesentium eum placeat eius, deleniti suscipit debitis voluptatibus dolorum repellendus libero harum vitae.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- productos -->
<div class="section scrollspy" id="productos">
    <div class="container">
        <h2 class="header text_b">Productos </h2>
        <div class="row">
        <?php if ($product!=false): ?>
        <?php foreach ($product as $key0): ?>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                    
                        <img class="activator" src="<?= base_url('resources/img/'.$multimedia[$key0->get('pro_id')]->get('mul_route'));?>">
                    
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $key0->get('pro_name') ?> <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a>Precio: $ <?= $key0->get('pro_price') ?></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Descripción: <i class="mdi-navigation-close right"></i></span>
                        <p><?= $key0->get('pro_description') ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
            <div class="col s12 m4 l4">
                <div class="card">

                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">No hay productos en esta categoria<i class="mdi-navigation-more-vert right"></i></span>
                    </div>
                </div>
            </div>

        <?php endif ?>
        </div>
    </div>
</div>

<!-- Team -->
<div class="section scrollspy" id="team">
    <div class="container">
        <h2 class="header text_b"> Nuestro equipo </h2>
        <div class="row">
            <?php foreach ($equipo as $key): ?>
            <div id="perfilFalsh" class="col s12 m4">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="<?= base_url('resources/img/'.$key->get('team_foto'))?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $key->get('team_nom') ?> <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><?= $key->get('team_cargo') ?></a></em></small></span>
                        <p>
                            <?= $key->get('team_desc') ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<footer id="contacto" class="page-footer {{ footer_color }} scrollspy">
    <div class="container">  
        <div class="row">
            <div class="col l4 s12">
                <h5 class="white-text">Redes sociales:</h5>
                <ul>
                <?php foreach ($redes as $key): ?>
                    <li>
                        <a class="white-text" href="https://<?= $key->get('red_url') ?>">
                            <i class="small fa <?= $key->get('red_ico') ?> white-text"></i>
                            <?= $key->get('red_nom') ?>
                        </a>
                    </li>
                <?php endforeach ?>
                </ul>
                <h5 class="white-text">Contacto:</h5>
                <ul>
                    <li>
                        <span style="color: #fff;">+569 12345678</span>
                    </li>
                </ul>
            </div>
            <div class="col l8 s12">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="mdi-action-account-circle prefix white-text"></i>
                        <input id="form_name" name="name" type="text" class="validate white-text" required >
                        <label for="icon_prefix" class="white-text">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="mdi-communication-email prefix white-text"></i>
                        <input required id="form_email" name="email" type="email" class="validate white-text">
                        <label for="icon_email" class="white-text">Correo electrónico</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="mdi-editor-mode-edit prefix white-text"></i>
                        <textarea required id="msg_text" name="message" class="materialize-textarea white-text"></textarea>
                        <label for="icon_prefix2" class="white-text">Mensaje</label>
                    </div>
                    <div class="col offset-s7 s5">
                        <button id="sendMail" class="btn waves-effect waves-light red darken-1">Enviar
                            <i class="mdi-content-send right white-text"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright {{ footer_color_end }}">
        <div class="container">
            Creado por Clínica MyPE Inacap Renca <a class="white-text" href="http://www.inacap.cl"></a>. Gracias a  <a class="white-text" href="http://materializecss.com/">materializecss</a>
        </div>
    </div>
</footer>
<!--  Scripts-->
<script src="<?= base_url('resources/min/plugin-min.js') ?>"></script>
<script src="<?= base_url('resources/min/custom-min.js') ?>"></script>
<script src="<?= base_url('resources/js/pnotify.custom.min.js') ?>"></script>
<script type="text/javascript" charset="utf-8">
    $( "#perfilFalsh" ).click(function() {
        pNotify = new PNotify({
            title: 'Flash',
            text: 'Él es flash',
            type: 'error',
            hide: false,
            icon: "fa fa-bolt"
        });
        pNotify.open();
    });

    $(document).ready(function() {
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: true,
            hover: true,
            gutter: 0,
            belowOrigin: true,
            alignment: 'left'
            });
    });


    $( "#sendMail" ).click(function() {

        var name = $("#form_name").val();
        var email = $("#form_email").val();
        var message = $("#msg_text").val();
        alert(name);

        $.ajax({
            method: "POST",
            url: "<?=site_url('/Frontend/sendMail')?>",
            data: {"namePost": name, "email": email, "message": message},
            type: 'json',
            success: function(response){
                    alert(response.msj);
                switch(response.msj) {
                    case 0:
                        pNotifyMail = new PNotify({
                            title: 'Error',
                            text: 'Su mensaje no fue enviado correctamente, intente nuevamente.',
                            type: 'error',
                            hide: false,
                            icon: "fa fa-error"
                        });
                        pNotifyMail.open();
                        break;
                    case 1:
                        pNotifyMail = new PNotify({
                            title: 'Exito !',
                            text: 'Su mensaje fue enviado correctamente!.',
                            type: 'success',
                            hide: false,
                            icon: "fa fa-error"
                        });
                        pNotifyMail.open();
                        break;
                }
            }
        });
    });
    </script>
</html>