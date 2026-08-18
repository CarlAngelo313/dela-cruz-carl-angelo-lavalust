<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
require APP_DIR . 'views/student/_open.php';
?>
<section class="card">
    <h1>Student Information</h1>
    <p class="lede">Welcome to Carl Angelo's Ember Dossier.</p>

    <?php if ( ! empty($has_pass)): ?>
        <div class="ok">Ember Gate pass is active. You can open the protected profile page.</div>
    <?php endif; ?>

    <div class="grid">
        <div class="field"><span>Student ID</span><strong><?= html_escape($student['student_id']); ?></strong></div>
        <div class="field"><span>Name</span><strong><?= html_escape($student['name']); ?></strong></div>
        <div class="field"><span>Course</span><strong><?= html_escape($student['course']); ?></strong></div>
        <div class="field"><span>Year Level</span><strong><?= html_escape($student['year']); ?></strong></div>
        <div class="field"><span>Section</span><strong><?= html_escape($student['section']); ?></strong></div>
        <div class="field"><span>Email</span><strong><?= html_escape($student['email']); ?></strong></div>
    </div>

    <div class="actions">
        <a class="btn btn-gold" href="<?= site_url('student/unlock'); ?>">Unlock Profile Pass</a>
        <a class="btn btn-ink" href="<?= site_url('student/profile'); ?>">Open Student Profile</a>
        <?php if ( ! empty($has_pass)): ?>
            <a class="btn btn-ink" href="<?= site_url('student/lock'); ?>">Revoke Pass</a>
        <?php endif; ?>
    </div>
</section>
<?php require APP_DIR . 'views/student/_close.php'; ?>
