<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Application\Inventory\UseCaseGetInventoryList;
use App\Application\Inventory\UseCaseGetInventoryShow;
use App\Application\Inventory\UseCaseUpdateArticle;
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
        private readonly UseCaseUpdateArticle $inventory_update
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
    public function edit(Request $request, int $id)
    {
        $article = $this->inventory_show->__invoke($id);
        return view('inventory.edit', ['article' => $article]);
    }

  
    /**
     * Actualiza el libro especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request):RedirectResponse
    {

        Log::debug("alsdjl");
        $articleDto = ArticleDTO::get(
            $request->integer('atc_id'),
            $request->string('name'),
            $request->string('description'),
            $request->integer('quantity'),
            $request->float('price'),
            Auth::id(),
            null,
            new DateTime(),
            null    
        );
        Log::debug(print_r($articleDto,true));
        Log::debug("alsdj222l");
        $article = $this->inventory_update->__invoke($articleDto);
        $id = $article->get('id');
        Log::debug("alsdj22w3332l");

        return redirect()->route('inventory.edit', ['article' => $article]);
    }
}
