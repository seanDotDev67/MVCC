<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container small-container">
    <h1>Add Student</h1>

    <?php if ($error !== ''): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=create">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label>Course</label>
        <input type="text" name="course" value="<?= htmlspecialchars($_POST['course'] ?? '') ?>" required>

        <div class="form-actions">
            <button class="btn" type="submit">Save Student</button>
            <a class="btn btn-secondary" href="index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
