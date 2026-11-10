<?php require_once 'includes/header.php'; ?>
<!-- the  registration Form Card -->
<div class="card">
    <h2 class="card-title">Register New Student</h2>
    <!-- Registration Form sending POST data to backend processor -->
    <form action="processing/process_register.php" method="POST" id="studentForm" novalidate>
        <!-- Student Name -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="example. Daniel kamau Guchu">
        </div>
        <!-- Course Title -->
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" class="form-control" placeholder="example. Diploma in Software Engineering">
        </div>
        <!-- age -->
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" placeholder="example. 21">
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Student</button>
    </form>
</div>
<?php require_once 'includes/footer.php'; ?>