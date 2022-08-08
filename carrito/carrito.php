<?php
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;
	define('MP_SANDBOX',false);

	date_default_timezone_set('America/Argentina/Mendoza');

	function debug($var) {
		echo "<pre>".print_r($var,true)."</pre>";
	}

	function cancel($var) {
		echo "<pre>".print_r($var,true)."</pre>";
		die();
	}

	include '../db.php';

	// function conectar_bd() {
	// 	$dsn = 'mysql:host=localhost;dbname=rioavent_bd;charset=utf8';
	// 	$conexion=new PDO($dsn, 'rioaventura', 'rio123**');
	// 	$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	// 	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	//$conexion->exec("set names utf8");
	// 	return $conexion;
	// }

	$task = @$_POST['task']?:'';
	// $cat = @$_POST['cat']?:'';

	switch ($task) {
		case 'datos_paquete':
			datos_paquete();
			break;

		case 'url_pago':
			url_pago();
			break;

		default:
			http_response_code('404');
			break;
	}

	function datos_paquete(){
		try {

			if(!empty($_POST['id'])){
				$id = $_POST['id'];
			}else{
				throw new Exception('ID vacio');
			}

			if(!empty($_POST['cat'])){
				$cat = $_POST['cat'];
			}else{
				throw new Exception('Categoría vacia');
			}

			$db = conectar_bd();
			// $sql = 'SELECT * FROM paquetes WHERE id=:id';
			
			////////  ACÁ HAGO UN IF() SI ES PAQUETE O RECORRIDO Y CAMBIA LA CONSULTA //////////////////////
			if ($cat=="Paquete") {
				$sql = 'SELECT * FROM paquetes_bikini_tours WHERE id=:id';
				$sth = $db->prepare($sql);
				$sth->execute(array(':id' => $id));
				$rows = $sth->fetch();
				$rows['categoria']=$cat;
			}
			else if ($cat=="Recorrido") {
				$sql = 'SELECT 
			            recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal AS id,recorridos_especiales.nombre_recorrido_especial AS titulo, recorridos_especiales.precio_recorrido_especial AS precio,paquetes_bikini_tours.titulo AS nombre_paquete, paquetes_bikini_tours.tiene_transporte AS tiene_transporte, paquetes_bikini_tours.precio_transporte AS precio_transporte
			          FROM 
			            recorridos_especiales
			          LEFT JOIN 
			            paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
			          WHERE 
			            recorridos_especiales.habilitado=1 AND recorridos_especiales.id_especial=:id';
				$sth = $db->prepare($sql);
				$sth->execute(array(':id' => $id));
				$rows = $sth->fetch();
				$rows['categoria']=$cat;
			}


			header('Content-type: application/json');
			echo json_encode($rows);

		} catch (Exception $e) {
			cancel($e);
		}
	}

	function url_pago(){
		require __DIR__  . '/../PayPal-PHP-SDK/autoload.php';
		require __DIR__  . '/../MercadoPago-PHP-SDK/mercadopago.php';

		try {
			// if(empty($_POST['data'])) throw new Exception('No hay datos');
			// $items = $_POST['data'];
			// $ids = [];

			$totalis = $_POST['total'];

			// foreach ($items as $k => &$item) {
			// 	$db = conectar_bd();

			// 	if ($item['categoria']=='Paquete') {
			// 		# code...
			// 		if($item['cantidad'] < 1) throw new Exception('Error en la cantidad');
			// 		// $item['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $item['fecha'])));
			// 		$item['date'] = date('d-m-Y', strtotime(str_replace('/', '-', $item['fecha'])));
			// 		$item['datediff'] = strtotime($item['date']) - time();
			// 		if($item['datediff'] < (60*60*24)) throw new Exception('Error en la fecha');
			// 		$item['transporte'] = ($item['transporte'] == 'true');
			// 		$ids[] = $item['id'];

			// 		$sql = 'SELECT * FROM paquetes_bikini_tours WHERE FIND_IN_SET(id,:ids)';
			// 		$sth = $db->prepare($sql);
			// 		$sth->execute(array(
			// 			':ids' => join($ids,','),
			// 		));
			// 		$paquetes = $sth->fetchAll();

			// 	}
			// 	else if ($item['categoria']=='Recorrido') {
			// 		# code...
			// 		if($item['cantidad'] < 1) throw new Exception('Error en la cantidad');
			// 		// $item['date'] = date('Y-m-d', strtotime(str_replace('/', '-', $item['fecha'])));
			// 		$item['date'] = date('d-m-Y', strtotime(str_replace('/', '-', $item['fecha'])));
			// 		$item['datediff'] = strtotime($item['date']) - time();
			// 		if($item['datediff'] < (60*60*24)) throw new Exception('Error en la fecha');
			// 		$item['transporte'] = ($item['transporte'] == 'true');
			// 		$ids[] = $item['id'];
			// 		// $titulo[] = $item['titulo'];

			// 		$sql = 'SELECT 
			//             recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal AS id,recorridos_especiales.nombre_recorrido_especial AS titulo, recorridos_especiales.precio_recorrido_especial AS precio,paquetes_bikini_tours.titulo AS nombre_paquete, paquetes_bikini_tours.tiene_transporte AS tiene_transporte, paquetes_bikini_tours.precio_transporte AS precio_transporte
			//           FROM 
			//             recorridos_especiales
			//           LEFT JOIN 
			//             paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
			//           WHERE 
			//             recorridos_especiales.habilitado=1 AND recorridos_especiales.nombre_recorrido_especial=:titulo AND FIND_IN_SET(id_recorrido_principal,:ids)';
			//         $sth = $db->prepare($sql);
			// 		$sth->execute(array(
			// 			':ids' => join($ids,','),
			// 			':titulo' => $item['titulo'],
			// 		));
			// 		$paquetes = $sth->fetchAll();
			// 	}
			// }
			// $sql = 'SELECT * FROM paquetes_bikini_tours WHERE FIND_IN_SET(id,:ids);';
			// $sth = $db->prepare($sql);
			// $sth->execute(array(
			// 	':ids' => join($ids,','),
			// ));
			// $paquetes = $sth->fetchAll();



			// $arr = [];
			// foreach ($paquetes as $k => &$paquete) {
			// 	$arr[$paquete['id']] = $paquete;
			// }
			// $paquetes = $arr; unset($arr);

			// cancel($items);

		} catch (Exception $e) {
			cancel($e);
		}

		// cancel($items);
		// https://developer.paypal.com/webapps/developer/applications/myapps
		$apiContext = new \PayPal\Rest\ApiContext(
		    new \PayPal\Auth\OAuthTokenCredential(
            'Ae9xOA2wRjhusWH-oPhy4IX7N56YWtllH60icSuFTlbOkeguExdT7cgRlnYcs4WnatyYFU_SHS7R5khp',
            'EFzMg4BNt1H-yejVC6Rzx4Y-91AR2n-un2HI22TBXY-pdZn1se5mv0teNf0ZH6DpILEdmLl9dH0PsYYG'
		        // 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',     // ClientID
		        // 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL'      // ClientSecret
		    )
		);

	    $apiContext->setConfig( array(
	      'mode' => 'live',
	      'log.LogEnabled' => true,
	      'log.FileName' => '../PayPal.log',
	      'log.LogLevel' => 'FINE', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
	      'cache.enabled' => true,
	      // 'http.CURLOPT_CONNECTTIMEOUT' => 30
	      // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
	    ));


		// $mp = new MP('7845469171684443', 'gk5LXh8kQrfyz17kxuF1mvZgpA3GsuEh');
		$mp = new MP('3082999988489002', 'wqA2px34EvDsEkys5oN12nk3W19u0Gi9'); // TEST USER
		$mp->sandbox_mode(MP_SANDBOX);

		// cancel($mp);

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information
		$total = 0;
		$items_pp = [];
		$items_mp = [];
		// foreach($items as $k=> &$item){

			// $precio = floatval($paquetes[$item['id']]['precio']);
			// if($item['transporte']){
			// 	$precio += floatval($paquetes[$item['id']]['precio_transporte']);
			// }

			$item_pp = new Item();
			// $item_pp->setName( $paquetes[$item['id']]['titulo'].' - '.$item['fecha'])
			$item_pp->setName( 'Algo')
		    ->setCurrency('USD')
		    // ->setQuantity(floatval($item['cantidad']))
		    ->setQuantity(1)
		    // ->setSku('sku-'.$item['id']) // Similar to `item_number` in Classic API
		    // ->setPrice($precio);
		    ->setPrice($totalis);

			$items_mp[] = array(
				// "title" => 'Rio aventura - '.$item['fecha'],
				"title" => 'Rio aventura ',
				// "description" => $paquetes[$item['id']]['titulo'],
				"description" => 'Compra de paquete',
				"currency_id" => "ARS",
				"category_id" => "others",
				"quantity" => floatval($item['cantidad']),
				"unit_price" => floatval($precio),
			);

			$total += $precio * $item['cantidad'];

			$items_pp[] = $item_pp;
		// }
		// cancel($items_pp);
		// cancel($items_mp);
		$itemList = new itemList();
		$itemList->setItems($items_pp);

		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal($total);
		    // ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());

		// ### Redirect urls
		// Set the urls that the buyer must be redirected to after
		// payment approval/ cancellation.
		$baseUrl = 'http://www.rioaventuramendoza.com.ar/'; //getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("$baseUrl/?success=true")
		    ->setCancelUrl("$baseUrl/?success=false");

		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));

		$request = clone $payment;

		try {
		    $payment->create($apiContext);
		} 
		catch (Exception $e) {
				cancel($e);
		}

		$resp = new stdClass;
		$resp->pp_url = $payment->getApprovalLink();

		//2015-05-14T17:04:38.712-04:00
		$hoy=date("Y-m-d\TH:i:s.000P",strtotime("today"));
		$hoyPlus3=date("Y-m-d\TH:i:s.000P",strtotime("tomorrow +3 days -1 sec"));


		$preference_data = array(
			"items" => $items_mp,
			"payer" => array(
				"email" => "ramoutdoor@gmail.com"
			),
			// "notification_url" => MP_IPN,
			// "external_reference" => "PAGO:".floatval($datos['precio']).":{$id_user}:{$id_curso}",
			"expires" => true,
			"expiration_date_from" => "{$hoy}",
			"expiration_date_to" => "{$hoyPlus3}",
			"payment_methods" => array(
				"installments" => 1,
			),
		);

		$preference = $mp->create_preference($preference_data);
		$resp->mp_url = MP_SANDBOX==false ? $preference["response"]["init_point"] : $preference["response"]["sandbox_init_point"];

		$resp->todoOk = true;
		header('Content-type:application/json');
		echo json_encode($resp);
		die();
	}
?>
