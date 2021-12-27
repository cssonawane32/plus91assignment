<?php
require_once "dbconnection.php";

if($schema->hasTable('patients')) {
	//Insert Patient Data
	if($_POST['type']=='insert') {
		$data = $_POST;

		$query = $queryBuilder
		    ->insert('patients')
		    ->values(array(
				'name' => '?',
				'age' => '?',
				'city' => '?',
				'state' => '?',
				'country' => '?',
				'dob' => '?',
				'blood_group' => '?',
				'created_at' => '?',
				'updated_at' => '?'
			))
		    ->setParameter(0, $data['name'])
		    ->setParameter(1, $data['age'])
		    ->setParameter(2, $data['city'])
		    ->setParameter(3, $data['state'])
		    ->setParameter(4, $data['country'])
		    ->setParameter(5, date('Y-m-d', strtotime($data['dob'])))
		    ->setParameter(6, $data['blood_group'])
		    ->setParameter(7, date('Y-m-d H:i:s'))
		    ->setParameter(8, date('Y-m-d H:i:s'));

		echo $query->execute();
	}

	//Show Patient Data
	if($_POST['type']=='select') {
		$query = $queryBuilder
			->select('*, DATE_FORMAT(dob, "%d-%m-%Y") as dob')
		    ->from('patients')
	    	->orderBy('id', 'ASC');

		$data = $query->execute()->fetchAll();
		echo json_encode($data);
	}

	//Show Patient Data By id
	if($_POST['type']=='selectById') {
		$data = $_POST;

		$query = $queryBuilder
			->select('*')
		    ->from('patients')
		    ->where('id = ?')
		    ->setParameter(0, $data['id']);

		$res = $query->execute()->fetch();
		echo json_encode($res);
	}

	//Update Patient Data
	if($_POST['type']=='update') {
		$data = $_POST;

		$query = $queryBuilder
		    ->update('patients')
		    ->set('name', '?')
			->set('age', '?')
			->set('city', '?')
			->set('state', '?')
			->set('country', '?')
			->set('dob', '?')
			->set('blood_group', '?')
			->set('updated_at', '?')
		    ->where('id = ?')
		    ->setParameter(0, $data['name'])
		    ->setParameter(1, $data['age'])
		    ->setParameter(2, $data['city'])
		    ->setParameter(3, $data['state'])
		    ->setParameter(4, $data['country'])
		    ->setParameter(5, date('Y-m-d', strtotime($data['dob'])))
		    ->setParameter(6, $data['blood_group'])
		    ->setParameter(7, date('Y-m-d H:i:s'))
		    ->setParameter(8, $data['pid']);

		echo $query->execute();
	}

	//Delete Patient Data
	if($_POST['type']=='delete') {
		$data = $_POST;

		$query = $queryBuilder
		    ->delete('patients')
		    ->where('id = ?')
		    ->setParameter(0, $data['id']);

		echo $query->execute();
	}
}