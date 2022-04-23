<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .progress-ring {
        width: 150px;
        height: 150px !important;
        float: left;
        line-height: 150px;
        background: none;
        margin: 20px;
        box-shadow: none;
        position: relative
    }

    .progress-ring:after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 12px solid #fff;
        position: absolute;
        top: 0;
        left: 0
    }

    .progress-ring>span {
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1
    }

    .progress-ring .progress-ring-left {
        left: 0
    }

    .progress-ring .progress-ring-bar {
        width: 100%;
        height: 100%;
        background: none;
        border-width: 12px;
        border-style: solid;
        position: absolute;
        top: 0
    }

    .progress-ring .progress-ring-left .progress-ring-bar {
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left
    }

    .progress-ring .progress-ring-right {
        right: 0
    }

    .progress-ring .progress-ring-right .progress-ring-bar {
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
        animation: loading-1 1.8s linear forwards
    }

    .progress-ring .progress-ring-value {
        width: 90%;
        height: 90%;
        border-radius: 50%;
        background: #fff;
        font-size: 24px;
        color: #000;
        line-height: 135px;
        text-align: center;
        position: absolute;
        top: 5%;
        left: 5%
    }

    .progress-ring.blue .progress-ring-bar {
        border-color: #049dff
    }

    .progress-ring.blue .progress-ring-left .progress-ring-bar {
        animation: loading-2 1.5s linear forwards 1.8s
    }

    .progress-ring.yellow .progress-ring-bar {
        border-color: #fdba04
    }

    .progress-ring.yellow .progress-ring-right .progress-ring-bar {
        animation: loading-3 1.8s linear forwards
    }

    .progress-ring.yellow .progress-ring-left .progress-ring-bar {
        animation: none
    }

    <?php 
      $progress = $p['progress'];
      $deg = $progress * 360 / 100;
      $r = 0;
      $l = 0;
      if($deg <= 180){
        $r = $deg;
        $l = 0;
      } else {
        $r = 180;
        $l = $deg - 180;
      }
    ?>

    @keyframes loading-1 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        100% {
            -webkit-transform: rotate(<?= $r.'deg' ?>);
            transform: rotate(<?= $r.'deg' ?>)
        }
    }

    @keyframes loading-2 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        100% {
            -webkit-transform: rotate(<?= $l.'deg' ?>);
            transform: rotate(<?= $l.'deg' ?>)
        }
    }

    @keyframes loading-3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        100% {
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg)
        }
    }
  </style>
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
      OneSignal.init({
        appId: "cf9857c1-c107-4bf4-935d-509ab51e06a4",
      });
    });
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">