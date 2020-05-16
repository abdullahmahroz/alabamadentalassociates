jQuery(document).ready(function () {
    // main.js
    var client1 = new ZeroClipboard(document.getElementById("redux-export-code-copy"));
    var client2 = new ZeroClipboard(document.getElementById("redux-export-link"));

    client1.on("ready", function (readyEvent) {
        client1.on("aftercopy", function (event) {
            alert("Data Copied to clipboard!");
        });
    });

    client2.on("ready", function (readyEvent) {
        client2.on("aftercopy", function (event) {
            alert("Data Copied to clipboard!");
        });
    });
});