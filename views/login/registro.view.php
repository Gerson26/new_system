<!-- col-lg-6 col-md-6 col-sm-12 Sm=Movil-Small, Md=Tablet-Medium, Lg=Portatil-Large, Xl=Televisiones-ExtraLarge -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?=$this->icono;?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Registro. Formulario para registrarse como nuevo socio.">
    <title><?=$this->nombresistema;?> - Registro</title>
    <!-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'> -->
  </head>
  <body>
    <!-- <h1>Esta es la vista de Main</h1> -->
    <?php require "views/header.view.php";?>
    <section class="" id="seccion">
    <?php echo $this->alertLogin; ?>
    <form id="formRegistro" action="#" class="needs-validation" novalidate onsubmit="procesar()">
      <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2">
            <label class="font-weight-bold">Categoria</label>
            <select class="form-control select2" data-live-search="true" name="reg_categoria" id="reg_categoria" required></select>
            <div class="invalid-feedback">
              Seleccione una categoría.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-2">
            <label class="font-weight-bold">Prefijo</label>
            <select class="form-control select2" name="reg_prefijo" id="reg_prefijo" required></select>
            <div class="invalid-feedback">
              Seleccione un prefijo.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold">Nombre</label>
            <input class="form-control mayusculas" type="text" name="reg_nombre" id="reg_nombre" placeholder="Nombre(s)..." required>
            <div class="invalid-feedback">
              Introduzca nombre(s).
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold" for="reg_nombre">Apellido paterno</label>
            <input class="form-control mayusculas" type="text" name="reg_nombre" id="reg_nombre" required>
            <div class="invalid-feedback">
              Introduzca su apellido paterno.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold">Apellido materno</label>
            <input class="form-control mayusculas" type="text" name="reg_nombre" id="reg_nombre">
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
            <label class="font-weight-bold">RFC</label>
            <input pattern="[A-Za-z0-9]{12,13}" class="form-control mayusculas" type="text" name="reg_rfc" id="reg_rfc" placeholder="XAXX010101000..." required>
            <div class="invalid-feedback">
              Introduzca su RFC.
            </div>
          </div>
          <!-- Domicilio -->
          <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
            <label class="font-weight-bold">Calle</label>
            <input class="form-control mayusculas" type="text" name="reg_calle" id="reg_calle" required>
            <div class="invalid-feedback">
              Introduzca su calle.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
            <label class="font-weight-bold">Número exterior</label>
            <input class="form-control mayusculas" type="text" name="reg_numext" id="reg_numext" required>
            <div class="invalid-feedback">
              Introduzca un exterior.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
            <label class="font-weight-bold">Número interno</label>
            <input class="form-control mayusculas" type="text" name="reg_numint" id="reg_numint" required>
            <div class="invalid-feedback">
              Introduzca un interior.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold">Estado</label>
            <select class="form-control select2" name="reg_estado" id="reg_estado" required>
              <option value="">Seleccionar un estado...</option>
            </select>
            <div class="invalid-feedback">
              Seleccione un estado.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold">Municipio/Alcaldía</label>
            <select class="form-control select2" name="reg_alcaldia" id="reg_alcaldia" required></select>
            <div class="invalid-feedback">
              Seleccione un municipio.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
            <label class="font-weight-bold">Colonia</label>
            <select class="form-control select2" name="reg_colonia" id="reg_colonia" required></select>
            <div class="invalid-feedback">
              Seleccione una colonia.
            </div>
          </div>
          <!-- Contacto -->
          <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
            <label class="font-weight-bold">Lada</label>
            <select class="form-control select2" name="reg_lada" id="reg_lada" required></select>
            <div class="invalid-feedback">
              Seleccione una lada.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mt-2">
            <label class="font-weight-bold">Teléfono</label>
            <input class="form-control" type="tel" name="reg_telefono" id="reg_telefono" required>
            <div class="invalid-feedback">
              Introduzca un teléfono.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mt-2">
            <label class="font-weight-bold">Correo electrónico</label>
            <input class="form-control" type="email" name="reg_correo" id="reg_correo" required>
            <div class="invalid-feedback">
              Introduzca un correo electrónico.
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
            <button type="button" id="submit" class="btn btn-outline-success btn-lg btn-block">Registrarse</button>
          </div>
          <!-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 h-100 text-center">
            <img src="<?php echo constant("URL").constant("LOGOTIPO");?>" class="img-fluid" alt="Logotipo">
          </div> -->
      </div>
    </form>
</section>
    <?php require "views/footer.view.php";?>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script>
      let servidor = '<?=constant("URL");?>';
    </script>
    <script src="<?php echo constant("URL");?>public/js/paginas/registro/index.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".foot").addClass("d-none");
      if ($("#alertaLogin").length) {
        $("#alertaLogin").fadeOut(4000);
        console.log("existe");
      }
    });
    </script>
  </body>
</html>
