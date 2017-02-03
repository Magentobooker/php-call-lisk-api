<?php
class delegates {
	
	public function enableDelegate($protocol, $host, $port, $secret, $secondSecret, $username) {

		$request_array	= array(
						'secret'		=> $secret,
						'secondSecret'	=> $secondSecret,
						'username'		=> $username
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['transaction'];

		} else {

			return FALSE;

		}
	}

	public function getDelegates($protocol, $host, $port, $limit = 10, $offset = '', $orderBy = '') {

		$query_string = '';

		if (!empty($limit)) {
			$query_string .= 'limit=' . $limit;
		}

		if (!empty($offset)) {
			$query_string .= '&offset=' . $offset;
		}

		if (!empty($orderBy)) {
			$query_string .= '&orderBy=' . $orderBy;
		}

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['delegates'];

		} else {

			return FALSE;

		}

	}

	public function getDelegateByPublicKey($protocol, $host, $port, $publicKey) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/get?publicKey=' . $publicKey);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['delegate'];

		} else {

			return FALSE;

		}

	}

	public function getDelegateByUsername($protocol, $host, $port, $username) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/get?username=' . $username);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['delegate'];

		} else {

			return FALSE;

		}

	}

	public function searchDelegates($protocol, $host, $port, $q = 'username', $orderBy = '') {

		$query_string = '';

		if (!empty($q)) {
			$query_string .= 'q=' . $q;
		}

		if (!empty($orderBy)) {
			$query_string .= '&orderBy=' . $orderBy;
		}

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/search?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['delegates'];

		} else {

			return FALSE;

		}

	}

	public function getDelegatesCount($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/count');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['count'];

		} else {

			return FALSE;

		}

	}

	public function getVotes($protocol, $host, $port, $address) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/delegates/?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['delegates'];

		} else {

			return FALSE;

		}

	}

	public function getVoters($protocol, $host, $port, $publicKey) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/voters?publicKey=' . $publicKey);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['accounts'];

		} else {

			return FALSE;

		}

	}

	public function enableForging($protocol, $host, $port, $secret) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/forging/enable');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}

	public function disableForging($protocol, $host, $port, $secret) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/forging/disable');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}

	public function getForged($protocol, $host, $port, $generatorPublicKey) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/forging/getForgedByAccount?generatorPublicKey=' . $generatorPublicKey);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}

	public function getNextForgers($protocol, $host, $port, $limit = 10) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/delegates/getNextForgers?limit=' . $limit);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}
}