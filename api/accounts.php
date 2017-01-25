<?php
class accounts {

	public function openAccount($secret, $protocol, $host, $port) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/open');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['account'];

		} else {

			return FALSE;

		}

	}

	public function getBalance($address, $protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/getBalance?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['balance'];

		} else {

			return FALSE;

		}

	}

	public function getPublicKey($address, $protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/getPublicKey?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['publicKey'];

		} else {

			return FALSE;

		}

	}

	public function generatePublicKey($secret, $protocol, $host, $port) {

		$request_array	= array(
						'secret'		=> $secret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/generatePublicKey');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['publicKey'];

		} else {

			return FALSE;

		}

	}

	public function getAccount($address, $protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts?address=' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['account'];

		} else {

			return FALSE;

		}

	}

	public function getDelegates($address, $protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/accounts/delegates?address' . $address);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data['delegates'];

		} else {

			return FALSE;

		}

	}
}