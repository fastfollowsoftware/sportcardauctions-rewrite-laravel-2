<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ActiveItemsController extends Controller
{
    public function index(Request $request): Response
    {
        $query = Item::query();

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->get('search') . '%');
        }

        if ($request->has('format')) {
            $query->where('format', $request->get('format'));
        }

        $query->orderBy($request->get('sort_by', 'name'), $request->get('sort_direction', 'asc'));

        $items = $query->paginate(10)->withQueryString();

        return Inertia::render('Admin/ActiveItems/Index', [
            'items' => $items,
        ]);
    }
}
