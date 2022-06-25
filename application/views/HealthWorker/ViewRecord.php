<style>
    .ul li {
        margin-left: 5rem;
        /*see me */
    }
</style>

<div class="d-flex justify-content-center mb-5" style="">

    <div style="width: 50rem">
        <div class="card card-body border-0 mt-4">
            <p class="mb-0 fw-bold">Walk In List</p>
            <hr>
            <table class="table" id="walkintb" style="width: 100%">
                <thead class="table-secondary">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Created At</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($user->result_array() as $user) {
                        $fullname = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'];

                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= $user['Contact'] ?></td>
                            <td><?= date('F d, Y - g:i a', strtotime($user['created_at'])) ?></td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-fullname="<?= $fullname ?>" data-contact="<?= $user['Contact'] ?>" data-email="<?= $user['Email'] ?>" data-address="<?= $user['Address'] ?>" data-apptype="<?= ucfirst($user['app_type']) ?>" data-appservice="<?= $user['app_services'] ?>" data-emergency="<?= $user['emergency'] ?>" data-others="<?= $user['others'] ?>" data-createdAt="<?= $user['created_at'] ?>" class="viewdt btn btn-sm btn-primary w-100 rounded-pill">View</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>

    </div>


</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PATIENT DETAILS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="moredetails">

            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click', '.viewdt', function() {

            var fullname = $(this).data('fullname');
            var email = $(this).data('email');
            var contact = $(this).data('contact');
            var address = $(this).data('address');
            var apptype = $(this).data('apptype');
            var appservice = $(this).data('appservice');
            var emergency = $(this).data('emergency');
            var others = $(this).data('others');
            var createdAt = $(this).data('createdAt');

            var output = '<div class="row">';
            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Fullname:</p>'
            output += '</div>'
            output += '<div class="col-lg-4">'
            output += '<p>' + fullname + '</p>'
            output += '</div>'
            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Gender:</p>'
            output += '</div>'
            output += '<div class="col-lg-4">'
            output += '<p>Male</p>'
            output += '</div>'


            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Contact:</p>'
            output += '</div>'
            output += '<div class="col-lg-10">'
            output += '<p>' + contact + '</p>'
            output += '</div>'

            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Email:</p>'
            output += '</div>'
            output += '<div class="col-lg-10">'
            output += '<p>' + email + '</p>'
            output += '</div>'


            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Address:</p>'
            output += '</div>'
            output += '<div class="col-lg-10">'
            output += '<p>' + address + '</p>'
            output += '</div>'
            output += '<div class="col-lg-2">'
            output += '<p class="fw-bold">Type:</p>'
            output += '</div>'
            output += '<div class="col-lg-7">'
            output += '<p>' + apptype + '</p>'
            output += '</div>'
            output += '<div class="col-lg-12">'

            if (appservice !== "") {
                const arr = appservice.split(',');
                output += '<ul class=" ul">'
                // output += '<div class="row gx-2 gy-2">'
                for (var i = 0; i < arr.length; i++) {

                    output += '<li>' + arr[i] + '</li>'
                    if (arr[i] === "Others") {
                        output += '<ul>'
                        output += '<li>' + others + '</li>'
                        output += '</ul>'
                    }

                }
                output += '</ul>'

            } else {
                output += '<p class="fw-bold">Emergency Details:</p>'
                output += '<textarea class="form-control" row="5" readonly>' + emergency + '</textarea>'

            }
            output += '</div>'

            output += '</div>';

            $('#moredetails').html(output);



        })


    })



    $(document).ready(function() {
        var table = $('#walkintb').DataTable();

    });
</script>