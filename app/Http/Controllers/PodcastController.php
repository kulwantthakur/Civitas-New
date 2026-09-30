<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\AudioFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodcastController extends Controller
{
    /** @var Podcast */
    protected $modelPodcast;
    /** @var PodcastCategory */
    protected $modelPodcastCategory;
    /** @var AudioFile */
    protected $modelAudioFile;

    public function __construct(Podcast $podcastM, PodcastCategory $podcastcatM, AudioFile $audioM)
    {
        $this->modelPodcast = $podcastM;
        $this->modelPodcastCategory = $podcastcatM;
        $this->modelAudioFile = $audioM;
    }

    /**
     * Store a new podcast.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->modelPodcast->isPodcastValid($request->all())) {
            $newpodcast = new Podcast();
            $newpodcast->category_id = $request->category_id;
            $newpodcast->podcast_identifier = 'PO-' . uniqid('', true);
            $newpodcast->url = $request->url;
            $newpodcast->title = $request->title;
            $newpodcast->author = $request->author;
            $newpodcast->location = $request->location;
            $newpodcast->date = $request->date;
            $newpodcast->description = $request->description;

            $newpodcast->save();

            $folderName = $newpodcast->podcast_identifier;
            $categoryFolderName = $newpodcast->category->podcast_category_identifier;

            $baseFolderPath = public_path('site/podcast/');
            $categoryFolderPath = $baseFolderPath . $categoryFolderName;
            if (!File::isDirectory($categoryFolderPath)) {
                File::makeDirectory($categoryFolderPath, 0777, true);
            }
            $podcastFolderPath = $categoryFolderPath . '/' . $folderName;
            if (!File::isDirectory($podcastFolderPath)) {
                File::makeDirectory($podcastFolderPath, 0777, true);
            }
            if ($request->hasFile('audio_files')) {
                $audioFiles = $request->file('audio_files');
                foreach ($audioFiles as $audioFile) {

                    $originalName = pathinfo($audioFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $audioFile->getClientOriginalExtension();
                    $sanitized = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
                    $filename = $sanitized . '.' . $extension;

                    $filePath = 'site/podcast/' . $categoryFolderName . '/' . $folderName;
                    $audioFile->move(public_path($filePath), $filename);
                    $this->modelAudioFile->create([
                        'podcast_id' => $newpodcast->id,
                        'file_path' => ($filePath . '/' . $filename),
                    ]);
                }
            }

            $newpodcast->save();

            if ($request->has('keywords') && is_array($request->keywords)) {
                $newpodcast->keywords()->sync($request->keywords);
            }

            return response()->json(['success' => true, 'message' => 'Podcast saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcast->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPodcast->errors);
        }
    }


    /**
     * Update podcast.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($this->modelPodcast->isEditPodcastValid($request->all())) {
            if ($request->has('id')) {
                $id = $request->id;
            }

            $editpodcast = $this->modelPodcast->find($id);
            $editpodcast->url = $request->url;
            $editpodcast->title = $request->title;
            $editpodcast->author = $request->author;
            $editpodcast->location = $request->location;
            $editpodcast->date = $request->date;
            $editpodcast->description = $request->description;

            $folderName = $editpodcast->podcast_identifier;
            $categoryFolderName = $editpodcast->category->podcast_category_identifier;
            $baseFolderPath = public_path('site/podcast/');
            $categoryFolderPath = $baseFolderPath . $categoryFolderName;
            if (!File::isDirectory($categoryFolderPath)) {
                File::makeDirectory($categoryFolderPath, 0777, true);
            }
            $podcastFolderPath = $categoryFolderPath . '/' . $folderName;
            if (!File::isDirectory($podcastFolderPath)) {
                File::makeDirectory($podcastFolderPath, 0777, true);
            }
            $deletedFiles = json_decode($request->input('deleted_files', '[]'), true);
            $unchangedFiles = json_decode($request->input('unchanged_files', '[]'), true);
            $uploadedFiles = $request->file('audio_files');

            $existingFiles = $this->modelAudioFile
                ->where('podcast_id', $editpodcast->id)
                ->pluck('file_path')
                ->toArray();

            foreach ($deletedFiles as $fileToDelete) {
                $filePath = 'site/podcast/' . $categoryFolderName . '/' . $folderName . '/' . $fileToDelete;
                $fullFilePath = public_path($filePath);

                if (file_exists($fullFilePath)) {
                    unlink($fullFilePath);
                }
                $this->modelAudioFile->where('file_path', $filePath)->delete();
            }

            if ($uploadedFiles) {
                foreach ($uploadedFiles as $audioFile) {
                    $filePath = 'site/podcast/' . $categoryFolderName . '/' . $folderName;

                    if (!in_array($filePath . '/' . $audioFile->getClientOriginalName(), $existingFiles)) {

                        $originalName = pathinfo($audioFile->getClientOriginalName(), PATHINFO_FILENAME);
                        $extension = $audioFile->getClientOriginalExtension();
                        $sanitized = preg_replace('/[^A-Za-z0-9_\-]/', '_', $originalName);
                        $filename = $sanitized . '.' . $extension;

                        $audioFile->move(public_path($filePath), $filename);
                        $this->modelAudioFile->create([
                            'podcast_id' => $editpodcast->id,
                            'file_path' => $filePath . '/' . $filename,
                        ]);
                    }
                }
            }

            $editpodcast->save();

            $editpodcast->keywords()->sync($request->input('keywords', []));

            return response()->json(['success' => true, 'data' => $editpodcast, 'message' => 'Update saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcast->errors,
                ]);
            }

            return redirect()->back()->withInput()->withErrors($this->modelPodcast->errors);
        }
    }

    /**
     * Delete podcast item.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteItem(Request $request)
    {
        $item = $this->modelPodcast->find($request->id);

        if ($item) {
            $item->delete(); // Uses SoftDeletes
            $item->keywords()->detach();

            return response()->json([
                'success' => true,
                'message' => 'Item deleted successfully.',
            ]);
        }
        
        return response()->json([
            'success' => false,
            'errors' => 'Item not found.'
        ], 404);
    }
}
