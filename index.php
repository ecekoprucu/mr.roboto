<?php
	//Robot R1,L22... gibi inputlarla çalışacak.
	
	/* 
		Verilen komuttan yönü almak için stringin ilk harfi çekilecek.
	*/


	class Roboto {
		public $Yon = "East";
		public $Koordinat = "0,0";
		public $Mesafe;

		public function Yurutec ($YvM){
			// Yön ve mesafeyi string olarak alacak.
			// Yön ve mesafe arraye döndürülüyor.
			$YvMarray = explode(',', $YvM);
			$this->Mesafe=0;
			//Her komut bir yön olarak alınıyor 
			 for ($i=0; $i<count($YvMarray); $i++){
			//Dönülen yön alınıyor
			 	$YonDon = $YvMarray[$i][0];
			 	 switch ($YonDon){
			 	 	case "R":
			 	 	//Sağa döndür
			 	 	$this->DondurSag($this->Yon);
					break;

			 	 	case "L":
			 	 	//Sola döndür
			 	 	$this->DondurSol($this->Yon);
					break;

			 	 }
			 
				//Gidilen mesafe alınıyor
				$this->Mesafe = intval(substr($YvMarray[$i],1,strlen($YvMarray[$i])-1)); 
				$this->Mars($this->Yon);
			 //Koordinat ve bulunduğu bölge
			 }

			echo "Yönümüz ". $this->Yon . " ve ". "koordinatlarımız (x,y) " . $this->Koordinat . "\n";;
			// 
							
		}
			//Sağa döndürme fonksiyonu
			function DondurSag($Yon){
						if($Yon==="East"){
							$this->Yon="South";
						}

						elseif($Yon==="South"){
							$this->Yon="West";
						} 

						elseif($Yon==="West"){
							$this->Yon="North";
						}
						elseif($Yon==="North"){
							$this->Yon="East";
						}
					}
			//Sola döndürme fonksiyonu
			function DondurSol($Yon){
						if($Yon==="East"){
							$this->Yon="North";
						}

						elseif($Yon==="South"){
							$this->Yon="East";
						} 

						elseif($Yon==="West"){
							$this->Yon="South";
						}
						elseif($Yon==="North"){
							$this->Yon="West";
						}

					}
			//Konumdan ileri gitme fonksiyonu
			function Mars($Konum='0,0'){
				$NewCoord = explode(',', $this->Koordinat);
				$Coordx= intval($NewCoord[0]);
				$Coordy= intval($NewCoord[1]);
				
				switch($this->Yon){
					case "East":
					$Coordx+=$this->Mesafe;
					$this->Koordinat= strval($Coordx) . "," . strval($Coordy);
					
					break;

					case "North":
					$Coordy+=$this->Mesafe;
					$this->Koordinat= strval($Coordx) . "," . strval($Coordy);
					break;

					case "West":
					$Coordx-=$this->Mesafe;
					$this->Koordinat= strval($Coordx) . "," . strval($Coordy);
					break;

					case "South":
					$Coordy-=$this->Mesafe;
					$this->Koordinat= strval($Coordx) . "," . strval($Coordy);
					break;


				}
				
			}
	}
	$Robot = New Roboto();
	$Robot->Yurutec('L2,R3,R2,R3');
?>
