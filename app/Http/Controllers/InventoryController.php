<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Application\Inventory\UseCaseGetInventoryList;
use App\Application\Inventory\UseCaseGetInventoryShow;
use App\Application\Inventory\UseCaseSaveArticle;
use App\Application\Inventory\UseCaseUpdateArticle;
use App\Application\Inventory\UseCaseDeleteArticle;
use App\DTOs\ArticleDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly UseCaseGetInventoryList $inventory_list,
        private readonly UseCaseGetInventoryShow $inventory_show,
        private readonly UseCaseSaveArticle $inventory_save,
        private readonly UseCaseUpdateArticle $inventory_update,
        private readonly UseCaseDeleteArticle $inventory_delete
    ){}

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = $this->inventory_list->__invoke();
        return view('inventory.list', ['articles' => $articles]);
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, int $id)
    {
        $article = $this->inventory_show->__invoke($id);
        return view('inventory.edit', ['article' => $article]);
    }

    public function save(Request $request):RedirectResponse
    {
        $articleDto = ArticleDTO::get(
            null,
            $request->input('name'),
            $request->input('description'),
            $request->input('quantity'),
            $request->input('price'),
            Auth::id(),
            new DateTime(),
            null,
            null    
        );

        $this->inventory_save->__invoke($articleDto);
        return redirect()->route('inventory.list');
    }

  
    public function update(Request $request):RedirectResponse
    {
        $articleDto = ArticleDTO::get(
            $request->input('atc_id'),
            $request->input('name'),
            $request->input('description'),
            $request->input('quantity'),
            $request->input('price'),
            Auth::id(),
            null,
            new DateTime(),
            null    
        );
        Log::debug(print_r($articleDto,true));
        $article = $this->inventory_update->__invoke($articleDto);
        $id = $article->get('id');

        return redirect()->route('inventory.list');
    }

    public function delete(Request $request):RedirectResponse
    {
        $id = $request->input('id');
        $this->inventory_delete->__invoke($id);
        return redirect()->route('inventory.list');
    }
}
