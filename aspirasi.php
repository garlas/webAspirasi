<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASPIRASI SMAN 1 GEDEG</title>
    <style>
      /* Gaya Umum */
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

      /* Container Form Aspirasi */
      .report-form {
        max-width: 600px; /* Batas maksimum lebar */
        width: 90%; /* Menyesuaikan lebar pada layar kecil */
        margin: 6rem auto 2rem;
        padding: 2rem;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 120px;
      }

      .report-form h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #3a3f51; /* Warna judul sesuai tema */
        font-size: 2rem;
      }

      /* Input Group Styling */
      label {
        font-size: 1rem;
        color: #333;
        display: block;
        margin-bottom: 0.5rem;
      }

      input[type="text"],
      textarea,
      select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        margin-bottom: 1rem;
        background-color: #f5f5f5;
        transition: border-color 0.3s ease;
      }

      input[type="text"]:focus,
      textarea:focus,
      select:focus {
        border-color: #3a3f51; /* Sesuaikan dengan warna utama */
        outline: none;
      }

      /* Tombol Submit */
      button {
        background: linear-gradient(135deg, #f76b1c 0%, #ffdd57 100%);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        font-size: 1.2rem;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        font-weight: bold;
        display: block;
        margin: 0 auto;
      }

      button:hover {
        background-color: #2e3442;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }

      /* Back Home Link */
      .back-home {
        display: block;
        text-align: center;
        margin-top: 1rem;
        color: #3a3f51;
        text-decoration: none;
      }

      .back-home:hover {
        text-decoration: underline;
      }

      .input-group.anonim-toggle {
        display: flex;
        align-items: center;
      }

      .input-group.anonim-toggle input {
        margin-right: 0.5rem; /* Memberi jarak antara checkbox dan teks */
      }

      /* Footer */
      .footer {
        background-color: #e0dfde;
        color: rgb(23, 23, 23);
        text-align: center;
        padding: 1rem;
        margin-top: 3rem;
      }

      /* Responsiveness */
      @media (max-width: 768px) {
        .report-form {
          padding: 1.5rem;
        }

        .navbar h3 {
          font-size: 1.5rem;
        }
      }

      @media (max-width: 480px) {
        button {
          width: 100%;
          padding: 0.75rem;
        }

        .navbar h3 {
          font-size: 1.3rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <div class="navbar" id="navbar">
        <img src="img/d.png" alt="Logo" />
        <h3>MPK SMAGE</h3>
      </div>
    </header>

 <!-- Form Aspirasi -->
<section id="report" class="report-form">
  <div class="container">
    <h2>Buat Aspirasi</h2>
    <form id="aspirasi-form" action="proses.php" method="post">
      <div class="input-group">
        <label for="name">Nama (Opsional):</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" />
      </div>

      <div class="input-group">
        <label for="kelas">Kelas:</label>
        <select id="kelas" name="kelas" required>
          <option value="" disabled selected>Pilih Kelas</option>
          <option value="10">Kelas 10</option>
          <option value="11">Kelas 11</option>
          <option value="12">Kelas 12</option>
        </select>
      </div>

      <div class="input-group">
        <label for="contact">Whatsapp/IG (kontak yang bisa dihubungi):</label>
        <input type="text" id="contact" name="contact" placeholder="Tidak Wajib Diisi" />
      </div>

      <div class="input-group">
        <label for="issue">Aspirasi:</label>
        <textarea id="issue" name="issue" rows="4" required placeholder="Tulis aspirasi Anda di sini..."></textarea>
      </div>

      <div class="input-group anonim-toggle">
        <input type="checkbox" id="anonim" name="anonim" />
        <label for="anonim">Kirim sebagai Anonim</label>
      </div>

      <button type="submit">Kirim Aspirasi</button>
    </form>
    <a href="index.php" class="back-home">Back Home</a>
  </div>
</section>



    <!-- Footer -->
    <div class="footer">
      <p>&copy; 2024 Komisi D - MPK SMAGE</p>
    </div>

    <script src="script.js"></script>
    <script>
      function disableFirstOption() {
        var select = document.getElementById("kelas");
        if (select.value !== "") {
          select.options[0].disabled = true;
        }
      }
    </script>
  </body>
</html>
