<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6646afcf22.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="chatBox" class="rounded">
        <div class="text-center bg-dark text-white rounded-top py-3">
            <h6 class="m-0"><i class="fa-regular fa-comment me-2"></i>Ask a Question</h6>
        </div>
        <div id="chatBotBody">
            <div class="botMessage">
                <i class="fa-solid fa-robot text-body-tertiary"></i>
                <p class="m-0">Hi, How can I help you?</p>
            </div>
        </div>
        <div>
            <div class="input-group">
                <input type="text" id="queryMessage" class="form-control" required placeholder="Type your message here" aria-label="Type your query here" aria-describedby="button-addon2">
                <button class="btn btn-dark" type="button" id="chatQuery">
                    <i class="fa-solid fa-location-arrow"></i></button>
            </div>
        </div>
    </div>

    <!-- Icon -->
    <div class="chatIcon text-center d-flex align-items-center justify-content-center" onclick="showChatBox()">
        <i class="fa-regular fa-comment" id="chatOpenIcon"></i>
        <i class="fa-solid fa-xmark" id="chatCloseIcon"></i>
    </div>

    <script>
        $(document).ready(function() {
            $("#chatQuery").on("click", function() {
                $chatQuery = $("#queryMessage").val();
                if ($chatQuery) {
                    $askedQuestion = '<div class="userMessageContainer d-flex justify-content-end"><div class="userMessage"><small class="d-block text-white-50"><i class="fa-solid fa-user-secret"></i></small><p class="m-0">' + $chatQuery + '</p></div></div>';
                    $("#chatBotBody").append($askedQuestion);
                    $("#queryMessage").val('');

                    $.ajax({
                        url: './controller.php',
                        type: 'POST',
                        data: 'queryMessage=' + $chatQuery,
                        success: function(queryAnswer) {
                            $reply = '<div class="botMessage"><p class="m-0">' + queryAnswer + '</p></div>';
                            $("#chatBotBody").append($reply);
                            $("#chatBotBody").scrollTop($("#chatBotBody")[0].scrollHeight);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>