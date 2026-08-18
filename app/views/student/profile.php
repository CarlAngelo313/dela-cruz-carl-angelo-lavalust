<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
require APP_DIR . 'views/student/_open.php';
?>
<section class="card">
    <h1>Student Profile</h1>
    <p class="lede">Protected by StudentMiddleware. Ember Gate verified Carl's profile pass before this view loaded.</p>
    <div class="ok">Access granted</div>

    <div class="grid">
        <div class="field"><span>Student ID</span><strong><?= html_escape($student['student_id']); ?></strong></div>
        <div class="field"><span>Name</span><strong><?= html_escape($student['name']); ?></strong></div>
        <div class="field"><span>Course</span><strong><?= html_escape($student['course']); ?></strong></div>
        <div class="field"><span>Year Level</span><strong><?= html_escape($student['year']); ?></strong></div>
        <div class="field"><span>Section</span><strong><?= html_escape($student['section']); ?></strong></div>
        <div class="field"><span>Email</span><strong><?= html_escape($student['email']); ?></strong></div>
        <div class="field"><span>Address</span><strong><?= html_escape($student['address']); ?></strong></div>
        <div class="field"><span>Contact</span><strong><?= html_escape($student['contact']); ?></strong></div>
        <div class="field"><span>Social</span><strong><?= html_escape($student['social']); ?></strong></div>
    </div>

    <p class="bio"><?= html_escape($student['bio']); ?></p>
    <div class="chips">
        <?php foreach ($student['skills'] as $skill): ?>
            <span class="chip"><?= html_escape($skill); ?></span>
        <?php endforeach; ?>
        <?php foreach ($student['hobbies'] as $hobby): ?>
            <span class="chip"><?= html_escape($hobby); ?></span>
        <?php endforeach; ?>
    </div>

    <div class="actions">
        <a class="btn btn-gold" href="<?= site_url('student'); ?>">Back to Home</a>
        <a class="btn btn-ink" href="<?= site_url('student/lock'); ?>">Revoke Pass</a>
    </div>
</section>
<?php require APP_DIR . 'views/student/_close.php'; ?>
