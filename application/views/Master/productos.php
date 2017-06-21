<?php foreach ($config as $catego): ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#">
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



    <ul id='dropdown1' class='dropdown-content'>
        <?php foreach ($categoryParent as $key): ?>

        <li>
            <a class="form_name" style="font-size: 14px;" href="<?=site_url('/Frontend/categoria/'.$key->get('cat_id'))?>"><?=$key->get('cat_name')?></a>
        </li>
          
        <?php endforeach ?>
    </ul>

    <?php foreach ($subCat as $key2):?>

    <ul id='secondDRP1' class='dropdown-content'>
        <?php if ($key2->get('cat_parent')==$key->get('cat_id')): ?>
            
        <li>
            <a style="font-size: 14px;" href="<?=site_url('/Frontend/categoria/'.$key2->get('cat_id'))?>">
                <?=$key2->get('cat_name')?>
            </a>
        </li>

        <?php endif ?>
    </ul>
        
    <?php endforeach ?>





    <ul id='dropdown2' class='dropdown-content'>
        <?php foreach ($categoryParent as $key): ?>

        <li>
            <a style="font-size: 14px;" href="<?=site_url('/Frontend/categoria/'.$key->get('cat_id'))?>" class="dropdown-button" data-activates='secondDRP2'><?=$key->get('cat_name')?></a>
        </li>
          
        <?php endforeach ?>
    </ul>

    <?php foreach ($subCat as $key2):?>

    <ul id='secondDRP2' class='dropdown-content'>
        <?php if ($key2->get('cat_parent')==$key->get('cat_id')): ?>
            
        <li>
            <a style="font-size: 14px;" href="<?=site_url('/Frontend/categoria/'.$key2->get('cat_id'))?>">
                <?=$key2->get('cat_name')?>
            </a>
        </li>

        <?php endif ?>
    </ul>
        
    <?php endforeach ?>



    <nav id="nav_f" style="background: <?= $catego->get('con_navbar') ?>" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="<?= base_url(); ?>" id="logo-container" class="brand-logo">Empresa</a>

                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#index-banner">Inicio</a>
                    </li>

                    <li>
                        <a class='dropdown-button' href='<?= site_url('fontend/productos') ?>'>Productos</a><!--  data-activates='dropdown1' -->
                    </li>

                    <!-- <li>
                        <a href="#team">Equipo</a>
                    </li>
                    
                    <li>
                        <a href="#contacto">Contacto</a>
                    </li> -->
                </ul>


                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a href="#index-banner">Inicio</a>
                    </li>

                    <li>
                        <a class='dropdown-button' href='<?= site_url('fontend/productos') ?>'>Productos</a>
                    </li>

                    <!-- <li>
                        <a href="#team">Equipo</a>
                    </li>
                    <li>
                        <a href="#contacto">Contacto</a>
                    </li> -->
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!-- Hero -->
<div class="section no-pad-bot scrollspy" id="index-banner" style="background: <?= $catego->get('con_background') ?>">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Empresa</span> 
           <span class="cd-words-wrapper waiting">
                <b class="is-visible">palabra 1</b>
                <b>palabra 2</b>
                <b>palabra 3</b>
            </span> 
        </h1>
    </div>
</div>


<!-- productos -->
<div class="section scrollspy" id="productos">

    
    <div class="container">
    <div class="card">
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
        <?php foreach ($categoryParent as $key): ?>

            <li class="tab">
                <a class="categoriasProductos" id="<?=$key->get('cat_id') ?>" style="font-size: 14px;" href="#test<?=$key->get('cat_id')?>"><?=$key->get('cat_name')?></a>
            </li>
              
        <?php endforeach ?>
          </ul>
        </div>





        <div class="card-content grey lighten-4">
          <div id="test4"> 
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
      </div>
      </div>
</div>




<footer id="contacto" class="page-footer scrollspy" style="background: <?= $catego->get('con_footer') ?>">
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
                        <span style="color: #fff;"><?= $catego->get('con_phonenumber') ?></span>
                    </li>
                </ul>
            </div>
            <!-- <div class="col l8 s12">
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
                        <button style="background: <?= $catego->get('con_navbar') ?>" id="sendMail" class="btn waves-effect">Enviar
                            <i class="mdi-content-send right white-text"></i>
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="footer-copyright" style="background: <?= $catego->get('con_navbar') ?>">
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


    $( ".categoriasProductos" ).click(function() {

        var name = $(this).attr("id");


        $.ajax({
            method: "POST",
            url: "<?=site_url('/Frontend/categoria')?>",
            data: {"catId": name},
            type: 'json',
            success: function(response){
                alert(response.product);
            }
        });
    });
    </script>
</html>
<?php endforeach ?>