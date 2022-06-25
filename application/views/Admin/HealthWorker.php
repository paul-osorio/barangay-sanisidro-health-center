<div class="conta" style="margin-top: 3.5rem">
    <div class="row mx-4">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Admin/ManageAccount') ?>">View Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Barangay Health Worker Accounts</li>
                </ol>
            </nav>

            <div class="card card-body">
                <span class="fw-bold">Health Worker</span>
                <hr>
                <?php
                if (!$this->session->userdata('isSuperAdmin')) {
                ?>
                    <div class="mb-3">
                        <button class="btn btn-primary rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#importHWModal">Import Health Worker</button>
                    </div>
                <?php }  ?>

                <table id="hwtable" class="table table-striped" style="width:100%">
                    <colgroup>
                        <col span="1" style="width: 12%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 10%;">
                        <col span="1" style="width: 30%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $user) {
                        ?>
                            <tr>
                                <td><?= $user['ID_number'] ?></td>
                                <td><?= $user['Firstname'] ?></td>
                                <td><?= $user['Lastname'] ?></td>
                                <td><?= $user['Email'] ?></td>
                                <td><?= $user['Contact'] ?></td>
                                <td><?= $user['Address'] ?></td>
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

<div class="modal fade" id="importHWModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content rounded-0">

            <div class="d-flex justify-content-between px-3 pt-2 mb-2">
                <p class="mb-0 text-primary">Import Health Worker List</p>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('AjaxRequest/importHW') ?>" enctype="multipart/form-data" method="POST" id="formadd">
                <div class="px-3 pt-2 pb-3">
                    <input type="file" name="csv" accept=".xlsx, .xls," required class="form-control mb-2">
                </div>
                <div class="d-flex">
                    <button type="button" class="w-100 btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="w-100 btn btn-primary rounded-0">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully import health worker list</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast errortoast align-items-center text-white bg-danger border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i> The file your try to import is invalid</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('error_import')) {
?>
    <script>
        $(document).ready(function() {
            $('.errortoast').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('success_import')) {
?>
    <script>
        $(document).ready(function() {
            $('.successtoast').toast('show')
        })
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {
        $('#hwtable').DataTable()
    })
</script>