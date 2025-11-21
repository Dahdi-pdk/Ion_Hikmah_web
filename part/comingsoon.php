<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>

    <style>
        /* Fullscreen Coming Soon */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .coming-soon {
            height: 100vh;
            width: 100%;
            background: linear-gradient(135deg, #1e1e1e, #333);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 20px;
        }

        .cs-content h1 {
            font-size: 4rem;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .cs-content p {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.8;
        }

        /* Timer */
        .timer {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .timer div {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px 20px;
            border-radius: 10px;
            min-width: 80px;
        }

        .timer span {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }

        .timer small {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Responsif */
        @media (max-width: 600px) {
            .cs-content h1 {
                font-size: 2.5rem;
            }
            .timer {
                gap: 10px;
            }
            .timer div {
                min-width: 60px;
                padding: 10px;
            }
            .timer span {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <section class="coming-soon">
        <div class="cs-content">
            <h1>Coming Soon</h1>
            <p>Halaman ini sedang dalam pengembangan. Nantikan pembaruan terbaru dari kami.</p>

            <div class="timer">
                <div><span id="days">00</span><small>Hari</small></div>
                <div><span id="hours">00</span><small>Jam</small></div>
                <div><span id="minutes">00</span><small>Menit</small></div>
                <div><span id="seconds">00</span><small>Detik</small></div>
            </div>
        </div>
    </section>

    <script>
        // Set target tanggal (ubah sesuai kebutuhan)
        let target = new Date("Dec 31, 2025 23:59:59").getTime();

        setInterval(function () {
            let now = new Date().getTime();
            let gap = target - now;

            let days = Math.floor(gap / (1000 * 60 * 60 * 24));
            let hours = Math.floor((gap % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((gap % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((gap % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;
        }, 1000);
    </script>

</body>
</html>
