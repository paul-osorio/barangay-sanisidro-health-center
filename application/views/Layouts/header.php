<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logosanisi.png') ?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:200,400,300,700,500,100' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/jqueryUI/jquery-ui.min.css') ?>">
    <script src="<?= base_url('assets/jqueryUI/jquery-ui.min.js') ?>"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>

</style>

<script type="module">
    $(document).ready(function() {

        sidebard();
        sidebardoc();
        sidebarad();
    });



    function sidebarad() {
        const sidebar = localStorage.getItem("sidebarad");

        if (sidebar === "false") {
            $('.sidtxta').hide();
            $('.adica').removeClass('me-2')
            $('#hidesida').css({
                "width": "6rem"
            })
            $('.adica').css({
                "font-size": "30px"
            })
            $('.topnava').css({
                "margin-left": "6rem"
            })
            $('.conta').css({
                "padding-left": "6rem"
            })
            $('#hidesidea').hide();
            $('#showsidea').show();
        } else {
            $('.sidtxta').show();
            $('.adica').addClass('me-2')
            $('#hidesida').css({
                "width": "15rem"
            })
            $('.adica').css({
                "font-size": "16px"
            })
            $('.topnava').css({
                "margin-left": "15rem"
            })
            $('.conta').css({
                "padding-left": "15rem"
            })
            $('#hidesidea').show();
            $('#showsidea').hide();
        }
    }

    function sidebardoc() {
        const sidebar = localStorage.getItem("sidebardoc");

        if (sidebar === "false") {
            $('.sidtxtd').hide();
            $('.adicd').removeClass('me-2')
            $('#hidesidd').css({
                "width": "6rem"
            })
            $('.adicd').css({
                "font-size": "30px"
            })
            $('.patd').css({
                "font-size": "25px"
            })
            $('.topnavd').css({
                "margin-left": "6rem"
            })
            $('.contd').css({
                "padding-left": "6rem"
            })
            $('#hidesided').hide();
            $('#showsided').show();
        } else {
            $('.sidtxtd').show();
            $('.adicd').addClass('me-2')
            $('.patd').css({
                "font-size": "14px"
            })
            $('#hidesidd').css({
                "width": "204px"
            })
            $('.adicd').css({
                "font-size": "16px"
            })
            $('.topnavd').css({
                "margin-left": "12.75rem"
            })
            $('.contd').css({
                "padding-left": "13rem"
            })
            $('#hidesided').show();
            $('#showsided').hide();
        }
    }

    function sidebard() {
        const sidebar = localStorage.getItem("sidebar");

        if (sidebar === "false") {
            $('.sidtxt').hide();
            $('.adic').removeClass('me-2')
            $('#hidesid').css({
                "width": "6rem"
            })
            $('.adic').css({
                "font-size": "30px"
            })
            $('.topnav').css({
                "margin-left": "6rem"
            })
            $('.cont').css({
                "padding-left": "6rem"
            })
            $('#hideside').hide();
            $('#showside').show();
        } else {
            $('.sidtxt').show();
            $('.adic').addClass('me-2')
            $('#hidesid').css({
                "width": "204px"
            })
            $('.adic').css({
                "font-size": "16px"
            })
            $('.topnav').css({
                "margin-left": "12.75rem"
            })
            $('.cont').css({
                "padding-left": "12.75rem"
            })
            $('#hideside').show();
            $('#showside').hide();
        }
    }
</script>

<body>