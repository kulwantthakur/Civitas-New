<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\AudioFile;
use App\Models\PodcastKeyword;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodcastCategoryController extends Controller
{
    /** @var Podcast */
    protected $modelPodcast;
    /** @var PodcastCategory */
    protected $modelPodcastCategory;
    /** @var AudioFile */
    protected $modelAudioFile;
    /** @var PodcastKeyword */
    protected $modelPodcastKeyword;

    public function __construct(Podcast $podcastM, PodcastCategory $podcastcatM, AudioFile $audioM, PodcastKeyword $podcastKeywordM)
    {
        $this->modelPodcast = $podcastM;
        $this->modelPodcastCategory = $podcastcatM;
        $this->modelAudioFile = $audioM;
        $this->modelPodcastKeyword = $podcastKeywordM;
    }

    /**
     * Store new podcast category.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->modelPodcastCategory->isPodcastCategoryValid($request->all())) {
            $newpodcastcategory = new PodcastCategory();
            $newpodcastcategory->podcast_category_identifier = 'PC-' . uniqid('', true);
            $newpodcastcategory->url = $request->url;
            $newpodcastcategory->name = $request->name;
            $newpodcastcategory->color = $request->color;
            $newpodcastcategory->save();

            $folderName = $newpodcastcategory->podcast_category_identifier;

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $filename = 'icon-' . $newpodcastcategory->podcast_category_identifier . '.' . $icon->getClientOriginalExtension();
                if (!File::isDirectory('site/podcast/' . $folderName)) {
                    File::makeDirectory('site/podcast/' . $folderName, 0777, true);
                }
                $path = public_path('site/podcast/' . $folderName . '/' . $filename);

                $manager = new ImageManager(array('driver' => 'imagick'));
                $manager->make($icon->getRealPath())->save($path);
                $newpodcastcategory->icon = 'site/podcast/' . $folderName . '/' . $filename;
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'image-' . $newpodcastcategory->podcast_category_identifier . '.' . $image->getClientOriginalExtension();
                if (!File::isDirectory('site/podcast/' . $folderName)) {
                    File::makeDirectory('site/podcast/' . $folderName, 0777, true);
                }
                $path = public_path('site/podcast/' . $folderName . '/' . $filename);

                $manager = new ImageManager(array('driver' => 'imagick'));
                $manager->make($image->getRealPath())->save($path);
                $newpodcastcategory->image = 'site/podcast/' . $folderName . '/' . $filename;
            }

            $newpodcastcategory->save();

            if ($request->has('keywords') && is_array($request->keywords)) {
                $newpodcastcategory->keywords()->sync($request->keywords);
            }

            return response()->json(['success' => true, 'message' => 'Podcast Category saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcastCategory->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPodcastCategory->errors);
        }
    }

    /**
     * Update podcast category.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($this->modelPodcastCategory->isEditPodcastCategoryValid($request->all())) {
            if ($request->has('id')) {
                $id = $request->id;
            }
            $editpodcastcategory = $this->modelPodcastCategory->find($id);
            $editpodcastcategory->url = $request->url;
            $editpodcastcategory->name = $request->name;
            $editpodcastcategory->color = $request->color;

            $folderName = $editpodcastcategory->podcast_category_identifier;

            $icon = $request->file('icon');
            if ($icon != null) {
                $oldIcon = $editpodcastcategory->icon;
                $filename = 'icon-' . $editpodcastcategory->podcast_category_identifier . '.' . $icon->getClientOriginalExtension();
                if (!File::isDirectory('site/podcast/' . $folderName)) {
                    File::makeDirectory('site/podcast/' . $folderName, 0777, true);
                }
                $path = public_path('site/podcast/' . $folderName . '/' . $filename);

                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($icon->getRealPath())->save($path);
                $editpodcastcategory->icon = 'site/podcast/' . $folderName . '/' . $filename;

                if (file_exists(public_path() . $oldIcon)) {
                    File::delete(public_path($oldIcon));
                }
            }

            $image = $request->file('image');
            if ($image != null) {
                $oldImage = $editpodcastcategory->image;
                $filename = 'image-' . $editpodcastcategory->podcast_category_identifier . '.' . $image->getClientOriginalExtension();
                if (!File::isDirectory('site/podcast/' . $folderName)) {
                    File::makeDirectory('site/podcast/' . $folderName, 0777, true);
                }
                $path = public_path('site/podcast/' . $folderName . '/' . $filename);

                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($image->getRealPath())->save($path);
                $editpodcastcategory->image = 'site/podcast/' . $folderName . '/' . $filename;

                if (file_exists(public_path() . $oldImage)) {
                    File::delete(public_path($oldImage));
                }
            }

            $editpodcastcategory->save();

            $editpodcastcategory->keywords()->sync($request->input('keywords', []));

            return response()->json(['success' => true, 'data' => $editpodcastcategory, 'message' => 'Update saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcastCategory->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPodcastCategory->errors);
        }
    }
    /**
     * Delete podcast category item.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteItem(Request $request)
    {
        $item = $this->modelPodcastCategory->find($request->id);

        if ($item) {
            // Soft delete related podcasts first
            $item->podcasts()->each(function ($podcast) {
                $podcast->delete();
            });
            $item->keywords()->detach();
            $item->delete(); // Uses SoftDeletes

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
