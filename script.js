document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#report form"); // Pastikan memilih form di dalam elemen #report
  const submitButton = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form secara default

    const nama = document.querySelector('input[name="name"]').value.trim();
    const kontak = document.querySelector('input[name="email"]').value.trim();
    const teksAspirasi = document
      .querySelector('textarea[name="issue"]')
      .value.trim();

    if (teksAspirasi === "" || nama === "" || kontak === "") {
      alert("Semua kolom harus diisi!");
      return;
    }

    submitButton.disabled = true; // Menonaktifkan tombol untuk mencegah pengiriman ganda

    const waktuKirim = new Date().toLocaleString(); // Mengambil waktu lokal

    const webhookUrl =
      "https://discord.com/api/webhooks/1274643187742281788/949FutOCV7wUpFr5642KasuS6B1D1W2dyKTUWqOzLhF0dYASVQXNK8fqtmVlGorfXeqj"; // URL webhook Anda

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
              name: "Kontak",
              value: `Kontak: ${kontak}`,
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
});
