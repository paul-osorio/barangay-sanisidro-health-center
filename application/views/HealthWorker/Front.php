<style>
    .mainc {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background-color: lightgray;
    }

    .logincard {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        width: 20rem;
    }

    .form-control,
    .btn {
        box-shadow: none !important;
    }
</style>

<div class="mainc">
    <div class="">
        <form action="<?= base_url('HealthWorker/login') ?>" method="POST" id="checkForm">
            <div class="card card-body logincard px-0 position-relative" style="padding-bottom: 2rem">
                <div class="px-3">
                    <div class="d-flex justify-content-center">
                        <img src="<?= base_url('assets/images/sanisi.jpg') ?>" height="100" width="100" alt="">
                    </div>
                    <label for="" class="text-center d-block">Enter your Health Worker ID#</label>
                    <input type="text" onkeypress="return isNumber(event)" maxlength="6" placeholder="7 6 x x x x" id="number" name="number" class="form-control">
                    <button class="btn btn-primary mt-2 w-100" type="submit">Continue</button>
                </div>


            </div>
        </form>
    </div>


</div>


<script>
    $(document).ready(function() {
        $('#checkForm').validate({
            rules: {
                number: {
                    required: true,
                    remote: {
                        url: '<?= base_url('HealthWorker/checkNumber') ?>',
                        method: 'POST',
                        data: {
                            number: function() {
                                return $('#number').val();
                            }
                        }
                    }
                }
            },
            messages: {
                number: {
                    required: errorMessage('Please enter your ID number'),
                    remote: errorMessage('ID number not found'),
                }
            }
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    })
</script>