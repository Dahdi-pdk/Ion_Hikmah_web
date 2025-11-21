<?php
// GitHub Copilot
// Simple "Coming Soon" page with countdown and email subscription (saves to subscriptions.txt)
date_default_timezone_set('Asia/Jakarta');
$launchDate = '2025-12-01 00:00:00'; // Ubah sesuai kebutuhan (YYYY-MM-DD HH:MM:SS)
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $line = date('Y-m-d H:i:s') . " | " . $email . PHP_EOL;
        @file_put_contents(__DIR__ . '/subscriptions.txt', $line, FILE_APPEND | LOCK_EX);
        $message = 'Terima kasih — email Anda telah disimpan.';
    } else {
        $message = 'Alamat email tidak valid.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Segera Hadir — Coming Soon</title>
    <style>
        :root{
            --bg:#0b1020;
            --card:#0f1724;
            --accent:#6ee7b7;
            --muted:#bfc8d8;
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            padding:0;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background: radial-gradient(1200px 600px at 10% 10%, rgba(110,231,183,0.06), transparent),
                        radial-gradient(900px 500px at 90% 90%, rgba(99,102,241,0.04), transparent),
                        var(--bg);
            color:#fff;
            font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        .card{
            width: min(920px, 94%);
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border:1px solid rgba(255,255,255,0.04);
            padding:32px;
            border-radius:12px;
            text-align:center;
            box-shadow: 0 10px 40px rgba(2,6,23,0.6);
        }
        h1{ margin:0 0 8px; font-size:2rem; letter-spacing:2px; text-transform:uppercase;}
        p.lead{ margin:0 0 20px; color:var(--muted); }
        .countdown{ display:flex; gap:16px; justify-content:center; margin:18px 0 22px; }
        .unit{ background:var(--card); padding:14px 18px; border-radius:8px; min-width:72px; }
        .unit .num{ font-size:1.6rem; font-weight:700; color:var(--accent); }
        .unit .lbl{ font-size:0.75rem; color:var(--muted); margin-top:6px; display:block; text-transform:uppercase; letter-spacing:1px;}
        form{ display:flex; gap:8px; justify-content:center; align-items:center; flex-wrap:wrap; margin-top:6px;}
        input[type="email"]{
            padding:12px 14px;
            border-radius:8px;
            border:1px solid rgba(255,255,255,0.06);
            background:transparent;
            color:#fff;
            min-width:260px;
        }
        button{
            padding:12px 16px;
            border-radius:8px;
            border:0;
            background:linear-gradient(90deg,var(--accent),#34d399);
            color:#06201a;
            font-weight:700;
            cursor:pointer;
        }
        .meta{ margin-top:14px; color:var(--muted); font-size:0.9rem; }
        .links{ margin-top:10px; display:flex; justify-content:center; gap:12px; }
        a.small{ color:var(--muted); text-decoration:none; font-size:0.9rem; padding:6px 10px; border-radius:6px; transition:all .15s; }
        a.small:hover{ background:rgba(255,255,255,0.02); color:#fff; }
        .msg{ margin-top:12px; font-size:0.95rem; color:#b7f5dd; }
        @media(max-width:520px){
            .countdown{ gap:8px; flex-wrap:wrap; }
            .unit{ min-width:62px; padding:10px 12px; }
        }
    </style>
</head>
<body>
    <div class="card" role="region" aria-label="Coming soon">
        <h1>Segera Hadir</h1>
        <p class="lead">Kami sedang menyiapkan konten. Nantikan peluncurannya.</p>

        <div class="countdown" id="countdown" aria-live="polite">
            <div class="unit"><div class="num" id="days">--</div><div class="lbl">Hari</div></div>
            <div class="unit"><div class="num" id="hours">--</div><div class="lbl">Jam</div></div>
            <div class="unit"><div class="num" id="minutes">--</div><div class="lbl">Menit</div></div>
            <div class="unit"><div class="num" id="seconds">--</div><div class="lbl">Detik</div></div>
        </div>

        <form method="post" novalidate>
            <label for="email" class="sr-only" style="position:absolute;left:-9999px">Email</label>
            <input id="email" name="email" type="email" placeholder="Masukkan email untuk pemberitahuan" required />
            <button type="submit">Beritahu Saya</button>
        </form>

        <?php if ($message): ?>
            <div class="msg" role="status"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <div class="meta">Perkiraan peluncuran: <?php echo date('d F Y, H:i', strtotime($launchDate)); ?> (WIB)</div>

        <div class="links">
            <a class="small" href="/" title="Kembali ke beranda">Kembali ke Beranda</a>
            <a class="small" href="mailto:info@example.com">Hubungi Kami</a>
        </div>
    </div>

    <script>
        // Countdown logic using server-provided launch date
        (function(){
            const launch = new Date("<?php echo date('Y-m-d H:i:s', strtotime($launchDate)); ?>").getTime();
            const daysEl = document.getElementById('days');
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');

            function update(){
                const now = Date.now();
                let diff = Math.max(0, launch - now);
                const s = Math.floor(diff/1000);
                const days = Math.floor(s/86400);
                const hours = Math.floor((s % 86400)/3600);
                const minutes = Math.floor((s % 3600)/60);
                const seconds = s % 60;

                daysEl.textContent = String(days).padStart(2,'0');
                hoursEl.textContent = String(hours).padStart(2,'0');
                minutesEl.textContent = String(minutes).padStart(2,'0');
                secondsEl.textContent = String(seconds).padStart(2,'0');

                if (diff <= 0) {
                    clearInterval(timer);
                    document.querySelector('.lead').textContent = 'Situs telah diluncurkan — silakan periksa!';
                }
            }

            update();
            const timer = setInterval(update, 1000);
        })();
    </script>
</body>
</html>
