document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#report form");
  const submitButton = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form secara default

    // Memperbaiki selector untuk input dan textarea
    const nama = document.querySelector('input[name="name"]').value.trim();
    const kelas = document.querySelector('input[name="kelas"]').value.trim();
    const kontak = document.querySelector('input[name="email"]').value.trim(); // Sesuaikan dengan name yang benar
    const teksAspirasi = document
      .querySelector('textarea[name="issue"]')
      .value.trim();

    // Validasi form, hanya memeriksa nama, kelas, dan aspirasi
    if (nama === "" || kelas === "" || teksAspirasi === "") {
      alert("Nama, Kelas, dan Aspirasi harus diisi!");
      return;
    }

    // Validasi teks asal ketik
    if (isGibberish(teksAspirasi)) {
      alert(
        "Aspirasi yang Anda kirim terlihat tidak valid. Silakan kirim aspirasi yang lebih jelas."
      );
      return;
    }

    submitButton.disabled = true; // Menonaktifkan tombol untuk mencegah pengiriman ganda

    const waktuKirim = new Date().toLocaleString(); // Mengambil waktu lokal

    const webhookUrl =
      "https://discord.com/api/webhooks/1274643187742281788/949FutOCV7wUpFr5642KasuS6B1D1W2dyKTUWqOzLhF0dYASVQXNK8fqtmVlGorfXeqj"; // Ganti dengan URL webhook Discord kamu

    const requestData = {
      embeds: [
        {
          title: "🚀 Aspirasi Baru",
          description: "Detail dari aspirasi yang baru dikirim:",
          color: 3447003,
          fields: [
            {
              name: "Pengirim",
              value: `Nama: ${nama}`,
              inline: false,
            },
            {
              name: "Kelas",
              value: `Kelas: ${kelas}`,
              inline: false,
            },
            {
              name: "Kontak",
              value: kontak ? `Kontak: ${kontak}` : "Tidak ada kontak",
              inline: false,
            },
            {
              name: "Aspirasi",
              value: teksAspirasi,
              inline: false,
            },
            {
              name: "Waktu Pengiriman",
              value: waktuKirim,
              inline: false,
            },
          ],
          footer: {
            text: "Formulir aspirasi mpk-smage",
          },
        },
      ],
    };

    fetch(webhookUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(requestData),
    })
      .then((response) => {
        if (response.ok) {
          alert("Terima Kasih Telah Berbagi Aspirasi :)");
          form.reset(); // Mengosongkan form setelah pengiriman
        } else {
          alert("Gagal mengirim aspirasi.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat mengirim aspirasi.");
      })
      .finally(() => {
        submitButton.disabled = false; // Mengaktifkan tombol kembali
      });
  });

  // Fungsi untuk memeriksa teks asal ketik
  function isGibberish(text) {
    const minWordLength = 3;
    const words = text.split(/\s+/);
    const minTotalLength = 10; // Minimal panjang total teks
    const maxTotalLength = 100000; // Maksimal panjang total teks

    // Cek panjang total teks
    if (text.length < minTotalLength || text.length > maxTotalLength)
      return true;

    // Cek apakah ada huruf vokal dan konsonan yang seimbang
    const vowelCount = (text.match(/[aeiou]/gi) || []).length;
    const consonantCount = (text.match(/[bcdfghjklmnpqrstvwxyz]/gi) || [])
      .length;

    if (vowelCount === 0 || consonantCount === 0) {
      return true; // Teks hanya vokal atau hanya konsonan
    }

    if (consonantCount / vowelCount > 5) {
      return true; // Terlalu banyak konsonan dibanding vokal
    }

    // Cek setiap kata
    for (let word of words) {
      if (word.length < minWordLength) return true; // Kata terlalu pendek
      if (/([a-zA-Z])\1{5,}/.test(word)) return true; // Pengulangan karakter lebih dari 5 kali
    }

    //cek banyak huruf acak tanpa kata bermakna
    const gibberishRegex = /^[a-z]{20,}$/i; // Kata yang lebih dari 15 huruf tanpa spasi
    return gibberishRegex.test(text);
  }
});

// untuk halaman komisi
const toggleButtons = document.querySelectorAll(".toggle");
const komisiBodies = document.querySelectorAll(".komisi-body");

toggleButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    const komisiBody = komisiBodies[index];
    if (komisiBody.style.display === "block") {
      komisiBody.style.display = "none";
      button.textContent = "+";
    } else {
      komisiBody.style.display = "block";
      button.textContent = "-";
    }
  });
});
