<?php 

require_once 'SessionWebSocket.php';

class SocketController extends SessionWebSocket {	
	
	function __construct ($address) {
		parent::__construct($address);
	}

	function __destruct() { //закрытие потока сокета
		parent::__destruct();
	}

	protected function onMessage($connect, $data) { //обработка события получения сообщения	
		$data = parent::onMessage($connect, $data); //вызов метода родителя

		echo "get message from $connect: "; //выводим данные в консоль
		print_r( $data );
		
		echo "\n";
		print_r( $this->sessions );
		/*
		if ( 'txtMessage' == $data->type ) {
			if ( trim( $data->text ) ) { // проверяем, если передали пустую строку
				$data->text = htmlspecialchars( $data->text ); //чистим от опасных элементов
				$data = json_encode( json_encode( $data ) ); //кодируем обратно в json
				$this->multicast($connect, $data); // пересылаем данные остальным участникам
			}
		}
		else if ( 'pngMessage' == $data->type ) {
			$data = json_encode( json_encode( $data ) ); //кодируем обратно в json
			$this->multicast($connect, $data); // пересылаем данные остальным участникам
		}
		else if ( 'sessionMessage' == $data->type ) {
			if ( 'open' == $data->action ) {
				$this->info[(int)$connect]['login'] = $data->login;
				if ($data->broad) {$this->sendInfo();}
			}
			else if ( 'create' == $data->action && $data->name && $data->password ) {
				$flag = true;
				foreach($this->sessions as $elem) {
					if ( $elem['name'] == $data->name ) {
						$flag = false;
					}
				}
				if ( $flag ){
					$this->sessions[] = array(
						'name'=>$data->name,
						'password'=>$data->password
					);
				}
				
				$this->sendInfo();
			}
			else if ( 'enter' == $data->action ){
				$message = array( 'type'=>'submit', 'allow'=>false );
				foreach($this->sessions as $key=>$elem) {
					if ( ( $elem['name'] == $data->name ) && ( $elem['password'] == $data->password ) ) {
						$this->sessions[$key][] = $this->info[(int)$connect]['login'];
						$message['allow'] = true ; 
					}
				}
				$message = json_encode( $message );
				$this->sendData($connect, $message );
			}
			else if ( 'exit' == $data->action ){
				$k = null;
				$login = $this->info[(int)$connect]['login'];
				foreach ($this->sessions as $key=>$val){
					foreach ($val as $k=>$elem) {
						if ($elem == $login) {
							unset( $this->sessions[$key][$k] );
						}
					}
				}
			}
		}
		*/
	}

}

?>