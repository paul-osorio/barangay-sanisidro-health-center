<style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .success-card {
        position: relative;
        padding: 2rem;
        background-color: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 5px;
        width: 20rem;
    }

    body {
        background-color: lightgray;
    }

    button {
        background-color: #2F4A8A;
        border: 0;
        padding: 5px;
        width: 100%;
        color: white;
        border-radius: 5px;
    }

    button:hover {
        background-color: #2D447C;
    }

    .check {
        background-color: #2F4A8A;
        top: -50px;
        left: 35%;
        width: 6rem;
        height: 6rem;
        padding: 10px;
        position: absolute;
        color: white;
    }
</style>
<div class="centered">
    <div class="success-card position-relative">
        <div class="check rounded-circle d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-check fs-1"></i>
        </div>
        <p class="mb-2 mt-2 fs-2 text-secondary text-center">Success!</p>
        <p>Congratulations, your account has been successfully created.</p>
        <div class="d-flex justify-content-center">
            <button onclick="location.href='<?= base_url('P/Login') ?>'">OK</button>
        </div>
    </div>

</div>