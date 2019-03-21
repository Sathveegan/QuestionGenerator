<?php
    if(!isset($_SESSION))
        session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Sample</title>
</head>

<body>

    <div class="container-fluid">

        <h1 class="mt-2">Question Form</h1>

        <?php echo $_SESSION['result']; ?> 

        <form class="needs-validation mt-3" novalidate method="post" action="upload.php" enctype="multipart/form-data">
            <hr />
            <h3>Question</h3>
            <hr />
            <div class="form-group">
                <label for="taQuestion">Question</label>
                <textarea class="form-control" name="question" id="taQuestion" rows="3" required></textarea>
                <div class="invalid-feedback">
                    Please type your Question
                </div>
            </div>
            <div class="form-group files color">
                <input type="file" name="imageFile" id="fileToUpload" class="form-control" multiple="">
            </div>
            <hr />
            <h3>Answers</h3>
            <hr />
            <div class="form-group">
                <label for="taAnswer1">Answer 01</label>
                <textarea class="form-control" name="answer1" id="taAnswer1" rows="2" required></textarea>
                <div class="invalid-feedback">
                    Please type your Answer 01
                </div>
            </div>
            <div class="form-group">
                <label for="taAnswer2">Answer 02</label>
                <textarea class="form-control" name="answer2" id="taAnswer2" rows="2" required></textarea>
                <div class="invalid-feedback">
                    Please type your Answer 02
                </div>
            </div>
            <div class="form-group">
                <label for="taAnswer3">Answer 03</label>
                <textarea class="form-control" name="answer3" id="taAnswer3" rows="2" required></textarea>
                <div class="invalid-feedback">
                    Please type your Answer 03
                </div>
            </div>
            <div class="form-group">
                <label for="taAnswer4">Answer 04</label>
                <textarea class="form-control" name="answer4" id="taAnswer4" rows="2" required></textarea>
                <div class="invalid-feedback">
                    Please type your Answer 04
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Submit</button>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

</body>

</html>

<?php
    $_SESSION['result'] = '';
?>