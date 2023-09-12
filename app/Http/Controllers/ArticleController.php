<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    public function index(): Renderable
    {
        return view("article/index");
    }

    public function datatable(): JsonResponse
    {
        $articles = Article::query()->select(['id', 'title', 'created_at']);

        return DataTables::eloquent($articles)
            ->addColumn('action', function ($data) {
                $btnEdit = '<a href="'.route('article.edit', ['id' => $data->id]).'" class="btn btn-primary btn-sm">Edit</a>';
                $btnView = '<a href="'.route('article.show', ['id' => $data->id]).'" class="btn btn-info btn-sm ml-2">View</a>';
                $btnDelete = '<button data-id="'.$data->id.'" class="btn btn-danger btn-sm ml-2 btn-delete">Hapus</button>';

                return $btnEdit.$btnView.$btnDelete;
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::parse($data->created_at)->diffForHumans();
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function create(): Renderable
    {
        return view('article/create');
    }

    public function store(Request $request): JsonResponse
    {
        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($article->id);
    }

    public function show($id): Renderable
    {
        $article = Article::findOrFail($id);

        return view('article/view')->with(compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article/edit')->with(compact('article'));
    }

    public function update(Request $request, $id): JsonResponse
    {
        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($article->id);
    }

    public function delete($id): JsonResponse
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json('success');
    }
}
