<!DOCTYPE html>
<html>
    <head>
        <title>פוריה קורן זילבר</title>
        <meta name="theme-color" content="#5A6FD8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>

        <div class="wrap">
            <ul id="nav">
                <li><a href="#" class="on">צור קשר</a></li>
                <li><a href="navigation.html">מפה</a></li>
                <li><a href="therapy.html">סוגי טיפול</a></li>
                <li><a href="about.html">אודות</a></li>
                <li><a href="index.html">דף הבית</a></li>
            </ul>
        </div>

        <a id="nav_but">
            <div id="toggle">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
        </a>
        <div class="navshadow"></div>

        <div id="mobilenav">
            <li><a href="index.html">דף הבית</a></li>
            <li><a href="about.html">אודות</a></li>
            <li><a href="therapy.html">סוגי טיפול</a></li>
            <li><a href="navigation.html">מפה</a></li>
            <li><a href="contact.php" class="on">צור קשר</a></li>
        </div>

        <div class="content">
             <div id="about">
                <h3>יצירת קשר</h3>

                <div id="email">
                    <?php
                        function has_header_injection($str)
                        {
                            return preg_match("/[\r\n]/", $str);
                        }

                        if(isset($_post['submit']))
                        {
                            $name = trim($_post['name']);
                            $mail = trim($_post['mail']);
                            $number = trim($_post['number']);
                            $comment = $_post['comment'];

                            if(has_header_injection($name) ||
                                has_header_injection($mail) ||
                                has_header_injection($number))
                            {
                                die();
                            }

                            if (!$name || !$number && !$mail){
                                echo "<h4 class='error'>חובה לציין לפחות אמצעי תקשורת אחד ושם</h4><a class='button'>נסה שוב</a>";
                                exit;
                            }

                            $to = "poriyakoren@gmail.com";
                            $subject  = "$name שלח הודעה בקשר לטיפול";
                            $message  = "Name: $name\r\n";
                            $message .= "Email: $mail\r\n"; #may not work if only phone is given
                            $message .= "Phone number: $number\r\n"; #may not work if only email is given
                            $message .= "Message: \r\n$comment";

                            $message = wordwrap($message, 72);

                            $headers  = "MINE-Version: 1.0\r\n";
                            $headers .= "content-type: text/plain; charset=iso-8859-1\r\n";
                            $headers .= "From: $name <$mail>\r\n";
                            $headers .= "X-Priority: 1\r\n";
                            $headers .= "X-MSMail-Priority: High\r\n\r\n";

                            mail($to, $subject, $message, $headers);

                    ?>

                    <!-- show success message -->
                    <div id="success">
                        <h5>תודה ששלחתם את הפרטים,</h5>
                        <p>אצור קשר בקרוב</p>
                        <a href="index.html" class="button">חזרה לדף הבית</a>
                    </div>

                    <?php } else{ ?>

                    <form method="post" action="" enctype="text/plain">
                        <label for="name">:שם</label><br>
                        <input type="text" id="name" name="name" placeholder="שם"><br>

                        <label for="mail">:דואר אלקטרוני</label><br>
                        <input type="email" id="mail" name="mail" placeholder="דואר אלקטרוני"><br>

                        <label for="number">:טלפון נייד</label><br>
                        <input type="text" id="number" name="number" placeholder="טלפון נייד"><br>

                        <label for="comment">:הערות</label><br>
                        <textarea id="comment" name="comment" placeholder="הערות" rows="4" cols="50"></textarea><br><br>

                        <input type="submit" name="submit" value="שלח הודעה">
                    </form>
                    <?php } ?>
                </div>
            </div>


            <div class="footer_wrap">
                <div id="footer">
                    <a href="tel:+9720523555411">052-355-5411</a>
                    <span>|</span>
                    <a href="mailto:poriyakoren@gmail.com">poriyakoren@gmail.com</a>
                    <span>|</span>
                    <a href="https://goo.gl/M2kBfY">רמז 14, רמת גן</a>
                    <span>|</span>
                    <a href="https://goo.gl/M2kBfY">דרך יבנה 34, רחובות</a>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>
</html>