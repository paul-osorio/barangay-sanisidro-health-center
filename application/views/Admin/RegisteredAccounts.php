<style>
    th {
        border-bottom: 1px solid lightgray !important;
    }

    .form-control,
    .form-select,
    .btn {
        box-shadow: none !important;
    }

    td {
        height: 40px;
        vertical-align: middle;
    }


    .tbtn {
        height: 25px;
        width: 50px;
        border: none !important;
        background-color: lightgray;
        color: darkslategray;
    }

    .tbtn:hover {
        background-color: #bababa;

    }

    .tbtn:active {
        transform: scale(0.9);
    }
</style>

<div class="conta" style="margin-top: 3.5rem">
    <div class="row mx-3">
        <div class="col-lg-12">
            <div class="card card-body" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <p class="mb-0 fw-bold" style="color: #651FFF">REGISTERED ACCOUNT</p>
                <hr>
                <table id="regTable" class="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $user) {
                        ?>
                            <tr>
                                <td><?= $user['ID_number'] ?></td>
                                <td><?= $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'] ?></td>
                                <td><?= $user['Email'] ?></td>
                                <td><?= $user['Contact'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="tbtn rounded-pill" onclick="location.href='<?= base_url('Admin/ViewAccount/' . $user['ID']) ?>'"><i class="fa-solid fa-eye"></i></button>
                                    </div>
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
</div>
<script>
    $('#regTable').DataTable();
</script>