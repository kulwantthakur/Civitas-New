@component('mail::message')
# Donation Confirmation

Dear {{ $donation->firstname ?? 'Donor' }},

Thank you for your generous donation!

**Details of your donation:**

- Amount Type: {{ $donation->amount_type }}
- Amount: ${{ number_format($donation->amount, 2) }}
- Payment Method: {{ ucfirst($donation->payment_method) }}
- Notes: {{ $donation->notes ?? 'None' }}

If you have any questions, feel free to contact us.

Thanks again,<br>
{{ config('app.name') }}
@endcomponent
