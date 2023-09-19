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

        $items = $query->paginate(1);

        return Inertia::render('Admin/ActiveItems/Index', [
            'items' => $items,
        ]);
    }
}
