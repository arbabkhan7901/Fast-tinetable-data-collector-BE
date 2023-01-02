<?php
class dblms {

	private $lms_hostname;
	private $lms_username;
	private $lms_password;
	private $lms_database;
	private $connectlms;
	private $select_dblms;

	public function __construct() {

		$this->lms_hostname = LMS_HOSTNAME;
		$this->lms_username = LMS_USERNAME;
		$this->lms_password = LMS_USERPASS;
		$this->lms_database = LMS_NAME;

	}

	public function open_connectionlms() {

		try	{

			$this->connectlms 	= mysqli_connect($this->lms_hostname, $this->lms_username, $this->lms_password, $this->lms_database) or die (print "Class Database: Error while connecting to DB (link)");

		}

		catch(exception $e)	{

			return $e;

		}

	}

	public function close_connectionlms() {

		try	{

			mysqli_close($this->connectlms);

		}

		catch(exception $e)	{

			return $e;

		}

	}

	public function querylms($sqllms) {

		try	{

			$this->open_connectionlms();
			$sqllms = mysqli_query($this->connectlms, $sqllms);

		}

		catch(exception $e)	{

			return $e;

		}

		return $sqllms;

		$this->close_connectionlms();

	}


	//Latest Inserted ID
	public function lastestid() {

		$lastid = mysqli_insert_id($this->connectlms);

		return $lastid;

		$this->close_connectionlms();

	}

	//Insert Record in DB
	public function Insert($table, $data){
		$fields = array_keys( $data );  
		$values = array_map('cleanvars', array_values( $data ) );
		$sqlQuery = "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');";

		$result =  $this->querylms($sqlQuery);
		return $result;
	}

	//Update Record in DB
	public function Update($table_name, $form_data, $where_clause=''){   
		// check for optional where clause
		$whereSQL = '';
		if(!empty($where_clause))
		{
			// check to see if the 'where' keyword exists
			if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
			{
				// not found, add key word
				$whereSQL = " WHERE ".$where_clause;
			} else
			{
				$whereSQL = " ".trim($where_clause);
			}
		}
		// start the actual SQL statement
		$sql = "UPDATE ".$table_name." SET ";

		// loop and build the column /
		$sets = array();
		
		foreach($form_data as $column => $value){
			$sets[] = "`".$column."` = '".$value."'";
		}

		$sql .= implode(', ', $sets);

		// append the where statement
		$sql .= $whereSQL;
			
		// run and return the query result
		$result =  $this->querylms($sql);
		return $result;
	}

}
?>