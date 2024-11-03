<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">REGISTRATION</h2>
            
            <?php
            $student_name = '';
            $year_level = '';
            $total_units = '';
            $total_price = '';
            $lab_option = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get form data
                $student_name = $_POST['student_name'];
                $year_level = $_POST['year_level'];
                $total_units = $_POST['total_units'];
                $lab_option = $_POST['lab_option'];

                // Pricing Logic
                $price_per_unit = 750; // Example price per unit
                $lab_fee = ($lab_option == 'With Lab') ? 5000 : 0;
                $total_price = ($price_per_unit * $total_units) + $lab_fee;
            }
            ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="student_name" class="form-label">Student's Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?= htmlspecialchars($student_name); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select class="form-select" id="year_level" name="year_level" required>
                        <option selected disabled>Choose your year level</option>
                        <option value="1" <?= ($year_level == '1') ? 'selected' : ''; ?>>1st Year</option>
                        <option value="2" <?= ($year_level == '2') ? 'selected' : ''; ?>>2nd Year</option>
                        <option value="3" <?= ($year_level == '3') ? 'selected' : ''; ?>>3rd Year</option>
                        <option value="4" <?= ($year_level == '4') ? 'selected' : ''; ?>>4th Year</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="total_units" class="form-label">Total Units</label>
                    <input type="number" class="form-control" id="total_units" name="total_units" max="23" value="<?= htmlspecialchars($total_units); ?>" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lab_option" id="with_lab" value="With Lab" <?= ($lab_option == 'With Lab') ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="with_lab">With lab</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lab_option" id="without_lab" value="Without Lab" <?= ($lab_option == 'Without Lab') ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="without_lab">Without lab</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="mt-4">
                <p><strong>Student name:</strong> <?= htmlspecialchars($student_name); ?></p>
                <p><strong>Year level:</strong> <?= htmlspecialchars($year_level); ?></p>
                <p><strong>No. of units:</strong> <?= htmlspecialchars($total_units); ?></p>
                <p><strong>Total Price:</strong> <?= number_format((float)$total_price, 2); ?> (<?= htmlspecialchars($lab_option); ?>)</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
