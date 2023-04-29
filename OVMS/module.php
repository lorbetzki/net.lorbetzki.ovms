<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/VariableProfileHelper.php';

	class OVMS extends IPSModule
	{
		use VariableProfileHelper;
		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}'); //MQTT Server

			$this->RegisterPropertyString('VehicleID', '');
			$this->RegisterPropertyString('UserName', '');

			$this->RegisterPropertyString('TopicPrefix', '');
			$this->RegisterAttributeString("MQTTTopic", "");

			$this->RegisterPropertyBoolean('WriteNotinDB', 'false');

			$this->RegisterProfileBooleanEx('OVMS_yesno', '', '', '', [
				[false, $this->Translate('no'),  '', 0xFF0000],
				[true, $this->Translate('yes'),  '', 0x00FF00]
			]);
			
			$this->RegisterProfileInteger('OVMS_dBm', '', '', ' dBm', 0, 0, 0);
			$this->RegisterProfileInteger('OVMS_byte', '', '', ' byte', 0, 0, 0);

			$this->RegisterProfileFloat("OVMS_AH", "", "", " Ah", 0, 0, 0, 0);
			$this->RegisterProfileFloat('OVMS_KM', '', '', ' km', 0, 0, 0, 0);
			$this->RegisterProfileFloat('OVMS_LEVEL', '', '', ' %', 0, 0, 0, 0);

			$this->RegisterProfileIntegerEx("OVMS_Alarm", "", "", "", [
				['0', $this->Translate('normal'),  '', 0xFFFF00],
				['1', $this->Translate('warning'),  '', 0x00FF00],
				['2', $this->Translate('alarm'),  '', 0x00FF00]
			], 0, 0);

			$this->RegisterProfileIntegerEx("OVMS_LoadState", "", "", "", [
				['0', $this->Translate('charging'),  '', 0xFFFF00],
				['1', $this->Translate('topoff'),  '', 0x00FF00],
				['2', $this->Translate('done'),  '', 0x00FF00],
				['3', $this->Translate('prepare'),  '', 0x00FF00],
				['4', $this->Translate('timerwait'),  '', 0x00FF00],
				['5', $this->Translate('heating'),  '', 0x00FF00],
				['6', $this->Translate('stopped'),  '', 0x00FF00]
			], 0, 0);

			$this->RegisterProfileIntegerEx("OVMS_LoadSubState", "", "", "", [
				['0', $this->Translate('scheduledstop'),  '', 0xFFFF00],
				['1', $this->Translate('scheduledstart'),  '', 0x00FF00],
				['2', $this->Translate('onrequest'),  '', 0x00FF00],
				['3', $this->Translate('timerwait'),  '', 0x00FF00],
				['4', $this->Translate('powerwait'),  '', 0x00FF00],
				['5', $this->Translate('stopped'),  '', 0x00FF00],
				['6', $this->Translate('interrupted'),  '', 0x00FF00]
			], 0, 0);

			$this->RegisterProfileIntegerEx("OVMS_CableType", "", "", "", [
				['0', $this->Translate('undefined'),  '', 0xFFFF00],
				['1', $this->Translate('type1'),  '', 0x00FF00],
				['2', $this->Translate('type2'),  '', 0x00FF00],
				['3', $this->Translate('chademo'),  '', 0x00FF00],
				['4', $this->Translate('roadster'),  '', 0x00FF00],
				['5', $this->Translate('teslaus'),  '', 0x00FF00],
				['6', $this->Translate('supercharger'),  '', 0x00FF00],
				['7', $this->Translate('ccs'),  '', 0x00FF00]
			], 0, 0);
	}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();

			
			$ManualTopic = $this->ReadPropertyString('TopicPrefix');
			$VehicleID = $this->ReadPropertyString('VehicleID');
			$UserName = $this->ReadPropertyString('UserName');
		
			if (!empty($ManualTopic))
			{ 
				$this->WriteAttributeString("MQTTTopic", "$ManualTopic");
				$MQTTTopic = $ManualTopic;
			}
			else
			{
				$DefaultTopic = 'ovms/'.$UserName.'/'.$VehicleID.'/';
				$this->WriteAttributeString("MQTTTopic", "$DefaultTopic");
				$MQTTTopic = $DefaultTopic;
			} 
	
			//Setze Filter für ReceiveData
			$this->SetReceiveDataFilter('.*' . $MQTTTopic . '.*');
		}

		public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString,true);
			if($data['DataID'] == '{7F7632D9-FA40-4F38-8DEA-C83CD4325A32}')
			{
				// include Datapoints to match and create only variables we received from the car
				$this->CheckDB($data);
			}							
			
		}

		private function CheckDB($data)
		{
			require_once __DIR__ . '/../libs/datapoints.php';
			
			$deviceTopic = $this->ReadAttributeString("MQTTTopic");
			$topicMetric = str_replace($deviceTopic, "", $data['Topic']);
			
			$this->SendDebug("received Data",$data['Topic'], 0);

			$IdentName = str_replace(array("/",".","-",","),"_",$topicMetric);				
			$DBFound = "no";
						
			// check if the Topic is in our Database, in this case we have all information we need.
			foreach ($DP as $DataPoint){
				if (in_array($topicMetric, $DataPoint)) {

					$DPDescription = $DataPoint['1'];
					$DPProfile = $DataPoint['3'];
					$DPType = $DataPoint['2'];
					switch ($DPType)
					{
						case "BOOL":
							$DPDataType = 0;
						break;
						case "INT":
							$DPDataType = 1;
						break;
						case "FLOAT":
							$DPDataType = 2;
						break;
						case "STRING":
							$DPDataType = 3;
						break;
					}
					$DBFound = "yes";
					$this->SendDebug("Datapoint found in Database","DP".$deviceTopic." - ".$topicMetric, 0);
				}
			}

				if ($DBFound === "no")
				{
					$this->SendDebug("Datapoint not found in Database","DP".$deviceTopic." - ".$topicMetric, 0);
					$DPDescription = $topicMetric;
					$DPProfile = "";
					$DPDataType = 3;
				}

				if (!@$this->GetIDForIdent(''.$IdentName.''))
				{
					$this->MaintainVariable($IdentName, $this->Translate("$DPDescription"), $DPDataType, "$DPProfile", 0, true);
				}
				
				$val = $this->CheckPayloadDataType($data['Payload']);

				// Convert String to integer for profile
				if ($IdentName == "metric_v_c_state"){ 
					switch ($val)
					{
						case "charging":
							$val = 0;
						break;
						case "topoff":
							$val = 1;
						break;
						case "done":
							$val = 2;
						break;
						case "prepare":
							$val = 3;
						break;
						case "timerwait":
							$val = 4;
						break;
						case "heating":
							$val = 5;
						break;
						case "stopped":
							$val = 6;
						break;
					}				
				}	
				if ($IdentName == "metric_v_c_substate"){ 
					switch ($val)
					{
						case "scheduledstop":
							$val = 0;
						break;
						case "scheduledstart":
							$val = 1;
						break;
						case "onrequest":
							$val = 2;
						break;
						case "timerwait":
							$val = 3;
						break;
						case "powerwait":
							$val = 4;
						break;
						case "stopped":
							$val = 5;
						break;
						case "interrupted":
							$val = 6;
						break;
					}				
				}
				if ($IdentName == "metric_v_c_type"){ 
					switch ($val)
					{
						case "undefined":
							$val = 0;
						break;
						case "type1":
							$val = 1;
						break;
						case "type2":
							$val = 2;
						break;
						case "chademo":
							$val = 3;
						break;
						case "roadster":
							$val = 4;
						break;
						case "teslaus":
							$val = 5;
						break;
						case "supercharger":
							$val = 6;
						break;
						case "ccs":
							$val = 7;
						break;
					}				
				}

				//write data if values are in DB or user want to write all data
				if (($this->ReadPropertyBoolean('WriteNotinDB')) OR ($DBFound === "yes"))
				{
					$this->SetValue($IdentName, $val);
				}
				unset($DataPoint);
		}		

		private function CheckPayloadDataType($Payload)
		{
			switch 	($Payload)
			{
				case 'yes':
					$NewPayload = true;
				break;
				case 'no':
					$NewPayload = false;
				break;
				default: 
					$NewPayload = $Payload;			
			}
			return $NewPayload;
		}
        
}