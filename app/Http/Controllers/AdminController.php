<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use App\Models\User;
use App\Models\Podcast;
use App\Models\PodcastCategory;
use App\Models\AudioFile;
use App\Rules\MatchOldPassword;
use File;
use Hash;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    protected $modelSection;
    protected $modelPage;
    protected $modelUser;
    protected $modelPodcast;
    protected $modelPodcastCategory;
    protected $modelAudioFile;

    public function __construct(Section $sectionM, Page $pageM, User $userM, Podcast $podcastM, PodcastCategory $podcastcatM, AudioFile $audioM)
    {
        $this->modelSection = $sectionM;
        $this->modelPage = $pageM;
        $this->modelUser = $userM;
        $this->modelPodcast = $podcastM;
        $this->modelPodcastCategory = $podcastcatM;
        $this->modelAudioFile = $audioM;
    }
    public function account()
    {
        return view('admin_page');
    }

    public function updatePassword(Request $request)
    {
        if ($this->modelUser->isEditUserValid($request->all())) {
            if ($request->current_password !== null && $request->new_password !== null && $request->new_confirm_password !== null) {
                $validator = $request->validate([
                    'current_password' => ['required', new MatchOldPassword],
                    'new_password' => ['required'],
                    'new_confirm_password' => ['same:new_password'],
                ]);
                if (!$validator) {
                    return redirect()->back()->withInput()->withErrors($this->modelUser->errors);
                } else {
                    $user = User::find(auth()->user()->id);
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                }
            } else {
                $user = User::find(auth()->user()->id);
                $user->save();
            }
            return redirect()->action([AdminController::class, 'account'])->with('message', 'Changes have been saved successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($this->modelUser->errors);
        }
    }

    public function store(Request $request)
    {
        if ($this->modelPage->isPageValid($request->all(), $request->number_validation)) {
            $newpage = new Page();
            $newpage->page_identifier = 'PA-' . uniqid('', true);
            $newpage->user_id = Auth::user()->user_identifier;
            $newpage->section_id = $request->section_id;
            $newpage->category = $request->category;
            $newpage->url = $request->url;
            $newpage->number = $request->number;
            $newpage->period = implode(',', $request->input('period', []));
            $newpage->year = $request->year;
            $newpage->title = $request->title;
            $newpage->subtitle = $request->subtitle;
            $newpage->content = $request->content;
            $newpage->content_sec = $request->content_sec;
            $newpage->link = $request->link;
            $newpage->pdf = $request->pdf;
            $newpage->created_at = $request->created_at ? Carbon::parse($request->created_at) : Carbon::now();
            $newpage->save();

            $folderName = $newpage->page_identifier;

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $filename = 'icon-' . $newpage->page_identifier . '.' . $icon->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(array('driver' => 'imagick'));
                $manager->make($icon->getRealPath())->save($path);
                $newpage->icon = 'site/' . $folderName . '/' . $filename;
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'image-' . $newpage->page_identifier . '.' . $image->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(array('driver' => 'imagick'));
                $manager->make($image->getRealPath())->save($path);
                $newpage->image = 'site/' . $folderName . '/' . $filename;
            }

            if ($request->hasFile('image_responsive')) {
                $image_responsive = $request->file('image_responsive');
                $filename = 'image_responsive-' . $newpage->page_identifier . '.' . $image_responsive->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(array('driver' => 'imagick'));
                $manager->make($image_responsive->getRealPath())->save($path);
                $newpage->image_responsive = 'site/' . $folderName . '/' . $filename;
            }

            if ($request->hasFile('pdf')) {
                $pdf = $request->file('pdf');
                $filename = 'pdf-' . $newpage->page_identifier . '.' . $pdf->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $pdf->move(public_path('site/' . $folderName), $filename);
                $newpage->pdf = 'site/' . $folderName . '/' . $filename;
            }

            $inputType = $request->input('inputType');
            if ($inputType === 'video') {
                $newpage->link = null;
                $newpage->events_image = null;

                if ($request->hasFile('upload_video')) {
                    $upload_video = $request->file('upload_video');
                    $filename = 'upload_video-' . $newpage->page_identifier . '.' . $upload_video->getClientOriginalExtension();
                    if (!File::isDirectory('site/' . $folderName)) {
                        File::makeDirectory('site/' . $folderName, 0777, true);
                    }
                    $upload_video->move(public_path('site/' . $folderName), $filename);
                    $newpage->upload_video = 'site/' . $folderName . '/' . $filename;
                }
            } elseif ($inputType === 'image') {
                $newpage->link = null;
                $newpage->upload_video = null;

                if ($request->hasFile('events_image')) {
                    $events_image = $request->file('events_image');
                    $filename = 'events_image-' . $newpage->page_identifier . '.' . $events_image->getClientOriginalExtension();
                    if (!File::isDirectory('site/' . $folderName)) {
                        File::makeDirectory('site/' . $folderName, 0777, true);
                    }

                    $path = public_path('site/' . $folderName . '/' . $filename);
                    $manager = new ImageManager(array('driver' => 'imagick'));
                    $manager->make($events_image->getRealPath())->save($path);

                    $newpage->events_image = 'site/' . $folderName . '/' . $filename;
                }
            } elseif ($inputType === 'link') {
                $newpage->upload_video = null;
                $newpage->events_image = null;
                $newpage->link = $request->input('link');
            }


            $newpage->save();

            return response()->json(['success' => true, 'message' => 'Themes saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPage->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPage->errors);
        }
    }


    public function update(Request $request, $id)
    {
        if ($this->modelPage->isEditPageValid($request->all(), $request->number_validation)) {
            if ($request->has('id')) {
                $id = $request->id;
            }
            $editPage = $this->modelPage->find($id);
            $editPage->category = $request->category;
            $editPage->url = $request->url;
            $editPage->number = $request->number;
            $editPage->period = implode(',', $request->input('period', []));
            $editPage->year = $request->year;
            $editPage->title = $request->title;
            $editPage->subtitle = $request->subtitle;
            $editPage->content = $request->content;
            $editPage->content_sec = $request->content_sec;
            if (!$request->has('inputType')) {
                $editPage->link = $request->link;
            }
            $editPage->pdf = $request->pdf;
            $editPage->created_at = $request->created_at ? Carbon::parse($request->created_at) : Carbon::now();

            $folderName = $editPage->page_identifier;

            $image = $request->file('image');
            if ($image != null) {
                $oldImage = $editPage->image;
                $filename = 'image-' . $editPage->page_identifier . '.' . $image->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($image->getRealPath())->save($path);
                $editPage->image = 'site/' . $folderName . '/' . $filename;

                if (file_exists(public_path() . $oldImage)) {
                    File::delete(public_path($oldImage));
                }
            }
            $image_responsive = $request->file('image_responsive');
            if ($image_responsive != null) {
                $oldImageResponsive = $editPage->image_responsive;
                $filename = 'image_responsive-' . $editPage->page_identifier . '.' . $image_responsive->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($image_responsive->getRealPath())->save($path);
                $editPage->image_responsive = 'site/' . $folderName . '/' . $filename;

                if (file_exists(public_path() . $oldImageResponsive)) {
                    File::delete(public_path($oldImageResponsive));
                }
            }

            $icon = $request->file('icon');
            if ($icon != null) {
                $oldIcon = $editPage->icon;
                $filename = 'icon-' . $editPage->page_identifier . '.' . $icon->getClientOriginalExtension();
                if (!File::isDirectory('site/' . $folderName)) {
                    File::makeDirectory('site/' . $folderName, 0777, true);
                }
                $path = public_path('site/' . $folderName . '/' . $filename);

                $manager = new ImageManager(['driver' => 'imagick']);
                $manager->make($icon->getRealPath())->save($path);
                $editPage->icon = 'site/' . $folderName . '/' . $filename;

                if (file_exists(public_path() . $oldIcon)) {
                    File::delete(public_path($oldIcon));
                }
            }

            $pdf = $request->file('pdf');
            if ($pdf != null) {
                $oldPdf = $editPage->pdf;
                $filename = 'pdf-' . $editPage->page_identifier . '.' . $pdf->getClientOriginalExtension();
                $folderPath = 'site/' . $folderName;
                if (!File::isDirectory(public_path($folderPath))) {
                    File::makeDirectory(public_path($folderPath), 0777, true);
                }

                $pdf->move(public_path($folderPath), $filename);
                $editPage->pdf = $folderPath . '/' . $filename;

                if ($oldPdf && file_exists(public_path($oldPdf))) {
                    File::delete(public_path($oldPdf));
                }
            }
            $inputType = $request->input('inputType');
            if ($inputType === 'upload_video') {
                $uploadVideo = $request->file('upload_video');
                if ($uploadVideo != null) {
                    if (isset($editPage->upload_video) && file_exists(public_path($editPage->upload_video))) {
                        File::delete(public_path($editPage->upload_video));
                    }
                    $filename = 'upload_video-' . $editPage->page_identifier . '.' . $uploadVideo->getClientOriginalExtension();
                    $folderPath = 'site/' . $editPage->page_identifier;

                    if (!File::isDirectory(public_path($folderPath))) {
                        File::makeDirectory(public_path($folderPath), 0777, true);
                    }
                    $uploadVideo->move(public_path($folderPath), $filename);
                    $editPage->upload_video = $folderPath . '/' . $filename;

                    $oldEventImage = $editPage->events_image;
                    if (file_exists(public_path($oldEventImage))) {
                        File::delete(public_path($oldEventImage));
                    }
                    $editPage->events_image = null;
                    $editPage->link = null;
                }
            } elseif ($inputType === 'events_image') {
                $eventsImage = $request->file('events_image');
                if ($eventsImage != null) {
                    if (isset($editPage->eventsImage) && file_exists(public_path($editPage->eventsImage))) {
                        File::delete(public_path($editPage->eventsImage));
                    }

                    $filename = 'events_image-' . $editPage->page_identifier . '.' . $eventsImage->getClientOriginalExtension();
                    $folderPath = 'site/' . $editPage->page_identifier;
                    if (!File::isDirectory(public_path($folderPath))) {
                        File::makeDirectory(public_path($folderPath), 0777, true);
                    }
                    $path = public_path($folderPath . '/' . $filename);
                    $manager = new ImageManager(['driver' => 'imagick']);
                    $manager->make($eventsImage->getRealPath())->save($path);
                    $editPage->events_image = $folderPath . '/' . $filename;

                    $oldUploadVideo = $editPage->upload_video;
                    if (file_exists(public_path($oldUploadVideo))) {
                        File::delete(public_path($oldUploadVideo));
                    }
                    $editPage->upload_video = null;
                    $editPage->link = null;
                }
            } elseif ($inputType === 'link') {
                $editPage->link = $request->input('link');
                if (isset($editPage->events_image) && file_exists(public_path($editPage->events_image))) {
                    File::delete(public_path($editPage->events_image));
                }
                if (isset($editPage->upload_video) && file_exists(public_path($editPage->upload_video))) {
                    File::delete(public_path($editPage->upload_video));
                }
                $editPage->upload_video = null;
                $editPage->events_image = null;
            }
            $editPage->save();

            return response()->json(['success' => true, 'data' => $editPage, 'message' => 'Update saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPage->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPage->errors);
        }
    }

    public function deleteItem(Request $request)
    {
        $item = $this->modelPage->find($request->id);

        if ($item) {
            $item->is_deleted = 1;
            $item->save();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item deleted successfully.',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'Item not found.'
            ]);
        }
    }
}
