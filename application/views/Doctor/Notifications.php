<style>
    .ncard {
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
        background-color: rgba(0, 0, 0, 0)
    }

    .titlenotif {
        margin-bottom: 0;
        font-weight: 500;
    }

    .notifcontent {
        margin-bottom: 0;
        font-size: 14px;
    }

    .iconcard {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ico {
        font-size: 28px;
        /* border: 1px solid lightgray; */
        padding: 5px;
    }

    .unread {
        border-left: 3px solid dodgerblue !important;
    }

    .movebtn {
        border: 0;
        background-color: rgba(10, 55, 150);
        color: white;
        width: 30px;
        outline: none;


    }

    .movebtn:disabled {
        background-color: rgba(10, 55, 150, 0.5);
    }

    @keyframes shake {

        0%,
        50%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(10deg);
        }

        75% {
            transform: rotate(-10deg);

        }
    }

    .delnot:hover {
        animation: shake 0.3s;
        backface-visibility: hidden;
    }

    .delnot {
        position: absolute;
        right: -5px;
        top: 10px;
        color: orangered;
        cursor: pointer;
    }
</style>

<div class="cont" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="" style="width: 45rem">
            <div class="card card-body border-0 rounded-0 mb-1 ncard">
                <div class="d-flex justify-content-between">
                    <h6 class="text-secondary mb-0 fw-bold">NOTIFICATIONS</h6>
                    <h6 class="mb-0 me-2"><?= $count1 ?></h6>
                </div>
            </div>
            <div class="">
                <div class="notification mb-2">


                </div>
                <div class="d-flex justify-content-end me-3">
                    <div class="">
                        <button id="lessmore" class="movebtn"><i class="far fa-angle-left"></i></button>
                        <button id="loadmore" class="movebtn"><i class="far fa-angle-right"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="row" value="0">
<input type="text" id="count" value="<?= $count1 ?>">

<script>
    $(document).ready(function() {
        var base_url = window.location.origin;

        $('#lessmore').prop('disabled', true);

        fetchnotification(0);


        $(document).on('click', '#loadmore', function() {
            var row = Number($('#row').val());
            var count = Number($('#count').val());

            var limit = 6;
            row = row + limit;
            $('#row').val(row);
            var rowCount = row + limit;
            if (rowCount >= count) {
                $('#loadmore').prop('disabled', true);


            } else {
                $('#loadmore').prop('disabled', false);
                $('#lessmore').prop('disabled', false);
            }
            console.log(rowCount);
            // console.log(row);

            fetchnotification(row)

        })

        $(document).on('click', '#lessmore', function() {
            var row = Number($('#row').val());
            var count = Number($('#count').val());

            var limit = 6;
            row = row - limit;
            $('#row').val(row);
            var rowCount = row - limit;
            if (rowCount < 0) {
                $('#lessmore').prop('disabled', true);
            } else {
                $('#lessmore').prop('disabled', false);
                $('#loadmore').prop('disabled', false);


            }
            console.log(count);
            console.log(rowCount);

            fetchnotification(row)

        })




        function fetchnotification(start) {
            $.ajax({
                url: '<?= base_url('DoctorAuth/fetchNotification') ?>',
                method: "POST",
                data: {
                    start: start,
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#datval').val(data.length)
                    $('#notifcount').text(data.length)
                    var html = "<div>";
                    if (data.length > 0) {



                        for (var i = 0; i < data.length; i++) {
                            // console.log(data[i].start)
                            html += '<div class="position-relative">';
                            html += '<div class=" card notifcards card-body mx-3 border-0 rounded-0 mb-1 ' + ((data[i].status === "unread") ? 'unread' : '') + '">';
                            html += '<div class="row gx-2">';
                            html += '<div class="col-lg-1">';
                            html += '<div class="iconcard">';
                            html += '<i class="fas fa-ban text-danger fs-5"></i>';
                            html += '</div></div>';

                            html += '<div class="col-lg-11">';
                            html += '<div class="ms-3">';
                            html += '<div class="d-flex justify-content-between"><p class="mb-0">' + data[i].title + '</p><span class="text-secondary" style="font-size: 12px">' + data[i].time + '</span></div>';
                            html += '</div>';
                            html += ' </div>';
                            html += ' </div>';
                            html += '</div>';
                            html += '<div></div>';

                        }


                    } else {

                    }

                    html += '</div>';
                    $('.notification').html(html);



                }

            })
        }
    })
</script>