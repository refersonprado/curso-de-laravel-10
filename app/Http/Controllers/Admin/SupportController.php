<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Client\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {}
    

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support = $support->create($data);

        return redirect()->route('supports');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string | int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        $support->update($request->only([
            'subject',
            'body',
        ]));

        return redirect()->route('supports');
    }

    public function destroy(Support $support, string | int $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports');
    }
}
