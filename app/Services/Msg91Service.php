<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Msg91Service
{
    protected string $authKey;
    protected string $senderId;
    protected string $templateId;
    protected string $baseUrl = 'https://control.msg91.com/api/v5';

    public function __construct()
    {
        $this->authKey = config('services.msg91.auth_key');
        $this->senderId = config('services.msg91.sender_id');
        $this->templateId = config('services.msg91.otp_template_id');
    }

    /**
     * Send OTP via MSG91 API
     *
     * @param string $mobile Mobile number with country code (e.g., 919876543210)
     * @param string $otp The OTP code to send
     * @return array ['success' => bool, 'message' => string, 'response' => mixed]
     */
    public function sendOtp(string $mobile, string $otp): array
    {
        // Strip any spaces, dashes, or + prefix for MSG91 format
        $mobile = preg_replace('/[^0-9]/', '', $mobile);

        // Ensure mobile has country code (default India +91)
        if (strlen($mobile) === 10) {
            $mobile = '91' . $mobile;
        }

        try {
            $response = Http::withHeaders([
                'authkey' => $this->authKey,
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/flow/", [
                'template_id' => $this->templateId,
                'short_url' => '0',
                'recipients' => [
                    [
                        'mobiles' => $mobile,
                        'otp' => $otp,
                    ],
                ],
            ]);

            $body = $response->json();

            if ($response->successful() && isset($body['type']) && $body['type'] === 'success') {
                Log::info('MSG91 OTP sent successfully', [
                    'mobile' => $mobile,
                    'request_id' => $body['request_id'] ?? null,
                ]);

                return [
                    'success' => true,
                    'message' => 'OTP sent successfully via SMS.',
                    'response' => $body,
                ];
            }

            Log::warning('MSG91 OTP send failed', [
                'mobile' => $mobile,
                'response' => $body,
                'status' => $response->status(),
            ]);

            return [
                'success' => false,
                'message' => $body['message'] ?? 'Failed to send OTP.',
                'response' => $body,
            ];
        } catch (\Exception $e) {
            Log::error('MSG91 OTP exception', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'SMS service temporarily unavailable.',
                'response' => null,
            ];
        }
    }

    /**
     * Verify OTP via MSG91 API (optional - we verify in DB, but MSG91 also supports this)
     *
     * @param string $mobile
     * @param string $otp
     * @return array
     */
    public function verifyOtp(string $mobile, string $otp): array
    {
        $mobile = preg_replace('/[^0-9]/', '', $mobile);
        if (strlen($mobile) === 10) {
            $mobile = '91' . $mobile;
        }

        try {
            $response = Http::withHeaders([
                'authkey' => $this->authKey,
            ])->get("{$this->baseUrl}/otp/verify", [
                'otp' => $otp,
                'mobile' => $mobile,
            ]);

            $body = $response->json();

            return [
                'success' => $response->successful() && ($body['type'] ?? '') === 'success',
                'message' => $body['message'] ?? 'Verification check complete.',
                'response' => $body,
            ];
        } catch (\Exception $e) {
            Log::error('MSG91 verify OTP exception', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'Verification service unavailable.',
                'response' => null,
            ];
        }
    }

    /**
     * Resend OTP via MSG91 API
     *
     * @param string $mobile
     * @param string $retryType voice|text
     * @return array
     */
    public function resendOtp(string $mobile, string $retryType = 'text'): array
    {
        $mobile = preg_replace('/[^0-9]/', '', $mobile);
        if (strlen($mobile) === 10) {
            $mobile = '91' . $mobile;
        }

        try {
            $response = Http::withHeaders([
                'authkey' => $this->authKey,
            ])->get("{$this->baseUrl}/otp/retry", [
                'mobile' => $mobile,
                'retrytype' => $retryType,
            ]);

            $body = $response->json();

            return [
                'success' => $response->successful() && ($body['type'] ?? '') === 'success',
                'message' => $body['message'] ?? 'Resend request processed.',
                'response' => $body,
            ];
        } catch (\Exception $e) {
            Log::error('MSG91 resend OTP exception', [
                'mobile' => $mobile,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'SMS service temporarily unavailable.',
                'response' => null,
            ];
        }
    }

    /**
     * Check if the MSG91 service is properly configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->authKey) && !empty($this->templateId);
    }
}
