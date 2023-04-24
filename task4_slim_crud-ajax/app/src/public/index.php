<?php
ini_set('memory_limit', '256M');

require '../vendor/autoload.php';
require 'helpers.php';
require 'config.php';
require 'Database.php';

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);    */


date_default_timezone_set('Asia/Kolkata');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;

function connectdb()
{
    $db = new Database("php_ajax", "root", "", "localhost");
    return $db;
}

$dotenv = new Dotenv\Dotenv(__DIR__ . str_repeat(DIRECTORY_SEPARATOR . '..', 2));
$dotenv->load();

$config = [
    'apiKey' => $_ENV['API_KEY'],
    'secret' => $_ENV['SECRET'],
    'host' => $_ENV['HOST'],
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false
    ]
];
$app = new \Slim\App($config);

$container = $app->getContainer();
$container['upload_directory'] = __DIR__ . '/uploads';


$app->get('/empList', function ($request, $response, $args) {
    $searchTerm = $request->getQueryParam('keywords');
    $db = connectdb();
    if ($searchTerm == "Male" || $searchTerm == "Female") {
        $sql = "SELECT * FROM student WHERE gender='" . $searchTerm . "'";

    } else if ($searchTerm != '') {
        $sql = "SELECT * FROM student WHERE fname LIKE '%" . $searchTerm . "%' OR lname LIKE '%" . $searchTerm . "%' OR email LIKE '%" . $searchTerm . "%'";
    } else {
        $sql = "SELECT * FROM student";
    }
    $stmt = $db->query($sql);
    $option_details = $db->result_array();
    echo json_encode($option_details);
    exit;
});


$app->post('/addRecords', function ($request, $response) {
    $db = connectdb();
    $params = $request->getParsedBody();
    $hobbies = implode(",", $params['hobbies']);
    if (is_array($_FILES)) {
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $newName = str_replace($_FILES['image']['name'], rand() . $_FILES['image']['name'], $_FILES['image']['name']);
                $source = $_FILES['image']['tmp_name'];
                $target = "../images/" . $newName;
                if (move_uploaded_file($source, $target)) {
                    $file_name = $newName;
                } else {
                    $file_name = "";
                }
            }
        } else {
            $file_name = $params['oldFile'];
        }
    }
    if ($params['methodName'] == "add") {
        $records = array(
            "fname" => $params['fname'],
            "lname" => $params['lname'],
            "email" => $params['email'],
            "password" => md5($params['password']),
            "image" => $file_name,
            "hobbies" => $hobbies,
            "gender" => $params['gender'],
            "description" => $params['description']
        );
        $db->insert('student', $records);
    } else {
        $records = array(
            "fname" => $params['fname'],
            "lname" => $params['lname'],
            "email" => $params['email'],
            "image" => $file_name,
            "hobbies" => $hobbies,
            "gender" => $params['gender'],
            "description" => $params['description'],
            "updated_at" => date("Y-m-d H:i:s")
        );
        $employee_id = $params['employee_id'];
        $db->update('student', $records, array("id" => $employee_id));
    }
});


$app->get('/selectEmployee', function ($request, $response) {
    $db = connectdb();
    $params = $request->getQueryParams();
    $db->select('student', array("id" => $params['employee_id']));
    $option_details = $db->result_array();
    echo json_encode($option_details);
    exit;
});


$app->post('/updateRecords', function ($request, $response) {
    $db = connectdb();
    $params = $request->getParsedBody();
    $hobbies = implode(",", $params['hobbies']);

    if (is_array($_FILES)) {
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $source = $_FILES['image']['tmp_name'];
                $newName = str_replace($_FILES['image']['name'], rand() . $_FILES['image']['name'], $_FILES['image']['name']);
                $target = "../images/" . $newName;
                unlink('../images/' . $params['oldFile']);
                if (move_uploaded_file($source, $target)) {
                    $file_name = $newName;
                } else {
                    $file_name = "";
                }
            }

        } else {
            $file_name = $params['oldFile'];
        }

    }

    $records = array(
        "fname" => $params['fname'],
        "lname" => $params['lname'],
        "email" => $params['email'],
        "hobbies" => $hobbies,
        "image" => $file_name,
        "gender" => $params['gender'],
        "description" => $params['description'],
        "updated_at" => date("Y-m-d H:i:s")
    );
    $employee_id = $params['employee_id'];
    $db->update('student', $records, array("id" => $employee_id));
});








$app->get('/deleteEmployee', function ($request, $response) {
    $db = connectdb();
    $params = $request->getQueryParams();
    $db->select('student', array("id" => $params['id']));
    $option_details = $db->result_array();

    if (is_array($_FILES)) {
        if (isset($option_details[0]['image']) && file_exists("../images/" . $option_details[0]['image'])) {
            unlink('../images/' . $option_details[0]['image']);
        }
    }

    $db->delete('student', array("id" => $params['id']));

    exit;
});

$app->get('/deleteSelected', function ($request, $response) {
    $db = connectdb();
    $params = $request->getQueryParams();
    $ids = explode(",", $params['ids']);
    for ($i = 0; $i < count($ids); $i++) {
        $db->select('student', array("id" => $ids[$i]));
        $option_details = $db->result_array();
        if (is_array($_FILES)) {
            if (isset($option_details[0]['image']) && file_exists("../images/" . $option_details[0]['image'])) {
                unlink('../images/' . $option_details[0]['image']);
            }
        }
        $db->delete('student', array("id" => $ids[$i]));
    }
    exit;
});

// $app->post('/empList123', function ($request, $response) {
// print_r(test());
// $records = $request->getParsedBody();
// });

function test()
{
    return "helllo";
}

$app->run();