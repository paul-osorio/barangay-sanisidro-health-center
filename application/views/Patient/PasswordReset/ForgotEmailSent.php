<style>
    .bgFP {
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;


    }

    .fpcard {
        padding: 30px 20px 30px 20px;
        width: 20rem;
        border: 1px solid darkblue;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(0, 150, 139, 0.5);
    }

    .fpbackground {
        background-image: url("<?= base_url('assets/images/forgotpass.jpg') ?>");
        background-size: 30rem;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        background-position: 50%;
        background-color: none;

    }

    .form-control,
    .btn {
        box-shadow: none !important;
    }
</style>

<div class="bgFP">
    <div class="">
        <div class="fpcard">

            <p class="display-2 fw-bold text-center mb-0" style="line-height: 45px"><i class="text-success fad fa-at"></i></p>
            <p class="text-center fs-4 fw-bold">Email Sent</p>
            <p class="text-center">We successfully sent a reset password link to <span class="fw-bold"><?= $email ?></span></p>
            <button class="btn btn-primary w-100" onclick="location.href='<?= base_url('P/Login') ?>'">Go back to Login</button>
        </div>
    </div>
</div>