<style>
    .navbtn {
        background-color: white;
        border: 0;
        border-bottom: 5px solid white;
    }

    .navbtn:hover:not(.activebtn) {
        border-bottom: 5px solid gray;
        color: gray;

    }

    .activebtn {
        border-bottom: 5px solid blue;
        color: blue;
    }

    body {
        overflow-x: hidden;
        background-color: rgba(0, 0, 0, 0.08);

    }
</style>

<div class="d-flex border-bottom justify-content-between bg-white">
    <div class="d-flex align-items-center my-2 ms-2">
        <img src="<?= base_url('assets/images/sanisi.jpg') ?>" height="50" width="50" alt="">
        <p class="mb-0 ms-2 fs-6" style="line-height: 20px">Barangay San Isidro<br> Health Center</p>
    </div>
    <div class="d-flex">
        <div class="d-flex align-items-end me-5">
            <button class="h-100 navbtn me-5 <?= ($active === 'walkin') ? 'activebtn' : ''  ?>" onclick="location.href='<?= base_url('HealthWorker/Record') ?>'">Add Walk-in</button>
            <button class="h-100 navbtn me-5 <?= ($active === 'walkinview') ? 'activebtn' : ''  ?>" onclick="location.href='<?= base_url('HealthWorker/ViewRecord') ?>'">View Walk-in</button>
            <button class="h-100 navbtn <?= ($active === 'appoint') ? 'activebtn' : ''  ?>" onclick="location.href='<?= base_url('HealthWorker/ViewAppointments') ?>'">Appointments</button>
        </div>
        <div class="d-flex align-items-center me-2 text-danger ms-5">
            <a href="<?= base_url('HealthWorker/logout') ?>" class="link-danger">Log Out</a>
        </div>
    </div>

</div>