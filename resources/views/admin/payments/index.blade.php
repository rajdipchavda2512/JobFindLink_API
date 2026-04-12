@extends('admin.layouts.app')

@section('title', 'Payments Management')
@section('page_title', 'Payments')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Transaction History</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.payments.index') }}" method="GET" class="d-flex align-items-center position-relative my-1">
                <select name="status" class="form-select form-select-sm form-select-solid w-150px" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </form>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">ID</th>
                        <th class="min-w-150px">Employer</th>
                        <th class="min-w-120px">Package</th>
                        <th class="min-w-100px">Amount</th>
                        <th class="min-w-150px">Transaction Info</th>
                        <th class="min-w-100px">Date</th>
                        <th class="min-w-100px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-3">
                                    <span class="symbol-label bg-light-info text-info fw-bolder">{{ substr(optional(optional($payment->employer)->employerProfile)->company_name ?? $payment->employer->full_name ?? 'C', 0, 1) }}</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark fw-bolder fs-6">{{ optional(optional($payment->employer)->employerProfile)->company_name ?? $payment->employer->full_name }}</span>
                                    <span class="text-muted fw-bold d-block fs-7">{{ $payment->employer->mobile }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder d-block fs-6">{{ $payment->package->name }}</span>
                        </td>
                        <td>
                            <span class="text-success fw-bolder d-block fs-6">₹{{ number_format($payment->amount, 2) }}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bold d-block fs-7 text-uppercase">{{ $payment->payment_method ?? 'N/A' }}</span>
                            <span class="text-muted fw-bold d-block fs-8">{{ $payment->transaction_id ?? 'Pending' }}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder d-block fs-6">{{ $payment->created_at->format('M d, Y') }}</span>
                            <span class="text-muted fw-bold d-block fs-7">{{ $payment->created_at->format('h:i A') }}</span>
                        </td>
                        <td>
                            @if($payment->status === 'success')
                                <span class="badge badge-light-success fs-7 fw-bold">Success</span>
                            @elseif($payment->status === 'failed')
                                <span class="badge badge-light-danger fs-7 fw-bold">Failed</span>
                            @else
                                <span class="badge badge-light-warning fs-7 fw-bold">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if($payments->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted py-10">No payments found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $payments->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
