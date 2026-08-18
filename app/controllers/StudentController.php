<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
	private function start_session()
	{
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
	}

	private function student_data()
	{
		return [
			'student_id' => 'MCC2023-01333',
			'name'       => 'Carl Angelo',
			'course'     => 'BS Information Technology',
			'year'       => '3rd Year',
			'section'    => 'F2',
			'email'      => 'carl.angelo@student.edu',
			'address'    => 'Sapul Calapan',
			'contact'    => '+63 912 418 2024',
			'skills'     => ['PHP', 'LavaLust MVC', 'HTML/CSS', 'MySQL'],
			'hobbies'    => ['Building web apps', 'UI design', 'Photography'],
			'bio'        => 'IT student documenting academic work through a custom Ember Dossier built on LavaLust routing, views, and middleware.',
			'social'     => 'github.com/carlangelo'
		];
	}

	public function index()
	{
		$this->start_session();

		$notice = $_SESSION['ember_gate_notice'] ?? null;
		unset($_SESSION['ember_gate_notice']);

		$data['student'] = $this->student_data();
		$data['page_title'] = 'Ember Dossier | Home';
		$data['active'] = 'home';
		$data['notice'] = $notice;
		$data['has_pass'] = isset($_SESSION['ember_pass']) && $_SESSION['ember_pass'] === 'CARL-EMBER-26';

		$this->call->view('student/home', $data);
	}

	public function profile()
	{
		$this->start_session();

		$data['student'] = $this->student_data();
		$data['page_title'] = 'Ember Dossier | Student Profile';
		$data['active'] = 'profile';
		$data['notice'] = null;
		$data['has_pass'] = true;

		$this->call->view('student/profile', $data);
	}

	public function unlock()
	{
		$this->start_session();
		$_SESSION['ember_pass'] = 'CARL-EMBER-26';
		redirect('student/profile');
		exit;
	}

	public function lock()
	{
		$this->start_session();
		unset($_SESSION['ember_pass']);
		$_SESSION['ember_gate_notice'] = 'Profile pass revoked. Ember Gate will block /student/profile until you unlock it again.';
		redirect('student');
		exit;
	}
}
