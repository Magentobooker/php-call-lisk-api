<?php
class accounts {

	public function openAccount($protocol, $host, $port, $secret) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/open');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['account'];

		} else {

			return FALSE;

		}

	}

	public function getBalance($protocol, $host, $port, $address) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/getBalance?address=' . $address);

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

	public function getPublicKey($protocol, $host, $port, $address) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/getPublicKey?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['publicKey'];

		} else {

			return FALSE;

		}

	}

	public function generatePublicKey($protocol, $host, $port, $secret) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/generatePublicKey');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['publicKey'];

		} else {

			return FALSE;

		}

	}

	public function getAccount($protocol, $host, $port, $address) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['account'];

		} else {

			return FALSE;

		}

	}

	public function getDelegates($protocol, $host, $port, $address) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/delegates?address=' . $address);

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
}