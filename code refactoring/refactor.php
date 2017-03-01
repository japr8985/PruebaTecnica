<?php 

	public function post_confirm(ConfirmRequest $req)
	{
		try {
			$servicio = Service::find($req->service_id);

			$response = array('error' => '');

			if ($servicio->status_id == '6'){
					$response['error'] = '2';
				}
			if($servicio->status_id == '1' ){
					
				$driver = Driver::find($req->driver_id);
				$driver->available = '0';
				$driver->save();

				$servicio->fill([
					"driver_id" => $req->driver_id,
					"status_id" => '2',
					"car_id" 	=> $driver->car_id
					]);
				$service->save();

				$push = Push::make();

				$result = $push->sendMessage($servicio);

				$response['error'] = '0';
			}
			else{
				$response['error'] = '1';
			}

			return response()->json($response);
		} catch (Exception $e) {
			abort(400);
		}
	}

/**
* 
*/
class Push 
{
	protected $push;
	public function __construct(Push $push)
    {
        $this->push = $push;
    }

	protected function msgIos(User $user, $message, array $info)
	{
		return $this->push->ios($user->uuid, $message, 1, 'honk.wav', 'Open', $info);
	}

	protected function msgAndroid(User $user, $message, array $info)
	{
		return $this->push->android2($user->uuid, $message, 1, 'default', 'Open', $info);
	}

	public function userTypeMsg(User $user, $message, array $data)
	{
		if ($user->isIos()) {
			return $this->msgIos($user,$message,$array);
		}
		else if ($user->isAndroid()) {
			return $this->msgAndroid($user,$message,$array);
		}
	}

	public function sendMessage(Service $service)
	{
		$message = 'Tu servicio ha sido confirmado';
		$info = ["serviceId" => $service->id];

		return $this->userTypeMsg($service->user,$message,$info);
	}
	
}

/**
* 
*/
class User extends Model 
{
	
	/*
	*	Omitiendo metodos anteriores
	*/
	public function isIos()
	{
		if ($this->type == '1') {
			return true;
		}else{
			return false;
		}
	}

	public function isAndroid()
	{
		if ($this->type == '2') {
			return true;
		}else{
			return false;
		}
	}
}

class ConfirmRequest extends FormRequest
{
    
    public function authorize()
    {
    	return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'services' => 'required',
            'drivers'  => 'required'	
        ];
    }
}
 ?>