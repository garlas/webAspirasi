document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#report form");
  const submitButton = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const nama = document.querySelector('input[name="name"]').value.trim();
    const kelas = document.querySelector('input[name="kelas"]').value.trim();
    const kontak = document.querySelector('input[name="email"]').value.trim();
    const teksAspirasi = document
      .querySelector('textarea[name="issue"]')
      .value.trim();

    if (nama === "" || kelas === "" || teksAspirasi === "") {
      alert("Nama, Kelas, dan Aspirasi harus diisi!");
      return;
    }

    if (isGibberish(teksAspirasi)) {
      alert(
        "Aspirasi yang Anda kirim terlihat tidak valid. Silakan kirim aspirasi yang lebih jelas."
      );
      return;
    }

    submitButton.disabled = true;

    const waktuKirim = new Date().toLocaleString();

    const webhookUrl =
      "https://discord.com/api/webhooks/1274643187742281788/949FutOCV7wUpFr5642KasuS6B1D1W2dyKTUWqOzLhF0dYASVQXNK8fqtmVlGorfXeqj"; // webhook

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
          form.reset();
        } else {
          alert("Gagal mengirim aspirasi.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat mengirim aspirasi.");
      })
      .finally(() => {
        submitButton.disabled = false;
      });
  });

  function isGibberish(text) {
    const minWordLength = 3;
    const words = text.split(/\s+/);
    const minTotalLength = 10;
    const maxTotalLength = 100000;

    // Cek panjang teks minimal dan maksimal
    if (text.length < minTotalLength || text.length > maxTotalLength)
      return true;

    const vowelCount = (text.match(/[aeiou]/gi) || []).length;
    const consonantCount = (text.match(/[bcdfghjklmnpqrstvwxyz]/gi) || [])
      .length;

    // Harus ada vokal dan konsonan
    if (vowelCount === 0 || consonantCount === 0) return true;

    // Rasio konsonan dengan vokal tidak boleh terlalu tinggi (contoh: "ssssss" atau "rrrrr")
    if (consonantCount / vowelCount > 5 || vowelCount / consonantCount > 5)
      return true;

    for (let word of words) {
      // Kata harus lebih panjang dari batas minimum
      if (word.length < minWordLength) return true;

      // Deteksi pengulangan karakter berlebihan (contoh: "aaaaa" atau "bbbbb")
      if (/([a-zA-Z])\1{3,}/.test(word)) return true; // Lebih ketat, hanya izinkan hingga 3 huruf sama berulang

      // Deteksi kata yang hanya terdiri dari huruf acak dengan pola vokal/konsonan tidak beraturan
      const vowelsInWord = (word.match(/[aeiou]/gi) || []).length;
      const consonantsInWord = (word.match(/[bcdfghjklmnpqrstvwxyz]/gi) || [])
        .length;

      // Jika kata mengandung perbandingan yang sangat mirip antara konsonan dan vokal
      if (Math.abs(vowelsInWord - consonantsInWord) <= 1) return true;

      // Deteksi kata yang tidak masuk akal atau terlalu panjang tanpa variasi vokal/konsonan
      if (/^[a-zA-Z]{20,}$/.test(word)) return true;
    }

    // Regex untuk mendeteksi teks yang mungkin acak
    const gibberishRegex = /^[a-z]{20,}$/i;
    if (gibberishRegex.test(text)) return true;

    // Tambahkan lebih banyak logika validasi jika diperlukan

    return false;
  }

  // halaman komisi
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
});
