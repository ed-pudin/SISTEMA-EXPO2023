var html5QrcodeScanner = new html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: { width: 250, height: 250 }},
    );
html5QrcodeScanner.render(onScanSuccess);

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);
}


