<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>
    <body style="padding-left: 30px;">
        <style>
            .glyphicon{
                font-size: 2em;
            }
            .special{
                font-size: 2em;
            }
        </style>
        <h1>Iconify</h1><p>Turn ugly hashes into beautiful icons</p><br>
        <p>Pull requests are welcome.</p>
        <hr>

        <h2>TEST : </h2>
        You can test with these hashes: <br>
        df226c2c6dcb1d995c0299a33a084b201544293c31fc3d279530121d36bbcea9 <br>
        d89c92b4400b15c39e462a8caa939ab40c3aeeea:1234 <br>
        $racf$*USER*FC2577C6EBE6265B<br>



        <form action="index.php" method="get">
            <input type="text" name="msg">
            <button type="submit">Submit</button>
        </form>
        <span> iconHash : </span>
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] != "") {
            $msg = $_GET['msg'];
            $broken = str_split($msg);
            $i = 0;
            $len = 0;
            if (count($broken) % 2 == 1) {
                $len = 1;
            }
            $icon = "";
            $color = "";
            $col = 0;
            for ($index = 0; $index < count($broken); $index++) {

                if (is_numeric($broken[$index])) {
                    $color = colorify($broken[$index]);
                    $col++;
                    if ($col == 2) {
                        $icon = "glyphicon-stop";
                        $col = 0;
                    }

                    if ($index == count($broken) - 1) {
                        $icon = "glyphicon-stop";
                    }
                } else {

                    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $broken[$index])) {
                        echo ("<span class='special'>" . $broken[$index] . "</span>");
                    }

                    $icon = iconify($broken[$index]);
                }

                if (isset($icon) && $icon != NULL) {
                    if ($color == NULL) {
                        $color = "black";
                    }
                }

                if ($icon != NULL && $color != NULL) {
                    echo '<span style="color:' . $color . '" class="glyphicon ' . $icon . '"></span>';
                    $color = NULL;
                    $icon = NULL;
                }
            }
        }
        ?>
        <hr>
        <br>
        Find the project on <a href="https://github.com/RaedsLab/Iconify">Github</a>.
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-52412775-1', 'auto');
            ga('send', 'pageview');
        </script>


    </body>
</html>

<?php

function iconify($char) {

    if (strlen($char) != 1) {
        return -1;
    }
    if (!ctype_alpha($char)) {
        return -1;
    }
    $upper = strtoupper($char);

    switch ($upper) {
        case 'A':
            return "glyphicon-cloud";
        case 'B':
            return "glyphicon-envelope";
        case 'C':
            return "glyphicon-pencil";
        case 'D':
            return "glyphicon-heart";
        case 'E':
            return "glyphicon-star";
        case 'F':
            return "glyphicon-trash";
        case 'G':
            return "glyphicon-home";
        case 'H':
            return "glyphicon-road";
        case 'I':
            return "glyphicon-lock";
        case 'J':
            return "glyphicon-flag";
        case 'K':
            return "glyphicon-headphones";
        case 'L':
            return "glyphicon-camera";
        case 'M':
            return "glyphicon-gift";
        case 'N':
            return "glyphicon-fire";
        case 'O':
            return "glyphicon-eye-open";
        case 'P':
            return "glyphicon-plane";
        case 'Q':
            return "glyphicon-magnet";
        case 'R':
            return "glyphicon-bell";
        case 'S':
            return "glyphicon-globe";
        case 'T':
            return "glyphicon-phone-alt";
        case 'U':
            return "glyphicon-scissors";
        case 'V':
            return "glyphicon-sunglasses";
        case 'W':
            return "glyphicon--tree-deciduous";
        case 'X':
            return "glyphicon-remove";
        case 'Y':
            return "glyphicon-wrench";
        case 'Z':
            return "glyphicon-user";
    }
}

function colorify($char) {

    if (strlen($char) != 1) {
        return -1;
    }
    if (!is_numeric($char)) {
        return -1;
    }
    $upper = strtoupper($char);

    switch ($upper) {
        case '0':
            return "#ff0000";
        case '1':
            return "#ff9100";
        case '2':
            return "#ddff00";
        case '3':
            return "#4cff00";
        case '4':
            return "#00ffd4";
        case '5':
            return "#0099ff";
        case '6':
            return "#0008ff";
        case '7':
            return "#ff00e5";
        case '8':
            return "#ff0055";
        case '9':
            return "#448700";
    }
}
?>

