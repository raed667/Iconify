<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

        <script>
            function putInField(hash) {
                var input = document.getElementById("msg");
                input.value = hash.innerHTML;
            }
        </script>
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
        <h1>Iconify</h1><p>Turn ugly hashes into beautiful icons</p
        <p>Pull requests are welcome.</p>
        <hr>
        <h2>TEST : </h2>
        You can test with these hashes: <br>
        <a onclick="putInField(this)" class="hash">$racf$*USER*FC2577C6EBE6265B</a><br>
        <a onclick="putInField(this)" class="hash">df226c2c6dcb1d995c0299a33a084b201544293c31fc3d279530121d36bbcea9</a><br>
        <a onclick="putInField(this)" class="hash">d89c92b4400b15c39e462a8caa939ab40c3aeeea:1234</a>

        <form action="index.php" method="get">
            <input style="width: 400px;" id="msg" type="text" name="msg"><br>
            <button type="submit">Submit</button>
        </form>
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] != "") {
            $msg = $_GET['msg'];

            require './src/Iconify.php';
            $iconify = new Iconify\Iconify();

            $buffer = $iconify->doIt($msg);

            echo "<span>IconHash: </span>";
            foreach ($buffer as $icon) {
                echo '<span style="color:' . $icon["color"] . '" class="glyphicon ' . $icon["icon"] . '"></span>';
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
