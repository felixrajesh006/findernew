<?php

/**
 * Requirement : REQ-003
 * Form : Input Initation
 * Developer: Jaishalini R
 * Created On: 21 Sep 2016
 * class to Initiate Import
 * 
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\ImportInitiates $ImportInitiates
 */
class ProductmasterController extends AppController {

    /**
     * to initialize the model/utilities gonna to be used this page
     */
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Id' => 'asc'
        ]
    ];
    public $RegionId = 1011;
    public $target_dir = "uploads/";

    public function initialize() {

        parent::initialize();
//        $this->loadComponent('Categorymaster');
        $this->loadModel('Categorymaster');
//        $this->loadModel('importinitiates');
//        $this->loadModel('Puquery');
//        $this->loadModel('GetJob');
//        $this->loadComponent('RequestHandler');
//        $this->loadComponent('Paginator');
//        $this->loadModel('AbstractionReport');
    }

    public function pr($array, $y = '') {
        echo "<pre>";
        print_r($array);
        if (empty($y)) {
            exit;
        }
    }

    function Insertdata($table, $data) {
        $connection = ConnectionManager::get('default');
        $field = array_keys($data);
        $dataVal = array_values($data);
        $dataVal = array_map('addslashes', $dataVal);

        $field_values = implode(',', $field);
        $data_values = "'" . implode("','", $dataVal) . "'";

        $sql = "INSERT INTO $table ( $field_values ) VALUES( $data_values )";

        $result = $connection->query($sql);
    }

    /* function to build SQL UPDATE string */
    public function productjsonbuild() {

        // $type = 1 phone 
        $type = 1;
        $arrays[$type][] = array("lable"=>"Product Name",'value'=>"","key"=>"product_name");
        
        
                
        $array[1]['product_name'] = '';
        $array[1]['price'] = '';
        $array[1]['mrp_price'] = '';
        $array[1]['offer'] = '';
        $array[1]['ratings'] = '';
        $array[1]['product_type'] = '';
        $array[1]['ratings'] = '';
        
        
        
        
        
        
        echo "t";
        exit;
    }

    public function index() {
        try {
            $connection = ConnectionManager::get('default');
            $list = $connection->execute("SELECT * FROM category_prod ")->fetchAll('assoc');
//        $session = $this->request->session();
            
 
            $token = $this->request->getParam('_csrfToken');
            $this->set('token', $token);

            $this->set('list', $list);

            $defualtData = array(
                "cat_name" => "",
                "img" => "",
                "sort" => "",
                "product_type" => "",
                "status" => "",
                "dels" => "",
                "id" => "",
            );

 
            $this->set('editlist', $defualtData);

            if (!empty($this->request->query("id"))) {
                $id = $this->request->query("id");
                $editlist = $connection->execute("SELECT * FROM category_prod where id='$id'")->fetchAll('assoc');
                $edit = $editlist[0];
                $this->set('editlist', $edit);
            }

            if (isset($this->request->data['submit'])) {

                //move files on folder
                $cat_name = $this->request->data['cat_name'];
                $img = $_FILES["uploadfile"]["name"];
                $sort = $this->request->data['sort'];
                $product_type = $this->request->data['product_type'];
                $status = $this->request->data['status'];
                $dels = $this->request->data['dels'];
                $id = $this->request->data['id'];


                if (!empty($img)) {
                    $rand = rand(1220, 100022);
                    $img = str_replace(" ", "_", $rand . "_" . $img);
                    $_FILES["uploadfile"]["name"] = $img;
                }

                $insertData = array(
                    "cat_name" => $cat_name,
                    "sort" => $sort,
                    "product_type" => $product_type,
                    "status" => $status,
                    "dels" => $dels,
                );

                if (!empty($img)) {
                    $insertData["img"] = $img;
                }

                if (!empty($_FILES["uploadfile"]["name"])) {
                    //uploadfile
                    $target_dir = $this->target_dir;

                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);

                    if (file_exists($target_file)) {
                        $this->Flash->error(__('Sorry, file already exists.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $this->Flash->error(__('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
                        return $this->redirect(['action' => 'index']);
                    }

                    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {

//                        $this->Flash->success("The file " . basename($_FILES["uploadfile"]["name"]) . " has been uploaded.");
//                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Sorry, there was an error uploading your file.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }

                if (!empty($id)) {
                    $where = " id = '$id'";
                    // unlink image existing
                    $target_dir = $this->target_dir;
                    $imglink = $connection->execute("SELECT img FROM category_prod where id='$id'")->fetchAll('assoc');
                    $unlinkimg = $imglink[0]['img'];
                    if (file_exists($target_dir . $unlinkimg)) {
                        unlink($target_dir . $unlinkimg);
                    }
//                    $this->build_update_data("category_prod", $insertData, $where);
                     $result = $this->Categorymaster->find('Insertdata', ['table' => 'category_prod','where' => $where, 'data' => $insertData]);
                     
                    $this->Flash->success("Successfully Updated");
                } else {
                      $result = $this->Categorymaster->find('Insertdata', ['table' => 'category_prod', 'data' => $insertData]);
//                    $this->Insertdata("category_prod", $insertData);
                    $this->Flash->success("Successfully added");
                }

                return $this->redirect(['action' => 'index']);


//            $strContent = $this->request->data['translatehtml'];
//            $pdffilename = $this->request->data['pdffilename'];
//            $pdffilename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $pdffilename);
//            $basepdffilename = $pdffilename;
//            $pdffilename = $pdffilename . '.pdf';
//
//            $mpdf->WriteHTML($strContent);
//            $uploadFolder = "htmlfiles/TranslationOutput/";
//
//            if (empty($basepdffilename)) {
////                $basepdffilename = "test.html";
//                $this->Flash->error(__('Missing File name!'));
//                //  return $this->redirect(['action' => 'index']);
//            }
//            $target_dir = "uploads/";
//            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//            $uploadOk = 1;
//            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//// Check if image file is a actual image or fake image
//            if (isset($_POST["submit"])) {
//                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//                if ($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
//                    $uploadOk = 1;
//                } else {
//                    echo "File is not an image.";
//                    $uploadOk = 0;
//                }
//            }
//// Check if file already exists
//            if (file_exists($target_file)) {
//                echo "Sorry, file already exists.";
//                $uploadOk = 0;
//            }
//// Check file size
//            if ($_FILES["fileToUpload"]["size"] > 500000) {
//                echo "Sorry, your file is too large.";
//                $uploadOk = 0;
//            }
//// Allow certain file formats
//            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                $uploadOk = 0;
//            }
//// Check if $uploadOk is set to 0 by an error
//            if ($uploadOk == 0) {
//                echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//            } else {
//                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//                } else {
//                    echo "Sorry, there was an error uploading your file.";
//                }
//            }
            }
        } catch (\Exception $e) {
            $this->Flash->success("Error:" . $e->getMessage());
            return $this->redirect(["action" => 'index']);
        }
    }

    public function getmonthlist($date1, $date2) {

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        if ($diff > 0) {
            for ($i = 0; $i <= $diff; $i++) {
                $months[] = date('_n_Y', strtotime("$date1 +$i month"));
            }
        } else {
            $months[] = date('_n_Y', strtotime($date1));
        }
        return $months;
    }

    function combineBySubGroup($keysss) {
        $mainarr = array();
        foreach ($keysss as $key => $value) {
            if (!empty($value))
                $mainarr[$value['SubGroupId']][] = $value;
        }
        return $mainarr;
    }

}
