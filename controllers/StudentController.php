<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private Student $studentModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->studentModel = new Student($db);
    }

    public function index(): void
    {
        $students = $this->studentModel->getAll();

        require __DIR__ . '/../views/students/index.php';
    }

    public function create(): void
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $course = trim($_POST['course'] ?? '');

            if ($name === '' || $email === '' || $course === '') {
                $error = 'All fields are required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Please enter a valid email address.';
            } else {
                $this->studentModel->create($name, $email, $course);

                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../views/students/create.php';
    }

    public function edit(): void
    {
        $error = '';

        $id = (int) ($_GET['id'] ?? 0);

        $student = $this->studentModel->find($id);

        if (!$student) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $course = trim($_POST['course'] ?? '');

            if ($name === '' || $email === '' || $course === '') {
                $error = 'All fields are required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Please enter a valid email address.';
            } else {
                $this->studentModel->update($id, $name, $email, $course);

                header('Location: index.php');
                exit;
            }

            // Keep submitted values in the form if validation fails
            $student = [
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'course' => $course,
            ];
        }

        require __DIR__ . '/../views/students/edit.php';
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['id'] ?? 0);

            if ($id > 0) {
                $this->studentModel->delete($id);
            }
        }

        header('Location: index.php');
        exit;
    }
}