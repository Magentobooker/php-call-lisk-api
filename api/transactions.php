<?php
class transactions {

	public function getTransactions($protocol, $host, $port, $blockId = '', $senderId = '', $recipientId = '', $limit = '', $offset = '', $orderBy = '') {

		$query_string = '';

		if (!empty($blockId)) {
			$query_string .= 'blockId=' . $blockId;
		}

		if (!empty($senderId)) {
			$query_string .= '&senderId=' . $senderId;
		}

		if (!empty($recipientId)) {
			$query_string .= '&recipientId=' . $recipientId;
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

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions?' . $query_string);

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

	public function sendTransaction($protocol, $host, $port, $secret, $amount, $recipientId, $publicKey, $secondSecret) {

		$request_array	= array(
						'secret'		=> $secret,
						'amount'		=> floatval($amount) * 100000000,
						'recipientId'	=> $recipientId,
						'publicKey'		=> $publicKey,
						'secondSecret'	=> $secondSecret
						);

		$request	= json_encode($request_array);

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions');

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

	public function getTransaction($protocol, $host, $port, $transactionId) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions/get?id=' . $transactionId);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['transaction'];

		} else {

			return FALSE;

		}

	}

	public function getUnconfirmedTransaction($protocol, $host, $port, $transactionId) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions/unconfirmed/get?id=' . $transactionId);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['transaction'];

		} else {

			return FALSE;

		}

	}

	public function getUnconfirmedTransactions($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions/unconfirmed');

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

	public function getQueuedTransaction($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions/queued');

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

	public function getSpecificQueuedTransaction($protocol, $host, $port, $transactionId) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/transactions/queued/get?id=' . $transactionId);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['transaction'];

		} else {

			return FALSE;

		}

	}

}