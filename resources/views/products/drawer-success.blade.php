<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
</head>
<body>
    <script>
        // Mengirimkan event 'product-saved' ke halaman Parent (Tabel)
        window.parent.postMessage('product-saved', '*');
    </script>
</body>
</html>