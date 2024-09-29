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

    submitButton.disabled = true;

    const waktuKirim = new Date().toLocaleString();

    const webhookUrl =
      "https://discord.com/api/webhooks/1274643187742281788/949FutOCV7wUpFr5642KasuS6B1D1W2dyKTUWqOzLhF0dYASVQXNK8fqtmVlGorfXeqj"; // webhook

    const maxFieldLength = 1000; // Panjang maksimal yang bisa dikirim ke Discord

    // Fungsi untuk memotong aspirasi jika terlalu panjang
    function splitText(text, maxLength) {
      const chunks = [];
      let i = 0;
      while (i < text.length) {
        chunks.push(text.slice(i, i + maxLength));
        i += maxLength;
      }
      return chunks;
    }

    // Jika teks aspirasi terlalu panjang, kita akan memecahnya
    const aspirasiChunks = splitText(teksAspirasi, maxFieldLength);

    const fields = [
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
    ];

    // Menambahkan setiap bagian aspirasi ke dalam field
    aspirasiChunks.forEach((chunk, index) => {
      fields.push({
        name: `Aspirasi (Bagian ${index + 1})`,
        value: chunk,
        inline: false,
      });
    });

    fields.push({
      name: "Waktu Pengiriman",
      value: waktuKirim,
      inline: false,
    });

    const requestData = {
      embeds: [
        {
          title: "🚀 Aspirasi Baru",
          description: "Detail dari aspirasi yang baru dikirim:",
          color: 3447003,
          fields: fields,
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
});

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
