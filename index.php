<?php 
    include "part/nav.php";
    
    // content
    $content1 = $_GET['navbar'] ?? 'part/comingsoon';
    if (isset($content1)){
        include $content1 . ".php";
    }else {
        echo "<h1>Gagal memuat halaman</h1>";
    }
?>
<form method="GET">
    <button type="submit" name="navbar" value="part/comingsoon2">
        Ganti halaman
    </button>
</form>