<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service 
    ) {}
    
    public function index(Request $request)
    {
        $status = $request->get('status');

        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 8),
            filter: $request->get('filter', ''),
            status: $status,
        );
        
        $filters = ['filter' => $request->get('filter', ''), 'status' => $request->status ?? ''];
        
        return view('admin/supports/index', compact('supports', 'filters'));
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

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request),
        );
        if (!$support) {
            return back();
        }

        return redirect()->route('supports');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports');
    }
}
