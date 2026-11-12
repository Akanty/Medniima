<?php
include ("../controller/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	if (!is_string($username) || !is_string($password) || trim($username) === '' || $password === '') {
		$ErrorMsg = 'Invalid Login Details!';
	} else {
		$username = trim($username);
		$passwordHash = md5($password);
		$accounts = array(
			array('table' => 'tblstudents', 'username' => 'RollId', 'password' => 'password', 'id' => 'StudentId', 'session' => 'slogin', 'home' => 'student'),
			array('table' => 'tblteacher', 'username' => 'username', 'password' => 'password', 'id' => 'id', 'session' => 'tlogin', 'home' => 'staff'),
			array('table' => 'tblparent', 'username' => 'username', 'password' => 'password', 'id' => 'id', 'session' => 'plogin', 'home' => 'parent'),
			array('table' => 'admin', 'username' => 'UserName', 'password' => 'Password', 'id' => 'id', 'session' => 'alogin', 'home' => 'admin')
		);
		$matches = array();
		$queryFailed = false;

		foreach ($accounts as $account) {
			$sql = 'SELECT ' . $account['id'] . ' FROM ' . $account['table']
				. ' WHERE ' . $account['username'] . ' = ? AND ' . $account['password'] . ' = ? LIMIT 2';
			$statement = $db->prepare($sql);
			if (!$statement || !$statement->bind_param('ss', $username, $passwordHash) || !$statement->execute() || !$statement->store_result()) {
				error_log('Unable to verify login credentials: ' . $db->error);
				if ($statement) {
					$statement->close();
				}
				$queryFailed = true;
				break;
			}

			$matchCount = $statement->num_rows;
			if ($matchCount === 1) {
				$statement->bind_result($accountId);
				$statement->fetch();
				$account['account_id'] = $accountId;
				$matches[] = $account;
			} elseif ($matchCount > 1) {
				$matches[] = $account;
				$matches[] = $account;
			}
			$statement->close();
		}

		if ($queryFailed) {
			$ErrorMsg = 'Unable to process your login right now. Please try again later.';
		} elseif (count($matches) === 1) {
			session_regenerate_id(true);
			unset($_SESSION['slogin'], $_SESSION['tlogin'], $_SESSION['plogin'], $_SESSION['alogin']);
			$_SESSION[$matches[0]['session']] = $matches[0]['account_id'];
			header('Location: /' . $matches[0]['home'] . '/');
			exit();
		} elseif (count($matches) > 1) {
			$ErrorMsg = 'These login details match more than one account. Please contact the school administrator.';
		} else {
			$ErrorMsg = 'Invalid Login Details!';
		}
	}
}

include ("../pages/signin.html");

?>