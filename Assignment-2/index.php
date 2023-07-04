<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS ELECTIVE</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<style>
    :root {
        --color-background: #f4f4f8;
        --color-primary: #267dab;
        --color-text: #1168d9e6;
        --color-paragraph: #575757;
        --color-1: #1b2730;
        --color-2: #6a9abd;
        --color-3: #46667d;
        --color-4: #23313d;
        --color-5: #1d2933;
        --scroll-bar-color: #c5c5c5;
        --scroll-bar-bg-color: #f6f6f6;
    }
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        padding: 0;
        background-color: var(--color-1);
        color: var(--color-2);
        height: 100vh;
    }
    .form-design {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 350px;
    }
    .form-design>form {
        display: flex;
        flex-direction: column;
        margin: auto;
        align-items: center;
        justify-content: center;
        gap: 0.4em;
        border: 1px solid wheat;
        padding: 1em;
        text-align: center;
    }
    .display-header {
        display: flex;
        flex-direction: column;
        padding: 2em;
        margin: 1em;
        border: 1px solid wheat;
    }
    .display-header h1 {
        margin-top: -0.5em;
    }
    input[type=text],
    input[type=number],
    input[type=date] {
        border-radius: 10px;
        margin-top: 1em;
        margin-bottom: 1em;
    }
    input[type=submit] {
        border-radius: 10px;
    }
</style>
<body>
    <div class="form-design">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="ao">
                <input type="radio" name="pick" id="ao" value="ao">
                AO
            </label>
            <label for="kg">
                <input type="radio" name="pick" id="kg" value="kg">
                KG</label>
            <label for="info">
                <input type="radio" name="pick" id="info" value="info">
                Info
            </label>
            <div class="information">
                <label for="fname" id='fname'>First Name:
                    <input type="text" name="fname" id='fname'>
                </label>
                <label for="lname" id="lname">Last Name:
                    <input type="text" name="lname" id="lname">
                </label>
                <label for="address" id="address">Address:
                    <input type="text" name="address" id="address">
                </label>
                <label for="bday" id="bday">Birthday:
                    <input type="date" name="bday" id="bday">
                </label>
            </div>
            <div class="AO">
                <label for="num1" id="num1">Num 1:
                    <input type="number" name="num1" id="num1">
                </label>
                <label for="num2" id="num2">Num 2:
                    <input type="number" name="num2" id="num2">
                </label>
            </div>
            <label for="kg" id="kglbs">KG to LBS:
                <input type="number" name="kglbs" id="kglbs">
            </label>
            <input type="submit" value="submit" id="submit">
            <?php
            error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                (string)$fname = $_POST['fname'];
                (string)$lname = $_POST['lname'];
                (string)$address = $_POST['address'];
                (int)$bday = $_POST['bday'];
                $pick = $_POST['pick'];
                $error = false;
                $required = array('fname', 'lname', 'address', 'bday');
                foreach ($required as $field) {
                    if (empty($_POST[$field])) {
                        $error = true;
                    }
                }
                if ($pick == "info") {
                    if ($error) {
                        echo "All fields are required.";
                    } else {
                        echo nl2br("<div class='display-header'><h1>Information Something</h1>First Name: $fname\n</h1>Last Name: $lname\nAddress: $address\nBirthday: $bday</div>");
                    }
                } else if ($pick == "ao") {
                    (int)$num1 =  (int)$_POST['num1'];
                    (int)$num2 =  (int)$_POST['num2'];
                    (int)$a =  (int)$num1 +  (int)$num2;
                    (int)$s =  (int)$num1 -  (int)$num2;
                    (int)$m =  (int)$num1 *  (int)$num2;
                    (int)$d =  (int)$num1 /  (int)$num2;
                    $required = array('num1', 'num2');
                    $error = false;
                    foreach ($required as $field) {
                        if (empty($_POST[$field])) {
                            $error = true;
                        }
                    }
                    if ($error) {
                        echo "All fields are required.";
                    } else {
                        echo nl2br("<div class='display-header'><h1>Ahrithmetic Operations</h1>Add: $a\nSub: $s\nMulti: $m\nDiv: $d</div>");
                    }
                } else if ($pick == "kg") {
                    (int)$kg = $_POST['kglbs'];
                    $required = array('kglbs');
                    $error = false;
                    foreach ($required as $field) {
                        if (empty($_POST[$field])) {
                            $error = true;
                        }
                    }
                    $ans = (float)$kg * 2.205;
                    if ($error) {
                        echo "All fields are required.";
                    } else {
                        echo nl2br("<div class='display-header'><h1>Conversion</h1>KG to LBS: $ans</div>");
                    }
                }
            }
            ?>
        </form>
    </div>
    <script>
        window.onload = function() {
            document.getElementById('fname').style.visibility = 'hidden';
            document.getElementById('lname').style.visibility = 'hidden';
            document.getElementById('address').style.visibility = 'hidden';
            document.getElementById('bday').style.visibility = 'hidden';
            document.getElementById('num1').style.visibility = 'hidden';
            document.getElementById('num2').style.visibility = 'hidden';
            document.getElementById('kglbs').style.visibility = 'hidden';
            document.getElementById('submit').style.visibility = 'hidden';
        }
        window.addEventListener("change", function() {
            if (document.getElementById('ao').checked) {
                document.getElementById('fname').style.visibility = 'hidden';
                document.getElementById('lname').style.visibility = 'hidden';
                document.getElementById('address').style.visibility = 'hidden';
                document.getElementById('bday').style.visibility = 'hidden';
                document.getElementById('num1').style.visibility = 'visible';
                document.getElementById('num2').style.visibility = 'visible';
                document.getElementById('kglbs').style.visibility = 'hidden';
                document.getElementById('submit').style.visibility = 'visible';
            } else if (document.getElementById('info').checked) {
                document.getElementById('fname').style.visibility = 'visible';
                document.getElementById('lname').style.visibility = 'visible';
                document.getElementById('address').style.visibility = 'visible';
                document.getElementById('bday').style.visibility = 'visible';
                document.getElementById('num1').style.visibility = 'hidden';
                document.getElementById('num2').style.visibility = 'hidden';
                document.getElementById('kglbs').style.visibility = 'hidden';
                document.getElementById('submit').style.visibility = 'visible';
            } else if (document.getElementById('kg').checked) {
                document.getElementById('fname').style.visibility = 'hidden';
                document.getElementById('lname').style.visibility = 'hidden';
                document.getElementById('address').style.visibility = 'hidden';
                document.getElementById('bday').style.visibility = 'hidden';
                document.getElementById('num1').style.visibility = 'hidden';
                document.getElementById('num2').style.visibility = 'hidden';
                document.getElementById('kglbs').style.visibility = 'visible';
                document.getElementById('submit').style.visibility = 'visible';
            }
        });
    </script>
</body>
</html>