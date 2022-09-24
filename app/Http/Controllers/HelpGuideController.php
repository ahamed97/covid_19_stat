<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HelpGuideRequest;
use App\Repositories\HelpGuideRepository;

class HelpGuideController extends Controller
{
    private $helpGuideRepository;

    public function __construct(HelpGuideRepository $helpGuideRepository)
    {
        $this->helpGuideRepository = $helpGuideRepository;
    }

    public function index()
    {
        $helpGuides = $this->helpGuideRepository->all();

        return view('help-guides.index', [
            'helpGuides' => $helpGuides
        ]);
    }

    public function userHelpGuides()
    {
        $userId = Auth::id();
        $helpGuides = $this->helpGuideRepository->userHelpGuides($userId);

        return view('help-guides.index', [
            'helpGuides' => $helpGuides
        ]);
    }

    public function delete($id)
    {
        if(Auth::id() != $this->helpGuideRepository->find($id)->user_id){
            return redirect()->route('help-guides.user-guides')->with('status', __('help-guide.restrict'));
        }
        $this->helpGuideRepository->delete($id);

        return redirect()->route('help-guides.user-guides')->with('status', __('help-guide.delete'));
    }

    public function create()
    {
        return view('help-guides.create');
    }

    // public function store()
    // {
    //     try {
    //         $data = request()->only('description', 'link');
    //         $data['user_id'] = Auth::id();
    //         $this->helpGuideRepository->updateOrCreate($data);
    //     } catch (Exception $e) {
    //         Log::alert($e->getMessage());
    //         return redirect()->route('help-guides.user-guides')->with('error', __('help-guide.error'));
    //     }
    //     return redirect()->route('help-guides.user-guides')->with('status', __('help-guide.create'));
    // }

    public function store(HelpGuideRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::id();
            $this->helpGuideRepository->updateOrCreate($data);
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->route('help-guides.user-guides')->with('error', __('help-guide.error'));
        }
        return redirect()->route('help-guides.user-guides')->with('status', __('help-guide.create'));
    }
}
