<?php

namespace App\Services;

use Twilio\Rest\Client;
use Twilio\Http\CurlClient;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    protected ?string $sid;
    protected ?string $token;
    protected ?string $from;
    protected ?string $messagingServiceSid;
    protected ?Client $client = null;

    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->from = config('services.twilio.from');
        $this->messagingServiceSid = config('services.twilio.messaging_service_sid');

        if ($this->isConfigured()) {
            $curlClient = new CurlClient([
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_TIMEOUT => 15, // Reduce timeout so it doesn't hang for 60s
            ]);
            $this->client = new Client($this->sid, $this->token, null, null, $curlClient);
        }
    }

    /**
     * Send OTP via Twilio API
     *
     * @param string $mobile Mobile number with country code (e.g., +919876543210)
     * @param string $otp The OTP code to send
     * @return array ['success' => bool, 'message' => string, 'response' => mixed]
     */
    public function sendOtp(string $mobile, string $otp): array
    {
        // Strip non-numeric characters first
        $cleanMobile = preg_replace('/[^0-9]/', '', $mobile);

        // Auto-prepend India country code if exactly 10 digits
        if (strlen($cleanMobile) === 10) {
            $cleanMobile = '91' . $cleanMobile;
        }

        // Add the + required by Twilio E.164
        $mobile = '+' . $cleanMobile;

        try {
            $messageParams = [
                'body' => "Your JobFindLink verification code is: $otp. It is valid for 5 minutes.",
            ];

            if (!empty($this->messagingServiceSid)) {
                $messageParams['messagingServiceSid'] = $this->messagingServiceSid;
            } else {
                $messageParams['from'] = $this->from;
            }

            $message = $this->client->messages->create(
                $mobile,
                $messageParams
            );

            Log::info('Twilio OTP sent successfully', [
                'mobile' => $mobile,
                'message_sid' => $message->sid,
            ]);

            return [
                'success' => true,
                'message' => 'OTP sent successfully via SMS.',
                'response' => $message->toArray(),
            ];

        } catch (\Exception $e) {
            Log::error('Twilio OTP exception', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'SMS service temporarily unavailable. ' . $e->getMessage(),
                'response' => null,
            ];
        }
    }

    /**
     * Check if the Twilio service is properly configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->sid) && !empty($this->token);
    }
}
