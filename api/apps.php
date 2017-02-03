<?php
class apps {
	
	public function getApps($protocol, $host, $port, $category = '', $name = '', $type = '', $link = '', $limit = '', $offset = '', $orderBy = '') {

		$query_string = '';

		if (!empty($category)) {
			$query_string .= 'category=' . $category;
		}

		if (!empty($name)) {
			$query_string .= '&name=' . $name;
		}

		if (!empty($type)) {
			$query_string .= '&type=' . $type;
		}

		if (!empty($link)) {
			$query_string .= '&link=' . $link;
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

		$curl = curl_init($protocol . '://' . $host . ':' . $port . '/api/dapps?' . $query_string);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

		$response	= curl_exec($curl);

		$data		= json_decode($response, TRUE);

		if ($data['success'] == TRUE) {

			return $data['dapps'];

		} else {

			return FALSE;

		}

	}
}