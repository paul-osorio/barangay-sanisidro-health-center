<?php
$id = $this->session->userdata('patient_id');
?>
<div class="cont" style="margin-top: 3.5rem">

    <div class="w-100 d-flex justify-content-center">
        <div class="mt-3">
            <div class="card card-body" style="width: 30rem">
                <p class="mb-0"><?= $notif['title'] ?></p>
                <hr>
                <p><?= $notif['content'] ?></p>
                <?php

                if ($notif['type'] === 'referral') {
                ?>
                    <button class="btn btn-secondary btn-sm" onclick="location.href='<?= base_url('Patient/referral_form/' . $notif['declineID']) ?>'">Download Referral Form</button>
                <?php
                }
                if ($notif['title'] === "New appointment") {
                ?>
                    <button class="btn btn-secondary btn-sm" onclick="location.href='<?= base_url('Patient/printdocc/' . $notif['declineID']) ?>'">Download Appointment Slip</button>

                <?php
                }

                if ($notif['title'] === "Appointment declined") {
                ?>
                    <button class="btn btn-secondary btn-sm" onclick="location.href='<?= base_url('P/ViewAppointment/' . $notif['declineID']) ?>'">View Details</button>

                <?php
                }

                if ($notif['title'] === "Appointment approved") {
                ?>
                    <button class="btn btn-secondary btn-sm" onclick="location.href='<?= base_url('P/ViewAppointment/' . $notif['declineID']) ?>'">View Details</button>

                <?php
                }
                if ($notif['title'] === "Appointment completed") {
                ?>
                    <button class="btn btn-secondary btn-sm" onclick="location.href='<?= base_url('P/ViewAppointment/' . $notif['declineID']) ?>'">View Details</button>

                <?php
                }
                ?>




            </div>
        </div>
    </div>

</div>