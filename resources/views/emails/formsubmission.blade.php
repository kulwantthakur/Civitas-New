@component('mail::message')
# New Form Submission

**Source Page:** {{ $submission->source_page ?? 'N/A' }}  
**User:** {{ $submission->firstname ?? $submission->user_id ?? 'Guest' }} {{ $submission->lastname ?? '' }}  
**Email:** {{ $submission->email ?? 'N/A' }}

@if($submission->address)
**Address:** {{ $submission->address }}
@endif

@if($submission->comment)
**Comment:** {{ $submission->comment }}
@endif

{{-- Add any other fields that may be relevant, check for null to avoid blanks --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
