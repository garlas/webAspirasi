// Fungsi yang dijalankan setelah konten HTML dimuat
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("anonim").addEventListener("change", function () {
    const namaInput = document.getElementById("name");
    if (this.checked) {
      namaInput.disabled = true;
      namaInput.value = "";
    } else {
      namaInput.disabled = false;
    }
  });

  document
    .getElementById("aspirasi-form")
    .addEventListener("submit", function (event) {
      event.preventDefault(); // Mencegah form dari pengiriman default

      const anonimChecked = document.getElementById("anonim").checked;
      const nama = document.getElementById("name").value;
      const kelas = document.getElementById("kelas").value;
      const contact = document.getElementById("contact").value;
      const aspirasi = document.getElementById("issue").value;

      if (!anonimChecked && !nama) {
        alert("Silakan lengkapi nama Anda.");
        return;
      }

      if (!kelas || !aspirasi) {
        alert("Silakan lengkapi semua field yang wajib diisi.");
        return;
      }

      // Membuat objek embed untuk pesan
      const data = {
        embeds: [
          {
            title: "Aspirasi Baru Diterima",
            color: 3066993, // Warna embed dalam format decimal
            fields: [
              {
                name: "Pengirim",
                value: anonimChecked ? "Anonim" : nama,
                inline: true,
              },
              {
                name: "Kelas",
                value: kelas,
                inline: true,
              },
              {
                name: "Kontak",
                value: contact || "Tidak tersedia",
                inline: true,
              },
              {
                name: "Aspirasi",
                value: aspirasi,
                inline: false,
              },
            ],
            footer: {
              text: "Dikirim melalui sistem aspirasi.",
            },
          },
        ],
      };

      const webhookURL =
        "https://discord.com/api/webhooks/1274643187742281788/949FutOCV7wUpFr5642KasuS6B1D1W2dyKTUWqOzLhF0dYASVQXNK8fqtmVlGorfXeqj"; // Ganti dengan URL webhook Anda

      console.log("Data yang akan dikirim:", data); // Menampilkan data yang akan dikirim

      fetch(webhookURL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Jaringan bermasalah!");
          }
          return response.text(); // Ambil respons sebagai teks
        })
        .then((responseText) => {
          console.log("Pesan terkirim:", responseText);
          alert("Aspirasi berhasil dikirim!");
        })
        .catch((error) => {
          console.error("Kesalahan:", error);
          alert("Gagal mengirim aspirasi.");
        });

      this.reset();
    });
});
