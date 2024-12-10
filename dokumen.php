<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komisi D - Aspirasi</title>
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
        background-color: #f0f4f8;
        color: #333;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
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

      .navbar h1 {
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

        .navbar h1 {
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

      h2 {
        font-size: 2.5rem;
        color: #16a085;
        text-align: center;
        margin: 4rem 0 2rem; /* Margin atas yang lebih besar untuk menghindari tumpang tindih dengan navbar */
        opacity: 0;
        transform: translateY(50px);
        animation: fadeIn 1s forwards;
      }

      .container {
        padding: 2rem 1rem; /* Padding untuk konten */
        flex-grow: 1; /* Menggunakan sisa ruang di antara header dan footer */
        display: flex;
        flex-direction: column;
        align-items: center; /* Mengatur konten agar terpusat */
      }

      .komisi {
        background: #ffffff;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.7s forwards;
        width: 100%;
        max-width: 600px; /* Membatasi lebar maksimum */
        text-align: center; /* Menjaga teks tetap terpusat */
      }

      .komisi:nth-child(2) {
        animation-delay: 0.3s;
      }

      .komisi:nth-child(3) {
        animation-delay: 0.6s;
      }

      .komisi:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }

      .komisi h3 {
        color: #2c3e50;
        font-size: 1.8rem;
        margin-bottom: 1rem;
      }

      .komisi p {
        color: #666;
        font-size: 1rem;
        display: none;
        margin-top: 0.5rem; /* Menambahkan margin atas pada paragraf */
      }

      .komisi.active p {
        display: block;
        animation: slideDown 0.5s ease-in-out forwards;
      }

      @keyframes slideDown {
        0% {
          opacity: 0;
          max-height: 0;
        }
        100% {
          opacity: 1;
          max-height: 200px;
        }
      }

      @keyframes fadeIn {
        0% {
          opacity: 0;
          transform: translateY(50px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes fadeInUp {
        0% {
          opacity: 0;
          transform: translateY(30px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #e74c3c;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        text-align: center;
      }

      .back-button:hover {
        background-color: #c0392b;
      }

      .footer {
        background-color: #e0dfde;
        color: rgb(23, 23, 23);
        text-align: center;
        padding: 1rem 0;
        margin-top: auto;
      }

      .footer p {
        font-size: 0.9rem;
      }

      /* Responsif */
      @media (max-width: 768px) {
        h2 {
          font-size: 2rem;
        }

        .komisi h3 {
          font-size: 1.4rem;
        }

        .container {
          padding: 1rem;
        }

        .navbar h1 {
          font-size: 1.2rem;
        }
      }

      @media (max-width: 480px) {
        .komisi {
          padding: 1rem;
        }

        h2 {
          font-size: 1.8rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <header class="navbar" id="navbar">
      <img src="img/d.png" alt="Logo" />
      <h1>MPK SMAGE</h1>
    </header>

    <!-- Konten Aspirasi -->
    <div class="container">
      <h2>Daftar Proker Komisi D</h2>

      <div class="komisi" id="komisi1">
        <h3>Aspirasi Box</h3>
        <p>
          Aspirasi Box adalah inisiatif untuk menyediakan wadah fisik di mana
          siswa dapat menyampaikan aspirasi, ide, dan masukan mereka secara
          langsung. Dengan meletakkan kotak aspirasi dibagian-bagian sekolah,
          kami berusaha menciptakan lingkungan yang mendukung komunikasi dua
          arah antara siswa dan pengurus OSIS/MPK.
        </p>
      </div>

      <div class="komisi" id="komisi2">
        <h3>Aspirasi Online</h3>
        <p>
          Aspirasi Online adalah platform digital yang dirancang untuk
          memfasilitasi pengumpulan aspirasi dan ide dari seluruh siswa. Melalui
          inisiatif ini, siswa dapat dengan mudah menyampaikan harapan dan
          masukan mereka tanpa harus bertatap muka, menjadikan proses lebih
          efisien.
        </p>
      </div>

      <div class="komisi" id="komisi3">
        <h3>Aspiration Day</h3>
        <p>
          Hari Aspirasi adalah inisiatif untuk mengumpulkan berbagai aspirasi
          dan ide dari seluruh kelas di sekolah. Kegiatan ini bertujuan untuk
          mendengarkan suara siswa dan memastikan bahwa setiap aspirasi
          diperhitungkan dalam perencanaan acara yang akan datang.
        </p>
      </div>

      <a class="back-button" href="index.html">Kembali ke Halaman Utama</a>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <p>&copy; 2024 Komisi D - MPK SMAGE</p>
    </footer>

    <script>
      // Animasi navbar hide saat scroll down
      window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }
      });

      // Menampilkan deskripsi saat diklik
      document.querySelectorAll(".komisi").forEach((komisi) => {
        komisi.addEventListener("click", () => {
          komisi.classList.toggle("active");
        });
      });
    </script>
  </body>
</html>
