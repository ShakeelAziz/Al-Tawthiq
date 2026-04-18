document.getElementById("downloadForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("/wp-admin/admin-ajax.php?action=download_product", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById("msg").innerText = "Downloading...";
            window.location.href = data.data;
        } else {
            document.getElementById("msg").innerText = "Error!";
        }
    });
});