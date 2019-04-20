<?php
class DashboardClass{
   
    private $database;

    public function getdatabase(){
         global $db;
         return $this->database = $db;
    }

    public function insertNavbar($dashboard){
        global $db;
        $sql= $db->query("INSERT INTO navbar(navbar_dashboard) VALUES('$dashboard')");
        ($sql)? "good":"ERROR: Could not able to execute $sql.".mysqli_error($db);
    }

    public function updateNavbar($dashboard){
        global $db;
        $sql= $db->query("UPDATE INTO navbar(navbar_dashboard) VALUES('$dashboard')");
        ($sql)? "good":"ERROR: Could not able to execute $sql.".mysqli_error($db);
    }

    public function deleteNavbar($id){
        global $db;
        $sql= $db->query("DELETE FROM navbar WHERE id= $id");
        ($sql)? "good":"ERROR: Could not able to execute $sql.".mysqli_error($db);
    }

    public function explodeFetchNavbar($id){
        global $db;
            $sql= $db->query("SELECT navbar_dashboard FROM navbar WHERE id= $id");
            ($sql)? "good":"ERROR: Could not able to execute $sql.".mysqli_error($db);
            $row=$sql->fetch_array();
            $var= $row['navbar_dashboard'];
            $expode = explode("=",$var);
            for ($i=0; $i < count($expode); ++$i) { 
             echo ' <li class="nav-item ">
                             <a class="nav-link" id="pages" href="'.$expode[$i].'.php">'.$expode[$i].'</a>
                    </li>';
            }
    }

     public function login($email,$password,$datetime)
    {
        global $db;
        $mysqli=$db;
        $query= $mysqli->query("SELECT user_id , username, email , language FROM users WHERE email='$email' AND password= '$password' ");
         // COUNTING LAST TIME HE OR SHE LOGIN IN 
        $mysqli->query("UPDATE users SET last_login = '$datetime'  WHERE email='$email' AND password= '$password' ");
        $mysqli->query("UPDATE users SET counts_login=counts_login + 1 WHERE email='$email' AND password= '$password' ");
        $row= $query->fetch_array();
        $count=$query->num_rows;
        if ($count > 0) {
            $_SESSION['key'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['language'] = $row['language'];
            if (isset($_SESSION['key'])){
            //    header('Location: '.BASE_URL_PRIVATE.'dashboard.php');
                return true;
             }
        }else {
            $_SESSION['email'] = $row['email'];
            return false;
        }
    }

     public function loggedin()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['key'])) {
            return true;
        }else {
            return false;
        }
    }
     public function test_input($data)
    {
        global $db;
        $mysqli=$db;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $mysqli->real_escape_string($data);
        return $data;
    }
    
    public function countUSERS()
    {
        global $db;
        $sql= $db->query('SELECT COUNT(*) FROM users');
        $row_users = $sql->fetch_array();
        $total_user= array_shift($row_users);
        $array= array(42,$total_user);
        $total_users= array_sum($array);
        echo $total_users;
    }

    public function countPOSTS()
    {
        global $db;
        $sql= $db->query('SELECT COUNT(*) FROM posts');
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(1030,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }

    public function countPages()
    {
        global $db;
        $sql= $db->query('SELECT COUNT(*) FROM pages');
        $row_pages = $sql->fetch_array();
        $total_page= array_shift($row_pages);
        $array= array(4200,$total_page);
        $total_pages= array_sum($array);
        echo $total_pages;
    }

    public function countVISITORS()
    {
        global $db;
        $sql= $db->query('SELECT COUNT(*) FROM visitors');
        $row_visitors = $sql->fetch_array();
        $total_visitor= array_shift($row_visitors);
        $array= array(20234,$total_visitor);
        $total_visitors= array_sum($array);
        echo $total_visitors;
    }

    public function table_USERS_ADMIN()
    {
        global $db;
        $sql= $db->query('SELECT * FROM users');
        $row = $sql->fetch_array();
        $results= $row_visitors;
        $visitor= array_shift($row_visitors);
        $array= array(20234,$total_visitor);
        $total_visitors= array_sum($array);
        echo $total_visitors;
    }

      public function timeAgo($datetime)
    {
        $mysqli= $this->database;
        $time= strtotime($datetime);
        $current= time($datetime);
        $second= $current - $time;
        $minute= round($second / 60);
        $hour= round($second / 3600);
        $month= round($second / 2600640);

        if ($second <= 60) {
            # code...
             if ($second == 0 ) {
                 # code...
                 return 'now'; 
              }else {
                  # code...
                  return $second.'s'; 
              }

        }elseif ($minute <= 60) {
            # code...
             return $minute.'m'; 
        }elseif ($hour <= 24) {
            # code...
             return $hour.'h'; 

        }elseif ($month <= 12) {
            # code...
             return date('M j',$time); 

        }else { 
            # code...
             return date('M j, Y',$time); 
        }

    }
    public function lengths($date){
        if(strlen($date) == 11  || strlen($date) == 10) {
            return '<p class="btn btn-danger btn-sm">Old</p>';
        }else{
            return '<p class="btn btn-primary btn-sm">New</p>';
        }
    }

    function Users_usage_dashboard($usage){
        if($usage == 0){
            $variable = 1;
        }else{
            $variable = $usage;
        }

    switch ($variable) {
        case $variable <= 5 :
            # code...
            return '<div class="progress-bar bg-danger" role="progressbar"
                    style="width: '.$variable.' %" aria-valuenow="1" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 10 :
            # code...
            return '<div class="progress-bar bg-danger" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 15 :
            # code...
            return '<div class="progress-bar bg-danger" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 25:
            # code...
            return '<div class="progress-bar bg-warning" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 35:
            # code...
            return '<div class="progress-bar bg-info" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 50:
            # code...
            return '<div class="progress-bar bg-info" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 60:
            # code...
            return '<div class="progress-bar bg-info" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        case $variable <= 75:
            # code...
            return '<div class="progress-bar bg-primary" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        default:
            # code...
            return '<div class="progress-bar bg-success" role="progressbar"
                    style="width: '.$variable.'%" aria-valuenow="'.$variable.'" aria-valuemin="0"
                    aria-valuemax="100">'.$variable.'%</div>';
            break;
        }
    } 

}

$dashboardpage= new DashboardClass();

?>