<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;
use App\Models\Podcast;

class AdminPodcastController extends Controller
{
    public function index()
    {
        $existingPodcastsCount = Podcast::count();
        return view('admin.podcast.index', compact('existingPodcastsCount'));
    }

    public function preview(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
            'limit' => 'nullable|integer|min:1|max:2000',
            'duplicate_action' => 'required|in:skip,update',
        ]);

        $output = new BufferedOutput();

        $options = [
            '--dry-run' => true,
            '--duplicate-action' => $request->duplicate_action,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('temp'); // store temporarily
            $options['--file'] = storage_path('app/' . $path);
        }

        if ($request->limit) {
            $options['--limit'] = $request->limit;
        }

        try {
            Artisan::call('podcasts:import', $options, $output);
            $result = $output->fetch();

            return response()->json([
                'success' => true,
                'output' => $result,
                'options' => $options,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
            'limit' => 'nullable|integer|min:1|max:2000',
            'duplicate_action' => 'required|in:skip,update',
        ]);

        $output = new BufferedOutput();

        $options = [
            '--duplicate-action' => $request->duplicate_action,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('temp'); // store temporarily
            $options['--file'] = storage_path('app/' . $path);
        }

        if ($request->limit) {
            $options['--limit'] = $request->limit;
        }

        try {
            Artisan::call('podcasts:import', $options, $output);
            $result = $output->fetch();

            $newPagesCount = Podcast::count();

            return response()->json([
                'success' => true,
                'output' => $result,
                'options' => $options,
                'new_pages_count' => $newPagesCount,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}