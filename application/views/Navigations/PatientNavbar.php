<style>
    * {
        font-family: 'Roboto';
    }

    body {
        background-color: #E5E5E5;
    }

    .sidetxt {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
    }


    .sidetxt:hover {
        background-color: white;
        border-radius: 5px;
        color: #005AE8 !important;

    }

    .cont {
        padding-left: 12.75rem;
    }

    .topnav {
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
        color: dodgerblue;
    }

    .arr:hover {
        padding-right: 20px;
        transition: .5s;
    }

    .activepage {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
        background-color: white;
        border-radius: 5px;
        color: #005AE8 !important;
    }
</style>

<div class="d-flex position-fixed w-100 top-0 " style="z-index: 99;">

    <div style="width: 204px;background-color: #005AE8;" id="hidesid" class="h-100 position-fixed overflow-hidden top-0 start-0">
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center" style="height: 100px">
                <div class="me-2">
                    <img src="<?= base_url('assets/images/logosanisi.png') ?>" height="55" width="55" alt="">
                </div>
                <div class="text-white">
                    <p class="m-0 sidtxt" style="line-height: 20px">
                        Barangay<br>San Isidro <br>Health Center
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center w-100 mt-4">
            <div class="">
                <a href="<?= base_url('P/HealthService') ?>" class="text-white d-block <?= ($active === 'healthservice') ? 'activepage' : 'sidetxt' ?>"><i class="fa-solid fa-heart-pulse me-2 adic"></i><span class="sidtxt">Health
                        Service</span></a>
                <a href="<?= base_url('P/Messages') ?>" class="position-relative text-white d-block <?= ($active === 'messages') ? 'activepage' : 'sidetxt' ?>">
                    <i class="fa-solid fa-bell me-2 adic"></i>
                    <span class="sidtxt">Messages</span>
                    <span style="left: 78%; top: 30%;" id="messnot" class="bg-danger position-absolute translate-middle badge p-2 rounded-pill">
                        <span class="visually-hidden">unread messages</span>
                    </span>

                </a>
                <a href="<?= base_url('P/Account') ?>" class="text-white d-block <?= ($active === 'account') ? 'activepage' : 'sidetxt' ?>"><i class="fa-solid fa-user me-2 adic"></i> <span class="sidtxt">Account</span></a>
                <a href="<?= base_url('P/Notifications') ?>" class="position-relative text-white d-block <?= ($active === 'notification') ? 'activepage' : 'sidetxt' ?>">
                    <i class="fa-solid fa-bell me-2 adic"></i>
                    <span class="sidtxt">Notifications</span>

                    <span style="left: 85%;" class="notipat position-absolute top-5 translate-middle badge rounded-pill bg-danger">
                        <span id="notifnum"></span>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>

            </div>
        </div>
        <button class="arr" id="hideside">
            <i class="fa-solid fa-angle-left " id="hideic"></i>
        </button>
        <button class="arr" id="showside">
            <i class="fa-solid fa-angle-right " id="showic"></i>
        </button>

    </div>

    <div class="topnav">
        <div class="d-flex justify-content-between">
            <p class="m-0 ms-2 text-secondary">Patient Portal</p>
            <p class="m-0 text-secondary" id="timestamp"></p>
            <a href="<?= base_url('PatientAuth/logout') ?>" class="m-0 text-danger text-decoration-none">Log Out</a>
        </div>
    </div>
</div>

<script>
    var base_url = window.location.origin + '/';

    $('#showside').hide();
    checkUnread();
    countNotif()

    setInterval(timestamp, 1000);
    setInterval(countNotif, 1000)
    setInterval(checkUnread, 1000)


    $('#sttt').click(() => {
        alert(localStorage.getItem("sidebar"))
    })

    function checkUnread() {
        $.ajax({
            url: '<?= base_url('PatientChat/checkunread') ?>',
            success: function(data) {
                var newmsg = $('#messnot')
                return (data > 0) ? newmsg.show() : newmsg.hide();
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


    function countNotif() {
        $.ajax({
            url: '<?= base_url('PatientAuth/countNotif') ?>',
            success: function(data) {
                const notif = (value) => {
                    $('#notifnum').text(value)
                };

                if (data > 0) {
                    $('.notipat').show();

                    if (data > 99) {
                        notif('99+');
                    } else {
                        notif(data)
                    }
                } else {
                    $('.notipat').hide();
                }

            }
        })
    }



    $('#hideside').click(() => {
        $('.sidtxt').hide(150);
        $('.sidetext').css
        $('.adic').animate({
            fontSize: '30px'
        }, 250);
        $('.adic').removeClass('me-2')
        $('#hidesid').animate({
            width: '6rem'
        }, 300)
        $('.topnav').animate({
            marginLeft: '6rem'
        }, 300)
        $('.cont').animate({
            paddingLeft: '6rem'
        }, 300)
        $('#hideside').hide(300);
        $('#showside').show(300);
        localStorage.setItem("sidebar", "false")


    })

    $('#showside').click(() => {
        $('.sidtxt').show();
        $('.adic').animate({
            fontSize: '16px'
        }, 200);
        $('.adic').addClass('me-2')

        $('#hidesid').animate({
            width: '204px'
        }, 300)
        $('.topnav').animate({
            marginLeft: '12.75rem'
        }, 300)
        $('.cont').animate({
            paddingLeft: '12.75rem'
        }, 300)
        $('#hideside').show(300);
        $('#showside').hide(300);
        localStorage.setItem("sidebar", "true")



    })
</script>