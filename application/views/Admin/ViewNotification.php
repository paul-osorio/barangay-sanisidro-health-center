<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card card-body" style="width: 30rem;">
                <p class="mb-0"><?= $user['notif_title'] ?></p>
                <p class="mb-0 text-secondary" style="font-size: 14px"><?= get_time_ago(strtotime($user['notif_date'])) ?></p>
                <hr>
                <?php
                $sched = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $user['doctor_id'])->row_array();
                ?>
                <table style="width: 100%" class="table border">

                    <tr>
                        <td class="fw-bold">Monday</td>
                        <td><?= arraymaker($sched['monday'])[1] ?></td>
                        <td class="fw-bold">to</td>
                        <td><?= arraymaker($sched['monday'])[2] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Tuesday</td>
                        <td><?= arraymaker($sched['tuesday'])[1] ?></td>
                        <td class="fw-bold">to</td>
                        <td><?= arraymaker($sched['tuesday'])[2] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Wednesday</td>
                        <td><?= arraymaker($sched['wednesday'])[1] ?></td>
                        <td class="fw-bold">to</td>
                        <td><?= arraymaker($sched['wednesday'])[2] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Thursday</td>
                        <td><?= arraymaker($sched['thursday'])[1] ?></td>
                        <td class="fw-bold">to</td>
                        <td><?= arraymaker($sched['thursday'])[2] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Friday</td>
                        <td><?= arraymaker($sched['friday'])[1] ?></td>
                        <td class="fw-bold">to</td>
                        <td><?= arraymaker($sched['friday'])[2] ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>