<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmailTemplateController extends Controller
{
    /**
     * Display email templates management
     */
    public function index()
    {
        $templates = EmailTemplate::getAllIndexed();
        
        // Ensure all payment methods exist
        $paymentMethods = ['cash', 'bank', 'bulletin', 'crypto'];
        foreach ($paymentMethods as $method) {
            if (!isset($templates[$method])) {
                $templates[$method] = new EmailTemplate([
                    'payment_method' => $method,
                    'subject' => 'Confirmation de votre don - Civitas Suisse',
                    'html_content' => $this->getDefaultTemplate($method),
                    'pdf_attachment' => $method === 'bulletin' ? 'bulletin_versement_civitas.pdf' : null,
                ]);
            }
        }
        
        return view('admin.email-templates.index', compact('templates'));
    }

    /**
     * Update email template
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'html_content' => 'required|string',
            'pdf_attachment' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $template = EmailTemplate::findOrFail($id);
        
        $template->subject = $request->subject;
        $template->html_content = $request->html_content;
        
        // Handle PDF upload for bulletin
        if ($request->hasFile('pdf_attachment')) {
            // Delete old file
            if ($template->pdf_attachment && Storage::disk('public')->exists('pdfs/' . $template->pdf_attachment)) {
                Storage::disk('public')->delete('pdfs/' . $template->pdf_attachment);
            }
            
            $file = $request->file('pdf_attachment');
            $filename = 'bulletin_versement_' . time() . '.pdf';
            $file->storeAs('pdfs', $filename, 'public');
            $template->pdf_attachment = $filename;
        }
        
        $template->save();

        return response()->json([
            'success' => true,
            'message' => 'Email template updated successfully',
        ]);
    }

    /**
     * Create or update template
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,bank,bulletin,crypto',
            'subject' => 'required|string|max:255',
            'html_content' => 'required|string',
            'pdf_attachment' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $template = EmailTemplate::firstOrNew(['payment_method' => $request->payment_method]);
        
        $template->subject = $request->subject;
        $template->html_content = $request->html_content;
        
        // Handle PDF upload
        if ($request->hasFile('pdf_attachment')) {
            if ($template->pdf_attachment && Storage::disk('public')->exists('pdfs/' . $template->pdf_attachment)) {
                Storage::disk('public')->delete('pdfs/' . $template->pdf_attachment);
            }
            
            $file = $request->file('pdf_attachment');
            $filename = $request->payment_method . '_' . time() . '.pdf';
            $file->storeAs('pdfs', $filename, 'public');
            $template->pdf_attachment = $filename;
        }
        
        $template->save();

        return response()->json([
            'success' => true,
            'message' => 'Email template saved successfully',
        ]);
    }

    /**
     * Get default template HTML
     */
    private function getDefaultTemplate($method)
    {
        $templates = [
            'cash' => 'emails.versement_liquide',
            'bank' => 'emails.virement_bancaire',
            'bulletin' => 'emails.dons_sans_frais',
            'crypto' => 'emails.dons_en_cryptomonnaie',
        ];
        
        $viewPath = $templates[$method] ?? 'emails.versement_liquide';
        
        if (view()->exists($viewPath)) {
            return view($viewPath, ['donation' => (object)[
                'civility' => '{{ $donation->civility }}',
                'firstname' => '{{ $donation->firstname }}',
                'lastname' => '{{ $donation->lastname }}',
                'amount' => '{{ $donation->amount }}',
            ]])->render();
        }
        
        return '<p>Template par défaut</p>';
    }
}
