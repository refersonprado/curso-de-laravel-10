@foreach ($supports->items() as $support)
            <div class="flex items-center p-4 my-auto text-center text-slate-50 border bg-slate-800 border-slate-500 ">
                <p class="py-4 flex justify-center w-20">
                    @include('admin.supports.partials.user')
                </p>
                <div class="flex flex-col w-72">
                    <p>
                        {{ limitText($support->subject, 30) }}
                    </p>
                    <div class="flex justify-center gap-3 w-full">
                        <div class="flex gap-2 items-center py-2">
                            <i class="fa-solid fa-circle-info" style="color: #c0cce8;"></i>
                            <p class="{{statusColor($support->status)}} text-slate-950 text-sm rounded-full w-20">
                                {{ getStatusSupport($support->status) }}
                            </p>
                        </div>   
                        <div class="flex gap-2 items-center"> 
                            <i class="fa-solid fa-calendar-days" style="color: #c0cce8;"></i>
                            <p>
                                {{ formatDate($support->created_at) }}
                            </p>
                        </div>
                    </div>
                </div>
                <p class="w-5/12">
                    {{ limitText($support->body, 50) }}
                </p>
                <div class="w-44 flex justify-end gap-4 text-end text-slate-50">
                    <a href="{{ route('supports/show', $support->id) }}">
                        <i class="fa-regular fa-eye"></i>
                    </a>
                    <a href="{{ route('supports/edit', $support->id) }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                </div>
            </div>
    @endforeach

