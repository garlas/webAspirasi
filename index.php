<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MPK SMAN 1 GEDEG</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: #f0f0f5;
        color: #333;
        overflow-x: hidden;
      }

      /* Navbar */
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 1rem; /* Mengurangi padding agar navbar lebih kecil */
        position: fixed;
        width: 100%;
        top: 0;
        background: rgba(255, 255, 255, 0.9);
        z-index: 1000;
        transition: all 0.6s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .navbar h3 {
        font-size: 1.2rem; /* Memperkecil ukuran font */
        font-weight: 500;
        letter-spacing: 1px;
        color: #333;
      }

      .navbar img {
        height: 50px; /* Memperkecil ukuran gambar logo */
        animation: float 3s ease-in-out infinite;
      }

      /* Responsif untuk layar kecil */
      @media (max-width: 768px) {
        .navbar {
          padding: 0.5rem 0.8rem; /* Mengurangi padding pada layar lebih kecil */
        }

        .navbar h3 {
          font-size: 1rem; /* Ukuran font lebih kecil pada layar kecil */
        }

        .navbar img {
          height: 40px; /* Memperkecil logo pada layar kecil */
        }
      }

      @keyframes float {
        0% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-7px);
        }
        100% {
          transform: translateY(0);
        }
      }

      /* Hero Section */
      .hero {
        height: calc(100vh - 10px);
        max-height: 600px; /* Batas maksimum tinggi */
        background: url("img/q.jpeg") no-repeat center center/cover;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        padding: 0 2rem; /* Tambahkan padding horizontal */
        border-radius: 30px;
        box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        max-width: 90%; /* Batasi lebar keseluruhan */
        margin: 100px auto 20px; /* Jarak di kanan dan kiri */
      }

      .hero h2,
      .hero p {
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 20px;
        border-radius: 10px;
        transition: all 0.5s ease-in-out;
      }

      .hero h2 {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #f0f0f5;
      }

      .hero p {
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        color: #ddd;
      }

      /* Responsif untuk layar besar (laptop) */
      @media (min-width: 1024px) and (max-width: 1440px) {
        .hero {
          height: 500px;
          max-width: 80%; /* Persempit lebar hero */
          padding: 0 3rem; /* Tambahkan padding lebih banyak di laptop */
          background-size: cover;
        }
      }
      /* Menu Aspirasi */
      .aspirasi-menu {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 2rem 0;
        padding: 1rem;
        background-color: #eaeaea;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        gap: 1rem;
        width: 80%;
        max-width: 400px;
        margin: 50px auto;
      }

      .aspirasi-menu a {
        display: none; /* Disembunyikan secara default */
        color: #333;
        text-decoration: none;
        font-size: 1.2rem;
        padding: 0.8rem 1.5rem;
        border-radius: 50px;
        background: linear-gradient(45deg, #fdc830, #f37335);
        transition: all 0.3s ease, transform 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        width: 100%;
        text-align: center;
      }

      .aspirasi-menu a.show {
        display: block; /* Tampilkan menu saat memiliki class 'show' */
        animation: fadeIn 0.5s ease-in-out;
      }

      .aspirasi-menu a:hover {
        background: linear-gradient(45deg, #ffdd57, #b67a6b);
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }

      .aspirasi-menu a:active {
        transform: translateY(0);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      /* Animasi FadeIn */
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Tombol untuk Menampilkan Menu */
      .toggle-btn {
        background: linear-gradient(45deg, #6dd5ed, #2193b0);
        color: #fff;
        font-size: 1rem;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      .toggle-btn:hover {
        background: linear-gradient(45deg, #2193b0, #6dd5ed);
      }

      @media (max-width: 768px) {
        .aspirasi-menu a {
          font-size: 1rem;
          padding: 0.6rem 1rem;
        }
      }

      @media (max-width: 480px) {
        .aspirasi-menu {
          flex-direction: column;
        }

        .aspirasi-menu a {
          width: 100%;
          text-align: center;
        }
      }

      .aspirasi-counter {
        text-align: center;
        margin-top: 2rem;
        padding: 1rem;
        background-color: #e0dfde;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .aspirasi-counter h4 {
        font-size: 1.5rem;
        color: #333;
      }

      .aspirasi-counter p {
        font-size: 2rem;
        font-weight: bold;
        color: #f37335;
        margin-top: 0.5rem;
      }

      /* Section Content */
      .content {
        padding: 5rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        background: #ffffff;
        color: #333;
      }

      .content h3 {
        font-size: 2.5rem;
        margin-bottom: 2rem;
        color: #f37335;
      }

      .content p {
        font-size: 1.1rem;
        max-width: 800px;
        margin-bottom: 3rem;
        color: #666;
      }

      /* Gallery */
      .gallery {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        justify-content: center;
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s ease-in-out;
      }

      .gallery img {
        width: 300px;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, opacity 0.3s ease;
      }

      .gallery img:hover {
        transform: scale(1.1);
        opacity: 0.8;
      }

      /* Footer */
      .footer {
        background-color: #e0dfde;
        color: rgb(23, 23, 23);
        text-align: center;
        padding: 1rem;
        margin-top: 3rem;
      }

      /* Animasi */
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-50px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Responsif */
      @media (max-width: 768px) {
        .navbar h3 {
          font-size: 1.2rem;
        }

        .hero h2 {
          font-size: 2.2rem;
        }

        .hero {
          border-radius: 20px;
          height: auto;
          max-width: 95%;
        }

        .gallery img {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <div class="navbar" id="navbar">
        <img src="img/d.png" alt="Astronot Logo" />
        <h3>MPK SMAGE</h3>
      </div>
    </header>
    <!-- Hero Section -->
    <div class="hero">
      <h2>Jelajahi Ruang Aspirasi</h2>
      <p>
        Bergabunglah dengan kami untuk mengeksplorasi ide-ide kreatif, inovasi,
        dan prestasi bersama MPK.
      </p>
    </div>

    <!--menu aspirasi-->
    <div class="aspirasi-menu">
      <a href="aspirasi.php" class="show">Kirim Aspirasi</a>
      <a href="#form-aspirasi">Tentang MPK</a>
      <a href="dokumen.php">Program Kerja</a>
      <a href="login.php">Admin</a>
      <button class="toggle-btn" onclick="showNextMenu()">⇩</button>
    </div>

<?php
include 'db.php'; // Menghubungkan dengan file koneksi database

// Ambil jumlah aspirasi dari tabel
$sql = "SELECT jumlah FROM counter WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data jumlah yang ada
    $row = $result->fetch_assoc();
    $jumlah = $row['jumlah'];
} else {
    $jumlah = 0; // Jika tidak ada data, anggap jumlah = 0
}

$conn->close();
?>


    <!-- Menampilkan jumlah aspirasi -->
    <div class="aspirasi-counter">
      <h4>Jumlah Aspirasi Terkirim:</h4>
      <p id="aspirasi-count"><?php echo $jumlah; ?></p>
    </div>

    <!-- Section Content -->
    <section class="content">
      <h3 id="form-aspirasi">Tentang MPK</h3>
      <p>
        Majelis Perwakilan Kelas / MPK adalah organisasi di sekolah SMAN 1 GEDEG
        yang bertugas mengawasi kinerja OSIS dalam menjalankan tugasnya. Dan
        juga MPK yaitu satu-satunya organisasi yang ada di sekolah dan
        dikhususkan untuk mengamati hasil kinerja OSIS.
      </p>
      <!-- Gambar Galeri -->
      <div class="gallery" id="gallery">
        <img src="img/mpk1.jpg" alt="foto 1" />
        <img src="img/mpk2.jpg" alt="foto 2" />
        <img src="img/mpk3.jpg" alt="foto 3" />
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <p>&copy; 2024 Komisi D - MPK SMAGE</p>
    </footer>

    <script>
      let currentIndex = 0;
      const menuLinks = document.querySelectorAll(".aspirasi-menu a");
      const toggleButton = document.querySelector(".toggle-btn");

      function showNextMenu() {
        if (currentIndex < menuLinks.length - 1) {
          currentIndex++;
          menuLinks[currentIndex].classList.add("show");
        } else {
          toggleButton.style.display = "none"; // Sembunyikan tombol setelah semua menu ditampilkan
        }
      }

      const contentSection = document.querySelector(".content");
      const gallery = document.getElementById("gallery");
      const aspirasiMenu = document.querySelector(".aspirasi-menu");

      // Fungsi untuk memeriksa posisi elemen dan menambahkan animasi
      function handleScroll() {
        const contentPosition = contentSection.getBoundingClientRect().top;
        const galleryPosition = gallery.getBoundingClientRect().top;
        const screenPosition = window.innerHeight;

        if (contentPosition < screenPosition) {
          contentSection.querySelector("h3").style.opacity = "1";
          contentSection.querySelector("h3").style.transform = "translateY(0)";
          contentSection.querySelector("p").style.opacity = "1";
          contentSection.querySelector("p").style.transform = "translateY(0)";
        }

        if (galleryPosition < screenPosition) {
          gallery.style.opacity = "1";
          gallery.style.transform = "translateY(0)";
        }

        if (aspirasiMenu.getBoundingClientRect().top < screenPosition) {
          aspirasiMenu.style.opacity = "1";
          aspirasiMenu.style.transform = "translateY(0)";
        }
      }

      // Tambahkan event listener untuk scroll
      window.addEventListener("scroll", handleScroll);

      // Navbar selalu muncul
      window.addEventListener("load", function () {
        document.getElementById("navbar").classList.add("show");
      });

      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
          });
        });
      });
    </script>
  </body>
</html>
