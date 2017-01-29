<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function add_student($student)
	{
		$value = array($student['first_name'], $student['last_name'], $student['email'], md5($student['password']));
		$query = "INSERT INTO students (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		return $this->db->query($query, $value);
	}

	public function get_student($id)
	{
		$query = "SELECT * FROM students WHERE id=?";
		$value = array($id);
		return $this->db->query($query, $value)->row_array();
	}

	public function get_student_by_email($id)
	{
		$query ="SELECT * FROM students WHERE email=?";
		$value = array($id);
		return $this->db->query($query, $value)->row_array();
	}
}