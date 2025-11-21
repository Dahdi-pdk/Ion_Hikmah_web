<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ion Hikmah</title>
    <!-- Style css -->
    <link rel="stylesheet" href="style.css">

    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Titan+One&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container-logo">
            <div class="logo">
                <img src="https://worldhealth-net.translate.goog/wp-content/uploads/2024/03/AdobeStock_261093985-696x696.jpeg?_x_tr_sl=en&_x_tr_tl=id&_x_tr_hl=id&_x_tr_pto=imgs"
                    alt="" />

            </div>
            <h1>Ion Hikmah</h1>
        </div>

        <nav class="navbar">
            <button onclick="location.href='?navbar=part/comingsoon'" for="navForm" type="submit" name="navbar" value="part/comingsoon" class="navigasi active" onclick="navClicked(this)">
                <p class="home">Home</p>
            </button>
            <button onclick="location.href='?navbar=part/comingsoon2'" value='part/comingsoon2' name="navbar" class="navigasi" onclick="navClicked(this)">
                <p class="content">Content</p>
            </button>

        </nav>

    </header>

    <!-- Content -->
    <!-- <iframe src="part/comingsoon.html" frameborder="0" style="width: 100%;height: 100vh;"></iframe> -->

    <script>
        function navClicked(navActive) {
            console.log("navClicked djalankan");

            all = document.querySelectorAll(".navigasi");
            all.forEach(element => {
                element.classList.remove("active");
            });

            navActive.classList.add("active");

        }
    </script>
</body>

</html>