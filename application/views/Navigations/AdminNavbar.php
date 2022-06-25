<style>
    * {
        font-family: 'Roboto';
    }

    body {
        background-color: #E5E5E5;
    }

    .sidetxta {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
    }

    .csidetxt {
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
    }

    .sidetxta:hover {
        background-color: #651FFF;
        border-radius: 5px;
        color: white !important;

    }

    .conta {
        padding-left: 14rem;
    }

    .topnava {
        background-color: white;
        padding: 10px;
        margin-left: 12.75rem;
        width: 100%;
        box-shadow: 0px 3px 5px lightgray;
    }

    .arr {
        position: absolute;
        bottom: 0;
        right: 0px;
        font-size: 1.5rem;
        border: 0;
        border-top-left-radius: 10rem;
        border-bottom-left-radius: 10rem;
        color: white;
        background-color: #651FFF;
    }

    .arr:hover {
        padding-right: 20px;
        transition: .5s;
    }

    .text-violet {
        color: #651FFF;
    }

    .lg {
        color: red;
    }

    .lg:hover {
        color: darkred;
    }

    .activepage {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
        background-color: #651FFF;
        border-radius: 5px;
        color: white !important;
    }
</style>

<div class="d-flex position-fixed w-100 top-0 " style="z-index: 99;">

    <div style="width: 15rem;background-color: white;" id="hidesida" class="shadow h-100 position-fixed overflow-hidden top-0 start-0">
        <div class="d-flex justify-content-center">
            <div class="d-flex mt-3 align-items-center" style="height: 100px">
                <div class="me-2">
                    <img src="<?= base_url('assets/images/logosanisi.png') ?>" style="object-fit: contain" height="55" width="55" alt="">


                </div>
                <div class="">
                    <p class="m-0 sidtxta" style="line-height: 18px">
                        Barangay<br> San Isidro<br>Health Center
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center w-100">
            <div class="">

                <a href="<?= base_url('Admin/Dashboard') ?>" class="text-violet d-block <?= ($active === 'dashboard') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-chart-pie-alt me-2 adica"></i> <span class="sidtxta">Dashboard</span></a>
                <a href="<?= base_url('Admin/ResidentsList') ?>" class="text-violet d-block <?= ($active === 'resident') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-users  me-2 adica"></i><span class="sidtxta">Residents List</span></a>
                <a href="<?= base_url('Admin/ViewWalkIn') ?>" class="text-violet d-block <?= ($active === 'walkin') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-shoe-prints me-2 adica"></i><span class="sidtxta">View Walk-In</span></a>
                <a href="<?= base_url('Admin/Notification') ?>" class="position-relative text-violet d-block <?= ($active === 'notif') ? 'activepage' : 'sidetxta' ?>">
                    <i class="fas fa-bell me-2 adica"></i>
                    <span class="sidtxta"> Notifications</span>
                    <span style="left: 80%;" class="position-absolute top-5 translate-middle badge rounded-pill bg-danger">
                        <span id="notifnum"></span>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <?php
                if ($this->session->userdata('isSuperAdmin')) {
                ?>
                    <a href="<?= base_url('Admin/ManageAccount') ?>" class="text-violet d-block <?= ($active === 'addadmin') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-user-cog me-2 adica"></i><span class="sidtxta">View Accounts</span></a>
                    <a href="<?= base_url('Admin/BackupAndRestore') ?>" class="text-violet d-block <?= ($active === 'backuprestore') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-save me-2 adica"></i>
                        <span class="sidtxta">Backup & Restore</span></a>
                <?php
                } else { ?>
                    <a href="<?= base_url('Admin/ManageAccount') ?>" class="text-violet d-block <?= ($active === 'addadmin') ? 'activepage' : 'sidetxta'  ?>"><i class="fad fa-user-cog me-2 adica"></i><span class="sidtxta">Manage Accounts</span></a>
                <?php
                }
                ?>


            </div>
        </div>
        <button class="arr" id="hidesidea">
            <i class="fa-solid fa-angle-left " id="hideica"></i>
        </button>
        <button class="arr" id="showsidea">
            <i class="fa-solid fa-angle-right " id="showica"></i>
        </button>

    </div>

    <div class="topnava">
        <div class="d-flex justify-content-between">
            <p class="m-0 ms-2 text-secondary"><?= (($this->session->userdata('isSuperAdmin')) ? 'Department Head' : 'Secretary') ?></p>
            <p class="m-0 text-secondary" id="timestamp"></p>
            <a href="<?= base_url('AdminAuth/logout') ?>" class="m-0 lg text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign Out"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
</div>

<script>
    $('#showsidea').hide();
    $(document).ready(function() {
        setInterval(timestamp, 1000);
        setInterval(countNotif, 1000)

    });

    function countNotif() {
        $.ajax({
            url: '<?= base_url('Admin/countNotif') ?>',
            success: function(data) {
                if (data > 99)
                    $('#notifnum').text('99+')
                else
                    $('#notifnum').text(data)


            }

        })
    }

    function timestamp() {
        $.ajax({
            url: '<?php echo base_url('AjaxRequest/timestamp'); ?>',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }



    $('#hidesidea').click(() => {
        $('.sidtxta').hide(150);
        $('.sidetexta').css
        $('.adica').animate({
            fontSize: '30px'
        }, 250);
        $('.adica').removeClass('me-2')
        $('#hidesida').animate({
            width: '6rem'
        }, 200)
        $('.topnava').animate({
            marginLeft: '6rem'
        }, 200)
        $('.conta').animate({
            paddingLeft: '6rem'
        }, 200)
        $('#hidesidea').hide(200);
        $('#showsidea').show(200);
        localStorage.setItem("sidebarad", "false")


    })

    $('#showsidea').click(() => {
        $('.sidtxta').show();
        $('.adica').animate({
            fontSize: '16px'
        }, 200);
        $('.adica').addClass('me-2')

        $('#hidesida').animate({
            width: '15rem'
        }, 200)
        $('.topnava').animate({
            marginLeft: '15rem'
        }, 200)
        $('.conta').animate({
            paddingLeft: '15rem'
        }, 200)
        $('#hidesidea').show(200);
        $('#showsidea').hide(200);
        localStorage.setItem("sidebarad", "true")
    })
</script>