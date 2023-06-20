<?php
include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Biblion</title>

    <link rel="stylesheet" href="Biblion_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div id="banner" class="banner">
        <div id="navbar" class="navbar">
            <div class="dropdown">
                <div class="wrap">
                    <div class="icon"></div>
                    <div class="icon"></div>
                    <div class="icon"></div>
                </div>
                <div class="dropdown-content">
                    <a href="Biblion.php">HOME</a>
                    <a href="Rent.php">RENT</a>
                    <a href="SignIn.php">SIGN IN</a>
                </div>
            </div>
            <h1 id="Logo" class="Logo">BIBLION</h1>
            <ul>
                <li><a href="Biblion.php">HOME</a></li>
                <li><a href="Rent.php">RENT</a></li>
            </ul>
            <div class="search-container">
                <input type="text" class="searchbar" id="live_search" autocomplete="off" placeholder="Looking for something">
                <div class="search-result-container" id="searchresult"></div>
            </div>
            <c class="cta">
                <a href="SignIn.php"> <button type="button"><img src="images/user-3-fill.png"></button></a>
                <a href="cart.php"> <button type="button"><img src="images/shopping-cart3.png"></button>
                </a>
            </c>
        </div>
        <div class="containerfirst">
            <span>Renting Books Made Easy</span>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="slider-holder">
                    <div id="img1"></div>
                    <div id="img2"></div>
                    <div id="img3"></div>
                    <div id="img4"></div>
                    <div id="img5"></div>
                </div>
            </div>
            <div class="button-holder">
                <a href="#img1" class="dots"></a>
                <a href="#img2" class="dots"></a>
                <a href="#img3" class="dots"></a>
                <a href="#img4" class="dots"></a>
                <a href="#img5" class="dots"></a>
            </div>
        </div>
        <div class="Sub">
            <h1>GENRE<h1>
        </div>
        <?php
        echo
        "<div class='container2'>
                <div class='col1'>
                    <div class='text'>ADVENTURE</div>
                        <a href='Genre.php?id=1'>
                        <img src='images/DALL·E 2023-03-26 18.26.49 - line art of a mountain with a dark background.png'>
                        </a>
                </div>
                <div class='col1'>
                    <div class='text'>SCIENCE FICTION</div>
                        <a href='Genre.php?id=2'>
                        <img src='images/DALL·E 2023-03-26 18.27.50 - line art depicting science fiction with a dark background.png'>
                        </a>
                </div>
                <div class='col1'>
                    <div class='text'>NON-FICTION</div>
                        <a href='Genre.php?id=3'>
                        <img src='images/DALL·E 2023-03-26 18.28.49 - line art of a brain with a dark background.png'>
                        </a>
                </div>
                <div class='col1'>
                    <div class='text'>MYSTERY</div>
                        <a href='Genre.php?id=4'>
                        <img src='images/DALL·E 2023-03-27 21.35.56 - line art depicting mystery with a dark background.png'>
                        </a>
                </div>
            </div>
            <div class='container3'>
                <div class='col2'>
                    <div class='text'>HORROR</div>
                        <a href='Genre.php?id=5'>
                        <img src='images/DALL·E 2023-03-30 09.48.05 - line art of a paranormal activity with a dark background.png'>
                        </a>
                </div>
                <div class='col2'>
                    <div class='text'>ROMANTIC</div>
                        <a href='Genre.php?id=6'>
                        <img src='images/DALL·E 2023-03-30 09.45.03 - line art of a couple with a dark background.png'>
                        </a>
                </div>
                <div class='col2'>
                    <div class='text'>PARANORMAL</div>
                    <a href='Genre.php?id=7'>
                    <img src='images/DALL·E 2023-03-29 20.33.22 - line art depicting horror with a dark background.png'>
                    </a>
                </div>
                <div class='col2'>
                    <div class='text'>FANTASY</div>
                    <a href='Genre.php?id=8'>
                    <img src='images/DALL·E 2023-03-30 09.48.45 - line art of fantasy land with a dark background.png'>
                    </a>
                </div>
            </div>"
        ?>
    </div>

    <script>
        $(document).ready(function() {
            $(".wrap").click(function() {
                $(".dropdown-content").toggleClass("opensidebar")
            });
        });

        function changebg() {
            var scrollval = window.scrollY;
            var navbar = document.getElementById('navbar');
            if (scrollval < 620) {
                navbar.classList.remove('bgColor1');
            } else {
                navbar.classList.add('bgColor1');
            }
        }

        function changebg2() {
            var scrollval = window.scrollY;
            var navbar = document.getElementById('navbar');
            if (scrollval < 1670) {
                navbar.classList.remove('bgColor2');
            } else {
                navbar.classList.add('bgColor2');
            }
        }
        window.addEventListener('scroll', changebg)
        window.addEventListener('scroll', changebg2)

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                console.log(entry)
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show');
                }
            });
        });


        const hiddenElements1 = document.querySelectorAll('.col1');
        hiddenElements1.forEach((el) => observer.observe(el));
        const hiddenElements2 = document.querySelectorAll('.col2');
        hiddenElements2.forEach((el) => observer.observe(el));
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();

                if (input != "") {
                    $.ajax({
                        url: "live_search.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            });

            $(document).on("click", ".book-title", function() {
                var bookid = $(this).attr("id").replace("book", "");
                window.location.href = "bookpage.php?id=" + bookid.toString();
            });
        });
    </script>
    <?php include('footer.php') ?>
</body>

</html>