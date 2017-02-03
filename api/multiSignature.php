<?php
class multiSignature {
	
	public function createMultiSignatureAccount($protocol, $host, $port, $secret, $secondSecret, $lifetime, $min, $keysgroup) {

		$request_array	= array(
						'secret'		=> $secret,
						'secondSecret'	=> $secondSecret,
						'lifetime'		=> $lifetime,
						'min'			=> $min,
						'keysgroup'		=> $keysgroup
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/multisignatures');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
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

	public function getMultiSignatureAccounts($protocol, $host, $port, $publicKey) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/multisignatures/accounts?publicKey=' . $publicKey);

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

	public function signTransaction($protocol, $host, $port, $secret, $publicKey, $transactionId) {

		$request_array	= array(
						'secret'		=> $secret,
						'publicKey'		=> $publicKey,
						'transactionId'	=> $transactionId
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/multisignatures');

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

	public function getPendingMultiSignatureTransactions($protocol, $host, $port, $publicKey) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/multisignatures/pending?publicKey=' . $publicKey);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['transactions'];

		} else {

			return FALSE;

		}

	}
}