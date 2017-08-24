  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url()?>plantillas/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Billetera</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bitcoin</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6 text-center">
          <div class="box box-success box-solid">
              <div class="box-header">
                <h3 class="box-title">Moneda</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped"> 
                  <tr>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>                
                  </tr>              
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/USD.jpg">
                    </td>
                    <td>USD</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="USD">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/EUR.jpg">
                    </td>
                    <td>EUR</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="EUR">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/ARS.jpg">
                    </td>
                    <td>ARS</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="ARS">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/BOB.jpg">
                    </td>
                    <td>BOB</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="BOB">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/BRL.jpg">
                    </td>
                    <td>BRL</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="BRL">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/BSF.jpg">
                    </td>
                    <td>BSF</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="BSF">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/CLP.jpg">
                    </td>
                    <td>CLP</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="CLP">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/CNY.jpg">
                    </td>
                    <td>CNY</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="CNY">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/COP.jpg">
                    </td>
                    <td>COP</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="COP">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/PEN.jpg">
                    </td>
                    <td>PEN</td>
                    <td>0.00</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-moneda" data-whatever="PEN">Depósito</button></td>
                    <td><button type="button" class="btn bg-navy margin">Retiro</button></td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-6 text-center" >
          <div class="box box-success box-solid">
              <div class="box-header">
                <h3 class="box-title">Criptomoneda</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tr>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th>
                    <th style="width: 20px"></th> 
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/BTC.jpg">
                    </td>
                    <td>BTC</td>
                    <td>0.00000000</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-cripto" data-whatever="BTC">Depósito</button></td>
                    <td><button class="btn bg-navy margin" data-whatever="BTC" id="btn-retiro-btc">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/ETH.jpg">
                    </td>
                    <td>ETH</td>
                    <td>0.00000000</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-cripto" data-whatever="ETH">Depósito</button></td>
                    <td><button class="btn bg-navy margin" data-whatever="ETH" id="btn-retiro-eth">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/LTC.jpg">
                    </td>
                    <td>LTC</td>
                    <td>0.00000000</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-cripto" data-whatever="LTC">Depósito</button></td>
                    <td><button class="btn bg-navy margin" data-whatever="LTC" id="btn-retiro-ltc">Retiro</button></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="<?= base_url()?>plantillas/dist/img/currency/XMR.jpg">
                    </td>
                    <td>XMR</td>
                    <td>0.00000000</td>
                    <td><button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#modal-deposito-cripto" data-whatever="XMR">Depósito</button></td>
                    <td><button class="btn bg-navy margin" data-whatever="XMR" id="btn-retiro-xmr">Retiro</button></td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
          </div>        
        </div>
        
      </div>

      <?php include_once('modal/deposito_moneda.php'); ?>
      <?php include_once('modal/retiro_moneda.php'); ?>
      <?php include_once('modal/deposito_cripto.php'); ?>
      <?php include_once('modal/retiro_cripto.php'); ?>      
      <?php include_once('modal/confirmacion.php'); ?>
      <?php include_once('modal/mensaje.php'); ?>

    


      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <section>


      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

