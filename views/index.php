<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container">
    <div class="row mt-4">
        <div class="col-md-5 col">
            <h3>Simple calculator</h3>

            <form name="calculator" id="calculator" method="POST">
                <div class="form-group">
                    <label for="first_operand">First operand</label>
                    <input type="number" id="first_operand" name="calculator[first_operand]" class="form-control" value="<?= $data['first_operand'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="second_operand">Second operand</label>
                    <input type="number" id="second_operand" name="calculator[second_operand]" class="form-control" value="<?= $data['second_operand'] ?>" required>
                </div>

                <div class=" form-group">
                    <label for="operator">Operator</label>
                    <select name="calculator[operator]" id="operator" class="form-control">
                        <option value="+" <?= (($data && $data['operator'] == '+') ? 'selected' : '') ?>>Addition</option>
                        <option value="-" <?= (($data && $data['operator'] == '-') ? 'selected' : '') ?>>Subtraction</option>
                        <option value="*" <?= (($data && $data['operator'] == '*') ? 'selected' : '') ?>>Multiplication</option>
                        <option value="/" <?= (($data && $data['operator'] == '/') ? 'selected' : '') ?>>Division</option>
                    </select>
                </div>

                <?php
                if (isset($data['errors'])) {
                    foreach ($data['errors'] as $error) {
                        echo '<p class="text-danger">' . $error . '</p>';
                    }
                }
                if (isset($data['result'])) {
                    echo '<div class="mt-2">
                    <p class="text-success"> Action result: ' . $data['result'] . '</p>
                    </div>';
                }
                ?>

                <button class="btn btn-sm btn-primary mt-3">Perform action</button>
            </form>
        </div>
    </div>
</body>

</html>