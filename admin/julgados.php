<?php 
  session_start();
  $_SESSION['user_id'] = 1;
  $idUsuario = $_SESSION['user_id'];

  include_once('controller/dbcon.php');

  $sqlListaJulgados = "SELECT * FROM julgados";
  $queryListaJulgados = mysqli_query($conn, $sqlListaJulgados);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administração Juristrabalhista
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function()  {
        CKEDITOR.replace( 'editor1', {
         filebrowserBrowseUrl: 'assets/ckeditor/ckfinder/ckfinder.html',
         filebrowserUploadUrl: 'assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
       } );
      };
    </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          JT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Juris<b>Trabalhista</b>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="assets/img/default-avatar.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Victor Carvalho
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> Meu Perfil </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Editar Perfil </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Sair </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="examples/dashboard.html">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">image</i>
              <p> Conteúdo
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item active">
                  <a class="nav-link" href="julgados.php">
                    <span class="sidebar-mini"> J </span>
                    <span class="sidebar-normal"> Julgados </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="julgados_favoritos.php">
                    <span class="sidebar-mini"> <i class="material-icons">favorite</i> </span>
                    <span class="sidebar-normal"> Julgados Salvos </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="examples/pages/rtl.html">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Peças </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="examples/dashboard.html">
              <i class="material-icons">build</i>
              <p> Configurações </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="examples/dashboard.html">
              <i class="material-icons">add_shopping_cart</i>
              <p> Produtos </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Julgados</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="#">Configurações</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Julgados</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables1" class="table table-striped table-no-bordered table-hover datatable" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Título</th>
                          <th>Categoria</th>
                          <th>Origem</th>
                          <th>Ano</th>
                          <th class="disabled-sorting text-right">Ações</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Título</th>
                          <th>Categoria</th>
                          <th>Origem</th>
                          <th>Ano</th>
                          <th class="text-right">Ações</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                          while($data = mysqli_fetch_assoc($queryListaJulgados)){ 
                            $id = $data['id'];
                            
                            $select = "SELECT * FROM julgados_favoritos WHERE julgado = '$id' AND id_usuario = '$idUsuario'";
                            $exec = mysqli_query($conn, $select);
                            $num = mysqli_num_rows($exec);
                        ?>
                        <tr>
                          <td><?php echo $data['id']; ?></td>
                          <td><a href="verjulgado.php?id=<?php echo $data['id']; ?>"><?php echo $data['titulo']; ?></a></td>
                          <td><?php echo $data['categoria']; ?></td>
                          <td><?php echo $data['origem']; ?></td>
                          <td><?php echo $data['ano']; ?></td>
                          <td class="text-right">
                            <a href="verjulgado.php?id=<?php echo $data['id']; ?>" class="btn btn-link btn-info btn-just-icon like" data-placement="top" title="Ver"><i class="material-icons">remove_red_eye</i></a>
                            <a href="editar_julgado.php?id=<?php echo $data['id']; ?>" class="btn btn-link btn-warning btn-just-icon edit" data-placement="top" title="Editar"><i class="material-icons">edit</i></a>
                            <a href="controller/<?php echo $num > 0 ? 'desfavoritar':'favoritar' ?>_julgado.php?id=<?php echo $data['id']; ?>" class="btn btn-link btn-rose btn-just-icon edit" data-placement="top" title="<?php echo $num > 0 ? 'Desfavoritar':'Favoritar' ?>"><i class="material-icons"><?php echo $num > 0 ? 'favorite_border':'favorite' ?></i></a>
                            <a href="#" class="btn btn-link btn-danger btn-just-icon remove" data-href="controller/excluir_julgado.php?id=<?php echo $data['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Excluir"><i class="material-icons">close</i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-8 -->
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">add</i>
                  </div>
                  <h4 class="card-title">Adicionar Julgado</h4>
                </div>
                <form method="POST" action="controller/adicionar_julgado.php">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="titulo" class="bmd-label-floating">Título do Julgado</label>
                          <input type="text" class="form-control" name="titulo" id="titulo">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="selectpicker" data-style="select-with-transition" title="Selecione a Origem" name="origem" data-size="7">
                            <option disabled> Selecione uma Opção</option>
                            <option value="STF">STF </option>
                            <option value="TRT">TRT </option>
                            <option value="Avulso">Avulso </option>
                            <option value="Pessoal">Pessoal </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Categoria e Subcategoria #START -->
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="selectpicker" data-style="select-with-transition" title="Selecione uma Categoria" name="categoria" data-size="7">
                            <option disabled> Selecione uma Opção</option>
                            <option value="Direito do Trabalho e Processual do Trabalho">Direito do Trabalho e Processual do Trabalho </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="selectpicker" data-style="select-with-transition" title="Selecione uma Subcategoria" name="subcategoria" data-size="7">
                            <option disabled> Selecione uma Opção</option>
                            <option value="Diversos">Diversos</option>
                          </select>
                        </div>
                      </div>
                      <!-- Categoria e Subcategoria #END -->

                      <!-- Assunto e Ano #START -->
                    
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="selectpicker" data-style="select-with-transition" title="Selecione um Assunto" name="assunto" data-size="7">
                            <option disabled> Selecione uma Opção</option>
                            <option value="Geral">Geral </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="selectpicker" data-style="select-with-transition" title="Selecione um Ano" name="ano" data-size="7">
                            <option disabled> Selecione uma Opção</option>
                            <option value="Anteriores a 2012">Anteriores a 2012</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2019</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Assunto e Ano #END -->
                    
                    <!-- Julgado #START -->
                    <div class="form-group">
                      <textarea id="editor1" name="conteudo" placeholder="Corpo do Julgado"></textarea>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-rose">Adicionar</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end col-md-4 -->
          </div>
          <!-- end row -->
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="ml-auto mr-auto">
              <span class="badge filter badge-black active" data-background-color="black"></span>
              <span class="badge filter badge-white" data-background-color="white"></span>
              <span class="badge filter badge-red" data-background-color="red"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Mini</p>
            <label class="ml-auto">
              <div class="togglebutton switch-sidebar-mini">
                <label>
                  <input type="checkbox">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Images</p>
            <label class="switch-mini ml-auto">
              <div class="togglebutton switch-sidebar-image">
                <label>
                  <input type="checkbox" checked="">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
          <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            Documentation
          </a>
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
            Get Free Demo!
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>

  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Excluir julgado
            </div>
            <div class="modal-body">
                Deseja realmente excluir o julgado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
</div>


  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
 <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  
    $(document).ready(function() {
      $('.datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Buscar julgados",
        }
      });

      var table = $('.datatable').DataTable();
    });
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    // Alert Config
    var sucesso = <?php echo $_SESSION['sucesso']; $_SESSION['sucesso'] = ''; ?>;
    if(sucesso == 1){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">check</i></div> <strong>Julgado</strong> adicionado com sucesso.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'success',
        allow_dismiss: true
      });
    } else if(sucesso == 2){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">warning</i></div> <strong>Erro: </strong> Os campos não podem estar vazios.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    } else if(sucesso == 3){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">error_outline</i></div> <strong>Erro:</strong> Julgado não adicionado.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    } else if(sucesso == 4){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">warning</i></div> <strong>Julgado</strong> excluído com sucesso.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'warning',
        allow_dismiss: true
      });
    } else if(sucesso == 5){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">error_outline</i></div> <strong>Erro:</strong>Julgado não excluído.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    } else if(sucesso == 6){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">error_outline</i></div> <strong>Erro:</strong> Selecione um Julgado.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    } else if(sucesso == 7){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">favorite</i></div> <strong>Julgado</strong> favoritado com sucesso.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'success',
        allow_dismiss: true
      });
    } else if(sucesso == 8){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">error_outline</i></div> <strong>Erro: </strong> Julgado não favoritado, tente novamente mais tarde.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    } else if(sucesso == 9){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">favorite_border</i></div> <strong>Julgado</strong> desfavoritado com sucesso.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'success',
        allow_dismiss: true
      });
    } else if(sucesso == 10){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">favorite_border</i></div> <strong>Julgado</strong> atualizado com sucesso.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'success',
        allow_dismiss: true
      });
    } else if(sucesso == 11){
      var notify = $.notify('<div class="alert-icon"><i class="material-icons">favorite_border</i></div> <strong>Erro: </strong> Julgado não atualizado.', {
        icon: 'glyphicon glyphicon-alert',
        type: 'danger',
        allow_dismiss: true
      });
    }
    
  </script>
</body>

</html>
