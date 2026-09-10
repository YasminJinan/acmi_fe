<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Http\Request;

class FormJoinController extends Controller
{
    public function index()
    {
        return view('form-join'); // Pastikan nama file sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:20',
            'birth_date'      => 'nullable|date',
            'gender'          => 'nullable|string|max:20',
            'domicile'        => 'nullable|string|max:255',
            'address'         => 'nullable|string',
            'shirt_size'      => 'nullable|string|max:10',
            'company'         => 'nullable|string|max:255',
            'position'        => 'nullable|string|max:255',
            'industry'        => 'nullable|string|max:255',
            'linkedin'        => 'nullable|string|max:255',
            'company_url'     => 'nullable|string|max:255',
            'company_address' => 'nullable|string',
            'business_detail' => 'nullable|string',
            'instagram'       => 'nullable|string|max:255',
            'tiktok'          => 'nullable|string|max:255',
            'facebook'        => 'nullable|string|max:255',
            'employee_size'   => 'nullable|string|max:255',
            'annual_revenue'  => 'nullable|string|max:255',
            'message'         => 'nullable|string',
            'ceo_mm_batch'    => 'nullable|string|max:255',
        ]);

        $cms = new CmsApiService();

        $result = $cms->submitInbound($request->only([
            'name', 'email', 'phone', 'birth_date', 'gender', 'domicile', 'address', 'shirt_size',
            'company', 'position', 'industry', 'annual_revenue', 'linkedin', 'company_url',
            'company_address', 'business_detail', 'instagram', 'tiktok', 'facebook',
            'employee_size', 'message', 'ceo_mm_batch'
        ]));

        if (isset($result['success']) && $result['success']) {
            return redirect()->to(url()->current() . '#form-alert')
                ->with('success', 'Pendaftaran berhasil dikirim! Tim ACMI akan meninjau dan menghubungi Anda segera.');
        }

        $errorMsg = $result['message'] ?? 'Gagal mengirim form. Silakan coba beberapa saat lagi.';
        if (!empty($result['errors'])) {
            if (is_array($result['errors'])) {
                $errorMsg .= ' (' . implode(', ', array_map(fn($e) => is_array($e) ? implode(' ', $e) : $e, $result['errors'])) . ')';
            }
        }

        return redirect()->to(url()->current() . '#form-alert')
            ->with('error', $errorMsg)
            ->withInput();
    }
}
