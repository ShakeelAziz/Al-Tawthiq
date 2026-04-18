(() => {
  function el(id) {
    return document.getElementById(id);
  }

  const form = el("altawthiqDigitalClaimForm");
  if (!form || typeof AltawthiqDigital === "undefined") return;

  const result = el("altawthiqDigitalResult");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (result) result.innerHTML = "";

    const fd = new FormData(form);
    fd.append("action", "altawthiq_claim_digital_product");
    fd.append("nonce", AltawthiqDigital.nonce);

    try {
      const res = await fetch(AltawthiqDigital.ajaxUrl, {
        method: "POST",
        body: fd,
      });
      const json = await res.json();

      if (!json || !json.success) {
        if (result) {
          result.innerHTML =
            `<div style="color:#b91c1c;">${AltawthiqDigital.errorText}</div>`;
        }
        return;
      }

      const url = json.data?.downloadUrl;
      if (!url) {
        if (result) {
          result.innerHTML =
            `<div style="color:#b91c1c;">${AltawthiqDigital.errorText}</div>`;
        }
        return;
      }

      if (result) {
        result.innerHTML = `
          <div style="padding:12px 16px;border:1px solid #e5e7eb;border-radius:12px;background:#f9fafb;">
            <div style="font-weight:700;margin-bottom:8px;color:var(--text-dark);">${AltawthiqDigital.successText}</div>
            <a href="${url}" class="btn-demo" style="display:inline-flex;" download>
              Download
            </a>
          </div>
        `;
      }
    } catch (err) {
      if (result) {
        result.innerHTML =
          `<div style="color:#b91c1c;">${AltawthiqDigital.errorText}</div>`;
      }
    }
  });
})();

