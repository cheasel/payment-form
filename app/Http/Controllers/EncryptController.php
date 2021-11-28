<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\MessageEncrypt;
use Illuminate\Support\Facades\Http;

class EncryptController extends Controller
{

    public function __construct(){

    }

    public function sent_message(){

        $data = [];
        $data["oaepHashAlgo"] = 'SHA1';
        $data["e2eeSid"] = '0001g7GFT9OnYLdfXAmOCkCKXFd-LnYTTPWHN1CmO28nmtNYebP2JCWy7BC3sJYxaSZwmJagW1_yUJlkusyqi7wGC3I';
        $data["pubKey"] = 'CEDD4075868213910E3B1E50C2DEC64EF552B699E8D012C8DF68BD7473B847F13CF9A58EE6F58D7AE8222DC345C4112B9EEA78F938F1124E1B825F0A10C6F48BB12672C638601D150A36CEEFC2EC6898A45B25D4FE9AFDA08C268B550FC043F5F527EF5FAA092AF0912EF6C46DDD7D9B03F1CE222B98C73B8EB3659723215A41';
        $data["pubKey1"] = '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000096A3';
        $data["serverRandom"] = '2B56C4B69C56757E43501465070A3448';
        $data["pseudoOaepHashAlgo"] = 'SHA256';
        $data["pseudoPubKey"] = '9B2AE7E2C7C2A8E05D258F81E147EE1746CD839CCFEE661DDD703580A7858F88B93F89565BD3407EEA70B57388DE272018D20BA1EDEBAA3ECA782D0A24F19B5647A4D2096AF76A44ED6F384BF26899E267A6584C2EFCF15DED55114B9C9F56B5D7FAA6DDF2EA7D48A4BAD18041F92A9779A752BDA5FB9ED5905A1058EF81233F32197107F24A757F4C9D1F1272C5DB90435C7570A25023E4FBCBE5DA2CAE81F30CFC6C980FE6BAD91735EDB7AE1601D2D0536D43EFE352B29312D1465C1ABEFDE87D1BEECBD0F06FE058A14F128E9D95FB67D48D8B7FF8E6649D2C9F6A987752385FB158C760928A7C451082D9788F4AB65BBEA7DBA1444627923B222BAD79E3';
        $data["pseudoPubKey1"] = '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000010001';
        $data["pseudoRandom"] = '51AB2F733FE856192AE82409C16CFA04';
        $data["pseudoSid"] = '0001sx9HiTFd4T5fCDTVrm-cQiPeB0n4wreloCxFCzx8qF5CXOar-VZJ4K7DpLrKlM_3-A6ojZ7H4Oj4Z66I7qwVPQf3Csg';
        $data["pin"] = '192534';
        $data["lmdId"] = 'MovingPseudo';
        event(new MessageEncrypt($data));

        return response()->json(['code' => 1, 'msg' => 'data has sent']);

    }

    public function receive_encrypt(Request $request){

        $encryptPin = $request->input('encryptPin');
        $pseudoPin = $request->input('pseudoPin');

    }


    // NETBANK API SEQUENCE ######################################################################################################################

    public function concept_netbank(){

        // CONCEPT ONLY

        // $pin = '';
        // $otp = '';

        // $api_auth = $this->get_api_auth("8412300000018", "P1", "1991-09-19");
        // if($api_auth != null){

        //     $this->verify_api_auth($api_auth);
        //     $tokenUUID = $this->get_tokenUUID($api_auth);

        //     if($tokenUUID != null){

        //         $this->allowadddevice($otp, $tokenUUID, $api_auth);
        //         $encryptData = $this->preAuth($api_auth, $pin);

        //         // push to Puhser use "event(new MessageEncrypt($encryptData));"
                
        //         // $deviceId, $e2eeSid, $encryptPin, $pseudoPin, $pseudoSid => is recive from our app
        //         $api_refresh = $this->Login($api_auth, $deviceId, $e2eeSid, $encryptPin, $pseudoPin, $pseudoSid);
        //         $devices = $this->Devices($api_auth);

        //     }

        // }

    }

