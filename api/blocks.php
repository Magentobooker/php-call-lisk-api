<?php
class blocks {
	
	public function getBlocks($protocol, $host, $port, $generatorPublicKey = '', $height = '', $previousBlock = '', $totalAmount = '', $totalFee = '', $limit = '') {

		$query_string = '';

		if (!empty($generatorPublicKey)) {
			$query_string .= 'generatorPublicKey=' . $generatorPublicKey;
		}

		if (!empty($height)) {
			$query_string .= '&height=' . $height;
		}

		if (!empty($previousBlock)) {
			$query_string .= '&previousBlock=' . $previousBlock;
		}

		if (!empty($totalAmount)) {
			$query_string .= '&totalAmount=' . $totalAmount;
		}

		if (!empty($totalFee)) {
			$query_string .= '&totalFee=' . $totalFee;
		}

		if (!empty($limit)) {
			$query_string .= '&limit=' . $limit;
		}

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['blocks'];

		} else {

			return FALSE;

		}

	}

	public function getBlock($protocol, $host, $port, $blockId = '') {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/get?id=' . $blockId);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['block'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainFee($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getFee');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['fee'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainFees($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getFees');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['fees'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainReward($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getReward');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['reward'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainSupply($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getSupply');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['supply'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainHeight($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getHeight');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['height'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainStatus($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getStatus');

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

	public function getBlockchainNethash($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getNethash');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['nethash'];

		} else {

			return FALSE;

		}

	}

	public function getBlockchainMilestone($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/blocks/getMilestone');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['milestone'];

		} else {

			return FALSE;

		}

	}
}