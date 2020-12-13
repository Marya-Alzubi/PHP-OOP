<?php 
	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "crud_oop";
		private $conn;
		// Database Connection 
		public function __construct()
		{
			$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			if(mysqli_connect_error())
			{
				die(" Connect Failed ");
			}
	} 

        // create record
		public function insert(){

			if (isset($_POST['submit'])) {
					if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['password']) && !empty($_POST['address'])) {
						$name = $_POST['name'];
						$mobile = $_POST['mobile'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						$address = $_POST['address'];

						$query = "INSERT INTO records (name,email,mobile,password,address) VALUES ('$name','$email','$mobile','$password', '$address')";
						if ($sql = mysqli_query($this->conn,$query)) {
							echo '<div class="text-center alert alert-success">';
							echo "records added successfully";
							echo '</div>';
						}else{
							echo '<div class="text-center alert alert-danger">';
							echo "failed in record process";
							echo '</div>';
						}

					}else{
						echo '<div class="text-center alert alert-danger">';
						echo "all empty fields are required";
						echo '</div>';
					}

			}
		}

		// read record into table
		public function fetch(){
			$data = null;
			$query = "SELECT * FROM records";
			if ($sql = mysqli_query($this->conn,$query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		// delete record
		public function delete($id){

			$query = "DELETE FROM records where id = '$id'";
			if ($sql = mysqli_query($this->conn,$query)) {
				return true;
			}else{
				return false;
			}
		}

		// read single record
		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM records WHERE id = '$id'";
			if ($sql = mysqli_query($this->conn,$query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		// fetch record to update it 
		public function edit($id){

			$data = null;

			$query = "SELECT * FROM records WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		// update the fetched record 
		public function update($data){

			$query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}
