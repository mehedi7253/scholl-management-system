
<?php
//create function userExists
function userExists($username) {
	// global keywords is used to access a global variable from within a function
	global $connect;

	$sql = "SELECT * FROM students WHERE username = '$username'"; // select  students by username
	$query = $connect->query($sql);// execute query

    //check user email
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$connect->close(); // database close
	// close the database connection
}


//make function registerUser
function registerUser() {
    // global keywords is used to access a global variable from within a function
	global $connect;

	//image upload
    $fileinfo = PATHINFO($_FILES['image']['name']); // file information
    $newfilename  = $fileinfo['filename']. "." .$fileinfo['extension']; // upload path and name with extension
    move_uploaded_file($_FILES['image']['tmp_name'],"../images/" .$newfilename); // upload file
    $location = $newfilename; // location info

	$fname     = $_POST['fname']; // variable fname for first name
	$lname     = $_POST['lname']; // variable lname for last name
	$username  = $_POST['username']; // variable username for user name
	$password  = $_POST['password']; // variable password for password
	
	$newPassword = makePassword($password); // make newassword function
    // if password match with confrrm password then user data will be inserted into database table students.
	if($newPassword) {
		$sql = "INSERT INTO students (first_name, last_name, username, password, image, status) VALUES ('$fname', '$lname', '$username', '$newPassword', '$location', '0')";
		$query = $connect->query($sql);
		if($query === TRUE) {
			return true;
		} else {
			return false;
		}
	} // /if

	$connect->close();
	// close the database connection
}

// make pssword more sequre using hash.
function makePassword($password) {
	return hash('sha256', $password);
}

//get all user information by username
function userdata($username) {
    // global keywords is used to access a global variable from within a function
    global $connect;

	$sql = "SELECT * FROM students WHERE username = '$username'"; // select students username for getteing student data
	$query = $connect->query($sql);
	$result = $query->fetch_assoc(); // get all information
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$connect->close();
	// close the database connection
}

// making function login
function login($username, $password) {
    // global keywords is used to access a global variable from within a function

    global $connect;
	$userdata = userdata($username); // suppose userdata is equal userdata for finding user data by username

    //check  user information
	if($userdata) {
		$makePassword = makePassword($password);
		$sql = "SELECT * FROM students WHERE username = '$username' AND password = '$makePassword'"; //if username and passwod is match user can loged in otherwise not
		$query = $connect->query($sql);

		//check available user
		if($query->num_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	$connect->close();
	// close the database connection
}

// making function getUserDataByUserId .. for finding user information. and it will be get user data via user id
function getUserDataByUserId($id) {
    // global keywords is used to access a global variable from within a function
    global $connect;

	$sql = "SELECT * FROM students WHERE id = $id"; // select all students via id
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();
	return $result;

	$connect->close();
	//database close
}

// make function to check user exists
function users_exists_by_id($id, $username) {
    // global keywords is used to access a global variable from within a function
    global $connect;

    // if useername all ready registerd into database this query will makesure user data is available there. if not user can regester
	$sql = "SELECT * FROM students WHERE username = '$username' AND id != $id";
	$query = $connect->query($sql);
	if($query->num_rows >= 1) {
		return true;
	} else {
		return false;
	}

	$connect->close();
}

//make update function
function updateInfo($id) {
    // global keywords is used to access a global variable from within a function
    global $connect;

//	$username    = $_POST['username'];
	$fname       = $_POST['fname'];
	$lname       = $_POST['lname'];
	$contact     = $_POST['contact'];
	$address     = $_POST['address'];
    $dob         = $_POST['dob'];
    $gender      = $_POST['gender'];
    $fathername  = $_POST['fathername'];
    $mothername  = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];

    //update query
	$sql = "UPDATE students SET  first_name = '$fname', last_name = '$lname', contact = '$contact', address = '$address', dob = '$dob', gender = '$gender', fathername = '$fathername', mothername = '$mothername', fatherphone = '$fatherphone', motherphone = '$motherphone' WHERE id = $id";
	$query = $connect->query($sql);
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}
// functio for session logged_in used by user id
function logged_in() {
	if(isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}
// functio for session not_logged_in used by user id

function not_logged_in() {
	if(isset($_SESSION['id']) === FALSE) {
		return true;
	} else {
		return false;
	}
}

//make logout function
function logout() {
	if(logged_in() === TRUE){
		// remove all session variable
		session_unset();

		// destroy the session
		session_destroy();

		header('location: ../index2.php');
	}
}
//make function check match password
function passwordMatch($id, $password) {
    // global keywords is used to access a global variable from within a function
    global $connect;

	$userdata = getUserDataByUserId($id); // get user data by their id

	$makePassword = makePassword($password);

	//check password match
	if($makePassword == $userdata['password']) {
		return true;
	} else {
		return false;
	}

	// close connection
	$connect->close();
	//database close
}

//make function change password
function changePassword($id, $password) {
    // global keywords is used to access a global variable from within a function

    global $connect;

	$makePassword = makePassword($password);
	$sql = "UPDATE users SET password = '$makePassword', WHERE id = $id"; // udate password
	$query = $connect->query($sql);

	//if password match then password will change
	if($query === TRUE) {
		return true;
	} else {
		return false;
	}
}


