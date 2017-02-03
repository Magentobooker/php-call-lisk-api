<?php
class peers {
	
	public function getPeers($protocol, $host, $port, $state = '', $os = '', $version = '', $limit = '', $offset = '', $orderBy = '') {

		$query_string = '';

		//state: State of peer. 1 - disconnected. 2 - connected. 0 - banned. (Integer)
		if (!empty($state)) {
			$query_string .= 'state=' . $state;
		}

		if (!empty($os)) {
			$query_string .= '&os=' . $os;
		}

		if (!empty($version)) {
			$query_string .= '&version=' . $version;
		}

		if (!empty($limit)) {
			$query_string .= '&limit=' . $limit;
		}

		if (!empty($offset)) {
			$query_string .= '&offset=' . $offset;
		}

		if (!empty($orderBy)) {
			$query_string .= '&orderBy=' . $orderBy;
		}

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/peers?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['peers'];

		} else {

			return FALSE;

		}

	}

	public function getPeer($protocol, $host, $port, $ip = '', $peerPort = '') {

		$query_string = '';

		if (!empty($ip)) {
			$query_string .= 'ip=' . $ip;
		}

		if (!empty($peerPort)) {
			$query_string .= '&port=' . $peerPort;
		}

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/peers/get?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['peer'];

		} else {

			return FALSE;

		}

	}

	public function getPeerInfo($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/peers/version');

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