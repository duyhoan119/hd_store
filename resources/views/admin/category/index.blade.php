@extends('admin.index')
@section('title', 'Category List')
@section('show_content')
    <div class="space-y-2">
        <a href="{{ route('create_category_view') }}" class="bg-green-500 text-black font-semibold text-xl px-2 rounded-md" uk-toggle="target: #add-modal" type="button">Add new +</a>
        <table class="min-w-full">
            <thead class=" min-w-full">
                <tr class="border-b border-solid py-3">
                    <th>
                        NAME
                    </th>
                    <th>
                        STATUS
                    </th>
                    <th>
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
        
                @foreach ($categories as $item)
                    <tr class="border-b border-solid py-3">
                        <td>
                            <button type="button">{{ $item->name }}</button>
                        </td>
                        <td>
                            @if ($item->status === '1')
                                post
                            @else
                                product
                            @endif
                        </td>
                        <td class="flex space-x-4 justify-center items-center">
                            <a href="{{ route('edit_category', ['id'=>$item->id]) }}" type="button" class="bg-yellow-500 text-black font-semibold text-xl px-2 rounded-md">E</a>
                            <button type="button" onclick="handerDelete({{ $item->id }})" class="bg-red-500 text-black font-semibold text-xl px-2 rounded-md">D</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        function handerDelete(id) {

            let url = location.origin+'/api/category/' + id;
            axios.delete(url).then(res => {
                if (res.status === 200) {
                    alert('delete success');
                }else{
                    alert('delete fales');
                }
                location.reload()
            })
        }
    </script>
@endsection
