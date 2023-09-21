<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m-5 p-5 text-center">
                <?php if($status): ?>
                    <div class="alert alert-success">
                        <strong>Success! </strong>Group Edited Successfully...
                    </div>
                <?php else: ?>
                    <span class="text-danger"></span>
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>Group Dont Edited Exists...
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" r="32" stroke-width="10" stroke="#5e5be1" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                            <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                        </circle>

                        <circle cx="50" cy="50" r="21" stroke-width="10" stroke="#6aa8f8" stroke-dasharray="32.98672286269283 32.98672286269283" stroke-dashoffset="32.98672286269283" fill="none" stroke-linecap="round">
                            <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;-360 50 50"></animateTransform>
                        </circle>
                    </svg>
                    Redirecting to Home ...
                    <script>
                        setTimeout(function(){
                            location.href="<?= site_url('GroupsTable') ?>"
                        },1000);
                    </script>
            </div>
        </div>
    </div>
</body>
</html>