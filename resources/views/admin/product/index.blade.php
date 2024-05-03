@extends('admin.index')
@section('title', 'product List')
@section('show_content')
    <div class="space-y-2">
        <a href="{{ route('create_product_view') }}" class="bg-green-500 text-black font-semibold text-xl px-2 rounded-md"
            uk-toggle="target: #add-modal" type="button">Add new +</a>
        <table class="min-w-full">
            <thead class=" min-w-full">
                <tr class="border-b border-solid py-3">
                    <th>
                        IMAGE
                    </th>
                    <th>
                        NAME
                    </th>
                    <th>
                        CATEGORY
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">

                @foreach ($products as $item)
                    <tr class="border-b border-solid py-3">
                        <td class="flex items-center justify-center">
                           @if ($item->image!== '')
                                <img class="w-5 h-5" src="{{ asset($item->image) }}" alt="">
                           @endif

                        </td>
                        <td>
                            <a href="#">{{ $item->name }}</a>
                        </td>
                        <td>
                            {{ $item->category->name }}
                        </td>
                        <td class="flex space-x-4 justify-center items-center">
                            <a href="{{ route('edit_product', ['id' => $item->id]) }}" type="button" class="bg-yellow-500 text-black font-semibold text-xl px-2 rounded-md">E</a>
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
            let url = 'http://127.0.0.1:8000/api/product/' + id;
            axios.delete(url).then(res => {
                if (res.status === 200) {
                    alert('delete success');
                } else {
                    alert('delete fales');
                }
                location.reload()
            })
        }
    </script>
@endsection
