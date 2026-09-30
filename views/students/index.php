<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Optional custom CSS -->
    <link rel="stylesheet" href="public/style.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        .table-card {
            border: 0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .table thead th {
            background-color: #f8f9fa;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #6c757d;
        }

        .table td {
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .avatar-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #0d6efd;
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 10px;
        }

        .name-cell {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container py-4 py-md-5">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="h3 fw-bold mb-1">Student Management</h1>
            <p class="text-muted mb-0">Simple PHP PDO MVC CRUD Application</p>
        </div>

        <a href="index.php?action=create" class="btn btn-primary">
            + Add Student
        </a>
    </div>

    <!-- Table Card -->
    <div class="card table-card">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h2 class="h6 mb-0">Student List</h2>
            <span class="badge bg-primary-subtle text-primary">
                <?= count($students) ?> total
            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($students) > 0): ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="text-muted">
                                    #<?= (int) $student['id'] ?>
                                </td>

                                <td>
                                    <div class="name-cell">
                                        <span class="avatar-circle">
                                            <?= strtoupper(substr(htmlspecialchars($student['name']), 0, 1)) ?>
                                        </span>
                                        <span class="fw-semibold">
                                            <?= htmlspecialchars($student['name']) ?>
                                        </span>
                                    </div>
                                </td>

                                <td class="text-muted">
                                    <?= htmlspecialchars($student['email']) ?>
                                </td>

                                <td>
                                    <span class="badge bg-info-subtle text-info-emphasis">
                                        <?= htmlspecialchars($student['course']) ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="action-buttons justify-content-end">
                                        <a
                                            href="index.php?action=edit&id=<?= (int) $student['id'] ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="index.php?action=delete"
                                            method="POST"
                                            onsubmit="return confirm('Delete this student?');"
                                            class="d-inline"
                                        >
                                            <input
                                                type="hidden"
                                                name="id"
                                                value="<?= (int) $student['id'] ?>"
                                            >

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <h5>No students found</h5>
                                    <p class="mb-3">Add your first student to get started.</p>
                                    <a href="index.php?action=create" class="btn btn-primary btn-sm">
                                        + Add Student
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>