    private function get_api_auth($cardId, $cardType, $dateOfBirth){

        // Request
        // POST https://example.com/
        // Accept-Language: th
        // scb-channel: APP
        // user-agent: Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid: 0bf614ea-0ab8-4be2-811c-b8d41f94fd60
        // th.co.scb-easy-rquid: 2ddeb577-a3a3-4606-a71f-e0dcac214fe9
        // Content-Type: application/json; charset=UTF-8
        // Content-Length: 69
        // Host: fasteasy.scbeasy.com:8443
        // Connection: Keep-Alive
        // Accept-Encoding: gzip
        // {
        //     "cardId": "8412300000018",
        //     "cardType": "P1",
        //     "dateOfBirth": "1991-09-19"
        // }

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->post('https://example.com/', [
            'cardId' => $cardId,
            'cardType' => $cardType,
            'dateOfBirth' => $dateOfBirth,
        ]);

        return $response->successful() ? $response->header('Api-Auth') : null;

    }

    private function verify_api_auth($api_auth){

        // POST https://example2.com/
        // Accept-Language:th
        // scb-channel:APP
        // Api-Auth:2e3e8198-9f8d-4700-9474-7a9baf74cc9c
        // user-agent:Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid:f200ee9b-e15c-43ee-a848-c9bb273377d7
        // th.co.scb-easy-rquid:3fefc0b2-6e9c-4a3e-866b-9227d4a64b16
        // Content-Type:application/json; charset=UTF-8
        // Content-Length:28
        // Host:fasteasy.scbeasy.com:8443
        // Connection:Keep-Alive
        // Accept-Encoding:gzip
        // {
        //     "flag": "all",
        //     "mobileNo": ""
        // }

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->post('https://example2.com/', [
            'flag' => 'all',
            'mobileNo' => ''
        ]);

        return $response->successful();

    }

    private function get_tokenUUID($api_auth){

        // POST https://example3.com/
        // Accept-Language:th
        // scb-channel:APP
        // Api-Auth:2e3e8198-9f8d-4700-9474-7a9baf74cc9c
        // user-agent:Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid:f200ee9b-e15c-43ee-a848-c9bb273377d7
        // th.co.scb-easy-rquid:a45749b6-f4a4-4445-809c-e909984655ed
        // Content-Type:application/json; charset=UTF-8
        // Content-Length:247
        // Host:fasteasy.scbeasy.com:8443
        // Connection:Keep-Alive
        // Accept-Encoding:gzip
        // {
        //     "AccountName": "",
        //     "AccountNumber": "",
        //     "Amount": "",
        //     "DestinationBank": "",
        //     "MobilePhoneNo": "0809586945",
        //     "eventNotificationPolicyId": "FastEasyRegisteration_TH",
        //     "policyId": "SCB_FastEasy_OTPPolicy",
        //     "realActorId": "FastEasyApp",
        //     "storeId": "SystemTokenStore"
        // }

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->post('https://example3.com/', [
            'AccountName' => "",
            'AccountNumber' => "",
            'Amount' => "",
            'DestinationBank' => "",
            'MobilePhoneNo' => "0809586945",
            "eventNotificationPolicyId" => "FastEasyRegisteration_TH",
            "policyId" => "SCB_FastEasy_OTPPolicy",
            "realActorId" => "FastEasyApp",
            "storeId" => "SystemTokenStore"
        ]);

        $json = $response->json();

        return isset($json['tokenUUID']) ? $json['tokenUUID'] : null;

    }

