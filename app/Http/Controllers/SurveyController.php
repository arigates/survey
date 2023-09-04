<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Survey;
use App\Models\SurveyDetail;
use App\Models\SurveyDetailUser;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SurveyController extends Controller
{
    public function index(): Renderable
    {
        return view("index");
    }

    public function datatable(): JsonResponse
    {
        $surveys = Survey::query();

        return DataTables::eloquent($surveys)
            ->addColumn('action', function ($data) {
                $btnEdit = '<a href="'.route('survey.edit', ['id' => $data->id]).'" class="btn btn-primary btn-sm">Edit</a>';
                $btnView = '<a href="'.route('survey.show', ['id' => $data->id]).'" class="btn btn-info btn-sm ml-2">View</a>';

                return $btnEdit.$btnView;
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function create(): Renderable
    {
        $users = User::get();
        $categories = Category::with('details')->get();

        return view('create')->with(compact('users', 'categories'));
    }

    public function store(Request $request): JsonResponse
    {
        $survey = Survey::create([
            'year' => $request->year,
            'description' => $request->description,
        ]);

        $categories = Category::with('details')->get();
        foreach ($categories as $category) {
            foreach ($category->details as $categoryDetail) {
                $surveyDetail = SurveyDetail::create([
                    'survey_id' => $survey->id,
                    'category_id' => $category->id,
                    'category_detail_id' => $categoryDetail->id,
                ]);

                $selected = $request->selected[$categoryDetail->id] ?? [];
                foreach ($selected as $selectedUserId) {
                    SurveyDetailUser::create([
                        'survey_detail_id' => $surveyDetail->id,
                        'user_id' => $selectedUserId
                    ]);
                }
            }
        }

        return response()->json($survey->id);
    }

    public function show($id): Renderable
    {
        $survey = Survey::findOrFail($id);
        $users = User::get();
        $categories = Category::with('details')->get();

        $surveyDetails = SurveyDetail::with(['category', 'categoryDetail', 'users'])
            ->whereHas('survey', function ($q) use ($id) {
                $q->where('id', $id);
            })
            ->orderBy('category_id')
            ->get();

        return view("view")->with(compact('users', 'categories', 'survey', 'surveyDetails'));
    }

    public function edit($id): Renderable
    {
        $survey = Survey::findOrFail($id);
        $users = User::get();
        $categories = Category::with('details')->get();

        $surveyDetails = SurveyDetail::with(['category', 'categoryDetail', 'users'])
            ->whereHas('survey', function ($q) use ($id) {
                $q->where('id', $id);
            })
            ->orderBy('category_id')
            ->get();

        return view("edit")->with(compact('users', 'categories', 'survey', 'surveyDetails'));
    }

    public function update(Request $request, $id): JsonResponse
    {
        $survey = Survey::with('details')->findOrFail($id);
        $survey->update([
            'year' => $request->year,
            'description' => $request->description,
        ]);

        // delete old data
        foreach ($survey->details as $detail) {
            $detail->users()->detach();
            $detail->delete();
        }

        $categories = Category::with('details')->get();
        foreach ($categories as $category) {
            foreach ($category->details as $categoryDetail) {
                $surveyDetail = SurveyDetail::create([
                    'survey_id' => $survey->id,
                    'category_id' => $category->id,
                    'category_detail_id' => $categoryDetail->id,
                ]);

                $selected = $request->selected[$categoryDetail->id] ?? [];
                foreach ($selected as $selectedUserId) {
                    SurveyDetailUser::create([
                        'survey_detail_id' => $surveyDetail->id,
                        'user_id' => $selectedUserId
                    ]);
                }
            }
        }

        return response()->json($survey->id);
    }
}
