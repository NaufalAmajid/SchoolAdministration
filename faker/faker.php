<?php
include '../functions/function.php';
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create('id_ID');

// connect to database
$connect = Connection();

// select all active class
$selectClass   = ExecuteSelect($connect, "SELECT * FROM classrooms WHERE isactive = 1");
$class         = [];
foreach ($selectClass as $key => $value) {
    $class[] = $value['code_class'];
}

// select all active teaching_year
$selectYear    = ExecuteSelect($connect, "SELECT * FROM teaching_year WHERE isactive = 1");
$year          = [];
foreach ($selectYear as $key => $value) {
    $year[] = $value['code_year'];
}

// select all active users
$selectUser    = ExecuteSelect($connect, "SELECT * FROM users WHERE isactive = 1");
$user          = [];
foreach ($selectUser as $key => $value) {
    $user[] = $value['code_users'];
}

if (isset($_POST['fakeStudent'])) {
    // generate fake data student
    $success = 0;
    $count   = $_POST['count'];
    for ($i = 1; $i <= $count; $i++) {
        $data = [
            'code_student'          => 'STD' . $faker->unique()->numberBetween(100000, 999999),
            'code_class'            => $faker->randomElement($class),
            'code_year'             => $faker->randomElement($year),
            'name_student'          => $faker->firstName() . ' ' . $faker->lastName(),
            'nisn_student'          => $faker->unique()->numberBetween(1000000000, 9999999999),
            'parent_student'        => $faker->firstName() . ' ' . $faker->lastName() . ' ' . $faker->title(),
            'phone_student'         => $faker->phoneNumber(),
            'address_student'       => $faker->address(),
            'date_birth_student'    => $faker->date($format = 'Y-m-d', $max = 'now'),
            'gender_student'        => $faker->randomElement(['1', '2']),
            'password'              => md5('12345'),
            'created_by'            => $faker->randomElement($user),
        ];

        // insert fake data student
        $insertStudent = Insert($connect, 'students', $data);
        if ($insertStudent) {
            $success++;
        }
    }

    echo $success;
}
