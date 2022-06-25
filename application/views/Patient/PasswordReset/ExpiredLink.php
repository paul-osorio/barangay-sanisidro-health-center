<style>
    .ecard {
        height: 100vh;
        width: 100vw;
        background-image: linear-gradient(to bottom right, lightblue, blue);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn {
        box-shadow: none !important;
    }
</style>
<div class="ecard">
    <div class="">
        <div class="card card-body rounded-3">
            <p class="text-center display-1"><i class="fad fa-link"></i></p>
            <p class="text-center fs-3 fw-bold">Link Expired</p>
            <p>Oops! This password reset link is not valid anymore</p>
            <button class="btn btn-primary" onclick="location.href='<?= base_url('P/Login') ?>'">Go back to Login Page</button>
        </div>
    </div>

</div>