<?php
class loader {

	public function getLoadingStatus($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/loader/status');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}

	public function getSynchronizationStatus($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/loader/status/sync');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}

	public function getBlockReceiptStatus($protocol, $host, $port) {

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/loader/status/ping');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$response	= curl_exec($curl);

		$data		= json_decode($response, true);

		if ($data['success'] == TRUE) {

			return $data;

		} else {

			return FALSE;

		}

	}
	
}