    private function allowadddevice($otp, $tokenUUID, $api_auth){

        // GET https://fasteasy.scbeasy.com:8443/v2/profiles/allowadddevice HTTP/1.1
        // otp: 486462
        // tokenUUID: IsCtRp-7rv
        // Content-Type: application/json
        // Accept-Language: th
        // scb-channel: APP
        // Api-Auth: bfb00249-d76f-4aee-9532-1ed1971a9a8d
        // user-agent: Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid: 0bf614ea-0ab8-4be2-811c-b8d41f94fd60
        // th.co.scb-easy-rquid: ace7ea53-b3d4-4b5e-bdce-141fb082ccfa
        // Host: fasteasy.scbeasy.com:8443
        // Connection: Keep-Alive
        // Accept-Encoding: gzip

        $response = Http::withHeaders([
            'otp' => $otp,
            'tokenUUID' => $tokenUUID,
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->get('https://fasteasy.scbeasy.com:8443/v2/profiles/allowadddevice');

        return $response->successful();

    }

    private function preAuth($api_auth, $pin){

        // POST https://fasteasy.scbeasy.com:8443/isprint/soap/preAuth HTTP/1.1
        // Accept-Language: th
        // scb-channel: APP
        // Api-Auth: e71b8954-7f4b-4f18-aa46-df065c87889f
        // user-agent: Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid: 0bf614ea-0ab8-4be2-811c-b8d41f94fd60
        // th.co.scb-easy-rquid: b820bd8e-5014-4572-9d36-0c2b20878826
        // Content-Type: application/json; charset=UTF-8
        // Content-Length: 32
        // Host: fasteasy.scbeasy.com:8443
        // Connection: Keep-Alive
        // Accept-Encoding: gzip
        // {
        //     "loginModuleId": "MovingPseudo"
        // }

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->post('https://fasteasy.scbeasy.com:8443/isprint/soap/preAuth', [
            'loginModuleId' => "MovingPseudo"
        ]);

        $json = $response->json();

        $pubKey = explode(",", $json['e2ee']['pubKey']);
        $pseudoPubKey = explode(",", $json['e2ee']['pseudoPubKey']);

        $return = [];
        $return["oaepHashAlgo"] = $json['e2ee']['oaepHashAlgo'];
        $return["e2eeSid"] = $json['e2ee']['e2eeSid'];
        $return["pubKey"] = $pubKey[0];
        $return["pubKey1"] = $pubKey[1];
        $return["serverRandom"] = $json['e2ee']['serverRandom'];
        $return["pseudoOaepHashAlgo"] = $json['e2ee']['pseudoOaepHashAlgo'];
        $return["pseudoPubKey"] = $pseudoPubKey[0];
        $return["pseudoPubKey1"] = $pseudoPubKey[1];
        $return["pseudoRandom"] = $json['e2ee']['pseudoRandom'];
        $return["pseudoSid"] = $json['e2ee']['pseudoSid'];
        $return["pin"] = $pin;
        $return["lmdId"] = 'MovingPseudo';

        return $return;

    }

    private function Login($api_auth, $deviceId, $e2eeSid, $encryptPin, $pseudoPin, $pseudoSid){

        // POST https://fasteasy.scbeasy.com:8443/v3/login HTTP/1.1
        // Accept-Language: th
        // scb-channel: APP
        // Api-Auth: e71b8954-7f4b-4f18-aa46-df065c87889f
        // user-agent: Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid: 0bf614ea-0ab8-4be2-811c-b8d41f94fd60
        // th.co.scb-easy-rquid: b2c23864-29ff-4f59-99a7-11848b1fa071
        // Content-Type: application/json; charset=UTF-8
        // Content-Length: 1318
        // Host: fasteasy.scbeasy.com:8443
        // Connection: Keep-Alive
        // Accept-Encoding: gzip
        // {
        //     "deviceId": "a88abe99-ae18-4cae-b5ec-ed204b1e249a",
        //     "e2eeSid": "0001g7GFT9OnYLdfXAmOCkCKXFd-LnYTTPWHN1CmO28nmtNYebP2JCWy7BC3sJYxaSZwmJagW1_yUJlkusyqi7wGC3I",
        //     "encryptPin": "0001g7GFT9OnYLdfXAmOCkCKXFd-LnYTTPWHN1CmO28nmtNYebP2JCWy7BC3sJYxaSZwmJagW1_yUJlkusyqi7wGC3I,92E00A2EB1096BD56A0E97551222F01E:AB80B69CCFD105E5FF2B2A90E89D206933694A0275BCC11DBB05AFE5F2EFC8FE08B3EC0D8C0774265460D1BB8168E4D6966803A7C6919F89497DEFF74A2D0AC2937F3E776D39F9BB013D94CC38ACBA80F9E2A0B5242D686BAC2A13D591D9E6D53690652444D9B5900B27785D82FF22A9E9F481164AB3613849F481E921E8EC75",
        //     "pseudoPin": "0001NqHS2886qVINcyxUVFzaBqcdW__dWPhC6yE5FP1sm5rU3l0XUGiNY73Jt8ZfONeEpeHd6RrJVg9jm_MXPVfqVW-aGCw,8DCE011B040F017E645B391D85989C04:63F168CD2857AEDF99E1ED8DDFFFF850E71FBD38D49D582F12E0D52785479A0FAA4B55F2602139A27E0C0ADB267BAC6634C5D20FD9AEC38F3F9B62B9EECAE4A2EBDBE92A88C424BE9384D86EB551590B4E846AE5E4B4B4692899D819037C2128220D061E79B9E8261D7DE94DDF4833EB3D151AA5B88A0A4CA6FA6516676AB0628BF2ED041048ABFD0A031DDF062351890B33E7426379545CD8B091E0EF7507B1D5BABE972F6FFFA7D3B419A297FC46C2886906A7394CE359C5D9114113D812A3F92201D05A8C57A0A521E9D3B1BD5F77B8A4E752F3C1256A9AADC7C618B5CEB5E5D46619850B25CEBF162042412D82792844C0B109B0132036BD97C659F8904C",
        //     "pseudoSid": "0001NqHS2886qVINcyxUVFzaBqcdW__dWPhC6yE5FP1sm5rU3l0XUGiNY73Jt8ZfONeEpeHd6RrJVg9jm_MXPVfqVW-aGCw"
        // }

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->post('https://fasteasy.scbeasy.com:8443/v3/login', [
            'deviceId' => $deviceId,
            'e2eeSid' => $e2eeSid,
            'encryptPin' => $encryptPin,
            'pseudoPin' => $pseudoPin,
            'pseudoSid' => $pseudoSid,
        ]);

        $api_refresh = $response->header('Api-Refresh');
        return $api_refresh;

    }

    private function Devices($api_auth){

        // GET https://fasteasy.scbeasy.com:8443/v2/profiles/devices HTTP/1.1
        // Content-Type:application/json
        // Accept-Language:th
        // scb-channel:APP
        // Api-Auth:ecf1f75c-aad0-4029-a0d4-f6b1b2bb7851
        // user-agent:Android/11;FastEasy/3.48.0/5125
        // th.co.scb-easy-sessionid:b1de656b-2967-4239-ac98-3064990f6b40
        // th.co.scb-easy-rquid:15ba89d2-e4a2-4558-9556-03ff32c2133e
        // Host:fasteasy.scbeasy.com:8443
        // Connection:Keep-Alive
        // Accept-Encoding:gzip

        $response = Http::withHeaders([
            'scb-channel' => 'APP',
            'Api-Auth' => $api_auth,
            'Accept-Language' => 'th',
            'user-agent' => 'Android/11;FastEasy/3.48.0/5125',
            'th.co.scb-easy-sessionid' => '0bf614ea-0ab8-4be2-811c-b8d41f94fd60',
            'th.co.scb-easy-rquid' => '2ddeb577-a3a3-4606-a71f-e0dcac214fe9',
            'Content-Type' => 'application/json; charset=UTF-8',
            'Host' => 'fasteasy.scbeasy.com:8443',
            'Accept-Encoding' => 'gzip',
        ])->get('https://fasteasy.scbeasy.com:8443/v2/profiles/devices');
        
        $json = $response->json();
        $devices = [];
        foreach($json['data'] as $device){
            array_push($devices, $device['deviceId']);
        }

        return $devices;

    }

}
