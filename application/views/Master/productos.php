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



<!-- Navigation -->
 <div class="navbar-fixed">
  <!--  Dropdown Structure  -->



    <nav id="nav_f" style="background: <?= $catego->get('con_navbar') ?>" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="<?= base_url(); ?>" id="logo-container" class="brand-logo">Empresa</a>

                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#index-banner">Inicio</a>
                    </li>

                    <li>
                        <a href='<?= site_url('frontend/productos') ?>'>Productos</a><!--  data-activates='dropdown1' -->
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
<div class="section no-pad-bot scrollspy" style="background: <?= $catego->get('con_background') ?>">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Productos</span>
        </h1>
    </div>
</div>


<!-- productos -->
<div class="section scrollspy" id="productos">


    <div class="container">
    <div class="card">
        <div class="card-tabs">
          <div class="container">   
        <div class="input-field col s12">
        <select onchange="location = this.value">
          <option value="" disabled selected>Elija una categoría</option>
          <option value="<?=site_url('frontend/productos')?>">Todos los productos</option>
        <?php foreach ($categoryParent as $key): ?>
          <option value="<?=site_url('frontend/productos/'.$key->get('cat_id'))?>"><?=$key->get('cat_name')?></option>
        <?php endforeach ?>
        </select>
        <label>Productos</label>
      </div>
    </div>
        </div>





        <div class="card-content grey lighten-4">
          <div id="test4"> 
        <div class="row">
    <?php if ($product!=false): ?>
        <?php foreach ($product as $key0): ?>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                    
                        <img class="activator" src="<?= base_url('resources/img/'.$multimedia[$key0->get('pro_id')][0]->get('mul_route'));?>">
                    
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $key0->get('pro_name') ?> <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a>Precio: $ <?= $key0->get('pro_price') ?></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Descripción: <i class="mdi-navigation-close right"></i></span>
                        <p><?=$key0->get('pro_description')?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
            <div class="col-md-12 m4 l4 center-align">
                <div class="card">

                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">No hay productos en esta categoria.</span>
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
      $(document).ready(function() {
    $('select').material_select();
  });

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