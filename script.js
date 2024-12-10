document.addEventListener("DOMContentLoaded", function () {
  const anonimCheckbox = document.getElementById("anonim");
  const namaInput = document.getElementById("name");
  const form = document.getElementById("aspirasi-form");

  // Mengaktifkan/memblokir input nama berdasarkan checkbox anonim
  anonimCheckbox.addEventListener("change", function () {
    if (this.checked) {
      namaInput.disabled = true;
      namaInput.value = "";
    } else {
      namaInput.disabled = false;
    }
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman default form

    const anonimChecked = anonimCheckbox.checked;
    const nama = namaInput.value.trim();
    const kelas = document.getElementById("kelas").value.trim();
    const contact = document.getElementById("contact").value.trim();
    const aspirasi = document.getElementById("issue").value.trim();

    if (!anonimChecked && !nama) {
      alert("Silakan lengkapi nama Anda.");
      return;
    }
    if (!kelas) {
      alert("Silakan pilih kelas Anda.");
      return;
    }
    if (!aspirasi) {
      alert("Silakan isi aspirasi Anda.");
      return;
    }

    const webhookURL =
      "https://discord.com/api/webhooks/1307261966066122762/Cj5IEMbLHkd6d2sSQXnrjmsIaJoxc-vPWan2hcsZ0qg9VCYrUlLOZ5fjnvVPdqFQ0MTL";

    const maxLength = 1024;
    function splitText(text, maxLength) {
      const result = [];
      for (let i = 0; i < text.length; i += maxLength) {
        result.push(text.slice(i, i + maxLength));
      }
      return result;
    }

    const aspirasiParts = splitText(aspirasi, maxLength);

    const embed = {
      title: "🚀 Aspirasi Baru",
      description: "Detail dari aspirasi yang baru dikirim:",
      color: 3066993,
      fields: [
        {
          name: "Pengirim",
          value: anonimChecked ? "Anonim" : nama,
          inline: true,
        },
        { name: "Kelas", value: kelas, inline: true },
        { name: "Kontak", value: contact || "Tidak ada kontak", inline: true },
      ],
      footer: { text: "Dikirim melalui sistem aspirasi." },
    };

    aspirasiParts.forEach((part, index) => {
      embed.fields.push({
        name: `Aspirasi (Bagian ${index + 1})`,
        value: part,
      });
    });

    fetch(webhookURL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ embeds: [embed] }),
    })
      .then((response) => {
        if (!response.ok)
          throw new Error("Gagal mengirim data ke webhook Discord.");

        // AJAX ke server PHP untuk memperbarui jumlah
        return fetch("proses.php", {
          method: "POST",
        });
      })
      .then((phpResponse) => {
        if (!phpResponse.ok)
          throw new Error("Gagal memperbarui jumlah di database.");

        alert("Aspirasi berhasil dikirim!");
        form.reset();
        namaInput.disabled = anonimChecked;
      })
      .catch((error) => {
        console.error("Kesalahan:", error);
        alert("Terjadi kesalahan saat mengirim aspirasi. Silakan coba lagi.");
      });
  });
});
