<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    .header {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .header-title {
        display: flex;
        width: 100%;
        align-items: center;
    }

    .header-title p {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 40px;
        font-weight: bold;
        line-height: 40px;
    }

    .header-details {
        width: 100%;
        display: flex;
        justify-content: end;
    }

    .header-details p {
        font-size: 30px;
        margin-top: 0;
        margin-bottom: 0;
        color: brown;
    }

    .dflex {
        display: flex;
        margin-top: 20px;
    }

    .pn {
        font-weight: bold;
    }

    .fn {
        border: 0;
        background-color: white;
        border: 0;
        border-bottom: 1px solid black;
        font-size: 20px;
        width: 100%;
        text-indent: 20px;
    }
</style>

<body>
    <?php
    $imgpath = base_url('assets/images/sanisi.jpg');
    $ext = pathinfo($imgpath, PATHINFO_EXTENSION);
    $data = file_get_contents($imgpath);
    $base64 = 'data:image/' . $ext . ';base64,' . base64_encode($data);

    $imgpath1 = base_url('uploads/Signature/' . $refer['signature']);
    $ext1 = pathinfo($imgpath1, PATHINFO_EXTENSION);
    $data1 = file_get_contents($imgpath1);
    $base641 = 'data:image/' . $ext1 . ';base64,' . base64_encode($data1);

    ?>
    <div>
        <div style="float: left;">
            <img src="<?= $base64 ?>" height="100" width="100" style="float: left" alt="">
            <p style="font-size: 35px; margin: 0;margin-left: 7rem"><b>Barangay San Isidro <br>Health Center<b></p>
        </div>
        <div style="margin-bottom: 70px;">
            <div style="float: right;font-size: 20px; margin: 0; color: brown">
                <p><?= $refer['doctor_name'] ?></p>
            </div>
        </div>
    </div>
    <div class="">
        <div style="float:right">
            <p>Sitio Tanag, Barangay San Isidro, Rodriguez Rizal</p>
        </div>
    </div>
    <hr style="margin-top: 50px">
    <div>
        <div style="float: left; width: 30%;  font-weight: bold">Patient Name:</div>
        <div style="margin-left: 7rem;width: 80%;  border-bottom: .5px solid black;"><?= $refer['name'] ?></div>
    </div>
    <div style="margin-top: 20px;">
        <div style="float: left; width: 60%;">
            <div style="float: left; width: 30%;  font-weight: bold">Patient Phone:</div>
            <div style="margin-left: 7rem;width: 100%;  border-bottom: .5px solid black;"> <?= $refer['contact'] ?></div>
        </div>
        <div style="width: 40%;">
            <div style="float:left;"><b>Date:</b> <span style="border-bottom: .5px solid black;"> <?= date('F d, Y', strtotime($refer['referral_date'])) ?></span></div>
        </div>
    </div>
    <div style="font-weight: bold">Reason for Referral:</div>
    <div>
        <div style="margin-left: 10rem">

            <?php
            $decarr = $refer['reason'];
            $decarrval = explode(',', $decarr);
            for ($i = 0; $i < count($decarrval); $i++) {


            ?>
                <div style="margin-top: 10px;">
                    <input type="checkbox" checked>
                    <label for="">
                        <?= $decarrval[$i] ?>
                        <?php
                        if ($decarrval[$i] === 'Others') {
                        ?>
                            <textarea name="" id="" style="width: 50%;" rows="1"><?= $refer['others'] ?></textarea>

                        <?php
                        }
                        ?>
                    </label>

                </div>

            <?php



            }
            ?>

        </div>
    </div>

    <div style="margin-top: 30px;">
        <div style="float: left; width: 30%;  font-weight: bold">Doctor Signature:</div>
        <div style="margin-left: 10rem;width: 70%;">
            <img src="<?= $base641 ?>" height="100" alt="">
        </div>
    </div>
</body>

</html>