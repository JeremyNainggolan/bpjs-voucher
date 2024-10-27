<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Voucher - Admin Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Generate Voucher</h4>
                </div>
                <div class="card-body">
                    <form id="voucherForm">
                        <!-- Input Nama dan Kegiatan -->
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Nama dan Kegiatan</label>
                            <input type="text" class="form-control" id="eventName" value="Workshop Kesehatan" required>
                        </div>

                        <!-- Input Expired Date -->
                        <div class="mb-3">
                            <label for="expiredDate" class="form-label">Expired Date</label>
                            <input type="date" class="form-control" id="expiredDate" value="2024-12-31" required>
                        </div>

                        <!-- Input Total Potongan -->
                        <div class="mb-3">
                            <label for="discountAmount" class="form-label">Total Potongan (Rp)</label>
                            <input type="number" class="form-control" id="discountAmount" value="50000" required>
                        </div>

                        <!-- Tombol Generate Token -->
                        <div class="d-grid">
                            <button type="button" class="btn btn-success btn-lg" onclick="generateToken()">Generate Token</button>
                        </div>

                        <!-- Hasil Token -->
                        <div class="mt-3">
                            <label for="generatedToken" class="form-label">Generated Token</label>
                            <input type="text" class="form-control" id="generatedToken" readonly placeholder="Token akan muncul di sini">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function generateToken() {
        // Dummy token generator (8 character alphanumeric)
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let token = '';
        for (let i = 0; i < 8; i++) {
            token += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        document.getElementById('generatedToken').value = token;
    }
</script>

</body>
</html>
