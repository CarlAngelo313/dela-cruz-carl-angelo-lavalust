<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= html_escape($page_title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #12263a;
            --navy: #0b1d2f;
            --gold: #c9a227;
            --gold-soft: #e6c86a;
            --teal: #2f7a73;
            --paper: #f6efe2;
            --card: #fffaf1;
            --muted: #5c6b7a;
            --danger: #9b3d3d;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            min-height: 100vh;
            font-family: 'Source Sans 3', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top right, rgba(201,162,39,0.18), transparent 32%),
                linear-gradient(160deg, #071422 0%, #12324a 48%, #0b1d2f 100%);
        }
        .shell { max-width: 920px; margin: 0 auto; padding: 2rem 1.25rem 3rem; }
        header.top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }
        .brand { color: var(--paper); text-decoration: none; }
        .brand small { display: block; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold-soft); font-size: 0.7rem; }
        .brand strong { font-family: Fraunces, serif; font-size: 1.7rem; }
        nav a {
            color: var(--paper);
            text-decoration: none;
            margin-left: 0.75rem;
            padding: 0.45rem 0.85rem;
            border-radius: 999px;
            border: 1px solid transparent;
        }
        nav a.active, nav a:hover { border-color: var(--gold); color: var(--gold-soft); }
        .notice, .ok {
            margin-bottom: 1rem;
            padding: 0.9rem 1rem;
            border-radius: 12px;
            font-weight: 600;
        }
        .notice { background: #f8d7d3; color: var(--danger); }
        .ok { background: #d8efe8; color: #215e56; }
        .card {
            background: var(--card);
            border: 1px solid rgba(201,162,39,0.35);
            border-radius: 22px;
            padding: 1.6rem;
            box-shadow: 0 18px 40px rgba(0,0,0,0.25);
        }
        h1 { font-family: Fraunces, serif; font-size: 2rem; margin-bottom: 0.35rem; }
        .lede { color: var(--muted); margin-bottom: 1.25rem; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 0.85rem; }
        .field {
            background: var(--paper);
            border-radius: 14px;
            padding: 0.85rem 1rem;
        }
        .field span { display: block; font-size: 0.75rem; letter-spacing: 0.08em; text-transform: uppercase; color: var(--teal); }
        .field strong { font-size: 1.05rem; }
        .actions { margin-top: 1.3rem; display: flex; gap: 0.7rem; flex-wrap: wrap; }
        .btn {
            display: inline-block;
            text-decoration: none;
            border-radius: 999px;
            padding: 0.7rem 1.1rem;
            font-weight: 700;
        }
        .btn-gold { background: var(--gold); color: var(--navy); }
        .btn-ink { background: var(--navy); color: var(--paper); }
        .chips { display: flex; flex-wrap: wrap; gap: 0.45rem; margin-top: 0.85rem; }
        .chip { background: #e8f3f1; color: var(--teal); border-radius: 999px; padding: 0.28rem 0.7rem; font-size: 0.85rem; font-weight: 600; }
        .bio { margin-top: 1rem; line-height: 1.6; }
        footer { margin-top: 1.2rem; color: #cdd6df; font-size: 0.85rem; }
    </style>
</head>
<body>
<div class="shell">
    <header class="top">
        <a class="brand" href="<?= site_url('student'); ?>">
            <strong>Ember Dossier</strong>
        </a>
        <nav>
            <a href="<?= site_url('student'); ?>" class="<?= $active === 'home' ? 'active' : ''; ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>" class="<?= $active === 'profile' ? 'active' : ''; ?>">Student Profile</a>
        </nav>
    </header>
    <?php if ( ! empty($notice)): ?>
        <div class="notice"><?= html_escape($notice); ?></div>
    <?php endif; ?>
