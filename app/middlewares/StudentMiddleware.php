<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
	public function handle(Closure $next)
	{
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}

		if ( ! function_exists('redirect')) {
			require_once SYSTEM_DIR . 'helpers/url_helper.php';
		}

		$has_ember_pass = isset($_SESSION['ember_pass']) && $_SESSION['ember_pass'] === 'CARL-EMBER-26';

		if ( ! $has_ember_pass) {
			$_SESSION['ember_gate_notice'] = 'Ember Gate blocked this visit. Unlock Carl\'s profile pass from the home page first.';
			redirect('student');
			exit;
		}

		return $next();
	}
}
