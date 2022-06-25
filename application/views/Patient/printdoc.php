<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $refer = $this->db->query('SELECT * FROM doctor WHERE ID=' . $appoint['doctorID'])->row_array();
    $docname = $refer['Lastname'] . ', ' . $refer['Firstname'] . ' ' . $refer['Middlename'];
    $imgpath = base_url('assets/images/sanisi.jpg');
    $ext = pathinfo($imgpath, PATHINFO_EXTENSION);
    $data = file_get_contents($imgpath);
    $base64 = 'data:image/' . $ext . ';base64,' . base64_encode($data);


    $imgpath1 = base_url('uploads/Signature/' . $refer['signature']);
    $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
    $data1 = file_get_contents($imgpath1);
    $base641 = 'data:image/' . $ext1 . ';base64,' . base64_encode($data1);

    $fullname = $appoint['lastname'] . ', ' . $appoint['firstname'] . ' ' . $appoint['middlename'];
    $time = apptime2($appoint['app_time'])

    ?>
    <fieldset>
        <div class="">
            <center>
                <p>APPOINTMENT SLIP</p>
            </center>

        </div>
        <div>
            <div style="">
                <img src="<?= $base64 ?>" height="80" width="80" style="float: left" alt="">
                <p style="font-size: 30px; margin: 0;margin-left: 6rem"><b>Barangay San Isidro <br>Health Center<b></p>
            </div>

            <!-- <div style="margin-bottom: 70px;">
                <div style="float: right;font-size: 20px; margin: 0; color: brown">
                    <p><?= $refer['doctor_name'] ?></p>
                </div>
            </div> -->
        </div>
        <div style="padding: 3px ;margin-top: 30px;  width: 100%; background-color: lightgray">
            <p style="margin: 1px 5px 1px 5px;font-weight: bold;font-size: 20px">PATIENT DETAILS</p>
        </div>
        <div class="" style="margin-top: 15px;">
            <label for="" style="padding-bottom: 10px;">Name:</label>
            <input type="text" style="width: 80%;margin-bottom: 0; border: 0; border-bottom: .5px solid gray" readonly value="<?= $fullname ?>">
        </div>
        <div style="margin-top: 20px;">
            <label for="" style="padding-bottom: 10px;">Gender:</label>
            <input type="text" style="width: 40%;margin-bottom: 0; border: 0; border-bottom: 1px solid gray" readonly value="<?= $appoint['gender'] ?>">
            <label for="" style="margin-left: 10px; ">Date of Birth:</label>
            <input type="text" style=" border: 0;margin-bottom: 0;border-bottom: 1px solid gray" readonly value="<?= $appoint['birthday'] ?>">
        </div>
        <div style="margin-top: 20px;">
            <label for="" style="padding-bottom: 10px;">Patient Type:</label>
            <input type="text" style="width: 30%;margin-bottom: 0; border: 0; border-bottom: 1px solid gray" readonly value="<?= 'For ' . ucfirst($appoint['patientType']) ?>">
            <label for="" style="margin-left: 10px; ">Appointment type:</label>
            <input type="text" style=" border: 0;margin-bottom: 0;border-bottom: 1px solid gray" readonly value="<?= ucfirst($appoint['appointmentType']) ?>">
        </div>
        <div style="margin-top: 20px;">
            <label for="" style="padding-bottom: 10px;">Appointment Date:</label>
            <input type="text" style="width: 30%;margin-bottom: 0; border: 0; border-bottom: .5px solid gray" readonly value="<?= date('F d, Y', strtotime($appoint['app_date'])) ?>">
            <label for="" style="margin-left: 10px; ">Appointment type:</label>
            <input type="text" style=" border: 0;margin-bottom: 0;border-bottom: .5px solid gray" readonly value="<?= $time ?>">
        </div>
        <div style="margin-top: 50px;">
            <label for="" style="padding-bottom: 10px;font-weight: bold;margin-bottom: 0;">Doctor Name:</label>
            <input type="text" style="width: 80%;margin-bottom: 0; border: 0;" readonly value="<?= $docname ?>">
        </div>
        <div style="margin-top: 30px;">
            <div style="float: left; width: 30%;  font-weight: bold">Doctor Signature:</div>
            <div style="margin-left: 10rem;width: 70%;">
                <img src="<?= $base641 ?>" height="100" alt="">
            </div>
        </div>
        <div style="width: 100%;">
            <div class="" style="float: right">
                <div class="">
                    <p style="margin-top: 40px;margin-bottom: 0; float:right">Contact Us: 09489099821</p>
                </div>
                <p style="line-height: 20px;">Sitio Tanag, Barangay San Isidro, Rodriguez Rizal</p>
            </div>
        </div>
    </fieldset>

</body>

</html>