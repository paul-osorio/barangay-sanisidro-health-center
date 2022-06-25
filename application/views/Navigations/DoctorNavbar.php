<style>
    * {
        font-family: 'Roboto';
    }

    body {
        background-color: #E5E5E5;
    }

    .sidetxtd {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
    }


    .sidetxtd:hover {
        background-color: white;
        border-radius: 5px;
        color: #304B8B !important;

    }

    .sidetxtd:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.20);

    }

    .contd {
        padding-left: 13rem;
    }

    .topnavd {
        background-color: white;
        padding: 10px;
        margin-left: 12.75rem;
        width: 100%;
        box-shadow: 0px 3px 5px lightgray;
    }

    .arrs {
        position: absolute;
        bottom: 0;
        right: 0px;
        font-size: 1.5rem;
        border: 0;
        border-top-left-radius: 10rem;
        border-bottom-left-radius: 10rem;
        color: dodgerblue;
    }

    .arrs:hover {
        padding-right: 20px;
        transition: .5s;
    }

    .activepage {
        text-decoration: none;
        padding: 8px;
        margin: 5px;
        padding-left: 1.7rem;
        padding-right: 1.7rem;
        background-color: white !important;
        border-radius: 5px;
        color: #304B8B !important;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.10);
    }
</style>

<div class="d-flex position-fixed w-100 top-0 " style="z-index: 99;">

    <div style="width: 204px;background-color: #304B8B;" id="hidesidd" class="h-100 position-fixed overflow-hidden top-0 start-0">
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center" style="height: 100px">
                <div class="me-2">
                    <img src="<?= base_url('assets/images/logosanisi.png') ?>" height="55" width="55" alt="">

                </div>
                <div class="text-white">
                    <p class="m-0 sidtxtd" style="line-height: 19px">
                        Barangay<br>San Isidro <br>Health Center

                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center w-100  mt-4">
            <div class="">
                <a href="<?= base_url('D/Appointments') ?>" class="<?= ($active === 'appointment') ? 'activepage' : 'sidetxtd'  ?> text-white d-block"><i class="fad fa-files-medical me-2 adicd"></i> <span class="sidtxtd">Appointments</span></a>
                <a href="<?= base_url('D/Patient') ?>" class="<?= ($active === 'patient') ? 'activepage' : 'sidetxtd'  ?> text-white d-block"><i class="fad fa-procedures me-2 patd"></i><span class="sidtxtd">Patient</span></a>


                <a href="<?= base_url('D/Messages') ?>" class="position-relative text-white d-block <?= ($active === 'messages') ? 'activepage' : 'sidetxtd' ?>">
                    <i class="fa-solid fa-bell me-2 adicd"></i>
                    <span class="sidtxtd">Messages</span>
                    <span style="left: 78%; top: 30%;" id="messnot" class="bg-danger position-absolute translate-middle badge p-2 rounded-pill">
                        <span class="visually-hidden">unread messages</span>
                    </span>

                </a>

                <a href="<?= base_url('D/Profile') ?>" class="<?= ($active === 'profile') ? 'activepage' : 'sidetxtd'  ?> text-white d-block"><i class="fas fa-user-md me-2 adicd"></i>
                    <span class="sidtxtd">Profile</span></a>
                <a href="<?= base_url('D/Notifications') ?>" class="position-relative text-white d-block <?= ($active === 'notification') ? 'activepage' : 'sidetxtd' ?>">
                    <i class="fa-solid fa-bell me-2 adicd"></i>
                    <span class="sidtxtd">Notifications</span>
                    <span style="left: 85%;" class="position-absolute top-5 translate-middle badge rounded-pill bg-danger">
                        <span id="notifnum"></span>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>

            </div>
        </div>
        <button class="arrs" id="hidesided">
            <i class="fad fa-angle-left" id="hideicd"></i>

        </button>
        <button class="arrs" id="showsided">
            <i class="fa-solid fa-angle-right " id="showicd"></i>
        </button>

    </div>

    <div class="topnavd">
        <div class="d-flex justify-content-between">
            <p class="m-0 ms-2 text-secondary">Medical Staff</p>
            <p class="m-0 text-secondary" id="timestamp"></p>
            <a href="<?= base_url('DoctorAuth/logout') ?>" class="m-0 text-danger text-decoration-none">Log Out</a>
        </div>
    </div>
</div>

<script>
    $('#showside').hide();
    $('#messnot').hide();

    $(document).ready(function() {
        setInterval(timestamp, 1000);
        setInterval(countNotif, 1000)
        setInterval(checkUnread, 1000)
    });

    function checkUnread() {
        $.ajax({
            url: '<?= base_url('DoctorChat/checkunread') ?>',
            success: function(data) {
                console.log(data);
                //     if (data > 0) {
                //         $('#messnot').show();
                //     } else {
                //         $('#messnot').hide();
                //     }
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
            url: '<?= base_url('DoctorAuth/countNotif') ?>',
            success: function(data) {
                if (data > 99)
                    $('#notifnum').text('99+')
                else
                    $('#notifnum').text(data)


            }

        })
    }


    $('#hidesided').click(() => {
        $('.sidtxtd').hide(150);
        $('.sidetextd').css
        $('.adicd').animate({
            fontSize: '30px'
        }, 250);
        $('.patd').animate({
            fontSize: '25px'
        }, 250);
        $('.adicd').removeClass('me-2')
        $('#hidesidd').animate({
            width: '6rem'
        }, 300)
        $('.topnavd').animate({
            marginLeft: '6rem'
        }, 300)
        $('.contd').animate({
            paddingLeft: '6rem'
        }, 300)
        $('#hidesided').hide(300);
        $('#showsided').show(300);
        localStorage.setItem("sidebardoc", "false")


    })

    $('#showsided').click(() => {
        $('.sidtxtd').show();
        $('.adicd').animate({
            fontSize: '16px'
        }, 200);
        $('.patd').animate({
            fontSize: '14px'
        }, 200);
        $('.adicd').addClass('me-2')

        $('#hidesidd').animate({
            width: '204px'
        }, 300)
        $('.topnavd').animate({
            marginLeft: '12.75rem'
        }, 300)
        $('.contd').animate({
            paddingLeft: '13rem'
        }, 300)
        $('#hidesided').show(300);
        $('#showsided').hide(300);
        localStorage.setItem("sidebardoc", "true")



    })
</script>