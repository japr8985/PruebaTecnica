<?php 

	public function post_confirm(Request $req){
		$servicio = Service::find($req->service_id);

		$response = array('error' => '');

		if (!is_null($servicio)) {
			if ($servicio->status_id == '6') {
				$response['error'] = '2';
			}
			if (is_null($servicio->driver_id) && $servicio->status_id == '1' ) {
				
				$servicio->driver_id = $req->driver_id;
				$servicio->status_id = '2';

				
				$driver = Driver::find($req->driver_id);
				$driver->available = '0';
				$driver->save();

				$service->car_id = $driver->car_id;
				$service->save();

				$pushMessage = "Tu servicio ha sido confirmado";

				$push = Push::make();

				if ($servicio->user->uuid == '')
					$response['error'] = '0';
				if ($servicio->user->type == '1')
					$result = $push->ios($servicio->user->uuid,$pushMessage,1,'honk.wav','Open',array('serviceId' => $servicio->id));
				else
					$result = $push->android2($servicio->user->uuid,$pushMessage,1,'default','Open',array('serviceId' => $servicio->id));

				$response['error'] = '0';
			}
			else
				$response['error'] = '1';
		}
		else
			$response['error'] = '3';

		return Response::json($response);
	}

	
 ?>