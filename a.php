<!DOCTYPE html>
<html>

<head>
    <title>PWTI Ajax</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="custom.css">
    <!-- <script src="bootstrap.bundle.js"></script> -->
    <!-- jQuery -->
    <script src="jquery-3.7.0.min.js"></script>
</head>

<body class="bg-dark"><br>
    <div class="container">
        <center>
            <h1 class="mb-4">Form Data</h1>
        </center>
        <form id="form-id">
            <div class="form-floating mb-4 form-outline">
                <input type="text" class="form-control" id="floatingInput" name="text" placeholder="Agung" required>
                <label for="floatingInput" class="form-label">Nama</label>
            </div>
            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="floatingInput" name="number" placeholder="2141384938" required>
                <label for="floatingInput" class="form-label">NIM</label>
            </div>
            <div class="text-center justify-content-center flex-column">
                <button type="reset" class="btn btn-danger w-50 p-3">Reset</button>
                <button type="submit" class="btn btn-success w-50 p-3">Submit</button>
            </div>
        </form>



        <!-- Tabel -->
        <br>
        <br>
        <h1 class="text-center">Daftar List</h1>
        <table class="table mt-3 table-fixed table-bordered " id="responseTable">
            <thead>
                <tr>
                    <th class="col-6 text-center text-light bg-primary">Nama</th>
                    <th class="col-6 text-center text-light bg-primary">NIM</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <!-- Jquery -->
    <script>
        $(document).ready(function() {
            $('#form-id').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'b.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Add a row to the table with the response data
                        var newRow = $('<tr><td class="text-center bg-light">' + response.text + '</td><td class="text-center bg-light">' + response.number + '</td></tr>');
                        newRow.hide();
                        $('#responseTable tbody').append(newRow);
                        newRow.fadeIn('slow');

                    }
                });
            });
        });
    </script>
</body>

</html>