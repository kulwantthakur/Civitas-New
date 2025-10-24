<?php

namespace App\Http\Controllers;

use App\Models\PodcastKeyword;
use Illuminate\Http\Request;
use Auth;

class KeywordController extends Controller
{
    protected $modelPodcastKeyword;

    public function __construct(PodcastKeyword $podcastKeyM)
    {
        $this->modelPodcastKeyword = $podcastKeyM;
    }

    public function store(Request $request)
    {
        if ($this->modelPodcastKeyword->isPodcastKeywordValid($request->all())) {
            $newkeyword = new PodcastKeyword();

            $newkeyword->keyword = $request->keyword;
            $newkeyword->save();

            return response()->json(['success' => true, 'message' => 'Podcast Keyword saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcastKeyword->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelPodcastKeyword->errors);
        }
    }

    public function update(Request $request, $id)
    {
        if ($this->modelPodcastKeyword->isEditPodcastKeywordValid($request->all())) {
            if ($request->has('id')) {
                $id = $request->id;
            }

            $editpodcastkeyword = $this->modelPodcastKeyword->find($id);
            $editpodcastkeyword->keyword = $request->keyword;
        
            $editpodcastkeyword->save();

            return response()->json(['success' => true, 'data' => $editpodcastkeyword, 'message' => 'Update saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelPodcastKeyword->errors,
                ]);
            }

            return redirect()->back()->withInput()->withErrors($this->modelPodcastKeyword->errors);
        }
    }
}
