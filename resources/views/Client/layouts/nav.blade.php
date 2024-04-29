<div class="my-4">
    <ul class="flex justify-start space-x-3">
        @foreach ($categories as $item)
            <li>
                <a class="px-2 font-semibold text-lg hover:text-xl hover:border-b-2 border-black transition" href="#">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
